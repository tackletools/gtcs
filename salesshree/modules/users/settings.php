<?php
/**
 * User Settings Page
 * Allows users to update their account settings
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

$page_title = 'User  Settings';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">User  Settings</h1>
    <div class="card">
        <div class="card-body">
            <form id="settingsForm" novalidate>
                <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                
                <div class="mb-3">
                    <label class="form-label">Change Password</label>
                    <input type="password" class="form-control" name="password" placeholder="New Password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="loadModule('dashboard')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Settings</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('settingsForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append('action', 'update_user_settings');
    
    try {
        const response = await ajax.post('ajax/common.php', formData);
        if (response.success) {
            showAlert('Settings updated successfully!', 'success');
            // Optionally refresh user info or redirect
        } else {
            showAlert(response.message || 'Failed to update settings', 'danger');
        }
    } catch (error) {
        showAlert('Error updating settings', 'danger');
    }
});
</script>
