@extends('main-admin')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">konfigurasi</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">/Banner</li>
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
<div class="card">
    <div class="card-body">
        <h4 class="mb-3 header-title mt-0">Tambah Gambar</h4>
        <form action="{{ route('berita.post') }}" method="POST" enctype="multipart/form-data" id="berita">
            @csrf
            <div class="form-group">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label" for="example-fileinput">Foto Banner</label>
                    <div class="col-lg-10">
                        <input type="file" class="form-control" name="banner">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Judul</label>
                    <div class="col-lg-10">
                        <!-- Quill editor untuk judul -->
                        <div id="judul-editor" style="height: 50px;"></div>
                        <!-- Hidden textarea untuk submit ke server -->
                        <textarea name="judul" id="judul" hidden></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Deskripsi</label>
                    <div class="col-lg-10">
                        <!-- Quill editor untuk deskripsi -->
                        <div id="deskripsi-editor" style="height: 200px;"></div>
                        <!-- Hidden textarea untuk submit ke server -->
                        <textarea name="deskripsi" id="deskripsi" hidden></textarea>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label class="col-lg-2 col-form-label">Tipe</label>
                    <div class="col-lg-10">
                        <select class="form-control"name="tipe">
                            <option value="banner">Banner</option>
                        </select>
                    </div>
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
                <h4 class="header-title mt-0 mb-1">Semua Gambar</h4>
                <div class="table-responsive-xxl">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Path</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>                        
                                <th>Tipe</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $berita as $data)
                            <tr>
                                <th scope="row">{{ $data->id }}</th>
                                <td>{{ $data->path }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->deskripsi }}</td>
                                <td>{{ $data->tipe }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td><a class="btn btn-danger" href="/berita/hapus/{{ $data->id }}">Hapus</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {
    // Editor untuk Judul
    var quillJudul = new Quill('#judul-editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'], // simple aja biar judul gak terlalu rame
            ]
        }
    });

    // Editor untuk Deskripsi
    var quillDeskripsi = new Quill('#deskripsi-editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'font': [] }, { 'size': [] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                ['blockquote', 'code-block'],
                ['link', 'image', 'video'],
                ['clean']
            ]
        }
    });

    // Saat submit form, isi textarea dengan konten Quill
    $("#berita").on("submit", function () {
        $("#judul").val(quillJudul.root.innerText.trim());   // judul lebih aman pakai innerText
        $("#deskripsi").val(quillDeskripsi.root.innerHTML); // deskripsi pakai HTML
    });
});


</script>
@endsection