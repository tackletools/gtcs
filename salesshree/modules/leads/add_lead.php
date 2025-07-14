<?php
/**
 * Add Lead Page
 * Displays a form to add a new lead
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

$page_title = 'Add New Lead';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Add New Lead</h1>
    <div class="card">
        <div class="card-body">
            <form id="addLeadForm" novalidate>
                <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required>
                        <div class="invalid-feedback">Please enter lead name.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                        <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Company</label>
                        <input type="text" class="form-control" name="company">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Source <span class="text-danger">*</span></label>
                        <select class="form-select" name="source" required>
                            <option value="">Select Source</option>
                            <option value="website">Website</option>
                            <option value="social_media">Social Media</option>
                            <option value="referral">Referral</option>
                            <option value="cold_call">Cold Call</option>
                            <option value="email">Email</option>
                            <option value="other">Other</option>
                        </select>
                        <div class="invalid-feedback">Please select a source.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Service Interested</label>
                        <input type="text" class="form-control" name="service_interested">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" rows="3"></textarea>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Lead</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('addLeadForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    try {
        const response = await ajax.post('ajax/leads_actions.php', formData);
        if (response.success) {
            showAlert('Lead added successfully!', 'success');
            loadModule('leads'); // Refresh leads list
        } else {
            showAlert(response.message || 'Failed to add lead', 'danger');
        }
    } catch (error) {
        showAlert('Error adding lead', 'danger');
    }
});
</script>
