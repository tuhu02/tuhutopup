<?php $__env->startSection("content"); ?>
<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php elseif(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<div class="row mt-4">
    <div class="col-12">
        <div class="card mt-2">
            <div class="card-body">
                <h4 class="page-title text-dark">Riwayat deposit</h4>
                <div class="table-responsive">
                    <table class="table m-o">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Jumlah</th>
                                <th>Metode</th>
                                <th>No Pembayaran</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_pesanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $label_pesanan = '';
                            if($data_pesanan->status == "Pending"){
                                $label_pesanan = 'warning';
                            }else if($data_pesanan->status == "Success"){
                                $label_pesanan = 'success';
                            }else{
                                $label_pesanan = 'danger';
                            }
                            ?>
                            <tr class="table-<?php echo e($label_pesanan); ?>">
                                <th scope="row"><?php echo e($data_pesanan->id); ?></th>
                                <td><?php echo e($data_pesanan->username); ?></td>
                                <td>Rp. <?php echo e(number_format($data_pesanan->jumlah, 0, '.', ',')); ?></td>
                                <th><?php echo e($data_pesanan->metode); ?></th>
                                <td><?php echo $data_pesanan->metode != "QRIS" ? $data_pesanan->no_pembayaran : '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Lihat QR</button>'; ?></td>
                                <td><?php echo e($data_pesanan->status); ?></td>
                                <td><?php echo e($data_pesanan->created_at); ?></td>
                                <td><a href="<?php echo e(route('confirm.deposit', [$data_pesanan->id,'Success'])); ?>" class="btn btn-success">Konfirmasi</a></td>
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
        $('.table').DataTable();
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("main-admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/components/admin/user-deposit.blade.php ENDPATH**/ ?>