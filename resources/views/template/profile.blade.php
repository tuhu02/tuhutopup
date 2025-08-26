@extends('template.template')

@section('custom_style')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Oxanium:wght@200;300;400;500;600;700;800&display=swap');

    /* CSS Variables untuk TEMA TERANG */
    :root {
        --bg-base: #f3f4f6;       /* Abu-abu sangat terang (latar utama) */
        --bg-surface: #ffffff;     /* Putih (untuk kartu/permukaan) */
        --border-color: #e5e7eb;   /* Abu-abu terang (untuk border) */
        --text-primary: #1f2937;   /* Abu-abu gelap (untuk teks utama) */
        --text-muted: #6b7280;     /* Abu-abu medium (untuk teks sekunder) */
        --accent-gold: #f59e0b;     /* Emas (sedikit lebih gelap agar kontras) */
        --accent-gold-darker: #d97706; /* Emas lebih pekat */
    }

    body {
        background-color: var(--bg-base);
        color: var(--text-primary);
        font-family: 'Oxanium', cursive;
    }

    .profile-card {
        background-color: var(--bg-surface);
        border-radius: 16px;
        margin-top: -80px;
        position: relative;
        border: 1px solid var(--border-color);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .profile-header {
        height: 200px;
        background: linear-gradient(135deg, var(--accent-gold), var(--accent-gold-darker));
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
        position: relative;
        overflow: hidden;
    }

    .profile-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.1)"/><circle cx="90" cy="40" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .profile-body {
        padding: 2rem;
    }

    .profile-main-info {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-top: -60px;
        margin-bottom: 30px;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid var(--bg-surface);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        flex-shrink: 0;
        background: linear-gradient(135deg, var(--accent-gold), var(--accent-gold-darker));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
        font-weight: 700;
    }

    .profile-user-details h4 {
        font-weight: 700;
        margin: 0;
        font-size: 1.8rem;
        color: var(--text-primary);
    }

    .badge-gold-member {
        background: linear-gradient(45deg, var(--accent-gold-darker), var(--accent-gold));
        color: #ffffff;
        font-weight: 600;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 0.9rem;
        display: inline-block;
        margin-top: 8px;
    }

    .form-section {
        background-color: var(--bg-surface);
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        border: 1px solid var(--border-color);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .form-section h5 {
        color: var(--accent-gold);
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        color: var(--text-primary);
        font-weight: 600;
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control {
        border: 2px solid var(--border-color);
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: var(--bg-surface);
        color: var(--text-primary);
    }

    .form-control:focus {
        border-color: var(--accent-gold);
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.1);
        outline: none;
    }

    .form-control::placeholder {
        color: var(--text-muted);
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--accent-gold), var(--accent-gold-darker));
        border: none;
        border-radius: 8px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
    }

    .btn-secondary {
        background-color: var(--text-muted);
        border: none;
        border-radius: 8px;
        padding: 0.75rem 2rem;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: var(--text-primary);
        transform: translateY(-2px);
    }

    .alert {
        border-radius: 8px;
        border: none;
        padding: 1rem 1.5rem;
        margin-bottom: 1.5rem;
    }

    .alert-danger {
        background-color: #fef2f2;
        color: #dc2626;
        border-left: 4px solid #dc2626;
    }

    .alert-success {
        background-color: #f0fdf4;
        color: #16a34a;
        border-left: 4px solid #16a34a;
    }

    .alert ul {
        margin-bottom: 0;
        padding-left: 1.5rem;
    }

    .alert li {
        margin-bottom: 0.25rem;
    }

    .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: 1rem;
    }

    .breadcrumb-item a {
        color: var(--accent-gold);
        text-decoration: none;
        font-weight: 500;
    }

    .breadcrumb-item.active {
        color: var(--text-muted);
    }

    .breadcrumb-item + .breadcrumb-item::before {
        content: ">";
        color: var(--text-muted);
        margin: 0 0.5rem;
    }

    .text-muted {
        color: var(--text-muted) !important;
    }
</style>
@endsection

@section('content')
<x-navbar />

<div class="container mt-5">
    <div class="profile-card">
        {{-- Bagian banner atas --}}
        <div class="profile-header"></div>
        
        <div class="profile-body">
            {{-- Bagian Info Utama: Avatar, Nama, dan Role --}}
            <div class="profile-main-info">
                <div class="profile-avatar">
                    {{ strtoupper(substr(Auth()->user()->name, 0, 1)) }}
                </div>
                <div class="profile-user-details">
                    <h4>{{ Str::title(Auth()->user()->name) }}</h4>
                    <span class="badge-gold-member">{{ Str::title(Auth()->user()->role) }}</span>
                </div>
            </div>

            {{-- Breadcrumb Navigation --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/user/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
            </nav>

            {{-- Alert Messages --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session('success') }}</li>
                </ul>
            </div>
            @endif

            {{-- Form Section --}}
            <div class="form-section">
                <h5>
                    <i class="fas fa-user-edit"></i>
                    Edit Informasi Profil
                </h5>
                
                <form action="{{ url('/user/edit/profile') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" autocomplete="off" 
                                       value="{{ Auth()->user()->name }}" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" autocomplete="off" 
                                       value="{{ Auth()->user()->username }}" name="username" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Password Baru</label>
                                <input type="password" class="form-control" name="password" 
                                       autocomplete="off" placeholder="(Isi jika ingin ganti password)">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">No. WhatsApp</label>
                                <input type="number" class="form-control" name="no_wa" 
                                       autocomplete="off" value="{{ Auth()->user()->no_wa }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary me-2" type="submit" name="tombol" value="submit">
                            <i class="fas fa-save me-2"></i>Update Profile
                        </button>
                        <a href="{{ url('/user/dashboard') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection