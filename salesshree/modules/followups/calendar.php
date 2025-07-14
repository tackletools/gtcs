<?php
/**
 * Follow-ups Calendar Page
 * Displays follow-ups in a calendar format
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

$page_title = 'Follow-ups Calendar';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Follow-ups Calendar</h1>
    <div class="card">
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    loadCalendar();
});

async function loadCalendar() {
    try {
        const response = await ajax.get('ajax/leads_actions.php', { action: 'get_followups_for_calendar' });
        if (response.success) {
            renderCalendar(response.data);
        } else {
            showAlert('Failed to load calendar data', 'danger');
        }
    } catch (error) {
        console.error('Error loading calendar:', error);
        showAlert('Error loading calendar', 'danger');
    }
}

function renderCalendar(followups) {
    const calendarEl = document.getElementById('calendar');
    
    // Initialize FullCalendar or any calendar library here
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: followups.map(followup => ({
            title: followup.lead_name,
            start: followup.followup_date + 'T' + followup.followup_time,
            allDay: true
        })),
        eventClick: function(info) {
            // Handle event click (e.g., view follow-up details)
            viewFollowup(info.event.id);
        }
    });
    
    calendar.render();
}

function viewFollowup(followupId) {
    loadModule('view_followup.php?id=' + followupId);
}
</script>
