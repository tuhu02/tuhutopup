<?php $__env->startSection('custom_style'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Oxanium:wght@200;300;400;500;600;700;800&display=swap');

    html, body {
        font-family: 'Oxanium', cursive;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow-y: hidden; /* Mencegah scroll vertikal */
        color: #333;
    }

    .login-container {
        display: flex;
        /* align-items: stretch; PENTING: Membuat kolom kiri & kanan meregang setinggi container */
        align-items: stretch;
        min-height: 100vh;
    }

    .login-wrapper {
        max-width: 420px;
        width: 100%;
        padding: 2rem; /* Sedikit padding agar form tidak terlalu mepet */
    }
    
    .btn-login:hover {
        opacity: 0.9;
    }
    
    .login-footer {
        font-size: .9rem;
        margin-top: 1rem;
    }

    /* BARU: Styling untuk gambar banner agar full height */
    .login-banner-img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Kunci agar gambar mengisi penuh tanpa distorsi */
    }

    footer,
    .content-body {
        display: none !important;
    }

	.close-button {
    position: absolute;
    top: 20px;
    left: 20px;
    
    width: 40px;
    height: 40px;
    
    background-color: #e9ecef;
    color: #495057;
    
    border-radius: 50%; /* Membuatnya menjadi lingkaran */
    text-decoration: none; /* Menghilangkan garis bawah pada link */
    
    display: flex;
    align-items: center;
    justify-content: center;
    
    font-size: 24px;
    font-weight: bold;
    
    z-index: 10; /* Memastikan tombol berada di lapisan paling atas */
    transition: all 0.2s ease-in-out; /* Animasi halus saat hover */
}

.close-button:hover {
    background-color: #ced4da;
    transform: rotate(90deg); /* Efek berputar saat disentuh mouse */
}
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<a href="<?php echo e(url('/')); ?>" class="close-button">&times;</a>

<div class="container-fluid g-0 login-container">
    <div class="row g-0 w-100">

        
        <div class="col-lg-5 d-flex align-items-center justify-content-center" style="background-color: #ffffffff;">
            <div class="login-wrapper">
                <h3 class="mb-2 text-black">Masuk</h3>
                <p class="mb-4 text-muted">Masuk dengan akun yang telah kamu daftarkan.</p>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                <?php endif; ?>
                <?php if(session('success')): ?>
                    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>

                <form action="<?php echo e(url('/login')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label class="form-label text-black">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan Username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-black">Kata sandi</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label text-black" for="rememberMe">
                                Ingat akun ku
                            </label>
                        </div>
                        <a href="<?php echo e(url('/forgot-password')); ?>" class="text-decoration-none text-warning">Lupa kata sandi?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 btn-login">Masuk</button>
                </form>

                <div class="login-footer text-center text-muted">
                    Belum memiliki akun?
                    <a href="<?php echo e(url('/register')); ?>" class="text-decoration-none text-warning">Daftar Sekarang</a>
                </div>
            </div>
        </div>
        
        
        
        <div class="col-lg-7 d-none d-lg-block p-0">
            <img src="https://i.ytimg.com/vi/QWIf6-xP-og/maxresdefault.jpg" alt="Login Banner" class="login-banner-img">
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/template/login.blade.php ENDPATH**/ ?>