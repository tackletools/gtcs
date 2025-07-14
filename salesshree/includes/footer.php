</div> <!-- End main-content if not closed -->

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery (for AJAX) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Global variables
        let currentModule = 'dashboard';
        let isLoading = false;
        
        // Page loader functions
        function showLoader() {
            document.getElementById('pageLoader').style.display = 'flex';
        }
        
        function hideLoader() {
            document.getElementById('pageLoader').style.display = 'none';
        }
        
        // AJAX Module Loader
        function loadModule(module, data = {}) {
            if (isLoading) return;
            
            isLoading = true;
            currentModule = module;
            
            // Show loading in content area
            document.getElementById('contentArea').innerHTML = `
                <div class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            `;
            
            // Update navigation
            updateActiveNav(module);
            
            // AJAX request - FIXED VERSION
            $.ajax({
                url: 'ajax/load_module.php',
                type: 'POST',
                data: {
                    module: module,
                    ...data
                },
                dataType: 'json', // ✅ Changed from 'html' to 'json'
                success: function(response) {
                    if (response.success) {
                        // ✅ Now accessing response.content instead of response directly
                        document.getElementById('contentArea').innerHTML = response.content;
                        isLoading = false;
                        
                        // Trigger custom events for loaded modules
                        $(document).trigger('moduleLoaded', [module]);
                    } else {
                        // ✅ Handle PHP errors properly
                        document.getElementById('contentArea').innerHTML = `
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Error Loading Module</h4>
                                <p>${response.message || 'Unknown error occurred'}</p>
                            </div>
                        `;
                        isLoading = false;
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', xhr.responseText); // ✅ Better error logging
                    document.getElementById('contentArea').innerHTML = `
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Error Loading Module</h4>
                            <p>Sorry, there was an error loading the ${module} module. Please try again.</p>
                            <hr>
                            <p class="mb-0">Error: ${error}</p>
                            <small class="text-muted">Check browser console for more details</small>
                        </div>
                    `;
                    isLoading = false;
                }
            });
        }
        
        // Show notification
        function showNotification(message, type = 'info', duration = 5000) {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
            notification.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            
            document.body.appendChild(notification);
            
            // Auto remove after duration
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, duration);
        }
        
        // Confirm dialog
        function confirmAction(message, callback) {
            if (confirm(message)) {
                callback();
            }
        }
        
        // Format currency
        function formatCurrency(amount) {
            return new Intl.NumberFormat('en-IN', {
                style: 'currency',
                currency: 'INR'
            }).format(amount);
        }
        
        // Format date
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('en-IN', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            });
        }
        
        // AJAX form submission helper
        function submitForm(formId, successCallback, errorCallback) {
            const form = document.getElementById(formId);
            const formData = new FormData(form);
            
            $.ajax({
                url: form.action,
                type: form.method,
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        showNotification(response.message, 'success');
                        if (successCallback) successCallback(response);
                    } else {
                        showNotification(response.message, 'danger');
                        if (errorCallback) errorCallback(response);
                    }
                },
                error: function(xhr, status, error) {
                    showNotification('An error occurred. Please try again.', 'danger');
                    if (errorCallback) errorCallback({error: error});
                }
            });
        }
        
        // Auto-refresh notifications
        function loadNotifications() {
            $.ajax({
                url: 'ajax/notifications.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        updateNotificationBadge(response.count);
                        updateNotificationDropdown(response.notifications);
                    }
                }
            });
        }
        
        function updateNotificationBadge(count) {
            const badge = document.querySelector('.badge.bg-danger');
            if (badge) {
                badge.textContent = count;
                badge.style.display = count > 0 ? 'block' : 'none';
            }
        }
        
        function updateNotificationDropdown(notifications) {
            const dropdown = document.querySelector('.dropdown-menu');
            if (dropdown && notifications) {
                let html = '<li><h6 class="dropdown-header">Notifications</h6></li>';
                
                if (notifications.length > 0) {
                    notifications.forEach(notification => {
                        html += `<li><a class="dropdown-item" href="#"><small>${notification.title}</small></a></li>`;
                    });
                } else {
                    html += '<li><span class="dropdown-item-text">No new notifications</span></li>';
                }
                
                html += '<li><hr class="dropdown-divider"></li>';
                html += '<li><a class="dropdown-item text-center" href="#" onclick="loadModule(\'notifications\')">View All</a></li>';
                
                dropdown.innerHTML = html;
            }
        }
        
        // Auto-save form data to localStorage (for drafts)
        function autoSaveForm(formId, interval = 30000) {
            setInterval(() => {
                const form = document.getElementById(formId);
                if (form) {
                    const formData = new FormData(form);
                    const data = {};
                    formData.forEach((value, key) => {
                        data[key] = value;
                    });
                    localStorage.setItem(`draft_${formId}`, JSON.stringify(data));
                }
            }, interval);
        }
        
        // Load saved form data
        function loadSavedForm(formId) {
            const saved = localStorage.getItem(`draft_${formId}`);
            if (saved) {
                const data = JSON.parse(saved);
                const form = document.getElementById(formId);
                if (form) {
                    Object.keys(data).forEach(key => {
                        const field = form.querySelector(`[name="${key}"]`);
                        if (field) {
                            field.value = data[key];
                        }
                    });
                }
            }
        }
        
        // Clear saved form data
        function clearSavedForm(formId) {
            localStorage.removeItem(`draft_${formId}`);
        }
        
        // Initialize page
        $(document).ready(function() {
            // Hide loader after page loads
            setTimeout(() => {
                hideLoader();
                // Load default dashboard
                loadModule('dashboard');
            }, 1000);
            
            // Load notifications every 30 seconds
            loadNotifications();
            setInterval(loadNotifications, 30000);
            
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Auto-dismiss alerts after 5 seconds
            $('.alert').delay(5000).slideUp(300);
        });
        
        // Handle browser back/forward buttons
        window.addEventListener('popstate', function(event) {
            if (event.state && event.state.module) {
                loadModule(event.state.module);
            }
        });
        
        // Update browser history when loading modules
        function updateHistory(module) {
            const url = new URL(window.location);
            url.searchParams.set('module', module);
            history.pushState({module: module}, '', url);
        }
        
        // Keyboard shortcuts
        document.addEventListener('keydown', function(event) {
            // Ctrl/Cmd + K for quick search
            if ((event.ctrlKey || event.metaKey) && event.key === 'k') {
                event.preventDefault();
                // Focus on search input if available
                const searchInput = document.querySelector('input[type="search"]');
                if (searchInput) {
                    searchInput.focus();
                }
            }
            
            // Escape to close modals
            if (event.key === 'Escape') {
                const modals = document.querySelectorAll('.modal.show');
                modals.forEach(modal => {
                    const modalInstance = bootstrap.Modal.getInstance(modal);
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                });
            }
        });
        
        // Performance monitoring
        function logPerformance(action, startTime) {
            const endTime = performance.now();
            const duration = endTime - startTime;
            console.log(`${action} took ${duration.toFixed(2)} milliseconds`);
        }
        // Update active navigation
        function updateActiveNav(module) {
            // Remove active class from all nav items
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            
            // Add active class to current module
            const currentNavLink = document.querySelector(`[data-module="${module}"]`) || 
                                  document.querySelector(`[href*="${module}"]`);
            if (currentNavLink) {
                currentNavLink.classList.add('active');
            }
        }
        // Export functions for global use
        window.CRM = {
            loadModule,
            showNotification,
            confirmAction,
            formatCurrency,
            formatDate,
            submitForm,
            autoSaveForm,
            loadSavedForm,
            clearSavedForm,
            logPerformance
        };
    </script>
    
    <!-- Module-specific scripts will be loaded here -->
    <div id="moduleScripts"></div>
    
    <!-- Footer -->
    <footer class="text-center py-3 mt-5 border-top">
        <small class="text-muted">
            &copy; <?php echo date('Y'); ?> Sales CRM. All rights reserved. 
            <span class="d-none d-md-inline">| Version 1.0 | Powered by PHP & Bootstrap</span>
        </small>
    </footer>
    <script src="assets/js/dashboard.js"></script>
    <!--<script src="assets/js/main.js"></script>-->
    <script src="assets/js/ajax.js"></script>

</body>
</html>