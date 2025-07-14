<?php
/**
 * Notifications Management Page
 * Displays all notifications for the user
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

$page_title = 'Notifications';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Notifications</h1>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="notificationsTable">
                    <thead class="table-light">
                        <tr>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="notificationsTableBody">
                        <!-- Will be populated via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
async function loadNotifications() {
    try {
        const response = await ajax.get('ajax/notifications.php', { action: 'get_notifications' });
        if (response.success) {
            renderNotificationsTable(response.data.notifications);
        } else {
            showAlert('Failed to load notifications', 'danger');
        }
    } catch (error) {
        console.error('Error loading notifications:', error);
        showAlert('Error loading notifications', 'danger');
    }
}

function renderNotificationsTable(notifications) {
    const tbody = document.getElementById('notificationsTableBody');
    
    if (notifications.length === 0) {
        tbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted">No notifications found</td></tr>';
        return;
    }
    
    tbody.innerHTML = notifications.map(notification => `
        <tr>
            <td>${escapeHtml(notification.title)}</td>
            <td>${escapeHtml(notification.message)}</td>
            <td>${escapeHtml(notification.type)}</td>
            <td><span class="badge bg-${notification.is_read ? 'success' : 'warning'}">${notification.is_read ? 'Read' : 'Unread'}</span></td>
            <td>
                <button class="btn btn-outline-primary" onclick="markNotificationRead(${notification.id})">Mark as Read</button>
                <button class="btn btn-outline-danger" onclick="deleteNotification(${notification.id})">Delete</button>
            </td>
        </tr>
    `).join('');
}

async function markNotificationRead(notificationId) {
    const formData = new FormData();
    formData.append('action', 'mark_read');
    formData.append('notification_id', notificationId);
    
    try {
        const response = await ajax.post('ajax/notifications.php', formData);
        if (response.success) {
            showAlert('Notification marked as read!', 'success');
            loadNotifications(); // Refresh notifications list
        } else {
            showAlert(response.message || 'Failed to mark notification as read', 'danger');
        }
    } catch (error) {
        showAlert('Error marking notification as read', 'danger');
    }
}

async function deleteNotification(notificationId) {
    if (!confirm('Are you sure you want to delete this notification?')) return;

    const formData = new FormData();
    formData.append('action', 'delete_notification');
    formData.append('notification_id', notificationId);

    try {
        const response = await ajax.post('ajax/notifications.php', formData);
        if (response.success) {
            showAlert('Notification deleted successfully!', 'success');
            loadNotifications(); // Refresh notifications list
        } else {
            showAlert(response.message || 'Failed to delete notification', 'danger');
        }
    } catch (error) {
        showAlert('Error deleting notification', 'danger');
    }
}

// Load notifications on page load
document.addEventListener('DOMContentLoaded', loadNotifications);
</script>
