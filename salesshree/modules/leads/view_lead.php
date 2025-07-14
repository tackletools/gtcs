<?php
/**
 * View Lead Page
 * Displays detailed information about a specific lead
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

$page_title = 'View Lead';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">View Lead</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Lead Details</h5>
            <p class="card-text"><strong>Name:</strong> <?php echo htmlspecialchars($lead['name']); ?></p>
            <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($lead['email']); ?></p>
            <p class="card-text"><strong>Phone:</strong> <?php echo htmlspecialchars($lead['phone']); ?></p>
            <p class="card-text"><strong>Company:</strong> <?php echo htmlspecialchars($lead['company']); ?></p>
            <p class="card-text"><strong>Source:</strong> <?php echo htmlspecialchars($lead['source']); ?></p>
            <p class="card-text"><strong>Status:</strong> <span class="badge bg-<?php echo get_status_badge($lead['status']); ?>"><?php echo ucfirst($lead['status']); ?></span></p>
            <p class="card-text"><strong>Service Interested:</strong> <?php echo htmlspecialchars($lead['service_interested']); ?></p>
            <p class="card-text"><strong>Notes:</strong> <?php echo nl2br(htmlspecialchars($lead['notes'])); ?></p>
            <p class="card-text"><strong>Created At:</strong> <?php echo format_datetime($lead['created_at']); ?></p>
            <p class="card-text"><strong>Assigned To:</strong> <?php echo htmlspecialchars($lead['assigned_name'] ?? 'Unassigned'); ?></p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <button class="btn btn-secondary" onclick="loadModule('leads')">Back to Leads</button>
            <div>
                <button class="btn btn-primary" onclick="editLead(<?php echo $lead['id']; ?>)">Edit Lead</button>
                <button class="btn btn-danger" onclick="deleteLead(<?php echo $lead['id']; ?>)">Delete Lead</button>
            </div>
        </div>
    </div>
</div>

<script>
function editLead(leadId) {
    loadModule('edit-lead.php?id=' + leadId);
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
            loadModule('leads'); // Refresh leads list
        } else {
            showAlert(response.message || 'Failed to delete lead', 'danger');
        }
    } catch (error) {
        showAlert('Error deleting lead', 'danger');
    }
}
</script>
