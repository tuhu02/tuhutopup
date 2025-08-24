<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/sortable.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .kategori-card {
            border: 1px solid #e3e6f0;
            transition: all 0.3s ease;
            border-radius: 10px;
        }

        .kategori-card:hover {
            border-color: #4e73df;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .kategori-card .card-body {
            padding: 1.5rem;
        }

        .kategori-card .card-title {
            font-weight: 600;
            color: #5a5c69;
            margin-bottom: 0.5rem;
        }

        .kategori-card .card-text {
            font-size: 0.875rem;
        }

        .badge {
            font-size: 0.75rem;
            padding: 0.375rem 0.75rem;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }

        .import-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .file-upload-wrapper {
            position: relative;
            display: inline-block;
            cursor: pointer;
            width: 100%;
        }

        .file-upload-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-upload-wrapper .btn {
            width: 100%;
            padding: 12px;
            border: 2px dashed #dee2e6;
            background: white;
            color: #6c757d;
            transition: all 0.3s ease;
        }

        .file-upload-wrapper:hover .btn {
            border-color: #4e73df;
            color: #4e73df;
        }

        .progress {
            display: none;
            margin-top: 10px;
        }
    </style>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Setelan Layanan</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">/layanan</li>
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
            <h4 class="mb-3 header-title mt-0">Import Layanan dari Excel</h4>
            <div class="import-section">
                <div class="row">
                    <div class="col-md-8">
                        <form action="<?php echo e(route('layanan.import')); ?>" method="POST" enctype="multipart/form-data"
                            id="importForm">
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
                                    Format Excel harus memiliki kolom: Kode Produk (atau Kode Prod Produk/Kode), Harga,
                                    Status, Produk (atau Deskripsi/Perubahaı Deskripsi)
                                </small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Profit (%)</label>
                                <input type="number" class="form-control" name="profit" value="10" min="0" max="100"
                                    required>
                                <small class="form-text text-muted">Profit yang akan ditambahkan ke harga</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Profit Member (%)</label>
                                <input type="number" class="form-control" name="profit_member" value="8" min="0" max="100"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Profit Platinum (%)</label>
                                <input type="number" class="form-control" name="profit_platinum" value="6" min="0" max="100"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Profit Gold (%)</label>
                                <input type="number" class="form-control" name="profit_gold" value="5" min="0" max="100"
                                    required>
                            </div>
                            <button type="button" class="btn btn-info me-2" id="previewBtn">
                                <i class="fas fa-eye me-2"></i>Preview Data
                            </button>
                            <button type="button" class="btn btn-warning me-2" id="testBtn">
                                <i class="fas fa-bug me-2"></i>Test AJAX
                            </button>
                            <button type="submit" class="btn btn-primary" id="importBtn">
                                <i class="fas fa-upload me-2"></i>Import Layanan
                            </button>
                        </form>
                        <div class="progress mt-3" id="importProgress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                style="width: 0%"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-info">
                            <h6><i class="fas fa-info-circle me-2"></i>Petunjuk Import:</h6>
                            <ol class="mb-0">
                                <li>Pilih kategori layanan</li>
                                <li>Pilih provider</li>
                                <li>Upload file Excel dari Digiflazz</li>
                                <li>Set profit untuk setiap jenis member</li>
                                <li>Klik Import Layanan</li>
                            </ol>
                        </div>
                        <div class="alert alert-warning">
                            <h6><i class="fas fa-exclamation-triangle me-2"></i>Catatan:</h6>
                            <ul class="mb-0">
                                <li>File Excel harus dalam format .xlsx atau .xls</li>
                                <li>Kolom "Kode Produk" (atau "Kode Prod Produk"/"Kode") akan menjadi Provider ID</li>
                                <li>Kolom "Produk" (atau "Deskripsi"/"Perubahaı Deskripsi") akan menjadi nama layanan</li>
                                <li>Hanya layanan dengan status "Unlimited Aktif" yang akan diimport</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="mb-3 header-title mt-0">Tambah Layanan Manual</h4>
            <form action="<?php echo e(route('layanan.post')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Layanan</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('nama')); ?>" name="nama">
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
                        <select class="form-select" name="kategori">
                            <?php $__currentLoopData = $kategoris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($kategori->id); ?>"><?php echo e($kategori->nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Provider</label>
                    <div class="col-lg-10">
                        <select class="form-select" name="provider">
                            <option value="digiflazz">Digiflazz</option>
                            <option value="apigames">API Games</option>
                            <option value="vip">Vip Reseller</option>
                            <option value="smileone">SmileOne</option>
                            <option value="joki">Joki</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="" class="col-lg-1 col-form-label">Harga</label>
                    <div class="col-lg-5">
                        <input type="number" class="form-control <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('harga')); ?>" name="harga">
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
                    <label for="" class="col-lg-1 col-form-label">Harga Member</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control <?php $__errorArgs = ['harga_member'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('harga_member')); ?>" name="harga_member">
                        <?php $__errorArgs = ['harga_member'];
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
                    <label for="" class="col-lg-1 col-form-label">Harga Platinum</label>
                    <div class="col-lg-5">
                        <input type="number" class="form-control <?php $__errorArgs = ['harga_platinum'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('harga_platinum')); ?>" name="harga_platinum">
                        <?php $__errorArgs = ['harga_platinum'];
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
                    <label for="" class="col-lg-1 col-form-label">Harga Gold</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control <?php $__errorArgs = ['harga_gold'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('harga_gold')); ?>" name="harga_gold">
                        <?php $__errorArgs = ['harga_gold'];
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
                    <label for="" class="col-lg-1 col-form-label">Profit</label>
                    <div class="col-lg-5">
                        <input type="number" class="form-control <?php $__errorArgs = ['profit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('profit')); ?>" name="profit">
                        <?php $__errorArgs = ['profit'];
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
                    <label for="" class="col-lg-1 col-form-label">Profit Member</label>
                    <div class="col-lg-5">
                        <input type="number" class="form-control <?php $__errorArgs = ['profit_member'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('profit_member')); ?>" name="profit_member">
                        <?php $__errorArgs = ['profit'];
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
                    <label for="" class="col-lg-1 col-form-label">Profit Platinum</label>
                    <div class="col-lg-5">
                        <input type="number" class="form-control <?php $__errorArgs = ['profit_platinum'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('profit_platinum')); ?>" name="profit_platinum">
                        <?php $__errorArgs = ['profit'];
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
                    <label for="" class="col-lg-1 col-form-label">Profit Gold</label>
                    <div class="col-lg-5">
                        <input type="number" class="form-control <?php $__errorArgs = ['profit_gold'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('profit_gold')); ?>" name="profit_gold">
                        <?php $__errorArgs = ['profit'];
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
                    <label for="" class="col-lg-1 col-form-label">Provider ID</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control <?php $__errorArgs = ['provider_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('provider_id')); ?>" name="provider_id">
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

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!-- Card View untuk Kategori Produk -->
    <div class="row" id="kategoriCards">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Kategori Produk</h4>
                    <div class="row">
                        <?php
                            $kategoriGroups = $datas->groupBy('nama_kategori');
                        ?>
                        <?php $__currentLoopData = $kategoriGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori => $layananGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <div class="card kategori-card" style="cursor: pointer; transition: all 0.3s ease;"
                                    onclick="showLayananByKategori('<?php echo e($kategori); ?>')">
                                    <div class="card-body text-center">
                                        <div class="mb-2">
                                            <i class="fas fa-gamepad fa-3x text-primary"></i>
                                        </div>
                                        <h5 class="card-title"><?php echo e($kategori); ?></h5>
                                        <p class="card-text text-muted"><?php echo e($layananGroup->count()); ?> layanan tersedia</p>
                                        <div class="mt-2">
                                            <span
                                                class="badge bg-success"><?php echo e($layananGroup->where('status', 'available')->count()); ?>

                                                Available</span>
                                            <span
                                                class="badge bg-warning"><?php echo e($layananGroup->where('status', 'unavailable')->count()); ?>

                                                Unavailable</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel View untuk Layanan (Hidden by default) -->
    <div class="row" id="layananTable" style="display: none;">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="header-title mt-0 mb-0">Layanan - <span id="selectedKategori"></span></h4>
                        <div class="d-flex gap-2">
                            <button class="btn btn-success" onclick="saveSortOrder()" id="saveSortBtn"
                                style="display: none;">
                                <i class="fas fa-save"></i> Simpan Urutan
                            </button>
                            <button class="btn btn-secondary" onclick="showKategoriCards()">
                                <i class="fas fa-arrow-left"></i> Kembali ke Kategori
                            </button>
                        </div>
                    </div>

                    <!-- Toggle untuk mode pengurutan -->
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="sortModeToggle" onchange="toggleSortMode()">
                            <label class="form-check-label" for="sortModeToggle">
                                <i class="fas fa-sort"></i> Mode Pengurutan (Drag & Drop)
                            </label>
                        </div>

                        <!-- Debug buttons -->
                        <div class="mt-2">
                            <button type="button" class="btn btn-sm btn-outline-info" onclick="debugSortHandles()">
                                Debug: Hitung Sort Handles
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-warning" onclick="forceShowHandles()">
                                Debug: Force Show Handles
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-success" onclick="resetToggleState()">
                                Debug: Reset Toggle
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="tableLayanan" class="table m-0">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th width="50" id="sortHandleHeader" style="display: none;">
                                        <i class="fas fa-grip-vertical"></i>
                                    </th>
                                    <th>Layanan</th>
                                    <th>Provider</th>
                                    <th>PID</th>
                                    <th>Harga</th>
                                    <th>Harga Member</th>
                                    <th>Harga Platinum</th>
                                    <th>Harga Gold</th>
                                    <th>Profit</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody id="layananTableBody" style="position: relative;">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Data layanan dari server
        var layananData = <?php echo json_encode($datas, 15, 512) ?>;
        var dataTable = null;

        $(document).ready(function () {
            // Hover effect untuk card
            $('.kategori-card').hover(
                function () {
                    $(this).addClass('shadow-lg').css('transform', 'translateY(-5px)');
                },
                function () {
                    $(this).removeClass('shadow-lg').css('transform', 'translateY(0)');
                }
            );

            // Debug: Log jQuery UI availability
            if (typeof $.ui !== 'undefined') {
                console.log('✅ jQuery UI loaded successfully');
            } else {
                console.log('❌ jQuery UI not loaded');
            }

            // Debug: Log initial state
            console.log('Initial sort handles found:', $('.sort-handle').length);
        });

        function showLayananByKategori(kategori) {
            // Filter data berdasarkan kategori
            var filteredData = layananData.filter(function (item) {
                return item.nama_kategori === kategori;
            });

            // Update judul
            $('#selectedKategori').text(kategori);

            // Generate HTML untuk tabel
            var tableBody = '';
            filteredData.forEach(function (data) {
                var label_pesanan = '';
                if (data.status == "available") {
                    label_pesanan = 'info';
                } else if (data.status == "unavailable") {
                    label_pesanan = 'warning';
                }

                tableBody += `
                                            <tr data-layanan-id="${data.id}">
                                                <td>${data.id || ''}</td>
                                                <td class="sort-handle" style="display: none; cursor: move; text-align: center;">
                                                    <i class="fas fa-grip-vertical text-muted"></i>
                                                </td>
                                                <td>${data.layanan || ''}</td>
                                                <td>${data.provider || ''}</td>
                                                <td>${data.provider_id || ''}</td>
                                                                        <td>Rp. ${numberFormat(data.harga)}</td>
                                            <td>Rp. ${numberFormat(data.harga_member)}</td>
                                            <td>Rp. ${numberFormat(data.harga_platinum)}</td>
                                            <td>Rp. ${numberFormat(data.harga_gold)}</td>
                                                                <td>${numberFormat(data.profit)}% (Rp. ${numberFormat((data.harga || 0) * ((data.profit || 0) / 100))})</td>
                                                                <td>
                                                                    <div class="btn-group-vertical">
                                                                        <button id="btnGroupDrop1" type="button" class="btn btn-${label_pesanan} dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            ${data.status} <i class="mdi mdi-chevron-down"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                            <li><a class="dropdown-item" href="/layanan-status/${data.id}/available">available</a></li>
                                                                            <li><a class="dropdown-item" href="/layanan-status/${data.id}/unavailable">unavailable</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:;" onclick="modal('${data.layanan}', '/layanan/${data.id}/detail')" class="btn btn-info btn-sm mb-1">Edit</a>
                                                                    <a class="btn btn-danger btn-sm" href="/layanan/hapus/${data.id}">Hapus</a>
                                                                </td>
                                                                <td>${data.created_at}</td>
                                                            </tr>
                                                        `;
            });

            // Update tabel body
            $('#layananTableBody').html(tableBody);

            // Debug: Log after table update
            console.log('Table updated, sort handles found:', $('.sort-handle').length);
            console.log('Sort mode toggle state:', $('#sortModeToggle').is(':checked'));

            // Destroy existing DataTable if exists
            if (dataTable) {
                dataTable.destroy();
            }

            // Initialize DataTable
            dataTable = $('#tableLayanan').DataTable({
                responsive: true,
                autoWidth: false,
                pageLength: 25,
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]]
            });

            // Show tabel view, hide card view
            $('#kategoriCards').hide();
            $('#layananTable').show();
        }

        function showKategoriCards() {
            // Destroy DataTable
            if (dataTable) {
                dataTable.destroy();
                dataTable = null;
            }

            // Show card view, hide tabel view
            $('#layananTable').hide();
            $('#kategoriCards').show();
        }

        function numberFormat(num) {
            if (num === null || num === undefined || isNaN(num)) {
                return '0';
            }
            return new Intl.NumberFormat('id-ID').format(num);
        }

        // File upload handling
        document.getElementById('excelFile').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                document.getElementById('fileLabel').textContent = file.name;
                document.querySelector('.file-upload-wrapper .btn').style.borderColor = '#28a745';
                document.querySelector('.file-upload-wrapper .btn').style.color = '#28a745';
            }
        });

        // Preview button handling
        document.getElementById('previewBtn').addEventListener('click', function () {
            const file = document.getElementById('excelFile').files[0];
            if (!file) {
                alert('Silakan pilih file Excel terlebih dahulu.');
                return;
            }

            const formData = new FormData();
            formData.append('excel_file', file);
            formData.append('_token', document.querySelector('input[name="_token"]').value);

            // Show loading
            document.getElementById('previewBtn').disabled = true;
            document.getElementById('previewBtn').innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';

            console.log('Sending preview request...');
            console.log('File:', file.name);
            console.log('Token:', document.querySelector('input[name="_token"]').value);

            fetch('<?php echo e(route("layanan.preview")); ?>', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    console.log('Response status:', response.status);
                    console.log('Response headers:', response.headers);
                    return response.json();
                })
                .then(data => {
                    console.log('Response data:', data);
                    if (data.success) {
                        showPreviewModal(data);
                    } else {
                        let errorMsg = 'Error: ' + data.message;
                        if (data.debug) {
                            errorMsg += '\n\nDebug Info:\nHeaders: ' + data.debug.headers.join(', ');
                            errorMsg += '\nMissing: ' + data.debug.missing.join(', ');
                        }
                        alert(errorMsg);
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    alert('Terjadi kesalahan saat preview file. Cek console untuk detail.');
                })
                .finally(() => {
                    document.getElementById('previewBtn').disabled = false;
                    document.getElementById('previewBtn').innerHTML = '<i class="fas fa-eye me-2"></i>Preview Data';
                });
        });

        // Test AJAX button
        document.getElementById('testBtn').addEventListener('click', function () {
            console.log('Testing AJAX...');

            fetch('<?php echo e(route("layanan.test")); ?>')
                .then(response => response.json())
                .then(data => {
                    console.log('Test response:', data);
                    alert('Test berhasil: ' + data.message);
                })
                .catch(error => {
                    console.error('Test error:', error);
                    alert('Test gagal: ' + error.message);
                });
        });

        function showPreviewModal(data) {
            const tbody = document.getElementById('previewTableBody');
            tbody.innerHTML = '';

            data.data.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                                                                            <td>${item.kode}</td>
                                                                            <td>Rp ${item.harga}</td>
                                                                            <td>${item.status}</td>
                                                                            <td>${item.deskripsi}</td>
                                                                            <td>
                                                                                ${item.will_import ?
                        '<span class="badge bg-success">Ya</span>' :
                        '<span class="badge bg-warning">Tidak</span><br><small class="text-muted">${item.reason}</small>'
                    }
                                                                            </td>
                                                                        `;
                tbody.appendChild(row);
            });

            // Show summary in modal title
            const modalTitle = document.querySelector('#modal-preview .modal-title');
            modalTitle.innerHTML = `Preview Data Excel (${data.summary.will_import} akan diimport, ${data.summary.will_skip} dilewati)`;

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('modal-preview'));
            modal.show();
        }

        // Import form handling
        document.getElementById('importForm').addEventListener('submit', function (e) {
            const file = document.getElementById('excelFile').files[0];
            if (!file) {
                e.preventDefault();
                alert('Silakan pilih file Excel terlebih dahulu.');
                return;
            }

            // Show progress
            document.getElementById('importProgress').style.display = 'block';
            document.getElementById('importBtn').disabled = true;
            document.getElementById('importBtn').innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Mengimport...';

            // Simulate progress
            let progress = 0;
            const progressBar = document.querySelector('.progress-bar');
            const interval = setInterval(() => {
                progress += Math.random() * 15;
                if (progress > 90) progress = 90;
                progressBar.style.width = progress + '%';
            }, 200);
        });

        function modal(name, link) {
            try {
                var myModal = new bootstrap.Modal($('#modal-detail'))
                $.ajax({
                    type: "GET",
                    url: link,
                    beforeSend: function () {
                        $('#modal-detail-title').html(name || 'Detail Layanan');
                        $('#modal-detail-body').html('Loading...');
                    },
                    success: function (result) {
                        $('#modal-detail-title').html(name || 'Detail Layanan');
                        $('#modal-detail-body').html(result);
                    },
                    error: function (xhr, status, error) {
                        console.error('Ajax error:', error);
                        $('#modal-detail-title').html(name || 'Detail Layanan');
                        $('#modal-detail-body').html('Terjadi kesalahan saat memuat data. Silakan coba lagi.');
                    }
                });
                myModal.show();
            } catch (error) {
                console.error('Modal error:', error);
                alert('Terjadi kesalahan saat membuka modal. Silakan coba lagi.');
            }
        }

        // Fungsi untuk toggle mode pengurutan
        function toggleSortMode() {
            const isSortMode = $('#sortModeToggle').is(':checked');
            const sortHandleHeader = $('#sortHandleHeader');
            const saveSortBtn = $('#saveSortBtn');
            const tableBody = $('#layananTableBody');

            if (isSortMode) {
                // Tampilkan kolom handle dan tombol simpan
                sortHandleHeader.show();
                saveSortBtn.show();

                // Tampilkan semua kolom handle dengan multiple methods
                $('.sort-handle').show().addClass('force-show');
                $('.sort-handle').css('display', 'table-cell');

                // Tambahkan class untuk styling
                tableBody.addClass('sortable-ready');

                enableDragAndDrop();
                console.log('Mode pengurutan aktif - kolom handle ditampilkan');
                console.log('Handles after show:', $('.sort-handle:visible').length);

                // Tampilkan instruksi
                showSortingInstructions();
            } else {
                // Sembunyikan kolom handle dan tombol simpan
                sortHandleHeader.hide();
                saveSortBtn.hide();

                // Sembunyikan semua kolom handle di setiap baris
                $('.sort-handle').hide().removeClass('force-show');
                $('.sort-handle').css('display', 'none');

                // Hapus class styling
                tableBody.removeClass('sortable-ready');

                disableDragAndDrop();
                console.log('Mode pengurutan dinonaktifkan - kolom handle disembunyikan');

                // Sembunyikan instruksi
                hideSortingInstructions();
            }
        }

        // Fungsi untuk menampilkan instruksi sorting
        function showSortingInstructions() {
            // Hapus instruksi yang sudah ada
            hideSortingInstructions();

            const instructions = `
                    <div class="alert alert-info alert-dismissible fade show mt-3" id="sortingInstructions">
                        <i class="fas fa-info-circle"></i>
                        <strong>Instruksi Drag & Drop:</strong> 
                        Klik dan tahan pada icon grip (⋮⋮) di kolom handle, kemudian geser baris ke posisi yang diinginkan. 
                        Seluruh baris akan bergerak bersamaan.
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;

            $('#layananTable .card-body').append(instructions);

            // Highlight sort handle untuk menarik perhatian
            $('.sort-handle').addClass('attention-grabber');
            setTimeout(() => {
                $('.sort-handle').removeClass('attention-grabber');
            }, 3000);
        }

        // Fungsi untuk menyembunyikan instruksi sorting
        function hideSortingInstructions() {
            $('#sortingInstructions').remove();
        }

        // Fungsi untuk menampilkan notifikasi sukses
        function showSuccessNotification(message) {
            // Hapus notifikasi yang sudah ada
            $('.success-notification').remove();

            const notification = `
                        <div class="success-notification alert alert-success alert-dismissible fade show position-fixed" 
                             style="top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
                            <i class="fas fa-check-circle"></i>
                            <strong>Berhasil!</strong> ${message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    `;

            $('body').append(notification);

            // Auto hide setelah 3 detik
            setTimeout(() => {
                $('.success-notification').fadeOut();
            }, 3000);
        }

        // Fungsi untuk mengaktifkan drag & drop
        function enableDragAndDrop() {
            const tbody = $('#layananTableBody');

            // Tambahkan class untuk styling drag and drop
            tbody.addClass('sortable-enabled');

            tbody.sortable({
                handle: '.sort-handle',
                axis: 'y',
                cursor: 'move',
                opacity: 0.8,
                tolerance: 'pointer',
                distance: 5, // Minimal jarak untuk memulai drag
                helper: function (e, tr) {
                    // Buat helper yang menampilkan seluruh baris
                    var $originals = tr.children();
                    var $helper = tr.clone();
                    $helper.children().each(function (index) {
                        $(this).width($originals.eq(index).width());
                    });
                    $helper.addClass('dragging-row');

                    // Tambahkan shadow dan styling yang lebih jelas
                    $helper.css({
                        'background': '#e3f2fd',
                        'box-shadow': '0 8px 25px rgba(0,0,0,0.2)',
                        'border': '2px solid #2196f3',
                        'border-radius': '8px',
                        'transform': 'rotate(2deg)'
                    });

                    return $helper;
                },
                start: function (e, ui) {
                    // Tambahkan class saat mulai drag
                    ui.item.addClass('dragging');
                    ui.placeholder.addClass('drag-placeholder');

                    // Tambahkan feedback audio (opsional)
                    if (typeof Audio !== 'undefined') {
                        try {
                            // Buat audio feedback sederhana
                            const audioContext = new (window.AudioContext || window.webkitAudioContext)();
                            const oscillator = audioContext.createOscillator();
                            const gainNode = audioContext.createGain();

                            oscillator.connect(gainNode);
                            gainNode.connect(audioContext.destination);

                            oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
                            gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);

                            oscillator.start(audioContext.currentTime);
                            oscillator.stop(audioContext.currentTime + 0.1);
                        } catch (e) {
                            // Ignore audio errors
                        }
                    }
                },
                stop: function (e, ui) {
                    // Hapus class saat selesai drag
                    ui.item.removeClass('dragging');

                    // Tambahkan efek highlight pada baris yang baru dipindahkan
                    ui.item.addClass('highlight-move');
                    setTimeout(() => {
                        ui.item.removeClass('highlight-move');
                    }, 1000);
                },
                update: function (event, ui) {
                    updateRowNumbers();
                    $('#saveSortBtn').removeClass('btn-success').addClass('btn-warning').html('<i class="fas fa-exclamation-triangle"></i> Ada Perubahan - Simpan!');

                    // Tambahkan feedback visual
                    ui.item.addClass('updated-row');
                    setTimeout(() => {
                        ui.item.removeClass('updated-row');
                    }, 1500);
                }
            });

            // Tambahkan event listener untuk hover effect pada baris
            tbody.on('mouseenter', 'tr', function () {
                if ($('#sortModeToggle').is(':checked')) {
                    $(this).addClass('sortable-hover');
                }
            }).on('mouseleave', 'tr', function () {
                $(this).removeClass('sortable-hover');
            });
        }

        // Fungsi untuk menonaktifkan drag & drop
        function disableDragAndDrop() {
            const tbody = $('#layananTableBody');

            // Destroy sortable
            tbody.sortable('destroy');

            // Hapus class styling
            tbody.removeClass('sortable-enabled sortable-ready');

            // Hapus semua class drag and drop
            tbody.find('tr').removeClass('sortable-hover dragging dragging-row highlight-move updated-row saved-success');
            tbody.find('.drag-placeholder').removeClass('drag-placeholder');
            tbody.find('.sort-handle').removeClass('attention-grabber');

            // Hapus event listener
            tbody.off('mouseenter mouseleave', 'tr');
        }

        // Fungsi untuk update nomor urut
        function updateRowNumbers() {
            $('#layananTableBody tr').each(function (index) {
                $(this).find('td:first').text(index + 1);
            });
        }

        // Fungsi untuk menyimpan urutan
        function saveSortOrder() {
            const rows = $('#layananTableBody tr');
            const layananIds = [];

            rows.each(function () {
                const layananId = $(this).data('layanan-id');
                if (layananId) {
                    layananIds.push(layananId);
                }
            });

            if (layananIds.length === 0) {
                alert('Tidak ada data untuk disimpan');
                return;
            }

            // Show loading state
            const saveBtn = $('#saveSortBtn');
            const originalText = saveBtn.html();
            saveBtn.html('<i class="fas fa-spinner fa-spin"></i> Menyimpan...').prop('disabled', true);

            $.ajax({
                url: '<?php echo e(route("layanan.sort")); ?>',
                type: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    layanan_ids: layananIds
                },
                success: function (response) {
                    if (response.success) {
                        saveBtn.removeClass('btn-warning').addClass('btn-success').html('<i class="fas fa-check"></i> Tersimpan!');

                        // Tambahkan efek visual untuk semua baris
                        $('#layananTableBody tr').addClass('saved-success');
                        setTimeout(() => {
                            $('#layananTableBody tr').removeClass('saved-success');
                        }, 2000);

                        setTimeout(() => {
                            saveBtn.html('<i class="fas fa-save"></i> Simpan Urutan');
                        }, 2000);

                        // Update data di variabel layananData
                        updateLayananDataOrder(layananIds);

                        // Tampilkan notifikasi sukses
                        showSuccessNotification('Urutan berhasil disimpan!');
                    } else {
                        alert('Gagal menyimpan urutan: ' + response.message);
                        saveBtn.html(originalText).prop('disabled', false);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error saving sort order:', error);
                    alert('Terjadi kesalahan saat menyimpan urutan');
                    saveBtn.html(originalText).prop('disabled', false);
                }
            });
        }

        // Fungsi untuk update urutan data di variabel layananData
        function updateLayananDataOrder(layananIds) {
            const currentKategori = $('#selectedKategori').text();
            const reorderedData = [];

            layananIds.forEach(layananId => {
                const layanan = layananData.find(item => item.id == layananId && item.nama_kategori === currentKategori);
                if (layanan) {
                    reorderedData.push(layanan);
                }
            });

            // Update layananData dengan urutan baru
            layananData = layananData.map(item => {
                if (item.nama_kategori === currentKategori) {
                    const reorderedItem = reorderedData.find(reordered => reordered.id == item.id);
                    return reorderedItem || item;
                }
                return item;
            });
        }

        // Debug functions
        function debugSortHandles() {
            const handles = $('.sort-handle');
            const visibleHandles = handles.filter(':visible');
            const hiddenHandles = handles.filter(':hidden');

            console.log('=== DEBUG SORT HANDLES ===');
            console.log('Total sort handles:', handles.length);
            console.log('Visible handles:', visibleHandles.length);
            console.log('Hidden handles:', hiddenHandles.length);
            console.log('Toggle state:', $('#sortModeToggle').is(':checked'));
            console.log('Header visibility:', $('#sortHandleHeader').is(':visible'));
            console.log('Save button visibility:', $('#saveSortBtn').is(':visible'));

            // Show info in page
            alert(`Debug Info:\nTotal handles: ${handles.length}\nVisible: ${visibleHandles.length}\nHidden: ${hiddenHandles.length}\nToggle: ${$('#sortModeToggle').is(':checked')}`);
        }

        function forceShowHandles() {
            // Multiple methods to force show handles
            $('.sort-handle').show().addClass('force-show');
            $('.sort-handle').css('display', 'table-cell');
            $('#sortHandleHeader').show();

            console.log('Force show all handles');
            console.log('Handles after force show:', $('.sort-handle:visible').length);

            alert(`All handles forced to show!\nVisible handles: ${$('.sort-handle:visible').length}`);
        }

        function resetToggleState() {
            // Reset toggle to unchecked
            $('#sortModeToggle').prop('checked', false);

            // Hide all handles
            $('.sort-handle').hide().removeClass('force-show');
            $('.sortHandleHeader').hide();
            $('#saveSortBtn').hide();

            console.log('Toggle state reset to false');
            alert('Toggle state reset to false. All handles hidden.');
        }
    </script>

    <!-- Modal Detail Layanan -->
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

    <!-- Modal Preview Excel -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-preview" style="border-radius:7%">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Preview Data Excel</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="previewTable">
                            <thead>
                                <tr>
                                    <th>Kode Prod Produk</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Deskripsi</th>
                                    <th>Akan Diimport</th>
                                </tr>
                            </thead>
                            <tbody id="previewTableBody">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmImport">Konfirmasi Import</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('main-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/components/admin/layanan.blade.php ENDPATH**/ ?>