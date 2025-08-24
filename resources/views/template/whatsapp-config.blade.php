@extends('template.template')

@section('custom_style')
<style>
    .whatsapp-config-container {
        min-height: 100vh;
        padding-top: 100px;
        background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
    }
    
    .whatsapp-config-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        overflow: hidden;
        border: none;
    }
    
    .whatsapp-config-header {
        background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
        color: white;
        padding: 2rem;
        text-align: center;
    }
    
    .whatsapp-config-body {
        padding: 2rem;
    }
    
    .form-control {
        border-radius: 10px;
        border: 2px solid #e9ecef;
        padding: 12px 16px;
        font-size: 16px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #25d366;
        box-shadow: 0 0 0 0.2rem rgba(37, 211, 102, 0.25);
    }
    
    .btn-success {
        background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
        border: none;
        border-radius: 10px;
        padding: 12px 24px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3);
    }
    
    .btn-info {
        background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
        border: none;
        border-radius: 10px;
        padding: 12px 24px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-info:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(23, 162, 184, 0.3);
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
</style>
@endsection

@section('content')
<x-navbar/>

<div class="whatsapp-config-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="whatsapp-config-card">
                    <div class="whatsapp-config-header">
                        <h2 class="mb-2">
                            <i class="fab fa-whatsapp me-2"></i>
                            Konfigurasi WhatsApp Gateway
                        </h2>
                        <p class="mb-0 opacity-75">
                            Atur konfigurasi untuk sistem reset password via WhatsApp
                        </p>
                    </div>
                    
                    <div class="whatsapp-config-body">
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
                                Status Konfigurasi
                            </h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="status-indicator {{ $config && $config->wa_key ? 'status-active' : 'status-inactive' }}"></span>
                                        <span>API Key: {{ $config && $config->wa_key ? '✓ Terisi' : '✗ Belum diisi' }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="status-indicator {{ $config && $config->wa_number ? 'status-active' : 'status-inactive' }}"></span>
                                        <span>Nomor Pengirim: {{ $config && $config->wa_number ? '✓ Terisi' : '✗ Belum diisi' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <form action="{{ url('/whatsapp-config') }}" method="POST" id="whatsappConfigForm">
                            @csrf
                            
                            <div class="mb-4">
                                <label for="wa_key" class="form-label fw-bold">
                                    <i class="fas fa-key me-2"></i>
                                    API Key WhatsApp Gateway
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control @error('wa_key') is-invalid @enderror" 
                                    id="wa_key"
                                    name="wa_key" 
                                    value="{{ $config->wa_key ?? '' }}"
                                    placeholder="Masukkan API Key dari provider WhatsApp Gateway"
                                    required
                                >
                                <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i>
                                    API Key dari provider WhatsApp Gateway (contoh: wa2.wisender.link)
                                </div>
                                @error('wa_key')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="wa_number" class="form-label fw-bold">
                                    <i class="fas fa-phone me-2"></i>
                                    Nomor WhatsApp Pengirim
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control @error('wa_number') is-invalid @enderror" 
                                    id="wa_number"
                                    name="wa_number" 
                                    value="{{ $config->wa_number ?? '' }}"
                                    placeholder="6281234567890"
                                    required
                                >
                                <div class="form-text">
                                    <i class="fas fa-info-circle me-1"></i>
                                    Nomor WhatsApp yang akan mengirim pesan OTP (format: 6281234567890)
                                </div>
                                @error('wa_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button class="btn btn-success btn-lg" type="submit">
                                    <i class="fas fa-save me-2"></i>
                                    Simpan Konfigurasi
                                </button>
                                
                                <button type="button" class="btn btn-info btn-lg" onclick="testWhatsAppConfig()">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Test Konfigurasi
                                </button>
                            </div>
                        </form>
                        
                        <!-- Test Result -->
                        <div id="testResult" class="test-result">
                            <h6 class="mb-2">
                                <i class="fas fa-clipboard-check me-2"></i>
                                Hasil Test
                            </h6>
                            <div id="testResultContent"></div>
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
// Form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Test WhatsApp Configuration
function testWhatsAppConfig() {
    const testBtn = document.querySelector('button[onclick="testWhatsAppConfig()"]');
    const testResult = document.getElementById('testResult');
    const testResultContent = document.getElementById('testResultContent');
    
    // Disable button dan show loading
    testBtn.disabled = true;
    testBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Testing...';
    
    // Show test result area
    testResult.style.display = 'block';
    testResultContent.innerHTML = '<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Sedang menguji konfigurasi...</div>';
    
    // Kirim request test
    fetch('/whatsapp-config/test', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            test_number: document.getElementById('wa_number').value
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            testResultContent.innerHTML = `
                <div class="alert alert-success mb-0">
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>Test Berhasil!</strong><br>
                    ${data.message}<br>
                    <small class="text-muted">Response: ${JSON.stringify(data.response)}</small>
                </div>
            `;
        } else {
            testResultContent.innerHTML = `
                <div class="alert alert-danger mb-0">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Test Gagal!</strong><br>
                    ${data.message}<br>
                    <small class="text-muted">Response: ${JSON.stringify(data.response)}</small>
                </div>
            `;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        testResultContent.innerHTML = `
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
        testBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Test Konfigurasi';
    });
}

// Auto-focus pada input pertama saat halaman load
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('wa_key').focus();
});
</script>
@endpush

@endsection
