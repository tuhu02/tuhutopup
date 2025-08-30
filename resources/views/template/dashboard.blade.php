@extends('template.template')

@section('custom_style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oxanium:wght@200;300;400;500;600;700;800&display=swap');

        /* CSS Variables untuk TEMA TERANG */
        :root {
            --bg-base: #f3f4f6;
            /* Abu-abu sangat terang (latar utama) */
            --bg-surface: #ffffff;
            /* Putih (untuk kartu/permukaan) */
            --border-color: #e5e7eb;
            /* Abu-abu terang (untuk border) */
            --text-primary: #1f2937;
            /* Abu-abu gelap (untuk teks utama) */
            --text-muted: #6b7280;
            /* Abu-abu medium (untuk teks sekunder) */
            --accent-gold: #f59e0b;
            /* Emas (sedikit lebih gelap agar kontras) */
            --accent-gold-darker: #d97706;
            /* Emas lebih pekat */
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
            /* Shadow halus */
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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            /* Shadow avatar diperhalus */
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
            color: #ffffff;
            /* Teks putih agar kontras di atas gradien emas */
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
            border: 1px solid transparent;
            /* Hilangkan border karena sudah ada kontras bg */
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
            background: var(--bg-surface);
            /* Latar putih untuk kartu pesanan */
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 10px;
            border: 1px solid var(--border-color);
            transition: box-shadow 0.2s, transform 0.2s;
        }

        .order-card:hover {
            transform: translateY(-2px);
            /* Efek mengangkat kartu saat di-hover */
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

        .stat-icon {
            color: var(--accent-gold);
        }

        .profile-info-item label {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .profile-info-item p {
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0;
        }

        .chart-container {
            position: relative;
            margin: auto;
        }

        .tab-content {
            padding-top: 1rem;
        }

        .nav-tabs .nav-link {
            border-radius: 8px 8px 0 0;
            margin-right: 0.5rem;
        }

        .nav-tabs .nav-link.active {
            background-color: var(--bg-surface);
            border-color: var(--border-color);
            border-bottom-color: var(--bg-surface);
        }

        .mt-6 {
            margin-top: 4rem !important;
            /* lebih besar dari mt-5 */
        }

        .mt-7 {
            margin-top: 5rem !important;
        }

        .mt-8 {
            margin-top: 6rem !important;
        }
    </style>
@endsection

@section('custom_script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi Chart.js
            const ctx = document.getElementById('activityChart').getContext('2d');

            const chartData = @json($chartData);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.map(item => item.date),
                    datasets: [{
                        label: 'Jumlah Pesanan',
                        data: chartData.map(item => item.count),
                        borderColor: '#f59e0b',
                        backgroundColor: 'rgba(245, 158, 11, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#f59e0b',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                color: '#6b7280'
                            },
                            grid: {
                                color: '#e5e7eb'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#6b7280'
                            },
                            grid: {
                                color: '#e5e7eb'
                            }
                        }
                    },
                    elements: {
                        point: {
                            hoverRadius: 8
                        }
                    }
                }
            });

            // Tab functionality
            const triggerTabList = document.querySelectorAll('#dashboardTabs button');
            triggerTabList.forEach(triggerEl => {
                const tabTrigger = new bootstrap.Tab(triggerEl);

                triggerEl.addEventListener('click', event => {
                    event.preventDefault();
                    tabTrigger.show();
                });
            });

            // Auto-refresh data setiap 30 detik
            setInterval(function () {
                // Refresh halaman untuk mendapatkan data terbaru
                // Atau bisa menggunakan AJAX untuk refresh data tertentu saja
                console.log('Dashboard data refreshed');
            }, 30000);
        });
    </script>
@endsection

@section('content')
    <x-navbar />

    <div class="container mt-8">
        <div class="profile-card">
            {{-- Bagian banner atas --}}
            <div class="profile-header mt-5"></div>

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
                <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview"
                            type="button" role="tab">
                            <i class="fas fa-chart-pie me-2"></i>Overview
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button"
                            role="tab">
                            <i class="fas fa-shopping-cart me-2"></i>Pesanan
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab">
                            <i class="fas fa-user me-2"></i>Profil
                        </button>
                    </li>
                </ul>

                {{-- Konten Sesuai Tab yang Aktif --}}
                <div class="tab-content" id="dashboardTabContent">
                    {{-- Tab Overview --}}
                    <div class="tab-pane fade show active" id="overview" role="tabpanel">
                        <div class="content-section">
                            {{-- Statistik Cards --}}
                            <div class="row mb-4">
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="info-card text-center">
                                        <div class="stat-icon mb-2">
                                            <i class="fas fa-shopping-bag text-primary" style="font-size: 2rem;"></i>
                                        </div>
                                        <h5 class="text-muted mb-1">Total Pesanan</h5>
                                        <p class="balance-amount mb-0">{{ $totalOrders }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="info-card text-center">
                                        <div class="stat-icon mb-2">
                                            <i class="fas fa-check-circle text-success" style="font-size: 2rem;"></i>
                                        </div>
                                        <h5 class="text-muted mb-1">Berhasil</h5>
                                        <p class="balance-amount mb-0">{{ $successOrders }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="info-card text-center">
                                        <div class="stat-icon mb-2">
                                            <i class="fas fa-clock text-warning" style="font-size: 2rem;"></i>
                                        </div>
                                        <h5 class="text-muted mb-1">Pending</h5>
                                        <p class="balance-amount mb-0">{{ $pendingOrders }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 mb-3">
                                    <div class="info-card text-center">
                                        <div class="stat-icon mb-2">
                                            <i class="fas fa-times-circle text-danger" style="font-size: 2rem;"></i>
                                        </div>
                                        <h5 class="text-muted mb-1">Gagal</h5>
                                        <p class="balance-amount mb-0">{{ $failedOrders }}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Kartu Saldo dan Total Pengeluaran --}}
                            <div class="row mb-4">
                                <div class="col-md-6 mb-3">
                                    <div class="info-card">
                                        <h5><i class="fas fa-wallet me-2"></i>Saldo Saya</h5>
                                        <p class="balance-amount mb-0">Rp {{ number_format($user->balance, 0, ',', '.') }},-
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="info-card">
                                        <h5><i class="fas fa-money-bill-wave me-2"></i>Total Pengeluaran</h5>
                                        <p class="balance-amount mb-0">Rp {{ number_format($totalSpent, 0, ',', '.') }},-
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- Chart Aktivitas 7 Hari Terakhir --}}
                            <div class="info-card">
                                <h5><i class="fas fa-chart-line me-2"></i>Aktivitas 7 Hari Terakhir</h5>
                                <div class="chart-container" style="height: 200px;">
                                    <canvas id="activityChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tab Pesanan --}}
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="content-section">
                            <div class="info-card">
                                <h5><i class="fas fa-list me-2"></i>Pesanan Terakhir</h5>
                                @if($recentOrders->count() > 0)
                                    @foreach($recentOrders as $order)
                                        <div class="order-card d-flex justify-content-between align-items-center">
                                            <div class="order-details">
                                                <span class="badge bg-warning text-dark order-id">{{ $order->order_id }}</span>
                                                <p class="mb-1">{{ $order->layanan }}</p>
                                                <small class="text-muted">
                                                    <i class="fas fa-user me-1"></i>{{ $order->nickname }}
                                                    @if($order->zone)
                                                        <span class="ms-2"><i class="fas fa-server me-1"></i>{{ $order->zone }}</span>
                                                    @endif
                                                </small>
                                                <div class="mt-1">
                                                    <small class="text-muted">Rp
                                                        {{ number_format($order->harga, 0, ',', '.') }},-</small>
                                                    <small
                                                        class="text-muted ms-2">{{ $order->created_at->format('d M Y H:i') }}</small>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                @if($order->status == 'success')
                                                    <span class="badge bg-success">Success</span>
                                                @elseif($order->status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif($order->status == 'failed')
                                                    <span class="badge bg-danger">Failed</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center py-4">
                                        <i class="fas fa-shopping-cart text-muted" style="font-size: 3rem;"></i>
                                        <p class="text-muted mt-2">Belum ada pesanan</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Tab Profil --}}
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <div class="content-section">
                            <div class="info-card">
                                <h5><i class="fas fa-user-circle me-2"></i>Informasi Profil</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="profile-info-item">
                                            <label class="text-muted small">Nama Lengkap</label>
                                            <p class="mb-2">{{ $user->name }}</p>
                                        </div>
                                        <div class="profile-info-item">
                                            <label class="text-muted small">Username</label>
                                            <p class="mb-2">{{ $user->username }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-info-item">
                                            <label class="text-muted small">Role</label>
                                            <p class="mb-2">
                                                <span class="badge-gold-member">{{ ucfirst($user->role) }}</span>
                                            </p>
                                        </div>
                                        <div class="profile-info-item">
                                            <label class="text-muted small">No. WhatsApp</label>
                                            <p class="mb-2">{{ $user->no_wa ?? 'Belum diisi' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editProfileModal">
                                        <i class="fas fa-edit me-2"></i>Edit Profil
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Edit Profil --}}
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel"><i class="fas fa-user-edit me-2"></i>Edit Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/user/edit/profile') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" autocomplete="off"
                                        value="{{ $user->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" autocomplete="off"
                                        value="{{ $user->username }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Password Baru</label>
                                    <input type="password" class="form-control" name="password" autocomplete="off"
                                        placeholder="(Isi jika ingin ganti password)">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">No. WhatsApp</label>
                                    <input type="number" class="form-control" name="no_wa" autocomplete="off"
                                        value="{{ $user->no_wa }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Simpan
                            Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection