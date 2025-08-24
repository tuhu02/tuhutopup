<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Riwayat Pesanan</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Admin/order</li>
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
                <h4 class="header-title mt-0 mb-1">Semua Pesanan</h4>
                <div class="table-responsive">
                    <table class="table m-o">
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
                            }else if($data_pesanan->status == "Pending"){
                            $label_pesanan = 'info';
                            }else if($data_pesanan->status == "Success"){
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
                                    <div class="btn-group-vertical">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-<?php echo e($label_pesanan); ?> dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> <?php echo e($data_pesanan->status); ?> <i class="mdi mdi-chevron-down"></i> </button>
                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <li><a class="dropdown-item" href="/order-status/<?php echo e($data_pesanan->order_id); ?>/Success">Success</a></li>
                                            <li><a class="dropdown-item" href="/order-status/<?php echo e($data_pesanan->order_id); ?>/Batal">Batal</a></li>
                                            <li><a class="dropdown-item" href="/order-status/<?php echo e($data_pesanan->order_id); ?>/Pending">Pending</a></li>
                                    </div>
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
<script>
    $(document).ready(function(){
        $('.table').DataTable({
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/components/admin/transaction.blade.php ENDPATH**/ ?>