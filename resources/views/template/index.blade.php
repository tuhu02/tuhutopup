@extends('template.template')

@section('custom_style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oxanium:wght@200;300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Oxanium', cursive;
        }

        .card {
            border: none !important;
            background-color: transparent !important;
        }

        .bottom-6 {
            bottom: 3rem !important;
        }

        .absolute {
            position: absolute !important;
        }

        .swiper-container {
            width: 100%;
            max-width: 100%;
            height: 450px;
            /* bisa disesuaikan */
            overflow: hidden;
            border-radius: 12px;
            /* opsional, biar sudut melengkung */
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* gambar dipotong rapi, tidak melar */
            border-radius: 12px;
        }

        /* === CSS BARU UNTUK KARTU PRODUK === */
        .product-card-link {
            text-decoration: none;
        }

        .product-card {
            background-color: #fff;
            border-radius: 12px;
            text-align: center;
            overflow: hidden;
            position: relative;
            /* Diperlukan untuk posisi label diskon */
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .product-card-img {
            width: 200px;
            aspect-ratio: 1 / 1;
            /* Membuat gambar selalu persegi */
            object-fit: cover;
            border-radius: 12px;
            /* Sudut melengkung untuk gambar */
            justify-content: center;
            align-self: center;
            /* Pusatkan gambar di dalam kartu */
            margin-top: 12px;
        }

        .product-card-title {
            padding: 12px 8px;
            font-weight: 600;
            font-size: 0.9rem;
            color: #212529;
            /* Warna teks gelap agar kontras */
            margin-top: auto;
            /* Mendorong judul ke bawah jika kartu punya tinggi berbeda */
        }

        .discount-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            background-color: #dc3545;
            /* Merah */
            color: white;
            padding: 4px 8px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            z-index: 10;
        }

        /* Untuk membuat layout 5 kolom di layar besar seperti di gambar */
        @media (min-width: 992px) {
            .col-lg-2dot4 {
                flex: 0 0 20%;
                max-width: 20%;
            }
        }

        /* === AKHIR DARI CSS BARU === */
    </style>
@endsection

@section('content')

    <x-navbar />

    <div class="content-body">
        {{-- Banner Slider --}}
        <div class="swiper-container mt-2 mb-2">
            <div class="swiper-wrapper" id="swiper">
                @foreach($banner as $data)
                    <div class="swiper-slide">
                        <img src="{{ $data->path }}" alt="Banner">
                    </div>
                @endforeach
            </div>
        </div>

        <style>
            .populer-card {
                transition: 0.3s;
            }

            .populer-card:hover {
                background-color: var(--warna_2) !important;
                cursor: pointer;
            }
        </style>

        {{-- Populer --}}
        <h4 class="text-black mt-5" style="font-size: 1.5rem;">
            🔥 POPULER SEKARANG!
        </h4>

        <section class="px-2">
            <div class="row g-2">
                @foreach($populers as $populer)
                    <div class="col-6 col-md-3">
                        {{-- Link ke halaman detail produk --}}
                        <a href="{{ url('/order') }}/{{ $populer->kode }}" class="text-decoration-none">
                            <div
                                class="bg-secondary text-black border border-gray shadow-sm py-3 rounded populer-card h-100 d-flex align-items-center">
                                <img src="{{ $populer->thumbnail }}" alt="{{ $populer->nama }}" width="50" height="50"
                                    class="rounded me-2 ms-2">
                                <div class="flex-grow-1 d-flex flex-column text-start">
                                    <p class="mb-0 fw-semibold small" style="line-height: 1.2;">{{ $populer->nama }}</p>
                                    <p class="mb-0 small" style="opacity: 0.8;">{{ $populer->sub_nama }}</p>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach
            </div>
        </section>


        {{-- Filter Kategori --}}
        <section class="px-2 my-5">
            <ul class="nav nav-pills gap-2">
                <li class="nav-item">
                    <a class="btn border bg-white rounded-pill {{ !request('tipe') ? 'text-primary border-primary bg-white' : 'bg-white text-dark' }}"
                        href="{{ url()->current() }}">
                        Semua
                    </a>
                </li>
                @foreach($kategori->unique('tipe') as $category)
                    <li class="nav-item">
                        <a class="btn border rounded-pill {{ request('tipe') === $category->tipe ? 'text-primary border-primary bg-white' : 'bg-white text-dark' }}"
                            href="{{ url()->current() }}?tipe={{ $category->tipe }}">
                            {{ Str::title($category->tipe) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>


        {{-- =============================================== --}}
        {{-- | BAGIAN DAFTAR PRODUK YANG DIMODIFIKASI | --}}
        {{-- =============================================== --}}
        <section class="px-2 mt-3">
            @if(request('tipe'))
                {{-- Tampilan jika salah satu kategori dipilih --}}
                <div class="product row mt-4 g-3">
                    @foreach($kategori as $category)
                        @if($category->tipe == request('tipe'))
                            <div class="col-6 col-md-4 col-lg-2dot4">
                                <a href="{{ url('/order') }}/{{ $category->kode }}" class="product-card-link">
                                    <div class="product-card border border-gray shadow-sm">
                                        {{-- CONTOH: Tampilkan label diskon jika ada --}}
                                        {{-- Ganti 'diskon' sesuai nama kolom di database Anda --}}
                                        @if(isset($category->diskon) && $category->diskon > 0)
                                            <div class="discount-badge">-{{ $category->diskon }}%</div>
                                        @endif

                                        <img class="product-card-img" src="{{ $category->thumbnail }}" loading="lazy"
                                            alt="{{ $category->nama }}">
                                        <div class="product-card-title">
                                            {{ $category->nama }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                {{-- Tampilan "Semua" dengan produk dikelompokkan --}}
                @php
                    $groupedKategori = $kategori->groupBy('tipe');
                @endphp

                @foreach($groupedKategori as $tipe => $items)
                    <div class="mt-4">
                        <h4 class="mb-2 text-black" style="font-size: 1.5rem;">
                            {{ Str::title($tipe) }}
                        </h4>
                        <div class="product row mt-3 g-3">
                            @foreach($items as $item)
                                {{-- Gunakan col-6 untuk mobile (2 kolom), col-md-4 (3 kolom), dan col-lg-2dot4 (5 kolom) --}}
                                <div class="col-6 col-md-4 col-lg-2dot4">
                                    <a href="{{ url('/order') }}/{{ $item->kode }}" class="product-card-link">
                                        <div class="product-card border border-gray shadow-sm">
                                            {{-- CONTOH: Tampilkan label diskon jika ada. --}}
                                            {{-- Ganti 'diskon' dengan nama kolom di database Anda (misal: 'potongan', 'persen_diskon',
                                            dll.) --}}
                                            @if(isset($item->diskon) && $item->diskon > 0)
                                                <div class="discount-badge">-{{ $item->diskon }}%</div>
                                            @endif

                                            <img class="product-card-img lazy" src="{{ $item->thumbnail }}" loading="lazy"
                                                alt="{{ $item->nama }}">
                                            <div class="product-card-title">
                                                {{ $item->nama }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </section>
        {{-- =============================================== --}}
        {{-- | AKHIR BAGIAN MODIFIKASI | --}}
        {{-- =============================================== --}}
        {{-- Berita --}}
        <section class="px-2 my-5">
            <div class="d-flex">
                <h4 class="text-black mb-3" style="font-size: 1.5rem;">Berita Terbaru</h4>
                @if($allBanner->count() > 3)
                    <h5 class="ms-auto small my-2">
                        <a href="{{ route('berita') }}" class="text-primary">Lihat Semua</a>
                    </h5>
                @endif
            </div>
            <div class="row g-3">
                @forelse($banner as $b)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm border-0 h-100">
                            <img src="{{ $b->path }}" class="card-img-top" alt="Berita {{ $b->judul ?? 'Berita' }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $b->judul ?? 'Judul Berita' }}</h5>
                                <p class="card-text text-muted">{{ Str::limit(strip_tags($b->deskripsi ?? ''), 100) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-4">
                            <p class="text-muted">Belum ada berita tersedia</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </section>


    </div>





    {{-- Hasil Pencarian (Tersembunyi) --}}
    <section class="px-2 resultsearch d-none" style="padding-bottom: 2rem;">
        <h4 class="mb-2" style="font-size: 1rem;">Hasil Pencarian</h4><br>
        <div class="product productresultsearch row">
            {{-- Hasil AJAX akan dimuat di sini --}}
        </div>
    </section>

@endsection

@push('custom_script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

    <script>
        // Inisialisasi Swiper
        var swiper = new Swiper('.swiper-container', {
            effect: 'coverflow',
            grabCursor: true,
            loop: true,
            centeredSlides: true,
            spaceBetween: 1,
            slidesPerView: 'auto',
            coverflow: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });

        // Inisialisasi Owl Carousel
        $('.metode-top').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            responsive: { 0: { items: 3 }, 600: { items: 3 }, 1000: { items: 4 } }
        });

        $('.metode-bottom').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            rtl: true,
            responsive: { 0: { items: 3 }, 600: { items: 3 }, 1000: { items: 4 } }
        });

        // Skeleton loader
        $(window).on('load', function () {
            setTimeout(() => {
                $('.skeleton-loader').addClass('d-none');
                $('.item-skeleton-content').removeClass('d-none');
            }, 1500);
        });

        // Fungsi delay untuk input pencarian
        var delay = (function () {
            var timer = 0;
            return function (callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();

        // AJAX Search
        $('#searchProds').keyup(function () {
            const data = $(this).val();
            if (data.length < 1) {
                $('.resultsearch').removeClass('show');
                $('.resultsearch li').remove();
            } else {
                delay(function () {
                    $.ajax({
                        url: "{{ url('/cari/index') }}",
                        method: "POST",
                        data: {
                            data: data
                        },
                        beforeSend: function () {
                            $('.resultsearch li').remove();
                        },
                        success: function (res) {
                            $('.resultsearch').append(res);
                            $('.resultsearch').addClass('show');
                        }
                    })
                }, 100);
            }
        });
    </script>
@endpush