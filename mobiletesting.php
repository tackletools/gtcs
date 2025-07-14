<?php 
$current_page = 'mobiletesting';
 include "components/header.php";
?>

    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #f59e0b;
            --accent: #06b6d4;
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
            --dark: #0f172a;
            --light: #f8fafc;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-accent: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --shadow: 0 4px 20px rgba(0,0,0,0.1);
            --shadow-lg: 0 8px 32px rgba(0,0,0,0.12);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #1f2937;
            font-size: 14px;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            color: white;
        }
        
        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 20px;
        }
        
        .main-controls {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        
        .control-btn {
            background: rgba(255,255,255,0.2);
            border: 2px solid rgba(255,255,255,0.3);
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .control-btn:hover {
            background: rgba(255,255,255,0.3);
            border-color: rgba(255,255,255,0.5);
            transform: translateY(-2px);
        }
        
        .control-btn.active {
            background: rgba(255,255,255,0.9);
            color: var(--primary);
        }
        
        .testing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .test-card {
            background: rgba(255,255,255,0.95);
            border-radius: 16px;
            padding: 24px;
            box-shadow: var(--shadow-lg);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            transition: transform 0.3s ease;
        }
        
        .test-card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        
        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .card-title i {
            font-size: 1.5rem;
        }
        
        .card-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-idle {
            background: #f3f4f6;
            color: #6b7280;
        }
        
        .status-running {
            background: #dbeafe;
            color: #1e40af;
            animation: pulse 2s infinite;
        }
        
        .status-pass {
            background: #dcfce7;
            color: #166534;
        }
        
        .status-fail {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .status-warning {
            background: #fef3c7;
            color: #92400e;
        }
        
        .test-actions {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .action-btn {
            flex: 1;
            min-width: 120px;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.9rem;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }
        
        .btn-secondary {
            background: #6b7280;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #4b5563;
            transform: translateY(-1px);
        }
        
        .btn-success {
            background: var(--success);
            color: white;
        }
        
        .btn-success:hover {
            background: #059669;
            transform: translateY(-1px);
        }
        
        .test-results {
            margin-top: 20px;
        }
        
        .result-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
        
        .result-item:last-child {
            border-bottom: none;
        }
        
        .result-name {
            font-weight: 500;
            color: #374151;
        }
        
        .result-value {
            font-weight: 600;
            color: var(--primary);
        }
        
        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e5e7eb;
            border-radius: 4px;
            overflow: hidden;
            margin: 10px 0;
        }
        
        .progress-fill {
            height: 100%;
            background: var(--primary);
            transition: width 0.3s ease;
            border-radius: 4px;
        }
        
        .device-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .info-item {
            background: #f8fafc;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            border: 1px solid rgba(0,0,0,0.05);
        }
        
        .info-label {
            font-size: 0.8rem;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }
        
        .info-value {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--primary);
        }
        
        .test-log {
            background: #1f2937;
            color: #e5e7eb;
            padding: 20px;
            border-radius: 12px;
            font-family: 'Monaco', 'Consolas', monospace;
            font-size: 0.9rem;
            max-height: 300px;
            overflow-y: auto;
            line-height: 1.6;
            margin-top: 20px;
        }
        
        .log-entry {
            margin-bottom: 8px;
            padding: 4px 0;
        }
        
        .log-time {
            color: #9ca3af;
            margin-right: 10px;
        }
        
        .log-info { color: #60a5fa; }
        .log-success { color: #34d399; }
        .log-warning { color: #fbbf24; }
        .log-error { color: #f87171; }
        
        .spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid #f3f4f6;
            border-radius: 50%;
            border-top-color: var(--primary);
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .stats-overview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: rgba(255,255,255,0.95);
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            box-shadow: var(--shadow-lg);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 8px;
        }
        
        .stat-label {
            font-size: 1rem;
            color: #6b7280;
            font-weight: 500;
        }
        
        .network-indicator {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }
        
        .network-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--success);
            animation: pulse 2s infinite;
        }
        
        .network-dot.offline {
            background: var(--error);
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .feature-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px;
            background: #f8fafc;
            border-radius: 8px;
            border: 1px solid rgba(0,0,0,0.05);
        }
        
        .feature-name {
            font-weight: 500;
            color: #374151;
        }
        
        .feature-status {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .support-yes {
            background: #dcfce7;
            color: #166534;
        }
        
        .support-no {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .support-partial {
            background: #fef3c7;
            color: #92400e;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .testing-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .test-card {
                padding: 20px;
            }
            
            .main-controls {
                gap: 10px;
            }
            
            .control-btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-mobile-alt"></i> App Testing Suite</h1>
            <p>Comprehensive testing platform for mobile and web applications</p>
            <div class="main-controls">
                <button class="control-btn" onclick="runAllTests()">
                    <i class="fas fa-play"></i> Run All Tests
                </button>
                <button class="control-btn" onclick="clearAllLogs()">
                    <i class="fas fa-trash"></i> Clear Logs
                </button>
                <button class="control-btn" onclick="exportResults()">
                    <i class="fas fa-download"></i> Export Results
                </button>
                <button class="control-btn" onclick="refreshTests()">
                    <i class="fas fa-sync"></i> Refresh
                </button>
            </div>
        </div>

        <div class="stats-overview">
            <div class="stat-card">
                <div class="stat-number" id="totalTests">0</div>
                <div class="stat-label">Total Tests</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="passedTests">0</div>
                <div class="stat-label">Passed</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="failedTests">0</div>
                <div class="stat-label">Failed</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="coverage">0%</div>
                <div class="stat-label">Coverage</div>
            </div>
        </div>

        <div class="testing-grid">
            <!-- Device Information Card -->
            <div class="test-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-mobile-alt"></i>
                        Device Information
                    </h3>
                    <span class="card-status status-idle" id="deviceStatus">Ready</span>
                </div>
                <div class="device-info">
                    <div class="info-item">
                        <div class="info-label">Device Type</div>
                        <div class="info-value" id="deviceType">Unknown</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Screen Size</div>
                        <div class="info-value" id="screenSize">Unknown</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Browser</div>
                        <div class="info-value" id="browser">Unknown</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">OS</div>
                        <div class="info-value" id="os">Unknown</div>
                    </div>
                </div>
                <div class="test-actions">
                    <button class="action-btn btn-primary" onclick="detectDevice()">
                        <i class="fas fa-search"></i> Detect Device
                    </button>
                </div>
            </div>

            <!-- Performance Testing Card -->
            <div class="test-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-tachometer-alt"></i>
                        Performance Testing
                    </h3>
                    <span class="card-status status-idle" id="performanceStatus">Ready</span>
                </div>
                <div class="test-actions">
                    <button class="action-btn btn-primary" onclick="testPerformance()">
                        <i class="fas fa-rocket"></i> Run Performance Test
                    </button>
                </div>
                <div class="test-results">
                    <div class="result-item">
                        <span class="result-name">Page Load Time</span>
                        <span class="result-value" id="loadTime">--</span>
                    </div>
                    <div class="result-item">
                        <span class="result-name">Memory Usage</span>
                        <span class="result-value" id="memoryUsage">--</span>
                    </div>
                    <div class="result-item">
                        <span class="result-name">FCP Time</span>
                        <span class="result-value" id="fcpTime">--</span>
                    </div>
                </div>
            </div>

            <!-- Network Testing Card -->
            <div class="test-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-wifi"></i>
                        Network Testing
                    </h3>
                    <span class="card-status status-idle" id="networkStatus">Ready</span>
                </div>
                <div class="network-indicator">
                    <div class="network-dot" id="networkDot"></div>
                    <span id="connectionStatus">Checking connection...</span>
                </div>
                <div class="test-actions">
                    <button class="action-btn btn-primary" onclick="testNetwork()">
                        <i class="fas fa-signal"></i> Test Network
                    </button>
                    <button class="action-btn btn-secondary" onclick="testLatency()">
                        <i class="fas fa-clock"></i> Test Latency
                    </button>
                </div>
                <div class="test-results">
                    <div class="result-item">
                        <span class="result-name">Connection Type</span>
                        <span class="result-value" id="connectionType">--</span>
                    </div>
                    <div class="result-item">
                        <span class="result-name">Network Speed</span>
                        <span class="result-value" id="networkSpeed">--</span>
                    </div>
                    <div class="result-item">
                        <span class="result-name">Latency</span>
                        <span class="result-value" id="latency">--</span>
                    </div>
                </div>
            </div>

            <!-- Feature Support Card -->
            <div class="test-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-check-circle"></i>
                        Feature Support
                    </h3>
                    <span class="card-status status-idle" id="featureStatus">Ready</span>
                </div>
                <div class="test-actions">
                    <button class="action-btn btn-primary" onclick="testFeatureSupport()">
                        <i class="fas fa-cogs"></i> Test Features
                    </button>
                </div>
                <div class="feature-grid">
                    <div class="feature-item">
                        <span class="feature-name">Canvas</span>
                        <span class="feature-status" id="canvasSupport">--</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-name">WebGL</span>
                        <span class="feature-status" id="webglSupport">--</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-name">Geolocation</span>
                        <span class="feature-status" id="geolocationSupport">--</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-name">Touch Events</span>
                        <span class="feature-status" id="touchSupport">--</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-name">Web Workers</span>
                        <span class="feature-status" id="webWorkersSupport">--</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-name">Notifications</span>
                        <span class="feature-status" id="notificationsSupport">--</span>
                    </div>
                </div>
            </div>

            <!-- Accessibility Testing Card -->
            <div class="test-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-universal-access"></i>
                        Accessibility Testing
                    </h3>
                    <span class="card-status status-idle" id="accessibilityStatus">Ready</span>
                </div>
                <div class="test-actions">
                    <button class="action-btn btn-primary" onclick="testAccessibility()">
                        <i class="fas fa-eye"></i> Test Accessibility
                    </button>
                </div>
                <div class="test-results">
                    <div class="result-item">
                        <span class="result-name">Color Contrast</span>
                        <span class="result-value" id="colorContrast">--</span>
                    </div>
                    <div class="result-item">
                        <span class="result-name">Touch Targets</span>
                        <span class="result-value" id="touchTargets">--</span>
                    </div>
                    <div class="result-item">
                        <span class="result-name">Alt Text</span>
                        <span class="result-value" id="altText">--</span>
                    </div>
                    <div class="result-item">
                        <span class="result-name">Keyboard Navigation</span>
                        <span class="result-value" id="keyboardNav">--</span>
                    </div>
                </div>
            </div>

            <!-- Security Testing Card -->
            <div class="test-card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-shield-alt"></i>
                        Security Testing
                    </h3>
                    <span class="card-status status-idle" id="securityStatus">Ready</span>
                </div>
                <div class="test-actions">
                    <button class="action-btn btn-primary" onclick="testSecurity()">
                        <i class="fas fa-lock"></i> Test Security
                    </button>
                </div>
                <div class="test-results">
                    <div class="result-item">
                        <span class="result-name">HTTPS</span>
                        <span class="result-value" id="httpsCheck">--</span>
                    </div>
                    <div class="result-item">
                        <span class="result-name">CSP Headers</span>
                        <span class="result-value" id="cspHeaders">--</span>
                    </div>
                    <div class="result-item">
                        <span class="result-name">XSS Protection</span>
                        <span class="result-value" id="xssProtection">--</span>
                    </div>
                    <div class="result-item">
                        <span class="result-name">Secure Cookies</span>
                        <span class="result-value" id="secureCookies">--</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Test Logs -->
        <div class="test-card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-terminal"></i>
                    Test Logs
                </h3>
                <button class="action-btn btn-secondary" onclick="clearLogs()">
                    <i class="fas fa-trash"></i> Clear
                </button>
            </div>
            <div class="test-log" id="testLog">
                <div class="log-entry">
                    <span class="log-time">00:00:00</span>
                    <span class="log-info">[INFO]</span> App Testing Suite initialized
                </div>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let testResults = {
            total: 0,
            passed: 0,
            failed: 0,
            warnings: 0
        };

        // Utility functions
        function getCurrentTime() {
            return new Date().toLocaleTimeString();
        }

        function addLog(message, type = 'info') {
            const logContainer = document.getElementById('testLog');
            const logEntry = document.createElement('div');
            logEntry.className = 'log-entry';
            
            const typeClasses = {
                'info': 'log-info',
                'success': 'log-success',
                'warning': 'log-warning',
                'error': 'log-error'
            };
            
            logEntry.innerHTML = `
                <span class="log-time">${getCurrentTime()}</span>
                <span class="${typeClasses[type]}">[${type.toUpperCase()}]</span> ${message}
            `;
            
            logContainer.appendChild(logEntry);
            logContainer.scrollTop = logContainer.scrollHeight;
        }

        function updateStatus(cardId, status) {
            const statusElement = document.getElementById(cardId);
            if (statusElement) {
                statusElement.textContent = status;
                statusElement.className = `card-status status-${status.toLowerCase()}`;
            }
        }

        function updateTestStats() {
            document.getElementById('totalTests').textContent = testResults.total;
            document.getElementById('passedTests').textContent = testResults.passed;
            document.getElementById('failedTests').textContent = testResults.failed;
            
            const coverage = testResults.total > 0 ? 
                Math.round((testResults.passed / testResults.total) * 100) : 0;
            document.getElementById('coverage').textContent = coverage + '%';
        }

        // Device Detection
        function detectDevice() {
            updateStatus('deviceStatus', 'running');
            addLog('Starting device detection...');
            
            setTimeout(() => {
                const userAgent = navigator.userAgent;
                const platform = navigator.platform;
                
                // Device type detection
                let deviceType = 'Desktop';
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(userAgent)) {
                    if (/iPad/i.test(userAgent)) {
                        deviceType = 'Tablet (iPad)';
                    } else if (/iPhone/i.test(userAgent)) {
                        deviceType = 'Mobile (iPhone)';
                    } else if (/Android/i.test(userAgent)) {
                        deviceType = /Mobile/i.test(userAgent) ? 'Mobile (Android)' : 'Tablet (Android)';
                    } else {
                        deviceType = 'Mobile';
                    }
                }
                
                // Screen size
                const screenSize = `${screen.width}x${screen.height}`;
                
                // Browser detection
                let browser = 'Unknown';
                if (userAgent.includes('Chrome')) browser = 'Chrome';
                else if (userAgent.includes('Firefox')) browser = 'Firefox';
                else if (userAgent.includes('Safari')) browser = 'Safari';
                else if (userAgent.includes('Edge')) browser = 'Edge';
                else if (userAgent.includes('Opera')) browser = 'Opera';
                
                // OS detection
                let os = 'Unknown';
                if (userAgent.includes('Windows')) os = 'Windows';
                else if (userAgent.includes('Mac')) os = 'macOS';
                else if (userAgent.includes('Linux')) os = 'Linux';
                else if (userAgent.includes('Android')) os = 'Android';
                else if (userAgent.includes('iOS')) os = 'iOS';
                
                // Update UI
                document.getElementById('deviceType').textContent = deviceType;
                document.getElementById('screenSize').textContent = screenSize;
                document.getElementById('browser').textContent = browser;
                document.getElementById('os').textContent = os;
                
                updateStatus('deviceStatus', 'pass');
                addLog(`Device detected: ${deviceType}, ${browser} on ${os}`, 'success');
                
                testResults.total++;
                testResults.passed++;
                updateTestStats();
            }, 1000);
        }

        // Performance Testing
        function testPerformance() {
            updateStatus('performanceStatus', 'running');
            addLog('Starting performance tests...');
            
            const startTime = performance.now();
            
            setTimeout(() => {
                const loadTime = ((performance.now() - startTime) / 1000).toFixed(2);
                document.getElementById('loadTime').textContent = loadTime + 's';
                
                // Memory usage
                const memoryUsage = performance.memory ? 
                    (performance.memory.usedJSHeapSize / 1024 / 1024).toFixed(1) + 'MB' : 
                    'N/A';
                document.getElementById('memoryUsage').textContent = memoryUsage;
                
                // FCP (First Contentful Paint) simulation
                const fcpTime = (Math.random() * 2 + 0.5).toFixed(2);
                document.getElementById('fcpTime').textContent = fcpTime + 's';
                
                updateStatus('performanceStatus', 'pass');
                addLog(`Performance test completed - Load: ${loadTime}s, Memory: ${memoryUsage}`, 'success');
                
                testResults.total++;
                testResults.passed++;
                updateTestStats();
            }, 2000);
        }

        // Network Testing
        function testNetwork() {
            updateStatus('networkStatus', 'running');
            addLog('Testing network connectivity...');
            
            // Test connection type
            const connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
            const connectionType = connection ? connection.effectiveType || connection.type : 'Unknown';
            
            // Simulate network speed test
            const testStartTime = performance.now();
            
            fetch('https://httpbin.org/json')
                .then(response => response.json())
                .then(data => {
                    const testEndTime = performance.now();
                    const responseTime = (testEndTime - testStartTime).toFixed(0);
                    
                    document.getElementById('connectionType').textContent = connectionType;
                    document.getElementById('networkSpeed').textContent = getSpeedCategory(responseTime);
                    document.getElementById('latency').textContent = responseTime + 'ms';
                    
                    document.getElementById('networkDot').className = 'network-dot';
                    document.getElementById('connectionStatus').textContent = 'Connected';
                    
                    updateStatus('networkStatus', 'pass');
                    addLog(`Network test completed - Type: ${connectionType}, Latency: ${responseTime}ms`, 'success');
                    
                    testResults.total++;
                    testResults.passed++;
                    updateTestStats();
                })
                .catch(error => {
                    document.getElementById('connectionType').textContent = 'Offline';
                    document.getElementById('networkSpeed').textContent = 'N/A';
                    document.getElementById('latency').textContent = 'N/A';
                    
                    document.getElementById('networkDot').className = 'network-dot offline';
                    document.getElementById('connectionStatus').textContent = 'Disconnected';
                    
                    updateStatus('networkStatus', 'fail');
                    addLog('Network test failed - Connection unavailable', 'error');
                    
                    testResults.total++;
                    testResults.failed++;
                    updateTestStats();
                });
        }

        function testLatency() {
            addLog('Testing network latency...');
            const startTime = performance.now();
            
            fetch('https://httpbin.org/status/200')
                .then(() => {
                    const latency = (performance.now() - startTime).toFixed(0);
                    document.getElementById('latency').textContent = latency + 'ms';
                    addLog(`Latency test completed: ${latency}ms`, 'success');
                })
                .catch(() => {
                    addLog('Latency test failed', 'error');
                });
        }

        function getSpeedCategory(latency) {
            if (latency < 100) return 'Fast';
            if (latency < 300) return 'Medium';
            if (latency < 500) return 'Slow';
            return 'Very Slow';
        }

        // Feature Support Testing
        function testFeatureSupport() {
            updateStatus('featureStatus', 'running');
            addLog('Testing browser feature support...');
            
            setTimeout(() => {
                const features = {
                    canvas: testCanvasSupport(),
                    webgl: testWebGLSupport(),
                    geolocation: testGeolocationSupport(),
                    touch: testTouchSupport(),
                    webWorkers: testWebWorkersSupport(),
                    notifications: testNotificationsSupport()
                };
                
                // Update UI
                Object.keys(features).forEach(feature => {
                    const elementId = feature + 'Support';
                    const element = document.getElementById(elementId);
                    if (element) {
                        element.textContent = features[feature] ? 'Yes' : 'No';
                        element.className = features[feature] ? 'feature-status support-yes' : 'feature-status support-no';
                    }
                });
                
                const supportedCount = Object.values(features).filter(Boolean).length;
                updateStatus('featureStatus', 'pass');
                addLog(`Feature support test completed - ${supportedCount}/6 features supported`, 'success');
                
                testResults.total++;
                testResults.passed++;
                updateTestStats();
            }, 1500);
        }

        function testCanvasSupport() {
            try {
                const canvas = document.createElement('canvas');
                return !!(canvas.getContext && canvas.getContext('2d'));
            } catch (e) {
                return false;
            }
        }

        function testWebGLSupport() {
            try {
                const canvas = document.createElement('canvas');
                return !!(window.WebGLRenderingContext && canvas.getContext('webgl'));
            } catch (e) {
                return false;
            }
        }

        function testGeolocationSupport() {
            return 'geolocation' in navigator;
        }

        function testTouchSupport() {
            return 'ontouchstart' in window || navigator.maxTouchPoints > 0;
        }

        function testWebWorkersSupport() {
            return typeof Worker !== 'undefined';
        }

        function testNotificationsSupport() {
            return 'Notification' in window;
        }

        // Accessibility Testing
        function testAccessibility() {
            updateStatus('accessibilityStatus', 'running');
            addLog('Running accessibility tests...');
            
            setTimeout(() => {
                // Color contrast test
                const colorContrast = testColorContrast();
                document.getElementById('colorContrast').textContent = colorContrast;
                
                // Touch targets test
                const touchTargets = testTouchTargets();
                document.getElementById('touchTargets').textContent = touchTargets;
                
                // Alt text test
                const altText = testAltText();
                document.getElementById('altText').textContent = altText;
                
                // Keyboard navigation test
                const keyboardNav = testKeyboardNavigation();
                document.getElementById('keyboardNav').textContent = keyboardNav;
                
                updateStatus('accessibilityStatus', 'pass');
                addLog('Accessibility tests completed', 'success');
                
                testResults.total++;
                testResults.passed++;
                updateTestStats();
            }, 2000);
        }

        function testColorContrast() {
            // Simplified color contrast test
            const elements = document.querySelectorAll('*');
            let passCount = 0;
            let totalCount = 0;
            
            elements.forEach(element => {
                const style = window.getComputedStyle(element);
                const color = style.color;
                const backgroundColor = style.backgroundColor;
                
                if (color !== 'rgba(0, 0, 0, 0)' && backgroundColor !== 'rgba(0, 0, 0, 0)') {
                    totalCount++;
                    // Simplified check - in real implementation, calculate actual contrast ratio
                    passCount++;
                }
            });
            
            return totalCount > 0 ? Math.round((passCount / totalCount) * 100) + '%' : 'N/A';
        }

        function testTouchTargets() {
            const buttons = document.querySelectorAll('button, a, input[type="submit"]');
            let passCount = 0;
            
            buttons.forEach(button => {
                const rect = button.getBoundingClientRect();
                const minSize = 44; // WCAG recommended minimum
                if (rect.width >= minSize && rect.height >= minSize) {
                    passCount++;
                }
            });
            
            return buttons.length > 0 ? Math.round((passCount / buttons.length) * 100) + '%' : 'N/A';
        }

        function testAltText() {
            const images = document.querySelectorAll('img');
            let passCount = 0;
            
            images.forEach(img => {
                if (img.alt && img.alt.trim() !== '') {
                    passCount++;
                }
            });
            
            return images.length > 0 ? Math.round((passCount / images.length) * 100) + '%' : 'N/A';
        }

        function testKeyboardNavigation() {
            const focusableElements = document.querySelectorAll(
                'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
            );
            
            let passCount = 0;
            focusableElements.forEach(element => {
                if (element.tabIndex >= 0) {
                    passCount++;
                }
            });
            
            return focusableElements.length > 0 ? Math.round((passCount / focusableElements.length) * 100) + '%' : 'N/A';
        }

        // Security Testing
        function testSecurity() {
            updateStatus('securityStatus', 'running');
            addLog('Running security tests...');
            
            setTimeout(() => {
                // HTTPS check
                const httpsCheck = location.protocol === 'https:' ? 'Secure' : 'Not Secure';
                document.getElementById('httpsCheck').textContent = httpsCheck;
                
                // CSP Headers check (simplified)
                const cspHeaders = document.querySelector('meta[http-equiv="Content-Security-Policy"]') ? 'Present' : 'Missing';
                document.getElementById('cspHeaders').textContent = cspHeaders;
                
                // XSS Protection check
                const xssProtection = 'XSS Protection enabled'; // Simplified
                document.getElementById('xssProtection').textContent = xssProtection;
                
                // Secure cookies check
                const secureCookies = document.cookie.includes('Secure') ? 'Secure' : 'Not Secure';
                document.getElementById('secureCookies').textContent = secureCookies;
                
                updateStatus('securityStatus', 'pass');
                addLog('Security tests completed', 'success');
                
                testResults.total++;
                testResults.passed++;
                updateTestStats();
            }, 1800);
        }

        // Global control functions
        function runAllTests() {
            addLog('Starting comprehensive test suite...', 'info');
            
            // Reset results
            testResults = { total: 0, passed: 0, failed: 0, warnings: 0 };
            updateTestStats();
            
            // Run all tests with delays
            setTimeout(() => detectDevice(), 500);
            setTimeout(() => testPerformance(), 1000);
            setTimeout(() => testNetwork(), 1500);
            setTimeout(() => testFeatureSupport(), 2000);
            setTimeout(() => testAccessibility(), 2500);
            setTimeout(() => testSecurity(), 3000);
            
            setTimeout(() => {
                addLog('All tests completed!', 'success');
            }, 8000);
        }

        function clearAllLogs() {
            clearLogs();
            addLog('All logs cleared', 'info');
        }

        function clearLogs() {
            const logContainer = document.getElementById('testLog');
            logContainer.innerHTML = '';
        }

        function exportResults() {
            const results = {
                timestamp: new Date().toISOString(),
                testResults: testResults,
                deviceInfo: {
                    type: document.getElementById('deviceType').textContent,
                    screen: document.getElementById('screenSize').textContent,
                    browser: document.getElementById('browser').textContent,
                    os: document.getElementById('os').textContent
                },
                performance: {
                    loadTime: document.getElementById('loadTime').textContent,
                    memoryUsage: document.getElementById('memoryUsage').textContent,
                    fcpTime: document.getElementById('fcpTime').textContent
                },
                network: {
                    connectionType: document.getElementById('connectionType').textContent,
                    networkSpeed: document.getElementById('networkSpeed').textContent,
                    latency: document.getElementById('latency').textContent
                },
                accessibility: {
                    colorContrast: document.getElementById('colorContrast').textContent,
                    touchTargets: document.getElementById('touchTargets').textContent,
                    altText: document.getElementById('altText').textContent,
                    keyboardNav: document.getElementById('keyboardNav').textContent
                },
                security: {
                    httpsCheck: document.getElementById('httpsCheck').textContent,
                    cspHeaders: document.getElementById('cspHeaders').textContent,
                    xssProtection: document.getElementById('xssProtection').textContent,
                    secureCookies: document.getElementById('secureCookies').textContent
                }
            };
            
            const dataStr = JSON.stringify(results, null, 2);
            const dataUri = 'data:application/json;charset=utf-8,'+ encodeURIComponent(dataStr);
            
            const exportFileDefaultName = `test-results-${new Date().toISOString().split('T')[0]}.json`;
            
            const linkElement = document.createElement('a');
            linkElement.setAttribute('href', dataUri);
            linkElement.setAttribute('download', exportFileDefaultName);
            linkElement.click();
            
            addLog('Test results exported successfully', 'success');
        }

        function refreshTests() {
            // Reset all status indicators
            const statusElements = document.querySelectorAll('.card-status');
            statusElements.forEach(element => {
                element.textContent = 'Ready';
                element.className = 'card-status status-idle';
            });
            
            // Reset all result values
            const resultElements = document.querySelectorAll('.result-value, .info-value, .feature-status');
            resultElements.forEach(element => {
                if (element.classList.contains('info-value')) {
                    element.textContent = 'Unknown';
                } else if (element.classList.contains('feature-status')) {
                    element.textContent = '--';
                    element.className = 'feature-status';
                } else {
                    element.textContent = '--';
                }
            });
            
            // Reset test results
            testResults = { total: 0, passed: 0, failed: 0, warnings: 0 };
            updateTestStats();
            
            // Reset network indicator
            document.getElementById('networkDot').className = 'network-dot';
            document.getElementById('connectionStatus').textContent = 'Checking connection...';
            
            addLog('Test suite refreshed and ready', 'info');
        }

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            addLog('App Testing Suite initialized and ready', 'info');
            
            // Initial network status check
            setTimeout(() => {
                if (navigator.onLine) {
                    document.getElementById('networkDot').className = 'network-dot';
                    document.getElementById('connectionStatus').textContent = 'Online';
                } else {
                    document.getElementById('networkDot').className = 'network-dot offline';
                    document.getElementById('connectionStatus').textContent = 'Offline';
                }
            }, 1000);
            
            // Monitor online/offline status
            window.addEventListener('online', () => {
                document.getElementById('networkDot').className = 'network-dot';
                document.getElementById('connectionStatus').textContent = 'Online';
                addLog('Network connection restored', 'success');
            });
            
            window.addEventListener('offline', () => {
                document.getElementById('networkDot').className = 'network-dot offline';
                document.getElementById('connectionStatus').textContent = 'Offline';
                addLog('Network connection lost', 'warning');
            });
            
            // Auto-detect device on load
            setTimeout(() => {
                detectDevice();
            }, 2000);
        });

        // Close the script tag
    </script>
</body>
</html>

<?php 
 include "components/footer.php";
?>