<?php
/**
 * Dashboard Widgets
 * Reusable widget components for dashboard
 */

// Ensure this file is only included from dashboard context
if (!defined('DASHBOARD_CONTEXT')) {
    die('Direct access not allowed');
}

/**
 * Generate a stat card widget
 */
function render_stat_card($id, $title, $icon, $color, $description = '', $link = '') {
    $border_class = "border-{$color}";
    $text_class = "text-{$color}";
    $icon_class = "fas {$icon}";
    
    echo "<div class='col-xl-3 col-lg-6 col-md-6 mb-3'>
        <div class='card stat-card h-100 border-start {$border_class} border-4'>
            <div class='card-body'>";
    
    if ($link) {
        echo "<a href='{$link}' class='text-decoration-none'>";
    }
    
    echo "<div class='d-flex justify-content-between align-items-center'>
                <div>
                    <h6 class='text-muted mb-1'>{$title}</h6>
                    <h3 id='{$id}' class='stat-value mb-0 {$text_class}'>0</h3>
                </div>
                <div class='stat-icon'>
                    <i class='{$icon_class} fa-2x {$text_class} opacity-25'></i>
                </div>
            </div>";
    
    if ($description) {
        echo "<small class='text-muted'>{$description}</small>";
    }
    
    if ($link) {
        echo "</a>";
    }
    
    echo "</div>
        </div>
    </div>";
}

/**
 * Generate a chart widget
 */
function render_chart_widget($id, $title, $icon, $color, $height = '300px', $tools = true, $col_class = 'col-xl-6') {
    $icon_class = "fas {$icon}";
    $text_class = "text-{$color}";
    
    echo "<div class='{$col_class} mb-4'>
        <div class='card h-100'>
            <div class='card-header d-flex justify-content-between align-items-center'>
                <h5 class='card-title mb-0'>
                    <i class='{$icon_class} {$text_class} me-2'></i>
                    {$title}
                </h5>";
    
    if ($tools) {
        echo "<div class='card-tools'>
                <button class='btn btn-sm btn-outline-primary' onclick='dashboard.refreshChart(\"{$id}\")' title='Refresh Chart'>
                    <i class='fas fa-sync-alt'></i>
                </button>
                <div class='dropdown d-inline-block ms-1'>
                    <button class='btn btn-sm btn-outline-secondary dropdown-toggle' type='button' 
                            data-bs-toggle='dropdown' aria-expanded='false' title='Chart Options'>
                        <i class='fas fa-cog'></i>
                    </button>
                    <ul class='dropdown-menu dropdown-menu-end'>
                        <li><a class='dropdown-item' href='#' onclick='dashboard.downloadChart(\"{$id}\", \"png\")'>
                            <i class='fas fa-image me-2'></i>Download PNG
                        </a></li>
                        <li><a class='dropdown-item' href='#' onclick='dashboard.downloadChart(\"{$id}\", \"pdf\")'>
                            <i class='fas fa-file-pdf me-2'></i>Download PDF
                        </a></li>
                        <li><hr class='dropdown-divider'></li>
                        <li><a class='dropdown-item' href='#' onclick='dashboard.toggleChartData(\"{$id}\")'>
                            <i class='fas fa-table me-2'></i>Show Data Table
                        </a></li>
                    </ul>
                </div>
            </div>";
    }
    
    echo "</div>
            <div class='card-body'>
                <canvas id='{$id}Chart' style='height: {$height};'></canvas>
                <div id='{$id}ChartData' class='chart-data-table d-none mt-3'>
                    <!-- Data table will be populated here -->
                </div>
            </div>
        </div>
    </div>";
}

/**
 * Generate activity timeline widget
 */
function render_activity_timeline($col_class = 'col-xl-8') {
    echo "<div class='{$col_class} mb-4'>
        <div class='card h-100'>
            <div class='card-header d-flex justify-content-between align-items-center'>
                <h5 class='card-title mb-0'>
                    <i class='fas fa-history text-secondary me-2'></i>
                    Recent Activity
                </h5>
                <div class='card-tools'>
                    <button class='btn btn-sm btn-outline-secondary' onclick='dashboard.refreshActivity()' title='Refresh Activity'>
                        <i class='fas fa-sync-alt'></i>
                    </button>
                    <a href='#' class='btn btn-sm btn-outline-secondary ms-1' onclick='loadModule(\"reports\", {type: \"activity\"})' title='View All Activities'>
                        <i class='fas fa-external-link-alt'></i>
                        <span class='d-none d-md-inline ms-1'>View All</span>
                    </a>
                </div>
            </div>
            <div class='card-body'>
                <div id='recent-activity' class='activity-timeline'>
                    <!-- Activity items will be loaded here via JavaScript -->
                    <div class='text-center py-4'>
                        <div class='spinner-border spinner-border-sm text-primary' role='status'>
                            <span class='visually-hidden'>Loading...</span>
                        </div>
                        <p class='text-muted mt-2 mb-0'>Loading recent activity...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

/**
 * Generate quick actions widget
 */
function render_quick_actions($col_class = 'col-xl-4') {
    echo "<div class='{$col_class} mb-4'>
        <div class='card mb-3'>
            <div class='card-header'>
                <h5 class='card-title mb-0'>
                    <i class='fas fa-bolt text-warning me-2'></i>
                    Quick Actions
                </h5>
            </div>
            <div class='card-body'>
                <div class='d-grid gap-2'>
                    <button class='btn btn-primary quick-add-lead' type='button' data-bs-toggle='modal' data-bs-target='#quickAddLeadModal'>
                        <i class='fas fa-user-plus me-2'></i>Add New Lead
                    </button>
                    <button class='btn btn-outline-primary quick-add-followup' type='button' onclick='showQuickFollowupModal()'>
                        <i class='fas fa-calendar-plus me-2'></i>Schedule Followup
                    </button>
                    <button class='btn btn-outline-secondary' type='button' onclick='loadModule(\"quotations\", {action: \"add\"})'>
                        <i class='fas fa-file-invoice me-2'></i>Create Quote
                    </button>
                    <button class='btn btn-outline-info' type='button' onclick='loadModule(\"reports\")'>
                        <i class='fas fa-chart-bar me-2'></i>View Reports
                    </button>
                </div>
            </div>
        </div>
    </div>";
}

/**
 * Generate upcoming events widget
 */
function render_upcoming_events($col_class = 'col-xl-4') {
    echo "<div class='{$col_class} mb-4'>
        <div class='card'>
            <div class='card-header d-flex justify-content-between align-items-center'>
                <h5 class='card-title mb-0'>
                    <i class='fas fa-calendar-alt text-info me-2'></i>
                    Upcoming Events
                </h5>
                <div class='card-tools'>
                    <button class='btn btn-sm btn-outline-info' onclick='dashboard.refreshEvents()' title='Refresh Events'>
                        <i class='fas fa-sync-alt'></i>
                    </button>
                    <a href='#' class='btn btn-sm btn-outline-info ms-1' onclick='loadModule(\"followups\", {view: \"calendar\"})' title='Full Calendar'>
                        <i class='fas fa-calendar'></i>
                        <span class='d-none d-md-inline ms-1'>Calendar</span>
                    </a>
                </div>
            </div>
            <div class='card-body'>
                <div id='upcoming-events'>
                    <!-- Events will be loaded here -->
                    <div class='text-center py-3'>
                        <div class='spinner-border spinner-border-sm text-info' role='status'>
                            <span class='visually-hidden'>Loading...</span>
                        </div>
                        <p class='text-muted mt-2 mb-0 small'>Loading events...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

/**
 * Generate notification widget
 */
function render_notifications_widget($col_class = 'col-12') {
    echo "<div class='{$col_class} mb-4'>
        <div class='card'>
            <div class='card-header d-flex justify-content-between align-items-center'>
                <h5 class='card-title mb-0'>
                    <i class='fas fa-bell text-danger me-2'></i>
                    Important Notifications
                    <span id='notification-count' class='badge bg-danger ms-2 d-none'>0</span>
                </h5>
                <div class='card-tools'>
                    <button class='btn btn-sm btn-outline-secondary' onclick='dashboard.markAllNotificationsRead()' title='Mark All Read'>
                        <i class='fas fa-check-double'></i>
                    </button>
                    <button class='btn btn-sm btn-outline-primary ms-1' onclick='loadModule(\"notifications\")' title='View All'>
                        <i class='fas fa-external-link-alt'></i>
                    </button>
                </div>
            </div>
            <div class='card-body p-0'>
                <div id='dashboard-notifications' class='list-group list-group-flush'>
                    <!-- Notifications will be loaded here -->
                    <div class='list-group-item text-center py-3'>
                        <div class='spinner-border spinner-border-sm text-primary' role='status'>
                            <span class='visually-hidden'>Loading...</span>
                        </div>
                        <p class='text-muted mt-2 mb-0 small'>Loading notifications...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

/**
 * Generate performance metrics widget
 */
function render_performance_metrics($col_class = 'col-12') {
    echo "<div class='{$col_class} mb-4'>
        <div class='card'>
            <div class='card-header'>
                <h5 class='card-title mb-0'>
                    <i class='fas fa-tachometer-alt text-success me-2'></i>
                    Performance Metrics
                </h5>
            </div>
            <div class='card-body'>
                <div class='row'>
                    <div class='col-md-3 col-sm-6 mb-3'>
                        <div class='d-flex align-items-center'>
                            <div class='progress-circle me-3'>
                                <div class='progress-circle-inner' data-percentage='0' id='conversion-progress'>
                                    <span class='percentage'>0%</span>
                                </div>
                            </div>
                            <div>
                                <h6 class='mb-0'>Conversion Rate</h6>
                                <small class='text-muted'>This month</small>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-3 col-sm-6 mb-3'>
                        <div class='d-flex align-items-center'>
                            <div class='progress-circle me-3'>
                                <div class='progress-circle-inner' data-percentage='0' id='followup-progress'>
                                    <span class='percentage'>0%</span>
                                </div>
                            </div>
                            <div>
                                <h6 class='mb-0'>Followup Rate</h6>
                                <small class='text-muted'>On time</small>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-3 col-sm-6 mb-3'>
                        <div class='d-flex align-items-center'>
                            <div class='progress-circle me-3'>
                                <div class='progress-circle-inner' data-percentage='0' id='response-progress'>
                                    <span class='percentage'>0%</span>
                                </div>
                            </div>
                            <div>
                                <h6 class='mb-0'>Response Rate</h6>
                                <small class='text-muted'>Within 24h</small>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-3 col-sm-6 mb-3'>
                        <div class='d-flex align-items-center'>
                            <div class='progress-circle me-3'>
                                <div class='progress-circle-inner' data-percentage='0' id='target-progress'>
                                    <span class='percentage'>0%</span>
                                </div>
                            </div>
                            <div>
                                <h6 class='mb-0'>Target Achievement</h6>
                                <small class='text-muted'>Monthly goal</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

/**
 * Generate top performers widget
 */
function render_top_performers($col_class = 'col-xl-6') {
    echo "<div class='{$col_class} mb-4'>
        <div class='card h-100'>
            <div class='card-header d-flex justify-content-between align-items-center'>
                <h5 class='card-title mb-0'>
                    <i class='fas fa-trophy text-warning me-2'></i>
                    Top Performers
                </h5>
                <div class='dropdown'>
                    <button class='btn btn-sm btn-outline-secondary dropdown-toggle' type='button' 
                            data-bs-toggle='dropdown' aria-expanded='false'>
                        This Month
                    </button>
                    <ul class='dropdown-menu dropdown-menu-end'>
                        <li><a class='dropdown-item' href='#' onclick='dashboard.loadTopPerformers(\"week\")'>This Week</a></li>
                        <li><a class='dropdown-item' href='#' onclick='dashboard.loadTopPerformers(\"month\")'>This Month</a></li>
                        <li><a class='dropdown-item' href='#' onclick='dashboard.loadTopPerformers(\"quarter\")'>This Quarter</a></li>
                    </ul>
                </div>
            </div>
            <div class='card-body'>
                <div id='top-performers' class='performers-list'>
                    <!-- Top performers will be loaded here -->
                    <div class='text-center py-3'>
                        <div class='spinner-border spinner-border-sm text-warning' role='status'>
                            <span class='visually-hidden'>Loading...</span>
                        </div>
                        <p class='text-muted mt-2 mb-0 small'>Loading top performers...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

/**
 * Generate recent leads widget
 */
function render_recent_leads($col_class = 'col-xl-6') {
    echo "<div class='{$col_class} mb-4'>
        <div class='card h-100'>
            <div class='card-header d-flex justify-content-between align-items-center'>
                <h5 class='card-title mb-0'>
                    <i class='fas fa-user-friends text-primary me-2'></i>
                    Recent Leads
                </h5>
                <a href='#' class='btn btn-sm btn-outline-primary' onclick='loadModule(\"leads\")'>
                    <i class='fas fa-external-link-alt'></i>
                    <span class='d-none d-md-inline ms-1'>View All</span>
                </a>
            </div>
            <div class='card-body'>
                <div id='recent-leads' class='leads-list'>
                    <!-- Recent leads will be loaded here -->
                    <div class='text-center py-3'>
                        <div class='spinner-border spinner-border-sm text-primary' role='status'>
                            <span class='visually-hidden'>Loading...</span>
                        </div>
                        <p class='text-muted mt-2 mb-0 small'>Loading recent leads...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

/**
 * Generate task list widget
 */
function render_task_list($col_class = 'col-12') {
    echo "<div class='{$col_class} mb-4'>
        <div class='card'>
            <div class='card-header d-flex justify-content-between align-items-center'>
                <h5 class='card-title mb-0'>
                    <i class='fas fa-tasks text-info me-2'></i>
                    Today's Tasks
                    <span id='task-count' class='badge bg-info ms-2'>0</span>
                </h5>
                <div class='card-tools'>
                    <button class='btn btn-sm btn-outline-info' onclick='showAddTaskModal()' title='Add Task'>
                        <i class='fas fa-plus'></i>
                    </button>
                    <button class='btn btn-sm btn-outline-secondary ms-1' onclick='dashboard.refreshTasks()' title='Refresh Tasks'>
                        <i class='fas fa-sync-alt'></i>
                    </button>
                </div>
            </div>
            <div class='card-body'>
                <div id='task-list' class='task-container'>
                    <!-- Tasks will be loaded here -->
                    <div class='text-center py-3'>
                        <div class='spinner-border spinner-border-sm text-info' role='status'>
                            <span class='visually-hidden'>Loading...</span>
                        </div>
                        <p class='text-muted mt-2 mb-0 small'>Loading tasks...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

/**
 * Generate system status widget
 */
function render_system_status($col_class = 'col-12') {
    echo "<div class='{$col_class} mb-4'>
        <div class='card'>
            <div class='card-header'>
                <h5 class='card-title mb-0'>
                    <i class='fas fa-server text-secondary me-2'></i>
                    System Status
                </h5>
            </div>
            <div class='card-body'>
                <div class='row'>
                    <div class='col-md-3 col-sm-6 mb-3'>
                        <div class='status-item'>
                            <div class='d-flex align-items-center'>
                                <div class='status-indicator bg-success me-2'></div>
                                <div>
                                    <h6 class='mb-0'>Database</h6>
                                    <small class='text-muted'>Connected</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-3 col-sm-6 mb-3'>
                        <div class='status-item'>
                            <div class='d-flex align-items-center'>
                                <div class='status-indicator bg-success me-2'></div>
                                <div>
                                    <h6 class='mb-0'>Email Service</h6>
                                    <small class='text-muted'>Online</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-3 col-sm-6 mb-3'>
                        <div class='status-item'>
                            <div class='d-flex align-items-center'>
                                <div class='status-indicator' id='backup-status'></div>
                                <div>
                                    <h6 class='mb-0'>Last Backup</h6>
                                    <small class='text-muted' id='backup-time'>Checking...</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-3 col-sm-6 mb-3'>
                        <div class='status-item'>
                            <div class='d-flex align-items-center'>
                                <div class='status-indicator bg-info me-2'></div>
                                <div>
                                    <h6 class='mb-0'>Storage</h6>
                                    <small class='text-muted' id='storage-usage'>Loading...</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

/**
 * Generate weather widget (optional)
 */
function render_weather_widget($col_class = 'col-xl-3') {
    echo "<div class='{$col_class} mb-4'>
        <div class='card'>
            <div class='card-header'>
                <h5 class='card-title mb-0'>
                    <i class='fas fa-cloud-sun text-warning me-2'></i>
                    Weather
                </h5>
            </div>
            <div class='card-body text-center'>
                <div id='weather-widget'>
                    <div class='spinner-border spinner-border-sm text-warning' role='status'>
                        <span class='visually-hidden'>Loading...</span>
                    </div>
                    <p class='text-muted mt-2 mb-0 small'>Loading weather...</p>
                </div>
            </div>
        </div>
    </div>";
}

/**
 * Generate modals for quick actions
 */
function render_quick_modals() {
    // Quick Add Followup Modal
    echo "<div class='modal fade' id='quickAddFollowupModal' tabindex='-1' aria-labelledby='quickAddFollowupModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='quickAddFollowupModalLabel'>
                        <i class='fas fa-calendar-plus me-2'></i>Quick Schedule Followup
                    </h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <form id='quickAddFollowupForm'>
                        <div class='row'>
                            <div class='col-12 mb-3'>
                                <label for='quick-followup-lead' class='form-label'>Select Lead *</label>
                                <select class='form-select' id='quick-followup-lead' required>
                                    <option value=''>Choose a lead...</option>
                                    <!-- Options will be loaded via JavaScript -->
                                </select>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='quick-followup-date' class='form-label'>Date *</label>
                                <input type='date' class='form-control' id='quick-followup-date' required>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='quick-followup-time' class='form-label'>Time *</label>
                                <input type='time' class='form-control' id='quick-followup-time' required>
                            </div>
                            <div class='col-12 mb-3'>
                                <label for='quick-followup-type' class='form-label'>Type</label>
                                <select class='form-select' id='quick-followup-type'>
                                    <option value='call'>Phone Call</option>
                                    <option value='email'>Email</option>
                                    <option value='meeting'>Meeting</option>
                                    <option value='visit'>Site Visit</option>
                                </select>
                            </div>
                            <div class='col-12 mb-3'>
                                <label for='quick-followup-notes' class='form-label'>Notes</label>
                                <textarea class='form-control' id='quick-followup-notes' rows='3'></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                    <button type='button' class='btn btn-primary' onclick='submitQuickFollowup()'>
                        <i class='fas fa-save me-2'></i>Schedule Followup
                    </button>
                </div>
            </div>
        </div>
    </div>";

    // Quick Add Task Modal
    echo "<div class='modal fade' id='quickAddTaskModal' tabindex='-1' aria-labelledby='quickAddTaskModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='quickAddTaskModalLabel'>
                        <i class='fas fa-plus me-2'></i>Add New Task
                    </h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <form id='quickAddTaskForm'>
                        <div class='row'>
                            <div class='col-12 mb-3'>
                                <label for='quick-task-title' class='form-label'>Task Title *</label>
                                <input type='text' class='form-control' id='quick-task-title' required>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='quick-task-priority' class='form-label'>Priority</label>
                                <select class='form-select' id='quick-task-priority'>
                                    <option value='low'>Low</option>
                                    <option value='medium' selected>Medium</option>
                                    <option value='high'>High</option>
                                    <option value='urgent'>Urgent</option>
                                </select>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='quick-task-due' class='form-label'>Due Date</label>
                                <input type='date' class='form-control' id='quick-task-due'>
                            </div>
                            <div class='col-12 mb-3'>
                                <label for='quick-task-description' class='form-label'>Description</label>
                                <textarea class='form-control' id='quick-task-description' rows='3'></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                    <button type='button' class='btn btn-primary' onclick='submitQuickTask()'>
                        <i class='fas fa-save me-2'></i>Add Task
                    </button>
                </div>
            </div>
        </div>
    </div>";
}
?>