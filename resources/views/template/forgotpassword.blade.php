@extends('template.template')

{{-- Bagian untuk custom CSS, khusus halaman ini --}}
@section('custom_style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oxanium:wght@200;300;400;500;600;700;800&display=swap');

        html,
        body {
            font-family: 'Oxanium', cursive;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow-y: hidden;
            color: #333;
        }

        .forgot-password-container {
            display: flex;
            align-items: stretch;
            min-height: 100vh;
        }

        .forgot-password-wrapper {
            max-width: 420px;
            width: 100%;
            padding: 2rem;
        }

        .btn-forgot-password:hover {
            opacity: 0.9;
        }

        .forgot-password-footer {
            font-size: .9rem;
            margin-top: 1rem;
        }

        .forgot-password-banner-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        footer,
        .content-body {
            display: none !important;
        }

        .close-button {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 40px;
            height: 40px;
            background-color: #e9ecef;
            color: #495057;
            border-radius: 50%;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            z-index: 10;
            transition: all 0.2s ease-in-out;
        }

        .close-button:hover {
            background-color: #ced4da;
            transform: rotate(90deg);
        }
    </style>
@endsection

{{-- Bagian untuk konten utama halaman --}}
@section('content')

    <a href="{{ url('/') }}" class="close-button">&times;</a>

    <div class="container-fluid g-0 forgot-password-container">
        <div class="row g-0 w-100">

            {{-- Kolom Kiri untuk Form Lupa Password --}}
            <div class="col-lg-5 d-flex align-items-center justify-content-center" style="background-color: #ffffffff;">
                <div class="forgot-password-wrapper">
                    <h3 class="mb-2 text-black">Lupa Password</h3>
                    <p class="mb-4 text-muted">Masukkan nomor WhatsApp Anda dan kami akan mengirimkan kode verifikasi (OTP)
                        untuk mereset kata sandi Anda.</p>

                    {{-- Menampilkan notifikasi error atau sukses --}}
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('/forgot-password') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-black">Nomor WhatsApp</label>
                            <input type="text" name="phone" class="form-control" placeholder="081234567890" required
                                value="{{ old('phone') }}">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 btn-forgot-password">Kirim Kode OTP</button>
                    </form>

                    <div class="forgot-password-footer text-center text-muted">
                        Sudah ingat password?
                        <a href="{{ url('/login') }}" class="text-decoration-none text-warning">Masuk Disini</a>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan untuk Banner/Gambar --}}
            <div class="col-lg-7 d-none d-lg-block p-0">
                <img src="https://i.ytimg.com/vi/QWIf6-xP-og/maxresdefault.jpg" alt="Lupa Password Banner"
                    class="forgot-password-banner-img">
            </div>

        </div>
    </div>
@endsection