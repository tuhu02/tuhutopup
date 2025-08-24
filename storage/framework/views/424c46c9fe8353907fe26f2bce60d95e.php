

<?php $__env->startSection('content'); ?>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Setelan Layanan PPOB</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">/Layanan PPOB</li>
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

    <!-- Import Excel Section -->
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3 header-title mt-0">Import Layanan PPOB dari Excel</h4>
            <div class="import-section">
                <div class="row">
                    <div class="col-md-8">
                        <form action="<?php echo e(route('layanan-ppob.import')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label class="form-label">Pilih Kategori</label>
                                <select class="form-select" name="kategori_id" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($kategori->id); ?>"><?php echo e($kategori->nama); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pilih Provider</label>
                                <select class="form-select" name="provider" required>
                                    <option value="">Pilih Provider</option>
                                    <option value="digiflazz">Digiflazz</option>
                                    <option value="apigames">API Games</option>
                                    <option value="vip">Vip Reseller</option>
                                    <option value="smileone">SmileOne</option>
                                    <option value="joki">Joki</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">File Excel (.xlsx, .xls)</label>
                                <div class="file-upload-wrapper">
                                    <input type="file" name="excel_file" id="excelFile" accept=".xlsx,.xls" required>
                                    <button type="button" class="btn"
                                        onclick="document.getElementById('excelFile').click()">
                                        <i class="fas fa-cloud-upload-alt me-2"></i>
                                        <span id="fileLabel">Pilih File Excel</span>
                                    </button>
                                </div>
                                <small class="form-text text-muted">
                                    Format Excel harus memiliki kolom: Kode Produk, Harga, Status, Produk
                                </small>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-upload me-2"></i>Import Layanan PPOB
                            </button>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-info">
                            <h6><i class="fas fa-info-circle me-2"></i>Petunjuk Import:</h6>
                            <ol class="mb-0">
                                <li>Pilih kategori PPOB</li>
                                <li>Pilih provider</li>
                                <li>Upload file Excel dari provider</li>
                                <li>Klik Import Layanan PPOB</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Manual Add Section -->
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3 header-title mt-0">Tambah Layanan PPOB Manual</h4>
            <form action="<?php echo e(route('layanan-ppob.post')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Nama Layanan</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('nama')); ?>" name="nama" placeholder="Contoh: Token Rp 20.000">
                        <?php $__errorArgs = ['nama'];
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
                    <label class="col-lg-2 col-form-label">Kategori</label>
                    <div class="col-lg-10">
                        <select class="form-select" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($kategori->id); ?>"><?php echo e($kategori->nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Brand</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('brand')); ?>" name="brand" placeholder="Contoh: PLN, PDAM, dll">
                        <?php $__errorArgs = ['brand'];
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
                    <label class="col-lg-2 col-form-label">Provider</label>
                    <div class="col-lg-10">
                        <select class="form-select" name="provider" required>
                            <option value="">Pilih Provider</option>
                            <option value="digiflazz">Digiflazz</option>
                            <option value="apigames">API Games</option>
                            <option value="vip">Vip Reseller</option>
                            <option value="smileone">SmileOne</option>
                            <option value="joki">Joki</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Provider ID</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control <?php $__errorArgs = ['provider_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('provider_id')); ?>" name="provider_id" placeholder="Kode produk dari provider">
                        <?php $__errorArgs = ['provider_id'];
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
                    <label class="col-lg-2 col-form-label">Tipe Layanan</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control <?php $__errorArgs = ['tipe_layanan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('tipe_layanan')); ?>" name="tipe_layanan"
                            placeholder="Contoh: Token Listrik, Top Up E-Money">
                        <?php $__errorArgs = ['tipe_layanan'];
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
                    <label class="col-lg-2 col-form-label">Tipe</label>
                    <div class="col-lg-10">
                        <select class="form-select" name="tipe" required>
                            <option value="">Pilih Tipe</option>
                            <option value="pulsa">Pulsa</option>
                            <option value="e-money">E-Money</option>
                            <option value="streamingapp">Streaming APP</option>
                            <option value="utilities">Utilities</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Harga</label>
                    <div class="col-lg-10">
                        <input type="number" class="form-control <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('harga')); ?>" name="harga" placeholder="Harga untuk customer">
                        <?php $__errorArgs = ['harga'];
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
                    <label class="col-lg-2 col-form-label">Harga Reseller</label>
                    <div class="col-lg-10">
                        <input type="number" class="form-control <?php $__errorArgs = ['harga_reseller'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('harga_reseller')); ?>" name="harga_reseller" placeholder="Harga untuk reseller">
                        <?php $__errorArgs = ['harga_reseller'];
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

    <!-- Data Table Section -->
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mt-0 mb-3">Data Layanan PPOB</h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Layanan</th>
                            <th>Brand</th>
                            <th>Kategori</th>
                            <th>Provider</th>
                            <th>Provider ID</th>
                            <th>Tipe Layanan</th>
                            <th>Tipe</th>
                            <th>Harga</th>
                            <th>Harga Reseller</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($data->layanan); ?></td>
                                <td><?php echo e($data->brand); ?></td>
                                <td><?php echo e($data->nama_kategori); ?></td>
                                <td><?php echo e($data->provider ?? '-'); ?></td>
                                <td><?php echo e($data->provider_id); ?></td>
                                <td><?php echo e($data->tipe_layanan); ?></td>
                                <td><?php echo e($data->tipe); ?></td>
                                <td>Rp <?php echo e(number_format($data->harga, 0, ',', '.')); ?></td>
                                <td>Rp <?php echo e(number_format($data->harga_reseller, 0, ',', '.')); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo e($data->status == 'available' ? 'success' : 'warning'); ?>">
                                        <?php echo e(ucfirst($data->status)); ?>

                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-info"
                                            onclick="detailLayanan(<?php echo e($data->id); ?>)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="<?php echo e(route('layanan-ppob.delete', $data->id)); ?>" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="<?php echo e(route('layanan-ppob.update', ['id' => $data->id, 'status' => $data->status == 'available' ? 'unavailable' : 'available'])); ?>"
                                            class="btn btn-sm btn-<?php echo e($data->status == 'available' ? 'warning' : 'success'); ?>">
                                            <i class="fas fa-<?php echo e($data->status == 'available' ? 'pause' : 'play'); ?>"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="11" class="text-center">Belum ada data layanan PPOB</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Edit Layanan PPOB</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detailModalBody">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function detailLayanan(id) {
            $.get("<?php echo e(url('/layanan-ppob')); ?>/" + id + "/detail", function (data) {
                $("#detailModalBody").html(data);
                $("#detailModal").modal('show');
            });
        }

        // File upload label update
        document.getElementById('excelFile').addEventListener('change', function (e) {
            var fileName = e.target.files[0] ? e.target.files[0].name : 'Pilih File Excel';
            document.getElementById('fileLabel').textContent = fileName;
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/components/admin/layanan-ppob.blade.php ENDPATH**/ ?>