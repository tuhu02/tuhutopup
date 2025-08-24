

<?php if(Auth::check()): ?>
    
    
    
    <style>
        .user-menu {
            position: relative
        }

        .user-menu .dropdown-menu {
            top: calc(100% + 8px);
            right: 0;
            left: auto
        }
    </style>
    <nav class="navbar navbar-expand-lg d-flex fixed-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(url('')); ?>">
                <img src="<?php echo e(url('')); ?><?php echo e(!$config ? '' : $config->logo_header); ?>" alt="Logo" width="50">
            </a>

            <div class="search-item">
                <div class="input-group search-bar" id="dropsearchdown" aria-haspopup="true" aria-expanded="false">
                    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" name="q" placeholder="Cari..." id="searchProds" class="form-control input-box"
                        autocomplete="off">
                </div>
            </div>

            <div class="hasil-cari">
                <ul class="position-absolute resultsearch shadow dropdown-menu" aria-labelledby="dropsearchdown"></ul>
            </div>

            <button class="navbar-toggler border-0 d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasLoggedInNavbar" aria-controls="offcanvasLoggedInNavbar">
                <span><i class="fa fa-bars-staggered text-light"></i></span>
            </button>

            
            <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="offcanvasLoggedInNavbar"
                aria-labelledby="offcanvasLoggedInNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasLoggedInNavbarLabel">
                        <img src="<?php echo e(url('')); ?><?php echo e(!$config ? '' : $config->logo_header); ?>" alt="Logo" width="50">
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-lg-none">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        
                        <?php if(in_array(Auth::user()->role, ['Member', 'Platinum', 'Gold'])): ?>
                            <div class="card bg-card mb-2">
                                <div class="card-body">
                                    <span class="py-1 px-2 float-end rounded bg-warning text-dark"
                                        style="font-size: 12px;"><?php echo e(Str::title(Auth::user()->role)); ?></span>
                                    <h5 class="card-title"><?php echo e(Str::title(Auth::user()->name)); ?></h5>
                                    <p class="card-text">Rp <?php echo e(number_format(Auth::user()->balance, 0, ',', '.')); ?></p>
                                </div>
                            </div>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('')); ?>"><i class="fa-solid fa-house"></i>
                                    Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/user/dashboard')); ?>"><i
                                        class="fa-solid fa-gauge-high"></i> Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/cari')); ?>"><i
                                        class="fa-solid fa-magnifying-glass"></i> Cek Pesanan</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/riwayat-pembelian')); ?>"><i
                                        class="fa-solid fa-clock-rotate-left"></i> Riwayat Pembelian</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/deposit')); ?>"><i
                                        class="fa-solid fa-wallet"></i> Top Up Saldo</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/user/edit/profile')); ?>"><i
                                        class="fa-solid fa-user-pen"></i> Edit Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/membership')); ?>"><i
                                        class="fa-solid fa-circle-up"></i> Upgrade Membership</a></li>
                            <li class="nav-item mt-2"><button onclick="logout();"
                                    class="btn bg-white border-0 text-danger w-100">Logout</button></li>
                        <?php else: ?>
                            
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('')); ?>"><i class="fa-solid fa-house"></i>
                                    Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/cari')); ?>"><i
                                        class="fa-solid fa-magnifying-glass"></i> Cek Pesanan</a></li>
                            <li class="nav-item"><a class="nav-link text-primary" href="<?php echo e(url('/dashboard')); ?>"><i
                                        class="fa-solid fa-arrow-right-to-bracket"></i> Dashboard</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            
            <div class="collapse navbar-collapse d-none d-lg-block">
                <div class="navbar-nav ms-auto nav-stacked d-flex align-items-center gap-3">
                    <a class="nav-link" href="<?php echo e(url('')); ?>">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                    <a class="nav-link" href="<?php echo e(url('/cari')); ?>">
                        <i class="fa-solid fa-magnifying-glass"></i> Cek Pesanan
                    </a>

                    
                    <div class="user-menu dropdown">
                        <a href="#" class="d-flex align-items-center gap-2 text-decoration-none text-dark dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="text-end me-2">
                                <div class="fw-semibold text-black"><?php echo e(Auth::user()->name); ?></div>
                                <!-- <div class="text-muted small"><?php echo e(Str::title(Auth::user()->role)); ?></div> -->
                            </div>
                            <img src="<?php echo e(Auth::user()->profile_photo
            ? asset(Auth::user()->profile_photo)
            : url('https://is3.cloudhost.id/nextopupcdn/p/1694875834.gif')); ?>" alt="Profile"
                                class="rounded-circle border" width="40" height="40">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end shadow p-2 mt-2">
                            <a href="<?php echo e(url('/user/dashboard')); ?>" class="dropdown-item">
                                <i class="fa-solid fa-user"></i> Akun
                            </a>
                            <div class="dropdown-divider"></div>
                            <button type="button" class="dropdown-item text-danger" onclick="logout()">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </nav>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
        <?php echo csrf_field(); ?>
    </form>
    <script>
        function logout() {
            document.getElementById('logout-form').submit();
        }
    </script>
<?php else: ?>
    
    
    
    <nav class="navbar navbar-expand-lg d-flex fixed-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(url('')); ?>">
                <img src="<?php echo e(url('')); ?><?php echo e(!$config ? '' : $config->logo_header); ?>" alt="Logo" width="50">
            </a>

            <div class="search-item">
                <div class="input-group search-bar" id="dropsearchdown" aria-haspopup="true" aria-expanded="false">
                    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" name="q" placeholder="Cari..." id="searchProds" class="form-control input-box"
                        autocomplete="off">
                </div>
            </div>

            <div class="hasil-cari">
                <ul class="position-absolute resultsearch shadow dropdown-menu" aria-labelledby="dropsearchdown"></ul>
            </div>

            <button class="navbar-toggler border-0 d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasGuestNavbar" aria-controls="offcanvasGuestNavbar">
                <span><i class="fa fa-bars-staggered text-light"></i></span>
            </button>

            <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="offcanvasGuestNavbar"
                aria-labelledby="offcanvasGuestNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasGuestNavbarLabel">
                        <img src="<?php echo e(url('')); ?><?php echo e(!$config ? '' : $config->logo_header); ?>" alt="Logo" width="50">
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-lg-none">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(url('')); ?>"><i class="fa-solid fa-house"></i>
                                Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/cari')); ?>"><i
                                    class="fa-solid fa-magnifying-glass"></i> Cek Pesanan</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/login')); ?>"><i
                                    class="fa-solid fa-arrow-right-to-bracket"></i> Login</a></li>
                    </ul>
                </div>
            </div>

            <div class="collapse navbar-collapse text-right d-none d-lg-block">
                <div class="navbar-nav ms-auto nav-stacked">
                    <a class="nav-link" href="<?php echo e(url('')); ?>"><i class="fa-solid fa-house"></i> Home</a>
                    <a class="nav-link" href="<?php echo e(url('/cari')); ?>"><i class="fa-solid fa-magnifying-glass"></i> Cek
                        Pesanan</a>
                    <a class="nav-link" href="<?php echo e(url('/login')); ?>"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </div>
            </div>
        </div>
    </nav>
<?php endif; ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/components/navbar.blade.php ENDPATH**/ ?>