<?php
/**
 * Analytics Page
 * Displays analytics data for leads and conversions
 */

// Check if user is logged in
if (!is_logged_in()) {
    redirect_to('login.php');
}

$page_title = 'Analytics';
?>

<div class="container-fluid">
    <h1 class="h3 mb-4">Analytics</h1>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Leads Conversion Rate</h5>
                    <canvas id="conversionRateChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Monthly Leads</h5>
                    <canvas id="monthlyLeadsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
async function loadAnalyticsData() {
    try {
        const response = await ajax.get('ajax/dashboard-data.php', { action: 'conversion_chart_data' });
        if (response.success) {
            renderConversionRateChart(response.data);
        } else {
            showAlert('Failed to load conversion rate data', 'danger');
        }

        const monthlyResponse = await ajax.get('ajax/dashboard-data.php', { action: 'lead_chart_data' });
        if (monthlyResponse.success) {
            renderMonthlyLeadsChart(monthlyResponse.data);
        } else {
            showAlert('Failed to load monthly leads data', 'danger');
        }
    } catch (error) {
        console.error('Error loading analytics data:', error);
        showAlert('Error loading analytics data', 'danger');
    }
}

function renderConversionRateChart(data) {
    const ctx = document.getElementById('conversionRateChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: data.labels,
            datasets: [{
                data: data.data,
                backgroundColor: [
                    '#28a745', // Converted
                    '#dc3545', // Not Converted
                ],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
}

function renderMonthlyLeadsChart(data) {
    const ctx = document.getElementById('monthlyLeadsChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: [{
                label: 'Leads',
                data: data.data,
                backgroundColor: '#007bff',
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Load analytics data on page load
document.addEventListener('DOMContentLoaded', loadAnalyticsData);
</script>
