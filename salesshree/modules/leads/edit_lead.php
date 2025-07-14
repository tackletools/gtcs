<?php
/**
 * Edit Lead Page
 * Displays a form to edit an existing lead
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

// Get lead ID from request
$lead_id = (int) ($_GET['id'] ?? 0);
if ($lead_id <= 0) {
    redirect_to('leads.php');
}

// Fetch lead data
$lead = fetch_single("SELECT * FROM leads WHERE id = ?", [$lead_id], 'i');
if (!$lead) {
    redirect_to('leads.php');
}

$page_title = 'Edit Lead';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Edit Lead</h1>
    <div class="card">
        <div class="card-body">
            <form id="editLeadForm" novalidate>
                <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                <input type="hidden" name="lead_id" value="<?php echo $lead['id']; ?>">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($lead['name']); ?>" required>
                        <div class="invalid-feedback">Please enter lead name.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($lead['email']); ?>">
                        <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone" value="<?php echo htmlspecialchars($lead['phone']); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Company</label>
                        <input type="text" class="form-control" name="company" value="<?php echo htmlspecialchars($lead['company']); ?>">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Source <span class="text-danger">*</span></label>
                        <select class="form-select" name="source" required>
                            <option value="">Select Source</option>
                            <option value="website" <?php echo $lead['source'] == 'website' ? 'selected' : ''; ?>>Website</option>
                            <option value="social_media" <?php echo $lead['source'] == 'social_media' ? 'selected' : ''; ?>>Social Media</option>
                            <option value="referral" <?php echo $lead['source'] == 'referral' ? 'selected' : ''; ?>>Referral</option>
                            <option value="cold_call" <?php echo $lead['source'] == 'cold_call' ? 'selected' : ''; ?>>Cold Call</option>
                            <option value="email" <?php echo $lead['source'] == 'email' ? 'selected' : ''; ?>>Email</option>
                            <option value="other" <?php echo $lead['source'] == 'other' ? 'selected' : ''; ?>>Other</option>
                        </select>
                        <div class="invalid-feedback">Please select a source.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Service Interested</label>
                        <input type="text" class="form-control" name="service_interested" value="<?php echo htmlspecialchars($lead['service_interested']); ?>">
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" rows="3"><?php echo htmlspecialchars($lead['notes']); ?></textarea>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Lead</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('editLeadForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    try {
        const response = await ajax.post('ajax/leads_actions.php', formData);
        if (response.success) {
            showAlert('Lead updated successfully!', 'success');
            loadModule('leads'); // Refresh leads list
        } else {
            showAlert(response.message || 'Failed to update lead', 'danger');
        }
    } catch (error) {
        showAlert('Error updating lead', 'danger');
    }
});
</script>
