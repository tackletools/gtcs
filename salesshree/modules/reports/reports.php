<?php
/**
 * Reports Page
 * Displays reports for leads and their statuses
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

$page_title = 'Reports';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Reports</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Lead Status Report</h5>
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="leadStatusReportTable">
                    <thead class="table-light">
                        <tr>
                            <th>Status</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody id="leadStatusReportBody">
                        <!-- Will be populated via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
async function loadLeadStatusReport() {
    try {
        const response = await ajax.get('ajax/dashboard-data.php', { action: 'get_lead_status_report' });
        if (response.success) {
            renderLeadStatusReport(response.data);
        } else {
            showAlert('Failed to load lead status report', 'danger');
        }
    } catch (error) {
        console.error('Error loading lead status report:', error);
        showAlert('Error loading lead status report', 'danger');
    }
}

function renderLeadStatusReport(data) {
    const tbody = document.getElementById('leadStatusReportBody');
    
    if (data.length === 0) {
        tbody.innerHTML = '<tr><td colspan="2" class="text-center text-muted">No data found</td></tr>';
        return;
    }
    
    tbody.innerHTML = data.map(item => `
        <tr>
            <td>${escapeHtml(item.status)}</td>
            <td>${item.count}</td>
        </tr>
    `).join('');
}

// Load lead status report on page load
document.addEventListener('DOMContentLoaded', loadLeadStatusReport);
</script>
