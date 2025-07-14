<?php
/**
 * View Quote Page
 * Displays detailed information about a specific quote
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

// Get quote ID from request
$quote_id = (int) ($_GET['id'] ?? 0);
if ($quote_id <= 0) {
    redirect_to('quotations.php');
}

// Fetch quote data
$quote = fetch_single("SELECT * FROM quotations WHERE id = ?", [$quote_id], 'i');
if (!$quote) {
    redirect_to('quotations.php');
}

$page_title = 'View Quote';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">View Quote</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Quote Details</h5>
            <p class="card-text"><strong>Quote Number:</strong> <?php echo htmlspecialchars($quote['quote_number']); ?></p>
            <p class="card-text"><strong>Lead ID:</strong> <?php echo htmlspecialchars($quote['lead_id']); ?></p>
            <p class="card-text"><strong>Total Amount:</strong> <?php echo format_currency($quote['total_amount']); ?></p>
            <p class="card-text"><strong>Status:</strong> <span class="badge bg-<?php echo get_quotation_status_badge($quote['status']); ?>"><?php echo ucfirst($quote['status']); ?></span></p>
            <p class="card-text"><strong>Notes:</strong> <?php echo nl2br(htmlspecialchars($quote['notes'])); ?></p>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <button class="btn btn-secondary" onclick="loadModule('quotations')">Back to Quotations</button>
            <div>
                <button class="btn btn-primary" onclick="editQuote(<?php echo $quote['id']; ?>)">Edit Quote</button>
                <button class="btn btn-danger" onclick="deleteQuote(<?php echo $quote['id']; ?>)">Delete Quote</button>
            </div>
        </div>
    </div>
</div>

<script>
function editQuote(quoteId) {
    loadModule('edit_quote.php?id=' + quoteId);
}

async function deleteQuote(quoteId) {
    if (!confirm('Are you sure you want to delete this quote? This action cannot be undone.')) return;

    const formData = new FormData();
    formData.append('action', 'delete_quote');
    formData.append('quote_id', quoteId);

    try {
        const response = await ajax.post('ajax/leads_actions.php', formData);
        if (response.success) {
            showAlert('Quote deleted successfully!', 'success');
            loadModule('quotations'); // Refresh quotations list
        } else {
            showAlert(response.message || 'Failed to delete quote', 'danger');
        }
    } catch (error) {
        showAlert('Error deleting quote', 'danger');
    }
}
</script>
