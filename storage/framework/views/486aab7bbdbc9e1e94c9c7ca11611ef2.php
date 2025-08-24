

<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Data Joki</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">/Data Joki</li>
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
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table m-o">
                        <thead>
                            <tr>
                                <th>OID</th>
                                <th>Nomor</th>
                                <th>Layanan</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Login Via</th>
                                <th>Nickname</th>
                                <th>Request</th>
                                <th>Catatan</th>
                                <th>Status Joki</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $label_pesanan = '';
                            if($datas->status_joki == "Sukses"){
                            $label_pesanan = 'success';
                            }else{
                            $label_pesanan = 'danger';
                            }
                            ?>
                            
                           
                           <tr>
                               <th scope="row">#<?php echo e($datas->order_id); ?></th>
                               <td><?php echo e($datas->nomor); ?></td>
                               <td><?php echo e($datas->layanan); ?></td>
                               <td><?php echo e($datas->email); ?></td>
                               <td><?php echo e($datas->password); ?></td>
                               <td><?php echo e($datas->loginvia); ?></td>
                               <td><?php echo e($datas->nickname); ?></td>
                               <td><?php echo e($datas->request); ?></td>
                               <td><?php echo e($datas->catatan); ?></td>
                               <td>
                                   <div class="btn-group-vertical">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-<?php echo e($label_pesanan); ?> dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> <?php echo e($datas->status_joki); ?> <i class="mdi mdi-chevron-down"></i> </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li><a class="dropdown-item" href="/joki-status/<?php echo e($datas->order_id); ?>/Sukses">Sukses</a></li>
                                            <li><a class="dropdown-item" href="/joki-status/<?php echo e($datas->order_id); ?>/Proses">Proses</a></li>
                                    </div>
                               </td>
                               <td>
                                    <a class="btn btn-danger" href="/joki/hapus/<?php echo e($datas->id); ?>">Hapus</a>
                               </td>
                           </tr>
                          
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.table').DataTable({
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/components/admin/datajoki.blade.php ENDPATH**/ ?>