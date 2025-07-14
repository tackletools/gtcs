// AJAX Handler Functions for Sales CRM
class AjaxHandler {
    constructor() {
        this.baseUrl = '';
        this.defaultHeaders = {
            'X-Requested-With': 'XMLHttpRequest'
        };
    }

    // Generic AJAX request method
    async request(url, options = {}) {
        const defaultOptions = {
            method: 'POST',
            headers: this.defaultHeaders
        };

        const config = { ...defaultOptions, ...options };

        try {
            showLoader();
            const response = await fetch(url, config);
            
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            
            const data = await response.json();
            hideLoader();
            return data;
        } catch (error) {
            hideLoader();
            console.error('AJAX Error:', error);
            showAlert('An error occurred. Please try again.', 'danger');
            throw error;
        }
    }

    // POST request with FormData
    async post(url, formData) {
        return await this.request(url, {
            method: 'POST',
            body: formData
        });
    }

    // GET request
    async get(url, params = {}) {
        const urlParams = new URLSearchParams(params);
        const fullUrl = `${url}${urlParams.toString() ? '?' + urlParams.toString() : ''}`;
        
        return await this.request(fullUrl, {
            method: 'GET'
        });
    }
}

// Create global AJAX handler instance
const ajax = new AjaxHandler();

// Lead Management AJAX Functions
const LeadAjax = {
    // Add new lead
    async addLead(formData) {
        formData.append('action', 'add_lead');
        
        try {
            const response = await ajax.post('ajax/leads_actions.php', formData);
            
            if (response.success) {
                showAlert('Lead added successfully!', 'success');
                if (typeof refreshLeadsTable === 'function') {
                    refreshLeadsTable();
                }
                // Close modal if exists
                const modal = bootstrap.Modal.getInstance(document.getElementById('addLeadModal'));
                if (modal) modal.hide();
                
                // Reset form
                document.getElementById('addLeadForm')?.reset();
            } else {
                showAlert(response.message || 'Failed to add lead', 'danger');
            }
            
            return response;
        } catch (error) {
            showAlert('Error adding lead', 'danger');
            throw error;
        }
    },

    // Update lead
    async updateLead(formData) {
        formData.append('action', 'update_lead');
        
        try {
            const response = await ajax.post('ajax/leads_actions.php', formData);
            
            if (response.success) {
                showAlert('Lead updated successfully!', 'success');
                if (typeof refreshLeadsTable === 'function') {
                    refreshLeadsTable();
                }
            } else {
                showAlert(response.message || 'Failed to update lead', 'danger');
            }
            
            return response;
        } catch (error) {
            showAlert('Error updating lead', 'danger');
            throw error;
        }
    },

    // Delete lead
    async deleteLead(leadId) {
        const formData = new FormData();
        formData.append('action', 'delete_lead');
        formData.append('id', leadId);
        
        try {
            const response = await ajax.post('ajax/leads_actions.php', formData);
            
            if (response.success) {
                showAlert('Lead deleted successfully!', 'success');
                if (typeof refreshLeadsTable === 'function') {
                    refreshLeadsTable();
                }
            } else {
                showAlert(response.message || 'Failed to delete lead', 'danger');
            }
            
            return response;
        } catch (error) {
            showAlert('Error deleting lead', 'danger');
            throw error;
        }
    },

    // Get single lead
    async getLead(leadId) {
        try {
            const response = await ajax.get('ajax/leads_actions.php', {
                action: 'get_lead',
                id: leadId
            });
            
            return response;
        } catch (error) {
            showAlert('Error fetching lead data', 'danger');
            throw error;
        }
    },

    // Update lead status
    async updateStatus(leadId, status) {
        const formData = new FormData();
        formData.append('action', 'update_status');
        formData.append('id', leadId);
        formData.append('status', status);
        
        try {
            const response = await ajax.post('ajax/leads_actions.php', formData);
            
            if (response.success) {
                showAlert('Lead status updated!', 'success');
                if (typeof refreshLeadsTable === 'function') {
                    refreshLeadsTable();
                }
            } else {
                showAlert(response.message || 'Failed to update status', 'danger');
            }
            
            return response;
        } catch (error) {
            showAlert('Error updating status', 'danger');
            throw error;
        }
    },

    // Move lead to junk
    async moveToJunk(leadId) {
        const formData = new FormData();
        formData.append('action', 'move_to_junk');
        formData.append('id', leadId);
        
        try {
            const response = await ajax.post('ajax/leads_actions.php', formData);
            
            if (response.success) {
                showAlert('Lead moved to junk!', 'success');
                if (typeof refreshLeadsTable === 'function') {
                    refreshLeadsTable();
                }
            } else {
                showAlert(response.message || 'Failed to move lead', 'danger');
            }
            
            return response;
        } catch (error) {
            showAlert('Error moving lead to junk', 'danger');
            throw error;
        }
    },

    // Bulk actions
    async bulkAction(action, leadIds) {
        const formData = new FormData();
        formData.append('action', 'bulk_action');
        formData.append('bulk_action', action);
        formData.append('lead_ids', JSON.stringify(leadIds));
        
        try {
            const response = await ajax.post('ajax/leads_actions.php', formData);
            
            if (response.success) {
                showAlert(`Bulk ${action} completed successfully!`, 'success');
                if (typeof refreshLeadsTable === 'function') {
                    refreshLeadsTable();
                }
            } else {
                showAlert(response.message || `Failed to perform bulk ${action}`, 'danger');
            }
            
            return response;
        } catch (error) {
            showAlert(`Error performing bulk ${action}`, 'danger');
            throw error;
        }
    }
};

// Follow-up Management AJAX Functions
const FollowupAjax = {
    // Add follow-up
    async addFollowup(formData) {
        formData.append('action', 'add_followup');
        
        try {
            const response = await ajax.post('ajax/followup_actions.php', formData);
            
            if (response.success) {
                showAlert('Follow-up added successfully!', 'success');
                if (typeof refreshFollowupsTable === 'function') {
                    refreshFollowupsTable();
                }
            } else {
                showAlert(response.message || 'Failed to add follow-up', 'danger');
            }
            
            return response;
        } catch (error) {
            showAlert('Error adding follow-up', 'danger');
            throw error;
        }
    },

    // Update follow-up
    async updateFollowup(formData) {
        formData.append('action', 'update_followup');
        
        try {
            const response = await ajax.post('ajax/followup_actions.php', formData);
            
            if (response.success) {
                showAlert('Follow-up updated successfully!', 'success');
                if (typeof refreshFollowupsTable === 'function') {
                    refreshFollowupsTable();
                }
            } else {
                showAlert(response.message || 'Failed to update follow-up', 'danger');
            }
            
            return response;
        } catch (error) {
            showAlert('Error updating follow-up', 'danger');
            throw error;
        }
    },

    // Mark follow-up as completed
    async markCompleted(followupId) {
        const formData = new FormData();
        formData.append('action', 'mark_completed');
        formData.append('id', followupId);
        
        try {
            const response = await ajax.post('ajax/followup_actions.php', formData);
            
            if (response.success) {
                showAlert('Follow-up marked as completed!', 'success');
                if (typeof refreshFollowupsTable === 'function') {
                    refreshFollowupsTable();
                }
            } else {
                showAlert(response.message || 'Failed to mark follow-up', 'danger');
            }
            
            return response;
        } catch (error) {
            showAlert('Error marking follow-up', 'danger');
            throw error;
        }
    }
};

// Notification AJAX Functions
const NotificationAjax = {
    // Get notifications
    async getNotifications() {
        try {
            const response = await ajax.get('ajax/notifications.php', {
                action: 'get_notifications'
            });
            
            return response;
        } catch (error) {
            console.error('Error fetching notifications:', error);
            throw error;
        }
    },

    // Mark notification as read
    async markRead(notificationId) {
        const formData = new FormData();
        formData.append('action', 'mark_read');
        formData.append('id', notificationId);
        
        try {
            const response = await ajax.post('ajax/notifications.php', formData);
            return response;
        } catch (error) {
            console.error('Error marking notification as read:', error);
            throw error;
        }
    },

    // Mark all notifications as read
    async markAllRead() {
        const formData = new FormData();
        formData.append('action', 'mark_all_read');
        
        try {
            const response = await ajax.post('ajax/notifications.php', formData);
            
            if (response.success) {
                showAlert('All notifications marked as read', 'success');
                updateNotificationBadge(0);
            }
            
            return response;
        } catch (error) {
            showAlert('Error marking notifications as read', 'danger');
            throw error;
        }
    }
};

// Form Submission Handler
function handleFormSubmit(formId, ajaxFunction) {
    const form = document.getElementById(formId);
    if (!form) return;
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (!form.checkValidity()) {
            e.stopPropagation();
            form.classList.add('was-validated');
            return;
        }
        
        const formData = new FormData(form);
        
        try {
            await ajaxFunction(formData);
        } catch (error) {
            console.error('Form submission error:', error);
        }
    });
}

// Initialize AJAX handlers when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize form handlers
    handleFormSubmit('addLeadForm', LeadAjax.addLead);
    handleFormSubmit('editLeadForm', LeadAjax.updateLead);
    handleFormSubmit('addFollowupForm', FollowupAjax.addFollowup);
    handleFormSubmit('editFollowupForm', FollowupAjax.updateFollowup);
    
    // Initialize bulk action handlers
    initializeBulkActions();
    
    // Initialize quick action handlers
    initializeQuickActions();
});

// Initialize bulk action handlers
function initializeBulkActions() {
    const bulkActionBtn = document.getElementById('bulkActionBtn');
    const bulkActionSelect = document.getElementById('bulkAction');
    
    if (bulkActionBtn && bulkActionSelect) {
        bulkActionBtn.addEventListener('click', function() {
            const selectedAction = bulkActionSelect.value;
            const checkedBoxes = document.querySelectorAll('input[name="selected_leads[]"]:checked');
            
            if (!selectedAction) {
                showAlert('Please select an action', 'warning');
                return;
            }
            
            if (checkedBoxes.length === 0) {
                showAlert('Please select at least one lead', 'warning');
                return;
            }
            
            const leadIds = Array.from(checkedBoxes).map(cb => cb.value);
            
            showConfirmation(
                'Confirm Bulk Action',
                `Are you sure you want to ${selectedAction} ${leadIds.length} selected leads?`,
                () => LeadAjax.bulkAction(selectedAction, leadIds)
            );
        });
    }
}

// Initialize quick action handlers
function initializeQuickActions() {
    document.addEventListener('click', function(e) {
        // Status update buttons
        if (e.target.classList.contains('status-btn')) {
            const leadId = e.target.dataset.leadId;
            const status = e.target.dataset.status;
            LeadAjax.updateStatus(leadId, status);
        }
        
        // Delete buttons
        if (e.target.classList.contains('delete-btn')) {
            const leadId = e.target.dataset.leadId;
            showConfirmation(
                'Confirm Delete',
                'Are you sure you want to delete this lead?',
                () => LeadAjax.deleteLead(leadId)
            );
        }
        
        // Move to junk buttons
        if (e.target.classList.contains('junk-btn')) {
            const leadId = e.target.dataset.leadId;
            showConfirmation(
                'Move to Junk',
                'Are you sure you want to move this lead to junk?',
                () => LeadAjax.moveToJunk(leadId)
            );
        }
        
        // Complete followup buttons
        if (e.target.classList.contains('complete-followup-btn')) {
            const followupId = e.target.dataset.followupId;
            FollowupAjax.markCompleted(followupId);
        }
    });
}

// Export AJAX handlers for global use
window.LeadAjax = LeadAjax;
window.FollowupAjax = FollowupAjax;
window.NotificationAjax = NotificationAjax;
window.ajax = ajax;