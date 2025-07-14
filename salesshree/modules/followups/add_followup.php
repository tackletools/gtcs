<?php
/**
 * Add Follow-up Page
 * Displays a form to add a new follow-up
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

$page_title = 'Add New Follow-up';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Add New Follow-up</h1>
    <div class="card">
        <div class="card-body">
            <form id="addFollowupForm" novalidate>
                <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                
                <div class="mb-3">
                    <label class="form-label">Lead ID <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="lead_id" required>
                    <div class="invalid-feedback">Please enter lead ID.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Follow-up Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="followup_date" required>
                    <div class="invalid-feedback">Please select a follow-up date.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Follow-up Time <span class="text-danger">*</span></label>
                    <input type="time" class="form-control" name="followup_time" required>
                    <div class="invalid-feedback">Please select a follow-up time.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Follow-up</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('addFollowupForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append('action', 'add_followup');
    
    try {
        const response = await ajax.post('ajax/leads_actions.php', formData);
        if (response.success) {
            showAlert('Follow-up added successfully!', 'success');
            loadFollowups(); // Refresh follow-ups list
            this.reset(); // Reset form
            const modal = bootstrap.Modal.getInstance(document.getElementById('addFollowupModal'));
            modal.hide();
        } else {
            showAlert(response.message || 'Failed to add follow-up', 'danger');
        }
    } catch (error) {
        showAlert('Error adding follow-up', 'danger');
    }
});
</script>
