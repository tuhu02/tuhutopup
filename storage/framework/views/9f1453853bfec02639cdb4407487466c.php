<?php $__env->startSection('custom_style'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Oxanium:wght@200;300;400;500;600;700;800&display=swap');

    html, body {
        font-family: 'Oxanium', cursive;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow-y: hidden;
        color: #333;
    }

    .register-container {
        display: flex;
        align-items: stretch;
        min-height: 100vh;
    }

    .register-wrapper {
        max-width: 420px;
        width: 100%;
        padding: 2rem;
    }
    
    .register-banner-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
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
        border-radius: 50%;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: bold;
        z-index: 10;
        transition: all 0.2s ease-in-out;
    }

    .close-button:hover {
        background-color: #ced4da;
        transform: rotate(90deg);
    }
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<a href="<?php echo e(url('/')); ?>" class="close-button">&times;</a>

<div class="container-fluid g-0 register-container">
    <div class="row g-0 w-100">

        
        <div class="col-lg-5 d-flex align-items-center justify-content-center" style="background-color: #ffffffff;">
            <div class="register-wrapper">
                <h2 class="text-black">Halo, mari bergabung</h2>
                <p class="mb-2 text-black">Buat akun sekarang dan rasakan fitur fitur yang menarik. ✌️</p>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <form action="<?php echo e(url('/register')); ?>" method="POST" class="my-forma">
                    <?php echo csrf_field(); ?>
                     <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Nama Lengkap" autocomplete="off" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" autocomplete="off" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" autocomplete="off" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label>Nomor Whatsapp</label>
                        <input type="number" class="form-control" placeholder="Nomor Whatsapp" autocomplete="off" name="no_wa" required>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary w-100" type="submit" name="tombol" value="submit">Mendaftar</button>
                    </div>
                    <p class="mt-3">Sudah memiliki akun ? <a href="<?php echo e(url('/login')); ?>" class="text-decoration-none text-primary">Masuk</a></p>
                </form>
            </div>
        </div>
        
        
        <div class="col-lg-7 d-none d-lg-block p-0">
            <img src="https://i.ytimg.com/vi/QWIf6-xP-og/maxresdefault.jpg" alt="register Banner" class="register-banner-img">
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/template/register.blade.php ENDPATH**/ ?>