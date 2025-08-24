@extends('template.template')

@section('custom_style')
<style>
    .accordion-button {
        box-shadow: none !important;
    }

    .btn.disabled,
    .btn:disabled,
    fieldset:disabled {
        background: #8ba4b1;
        border-color: #8ba4b1;
    }

    .product .box {
        margin-bottom: 40px;
    }

    .box-profile {
        margin-top: -190px;
    }

    .box-profile .body {
        border-radius: 24px;
        height: 410px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05);
    }

    .box-profile .body .img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        text-align: center;
        line-height: 100px;
        border: 2px solid #fff;
        margin: -50px auto;
        font-size: 22px;
    }
</style>
@endsection

@section('content')

<x-navbar/>

<div class="content-body">
    <div class="col-lg-6 mx-auto px-3 pt-3 mb-3">
        <div>
            <h5 class="text-center mb-4">Edit Profile</h5>
            @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success mt-2">
                <ul>
                    <li>{{ session('success') }}</li>
                </ul>
            </div>
            @endif

            <form action="{{ url('/user/edit/profile') }}" method="POST" class="my-form px-3 mt-3">
                @csrf
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" autocomplete="off" value="{{ Auth()->user()->name }}" name="name" required>
                </div>
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" class="form-control" autocomplete="off" value="{{ Auth()->user()->username }}" name="username" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" autocomplete="off" placeholder="(Isi jika ingin ganti password)">
                </div>
                <div class="mb-3">
                    <label>No Whatsapp</label>
                    <input type="number" class="form-control" name="no_wa" autocomplete="off" value="{{ Auth()->user()->no_wa }}">
                </div>
                <button class="btn btn-primary w-100 mb-3" type="submit" name="tombol" value="submit">Update</button>
            </form>
        </div>
    </div>
</div>

@push('custom_script')
{{-- Custom scripts can be added here --}}
@endpush

@endsection