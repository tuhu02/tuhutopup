

<?php $__env->startSection('custom_style'); ?>


<style>
    .accordion-button{box-shadow:none!important}
    .btn:disabled{background:#8ba4b1;border-color:#8ba4b1}
    
    .box-profile{margin-top:-300px}
    .box-profile .body{border-radius:24px;box-shadow:0 10px 15px -3px rgba(0,0,0,.1) , 0 4px 6px -2px rgba(0,0,0,.05)}
    .my-form div small{color:#718096}
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
				
		   <h5 class="text-center mb-4">Upgrade Membership</h5>

<div class="p-3 px-5">
							    <span class="d-inline-block py-1 px-2 mb-2 rounded bg-secondary text-white w-100" style="font-size: 14px;">Platinum Rp.100.000,-</span>
							    <span class="d-inline-block py-1 px-2 mb-2 rounded bg-warning text-dark w-100" style="font-size: 14px;">Gold Rp.200.000,-</span>
							    <a href="https://wa.me/6281390898046" type="button" class="btn btn-primary mt-2 w-100" type="button"><i class="fa fa-whatsapp"></i> Beli Membership</a>
							</div>			
						
                        
                 </div>
</div>








<?php $__env->startPush('custom_script'); ?>

<script>
			var modal_logout = new bootstrap.Modal(document.getElementById('modal-logout'));

			function logout() {
				modal_logout.show();
			}
		</script>
		

<?php $__env->stopPush(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/template/membership.blade.php ENDPATH**/ ?>