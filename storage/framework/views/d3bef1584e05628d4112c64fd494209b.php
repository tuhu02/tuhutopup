<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(!$config ? '' : $config->judul_web); ?></title>

    <meta name="title" content="<?php echo e(!$config ? '' : $config->judul_web); ?>">
    <meta name="description" content="<?php echo e(!$config ? '' : $config->deskripsi_web); ?>">

    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(ENV('APP_URL')); ?>">
    <meta property="og:title" content="<?php echo e(!$config ? '' : $config->judul_web); ?>">
    <meta property="og:description" content="<?php echo e(!$config ? '' : $config->deskripsi_web); ?>">
    <meta name="twitter:image" content="<?php echo e(!$config ? '' : $config->logo_footer); ?>" />
    <meta property="og:image" content="<?php echo e(!$config ? '' : $config->logo_footer); ?>" />
    <meta name="robots" content="index, follow">
    <meta content="desktop" name="device">
    <meta name="author" content="<?php echo e(ENV('APP_NAME')); ?>">
    <meta name="coverage" content="Worldwide">
    <meta name="apple-mobile-web-app-title" content="<?php echo e(!$config ? '' : $config->judul_web); ?>">

    <link rel="shortcut icon" href="<?php echo e(url('')); ?><?php echo e(!$config ? '' : $config->logo_favicon); ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.2.4/themes/green/pace-theme-flash.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <meta name="theme-color" content="#000000">
    <meta name="msapplication-navbutton-color" content="#000000">
    <meta name="apple-mobile-web-app-status-bar-style" content="#000000">

    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.css');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        :root {
            /* Updated modern color scheme */
            --primary: #4361ee;
            --primary-light: #4895ef;
            --primary-dark: #3a56d4;
            --secondary: #6c757d;
            --success: #4cc9f0;
            --info: #4895ef;
            --warning: #f72585;
            --danger: #e63946;
            --light: #f8f9fa;
            --dark: #212529;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --gray-300: #dee2e6;
            --gray-400: #ced4da;
            --gray-500: #adb5bd;
            --gray-600: #6c757d;
            --gray-700: #495057;
            --gray-800: #343a40;
            --gray-900: #212529;
            
            /* Background colors */
            --bg-primary: #ffffff;
            --bg-secondary: #f8f9fa;
            --bg-card: #ffffff;
            --bg-body: #f0f2f5;
            
            /* Text colors */
            --text-primary: #212529;
            --text-secondary: #6c757d;
            --text-light: #f8f9fa;
            --text-dark: #212529;
            
            /* Border colors */
            --border-color: #e9ecef;
            --border-radius: 12px;
            --border-radius-sm: 8px;
            --border-radius-lg: 16px;
            
            /* Shadow */
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.05);
            --shadow: 0 4px 12px rgba(0,0,0,0.08);
            --shadow-lg: 0 8px 24px rgba(0,0,0,0.12);
            
            /* Spacing */
            --spacer: 1rem;
            --spacer-sm: calc(var(--spacer) * 0.5);
            --spacer-lg: calc(var(--spacer) * 1.5);
            --spacer-xl: calc(var(--spacer) * 3);
        }

        textarea:hover,
        input:hover,
        textarea:active,
        input:active,
        textarea:focus,
        input:focus,
        button:focus,
        button:active,
        button:hover,
        label:focus,
        .btn:active,
        .btn.active {
            outline: 0px !important;
            -webkit-appearance: none;
            box-shadow: none !important;
        }

        body {
            color: var(--text-primary);
            background: var(--bg-body);
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            line-height: 1.6;
        }

        .bg-primary {
            background: var(--primary) !important;
        }

        .bg-secondary {
            background: var(--bg-secondary) !important;
        }

        .bg-white-custom {
            background: var(--bg-card) !important;
        }

        .bg-card {
            color: var(--text-primary);
            background: var(--bg-card);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }

        .navbar {
            color: var(--text-light);
            background: #ffff;
            transition: background-color 0.3s ease, backdrop-filter 0.3s ease, -webkit-backdrop-filter 0.3s ease;
            box-shadow: var(--shadow);
            padding: 0.5rem 1rem;
        }

        .navbar.navbar-blur {
            background: rgba(255, 255, 255, 0.95);
            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);
        }

        .navbar-toggler {
            font-size: 32px;
        }

        .offcanvas.offcanvas-end {
            background: var(--primary);
        }

        .navbar-nav .nav-link {
            color: var(--text-dark);
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius-sm);
            transition: all 0.3s ease;
        }

        /* .navbar-nav .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-light);
        } */

        .btn-login {
            color: var(--text-light);
            background: var(--primary) !important;
            border: none;
            border-radius: var(--border-radius-sm);
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: var(--primary-dark) !important;
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .content-body {
            padding: 1rem;
            padding-top: 6rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        @media (min-width: 576px) {
            .content-body {
                padding: 1.5rem;
                padding-top: 6rem;
            }
        }

        @media (min-width: 768px) {
            .content-body {
                padding: 2rem;
                padding-top: 6rem;
            }
        }

        .resultsearch {
            width: 100%;
            inset: 0px auto auto 0px;
            margin: 0px;
            transform: translate(0px, 50px);
            background-color: #000000;
            border-color: rgba(0, 0, 0, .15);
            color: #fff;
            overflow-y: auto;
            max-height: 500px;
        }

        @media (min-width: 768px) {
            .resultsearch {
                width: 50%;
                max-height: 500px;
                transform: translate(220px, 50px);
            }
        }

        .resultsearch .dropdown-item:hover {
            background-color: #000000;
            color: #fff;
        }

        /* Navbar search: only outer border */
        .search-bar {
            border: 1px solid #ced4da;
            border-radius: 9999px;
            background: #ffffff;
            overflow: hidden;
        }

        .search-bar input {
            border: 0;
            color: rgb(156 163 175);
            background: transparent;
            border-radius: 0;
        }

        .search-bar span,
        .search-bar .input-group-text {
            border: 0;
            border-radius: 0;
            color: rgb(156 163 175);
            background: transparent;
        }

        .search-bar ::placeholder {
            /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #878aad;
            opacity: 1;
            /* Firefox */
        }

        .input-box:focus {
            color: #000;
            background: #ffffff;
        }

        .img-search {
            padding-left: 15px;
        }

        .swiper-container {
            width: 100%;
            overflow: hidden;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 80%;
            height: 100%;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            border-radius: 12px;
        }

        @media (max-width: 576px) {
            .swiper-slide img {
                display: block;
                width: 100%;
                height: 100% !important;
                border-radius: 12px;
            }
        }

        .swiper-pagination {
            margin-top: 30px !important;
        }

        .content-body form input {
            outline: none;
            margin-top: -30px;
            border: none !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
        }

        .row {
            --bs-gutter-x: 0.5rem;
        }

        .product .box {
            margin-bottom: 40px;
        }

        @media (max-width: 576px) {
            .product .box {
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                border-radius: 0.75rem;
                text-align: center;
                background: #646464;
                display: block;
                text-decoration: none;
                color: #fff;
                height: 10rem;
            }
        }

        @media (min-width: 576px) {
            .product .box {
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                border-radius: 0.75rem;
                text-align: center;
                background: #646464;
                display: block;
                text-decoration: none;
                color: #fff;
                height: 15rem;
            }
        }

        .card-product {
            margin-bottom: -30px;
            gap: 0.5rem;
        }

        @media (max-width: 576px) {
            .product p {
                font-size: 12px !important;
            }
        }

        .product .box img {
            width: 100%;
            height: 100%;
            display: block;
            margin: auto;
            object-fit: cover;
            border-radius: 0.75rem;
        }

        .card {
            cursor: pointer;
        }

        .kbrstore-pgimg {
            background-color: white;
            border-radius: 3px;
            border: 1px solid white;
            height: 15px;
        }

        .text-copyright {
            color: #718096;
            font-size: 0.875rem;
        }

        .sosmed {
            margin-bottom: 20px;
        }

        .sosmed a {
            margin: 0 10px;
            text-decoration: none;
            color: #fff;
        }

        .sosmed i {
            font-size: 24px;
        }


        .item .metode {
            margin: 5px 0;
            background: #fff;
            border-radius: 8px;
            padding: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
        }

        .my-form label {
            font-size: 1rem;
        }

        .my-form .form-control {
            background: #fefefe;
            margin-top: 6px;
            border: 1px solid #ced4da !important;
            /* Samakan dengan default Bootstrap */
            border-radius: 0.375rem;
        }

        .my-form .form-control:active,
        .my-form .form-control:focus {
            border-color: #86b7fe !important;
            /* Warna fokus default Bootstrap */
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, .25) !important;
            /* Efek fokus Bootstrap */
            outline: none !important;
        }

        .method-list {
            overflow: hidden;
            cursor: pointer;
            border: 2px solid var(--border-color);
            border-radius: var(--border-radius);
            transition: all 0.3s ease;
        }

        .method-list:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow);
        }

        .method-list.active {
            border-color: var(--primary) !important;
            box-shadow: var(--shadow);
        }

        .method-list.active:before {
            display: inline-block;
            content: 'L';
            position: relative;
            background: var(--primary);
            margin-left: -12px;
            height: 53px;
            line-height: 40px;
            width: 20px;
            text-align: center;
            color: #fff;
            top: -23px;
            transform: rotate(45deg) scaleX(-1);
            border-radius: 0 0 4px 0;
        }

        .method-list.active table {
            margin-top: -53px;
        }

        .search-item {
            width: 50%;
        }

        @media (min-width: 768px) {
            .search-item {
                width: 50%;
                margin-left: 100px;
            }
        }

        .swal2-popup {
            display: none;
            position: relative;
            box-sizing: border-box;
            grid-template-columns: minmax(0, 100%);
            width: 32em;
            max-width: 100%;
            padding: 0 0 1.25em;
            border: none;
            border-radius: 5px;
            background: #ffffff !important;
            color: #000 !important;
            font-family: inherit;
            font-size: 1rem;
        }

        .swal2-html-container {
            z-index: 1;
            justify-content: center;
            margin: 1em 1.6em 0.3em;
            padding: 0;
            overflow: auto;
            color: inherit;
            font-size: 1.125em;
            font-weight: normal;
            line-height: normal;
            text-align: left !important;
            word-wrap: break-word;
            word-break: break-word;
        }

        .flex-1 {
            flex: 1 1 0%;
        }

        .fab-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 100;
            text-align: center;
        }

        .fab-button {
        background-color: var(--primary);
        color: var(--text-light);
        border: none;
        border-radius: 50px;
        padding: 12px 20px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: var(--shadow-lg);
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
    }

    .fab-button:hover {
        background-color: var(--primary-dark);
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
    }

        .help-icon {
            width: 24px;
            height: 24px;
        }

        .fab-options {
            list-style: none;
            margin: 10px 0 0;
            padding: 0;
            position: absolute;
            bottom: 60px;
            right: 0;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }

        .fab-options.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .fab-options li {
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .fab-options li:last-child {
            border-bottom: none;
        }

        .fab-options a {
            text-decoration: none;
            color: #333;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Ukuran ikon yang lebih baik */
        .fab-icon-holder {
            width: 40px;
            height: 40px;
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .fab-icon-holder i {
            font-size: 24px;
            color: #fff;
        }

        /* === CSS BARU UNTUK FOOTER === */
        .footer-gray {
            background-color: #f8f9fa;
            /* Warna abu-abu muda seperti di contoh */
            color: #343a40;
            /* Warna teks default gelap agar terbaca */
        }

        .footer-gray h5 {
            color: #000000;
            /* Membuat judul sedikit lebih gelap/tegas */
        }

        .footer-gray a {
            color: #343a40;
            /* Mengubah warna link menjadi gelap */
            text-decoration: none;
            /* Menghilangkan garis bawah */
        }

        .footer-gray a:hover {
            color: #0056b3;
            /* Mengubah warna link saat disentuh mouse */
        }

        .footer-gray .text-copyright {
            color: #6c757d;
            /* Warna teks copyright yang sedikit lebih pudar */
        }

        /* === AKHIR DARI CSS BARU === */
    </style>

    <?php echo $__env->yieldContent('custom_style'); ?>

<body>
    <div class="content">

        <?php echo $__env->yieldContent('content'); ?>

        <div class="content-body">
            
        </div>

        <div class="fab-container">
            <button class="fab-button" onclick="toggleHelpCenter()">
                <img src="/assets/image/help.png" alt="Help Center" class="help-icon">
                Help Center
            </button>
            <ul class="fab-options" id="help-options">
                <li>
                    <a href="<?php echo e(!$config ? '' : $config->url_ig); ?>" class="text-decoration-none" target="_blank">
                        <div class="fab-icon-holder" style="background-color: #e61c6d;">
                            <i class="fa-brands fa-instagram"></i>
                        </div> Instagram
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(!$config ? '' : $config->url_wa); ?>" class="text-decoration-none" target="_blank">
                        <div class="fab-icon-holder" style="background-color: #25D366;">
                            <i class="fab fa-whatsapp"></i>
                        </div> WhatsApp
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(!$config ? '' : $config->url_fb); ?>" class="text-decoration-none" target="_blank">
                        <div class="fab-icon-holder" style="background-color: #1877f2;">
                            <i class="fab fa-facebook"></i>
                        </div> Facebook
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <footer class="footer-gray mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-4 p-4">
                    <img src="<?php echo e(url('')); ?><?php echo e(!$config ? '' : $config->logo_footer); ?>" alt="LOGO" class="logo-bawah"
                        width="50">
                    <div class="mt-2 text-justify">
                        <p>Top Up Game Favoritmu termurah hanya di <?php echo e(ENV('APP_NAME')); ?>, seperti Top Up Mobile Legends,
                            Top Up FF (Free Fire) dan Top Up Game Favoritmu lainnya dengan proses cepat dan otomatis</p>
                    </div>
                </div>

                <div class="col-md-3 col-lg-4 p-4">
                    <h5 class="mt-2 mb-1">Metode Pembayaran</h5>
                    <div class="mt-3">
                        <img src="/assets/payment/qris.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/OVO.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/Shopeepay.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/Linkaja.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/alfamart.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/indomaret.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/bncva.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/briva.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/bni.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/cimbva.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/danamonva.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/mandiri.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/maybankva.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/permatava.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/sinarmasva.webp" class="kbrstore-pgimg">
                        <img src="/assets/payment/dana.png" class="kbrstore-pgimg">
                        <img src="/assets/payment/Gopay.webp" class="kbrstore-pgimg">
                    </div>
                </div>

                <div class="col-md-3 col-lg-2 p-4">
                    <h5 class="mt-2 mb-1">Aksi Cepat</h5>
                    <div class="mt-3">
                        <?php if(Auth::check()): ?>
                            <?php if(Auth()->user()->role == 'Member' || Auth()->user()->role == 'Platinum' || Auth()->user()->role == 'Gold'): ?>
                                <a href="<?php echo e(url('')); ?>">Home</a><br>
                                <a href="<?php echo e(url('/cari')); ?>">Cek Pesanan</a><br>
                                <a href="<?php echo e(url('/daftar-harga')); ?>">Daftar Harga</a><br>
                                <a href="<?php echo e(url('/riwayat-pembelian')); ?>">Riwayat Pembelian</a><br>
                                <a href="<?php echo e(url('/deposit')); ?>">Top Up Saldo</a><br>
                                <a href="<?php echo e(url('/user/edit/profile')); ?>">Edit Profile</a><br>
                                <a href="<?php echo e(url('/membership')); ?>">Upgrade Membership</a><br>
                            <?php else: ?>
                                <a href="<?php echo e(url('')); ?>">Home</a><br>
                                <a href="<?php echo e(url('/cari')); ?>">Cek Pesanan</a><br>
                                <a href="<?php echo e(url('/daftar-harga')); ?>">Daftar Harga</a><br>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="<?php echo e(url('')); ?>">Home</a><br>
                            <a href="<?php echo e(url('/cari')); ?>">Cek Pesanan</a><br>
                            <a href="<?php echo e(url('/daftar-harga')); ?>">Daftar Harga</a><br>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-3 col-lg-2 p-4">
                    <h5 class="mt-2 mb-1">Hubungi Kami</h5>
                    <div class="mt-3">
                        <i class="fab fa-whatsapp"></i> <a href="<?php echo e(!$config ? '' : $config->url_wa); ?>"
                            target="_blank">WhatsApp</a><br>
                        <i class="fab fa-instagram"></i> <a href="<?php echo e(!$config ? '' : $config->url_ig); ?>"
                            target="_blank">Instagram</a><br>
                        <i class="fab fa-facebook"></i> <a href="<?php echo e(!$config ? '' : $config->url_fb); ?>"
                            target="_blank">Facebook</a><br>
                    </div>
                </div>
            </div>

            <div class="row mt-3 border-top pt-3">
                <div class="col text-center">
                    <small class="text-copyright">
                        Copyright © <?php echo e(date('Y')); ?>

                        <a href="<?php echo e(url('')); ?>"><?php echo e(env('APP_NAME')); ?></a>
                        All Rights Reserved
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" tabindex="-1" id="modal-logout">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-card">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin untuk keluar dari akun ?</p>
                    <div class="text-end">
                        <form method="POST" action="<?php echo e(url('/logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="button" class="btn btn-default text-black" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleHelpCenter() {
            const helpOptions = document.getElementById('help-options');
            helpOptions.classList.toggle('show');
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var modal_logout = new bootstrap.Modal(document.getElementById('modal-logout'));
        function logout() {
            modal_logout.show();
        }
    </script>
    <script>
        // Navbar blur on scroll
        (function () {
            var lastKnownScrollY = 0;
            var ticking = false;
            var navbar = document.querySelector('.navbar');
            if (!navbar) return;

            function onScroll() {
                lastKnownScrollY = window.scrollY || window.pageYOffset;
                if (!ticking) {
                    window.requestAnimationFrame(update);
                    ticking = true;
                }
            }

            function update() {
                var shouldBlur = lastKnownScrollY > 10;
                if (shouldBlur) {
                    navbar.classList.add('navbar-blur');
                } else {
                    navbar.classList.remove('navbar-blur');
                }
                ticking = false;
            }

            window.addEventListener('scroll', onScroll, { passive: true });
            // Initial state
            update();
        })();
    </script>
    <script>
        var delay = (function () {
            var timer = 0;
            return function (callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })();
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
        })

    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <?php echo $__env->yieldPushContent('custom_script'); ?>

</body>

</html><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/template/template.blade.php ENDPATH**/ ?>