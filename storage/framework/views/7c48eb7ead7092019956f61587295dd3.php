<?php $__env->startSection('head'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom_style'); ?>
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

        /* Styling untuk input OTP */
        .otp-input-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .otp-input {
            width: 45px;
            height: 50px;
            text-align: center;
            font-size: 1.5rem;
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }

        .otp-input:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
        }

        .resend-otp-container {
            font-size: 0.9rem;
            margin-top: 1.5rem;
            text-align: center;
        }

        .resend-otp-btn {
            background: none;
            border: none;
            color: #0d6efd;
            text-decoration: underline;
            cursor: pointer;
            padding: 0;
            transition: all 0.3s ease;
        }

        .resend-otp-btn:disabled {
            color: #6c757d;
            text-decoration: none;
            cursor: not-allowed;
        }

        .resend-otp-btn:not(:disabled):hover {
            color: #0056b3;
            text-decoration: none;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <a href="<?php echo e(url('/')); ?>" class="close-button">&times;</a>

    <div class="container-fluid g-0 forgot-password-container">
        <div class="row g-0 w-100">

            
            <div class="col-lg-5 d-flex align-items-center justify-content-center" style="background-color: #ffffffff;">
                <div class="forgot-password-wrapper">
                    <h3 class="mb-2 text-black">Verifikasi OTP</h3>
                    <p class="mb-4 text-muted">Masukkan 6 digit kode OTP yang telah kami kirimkan ke nomor WhatsApp Anda.
                    </p>

                    
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
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

                    
                    <form action="<?php echo e(url('/verify-otp')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label class="form-label text-black">Masukan Kode OTP</label>
                            
                            <div class="otp-input-container">
                                <?php for($i = 0; $i < 6; $i++): ?>
                                    <input type="text" name="otp[]" class="form-control otp-input" required maxlength="1"
                                        pattern="\d*" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                <?php endfor; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 btn-forgot-password">Verifikasi</button>
                    </form>

                    <div class="resend-otp-container">
                        Tidak menerima kode?
                        
                        <button type="button" class="resend-otp-btn" id="resendOtpBtn">Kirim Ulang OTP</button>
                    </div>

                </div>
            </div>

            
            <div class="col-lg-7 d-none d-lg-block p-0">
                <img src="https://i.ytimg.com/vi/QWIf6-xP-og/maxresdefault.jpg" alt="Lupa Password Banner"
                    class="forgot-password-banner-img">
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_script'); ?>
    <script>
        // Tunggu sampai DOM selesai loading
        document.addEventListener('DOMContentLoaded', function () {
            console.log('DOM Content Loaded - memulai setup');

            // Ambil elemen yang diperlukan
            var resendBtn = document.getElementById('resendOtpBtn');
            var inputs = document.querySelectorAll('.otp-input');

            console.log('Resend button:', resendBtn);
            console.log('Inputs found:', inputs.length);

            // Variabel untuk countdown
            var countdownTimer = null;
            var isCountingDown = false;

            // Fungsi untuk format waktu
            function formatTime(seconds) {
                var minutes = Math.floor(seconds / 60);
                var secs = seconds % 60;
                return minutes + ':' + (secs < 10 ? '0' : '') + secs;
            }

            // Fungsi untuk memulai countdown
            function startCountdown(seconds) {
                if (isCountingDown) {
                    console.log('Countdown sudah berjalan');
                    return;
                }

                console.log('Memulai countdown:', seconds, 'detik');
                isCountingDown = true;

                // Update teks tombol
                resendBtn.textContent = 'Kirim Ulang OTP dalam waktu ' + formatTime(seconds);

                // Mulai countdown
                countdownTimer = setInterval(function () {
                    seconds--;

                    if (seconds <= 0) {
                        // Countdown selesai
                        clearInterval(countdownTimer);
                        resendBtn.textContent = 'Kirim Ulang OTP';
                        isCountingDown = false;
                        console.log('Countdown selesai');
                    } else {
                        // Update teks dengan sisa waktu
                        resendBtn.textContent = 'Kirim Ulang OTP dalam waktu ' + formatTime(seconds);
                    }
                }, 1000);
            }

            // Event listener untuk tombol resend
            if (resendBtn) {
                console.log('Menambahkan event listener ke tombol resend');

                resendBtn.addEventListener('click', function (e) {
                    console.log('Tombol resend diklik!');
                    e.preventDefault();

                    if (isCountingDown) {
                        console.log('Countdown masih berjalan, tidak bisa diklik');
                        return;
                    }

                    // Mulai countdown 5 menit (300 detik)
                    startCountdown(300);

                    // Di sini bisa ditambahkan logika untuk mengirim ulang OTP
                    console.log('Mengirim ulang OTP...');
                });

                console.log('Event listener berhasil ditambahkan');
            } else {
                console.error('Button resend OTP tidak ditemukan!');
            }

            // Event listener untuk input OTP
            inputs.forEach(function (input, index) {
                input.addEventListener('keyup', function (e) {
                    // Pindah ke input berikutnya jika diisi
                    if (input.value.length === 1 && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }

                    // Pindah ke input sebelumnya jika backspace
                    if (e.key === 'Backspace' && index > 0) {
                        inputs[index - 1].focus();
                    }
                });

                // Handle paste
                input.addEventListener('paste', function (e) {
                    e.preventDefault();
                    var pasteData = e.clipboardData.getData('text');
                    var otpDigits = pasteData.replace(/\D/g, '').split('');

                    inputs.forEach(function (box, i) {
                        if (otpDigits[i]) {
                            box.value = otpDigits[i];
                        }
                    });

                    // Fokus ke input terakhir
                    var lastIndex = Math.min(otpDigits.length - 1, inputs.length - 1);
                    if (lastIndex >= 0) {
                        inputs[lastIndex].focus();
                    }
                });
            });

            console.log('Setup selesai - semua event listener ditambahkan');
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\bismillah sukses\SourceCode-topupaja-v1\topupaja\resources\views/template/verifyotp.blade.php ENDPATH**/ ?>