<?php
/**
 * Users Management Page
 * Displays all users in the system
 */

// Check if user is logged in and has the role of admin or manager
if (!is_logged_in() || !has_role('admin') && !has_role('manager')) {
    redirect_to('login.php');
}

$page_title = 'Users Management';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Users Management</h1>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser Modal">
                    <i class="fas fa-plus"></i> Add User
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="usersTable">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        <!-- Will be populated via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUser Modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addUser Form" novalidate>
                <div class="modal-body">
                    <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required>
                        <div class="invalid-feedback">Please enter the user's name.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" required>
                        <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role <span class="text-danger">*</span></label>
                        <select class="form-select" name="role" required>
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="executive">Executive</option>
                        </select>
                        <div class="invalid-feedback">Please select a role.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select" name="status" required>
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <div class="invalid-feedback">Please select a status.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
async function loadUsers() {
    try {
        const response = await ajax.get('ajax/common.php', { action: 'get_users' });
        if (response.success) {
            renderUsersTable(response.data);
        } else {
            showAlert('Failed to load users', 'danger');
        }
    } catch (error) {
        console.error('Error loading users:', error);
        showAlert('Error loading users', 'danger');
    }
}

function renderUsersTable(users) {
    const tbody = document.getElementById('usersTableBody');
    
    if (users.length === 0) {
        tbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted">No users found</td></tr>';
        return;
    }
    
    tbody.innerHTML = users.map(user => `
        <tr>
            <td>${escapeHtml(user.name)}</td>
            <td>${escapeHtml(user.email)}</td>
            <td>${escapeHtml(user.role)}</td>
            <td><span class="badge bg-${user.is_active ? 'success' : 'danger'}">${user.is_active ? 'Active' : 'Inactive'}</span></td>
            <td>
                <button class="btn btn-outline-primary" onclick="editUser (${user.id})">Edit</button>
                <button class="btn btn-outline-danger" onclick="deleteUser (${user.id})">Delete</button>
            </td>
        </tr>
    `).join('');
}

document.getElementById('addUser Form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append('action', 'add_user');
    
    try {
        const response = await ajax.post('ajax/common.php', formData);
        if (response.success) {
            showAlert('User  added successfully!', 'success');
            loadUsers(); // Refresh users list
            this.reset(); // Reset form
            const modal = bootstrap.Modal.getInstance(document.getElementById('addUser Modal'));
            modal.hide();
        } else {
            showAlert(response.message || 'Failed to add user', 'danger');
        }
    } catch (error) {
        showAlert('Error adding user', 'danger');
    }
});

// Load users on page load
document.addEventListener('DOMContentLoaded', loadUsers);
</script>
