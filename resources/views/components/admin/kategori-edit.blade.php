@extends('main-admin')

@section('head')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('assets/css/kategori-sortable.css') }}">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Kategori</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('kategori') }}">Kategori</a></li>
                        <li class="breadcrumb-item active">/edit</li>
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

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h4 class="mb-3 header-title mt-0">Edit Kategori: {{ $data->nama }}</h4>
            <form action="{{ route('kategori.update.kategori', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="nama">Nama</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama', $data->nama) }}" name="nama" id="nama">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="sub_nama">Sub Nama</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control @error('sub_nama') is-invalid @enderror"
                            value="{{ old('sub_nama', $data->sub_nama) }}" name="sub_nama" id="sub_nama">
                        @error('sub_nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="kode">Url</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control @error('kode') is-invalid @enderror"
                            value="{{ old('kode', $data->kode) }}" name="kode" id="kode">
                        @error('kode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="brand">Brand</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control @error('brand') is-invalid @enderror"
                            value="{{ old('brand', $data->brand) }}" name="brand" id="brand">
                        @error('brand')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="deskripsi_game">Deskripsi Game</label>
                    <div class="col-lg-10">
                        <div id="editorDeskripsiGame" style="height: 200px;">{!! old('deskripsi_game', $data->deskripsi_game) !!}</div>
                        <input type="hidden" name="deskripsi_game" id="inputDeskripsiGame" value="{{ old('deskripsi_game', $data->deskripsi_game) }}">
                        @error('deskripsi_game')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="deskripsi_field">Deskripsi Field User ID & Zone ID</label>
                    <div class="col-lg-10">
                        <div id="editorDeskripsiField" style="height: 200px;">{!! old('deskripsi_field', $data->deskripsi_field) !!}</div>
                        <input type="hidden" name="deskripsi_field" id="inputDeskripsiField" value="{{ old('deskripsi_field', $data->deskripsi_field) }}">
                        @error('deskripsi_field')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Sistem Target</label>
                    <div class="col-lg-10">
                        <div class="form-check">
                            <input type="radio" id="radioTidak" name="serverOption" class="form-check-input"
                                value="tidak" {{ old('serverOption', $data->server_id == 0 ? 'tidak' : 'ya') == 'tidak' ? 'checked' : '' }}>
                            <label class="form-check-label" for="radioTidak">Tidak</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" id="radioYa" name="serverOption" class="form-check-input"
                                value="ya" {{ old('serverOption', $data->server_id == 1 ? 'ya' : 'tidak') == 'ya' ? 'checked' : '' }}>
                            <label class="form-check-label" for="radioYa">Ya</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" id="radioCustom" name="serverOption" class="form-check-input"
                                value="custom" {{ old('serverOption') == 'custom' ? 'checked' : '' }}>
                            <label class="form-check-label" for="radioCustom">Custom</label>
                        </div>

                        @error('serverOption')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="thumbnail">Thumbnail</label>
                    <div class="col-lg-10">
                        @if($data->thumbnail)
                            <div class="mb-2">
                                <img src="{{ $data->thumbnail }}" alt="Current Thumbnail" style="max-width: 200px; max-height: 200px;" class="img-thumbnail">
                                <p class="text-muted small">Thumbnail saat ini</p>
                            </div>
                        @endif
                        <input type="file" class="form-control" name="thumbnail" id="thumbnail" accept="image/*">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah thumbnail</small>
                        @error('thumbnail')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="banner">Banner</label>
                    <div class="col-lg-10">
                        @if($data->banner)
                            <div class="mb-2">
                                <img src="{{ $data->banner }}" alt="Current Banner" style="max-width: 200px; max-height: 200px;" class="img-thumbnail">
                                <p class="text-muted small">Banner saat ini</p>
                            </div>
                        @endif
                        <input type="file" class="form-control" name="banner" id="banner" accept="image/*">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah banner</small>
                        @error('banner')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="is_popular">Populer</label>
                    <div class="col-lg-10">
                        <select class="form-select" name="is_popular" id="is_popular">
                            <option value='0' {{ old('is_popular', $data->is_popular) == 0 ? 'selected' : '' }}>Tidak</option>
                            <option value='1' {{ old('is_popular', $data->is_popular) == 1 ? 'selected' : '' }}>Ya</option>
                        </select>
                        @error('is_popular')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="tipe">Tipe</label>
                    <div class="col-lg-10">
                        <select class="form-select" name="tipe" id="tipe">
                            <option value='Top-up Games' {{ old('tipe', $data->tipe) == 'Top-up Games' ? 'selected' : '' }}>Top-up Games</option>
                            <option value='voucher' {{ old('tipe', $data->tipe) == 'voucher' ? 'selected' : '' }}>Voucher</option>
                            <option value='pulsa' {{ old('tipe', $data->tipe) == 'pulsa' ? 'selected' : '' }}>Pulsa</option>
                            <option value='pulsa-ppob' {{ old('tipe', $data->tipe) == 'pulsa-ppob' ? 'selected' : '' }}>Pulsa & PPOB</option>
                            <option value='streamingapp' {{ old('tipe', $data->tipe) == 'streamingapp' ? 'selected' : '' }}>Streaming APP</option>
                            <option value='joki' {{ old('tipe', $data->tipe) == 'joki' ? 'selected' : '' }}>Joki</option>
                        </select>
                        @error('tipe')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-lg-10 offset-lg-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Kategori
                        </button>
                        <a href="{{ route('kategori') }}" class="btn btn-secondary">
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
@endsection
