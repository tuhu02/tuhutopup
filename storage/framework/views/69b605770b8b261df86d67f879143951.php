

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
<div class="content-body mt-5">
			<div class="col-lg-6 mx-auto px-3 pt-3 mb-3">
				<div class="">
					<form action="<?php echo e(url('/deposit')); ?>" method="POST" class="my-form px-3 mt-3">
					    <?php echo csrf_field(); ?>
						<h5 class="text-center mb-4">Top Up Saldo</h5>
						
						 <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <?php if(session('success')): ?>
			    
        			    <div class="alert alert-success">
        			       <ul>
        			           <li><?php echo e(session('success')); ?></li>
        			       </ul>
        			    </div>
        			    
        			    <?php endif; ?>
						
						<p>Pilih Metode Pembayaran</p>
						
						<div class="mb-3">
							<select class="form-control" name="metode" required>
                                            <option value="BCA">BCA(MANUAL)</option>
                                            <option value="OVO">OVO(MANUAL)</option>
                                            <option value="GOPAY">GOPAY(MANUAL)</option>
                                            <option value="DANA">DANA(MANUAL)</option>
                                            <option value="SHOPEPAY">SHOPEPAY(MANUAL)</option>
                                            <option value="BRI">BRI(MANUAL)</option>
                            </select>
						</div>
						
						<p>Masukan nominal Top Up</p>
						
						<div class="mb-2">
							<input type="number" class="form-control" autocomplete="off" name="jumlah" placeholder="Nominal Top Up" required>
						</div>
						 <button class="btn btn-primary w-100 mb-3" type="submit" name="tombol" value="submit">Top Up</button>
						<span class="d-block mb-3">
				            <a class="btn btn-success btn-sm" href="<?php echo e(!$config ? '' : $config->url_wa); ?>">KONFIRMASI ADMIN</a>
				        </span>
					</form>
					
					
					 <div class="table-responsive">
                            <table class="table m-o table-bordered text-nowrap text-white">
                                <thead class="bg-none">
                                    <tr>
                                        <th>ID</th>
                                        <th>Jumlah</th>
                                        <th>Metode</th>
                                        <th>No Pembayaran</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                        		<?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $zone = $pesanan->zone != null ? "-".$pesanan->zone : "";
                                    $label_pesanan = '';
                                    
                                    if($pesanan->status == "Pending" || $pesanan->status == "Batal"){
                                        $label_pesanan = 'warning';
                                    }else if($pesanan->status == "Processing"){
                                        $label_pesanan = 'info';
                                    }else if($pesanan->status == "Success"){
                                        $label_pesanan = 'success';
                                    }else{
                                        $label_pesanan = 'danger';
                                    }
                                ?>                        		
                        		<tr>
                        			<td><?php echo e($pesanan->id); ?></td>
                        			<td>Rp <?php echo e(number_format($pesanan->jumlah,0,',','.')); ?></td>
                        			<td><?php echo e($pesanan->metode); ?></td>
                        			<td><?php echo $pesanan->metode != "QRIS" ? $pesanan->no_pembayaran : '<a class="btn btn-primary" href="/assets/qrisdepo.png" target="_blank">Lihat QR</a>'; ?></td>
                        			<td><span class="badge bg-<?php echo e($label_pesanan); ?>"><?php echo e($pesanan->status); ?></span></td>
                        			<td><?php echo e($pesanan->created_at); ?></td>
                        		</tr>
                        		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        		<tr>
                        			<td align="center" colspan="6">Tidak ada riwayat</td>
                        		</tr>
                        		<?php endif; ?>
                        	</table>
                        </div>
				</div>
			</div>
		</div>
		
        

        






<?php $__env->startPush('custom_script'); ?>



<?php $__env->stopPush(); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/template/deposit.blade.php ENDPATH**/ ?>