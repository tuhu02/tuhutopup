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
                <h4 class="page-title">Setelan kategori</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">/kategori</li>
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
            <h4 class="mb-3 header-title mt-0">Tambah Kategori</h4>
            <form action="<?php echo e(route('kategori.post')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Nama</label>
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
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Sub Nama</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control <?php $__errorArgs = ['sub_nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('sub_nama')); ?>" name="sub_nama">
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
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Url</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control <?php $__errorArgs = ['kode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('kode')); ?>" name="kode">
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
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Brand</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control <?php $__errorArgs = ['brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            value="<?php echo e(old('brand')); ?>" name="brand">
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
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Deskripsi Game</label>
                    <div class="col-lg-10">
                        <div id="editorDeskripsiGame"><?php echo old('deskripsi_game'); ?></div>
                        <textarea class="form-control <?php $__errorArgs = ['deskripsi_game'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            name="deskripsi_game" id="inputDeskripsiGame"><?php echo e(old('deskripsi_game')); ?></textarea>
                        <?php $__errorArgs = ['deskripsi_game'];
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
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Deskripsi Field User ID & Zone ID</label>
                    <div class="col-lg-10">
                        <textarea class="form-control <?php $__errorArgs = ['deskripsi_field'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            name="deskripsi_field"><?php echo e(old('deskripsi_field')); ?></textarea>
                        <?php $__errorArgs = ['deskripsi_field'];
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
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Membutuhkan Server ID?</label>
                    <div class="col-lg-10 mt-1 d-flex align-items-center">
                        <div class="form-check me-3">
                            <input type="radio" id="radioYa" name="serverOption" class="form-check-input" value="ya">
                            <label class="form-check-label" for="radioYa">Ya</label>
                        </div>

                        <div class="form-check me-3">
                            <input type="radio" id="radioTidak" name="serverOption" class="form-check-input" value="tidak">
                            <label class="form-check-label" for="radioTidak">Tidak</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" id="radioCustom" name="serverOption" class="form-check-input"
                                value="custom">
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
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Thumbnail</label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control" name="thumbnail">
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
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Banner</label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control" name="banner">
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
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Populer</label>
                    <div class="col-lg-10">
                        <select class="form-select" name="is_popular">
                            <option value='0'>Tidak</option>
                            <option value='1'>Ya</option>
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
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Tipe</label>
                    <div class="col-lg-10">
                        <select class="form-select" name="tipe">
                            <option value='Top-up Games'>Top-up Games</option>
                            <option value='voucher'>Voucher</option>
                            <option value='pulsa'>Pulsa</option>
                            <option value='pulsa-ppob'>Pulsa & PPOB</option>
                            <option value='streamingapp'>Streaming APP</option>
                            <option value='joki'>Joki</option>
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Toggle untuk mode pengurutan -->
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="sortModeToggle" onchange="toggleSortMode()">
                    <label class="form-check-label" for="sortModeToggle">
                        <i class="fas fa-sort"></i> Mode Pengurutan (Drag & Drop)
                    </label>
                </div>
                <button class="btn btn-success" onclick="saveSortOrder()" id="saveSortBtn" style="display: none;">
                    <i class="fas fa-save"></i> Simpan Urutan
                </button>
            </div>

            <!-- Instruksi -->
            <div id="sortingInstructions" class="alert alert-info alert-dismissible fade show mt-3" style="display: none;">
                <i class="fas fa-info-circle"></i>
                <strong>Instruksi Drag & Drop:</strong>
                Klik dan tahan pada icon grip (⋮⋮) di kolom handle, kemudian geser baris ke posisi yang diinginkan.
                Seluruh baris akan bergerak bersamaan.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-1">Semua Kategori</h4>
                    <div class="table-responsive">
                        <table id="tableKategori" class="table m-0">
                            <thead>
                                <tr>
                                    <th width="50">#</th>
                                    <th width="50" id="sortHandleHeader" style="display: none;">
                                        <i class="fas fa-grip-vertical"></i>
                                    </th>
                                    <th>Nama</th>
                                    <th>Sub Nama</th>
                                    <th>Url</th>
                                    <th>Brand</th>
                                    <th>Deskripsi Game</th>
                                    <th>Deskripsi Field User ID & Zone ID</th>
                                    <th>Status</th>
                                    <th>Thumbnail</th>
                                    <th>Banner</th>
                                    <th>Populer</th>
                                    <th>Aksi</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $label_pesanan = '';
                                        if ($datas->status == "active") {
                                            $label_pesanan = 'info';
                                        } else if ($datas->status == "unactive") {
                                            $label_pesanan = 'warning';
                                        }
                                    ?>
                                    <tr data-kategori-id="<?php echo e($datas->id); ?>">
                                        <th scope="row"><?php echo e($datas->id); ?></th>
                                        <td class="sort-handle" style="display: none; cursor: move; text-align: center;">
                                            <i class="fas fa-grip-vertical text-muted"></i>
                                        </td>
                                        <td><?php echo e($datas->nama); ?></td>
                                        <td><?php echo e($datas->sub_nama); ?></td>
                                        <td><?php echo e($datas->kode); ?></td>
                                        <td><?php echo e($datas->brand); ?></td>
                                        <td><?php echo e(Str::words($datas->deskripsi_game, 7, '...')); ?></td>
                                        <td><?php echo e(Str::words($datas->deskripsi_field, 7, '...')); ?></td>
                                        <td>
                                            <div class="btn-group-vertical">
                                                <button id="btnGroupDrop1" type="button"
                                                    class="btn btn-<?php echo e($label_pesanan); ?> dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-expanded="false"> <?php echo e($datas->status); ?> <i
                                                        class="mdi mdi-chevron-down"></i> </button>
                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <li><a class="dropdown-item"
                                                            href="/kategori-status/<?php echo e($datas->id); ?>/unactive">unactive</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="/kategori-status/<?php echo e($datas->id); ?>/active">active</a></li>
                                            </div>
                                        </td>
                                        <td><?php echo e($datas->thumbnail); ?></td>
                                        <td><?php echo e($datas->banner); ?></td>
                                        <td><?php echo e($datas->is_popular); ?></td>
                                        <td>
                                            <a href="javascript:;"
                                                onclick="modal('<?php echo e($datas->nama); ?>', '<?php echo e(route('kategori.detail', [$datas->id])); ?>')"
                                                class="btn-sm btn-info mb-3">Edit</a>
                                            <br>
                                            <br>
                                            <a class="btn-sm btn-danger mt-2" href="/kategori/hapus/<?php echo e($datas->id); ?>">Hapus</a>
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
        $(document).ready(function () {
            if ($.fn.DataTable.isDataTable('#tableKategori')) {
                $('#tableKategori').DataTable().destroy();
            }

            $('#tableKategori').DataTable({
                responsive: true,
                autoWidth: false,
                pageLength: 10
            });
        });

        var quillGame = new Quill('#editorDeskripsiGame', {
            theme: 'snow',
            placeholder: 'Tulis deskripsi game...'
        });

        // Saat submit form, ambil isi Quill lalu masukkan ke input hidden
        document.querySelector('form').onsubmit = function() {
            document.querySelector('#inputDeskripsiGame').value = quillGame.root.innerHTML;
            document.querySelector('#inputDeskripsiField').value = quillField.root.innerHTML;
        };

        // Fungsi untuk toggle mode pengurutan
        function toggleSortMode() {
            const isSortMode = $('#sortModeToggle').is(':checked');
            const sortHandleHeader = $('#sortHandleHeader');
            const saveSortBtn = $('#saveSortBtn');
            const sortingInstructions = $('#sortingInstructions');

            if (isSortMode) {
                // Tampilkan kolom handle dan tombol simpan
                sortHandleHeader.show();
                saveSortBtn.show();
                sortingInstructions.show();

                // Tampilkan semua kolom handle
                $('.sort-handle').show().addClass('force-show');
                $('.sort-handle').css('display', 'table-cell');

                // Tambahkan class untuk styling
                $('#tableKategori tbody').addClass('sortable-ready');

                enableDragAndDrop();
                console.log('Mode pengurutan kategori aktif');
            } else {
                // Sembunyikan kolom handle dan tombol simpan
                sortHandleHeader.hide();
                saveSortBtn.hide();
                sortingInstructions.hide();

                // Sembunyikan semua kolom handle
                $('.sort-handle').hide().removeClass('force-show');
                $('.sort-handle').css('display', 'none');

                // Hapus class styling
                $('#tableKategori tbody').removeClass('sortable-ready');

                disableDragAndDrop();
                console.log('Mode pengurutan kategori dinonaktifkan');
            }
        }

        // Fungsi untuk mengaktifkan drag & drop
        function enableDragAndDrop() {
            const tbody = $('#tableKategori tbody');

            // Tambahkan class untuk styling drag and drop
            tbody.addClass('sortable-enabled');

            tbody.sortable({
                handle: '.sort-handle',
                axis: 'y',
                cursor: 'move',
                opacity: 0.8,
                tolerance: 'pointer',
                distance: 5,
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
            const tbody = $('#tableKategori tbody');

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
            $('#tableKategori tbody tr').each(function (index) {
                $(this).find('th:first').text(index + 1);
            });
        }

        // Fungsi untuk menyimpan urutan
        function saveSortOrder() {
            const rows = $('#tableKategori tbody tr');
            const kategoriIds = [];

            rows.each(function () {
                const kategoriId = $(this).data('kategori-id');
                if (kategoriId) {
                    kategoriIds.push(kategoriId);
                }
            });

            if (kategoriIds.length === 0) {
                alert('Tidak ada data untuk disimpan');
                return;
            }

            // Show loading state
            const saveBtn = $('#saveSortBtn');
            const originalText = saveBtn.html();
            saveBtn.html('<i class="fas fa-spinner fa-spin"></i> Menyimpan...').prop('disabled', true);

            $.ajax({
                url: '<?php echo e(route("kategori.sort")); ?>',
                type: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    kategori_ids: kategoriIds
                },
                success: function (response) {
                    if (response.success) {
                        saveBtn.removeClass('btn-warning').addClass('btn-success').html('<i class="fas fa-check"></i> Tersimpan!');

                        // Tambahkan efek visual untuk semua baris
                        $('#tableKategori tbody tr').addClass('saved-success');
                        setTimeout(() => {
                            $('#tableKategori tbody tr').removeClass('saved-success');
                        }, 2000);

                        setTimeout(() => {
                            saveBtn.html('<i class="fas fa-save"></i> Simpan Urutan');
                        }, 2000);

                        // Tampilkan notifikasi sukses
                        showSuccessNotification('Urutan kategori berhasil disimpan!');
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

        function modal(name, link) {
            var myModal = new bootstrap.Modal($('#modal-detail'))
            $.ajax({
                type: "GET",
                url: link,
                beforeSend: function () {
                    $('#modal-detail-title').html(name);
                    $('#modal-detail-body').html('Loading...');
                },
                success: function (result) {
                    $('#modal-detail-title').html(name);
                    $('#modal-detail-body').html(result);
                },
                error: function () {
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
<?php echo $__env->make('main-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/components/admin/kategori.blade.php ENDPATH**/ ?>