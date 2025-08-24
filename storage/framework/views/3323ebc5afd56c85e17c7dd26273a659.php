<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?php echo e(!$config ? '' : $config->judul_web); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta content="<?php echo e(!$config ? '' : $config->deskripsi_web); ?>" name="description" />
    <meta content="SURS" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(url('')); ?><?php echo e(!$config ? '' : $config->logo_favicon); ?>">

    <!-- plugins -->
    <link href="/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="/assets/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- third party css -->
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">


    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

    <!-- Additional head content from child views -->
    <?php echo $__env->yieldContent('head'); ?>
    <!-- third party css end -->
</head>

<body class="loading" data-layout-mode="horizontal"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-end mb-0">
                    <?php if(auth()->guard()->check()): ?>
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?php echo e(url('')); ?>/assets/logo/logo-user.png" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    <i class="uil uil-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Hallo Admin 🙂</h6>
                                </div>


                                <div class="dropdown-divider"></div>

                                <form method="POST" action="<?php echo e(url('/logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item notify-item">
                                        <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Keluar</span>
                                    </button>
                                </form>

                            </div>
                        </li>
                    <?php endif; ?>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="#" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?php echo e(ENV('APP_FOOTER')); ?>" alt="" height="24">
                        </span>
                    </a>

                    <a href="#" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?php echo e(ENV('APP_FOOTER')); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(ENV('APP_FOOTER')); ?>" alt="" height="24">
                        </span>
                    </a>
                </div>


                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile">
                            <i data-feather="menu"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-bs-toggle="collapse"
                            data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <?php if(auth()->guard()->guest()): ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo e(route('home')); ?>">
                                        <i data-feather="home"></i>
                                        <span> Halaman utama </span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(auth()->guard()->check()): ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo e(route('dashboard')); ?>">
                                        <i data-feather="home"></i>
                                        <span> Dashboard </span>
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo e(route('pesanan')); ?>">
                                        <i data-feather="shopping-bag"></i>
                                        <span> Pesanan</span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo e(route('user.deposit')); ?>">
                                        <i data-feather="dollar-sign"></i>
                                        <span> Deposit </span>
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="credit-card"></i> Mutasi <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                        <a href="<?php echo e(route('ovo')); ?>" class="dropdown-item">Mutasi OVO</a>
                                        <a href="<?php echo e(route('gopay')); ?>" class="dropdown-item">Mutasi GOPAY</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="tool"></i> Konfigurasi <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                        <a href="<?php echo e(route('berita')); ?>" class="dropdown-item">Slide / Banner</a>
                                        <a href="<?php echo e(route('method')); ?>" class="dropdown-item">Payment</a>
                                        <a href="<?php echo e(url('/setting/web')); ?>" class="dropdown-item">Website</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="settings"></i> Produk <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                        <a href="<?php echo e(route('kategori')); ?>" class="dropdown-item">Kategori</a>
                                        <a href="<?php echo e(route('layanan')); ?>" class="dropdown-item">Layanan (Game)</a>
                                        <a href="<?php echo e(route('layanan-ppob')); ?>" class="dropdown-item">Layanan PPOB</a>
                                        <a href="<?php echo e(route('voucher')); ?>" class="dropdown-item">Voucher</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo e(route('member')); ?>">
                                        <i data-feather="user"></i>
                                        <span> Penggunaa </span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo e(url('/data/joki')); ?>">
                                        <i data-feather="database"></i>
                                        <span> Data Joki </span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="<?php echo e(url('/pesanan/manual')); ?>">
                                        <i data-feather="database"></i>
                                        <span> Pesanan Manual </span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul> <!-- end navbar-->
                    </div> <!-- end .collapsed-->
                </nav>
            </div> <!-- end container-fluid -->
        </div> <!-- end topnav-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; <?php echo e(ENV('APP_NAME')); ?>

                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="/assets/js/vendor.min.js"></script>

    <!-- include summernote css/js -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <!-- optional plugins -->
    <script src="/assets/libs/moment/min/moment.min.js"></script>
    <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/libs/flatpickr/flatpickr.min.js"></script>

    <!-- page js -->
    <script src="/assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.min.js"></script>
    <!-- third party js -->
    <script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- jQuery UI for drag and drop functionality -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <!-- quil -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <!-- third party js ends -->
</body>

</html><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/main-admin.blade.php ENDPATH**/ ?>