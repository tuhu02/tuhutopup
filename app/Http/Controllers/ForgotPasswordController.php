<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    /**
     * Menampilkan halaman Lupa Password untuk memasukkan nomor telepon.
     */
    public function forgotPassword()
    {
        return view('template.forgotpassword'); // Pastikan Anda punya view ini
    }

    /**
     * Menampilkan halaman untuk verifikasi OTP.
     */
    public function showVerifyOtp()
    {
        // Pastikan pengguna sudah melalui langkah pertama (meminta OTP)
        if (!Session::has('reset_phone')) {
            return redirect('/forgot-password')->with('error', 'Silakan masukkan nomor WhatsApp Anda terlebih dahulu.');
        }
        return view('template.verifyotp');
    }

    /**
     * Mengirim atau mengirim ulang OTP ke nomor WhatsApp pengguna.
     */
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
        ], [
            'phone.required' => 'Nomor WhatsApp wajib diisi.',
        ]);

        $no = $request->phone;
        Log::info('Permintaan OTP diterima untuk nomor: ' . $no);

        $user = $this->findUserByPhone($no);

        if (!$user) {
            Log::warning('User tidak ditemukan untuk nomor: ' . $no);
            // Kembali ke halaman sebelumnya dengan pesan error
            return back()->with('error', 'Nomor WhatsApp tidak terdaftar dalam sistem!');
        }

        Log::info('User ditemukan: ' . $user->name . ' (ID: ' . $user->id . ')');

        // Buat OTP 6 digit secara acak
        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        try {
            $user->update(['otp' => $otp]);
            Log::info('OTP berhasil dibuat dan disimpan: ' . $otp);
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan OTP: ' . $e->getMessage());
            return back()->with('error', 'Gagal memproses OTP. Silakan coba lagi.');
        }

        $message = "🔐 *Kode Verifikasi Reset Password*\n\n";
        $message .= "Kode OTP Anda: *{$otp}*\n\n";
        $message .= "Kode ini hanya berlaku selama 10 menit. Jangan berikan kode ini kepada siapapun!";

        try {
            // Kirim OTP via WhatsApp Gateway (Fonnte)
            $response = $this->sendViaFonte($user->no_wa, $message);
            
            if (isset($response['status']) && $response['status'] == true) {
                Log::info('Pesan WhatsApp berhasil dikirim via Fonnte.');
                // Simpan nomor telepon dan ID user di session untuk halaman verifikasi
                session(['reset_phone' => $user->no_wa, 'reset_user_id' => $user->id]);
                // Arahkan ke halaman verifikasi OTP dengan pesan sukses
                return redirect('/verify-otp')->with('success', 'Kode OTP telah dikirim ke WhatsApp Anda.');
            } 
            
            $errorMessage = $response['reason'] ?? 'Gagal mengirim pesan, response tidak diketahui.';
            throw new \Exception($errorMessage);

        } catch (\Exception $e) {
            Log::error('Gagal mengirim pesan WhatsApp: ' . $e->getMessage());
            
            // Hapus OTP dari database jika gagal kirim pesan
            $user->update(['otp' => null]);
            Log::info('OTP dihapus karena pengiriman gagal.');

            return back()->with('error', 'Gagal mengirim OTP: ' . $e->getMessage());
        }
    }

    /**
     * Memproses verifikasi OTP yang dimasukkan oleh pengguna.
     */
    public function verifyOtp(Request $request)
    {
        $no = Session::get('reset_phone');
        $userId = Session::get('reset_user_id');

        if (!$no || !$userId) {
            return redirect('/forgot-password')->with('error', 'Sesi Anda telah berakhir. Silakan ulangi proses.');
        }

        $request->validate([
            'otp' => 'required|array|size:6',
            'otp.*' => 'required|numeric|digits:1',
        ], [
            'otp.required' => 'Harap masukkan kode OTP.',
            'otp.size' => 'Kode OTP harus terdiri dari 6 digit.',
        ]);

        $otp = implode('', $request->otp);

        $user = User::where('id', $userId)
                    ->where('no_wa', $no)
                    ->where('otp', $otp)
                    ->first();

        if (!$user) {
            // Kembali ke halaman verifikasi dengan pesan error
            return redirect('/verify-otp')->with('error', 'Kode OTP yang Anda masukkan tidak valid!');
        }

        // Hapus OTP setelah berhasil dan bersihkan session
        $user->update(['otp' => null]);
        Session::forget(['reset_phone', 'reset_user_id']);
        
        // Login pengguna secara otomatis agar bisa langsung ganti password
        Auth::login($user);

        // Arahkan ke halaman edit profil untuk ganti password
        return redirect('/user/edit/profile')->with('success', 'Verifikasi berhasil! Silakan perbarui password Anda.');
    }

    /**
     * Mengirim ulang OTP ke nomor yang tersimpan di session.
     */
    public function resendOtp(Request $request)
    {
        $phone = Session::get('reset_phone');

        if (!$phone) {
            return redirect('/forgot-password')->with('error', 'Sesi Anda telah berakhir. Silakan ulangi proses dari awal.');
        }

        // Buat request baru untuk dikirim ke method sendOtp
        $resendRequest = new Request(['phone' => $phone]);

        // Panggil kembali method sendOtp untuk menggunakan ulang logika yang sudah ada
        return $this->sendOtp($resendRequest);
    }

    /**
     * Fungsi helper untuk mengirim pesan via Fonnte.
     */
    private function sendViaFonte($target, $message)
    {
        // Ambil token Fonnte dari database
        $api = DB::table('setting_webs')->where('id', 1)->first();

        if (!$api || !$api->wa_key) {
            throw new \Exception('Token WhatsApp Gateway (Fonnte) belum diatur. Silakan hubungi admin.');
        }
        
        $token = $api->wa_key;
        $curl = curl_init();
        
        curl_setopt_array($curl, [
          CURLOPT_URL => "https://api.fonnte.com/send",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => ['target' => $target, 'message' => $message],
          CURLOPT_HTTPHEADER => ["Authorization: " . $token],
        ]);
        
        $response = curl_exec($curl);
        $curlError = curl_error($curl);
        curl_close($curl);

        if ($curlError) {
            throw new \Exception('Error koneksi ke Fonnte: ' . $curlError);
        }
        
        $responseData = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Fonnte memberikan response yang tidak valid.');
        }

        return $responseData;
    }

    /**
     * Fungsi helper untuk mencari user berdasarkan berbagai format nomor telepon.
     */
    private function findUserByPhone($phone)
    {
        // Normalisasi nomor telepon: hapus semua karakter non-digit
        $normalizedPhone = preg_replace('/\D/', '', $phone);
        
        // Hapus awalan '62' atau '0' untuk mendapatkan nomor dasar
        if (substr($normalizedPhone, 0, 2) === '62') {
            $normalizedPhone = substr($normalizedPhone, 2);
        } else if (substr($normalizedPhone, 0, 1) === '0') {
            $normalizedPhone = substr($normalizedPhone, 1);
        }

        // Cari berdasarkan kemungkinan format yang disimpan di database
        $searchPatterns = [
            $phone,                    // Format asli inputan
            '0' . $normalizedPhone,     // Format '08...'
            '62' . $normalizedPhone,    // Format '628...'
            '+62' . $normalizedPhone,   // Format '+628...'
        ];
        
        return User::whereIn('no_wa', array_unique($searchPatterns))->first();
    }
}