<?php 
$current_page = 'webtesting';
 include "components/header.php";
?>
    <style>
        

        .page-header {
            background: var(--gradient-primary);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 20px 20px;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 0;
        }

        .tool-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 1.5rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .tool-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .tool-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .tool-icon {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.8rem;
            font-size: 1.1rem;
            color: white;
        }

        .tool-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark-color);
            margin: 0;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 0.4rem;
        }

        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 0.5rem 0.75rem;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.1rem rgba(99, 102, 241, 0.25);
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            border-radius: 6px;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #64748b;
            border: none;
            border-radius: 6px;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 500;
            color: white;
        }

        .btn-sm {
            padding: 0.35rem 0.8rem;
            font-size: 0.8rem;
        }

        .result-container {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1rem;
            min-height: 80px;
            display: none;
        }

        .result-container.show {
            display: block;
        }

        .result-success {
            border-left: 4px solid var(--success-color);
            background: #f0fdf4;
        }

        .result-warning {
            border-left: 4px solid var(--warning-color);
            background: #fffbeb;
        }

        .result-error {
            border-left: 4px solid var(--error-color);
            background: #fef2f2;
        }

        .result-title {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }

        .result-text {
            font-size: 0.8rem;
            color: #64748b;
            margin-bottom: 0.5rem;
        }

        .result-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .result-list li {
            padding: 0.25rem 0;
            font-size: 0.8rem;
            color: #64748b;
            border-bottom: 1px solid #e2e8f0;
        }

        .result-list li:last-child {
            border-bottom: none;
        }

        .status-badge {
            display: inline-block;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
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

        .status-slow {
            background: #fef3c7;
            color: #92400e;
        }

        .progress-bar {
            height: 6px;
            background: #e2e8f0;
            border-radius: 3px;
            overflow: hidden;
            margin: 0.5rem 0;
        }

        .progress-fill {
            height: 100%;
            background: var(--primary-color);
            transition: width 0.3s ease;
            border-radius: 3px;
        }

        .metric-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 0.8rem;
            margin-top: 1rem;
        }

        .metric-card {
            background: white;
            padding: 0.8rem;
            border-radius: 8px;
            text-align: center;
            border: 1px solid #e2e8f0;
        }

        .metric-value {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .metric-label {
            font-size: 0.7rem;
            color: #64748b;
            margin-top: 0.2rem;
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #f3f4f6;
            border-top: 2px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-right: 0.5rem;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .tab-container {
            margin-bottom: 1.5rem;
        }

        .tab-buttons {
            display: flex;
            border-bottom: 2px solid #e2e8f0;
            margin-bottom: 1rem;
        }

        .tab-button {
            background: none;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: 500;
            color: #64748b;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .tab-button.active {
            color: var(--primary-color);
            border-bottom-color: var(--primary-color);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 1rem 0;
            }

            .page-header {
                padding: 1.5rem 0;
                margin-bottom: 1.5rem;
            }

            .tool-card {
                padding: 1rem;
                margin-bottom: 1rem;
            }

            .metric-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Specific tool icons */
        .icon-speed { background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%); }
        .icon-seo { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .icon-security { background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); }
        .icon-uptime { background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); }
        .icon-accessibility { background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); }
        .icon-lighthouse { background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); }
    </style>

    <div class="main-container">
        <!-- Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">Web Testing Tools</h1>
                <p class="page-subtitle">Comprehensive web testing suite for performance, SEO, security, and accessibility analysis</p>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!-- Speed Test Tool -->
                <div class="col-lg-6 col-md-12">
                    <div class="tool-card">
                        <div class="tool-header">
                            <div class="tool-icon icon-speed">
                                <i class="ri-speed-line"></i>
                            </div>
                            <h3 class="tool-title">Website Speed Test</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Website URL</label>
                            <input type="url" class="form-control text-dark" id="speedTestUrl" placeholder="https://example.com">
                        </div>
                        <button class="btn btn-primary btn-sm" onclick="runSpeedTest()">
                            <span class="loading-spinner" id="speedLoading"></span>
                            Test Speed
                        </button>
                        <div class="result-container" id="speedResult">
                            <div class="result-title">Speed Analysis Results</div>
                            <div class="metric-grid">
                                <div class="metric-card">
                                    <div class="metric-value" id="loadTime">--</div>
                                    <div class="metric-label">Load Time</div>
                                </div>
                                <div class="metric-card">
                                    <div class="metric-value" id="pageSize">--</div>
                                    <div class="metric-label">Page Size</div>
                                </div>
                                <div class="metric-card">
                                    <div class="metric-value" id="requests">--</div>
                                    <div class="metric-label">Requests</div>
                                </div>
                                <div class="metric-card">
                                    <div class="metric-value" id="speedScore">--</div>
                                    <div class="metric-label">Score</div>
                                </div>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" id="speedProgress"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Analyzer -->
                <div class="col-lg-6 col-md-12">
                    <div class="tool-card">
                        <div class="tool-header">
                            <div class="tool-icon icon-seo">
                                <i class="ri-search-line"></i>
                            </div>
                            <h3 class="tool-title">SEO Analyzer</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Website URL</label>
                            <input type="url" class="form-control text-dark" id="seoTestUrl" placeholder="https://example.com">
                        </div>
                        <button class="btn btn-primary btn-sm" onclick="runSeoTest()">
                            <span class="loading-spinner" id="seoLoading"></span>
                            Analyze SEO
                        </button>
                        <div class="result-container" id="seoResult">
                            <div class="result-title">SEO Analysis Results</div>
                            <ul class="result-list" id="seoList">
                                <li>Title Tag: <span class="status-badge status-online">Found</span></li>
                                <li>Meta Description: <span class="status-badge status-online">Found</span></li>
                                <li>H1 Tag: <span class="status-badge status-online">Found</span></li>
                                <li>Alt Text: <span class="status-badge status-slow">Partial</span></li>
                                <li>Schema Markup: <span class="status-badge status-offline">Missing</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Security Scanner -->
                <div class="col-lg-6 col-md-12">
                    <div class="tool-card">
                        <div class="tool-header">
                            <div class="tool-icon icon-security">
                                <i class="ri-shield-check-line"></i>
                            </div>
                            <h3 class="tool-title">Security Scanner</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Website URL</label>
                            <input type="url" class="form-control text-dark" id="securityTestUrl" placeholder="https://example.com">
                        </div>
                        <button class="btn btn-primary btn-sm" onclick="runSecurityTest()">
                            <span class="loading-spinner" id="securityLoading"></span>
                            Security Scan
                        </button>
                        <div class="result-container" id="securityResult">
                            <div class="result-title">Security Analysis Results</div>
                            <ul class="result-list" id="securityList">
                                <li>SSL Certificate: <span class="status-badge status-online">Valid</span></li>
                                <li>HTTPS Redirect: <span class="status-badge status-online">Active</span></li>
                                <li>Security Headers: <span class="status-badge status-slow">Partial</span></li>
                                <li>Mixed Content: <span class="status-badge status-online">None</span></li>
                                <li>Vulnerability Scan: <span class="status-badge status-online">Clean</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Uptime Monitor -->
                <div class="col-lg-6 col-md-12">
                    <div class="tool-card">
                        <div class="tool-header">
                            <div class="tool-icon icon-uptime">
                                <i class="ri-time-line"></i>
                            </div>
                            <h3 class="tool-title">Uptime Monitor</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Website URL</label>
                            <input type="url" class="form-control text-dark" id="uptimeTestUrl" placeholder="https://example.com">
                        </div>
                        <button class="btn btn-primary btn-sm" onclick="runUptimeTest()">
                            <span class="loading-spinner" id="uptimeLoading"></span>
                            Check Status
                        </button>
                        <div class="result-container" id="uptimeResult">
                            <div class="result-title">Uptime Status</div>
                            <div class="metric-grid">
                                <div class="metric-card">
                                    <div class="metric-value" id="uptime">99.9%</div>
                                    <div class="metric-label">Uptime</div>
                                </div>
                                <div class="metric-card">
                                    <div class="metric-value" id="responseTime">245ms</div>
                                    <div class="metric-label">Response</div>
                                </div>
                                <div class="metric-card">
                                    <div class="metric-value" id="statusCode">200</div>
                                    <div class="metric-label">Status</div>
                                </div>
                                <div class="metric-card">
                                    <div class="metric-value" id="lastCheck">2min</div>
                                    <div class="metric-label">Last Check</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Accessibility Checker -->
                <div class="col-lg-6 col-md-12">
                    <div class="tool-card">
                        <div class="tool-header">
                            <div class="tool-icon icon-accessibility">
                                <i class="ri-wheelchair-line"></i>
                            </div>
                            <h3 class="tool-title">Accessibility Checker</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Website URL</label>
                            <input type="url" class="form-control text-dark" id="accessibilityTestUrl" placeholder="https://example.com">
                        </div>
                        <button class="btn btn-primary btn-sm" onclick="runAccessibilityTest()">
                            <span class="loading-spinner" id="accessibilityLoading"></span>
                            Check A11y
                        </button>
                        <div class="result-container" id="accessibilityResult">
                            <div class="result-title">Accessibility Analysis</div>
                            <ul class="result-list" id="accessibilityList">
                                <li>Color Contrast: <span class="status-badge status-online">Good</span></li>
                                <li>Alt Text: <span class="status-badge status-slow">Needs Work</span></li>
                                <li>Keyboard Navigation: <span class="status-badge status-online">Good</span></li>
                                <li>ARIA Labels: <span class="status-badge status-slow">Partial</span></li>
                                <li>Form Labels: <span class="status-badge status-online">Good</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Lighthouse Audit -->
                <div class="col-lg-6 col-md-12">
                    <div class="tool-card">
                        <div class="tool-header">
                            <div class="tool-icon icon-lighthouse">
                                <i class="ri-flashlight-line"></i>
                            </div>
                            <h3 class="tool-title">Lighthouse Audit</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Website URL</label>
                            <input type="url" class="form-control text-dark" id="lighthouseTestUrl" placeholder="https://example.com">
                        </div>
                        <button class="btn btn-primary btn-sm" onclick="runLighthouseTest()">
                            <span class="loading-spinner" id="lighthouseLoading"></span>
                            Run Audit
                        </button>
                        <div class="result-container" id="lighthouseResult">
                            <div class="result-title">Lighthouse Scores</div>
                            <div class="metric-grid">
                                <div class="metric-card">
                                    <div class="metric-value" id="performanceScore">87</div>
                                    <div class="metric-label">Performance</div>
                                </div>
                                <div class="metric-card">
                                    <div class="metric-value" id="accessibilityScore">92</div>
                                    <div class="metric-label">Accessibility</div>
                                </div>
                                <div class="metric-card">
                                    <div class="metric-value" id="bestPracticesScore">85</div>
                                    <div class="metric-label">Best Practices</div>
                                </div>
                                <div class="metric-card">
                                    <div class="metric-value" id="seoScore">90</div>
                                    <div class="metric-label">SEO</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bulk Testing Section -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="tool-card">
                        <div class="tool-header">
                            <div class="tool-icon" style="background: linear-gradient(135deg, #ec4899 0%, #be185d 100%);">
                                <i class="ri-stack-line"></i>
                            </div>
                            <h3 class="tool-title">Bulk Website Testing</h3>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Multiple URLs (one per line)</label>
                            <textarea class="form-control text-dark" id="bulkUrls" rows="4" placeholder="https://example1.com&#10;https://example2.com&#10;https://example3.com"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Select Tests</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="bulkSpeed" checked>
                                <label class="form-check-label" for="bulkSpeed">Speed Test</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="bulkSeo" checked>
                                <label class="form-check-label" for="bulkSeo">SEO Analysis</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="bulkSecurity">
                                <label class="form-check-label" for="bulkSecurity">Security Scan</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm" onclick="runBulkTest()">
                            <span class="loading-spinner" id="bulkLoading"></span>
                            Run Bulk Tests
                        </button>
                        <div class="result-container" id="bulkResult">
                            <div class="result-title">Bulk Testing Results</div>
                            <div class="result-text">Testing completed for <span id="bulkCount">0</span> websites</div>
                            <div id="bulkResultsList"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simulate API calls with realistic delays and random data
        function showLoading(loadingId) {
            document.getElementById(loadingId).style.display = 'inline-block';
        }

        function hideLoading(loadingId) {
            document.getElementById(loadingId).style.display = 'none';
        }

        function showResult(resultId, className = 'result-success') {
            const resultElement = document.getElementById(resultId);
            resultElement.className = `result-container show ${className}`;
        }

        function runSpeedTest() {
            const url = document.getElementById('speedTestUrl').value;
            if (!url) {
                alert('Please enter a valid URL');
                return;
            }

            showLoading('speedLoading');
            
            setTimeout(() => {
                hideLoading('speedLoading');
                
                // Simulate realistic speed test results
                const loadTime = (Math.random() * 3 + 0.5).toFixed(2);
                const pageSize = (Math.random() * 5 + 1).toFixed(1);
                const requests = Math.floor(Math.random() * 50 + 20);
                const score = Math.floor(Math.random() * 40 + 60);
                
                document.getElementById('loadTime').textContent = loadTime + 's';
                document.getElementById('pageSize').textContent = pageSize + 'MB';
                document.getElementById('requests').textContent = requests;
                document.getElementById('speedScore').textContent = score;
                document.getElementById('speedProgress').style.width = score + '%';
                
                const className = score > 80 ? 'result-success' : score > 60 ? 'result-warning' : 'result-error';
                showResult('speedResult', className);
            }, 2000);
        }

        function runSeoTest() {
            const url = document.getElementById('seoTestUrl').value;
            if (!url) {
                alert('Please enter a valid URL');
                return;
            }

            showLoading('seoLoading');
            
            setTimeout(() => {
                hideLoading('seoLoading');
                showResult('seoResult', 'result-success');
            }, 1500);
        }

        function runSecurityTest() {
            const url = document.getElementById('securityTestUrl').value;
            if (!url) {
                alert('Please enter a valid URL');
                return;
            }

            showLoading('securityLoading');
            
            setTimeout(() => {
                hideLoading('securityLoading');
                showResult('securityResult', 'result-success');
            }, 2500);
        }

        function runUptimeTest() {
            const url = document.getElementById('uptimeTestUrl').value;
            if (!url) {
                alert('Please enter a valid URL');
                return;
            }

            showLoading('uptimeLoading');
            
            setTimeout(() => {
                hideLoading('uptimeLoading');
                showResult('uptimeResult', 'result-success');
            }, 1000);
        }

        function runAccessibilityTest() {
            const url = document.getElementById('accessibilityTestUrl').value;
            if (!url) {
                alert('Please enter a valid URL');
                return;
            }

            showLoading('accessibilityLoading');
            
            setTimeout(() => {
                hideLoading('accessibilityLoading');
                showResult('accessibilityResult', 'result-warning');
            }, 1800);
        }

        function runLighthouseTest() {
            const url = document.getElementById('lighthouseTestUrl').value;
            if (!url) {
                alert('Please enter a valid URL');
                return;
            }

            showLoading('lighthouseLoading');
            
            setTimeout(() => {
                hideLoading('lighthouseLoading');
                showResult('lighthouseResult', 'result-success');
            }, 3000);
        }

        function runBulkTest() {
            const urls = document.getElementById('bulkUrls').value.trim().split('\n').filter(url => url.trim());
            if (urls.length === 0) {
                alert('Please enter at least one URL');
                return;
            }

            showLoading('bulkLoading');
            
            setTimeout(() => {
                hideLoading('bulkLoading');
                document.getElementById('bulkCount').textContent = urls.length;
                
                let resultsHtml = '';
                urls.forEach((url, index) => {
                    const score = Math.floor(Math.random() * 40 + 60);
                    const statusClass = score > 80 ? 'status-online' : score > 60 ? 'status-slow' : 'status-offline';
                    resultsHtml += `
                        <div style="padding: 0.5rem; border-bottom: 1px solid #e2e8f0;">
                            <strong>${url.trim()}</strong>
                            <span class="status-badge ${statusClass}">${score}/100</span>
                        </div>
                    `;
                });
                
                document.getElementById('bulkResultsList').innerHTML = resultsHtml;
                showResult('bulkResult', 'result-success');
            }, 4000);
        }

        // Auto-focus on first input when page loads
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('speedTestUrl').focus();
        });
    </script>
<?php 
 include "components/footer.php";
?>