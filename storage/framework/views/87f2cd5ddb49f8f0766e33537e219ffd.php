<?php $__env->startSection('custom_style'); ?>
<style>
    .accordion-button {
        box-shadow: none !important;
    }

    .btn.disabled,
    .btn:disabled,
    fieldset:disabled {
        background: #8ba4b1;
        border-color: #8ba4b1;
    }

    .product .box {
        margin-bottom: 40px;
    }

    .box-profile {
        margin-top: -190px;
    }

    .box-profile .body {
        border-radius: 24px;
        height: 410px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05);
    }

    .box-profile .body .img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        text-align: center;
        line-height: 100px;
        border: 2px solid #fff;
        margin: -50px auto;
        font-size: 22px;
    }
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
    <div class="col-lg-6 mx-auto px-3 pt-3 mb-3">
        <div>
            <h5 class="text-center mb-4">Edit Profile</h5>
            <?php if($errors->any()): ?>
            <div class="alert alert-danger mt-2">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <?php if(session('success')): ?>
            <div class="alert alert-success mt-2">
                <ul>
                    <li><?php echo e(session('success')); ?></li>
                </ul>
            </div>
            <?php endif; ?>

            <form action="<?php echo e(url('/user/edit/profile')); ?>" method="POST" class="my-form px-3 mt-3">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" autocomplete="off" value="<?php echo e(Auth()->user()->name); ?>" name="name" required>
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" class="form-control" autocomplete="off" value="<?php echo e(Auth()->user()->username); ?>" name="username" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" autocomplete="off" placeholder="(Isi jika ingin ganti password)">
                </div>
                <div class="mb-3">
                    <label>No Whatsapp</label>
                    <input type="number" class="form-control" name="no_wa" autocomplete="off" value="<?php echo e(Auth()->user()->no_wa); ?>">
                </div>
                <button class="btn btn-primary w-100 mb-3" type="submit" name="tombol" value="submit">Update</button>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('custom_script'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/template/profile.blade.php ENDPATH**/ ?>