<?php
/**
 * Junk Leads Page
 * Displays all leads marked as junk
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

$page_title = 'Junk Leads';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Junk Leads</h1>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="junkLeadsTable">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Reason</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="junkLeadsTableBody">
                        <!-- Will be populated via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
async function loadJunkLeads() {
    try {
        const response = await ajax.get('ajax/leads_actions.php', { action: 'get_junk_leads' });
        if (response.success) {
            renderJunkLeadsTable(response.data);
        } else {
            showAlert('Failed to load junk leads', 'danger');
        }
    } catch (error) {
        console.error('Error loading junk leads:', error);
        showAlert('Error loading junk leads', 'danger');
    }
}

function renderJunkLeadsTable(leads) {
    const tbody = document.getElementById('junkLeadsTableBody');
    
    if (leads.length === 0) {
        tbody.innerHTML = '<tr><td colspan="6" class="text-center text-muted">No junk leads found</td></tr>';
        return;
    }
    
    tbody.innerHTML = leads.map(lead => `
        <tr>
            <td>${escapeHtml(lead.name)}</td>
            <td>${lead.email || '-'}</td>
            <td>${lead.phone || '-'}</td>
            <td>${lead.company || '-'}</td>
            <td>${lead.junk_reason || '-'}</td>
            <td>
                <button class="btn btn-outline-danger" onclick="restoreLead(${lead.id})">Restore</button>
            </td>
        </tr>
    `).join('');
}

async function restoreLead(leadId) {
    if (!confirm('Are you sure you want to restore this lead?')) return;
    
    const formData = new FormData();
    formData.append('action', 'restore_lead');
    formData.append('lead_id', leadId);
    
    try {
        const response = await ajax.post('ajax/leads_actions.php', formData);
        if (response.success) {
            showAlert('Lead restored successfully!', 'success');
            loadJunkLeads(); // Refresh junk leads list
        } else {
            showAlert(response.message || 'Failed to restore lead', 'danger');
        }
    } catch (error) {
        showAlert('Error restoring lead', 'danger');
    }
}

// Load junk leads on page load
document.addEventListener('DOMContentLoaded', loadJunkLeads);
</script>
