

<?php $__env->startSection('custom_style'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e = $attributes; } ?>
<?php $component = App\View\Components\Navbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Navbar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $attributes = $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $component = $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>

    <div class="content-body">
        
        <div class="swiper-container mt-2 mb-2">
            <div class="swiper-wrapper" id="swiper">
                <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <img src="<?php echo e($data->path); ?>" alt="Banner">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

        
        <h4 class="text-black mt-5" style="font-size: 1.5rem;">
            🔥 POPULER SEKARANG!
        </h4>

        <section class="px-2">
            <div class="row g-2">
                <?php $__currentLoopData = $populers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $populer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-md-3">
                        
                        <a href="<?php echo e(url('/order')); ?>/<?php echo e($populer->kode); ?>" class="text-decoration-none">
                            <div
                                class="bg-secondary text-black border border-gray shadow-sm py-3 rounded populer-card h-100 d-flex align-items-center">
                                <img src="<?php echo e($populer->thumbnail); ?>" alt="<?php echo e($populer->nama); ?>" width="50" height="50"
                                    class="rounded me-2 ms-2">
                                <div class="flex-grow-1 d-flex flex-column text-start">
                                    <p class="mb-0 fw-semibold small" style="line-height: 1.2;"><?php echo e($populer->nama); ?></p>
                                    <p class="mb-0 small" style="opacity: 0.8;"><?php echo e($populer->sub_nama); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>


        
        <section class="px-2 my-5">
            <ul class="nav nav-pills gap-2">
                <li class="nav-item">
                    <a class="btn border bg-white rounded-pill <?php echo e(!request('tipe') ? 'text-primary border-primary bg-white' : 'bg-white text-dark'); ?>"
                        href="<?php echo e(url()->current()); ?>">
                        Semua
                    </a>
                </li>
                <?php $__currentLoopData = $kategori->unique('tipe'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                        <a class="btn border rounded-pill <?php echo e(request('tipe') === $category->tipe ? 'text-primary border-primary bg-white' : 'bg-white text-dark'); ?>"
                            href="<?php echo e(url()->current()); ?>?tipe=<?php echo e($category->tipe); ?>">
                            <?php echo e(Str::title($category->tipe)); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </section>


        
        
        
        <section class="px-2 mt-3">
            <?php if(request('tipe')): ?>
                
                <div class="product row mt-4 g-3">
                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($category->tipe == request('tipe')): ?>
                            <div class="col-6 col-md-4 col-lg-2dot4">
                                <a href="<?php echo e(url('/order')); ?>/<?php echo e($category->kode); ?>" class="product-card-link">
                                    <div class="product-card border border-gray shadow-sm">
                                        
                                        
                                        <?php if(isset($category->diskon) && $category->diskon > 0): ?>
                                            <div class="discount-badge">-<?php echo e($category->diskon); ?>%</div>
                                        <?php endif; ?>

                                        <img class="product-card-img" src="<?php echo e($category->thumbnail); ?>" loading="lazy"
                                            alt="<?php echo e($category->nama); ?>">
                                        <div class="product-card-title">
                                            <?php echo e($category->nama); ?>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                
                <?php
                    $groupedKategori = $kategori->groupBy('tipe');
                ?>

                <?php $__currentLoopData = $groupedKategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipe => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mt-4">
                        <h4 class="mb-2 text-black" style="font-size: 1.5rem;">
                            <?php echo e(Str::title($tipe)); ?>

                        </h4>
                        <div class="product row mt-3 g-3">
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <div class="col-6 col-md-4 col-lg-2dot4">
                                    <a href="<?php echo e(url('/order')); ?>/<?php echo e($item->kode); ?>" class="product-card-link">
                                        <div class="product-card border border-gray shadow-sm">
                                            
                                            
                                            <?php if(isset($item->diskon) && $item->diskon > 0): ?>
                                                <div class="discount-badge">-<?php echo e($item->diskon); ?>%</div>
                                            <?php endif; ?>

                                            <img class="product-card-img lazy" src="<?php echo e($item->thumbnail); ?>" loading="lazy"
                                                alt="<?php echo e($item->nama); ?>">
                                            <div class="product-card-title">
                                                <?php echo e($item->nama); ?>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </section>
        
        
        
        
        <section class="px-2 my-5">
            <div class="d-flex">
                <h4 class="text-black mb-3" style="font-size: 1.5rem;">Berita Terbaru</h4>
                <?php if($allBanner->count() > 3): ?>
                    <h5 class="ms-auto small my-2">
                        <a href="<?php echo e(route('berita')); ?>" class="text-primary">Lihat Semua</a>
                    </h5>
                <?php endif; ?>
            </div>
            <div class="row g-3">
                <?php $__empty_1 = true; $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card shadow-sm border-0 h-100">
                            <img src="<?php echo e($b->path); ?>" class="card-img-top" alt="Berita <?php echo e($b->judul ?? 'Berita'); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($b->judul ?? 'Judul Berita'); ?></h5>
                                <p class="card-text text-muted"><?php echo e(Str::limit(strip_tags($b->deskripsi ?? ''), 100)); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12">
                        <div class="text-center py-4">
                            <p class="text-muted">Belum ada berita tersedia</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>


    </div>





    
    <section class="px-2 resultsearch d-none" style="padding-bottom: 2rem;">
        <h4 class="mb-2" style="font-size: 1rem;">Hasil Pencarian</h4><br>
        <div class="product productresultsearch row">
            
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom_script'); ?>
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
                        url: "<?php echo e(url('/cari/index')); ?>",
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/template/index.blade.php ENDPATH**/ ?>