@extends('template.template')

@section('custom_style')
    <style>
        /* Menggunakan font sistem yang bersih dan cepat */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            background-color: #f8f9fa; /* Latar belakang sedikit abu-abu agar tidak silau */
            color: #212529;
        }

        /* Variabel warna untuk konsistensi */
        :root {
            --primary-color: #0d6efd;
            --light-gray: #f1f3f5;
            --border-color: #dee2e6;
            --text-muted: #6c757d;
        }

        /* --- Hero Section --- */
        .berita-hero {
            background-color: #ffffff;
            padding: 3rem 0;
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--border-color);
        }

        .berita-hero h1 {
            font-weight: 700;
            font-size: 2.25rem;
            color: #343a40;
        }

        .berita-hero p {
            font-size: 1.1rem;
            color: var(--text-muted);
        }
        
        /* Tombol kembali yang lebih sederhana */
        .back-btn {
            background-color: transparent;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 10px 20px;
            color: #343a40;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .back-btn:hover {
            background-color: var(--light-gray);
            border-color: #c1c9d1;
            color: #343a40;
        }


        /* --- Search Section --- */
        .search-container {
            /* Container pencarian tidak perlu background atau shadow, menyatu dengan halaman */
            margin-bottom: 2rem;
        }

        .search-input {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 12px 18px;
            font-size: 1rem;
            transition: all 0.2s ease;
        }

        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
            outline: none;
        }

        .search-btn {
            background-color: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            color: white;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .search-btn:hover {
            background-color: #0b5ed7;
        }
        
        /* --- Card Berita --- */
        .berita-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }

        .berita-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            border-color: transparent;
        }

        .berita-card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .berita-card-body {
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .berita-card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #343a40;
            margin-bottom: 0.75rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .berita-card-text {
            color: var(--text-muted);
            line-height: 1.6;
            flex-grow: 1;
            margin-bottom: 1.25rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .berita-meta {
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .berita-date {
            color: var(--text-muted);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .berita-category {
            background-color: var(--light-gray);
            color: #495057;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        /* --- Pagination --- */
        .pagination-container {
            margin-top: 2.5rem;
        }

        .page-link {
            border: none;
            color: var(--primary-color);
            margin: 0 3px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .page-link:hover {
            background-color: #e0e7ff;
            color: var(--primary-color);
        }

        .page-item.active .page-link {
            background-color: var(--primary-color);
            color: white;
        }

        /* --- Empty State --- */
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            background-color: #ffffff;
            border: 1px dashed var(--border-color);
            border-radius: 12px;
        }

        .empty-state i {
            font-size: 3rem;
            color: #adb5bd;
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            color: #495057;
        }
        
        /* --- Modal Search Results --- */
        #searchResults .berita-card {
            box-shadow: none; /* Hilangkan shadow di hasil modal */
        }
        #searchResults .berita-card:hover {
            background-color: var(--light-gray);
        }

        @media (max-width: 768px) {
            .berita-hero {
                padding: 2rem 0;
                text-align: center;
            }
            .berita-hero .back-btn {
                margin-top: 1rem;
            }
            .berita-hero h1 {
                font-size: 1.75rem;
            }
        }
    </style>
@endsection


@section('content')
    <x-navbar />

    <div class="content-body">
        <section class="berita-hero">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-8">
                        <h1>📰 Berita & Informasi</h1>
                        <p>Temukan informasi terkini seputar dunia gaming, teknologi, dan lainnya.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                        <a href="{{ route('home') }}" class="back-btn">
                            <i class="fas fa-arrow-left"></i>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="search-container">
                <form onsubmit="event.preventDefault(); searchBerita();">
                    <div class="input-group">
                        <input type="text" id="searchBerita" class="form-control search-input"
                               placeholder="🔍 Cari berita yang menarik...">
                        <button class="btn search-btn" type="submit">
                            <i class="fas fa-search me-1"></i> Cari
                        </button>
                    </div>
                </form>
            </div>

            <div class="row g-4" id="beritaContainer">
                @forelse($banner as $b)
                    <div class="col-12 col-md-6 col-lg-4 d-flex align-items-stretch">
                        <div class="berita-card">
                            <img src="{{ $b->path }}" class="berita-card-img" alt="{{ $b->judul ?? 'Gambar Berita' }}">
                            <div class="berita-card-body">
                                <h5 class="berita-card-title">{{ $b->judul ?? 'Judul Berita' }}</h5>
                                <p class="berita-card-text">{{ Str::limit(strip_tags($b->deskripsi ?? ''), 120) }}</p>
                                <div class="berita-meta">
                                    <div class="berita-date">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>{{ $b->created_at ? $b->created_at->format('d M Y') : 'Tanggal tidak tersedia' }}</span>
                                    </div>
                                    <div class="berita-category">
                                        Berita
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="fas fa-newspaper"></i>
                            <h3>Belum Ada Berita</h3>
                            <p class="text-muted">Saat ini belum ada berita yang dipublikasikan. Silakan kembali lagi nanti.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($banner->hasPages())
                <div class="pagination-container d-flex justify-content-center">
                    {{ $banner->links() }}
                </div>
            @endif
        </div>
    </div>

    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-search me-2"></i>
                        Hasil Pencarian Berita
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="searchResults">
                    </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_script')
    {{-- Script JavaScript tidak perlu diubah karena fungsionalitasnya sudah baik --}}
    <script>
        function searchBerita() {
            const searchTerm = document.getElementById('searchBerita').value.trim();

            if (searchTerm.length < 2) {
                // Menggunakan alert bawaan untuk dependensi minimal
                alert('Masukkan minimal 2 karakter untuk mencari');
                return;
            }

            const searchResultsContainer = document.getElementById('searchResults');
            searchResultsContainer.innerHTML = `
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3 text-muted">Mencari berita...</p>
                </div>
            `;

            const modal = new bootstrap.Modal(document.getElementById('searchModal'));
            modal.show();

            fetch(`/berita/search?q=${encodeURIComponent(searchTerm)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    displaySearchResults(data.results || []);
                })
                .catch(error => {
                    console.error('Search error:', error);
                    searchResultsContainer.innerHTML = `
                        <div class="text-center py-5">
                            <i class="fas fa-times-circle fa-2x text-danger mb-3"></i>
                            <p class="text-danger">Terjadi kesalahan saat memuat hasil pencarian.</p>
                        </div>
                    `;
                });
        }

        function displaySearchResults(results) {
            const container = document.getElementById('searchResults');

            if (!results || results.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-5">
                        <i class="fas fa-search fa-2x text-muted mb-3"></i>
                        <h5 class="text-muted">Tidak ada hasil yang ditemukan</h5>
                        <p class="text-muted">Coba gunakan kata kunci yang berbeda.</p>
                    </div>
                `;
                return;
            }

            let html = '<div class="list-group list-group-flush">';
            results.forEach(berita => {
                const deskripsi = berita.deskripsi ? (berita.deskripsi.length > 100 ? berita.deskripsi.substring(0, 100) + '...' : berita.deskripsi) : 'Deskripsi tidak tersedia';
                const tanggal = berita.created_at ? new Date(berita.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' }) : 'Tanggal tidak tersedia';
                
                html += `
                    <a href="#" class="list-group-item list-group-item-action py-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 fw-bold">${berita.judul || 'Judul Berita'}</h6>
                            <small class="text-muted">${tanggal}</small>
                        </div>
                        <p class="mb-1">${deskripsi}</p>
                    </a>
                `;
            });
            html += '</div>';

            container.innerHTML = html;
        }

        document.getElementById('searchBerita').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                searchBerita();
            }
        });
    </script>
@endpush