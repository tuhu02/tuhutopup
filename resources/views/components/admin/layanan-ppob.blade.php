@extends('main-admin')

@section('content')
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

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Import Excel Section -->
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3 header-title mt-0">Import Layanan PPOB dari Excel</h4>
            <div class="import-section">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{ route('layanan-ppob.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Pilih Kategori</label>
                                <select class="form-select" name="kategori_id" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                    @endforeach
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
            <form action="{{ route('layanan-ppob.post') }}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Nama Layanan</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama') }}" name="nama" placeholder="Contoh: Token Rp 20.000">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Kategori</label>
                    <div class="col-lg-10">
                        <select class="form-select" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Brand</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control @error('brand') is-invalid @enderror"
                            value="{{ old('brand') }}" name="brand" placeholder="Contoh: PLN, PDAM, dll">
                        @error('brand')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
                        <input type="text" class="form-control @error('provider_id') is-invalid @enderror"
                            value="{{ old('provider_id') }}" name="provider_id" placeholder="Kode produk dari provider">
                        @error('provider_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Tipe Layanan</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control @error('tipe_layanan') is-invalid @enderror"
                            value="{{ old('tipe_layanan') }}" name="tipe_layanan"
                            placeholder="Contoh: Token Listrik, Top Up E-Money">
                        @error('tipe_layanan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
                        <input type="number" class="form-control @error('harga') is-invalid @enderror"
                            value="{{ old('harga') }}" name="harga" placeholder="Harga untuk customer">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Harga Reseller</label>
                    <div class="col-lg-10">
                        <input type="number" class="form-control @error('harga_reseller') is-invalid @enderror"
                            value="{{ old('harga_reseller') }}" name="harga_reseller" placeholder="Harga untuk reseller">
                        @error('harga_reseller')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
                        @forelse($datas as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->layanan }}</td>
                                <td>{{ $data->brand }}</td>
                                <td>{{ $data->nama_kategori }}</td>
                                <td>{{ $data->provider ?? '-' }}</td>
                                <td>{{ $data->provider_id }}</td>
                                <td>{{ $data->tipe_layanan }}</td>
                                <td>{{ $data->tipe }}</td>
                                <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($data->harga_reseller, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge bg-{{ $data->status == 'available' ? 'success' : 'warning' }}">
                                        {{ ucfirst($data->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-info"
                                            onclick="detailLayanan({{ $data->id }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="{{ route('layanan-ppob.delete', $data->id) }}" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus layanan ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="{{ route('layanan-ppob.update', ['id' => $data->id, 'status' => $data->status == 'available' ? 'unavailable' : 'available']) }}"
                                            class="btn btn-sm btn-{{ $data->status == 'available' ? 'warning' : 'success' }}">
                                            <i class="fas fa-{{ $data->status == 'available' ? 'pause' : 'play' }}"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center">Belum ada data layanan PPOB</td>
                            </tr>
                        @endforelse
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

@endsection

@section('scripts')
    <script>
        function detailLayanan(id) {
            $.get("{{ url('/layanan-ppob') }}/" + id + "/detail", function (data) {
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
@endsection