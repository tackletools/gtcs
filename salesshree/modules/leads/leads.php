<?php
/**
 * Main Leads Management Page
 * Displays all leads with filtering, sorting, and bulk actions
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

$page_title = 'Leads Management';
$current_module = 'leads';
?>

<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Leads Management</h1>
            <p class="text-muted">Manage your sales leads and prospects</p>
        </div>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-outline-primary" onclick="exportLeads()">
                <i class="fas fa-download"></i> Export
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLeadModal">
                <i class="fas fa-plus"></i> Add Lead
            </button>
        </div>
    </div>

    <!-- Filters Row -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Search</label>
                    <input type="text" class="form-control" id="searchInput" placeholder="Search leads...">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Status</label>
                    <select class="form-select" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="cold">Cold</option>
                        <option value="warm">Warm</option>
                        <option value="hot">Hot</option>
                        <option value="converted">Converted</option>
                        <option value="junk">Junk</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Source</label>
                    <select class="form-select" id="sourceFilter">
                        <option value="">All Sources</option>
                        <option value="website">Website</option>
                        <option value="social_media">Social Media</option>
                        <option value="referral">Referral</option>
                        <option value="cold_call">Cold Call</option>
                        <option value="email">Email</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <?php if (has_role('manager')): ?>
                <div class="col-md-2">
                    <label class="form-label">Assigned To</label>
                    <select class="form-select" id="assignedFilter">
                        <option value="">All Users</option>
                        <option value="0">Unassigned</option>
                        <!-- Will be populated via AJAX -->
                    </select>
                </div>
                <?php endif; ?>
                <div class="col-md-2">
                    <label class="form-label">Per Page</label>
                    <select class="form-select" id="limitSelect">
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <label class="form-label">&nbsp;</label>
                    <button type="button" class="btn btn-outline-secondary d-block w-100" onclick="resetFilters()">
                        <i class="fas fa-refresh"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Actions -->
    <div class="card mb-4" id="bulkActionsCard" style="display: none;">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <span id="selectedCount">0</span> leads selected
                </div>
                <div class="col-md-4">
                    <select class="form-select" id="bulkAction">
                        <option value="">Select Action</option>
                        <option value="cold">Mark as Cold</option>
                        <option value="warm">Mark as Warm</option>
                        <option value="hot">Mark as Hot</option>
                        <option value="junk">Move to Junk</option>
                        <?php if (has_role('manager')): ?>
                        <option value="delete">Delete</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-primary" id="bulkActionBtn">Apply</button>
                        <button type="button" class="btn btn-outline-secondary" onclick="clearSelection()">Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Leads Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="leadsTable">
                    <thead class="table-light">
                        <tr>
                            <th width="30">
                                <input type="checkbox" id="selectAll" class="form-check-input">
                            </th>
                            <th>
                                <a href="#" class="text-decoration-none sort-link" data-sort="name">
                                    Name <i class="fas fa-sort"></i>
                                </a>
                            </th>
                            <th>
                                <a href="#" class="text-decoration-none sort-link" data-sort="email">
                                    Email <i class="fas fa-sort"></i>
                                </a>
                            </th>
                            <th>
                                <a href="#" class="text-decoration-none sort-link" data-sort="phone">
                                    Phone <i class="fas fa-sort"></i>
                                </a>
                            </th>
                            <th>Company</th>
                            <th>
                                <a href="#" class="text-decoration-none sort-link" data-sort="status">
                                    Status <i class="fas fa-sort"></i>
                                </a>
                            </th>
                            <th>
                                <a href="#" class="text-decoration-none sort-link" data-sort="source">
                                    Source <i class="fas fa-sort"></i>
                                </a>
                            </th>
                            <th>Assigned To</th>
                            <th>
                                <a href="#" class="text-decoration-none sort-link" data-sort="created_at">
                                    Created <i class="fas fa-sort"></i>
                                </a>
                            </th>
                            <th width="120">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="leadsTableBody">
                        <!-- Will be populated via AJAX -->
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <nav aria-label="Leads pagination" id="paginationContainer">
                <!-- Will be populated via AJAX -->
            </nav>
        </div>
    </div>
</div>

<!-- Add Lead Modal -->
<div class="modal fade" id="addLeadModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Lead</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addLeadForm" novalidate>
                <div class="modal-body">
                    <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" required>
                                <div class="invalid-feedback">Please enter lead name.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email">
                                <div class="invalid-feedback">Please enter a valid email.</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="tel" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Company</label>
                                <input type="text" class="form-control" name="company">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
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
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Service Interested</label>
                                <input type="text" class="form-control" name="service_interested">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control" name="notes" rows="3"></textarea>
                    </div>
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
async function loadLeads() {
    const params = {
        action: 'get_leads',
        search: document.getElementById('searchInput').value,
        status: document.getElementById('statusFilter').value,
        source: document.getElementById('sourceFilter').value,
        assigned_to: document.getElementById('assignedFilter')?.value || '',
        limit: document.getElementById('limitSelect').value
    };
    
    try {
        const response = await ajax.get('ajax/leads_actions.php', params);
        if (response.success) {
            renderLeadsTable(response.data.leads);
            renderPagination(response.data);
        } else {
            showAlert('Failed to load leads', 'danger');
        }
    } catch (error) {
        console.error('Error loading leads:', error);
        showAlert('Error loading leads', 'danger');
    }
}

function renderLeadsTable(leads) {
    const tbody = document.getElementById('leadsTableBody');
    
    if (leads.length === 0) {
        tbody.innerHTML = '<tr><td colspan="10" class="text-center text-muted py-4">No leads found</td></tr>';
        return;
    }
    
    tbody.innerHTML = leads.map(lead => `
        <tr>
            <td>
                <input type="checkbox" name="selected_leads[]" value="${lead.id}" class="form-check-input">
            </td>
            <td>
                <a href="#" onclick="viewLead(${lead.id})" class="text-decoration-none">
                    ${escapeHtml(lead.name)}
                </a>
            </td>
            <td>${lead.email || '-'}</td>
            <td>${lead.phone || '-'}</td>
            <td>${lead.company || '-'}</td>
            <td>
                <span class="badge bg-${getStatusColor(lead.status)}">${lead.status}</span>
            </td>
            <td>
                <span class="badge bg-secondary">${lead.source}</span>
            </td>
            <td>${lead.assigned_name || 'Unassigned'}</td>
            <td>${formatDate(lead.created_at)}</td>
            <td>
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-outline-primary" onclick="editLead(${lead.id})" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-outline-info" onclick="viewLead(${lead.id})" title="View">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-outline-warning" onclick="duplicateLead(${lead.id})" title="Duplicate">
                        <i class="fas fa-copy"></i>
                    </button>
                    <?php if (has_role('manager')): ?>
                    <button type="button" class="btn btn-outline-danger" onclick="deleteLead(${lead.id})" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
    `).join('');
}

function renderPagination(data) {
    const container = document.getElementById('paginationContainer');
    
    if (data.total_pages <= 1) {
        container.innerHTML = '';
        return;
    }
    
    let pagination = '<ul class="pagination justify-content-center">';
    
    // Previous button
    if (data.page > 1) {
        pagination += `<li class="page-item"><a class="page-link" href="#" onclick="changePage(${data.page - 1})">Previous</a></li>`;
    }
    
    // Page numbers
    const start = Math.max(1, data.page - 2);
    const end = Math.min(data.total_pages, data.page + 2);
    
    for (let i = start; i <= end; i++) {
        const active = i === data.page ? 'active' : '';
        pagination += `<li class="page-item ${active}"><a class="page-link" href="#" onclick="changePage(${i})">${i}</a></li>`;
    }
    
    // Next button
    if (data.page < data.total_pages) {
        pagination += `<li class="page-item"><a class="page-link" href="#" onclick="changePage(${data.page + 1})">Next</a></li>`;
    }
    
    pagination += '</ul>';
    
    // Add info
    const info = `<div class="d-flex justify-content-between align-items-center mb-3">
        <small class="text-muted">Showing ${((data.page - 1) * data.limit) + 1} to ${Math.min(data.page * data.limit, data.total)} of ${data.total} leads</small>
    </div>`;
    
    container.innerHTML = info + pagination;
}

function changePage(page) {
    currentPage = page;
    loadLeads();
}

function updateBulkActions() {
    const selected = document.querySelectorAll('input[name="selected_leads[]"]:checked');
    const count = selected.length;
    const bulkCard = document.getElementById('bulkActionsCard');
    const countSpan = document.getElementById('selectedCount');
    
    if (count > 0) {
        bulkCard.style.display = 'block';
        countSpan.textContent = count;
    } else {
        bulkCard.style.display = 'none';
    }
}

function clearSelection() {
    document.querySelectorAll('input[name="selected_leads[]"]').forEach(cb => cb.checked = false);
    document.getElementById('selectAll').checked = false;
    updateBulkActions();
}

function resetFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('statusFilter').value = '';
    document.getElementById('sourceFilter').value = '';
    if (document.getElementById('assignedFilter')) {
        document.getElementById('assignedFilter').value = '';
    }
    document.getElementById('limitSelect').value = '25';
    currentPage = 1;
    loadLeads();
}

async function editLead(leadId) {
    try {
        const response = await ajax.get('ajax/leads_actions.php', {
            action: 'get_lead',
            lead_id: leadId
        });
        
        if (response.success) {
            const lead = response.data.lead;
            
            // Populate form
            document.getElementById('editLeadId').value = lead.id;
            document.getElementById('editName').value = lead.name;
            document.getElementById('editEmail').value = lead.email || '';
            document.getElementById('editPhone').value = lead.phone || '';
            document.getElementById('editCompany').value = lead.company || '';
            document.getElementById('editSource').value = lead.source;
            document.getElementById('editServiceInterested').value = lead.service_interested || '';
            document.getElementById('editStatus').value = lead.status;
            document.getElementById('editLeadValue').value = lead.lead_value || '';
            document.getElementById('editNotes').value = lead.notes || '';
            
            if (document.getElementById('editAssignedTo')) {
                document.getElementById('editAssignedTo').value = lead.assigned_to || '';
            }
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('editLeadModal'));
            modal.show();
        }
    } catch (error) {
        showAlert('Error loading lead data', 'danger');
    }
}

function viewLead(leadId) {
    // Load lead view page
    loadModule('view_lead.php?id=' + leadId);
}

async function duplicateLead(leadId) {
    if (!confirm('Are you sure you want to duplicate this lead?')) return;
    
    const formData = new FormData();
    formData.append('action', 'duplicate_lead');
    formData.append('lead_id', leadId);
    
    try {
        const response = await ajax.post ('ajax/leads_actions.php', formData);
        if (response.success) {
            showAlert('Lead duplicated successfully!', 'success');
            loadLeads(); // Refresh table
        } else {
            showAlert(response.message || 'Failed to duplicate lead', 'danger');
        }
    } catch (error) {
        console.error('Error duplicating lead:', error);
        showAlert('Error duplicating lead', 'danger');
    }
}

async function deleteLead(leadId) {
    if (!confirm('Are you sure you want to delete this lead? This action cannot be undone.')) return;
    
    const formData = new FormData();
    formData.append('action', 'delete_lead');
    formData.append('lead_id', leadId);
    
    try {
        const response = await ajax.post('ajax/leads_actions.php', formData);
        if (response.success) {
            showAlert('Lead deleted successfully!', 'success');
            loadLeads(); // Refresh table
        } else {
            showAlert(response.message || 'Failed to delete lead', 'danger');
        }
    } catch (error) {
        console.error('Error deleting lead:', error);
        showAlert('Error deleting lead', 'danger');
    }
}
</script>
