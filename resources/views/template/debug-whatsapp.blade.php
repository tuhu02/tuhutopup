@extends('template.template')

@section('custom_style')
    <style>
        .debug-container {
            min-height: 100vh;
            padding-top: 100px;
            background: linear-gradient(135deg, #6f42c1 0%, #e83e8c 100%);
        }

        .debug-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: none;
        }

        .debug-header {
            background: linear-gradient(135deg, #6f42c1 0%, #e83e8c 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .debug-body {
            padding: 2rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6f42c1 0%, #e83e8c 100%);
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(111, 66, 193, 0.3);
        }

        .btn-warning {
            background: linear-gradient(135deg, #fd7e14 0%, #ffc107 100%);
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(253, 126, 20, 0.3);
        }

        .alert {
            border-radius: 10px;
            border: none;
            margin-bottom: 1rem;
        }

        .config-status {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid #e9ecef;
        }

        .status-indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 8px;
        }

        .status-active {
            background-color: #28a745;
        }

        .status-inactive {
            background-color: #dc3545;
        }

        .test-result {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1rem;
            border: 1px solid #e9ecef;
            display: none;
        }

        .log-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1rem;
            border: 1px solid #e9ecef;
            max-height: 400px;
            overflow-y: auto;
        }

        .log-entry {
            font-family: 'Courier New', monospace;
            font-size: 12px;
            margin-bottom: 5px;
            padding: 5px;
            border-radius: 5px;
            background: white;
            border-left: 3px solid #6f42c1;
        }

        .log-error {
            border-left-color: #dc3545;
            background: #fff5f5;
        }

        .log-warning {
            border-left-color: #ffc107;
            background: #fffbf0;
        }

        .log-info {
            border-left-color: #17a2b8;
            background: #f0f9ff;
        }

        .api-test-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1rem;
            border: 1px solid #e9ecef;
        }

        .test-detail {
            background: white;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1rem;
            border: 1px solid #e9ecef;
        }

        .test-detail h6 {
            color: #6f42c1;
            border-bottom: 2px solid #6f42c1;
            padding-bottom: 5px;
        }

        .json-viewer {
            background: #2d3748;
            color: #e2e8f0;
            padding: 1rem;
            border-radius: 8px;
            font-family: 'Courier New', monospace;
            font-size: 12px;
            overflow-x: auto;
            white-space: pre-wrap;
        }
    </style>
@endsection

@section('content')
    <x-navbar />

    <div class="debug-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12 col-sm-12">
                    <div class="debug-card">
                        <div class="debug-header">
                            <h2 class="mb-2">
                                <i class="fas fa-bug me-2"></i>
                                Debug WhatsApp API
                            </h2>
                            <p class="mb-0 opacity-75">
                                Diagnosa masalah pengiriman OTP via WhatsApp
                            </p>
                        </div>

                        <div class="debug-body">
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <strong>Error:</strong> {{ session('error') }}
                                </div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <strong>Berhasil:</strong> {{ session('success') }}
                                </div>
                            @endif

                            <!-- Status Konfigurasi -->
                            <div class="config-status">
                                <h6 class="mb-2">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Status Konfigurasi WhatsApp
                                </h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-2">
                                            <span
                                                class="status-indicator {{ $config && $config->wa_key ? 'status-active' : 'status-inactive' }}"></span>
                                            <span>API Key:
                                                {{ $config && $config->wa_key ? '✓ Terisi' : '✗ Belum diisi' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-2">
                                            <span
                                                class="status-indicator {{ $config && $config->wa_number ? 'status-active' : 'status-inactive' }}"></span>
                                            <span>Nomor Pengirim:
                                                {{ $config && $config->wa_number ? '✓ Terisi' : '✗ Belum diisi' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Test -->
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-primary btn-lg" onclick="testWhatsAppApiDetail()">
                                    <i class="fas fa-search me-2"></i>
                                    Test Detail WhatsApp API
                                </button>

                                <a href="{{ url('/whatsapp-config') }}" class="btn btn-warning btn-lg">
                                    <i class="fas fa-cog me-2"></i>
                                    Konfigurasi WhatsApp
                                </a>
                            </div>

                            <!-- Hasil Test Detail -->
                            <div id="testDetailResult" class="test-result">
                                <h6 class="mb-2">
                                    <i class="fas fa-clipboard-check me-2"></i>
                                    Hasil Test Detail
                                </h6>
                                <div id="testDetailContent"></div>
                            </div>

                            <!-- Log Laravel -->
                            <div class="log-section">
                                <h6 class="mb-2">
                                    <i class="fas fa-file-alt me-2"></i>
                                    Log Laravel Terakhir (50 baris)
                                </h6>
                                <div class="log-entries">
                                    @if(count($recentLogs) > 0)
                                        @foreach($recentLogs as $log)
                                            @php
                                                $logClass = 'log-info';
                                                if (strpos($log, 'ERROR') !== false)
                                                    $logClass = 'log-error';
                                                elseif (strpos($log, 'WARNING') !== false)
                                                    $logClass = 'log-warning';
                                            @endphp
                                            <div class="log-entry {{ $logClass }}">
                                                {{ $log }}
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-muted">Tidak ada log yang tersedia</p>
                                    @endif
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <a href="{{ url('/forgot-password') }}" class="text-decoration-none">
                                    <i class="fas fa-arrow-left me-1"></i>
                                    Kembali ke Reset Password
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('custom_script')
        <script>
            // Test WhatsApp API dengan detail
            function testWhatsAppApiDetail() {
                const testBtn = document.querySelector('button[onclick="testWhatsAppApiDetail()"]');
                const testResult = document.getElementById('testDetailResult');
                const testContent = document.getElementById('testDetailContent');

                // Disable button dan show loading
                testBtn.disabled = true;
                testBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Testing...';

                // Show test result area
                testResult.style.display = 'block';
                testContent.innerHTML = '<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Sedang menguji WhatsApp API...</div>';

                // Kirim request test detail
                fetch('/whatsapp-debug/test-detail', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({})
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            let html = '<div class="alert alert-success mb-3">';
                            html += '<i class="fas fa-check-circle me-2"></i>';
                            html += '<strong>Test Berhasil!</strong><br>';
                            html += data.message;
                            html += '</div>';

                            // Tampilkan hasil detail
                            const results = data.results;

                            // Test wa2.wisender
                            if (results.wa2_wisender) {
                                const wa2 = results.wa2_wisender;
                                html += '<div class="test-detail">';
                                html += '<h6><i class="fas fa-paper-plane me-2"></i>Test wa2.wisender.link</h6>';
                                html += '<div class="row">';
                                html += '<div class="col-md-6">';
                                html += '<strong>URL:</strong> ' + wa2.url + '<br>';
                                html += '<strong>HTTP Code:</strong> <span class="badge bg-' + (wa2.http_code === 200 ? 'success' : 'danger') + '">' + wa2.http_code + '</span><br>';
                                html += '<strong>Response Time:</strong> ' + wa2.response_time_ms + 'ms<br>';
                                html += '<strong>Status:</strong> <span class="badge bg-' + (wa2.success ? 'success' : 'danger') + '">' + (wa2.success ? 'Success' : 'Failed') + '</span>';
                                html += '</div>';
                                html += '<div class="col-md-6">';
                                if (wa2.curl_error) {
                                    html += '<strong>cURL Error:</strong> <span class="text-danger">' + wa2.curl_error + '</span>';
                                } else {
                                    html += '<strong>cURL Error:</strong> <span class="text-success">None</span>';
                                }
                                html += '</div>';
                                html += '</div>';

                                if (wa2.response) {
                                    html += '<div class="mt-2">';
                                    html += '<strong>Response:</strong>';
                                    html += '<div class="json-viewer">' + JSON.stringify(JSON.parse(wa2.response), null, 2) + '</div>';
                                    html += '</div>';
                                }
                                html += '</div>';
                            }

                            // Test API Status
                            if (results.api_status) {
                                const status = results.api_status;
                                html += '<div class="test-detail">';
                                html += '<h6><i class="fas fa-server me-2"></i>Status API Endpoint</h6>';
                                html += '<div class="row">';
                                html += '<div class="col-md-6">';
                                html += '<strong>URL:</strong> ' + status.url + '<br>';
                                html += '<strong>HTTP Code:</strong> <span class="badge bg-' + (status.http_code === 200 ? 'success' : 'danger') + '">' + status.http_code + '</span><br>';
                                html += '<strong>Response Time:</strong> ' + status.response_time_ms + 'ms';
                                html += '</div>';
                                html += '<div class="col-md-6">';
                                html += '<strong>Status:</strong> <span class="badge bg-' + (status.status === 'Online' ? 'success' : 'danger') + '">' + status.status + '</span><br>';
                                if (status.curl_error) {
                                    html += '<strong>cURL Error:</strong> <span class="text-danger">' + status.curl_error + '</span>';
                                }
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                            }

                            // Test Response Format
                            if (results.response_format) {
                                const format = results.response_format;
                                html += '<div class="test-detail">';
                                html += '<h6><i class="fas fa-code me-2"></i>Analisis Format Response</h6>';
                                html += '<div class="row">';
                                html += '<div class="col-md-6">';
                                html += '<strong>Valid JSON:</strong> <span class="badge bg-' + (format.valid ? 'success' : 'danger') + '">' + (format.valid ? 'Yes' : 'No') + '</span><br>';
                                html += '<strong>Has Status:</strong> <span class="badge bg-' + (format.has_status ? 'success' : 'warning') + '">' + (format.has_status ? 'Yes' : 'No') + '</span><br>';
                                html += '<strong>Has Message:</strong> <span class="badge bg-' + (format.has_message ? 'success' : 'warning') + '">' + (format.has_message ? 'Yes' : 'No') + '</span>';
                                html += '</div>';
                                html += '<div class="col-md-6">';
                                html += '<strong>Status Value:</strong> ' + format.status_value + '<br>';
                                html += '<strong>Message Value:</strong> ' + format.message_value;
                                html += '</div>';
                                html += '</div>';

                                if (format.structure) {
                                    html += '<div class="mt-2">';
                                    html += '<strong>Response Structure:</strong>';
                                    html += '<div class="json-viewer">' + JSON.stringify(format.structure, null, 2) + '</div>';
                                    html += '</div>';
                                }

                                if (!format.valid && format.error) {
                                    html += '<div class="mt-2">';
                                    html += '<strong>Error:</strong> <span class="text-danger">' + format.error + '</span>';
                                    if (format.raw_response) {
                                        html += '<div class="json-viewer">' + format.raw_response + '</div>';
                                    }
                                    html += '</div>';
                                }
                                html += '</div>';
                            }

                            testContent.innerHTML = html;
                        } else {
                            testContent.innerHTML = `
                        <div class="alert alert-danger mb-0">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Test Gagal!</strong><br>
                            ${data.message}
                        </div>
                    `;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        testContent.innerHTML = `
                    <div class="alert alert-danger mb-0">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Error!</strong><br>
                        Terjadi kesalahan saat testing: ${error.message}
                    </div>
                `;
                    })
                    .finally(() => {
                        // Re-enable button
                        testBtn.disabled = false;
                        testBtn.innerHTML = '<i class="fas fa-search me-2"></i>Test Detail WhatsApp API';
                    });
            }

            // Auto-refresh log setiap 30 detik
            setInterval(function () {
                location.reload();
            }, 30000);
        </script>
    @endpush

@endsection