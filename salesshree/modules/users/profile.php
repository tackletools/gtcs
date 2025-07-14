<?php
/**
 * User Profile Page
 * Displays the profile information of the logged-in user
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

$page_title = 'User  Profile';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">User  Profile</h1>
    <div class="card">
        <div class="card-body">
            <form id="profileForm" novalidate>
                <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                
                <div class="mb-3">
                    <label class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($_SESSION['user_name']); ?>" required>
                    <div class="invalid-feedback">Please enter your name.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($_SESSION['user_email']); ?>" required>
                    <div class="invalid-feedback">Please enter a valid email.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($_SESSION['user_phone']); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" class="form-control" name="profile_image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="loadModule('dashboard')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('profileForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append('action', 'update_user_info');
    
    try {
        const response = await ajax.post('ajax/common.php', formData);
        if (response.success) {
            showAlert('Profile updated successfully!', 'success');
            // Optionally refresh user info or redirect
        } else {
            showAlert(response.message || 'Failed to update profile', 'danger');
        }
    } catch (error) {
        showAlert('Error updating profile', 'danger');
    }
});
</script>
