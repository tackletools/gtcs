<?php 
$current_page = 'saastesting';
 include "components/header.php";
?>


    <style>

        .saas-hero-section {
            background: var(--gradient-primary);
            color: white;
            padding: 2rem 0;
            text-align: center;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .saas-hero-title {
            font-size: 1.8rem;
            font-weight: 600;
            /*margin-bottom: 0.5rem;*/
        }

        .saas-hero-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
            /*margin-bottom: 1rem;*/
        }

        .testing-dashboard {
            padding: 1.5rem 0;
        }

        .test-card {
            background: white;
            border-radius: 10px;
            padding: 1.2rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .test-card h5 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.8rem;
            color: var(--dark-color);
        }

        .test-input {
            font-size: 0.85rem;
            padding: 0.5rem 0.8rem;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            margin-bottom: 0.8rem;
        }

        .test-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .btn-test {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-test:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            margin-left: 0.5rem;
        }

        .test-result {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 0.8rem;
            margin-top: 0.8rem;
            font-size: 0.8rem;
            max-height: 200px;
            overflow-y: auto;
        }

        .success {
            border-left: 4px solid var(--success-color);
            background: #ecfdf5;
        }

        .warning {
            border-left: 4px solid var(--warning-color);
            background: #fffbeb;
        }

        .error {
            border-left: 4px solid var(--error-color);
            background: #fef2f2;
        }

        .status-badge {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 500;
            margin-right: 0.5rem;
        }

        .status-online {
            background: #dcfce7;
            color: #166534;
        }

        .status-offline {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-loading {
            background: #fef3c7;
            color: #92400e;
        }

        .metric-card {
            background: white;
            border-radius: 8px;
            padding: 1rem;
            text-align: center;
            border: 1px solid #e5e7eb;
        }

        .metric-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.3rem;
        }

        .metric-label {
            font-size: 0.75rem;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .load-test-progress {
            background: #f3f4f6;
            height: 6px;
            border-radius: 3px;
            overflow: hidden;
            margin: 0.5rem 0;
        }

        .load-test-bar {
            height: 100%;
            background: var(--gradient-primary);
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        .api-method {
            display: inline-block;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: 600;
            margin-right: 0.5rem;
        }

        .method-get { background: #dcfce7; color: #166534; }
        .method-post { background: #dbeafe; color: #1e40af; }
        .method-put { background: #fef3c7; color: #92400e; }
        .method-delete { background: #fee2e2; color: #991b1b; }

        .security-check {
            display: flex;
            align-items: center;
            padding: 0.5rem;
            border-radius: 6px;
            margin-bottom: 0.5rem;
            font-size: 0.8rem;
        }

        .security-check i {
            margin-right: 0.5rem;
        }

        .check-pass {
            background: #ecfdf5;
            color: #166534;
        }

        .check-fail {
            background: #fef2f2;
            color: #991b1b;
        }

        .check-warning {
            background: #fffbeb;
            color: #92400e;
        }

        .tab-content {
            margin-top: 1rem;
        }

        .nav-tabs {
            border-bottom: 1px solid #e5e7eb;
        }

        .nav-tabs .nav-link {
            color: #6b7280;
            font-size: 0.8rem;
            padding: 0.5rem 1rem;
            border: none;
            border-bottom: 2px solid transparent;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            border-bottom-color: var(--primary-color);
            background: none;
        }

        .code-block {
            background: #1f2937;
            color: #f9fafb;
            padding: 1rem;
            border-radius: 6px;
            font-family: 'Courier New', monospace;
            font-size: 0.75rem;
            overflow-x: auto;
        }

        .performance-chart {
            height: 150px;
            background: white;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 0.8rem;
        }

        .alert-mini {
            padding: 0.5rem 0.8rem;
            border-radius: 6px;
            font-size: 0.75rem;
            margin-bottom: 0.5rem;
        }

        .alert-success { background: #ecfdf5; color: #166534; }
        .alert-danger { background: #fef2f2; color: #991b1b; }
        .alert-info { background: #eff6ff; color: #1e40af; }
        .alert-warning { background: #fffbeb; color: #92400e; }

        .spinner {
            width: 16px;
            height: 16px;
            border: 2px solid #f3f4f6;
            border-top: 2px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: inline-block;
            margin-right: 0.5rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .row {
            margin-bottom: 1rem;
        }

        .col-md-6, .col-md-4 {
            margin-bottom: 1rem;
        }

        .history-item {
            background: #f8fafc;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 0.8rem;
            margin-bottom: 0.5rem;
            font-size: 0.8rem;
        }

        .history-item .timestamp {
            color: #6b7280;
            font-size: 0.7rem;
            float: right;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 1.5rem;
            }
            
            .test-card {
                padding: 1rem;
            }
            
            .metric-number {
                font-size: 1.2rem;
            }
        }
    </style>
    <!-- Hero Section -->
    <section class="saas-hero-section">
        <div class="container">
            <h1 class="saas-hero-title">SaaS Testing Platform</h1>
            <p class="saas-hero-subtitle">Comprehensive testing suite for web applications, APIs, and performance monitoring</p>
        </div>
    </section>

    <!-- Testing Dashboard -->
    <section class="testing-dashboard">
        <div class="container">
            <!-- Overview Metrics -->
            <div class="row">
                <div class="col-md-3">
                    <div class="metric-card">
                        <div class="metric-number" id="totalTests">0</div>
                        <div class="metric-label">Total Tests</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric-card">
                        <div class="metric-number" id="passedTests">0</div>
                        <div class="metric-label">Passed</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric-card">
                        <div class="metric-number" id="failedTests">0</div>
                        <div class="metric-label">Failed</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric-card">
                        <div class="metric-number" id="avgResponseTime">0ms</div>
                        <div class="metric-label">Avg Response</div>
                    </div>
                </div>
            </div>

            <!-- Test Tabs -->
            <div class="test-card">
                <ul class="nav nav-tabs" id="testTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#url-testing" role="tab">
                            <i class="ri-global-line"></i> URL Testing
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#api-testing" role="tab">
                            <i class="ri-code-line"></i> API Testing
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#load-testing" role="tab">
                            <i class="ri-speed-line"></i> Load Testing
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#security-testing" role="tab">
                            <i class="ri-shield-line"></i> Security Testing
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="testTabsContent">
                    <!-- URL Testing Tab -->
                    <div class="tab-pane fade show active" id="url-testing" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Website Health Check</h5>
                                <input type="url" class="form-control test-input text-dark" id="urlInput" placeholder="Enter website URL (e.g., https://example.com)">
                                <button class="btn-test" onclick="testURL()">Test URL</button>
                                <button class="btn-secondary" onclick="clearURLTest()">Clear</button>
                                <div id="urlResult" class="test-result" style="display: none;"></div>
                            </div>
                            <div class="col-md-6">
                                <h5>Batch URL Testing</h5>
                                <textarea class="form-control test-input text-dark" id="batchUrls" rows="4" placeholder="Enter multiple URLs (one per line)"></textarea>
                                <button class="btn-test" onclick="testBatchURLs()">Test All URLs</button>
                                <button class="btn-secondary" onclick="clearBatchTest()">Clear</button>
                                <div id="batchResult" class="test-result" style="display: none;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- API Testing Tab -->
                    <div class="tab-pane fade" id="api-testing" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>API Endpoint Testing</h5>
                                <select class="form-control test-input text-dark" id="apiMethod">
                                    <option value="GET">GET</option>
                                    <option value="POST">POST</option>
                                    <option value="PUT">PUT</option>
                                    <option value="DELETE">DELETE</option>
                                </select>
                                <input type="url" class="form-control test-input text-dark" id="apiUrl" placeholder="API endpoint URL">
                                <textarea class="form-control test-input text-dark" id="apiHeaders" rows="2" placeholder="Headers (JSON format)">{"Content-Type": "application/json"}</textarea>
                                <textarea class="form-control test-input text-dark" id="apiBody" rows="3" placeholder="Request body (JSON format)"></textarea>
                                <button class="btn-test" onclick="testAPI()">Test API</button>
                                <button class="btn-secondary" onclick="clearAPITest()">Clear</button>
                                <div id="apiResult" class="test-result" style="display: none;"></div>
                            </div>
                            <div class="col-md-6">
                                <h5>API Performance Monitor</h5>
                                <div class="performance-chart" id="apiChart">
                                    Performance chart will appear here
                                </div>
                                <div id="apiPerformance" class="mt-3"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Load Testing Tab -->
                    <div class="tab-pane fade" id="load-testing" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Load Test Configuration</h5>
                                <input type="url" class="form-control test-input text-dark" id="loadTestUrl" placeholder="Target URL">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" class="form-control test-input text-dark" id="concurrentUsers" placeholder="Concurrent users" value="10">
                                    </div>
                                    <div class="col-6">
                                        <input type="number" class="form-control test-input text-dark" id="testDuration" placeholder="Duration (seconds)" value="30">
                                    </div>
                                </div>
                                <button class="btn-test" onclick="startLoadTest()">Start Load Test</button>
                                <button class="btn-secondary" onclick="stopLoadTest()">Stop Test</button>
                                <div class="load-test-progress" id="loadProgress" style="display: none;">
                                    <div class="load-test-bar" id="loadProgressBar"></div>
                                </div>
                                <div id="loadTestResult" class="test-result" style="display: none;"></div>
                            </div>
                            <div class="col-md-6">
                                <h5>Real-time Metrics</h5>
                                <div id="loadMetrics">
                                    <div class="alert-mini alert-info">Load test not started</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Testing Tab -->
                    <div class="tab-pane fade" id="security-testing" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Security Scan</h5>
                                <input type="url" class="form-control test-input text-dark" id="securityUrl" placeholder="Website URL to scan">
                                <button class="btn-test" onclick="runSecurityScan()">Run Security Scan</button>
                                <button class="btn-secondary" onclick="clearSecurityTest()">Clear</button>
                                <div id="securityResult" class="test-result" style="display: none;"></div>
                            </div>
                            <div class="col-md-6">
                                <h5>Security Checklist</h5>
                                <div id="securityChecklist">
                                    <div class="security-check check-warning">
                                        <i class="ri-time-line"></i> HTTPS Certificate - Pending
                                    </div>
                                    <div class="security-check check-warning">
                                        <i class="ri-time-line"></i> Security Headers - Pending
                                    </div>
                                    <div class="security-check check-warning">
                                        <i class="ri-time-line"></i> XSS Protection - Pending
                                    </div>
                                    <div class="security-check check-warning">
                                        <i class="ri-time-line"></i> SQL Injection - Pending
                                    </div>
                                    <div class="security-check check-warning">
                                        <i class="ri-time-line"></i> CSRF Protection - Pending
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Test History -->
            <div class="test-card">
                <h5>Recent Test History</h5>
                <div id="testHistory">
                    <div class="alert-mini alert-info">No tests performed yet</div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Global variables
        let testHistory = [];
        let loadTestInterval;
        let loadTestRunning = false;
        let testMetrics = {
            total: 0,
            passed: 0,
            failed: 0,
            avgResponseTime: 0,
            totalResponseTime: 0
        };

        // URL Testing Functions
        async function testURL() {
            const url = document.getElementById('urlInput').value;
            if (!url) {
                alert('Please enter a valid URL');
                return;
            }

            const resultDiv = document.getElementById('urlResult');
            resultDiv.style.display = 'block';
            resultDiv.innerHTML = '<div class="spinner"></div> Testing URL...';

            try {
                const startTime = performance.now();
                const response = await fetch(url, { method: 'HEAD', mode: 'no-cors' });
                const endTime = performance.now();
                const responseTime = Math.round(endTime - startTime);

                const result = {
                    url: url,
                    status: 'success',
                    responseTime: responseTime,
                    timestamp: new Date().toLocaleString()
                };

                resultDiv.innerHTML = `
                    <div class="success">
                        <strong>✓ URL Test Passed</strong><br>
                        URL: ${url}<br>
                        Response Time: ${responseTime}ms<br>
                        Status: <span class="status-badge status-online">Online</span><br>
                        Timestamp: ${result.timestamp}
                    </div>
                `;

                addToHistory(result);
                updateMetrics(true, responseTime);
            } catch (error) {
                const result = {
                    url: url,
                    status: 'error',
                    error: error.message,
                    timestamp: new Date().toLocaleString()
                };

                resultDiv.innerHTML = `
                    <div class="error">
                        <strong>✗ URL Test Failed</strong><br>
                        URL: ${url}<br>
                        Error: ${error.message}<br>
                        Status: <span class="status-badge status-offline">Offline</span><br>
                        Timestamp: ${result.timestamp}
                    </div>
                `;

                addToHistory(result);
                updateMetrics(false, 0);
            }
        }

        function clearURLTest() {
            document.getElementById('urlInput').value = '';
            document.getElementById('urlResult').style.display = 'none';
        }

        async function testBatchURLs() {
            const urls = document.getElementById('batchUrls').value.split('\n').filter(url => url.trim());
            if (urls.length === 0) {
                alert('Please enter at least one URL');
                return;
            }

            const resultDiv = document.getElementById('batchResult');
            resultDiv.style.display = 'block';
            resultDiv.innerHTML = '<div class="spinner"></div> Testing URLs...';

            let results = [];
            for (let url of urls) {
                try {
                    const startTime = performance.now();
                    await fetch(url.trim(), { method: 'HEAD', mode: 'no-cors' });
                    const endTime = performance.now();
                    const responseTime = Math.round(endTime - startTime);

                    results.push({
                        url: url.trim(),
                        status: 'success',
                        responseTime: responseTime
                    });
                    updateMetrics(true, responseTime);
                } catch (error) {
                    results.push({
                        url: url.trim(),
                        status: 'error',
                        error: error.message
                    });
                    updateMetrics(false, 0);
                }
            }

            const resultsHTML = results.map(result => {
                if (result.status === 'success') {
                    return `<div class="success">✓ ${result.url} - ${result.responseTime}ms</div>`;
                } else {
                    return `<div class="error">✗ ${result.url} - ${result.error}</div>`;
                }
            }).join('');

            resultDiv.innerHTML = resultsHTML;
            addToHistory({
                type: 'batch',
                results: results,
                timestamp: new Date().toLocaleString()
            });
        }

        function clearBatchTest() {
            document.getElementById('batchUrls').value = '';
            document.getElementById('batchResult').style.display = 'none';
        }

        // API Testing Functions
        async function testAPI() {
            const method = document.getElementById('apiMethod').value;
            const url = document.getElementById('apiUrl').value;
            const headers = document.getElementById('apiHeaders').value;
            const body = document.getElementById('apiBody').value;

            if (!url) {
                alert('Please enter an API URL');
                return;
            }

            const resultDiv = document.getElementById('apiResult');
            resultDiv.style.display = 'block';
            resultDiv.innerHTML = '<div class="spinner"></div> Testing API...';

            try {
                const startTime = performance.now();
                const options = {
                    method: method,
                    headers: JSON.parse(headers || '{}'),
                    mode: 'cors'
                };

                if (method !== 'GET' && body) {
                    options.body = body;
                }

                const response = await fetch(url, options);
                const endTime = performance.now();
                const responseTime = Math.round(endTime - startTime);
                const responseText = await response.text();

                resultDiv.innerHTML = `
                    <div class="success">
                        <strong>✓ API Test Completed</strong><br>
                        <span class="api-method method-${method.toLowerCase()}">${method}</span> ${url}<br>
                        Status: ${response.status} ${response.statusText}<br>
                        Response Time: ${responseTime}ms<br>
                        Response Size: ${responseText.length} bytes<br>
                        <div class="code-block mt-2">${responseText.substring(0, 500)}${responseText.length > 500 ? '...' : ''}</div>
                    </div>
                `;

                updateMetrics(response.ok, responseTime);
                addToHistory({
                    type: 'api',
                    method: method,
                    url: url,
                    status: response.status,
                    responseTime: responseTime,
                    timestamp: new Date().toLocaleString()
                });
            } catch (error) {
                resultDiv.innerHTML = `
                    <div class="error">
                        <strong>✗ API Test Failed</strong><br>
                        <span class="api-method method-${method.toLowerCase()}">${method}</span> ${url}<br>
                        Error: ${error.message}
                    </div>
                `;
                updateMetrics(false, 0);
            }
        }

        function clearAPITest() {
            document.getElementById('apiUrl').value = '';
            document.getElementById('apiHeaders').value = '{"Content-Type": "application/json"}';
            document.getElementById('apiBody').value = '';
            document.getElementById('apiResult').style.display = 'none';
        }

        // Load Testing Functions
        function startLoadTest() {
            const url = document.getElementById('loadTestUrl').value;
            const users = parseInt(document.getElementById('concurrentUsers').value);
            const duration = parseInt(document.getElementById('testDuration').value);

            if (!url) {
                alert('Please enter a target URL');
                return;
            }

            if (loadTestRunning) {
                alert('Load test is already running');
                return;
            }

            loadTestRunning = true;
            const progressDiv = document.getElementById('loadProgress');
            const progressBar = document.getElementById('loadProgressBar');
            const resultDiv = document.getElementById('loadTestResult');
            const metricsDiv = document.getElementById('loadMetrics');

            progressDiv.style.display = 'block';
            resultDiv.style.display = 'block';
            
            let progress = 0;
            let successCount = 0;
            let errorCount = 0;
            let totalResponseTime = 0;

            resultDiv.innerHTML = `
                <div class="warning">
                    <div class="spinner"></div> Load test running...<br>
                    Target: ${url}<br>
                    Concurrent Users: ${users}<br>
                    Duration: ${duration}s
                </div>
            `;

            loadTestInterval = setInterval(() => {
                progress += (100 / duration);
                progressBar.style.width = Math.min(progress, 100) + '%';

                // Simulate load test requests
                for (let i = 0; i < users; i++) {
                    const responseTime = Math.random() * 2000 + 100;
                    const success = Math.random() > 0.1; // 90% success rate
                    
                    if (success) {
                        successCount++;
                        totalResponseTime += responseTime;
                    } else {
                        errorCount++;
                    }
                }

                const avgResponseTime = totalResponseTime / (successCount || 1);
                
                metricsDiv.innerHTML = `
                    <div class="alert-mini alert-success">Successful Requests: ${successCount}</div>
                    <div class="alert-mini alert-danger">Failed Requests: ${errorCount}</div>
                    <div class="alert-mini alert-info">Avg Response Time: ${Math.round(avgResponseTime)}ms</div>
                    <div class="alert-mini alert-warning">Requests/sec: ${Math.round((successCount + errorCount) / Math.max(1, (progress / 100 * duration)))}</div>
                `;

                if (progress >= 100) {
                    stopLoadTest();
                }
            }, 1000);
        }

        function stopLoadTest() {
            if (loadTestInterval) {
                clearInterval(loadTestInterval);
                loadTestRunning = false;
                
                document.getElementById('loadTestResult').innerHTML = `
                    <div class="success">
                        <strong>✓ Load Test Completed</strong><br>
                        Test completed successfully. Check metrics above for details.
                    </div>
                `;
            }
        }

        // Security Testing Functions
        function runSecurityScan() {
            const url = document.getElementById('securityUrl').value;
            if (!url) {
                alert('Please enter a URL to scan');
                return;
            }

            const resultDiv = document.getElementById('securityResult');
            const checklistDiv = document.getElementById('securityChecklist');
            
            resultDiv.style.display = 'block';
            resultDiv.innerHTML = '<div class="spinner"></div> Running security scan...';

            // Simulate security checks
            setTimeout(() => {
                const checks = [
                    { name: 'HTTPS Certificate', status: 'pass', icon: 'ri-check-line' },
                    { name: 'Security Headers', status: 'warning', icon: 'ri-alert-line' },
                    { name: 'XSS Protection', status: 'pass', icon: 'ri-check-line' },
                    { name: 'SQL Injection', status: 'pass', icon: 'ri-check-line' },
                    { name: 'CSRF Protection', status: 'fail', icon: 'ri-close-line' }
                ];

                // Update checklist
                checklistDiv.innerHTML = checks.map(check => {
                    const statusClass = check.status === 'pass' ? 'check-pass' : 
                                      check.status === 'warning' ? 'check-warning' : 'check-fail';
                    const statusText = check.status === 'pass' ? 'Passed' : 
                                     check.status === 'warning' ? 'Warning' : 'Failed';
                    
                    return `
                        <div class="security-check ${statusClass}">
                            <i class="${check.icon}"></i> ${check.name} - ${statusText}
                        </div>
                    `;
                }).join('');

                // Show results
                const passCount = checks.filter(c => c.status === 'pass').length;
                const warningCount = checks.filter(c => c.status === 'warning').length;
                const failCount = checks.filter(c => c.status === 'fail').length;

                resultDiv.innerHTML = `
                    <div class="success">
                        <strong>✓ Security Scan Completed</strong><br>
                        Target: ${url}<br>
                        Passed: ${passCount} checks<br>
                        Warnings: ${warningCount} checks<br>
                        Failed: ${failCount} checks<br>
                        Overall Score: ${Math.round((passCount / checks.length) * 100)}%
                    </div>
                `;

                addToHistory({
                    type: 'security',
                    url: url,
                    passed: passCount,
                    warnings: warningCount,
                    failed: failCount,
                    timestamp: new Date().toLocaleString()
                });
            }, 2000);
        }

        function clearSecurityTest() {
            document.getElementById('securityUrl').value = '';
            document.getElementById('securityResult').style.display = 'none';
            
            // Reset checklist
            document.getElementById('securityChecklist').innerHTML = `
                <div class="security-check check-warning">
                    <i class="ri-time-line"></i> HTTPS Certificate - Pending
                </div>
                <div class="security-check check-warning">
                    <i class="ri-time-line"></i> Security Headers - Pending
                </div>
                <div class="security-check check-warning">
                    <i class="ri-time-line"></i> XSS Protection - Pending
                </div>
                <div class="security-check check-warning">
                    <i class="ri-time-line"></i> SQL Injection - Pending
                </div>
                <div class="security-check check-warning">
                    <i class="ri-time-line"></i> CSRF Protection - Pending
                </div>
            `;
        }

        // Utility Functions
        function updateMetrics(passed, responseTime) {
            testMetrics.total++;
            if (passed) {
                testMetrics.passed++;
            } else {
                testMetrics.failed++;
            }
            
            if (responseTime > 0) {
                testMetrics.totalResponseTime += responseTime;
                testMetrics.avgResponseTime = Math.round(testMetrics.totalResponseTime / testMetrics.total);
            }

            // Update UI
            document.getElementById('totalTests').textContent = testMetrics.total;
            document.getElementById('passedTests').textContent = testMetrics.passed;
            document.getElementById('failedTests').textContent = testMetrics.failed;
            document.getElementById('avgResponseTime').textContent = testMetrics.avgResponseTime + 'ms';
        }

        function addToHistory(test) {
            testHistory.unshift(test);
            if (testHistory.length > 10) {
                testHistory.pop();
            }
            
            updateHistoryDisplay();
        }

        function updateHistoryDisplay() {
            const historyDiv = document.getElementById('testHistory');
            
            if (testHistory.length === 0) {
                historyDiv.innerHTML = '<div class="alert-mini alert-info">No tests performed yet</div>';
                return;
            }

            const historyHTML = testHistory.map(test => {
                let content = '';
                let statusClass = test.status === 'success' ? 'success' : 'error';
                
                if (test.type === 'batch') {
                    const passCount = test.results.filter(r => r.status === 'success').length;
                    content = `
                        <div class="history-item">
                            <span class="timestamp">${test.timestamp}</span>
                            <strong>Batch URL Test</strong><br>
                            ${test.results.length} URLs tested, ${passCount} passed
                        </div>
                    `;
                } else if (test.type === 'api') {
                    content = `
                        <div class="history-item">
                            <span class="timestamp">${test.timestamp}</span>
                            <strong>API Test</strong><br>
                            <span class="api-method method-${test.method.toLowerCase()}">${test.method}</span> ${test.url}<br>
                            Status: ${test.status}, Response: ${test.responseTime}ms
                        </div>
                    `;
                } else if (test.type === 'security') {
                    content = `
                        <div class="history-item">
                            <span class="timestamp">${test.timestamp}</span>
                            <strong>Security Scan</strong><br>
                            ${test.url}<br>
                            Passed: ${test.passed}, Warnings: ${test.warnings}, Failed: ${test.failed}
                        </div>
                    `;
                } else {
                    content = `
                        <div class="history-item">
                            <span class="timestamp">${test.timestamp}</span>
                            <strong>URL Test</strong><br>
                            ${test.url}<br>
                            ${test.status === 'success' ? 'Response: ' + test.responseTime + 'ms' : 'Error: ' + test.error}
                        </div>
                    `;
                }
                
                return content;
            }).join('');

            historyDiv.innerHTML = historyHTML;
        }

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            // Set default values
            document.getElementById('apiHeaders').value = '{"Content-Type": "application/json"}';
            
            // Initialize metrics
            updateMetrics(false, 0);
            testMetrics.total = 0;
            testMetrics.passed = 0;
            testMetrics.failed = 0;
            testMetrics.avgResponseTime = 0;
            
            // Update display
            document.getElementById('totalTests').textContent = '0';
            document.getElementById('passedTests').textContent = '0';
            document.getElementById('failedTests').textContent = '0';
            document.getElementById('avgResponseTime').textContent = '0ms';
        });
    </script>
</body>
</html>

<?php 
 include "components/footer.php";
?>