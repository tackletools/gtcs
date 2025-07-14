<?php
/**
 * Create Quote Page
 * Displays a form to create a new quote
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

$page_title = 'Create New Quote';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Create New Quote</h1>
    <div class="card">
        <div class="card-body">
            <form id="createQuoteForm" novalidate>
                <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                
                <div class="mb-3">
                    <label class="form-label">Lead ID <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="lead_id" required>
                    <div class="invalid-feedback">Please enter lead ID.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Total Amount <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="total_amount" required>
                    <div class="invalid-feedback">Please enter total amount.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-select" name="status" required>
                        <option value="">Select Status</option>
                        <option value="draft">Draft</option>
                        <option value="sent">Sent</option>
                        <option value="accepted">Accepted</option>
                        <option value="rejected">Rejected</option>
                        <option value="expired">Expired</option>
                    </select>
                    <div class="invalid-feedback">Please select a status.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Quote</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('createQuoteForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append('action', 'create_quote');
    
    try {
        const response = await ajax.post('ajax/leads_actions.php', formData);
        if (response.success) {
            showAlert('Quote created successfully!', 'success');
            loadQuotations(); // Refresh quotations list
            this.reset(); // Reset form
            const modal = bootstrap.Modal.getInstance(document.getElementById('createQuoteModal'));
            modal.hide();
        } else {
            showAlert(response.message || 'Failed to create quote', 'danger');
        }
    } catch (error) {
        showAlert('Error creating quote', 'danger');
    }
});
</script>
