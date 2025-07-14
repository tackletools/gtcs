<?php
/**
 * Follow-ups Management Page
 * Displays all follow-ups for leads
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

$page_title = 'Follow-ups Management';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Follow-ups Management</h1>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFollowupModal">
                    <i class="fas fa-plus"></i> Add Follow-up
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="followupsTable">
                    <thead class="table-light">
                        <tr>
                            <th>Lead Name</th>
                            <th>Follow-up Date</th>
                            <th>Follow-up Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="followupsTableBody">
                        <!-- Will be populated via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Follow-up Modal -->
<div class="modal fade" id="addFollowupModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Follow-up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addFollowupForm" novalidate>
                <div class="modal-body">
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
async function loadFollowups() {
    try {
        const response = await ajax.get('ajax/leads_actions.php', { action: 'get_followups' });
        if (response.success) {
            renderFollowupsTable(response.data);
        } else {
            showAlert('Failed to load follow-ups', 'danger');
        }
    } catch (error) {
        console.error('Error loading follow-ups:', error);
        showAlert('Error loading follow-ups', 'danger');
    }
}

function renderFollowupsTable(followups) {
    const tbody = document.getElementById('followupsTableBody');
    
    if (followups.length === 0) {
        tbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted">No follow-ups found</td></tr>';
        return;
    }
    
    tbody.innerHTML = followups.map(followup => `
        <tr>
            <td>${escapeHtml(followup.lead_name)}</td>
            <td>${formatDate(followup.followup_date)}</td>
            <td>${followup.followup_time}</td>
            <td><span class="badge bg-${followup.status === 'completed' ? 'success' : 'warning'}">${followup.status}</span></td>
            <td>
                <button class="btn btn-outline-primary" onclick="editFollowup(${followup.id})">Edit</button>
                <button class="btn btn-outline-danger" onclick="deleteFollowup(${followup.id})">Delete</button>
            </td>
        </tr>
    `).join('');
}

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

// Load follow-ups on page load
document.addEventListener('DOMContentLoaded', loadFollowups);
</script>
