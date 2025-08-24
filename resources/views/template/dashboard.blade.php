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
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05); /* Shadow halus */
    }

    .profile-header {
        height: 250px;
        background: url("https://i.ytimg.com/vi/QWIf6-xP-og/maxresdefault.jpg") no-repeat center center;
        background-size: cover;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }

    .profile-body {
        padding: 1.5rem;
    }

    .profile-main-info {
        display: flex;
        align-items: flex-end;
        gap: 20px;
        margin-top: -60px;
        margin-bottom: 20px;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid var(--bg-surface);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Shadow avatar diperhalus */
        overflow: hidden;
        flex-shrink: 0;
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-user-details {
        margin-bottom: 10px;
    }

    .profile-user-details h4 {
        font-weight: 700;
        margin: 0;
        font-size: 1.5rem;
        color: var(--text-primary);
    }

    .badge-gold-member {
        background: linear-gradient(45deg, var(--accent-gold-darker), var(--accent-gold));
        color: #ffffff; /* Teks putih agar kontras di atas gradien emas */
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.8rem;
        display: inline-block;
        margin-top: 5px;
    }

    .nav-tabs {
        border-bottom: 1px solid var(--border-color);
    }

    .nav-tabs .nav-link {
        color: var(--text-muted);
        font-weight: 600;
        border: none;
        border-bottom: 3px solid transparent;
        padding: 0.75rem 1rem;
        transition: color 0.2s, border-color 0.2s;
    }

    .nav-tabs .nav-link:hover {
        color: var(--text-primary);
    }

    .nav-tabs .nav-link.active {
        color: var(--accent-gold);
        border-bottom: 3px solid var(--accent-gold);
        background: transparent;
    }

    .content-section {
        padding-top: 2rem;
    }

    .info-card {
        background-color: var(--bg-base);
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 1.5rem;
        border: 1px solid transparent; /* Hilangkan border karena sudah ada kontras bg */
    }
    
    .info-card h5 {
        color: var(--text-muted);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }

    .balance-amount {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-primary);
    }

    .order-card {
        background: var(--bg-surface); /* Latar putih untuk kartu pesanan */
        padding: 15px;
        border-radius: 12px;
        margin-bottom: 10px;
        border: 1px solid var(--border-color);
        transition: box-shadow 0.2s, transform 0.2s;
    }
    .order-card:hover {
        transform: translateY(-2px); /* Efek mengangkat kartu saat di-hover */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
    }

    .order-card .order-id {
        font-family: 'Courier New', Courier, monospace;
        font-size: 0.85rem;
    }

    .order-card .order-details p {
        margin-bottom: 0;
        font-weight: 500;
    }
    .order-card .order-details small {
        color: var(--text-muted);
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
            {{-- Bagian Info Utama: Avatar, Nama, dan Tabs --}}
            <div class="profile-main-info">
                <div class="profile-avatar">
                    <img src="https://is3.cloudhost.id/nextopupcdn/p/1694875834.gif" alt="Avatar">
                </div>
                <div class="profile-user-details">
                    <h4>{{Str::title(Auth()->user()->name)}}</h4>
                    <span class="badge-gold-member">{{Str::title(Auth()->user()->role)}}</span>
                </div>
            </div>

            {{-- Menu Navigasi --}}
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="#">Akun Saya</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Pesanan</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Isi Saldo</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Membership</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Log Saldo</a></li>
            </ul>

            {{-- Konten Sesuai Tab yang Aktif --}}
            <div class="content-section">
                
                {{-- Kartu Saldo --}}
                <div class="info-card">
                    <h5>Saldo Saya</h5>
                    <p class="balance-amount mb-0">Rp {{ number_format(Auth::user()->balance, 0, ',', '.') }},-</p>
                </div>
                
                {{-- Kartu Pesanan Terakhir --}}
                <div class="info-card">
                    <h5>5 Pesanan Terakhir</h5>
                    <div class="order-card d-flex justify-content-between align-items-center">
                        <div class="order-details">
                            <span class="badge bg-warning text-dark order-id">KNOCK1755500427RC7</span>
                            <p>210 Diamonds - Free Fire</p>
                            <small>Rp 27.805</small>
                        </div>
                        <span class="badge bg-success">Success</span>
                    </div>
                     {{-- Tambahkan order-card lainnya di sini jika perlu --}}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection