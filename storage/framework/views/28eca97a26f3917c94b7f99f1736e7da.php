

<?php $__env->startSection('custom_style'); ?>


<style>
    .btn:disabled{background:#8ba4b1;border-color:#8ba4b1}
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
									<div class="px-3 pt-3 mb-3">
				<h2 class="mb-4">Cek Pesanan anda</h2>
				<?php if(session('error')): ?>
			    
			    <div class="alert alert-danger">
			       <ul>
			           <li><?php echo e(session('error')); ?></li>
			       </ul>
			    </div>
			    
			    <?php endif; ?>
			    <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
				<form action="<?php echo e(url('/cari')); ?>" method="POST" class="my-form">
				    <?php echo csrf_field(); ?>
					<div class="mb-3">
						<label>No Invoice</label>
						<input type="text" class="form-control" placeholder="INVxxxxxxRM" name="id" autocomplete="off" required>
					</div>
					<div class="mt-3">
						<button class="btn btn-primary w-100" type="submit"><i class="mdi mdi-shopping mr-1"></i> Check Pesanan</button>
					</div>
				</form>
				
				
			</div>
			
					</div>
		
        
        
        






<?php $__env->startPush('custom_script'); ?>



<?php $__env->stopPush(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/template/history.blade.php ENDPATH**/ ?>