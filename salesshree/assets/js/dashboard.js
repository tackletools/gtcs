// Dashboard Specific JavaScript Functions
class Dashboard {
    constructor() {
        this.charts = {};
        this.refreshInterval = null;
        this.autoRefreshEnabled = true;
        this.refreshRate = 30000; // 30 seconds
    }

    // Initialize dashboard
    init() {
        this.loadDashboardData();
        this.initializeCharts();
        this.setupAutoRefresh();
        this.setupEventListeners();
        this.loadRecentActivity();
    }

    // Load dashboard data
    async loadDashboardData() {
        try {
            const response = await ajax.get('ajax/dashboard_data.php', {
                action: 'get_dashboard_stats'
            });

            if (response.success) {
                this.updateDashboardStats(response.data);
            }
        } catch (error) {
            console.error('Error loading dashboard data:', error);
        }
    }

    // Update dashboard statistics
    updateDashboardStats(data) {
        // Update stat cards
        this.updateStatCard('total-leads', data.total_leads);
        this.updateStatCard('new-leads', data.new_leads);
        this.updateStatCard('hot-leads', data.hot_leads);
        this.updateStatCard('converted-leads', data.converted_leads);
        this.updateStatCard('pending-followups', data.pending_followups);
        this.updateStatCard('total-quotations', data.total_quotations);
        this.updateStatCard('monthly-revenue', data.monthly_revenue, true);
        this.updateStatCard('conversion-rate', data.conversion_rate + '%');

        // Update charts with new data
        this.updateCharts(data);
    }

    // Update individual stat card
    updateStatCard(cardId, value, isCurrency = false) {
        const card = document.getElementById(cardId);
        if (card) {
            const valueElement = card.querySelector('.stat-value');
            if (valueElement) {
                if (isCurrency) {
                    valueElement.textContent = formatCurrency(value);
                } else {
                    valueElement.textContent = value;
                }
                
                // Add animation effect
                valueElement.classList.add('updated');
                setTimeout(() => {
                    valueElement.classList.remove('updated');
                }, 1000);
            }
        }
    }

    // Initialize charts
    initializeCharts() {
        this.initLeadsChart();
        this.initRevenueChart();
        this.initSourceChart();
        this.initConversionChart();
    }

    // Initialize leads trend chart
    initLeadsChart() {
        const ctx = document.getElementById('leadsChart');
        if (!ctx) return;

        this.charts.leads = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'New Leads',
                    data: [],
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Converted',
                    data: [],
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    }

    // Initialize revenue chart
    initRevenueChart() {
        const ctx = document.getElementById('revenueChart');
        if (!ctx) return;

        this.charts.revenue = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Revenue',
                    data: [],
                    backgroundColor: 'rgba(40, 167, 69, 0.8)',
                    borderColor: '#28a745',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return formatCurrency(value);
                            }
                        }
                    }
                }
            }
        });
    }

    // Initialize lead source chart
    initSourceChart() {
        const ctx = document.getElementById('sourceChart');
        if (!ctx) return;

        this.charts.source = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [],
                datasets: [{
                    data: [],
                    backgroundColor: [
                        '#007bff', '#28a745', '#ffc107', '#dc3545', 
                        '#6f42c1', '#fd7e14', '#20c997', '#e83e8c'
                    ],
                    borderWidth: 2,
                    borderColor: '#fff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });
    }

    // Initialize conversion funnel chart
    initConversionChart() {
        const ctx = document.getElementById('conversionChart');
        if (!ctx) return;

        this.charts.conversion = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['New', 'Contacted', 'Qualified', 'Proposal', 'Negotiation', 'Closed Won'],
                datasets: [{
                    label: 'Leads',
                    data: [],
                    backgroundColor: [
                        '#007bff', '#17a2b8', '#ffc107', '#fd7e14', '#28a745', '#20c997'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                indexAxis: 'y',
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Update charts with new data
    updateCharts(data) {
        // Update leads chart
        if (this.charts.leads && data.leads_trend) {
            this.charts.leads.data.labels = data.leads_trend.labels;
            this.charts.leads.data.datasets[0].data = data.leads_trend.new_leads;
            this.charts.leads.data.datasets[1].data = data.leads_trend.converted;
            this.charts.leads.update();
        }

        // Update revenue chart
        if (this.charts.revenue && data.revenue_trend) {
            this.charts.revenue.data.labels = data.revenue_trend.labels;
            this.charts.revenue.data.datasets[0].data = data.revenue_trend.revenue;
            this.charts.revenue.update();
        }

        // Update source chart
        if (this.charts.source && data.lead_sources) {
            this.charts.source.data.labels = data.lead_sources.labels;
            this.charts.source.data.datasets[0].data = data.lead_sources.data;
            this.charts.source.update();
        }

        // Update conversion chart
        if (this.charts.conversion && data.conversion_funnel) {
            this.charts.conversion.data.datasets[0].data = data.conversion_funnel;
            this.charts.conversion.update();
        }
    }

    // Load recent activity
    async loadRecentActivity() {
        try {
            const response = await ajax.get('ajax/dashboard_data.php', {
                action: 'get_recent_activity'
            });

            if (response.success) {
                this.updateRecentActivity(response.data);
            }
        } catch (error) {
            console.error('Error loading recent activity:', error);
        }
    }

    // Update recent activity list
    updateRecentActivity(activities) {
        const container = document.getElementById('recent-activity');
        if (!container) return;

        if (activities.length === 0) {
            container.innerHTML = '<p class="text-muted">No recent activity</p>';
            return;
        }

        const html = activities.map(activity => `
            <div class="activity-item d-flex align-items-start mb-3">
                <div class="activity-icon me-3">
                    <i class="fas ${this.getActivityIcon(activity.type)} text-${this.getActivityColor(activity.type)}"></i>
                </div>
                <div class="activity-content flex-grow-1">
                    <div class="activity-text">${activity.description}</div>
                    <small class="text-muted">${this.timeAgo(activity.created_at)}</small>
                </div>
            </div>
        `).join('');

        container.innerHTML = html;
    }

    // Get activity icon based on type
    getActivityIcon(type) {
        const icons = {
            'lead_created': 'fa-user-plus',
            'lead_updated': 'fa-user-edit',
            'followup_created': 'fa-calendar-plus',
            'followup_completed': 'fa-check-circle',
            'quote_created': 'fa-file-invoice',
            'lead_converted': 'fa-trophy',
            'user_login': 'fa-sign-in-alt'
        };
        return icons[type] || 'fa-info-circle';
    }

    // Get activity color based on type
    getActivityColor(type) {
        const colors = {
            'lead_created': 'primary',
            'lead_updated': 'info',
            'followup_created': 'warning',
            'followup_completed': 'success',
            'quote_created': 'secondary',
            'lead_converted': 'success',
            'user_login': 'muted'
        };
        return colors[type] || 'muted';
    }

    // Calculate time ago
    timeAgo(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const diffInSeconds = Math.floor((now - date) / 1000);

        if (diffInSeconds < 60) return 'Just now';
        if (diffInSeconds < 3600) return `${Math.floor(diffInSeconds / 60)} minutes ago`;
        if (diffInSeconds < 86400) return `${Math.floor(diffInSeconds / 3600)} hours ago`;
        if (diffInSeconds < 2592000) return `${Math.floor(diffInSeconds / 86400)} days ago`;
        
        return date.toLocaleDateString();
    }

    // Setup auto refresh
    setupAutoRefresh() {
        if (this.autoRefreshEnabled) {
            this.refreshInterval = setInterval(() => {
                this.loadDashboardData();
                this.loadRecentActivity();
            }, this.refreshRate);
        }
    }

    // Toggle auto refresh
    toggleAutoRefresh() {
        this.autoRefreshEnabled = !this.autoRefreshEnabled;
        
        if (this.autoRefreshEnabled) {
            this.setupAutoRefresh();
            showAlert('Auto refresh enabled', 'success');
        } else {
            clearInterval(this.refreshInterval);
            showAlert('Auto refresh disabled', 'info');
        }
        
        this.updateRefreshButton();
    }

    // Update refresh button state
    updateRefreshButton() {
        const btn = document.getElementById('autoRefreshBtn');
        if (btn) {
            btn.classList.toggle('active', this.autoRefreshEnabled);
            btn.title = this.autoRefreshEnabled ? 'Disable auto refresh' : 'Enable auto refresh';
        }
    }

    // Manual refresh
    async manualRefresh() {
        showLoader();
        await this.loadDashboardData();
        await this.loadRecentActivity();
        hideLoader();
        showAlert('Dashboard refreshed', 'success');
    }

    // Setup event listeners
    setupEventListeners() {
        // Auto refresh toggle
        const autoRefreshBtn = document.getElementById('autoRefreshBtn');
        if (autoRefreshBtn) {
            autoRefreshBtn.addEventListener('click', () => this.toggleAutoRefresh());
        }

        // Manual refresh button
        const refreshBtn = document.getElementById('refreshBtn');
        if (refreshBtn) {
            refreshBtn.addEventListener('click', () => this.manualRefresh());
        }

        // Date range filter
        const dateRangeSelect = document.getElementById('dateRange');
        if (dateRangeSelect) {
            dateRangeSelect.addEventListener('change', (e) => {
                this.filterByDateRange(e.target.value);
            });
        }

        // Quick action buttons
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('quick-add-lead')) {
                this.showQuickAddLeadModal();
            }
            
            if (e.target.classList.contains('quick-add-followup')) {
                this.showQuickAddFollowupModal();
            }
        });
    }

    // Filter dashboard by date range
    async filterByDateRange(range) {
        try {
            const response = await ajax.get('ajax/dashboard_data.php', {
                action: 'get_dashboard_stats',
                date_range: range
            });

            if (response.success) {
                this.updateDashboardStats(response.data);
            }
        } catch (error) {
            console.error('Error filtering dashboard data:', error);
        }
    }

    // Show quick add lead modal
    showQuickAddLeadModal() {
        const modal = document.getElementById('quickAddLeadModal');
        if (modal) {
            const bsModal = new bootstrap.Modal(modal);
            bsModal.show();
        } else {
            // Load lead module if modal doesn't exist
            loadModule('leads', { action: 'add' });
        }
    }

    // Show quick add followup modal
    showQuickAddFollowupModal() {
        const modal = document.getElementById('quickAddFollowupModal');
        if (modal) {
            const bsModal = new bootstrap.Modal(modal);
            bsModal.show();
        } else {
            // Load followup module if modal doesn't exist
            loadModule('followups', { action: 'add' });
        }
    }

    // Load upcoming events
    async loadUpcomingEvents() {
        try {
            const response = await ajax.get('ajax/dashboard_data.php', {
                action: 'get_upcoming_events'
            });

            if (response.success) {
                this.updateUpcomingEvents(response.data);
            }
        } catch (error) {
            console.error('Error loading upcoming events:', error);
        }
    }

    // Update upcoming events
    updateUpcomingEvents(events) {
        const container = document.getElementById('upcoming-events');
        if (!container) return;

        if (events.length === 0) {
            container.innerHTML = '<p class="text-muted">No upcoming events</p>';
            return;
        }

        const html = events.map(event => `
            <div class="event-item d-flex justify-content-between align-items-center p-2 mb-2 border rounded">
                <div class="event-details">
                    <div class="event-title fw-bold">${event.title}</div>
                    <small class="text-muted">${formatDate(event.scheduled_date)}</small>
                </div>
                <span class="badge bg-${event.priority === 'high' ? 'danger' : event.priority === 'medium' ? 'warning' : 'secondary'}">
                    ${event.priority}
                </span>
            </div>
        `).join('');

        container.innerHTML = html;
    }

    // Export dashboard data
    async exportDashboardData(format = 'pdf') {
        try {
            showLoader();
            
            const response = await ajax.get('ajax/dashboard_data.php', {
                action: 'export_dashboard',
                format: format
            });

            if (response.success) {
                // Create download link
                const link = document.createElement('a');
                link.href = response.file_url;
                link.download = response.filename;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                
                showAlert('Dashboard exported successfully', 'success');
            } else {
                showAlert('Failed to export dashboard', 'danger');
            }
        } catch (error) {
            showAlert('Error exporting dashboard', 'danger');
        } finally {
            hideLoader();
        }
    }

    // Cleanup when navigating away
    cleanup() {
        if (this.refreshInterval) {
            clearInterval(this.refreshInterval);
        }
        
        // Destroy charts
        Object.values(this.charts).forEach(chart => {
            if (chart) chart.destroy();
        });
        
        this.charts = {};
    }
}

// Create global dashboard instance
const dashboard = new Dashboard();

// Initialize dashboard when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Only initialize if we're on the dashboard page
    if (document.getElementById('dashboard-content') || window.location.pathname.includes('dashboard')) {
        dashboard.init();
    }
});

// Cleanup when page is about to unload
window.addEventListener('beforeunload', function() {
    dashboard.cleanup();
});

// Export dashboard instance for global use
window.dashboard = dashboard;