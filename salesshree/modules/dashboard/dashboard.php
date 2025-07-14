<?php
/**
 * Dashboard Main Content
 * Displays key metrics and widgets for the CRM dashboard
 */

// Get user info
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];
$user_name = $_SESSION['user_name'];
?>

<div class="dashboard-content">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-card bg-primary text-white rounded p-4">
                <h2>Welcome back, <?php echo htmlspecialchars($user_name); ?>!</h2>
                <p class="mb-0">Here's what's happening with your sales today.</p>
            </div>
        </div>
    </div>

    <!-- Stats Cards Row -->
    <div class="row mb-4" id="stats-cards">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stat-card bg-white rounded shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-primary text-white rounded-circle p-2 me-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Total Leads</h6>
                        <h3 class="mb-0" id="total-leads">-</h3>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stat-card bg-white rounded shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-danger text-white rounded-circle p-2 me-3">
                        <i class="fas fa-fire"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Hot Leads</h6>
                        <h3 class="mb-0" id="hot-leads">-</h3>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stat-card bg-white rounded shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-success text-white rounded-circle p-2 me-3">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Converted</h6>
                        <h3 class="mb-0" id="converted-leads">-</h3>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="stat-card bg-white rounded shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="stat-icon bg-warning text-white rounded-circle p-2 me-3">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Pending Follow-ups</h6>
                        <h3 class="mb-0" id="pending-followups">-</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Lead Generation Trend</h5>
                    <div class="btn-group btn-group-sm" role="group">
                        <input type="radio" class="btn-check" name="chartPeriod" id="period7" value="7days" checked>
                        <label class="btn btn-outline-primary" for="period7">7 Days</label>
                        
                        <input type="radio" class="btn-check" name="chartPeriod" id="period30" value="30days">
                        <label class="btn btn-outline-primary" for="period30">30 Days</label>
                        
                        <input type="radio" class="btn-check" name="chartPeriod" id="period12" value="12months">
                        <label class="btn btn-outline-primary" for="period12">12 Months</label>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="leadChart" height="100"></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Lead Status Distribution</h5>
                </div>
                <div class="card-body">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Leads</h5>
                    <a href="#" class="btn btn-sm btn-primary" onclick="loadModule('leads')">View All</a>
                </div>
                <div class="card-body p-0">
                    <div id="recent-leads">
                        <div class="text-center p-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Pending Follow-ups</h5>
                    <a href="#" class="btn btn-sm btn-warning" onclick="loadModule('followups')">View All</a>
                </div>
                <div class="card-body p-0">
                    <div id="pending-followups-list">
                        <div class="text-center p-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Row for Quota Progress (if executive) -->
    <?php if ($user_role === 'executive'): ?>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Monthly Quota Progress</h5>
                </div>
                <div class="card-body">
                    <div id="quota-progress">
                        <div class="text-center p-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Top Performers Row (if manager/admin) -->
    <?php if (in_array($user_role, ['admin', 'manager'])): ?>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Top Performers This Month</h5>
                </div>
                <div class="card-body">
                    <div id="top-performers">
                        <div class="text-center p-4">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<script>
$(document).ready(function() {
    // Load dashboard data
    loadDashboardStats();
    loadRecentLeads();
    loadPendingFollowups();
    loadChartData();
    
    <?php if ($user_role === 'executive'): ?>
    loadQuotaProgress();
    <?php endif; ?>
    
    <?php if (in_array($user_role, ['admin', 'manager'])): ?>
    loadTopPerformers();
    <?php endif; ?>
    
    // Chart period change handler
    $('input[name="chartPeriod"]').change(function() {
        loadChartData($(this).val());
    });
});

function loadDashboardStats() {
    $.get('ajax/dashboard_data.php', {action: 'stats'}, function(response) {
        if (response.success) {
            $('#total-leads').text(response.data.total_leads || 0);
            $('#hot-leads').text(response.data.hot_leads || 0);
            $('#converted-leads').text(response.data.converted_leads || 0);
            $('#pending-followups').text(response.data.pending_followups || 0);
        }
    });
}

function loadRecentLeads() {
    $.get('ajax/dashboard_data.php', {action: 'recent_leads', limit: 5}, function(response) {
        if (response.success) {
            let html = '';
            if (response.data.length > 0) {
                response.data.forEach(function(lead) {
                    html += `
                        <div class="d-flex align-items-center p-3 border-bottom">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">${lead.name}</h6>
                                <small class="text-muted">${lead.company || 'N/A'} • ${lead.created_at_formatted}</small>
                            </div>
                            <div class="text-end">
                                ${lead.status_badge}
                            </div>
                        </div>
                    `;
                });
            } else {
                html = '<div class="p-3 text-center text-muted">No recent leads found</div>';
            }
            $('#recent-leads').html(html);
        }
    });
}

function loadPendingFollowups() {
    $.get('ajax/dashboard_data.php', {action: 'pending_followups', limit: 5}, function(response) {
        if (response.success) {
            let html = '';
            if (response.data.length > 0) {
                response.data.forEach(function(followup) {
                    html += `
                        <div class="d-flex align-items-center p-3 border-bottom ${followup.is_overdue ? 'bg-light-danger' : ''}">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">${followup.lead_name}</h6>
                                <small class="text-muted">${followup.followup_date} • ${followup.type}</small>
                            </div>
                            <div class="text-end">
                                ${followup.is_overdue ? '<span class="badge bg-danger">Overdue</span>' : '<span class="badge bg-warning">Pending</span>'}
                            </div>
                        </div>
                    `;
                });
            } else {
                html = '<div class="p-3 text-center text-muted">No pending follow-ups</div>';
            }
            $('#pending-followups-list').html(html);
        }
    });
}

let leadChart = null;
let statusChart = null;

function loadChartData(period = '7days') {
    // Load line chart data
    $.get('ajax/dashboard_data.php', {action: 'lead_chart_data', period: period}, function(response) {
        if (response.success) {
            updateLeadChart(response.data);
        }
    });
    
    // Load pie chart data
    $.get('ajax/dashboard_data.php', {action: 'conversion_chart_data'}, function(response) {
        if (response.success) {
            updateStatusChart(response.data);
        }
    });
}

function updateLeadChart(data) {
    const ctx = document.getElementById('leadChart').getContext('2d');
    
    if (leadChart) {
        leadChart.destroy();
    }
    
    leadChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: data.map(item => item.date),
            datasets: [{
                label: 'Total Leads',
                data: data.map(item => item.count),
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                tension: 0.4
            }, {
                label: 'Converted',
                data: data.map(item => item.converted),
                borderColor: '#28a745',
                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function updateStatusChart(data) {
    const ctx = document.getElementById('statusChart').getContext('2d');
    
    if (statusChart) {
        statusChart.destroy();
    }
    
    statusChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

function loadQuotaProgress() {
    $.get('ajax/dashboard_data.php', {action: 'quota_progress'}, function(response) {
        if (response.success) {
            const data = response.data;
            const html = `
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Progress</span>
                            <span>${data.percentage}%</span>
                        </div>
                        <div class="progress mb-3" style="height: 10px;">
                            <div class="progress-bar" role="progressbar" style="width: ${data.percentage}%" aria-valuenow="${data.percentage}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-end">
                            <h4>${data.achieved_formatted}</h4>
                            <small class="text-muted">of ${data.quota_formatted}</small>
                        </div>
                    </div>
                </div>
            `;
            $('#quota-progress').html(html);
        }
    });
}

function loadTopPerformers() {
    $.get('ajax/dashboard_data.php', {action: 'top_performers', limit: 5}, function(response) {
        if (response.success) {
            let html = '<div class="table-responsive"><table class="table table-sm">';
            html += '<thead><tr><th>Name</th><th>Leads</th><th>Converted</th><th>Rate</th><th>Value</th></tr></thead><tbody>';
            
            if (response.data.length > 0) {
                response.data.forEach(function(performer) {
                    html += `
                        <tr>
                            <td>${performer.name}</td>
                            <td>${performer.total_leads}</td>
                            <td>${performer.converted_leads}</td>
                            <td>${performer.conversion_rate}%</td>
                            <td>${performer.total_quote_value_formatted}</td>
                        </tr>
                    `;
                });
            } else {
                html += '<tr><td colspan="5" class="text-center text-muted">No data available</td></tr>';
            }
            
            html += '</tbody></table></div>';
            $('#top-performers').html(html); 
            
        }
    });
}
</script>