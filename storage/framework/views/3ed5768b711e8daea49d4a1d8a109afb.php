

<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/kategori-sortable.css')); ?>">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Kategori</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('kategori')); ?>">Kategori</a></li>
                        <li class="breadcrumb-item active">/edit</li>
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

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <h4 class="mb-3 header-title mt-0">Edit Kategori: <?php echo e($data->nama); ?></h4>
            <form action="<?php echo e(route('kategori.update.kategori', $data->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="nama">Nama</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('nama', $data->nama)); ?>" name="nama" id="nama">
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
                    <label class="col-lg-2 col-form-label" for="sub_nama">Sub Nama</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control <?php $__errorArgs = ['sub_nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('sub_nama', $data->sub_nama)); ?>" name="sub_nama" id="sub_nama">
                        <?php $__errorArgs = ['sub_nama'];
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
                    <label class="col-lg-2 col-form-label" for="kode">Url</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control <?php $__errorArgs = ['kode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('kode', $data->kode)); ?>" name="kode" id="kode">
                        <?php $__errorArgs = ['kode'];
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
                    <label class="col-lg-2 col-form-label" for="brand">Brand</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('brand', $data->brand)); ?>" name="brand" id="brand">
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
                    <label class="col-lg-2 col-form-label" for="deskripsi_game">Deskripsi Game</label>
                    <div class="col-lg-10">
                        <div id="editorDeskripsiGame" style="height: 200px;"><?php echo old('deskripsi_game', $data->deskripsi_game); ?></div>
                        <input type="hidden" name="deskripsi_game" id="inputDeskripsiGame" value="<?php echo e(old('deskripsi_game', $data->deskripsi_game)); ?>">
                        <?php $__errorArgs = ['deskripsi_game'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="deskripsi_field">Deskripsi Field User ID & Zone ID</label>
                    <div class="col-lg-10">
                        <div id="editorDeskripsiField" style="height: 200px;"><?php echo old('deskripsi_field', $data->deskripsi_field); ?></div>
                        <input type="hidden" name="deskripsi_field" id="inputDeskripsiField" value="<?php echo e(old('deskripsi_field', $data->deskripsi_field)); ?>">
                        <?php $__errorArgs = ['deskripsi_field'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Sistem Target</label>
                    <div class="col-lg-10">
                        <div class="form-check">
                            <input type="radio" id="radioTidak" name="serverOption" class="form-check-input"
                                value="tidak" <?php echo e(old('serverOption', $data->server_id == 0 ? 'tidak' : 'ya') == 'tidak' ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="radioTidak">Tidak</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" id="radioYa" name="serverOption" class="form-check-input"
                                value="ya" <?php echo e(old('serverOption', $data->server_id == 1 ? 'ya' : 'tidak') == 'ya' ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="radioYa">Ya</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" id="radioCustom" name="serverOption" class="form-check-input"
                                value="custom" <?php echo e(old('serverOption') == 'custom' ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="radioCustom">Custom</label>
                        </div>

                        <?php $__errorArgs = ['serverOption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback d-block">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="thumbnail">Thumbnail</label>
                    <div class="col-lg-10">
                        <?php if($data->thumbnail): ?>
                            <div class="mb-2">
                                <img src="<?php echo e($data->thumbnail); ?>" alt="Current Thumbnail" style="max-width: 200px; max-height: 200px;" class="img-thumbnail">
                                <p class="text-muted small">Thumbnail saat ini</p>
                            </div>
                        <?php endif; ?>
                        <input type="file" class="form-control" name="thumbnail" id="thumbnail" accept="image/*">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah thumbnail</small>
                        <?php $__errorArgs = ['thumbnail'];
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
                    <label class="col-lg-2 col-form-label" for="banner">Banner</label>
                    <div class="col-lg-10">
                        <?php if($data->banner): ?>
                            <div class="mb-2">
                                <img src="<?php echo e($data->banner); ?>" alt="Current Banner" style="max-width: 200px; max-height: 200px;" class="img-thumbnail">
                                <p class="text-muted small">Banner saat ini</p>
                            </div>
                        <?php endif; ?>
                        <input type="file" class="form-control" name="banner" id="banner" accept="image/*">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah banner</small>
                        <?php $__errorArgs = ['banner'];
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
                    <label class="col-lg-2 col-form-label" for="is_popular">Populer</label>
                    <div class="col-lg-10">
                        <select class="form-select" name="is_popular" id="is_popular">
                            <option value='0' <?php echo e(old('is_popular', $data->is_popular) == 0 ? 'selected' : ''); ?>>Tidak</option>
                            <option value='1' <?php echo e(old('is_popular', $data->is_popular) == 1 ? 'selected' : ''); ?>>Ya</option>
                        </select>
                        <?php $__errorArgs = ['is_popular'];
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
                    <label class="col-lg-2 col-form-label" for="tipe">Tipe</label>
                    <div class="col-lg-10">
                        <select class="form-select" name="tipe" id="tipe">
                            <option value='Top-up Games' <?php echo e(old('tipe', $data->tipe) == 'Top-up Games' ? 'selected' : ''); ?>>Top-up Games</option>
                            <option value='voucher' <?php echo e(old('tipe', $data->tipe) == 'voucher' ? 'selected' : ''); ?>>Voucher</option>
                            <option value='pulsa' <?php echo e(old('tipe', $data->tipe) == 'pulsa' ? 'selected' : ''); ?>>Pulsa</option>
                            <option value='pulsa-ppob' <?php echo e(old('tipe', $data->tipe) == 'pulsa-ppob' ? 'selected' : ''); ?>>Pulsa & PPOB</option>
                            <option value='streamingapp' <?php echo e(old('tipe', $data->tipe) == 'streamingapp' ? 'selected' : ''); ?>>Streaming APP</option>
                            <option value='joki' <?php echo e(old('tipe', $data->tipe) == 'joki' ? 'selected' : ''); ?>>Joki</option>
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
                    <div class="col-lg-10 offset-lg-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Kategori
                        </button>
                        <a href="<?php echo e(route('kategori')); ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var quillGame = new Quill('#editorDeskripsiGame', {
                theme: 'snow',
                placeholder: 'Tulis deskripsi game...'
            });

            var quillField = new Quill('#editorDeskripsiField', {
                theme: 'snow',
                placeholder: 'Tulis deskripsi field...'
            });

            // Saat submit form, ambil isi Quill lalu masukkan ke input hidden
            document.querySelector('form').onsubmit = function() {
                document.querySelector('#inputDeskripsiGame').value = quillGame.root.innerHTML;
                document.querySelector('#inputDeskripsiField').value = quillField.root.innerHTML;
            };
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/components/admin/kategori-edit.blade.php ENDPATH**/ ?>