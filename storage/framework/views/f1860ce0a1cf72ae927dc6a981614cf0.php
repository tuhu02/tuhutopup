<?php $__env->startSection('content'); ?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Setelan Payment</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">/Payment</li>
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
<div class="card">
    <div class="card-body">
        <h4 class="mb-3 header-title mt-0">Tambah Payment</h4>
        <form action="<?php echo e(route('method.post')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label" for="example-fileinput">Nama</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>" name="name">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label" for="example-fileinput">Kode</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('code')); ?>" name="code">
                    <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label" for="example-fileinput">Keterangan</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('keterangan')); ?>" name="keterangan">
                    <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label" for="example-fileinput">Tipe</label>
                <div class="col-lg-10">
                    <select class="form-select" name="tipe">
                        <option value="qris">QRIS</option>
                        <option value="e-walet">E-Wallet</option>
                        <option value="virtual-account">Virtual Account</option>
                        <option value="convenience-store">Convenience Store</option>
                    </select>
                    <?php $__errorArgs = ['tipe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-lg-2 col-form-label" for="example-fileinput">Images</label>
                <div class="col-lg-10">
                    <input type="file" class="form-control" name="images">
                    <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                <h4 class="header-title mt-0 mb-1">Semua Payment</h4>
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Kode</th>
                                <th>Keterangan</th>
                                <th>Tipe</th>
                                <th>Images</th>
                                <th>Aksi</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($datas->id); ?></th>
                                <td><?php echo e($datas->name); ?></td>
                                <td><?php echo e($datas->code); ?></td>
                                <td><?php echo e($datas->keterangan); ?></td>
                                <td><?php echo e($datas->tipe); ?></td>
                                <td><?php echo e($datas->images); ?></td>
                                <td>
                                    <a href="javascript:;" onclick="modal('<?php echo e($datas->nama); ?>', '<?php echo e(route('method.detail', [$datas->id])); ?>')" class="btn-sm btn-info mb-3">Edit</a>
                                    <br>
                                     <br>
                                    <a class="btn-sm btn-danger mt-2" href="/method/hapus/<?php echo e($datas->id); ?>">Hapus</a>
                                </td>
                                <td><?php echo e($datas->created_at); ?></td>
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
    
    function modal(name, link) {
        var myModal = new bootstrap.Modal($('#modal-detail'))
        $.ajax({
            type: "GET",
            url: link,
            beforeSend: function() {
                $('#modal-detail-title').html(name);
                $('#modal-detail-body').html('Loading...');
            },
            success: function(result) {
                $('#modal-detail-title').html(name);
                $('#modal-detail-body').html(result);
            },
            error: function() {
                $('#modal-detail-title').html(name);
                $('#modal-detail-body').html('There is an error...');
            }
        });
        myModal.show();
    }
</script>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="modal-detail" style="border-radius:7%">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-detail-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-detail-body"></div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/components/admin/method.blade.php ENDPATH**/ ?>