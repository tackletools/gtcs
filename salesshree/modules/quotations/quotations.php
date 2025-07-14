<?php
/**
 * Quotations Management Page
 * Displays all quotations for leads
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

$page_title = 'Quotations Management';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Quotations Management</h1>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createQuoteModal">
                    <i class="fas fa-plus"></i> Create Quote
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="quotationsTable">
                    <thead class="table-light">
                        <tr>
                            <th>Quote Number</th>
                            <th>Lead Name</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="quotationsTableBody">
                        <!-- Will be populated via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Create Quote Modal -->
<div class="modal fade" id="createQuoteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Quote</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="createQuoteForm" novalidate>
                <div class="modal-body">
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
async function loadQuotations() {
    try {
        const response = await ajax.get('ajax/leads_actions.php', { action: 'get_quotations' });
        if (response.success) {
            renderQuotationsTable(response.data);
        } else {
            showAlert('Failed to load quotations', 'danger');
        }
    } catch (error) {
        console.error('Error loading quotations:', error);
        showAlert('Error loading quotations', 'danger');
    }
}

function renderQuotationsTable(quotations) {
    const tbody = document.getElementById('quotationsTableBody');
    
    if (quotations.length === 0) {
        tbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted">No quotations found</td></tr>';
        return;
    }
    
    tbody.innerHTML = quotations.map(quote => `
        <tr>
            <td>${escapeHtml(quote.quote_number)}</td>
            <td>${escapeHtml(quote.lead_name)}</td>
            <td>${formatCurrency(quote.total_amount)}</td>
            <td><span class="badge bg-${quote.status === 'accepted' ? 'success' : 'warning'}">${quote.status}</span></td>
            <td>
                <button class="btn btn-outline-primary" onclick="viewQuote(${quote.id})">View</button>
                <button class="btn btn-outline-danger" onclick="deleteQuote(${quote.id})">Delete</button>
            </td>
        </tr>
    `).join('');
}

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

// Load quotations on page load
document.addEventListener('DOMContentLoaded', loadQuotations);
</script>
