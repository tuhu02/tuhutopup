

<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Pesanan Manual</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">/Pesanan Manual</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
<?php if(session('error')): ?>
<div class="alert alert-danger">
    <?php echo e(session('error')); ?>

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
<div class="card">
    <div class="card-body">
        <h4 class="mb-3 header-title mt-0">Buat Pesanan Manual</h4>
        <form action="<?php echo e(url('/pesanan/manual')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label" for="example-fileinput">User ID</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="uid">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label" for="example-fileinput">Server ID</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="zone">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label" for="example-fileinput">Kategori</label>
                <div class="col-lg-10">
                    <select class="form-control kategori" name="kategori">
                    <option value="">--PILIH KATEGORI--</option>
                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ktg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($ktg->id); ?>"><?php echo e($ktg->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label" for="example-fileinput">Layanan</label>
                <div class="col-lg-10">
                    <select class="form-control layanan" name="layanan">

                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-1">Riwayat Pesanan Manual</h4>
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>OID</th>
                                <th>UID</th>
                                <th>Nickname</th>
                                <th>Layanan</th>
                                <th>Harga</th>
                                <th>PID</th>
                                <th>Status</th>
                                <th>Log</th>
                                <th>Pembayaran</th>
                                <th>Metode</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_pesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $label_pesanan = '';
                            if($data_pesanan->status == "Batal"){
                            $label_pesanan = 'warning';
                            }else if($data_pesanan->status == "Pending" || $data_pesanan->status == "Menunggu"){
                            $label_pesanan = 'info';
                            }else if($data_pesanan->status == "Success" || $data_pesanan->status == "Sukses"){
                            $label_pesanan = 'success';
                            }else{
                            $label_pesanan = 'danger';
                            }
                            ?>
                            <tr class="table-<?php echo e($label_pesanan); ?>">
                                <th scope="row">#<?php echo e($data_pesanan->order_id); ?></th>
                                <td><?php echo e($data_pesanan->user_id); ?> <?php echo e($data_pesanan->zone != null ? "(".$data_pesanan->zone.")" : ''); ?></td>
                                <td><?php echo e($data_pesanan->nickname == null ? '-' : $data_pesanan->nickname); ?></td>
                                <td><?php echo e($data_pesanan->layanan); ?></td>
                                <td>Rp. <?php echo e(number_format($data_pesanan->harga, 0, '.', ',')); ?></td>
                                <td><?php echo e($data_pesanan->provider_order_id == null ? '-' : $data_pesanan->provider_order_id); ?></td>
                                <td>
                                    <?php echo e($data_pesanan->status); ?>

                                </td>
                                <td><?php echo e($data_pesanan->log); ?></td>
                                <td><?php echo e($data_pesanan->status_pembayaran); ?></td>
                                <td><?php echo e($data_pesanan->metode); ?></td>
                                <td><?php echo e($data_pesanan->created_at); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
               
        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.table').DataTable({
        });
    });
    
    
    $('.kategori').change(function(){
         const data = $(this).val();
         $.ajax({
            url: "<?php echo e(url('/pesanan/manual/ajax/layanan')); ?>",
            method: "POST",
            data: {data:data,_token:"<?php echo e(csrf_token()); ?>"},
            success:function(res){
              $('.layanan').empty();
              $('.layanan').append(res);
            }
         });
    });
    
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('main-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/components/admin/ordermanual.blade.php ENDPATH**/ ?>