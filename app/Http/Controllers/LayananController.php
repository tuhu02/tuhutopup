<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class LayananController extends Controller
{
    public function create()
    {
        $datas = Layanan::join('kategoris', 'layanans.kategori_id', 'kategoris.id')
            ->orderBy('layanans.sort_order', 'asc')
            ->orderBy('layanans.created_at', 'desc')
            ->select('layanans.*', 'kategoris.nama AS nama_kategori')->get();

        $kategoris = Kategori::get();

        return view('components.admin.layanan', ['datas' => $datas, 'kategoris' => $kategoris]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'harga_member' => 'required|numeric',
            'harga_platinum' => 'required|numeric',
            'harga_gold' => 'required|numeric',
            'profit' => 'required|numeric',
            'profit_member' => 'required|numeric',
            'profit_platinum' => 'required|numeric',
            'profit_gold' => 'required|numeric',
            'provider_id' => 'required|unique:layanans,provider_id',
            'provider' => 'required',
        ]);

        $layanan = new Layanan();
        $layanan->kategori_id = $request->kategori;
        $layanan->layanan = $request->nama;
        $layanan->provider_id = $request->provider_id;
        $layanan->harga = $request->harga + ($request->harga * $request->profit / 100);
        $layanan->harga_member = $request->harga_member + ($request->harga_member * $request->profit_member / 100);
        $layanan->harga_platinum = $request->harga_platinum + ($request->harga_platinum * $request->profit_platinum / 100);
        $layanan->harga_gold = $request->harga_gold + ($request->harga_gold * $request->profit_gold / 100);
        $layanan->profit = $request->profit;
        $layanan->profit_member = $request->profit_member;
        $layanan->profit_platinum = $request->profit_platinum;
        $layanan->profit_gold = $request->profit_gold;
        $layanan->provider = $request->provider;
        $layanan->catatan = '';
        $layanan->status = 'available';
        $layanan->save();

        return back()->with('success', 'Berhasil menginput layanan');
    }

    public function delete($id)
    {
        Layanan::where('id', $id)->delete();
        return back()->with('success', 'Berhasil menghapus layanan');
    }

    public function update($id, $status)
    {
        Layanan::where('id', $id)->update([
            'status' => $status
        ]);
        return back()->with('success', 'Berhasil mengupdate layanan');
    }

    public function detail($id)
    {
        $data = Layanan::where('id', $id)->first();

        $send = "
                <form action='" . route("layanan.detail.update", [$id]) . "' method='POST'>
                    <input type='hidden' name='_token' value='" . csrf_token() . "'>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Layanan</label>
                        <div class='col-lg-10'>
                            <input type='text' class='form-control' value='" . $data->layanan . "' name='layanan'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Provider</label>
                        <div class='col-lg-10'>
                            <select class='form-select' name='provider'>
                                <option value='digiflazz' " . ($data->provider == 'digiflazz' ? 'selected' : '') . ">Digiflazz</option>
                                <option value='apigames' " . ($data->provider == 'apigames' ? 'selected' : '') . ">API Games</option>
                                <option value='vip' " . ($data->provider == 'vip' ? 'selected' : '') . ">Vip Reseller</option>
                                <option value='smileone' " . ($data->provider == 'smileone' ? 'selected' : '') . ">SmileOne</option>
                                <option value='joki' " . ($data->provider == 'joki' ? 'selected' : '') . ">Joki</option>
                            </select>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Provider Id</label>
                        <div class='col-lg-10'>
                            <input type='text' class='form-control' value='" . $data->provider_id . "' name='provider_id'>
                        </div>
                    </div>  
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Harga</label>
                        <div class='col-lg-10'>
                            <input type='number' class='form-control' value='" . round($data->harga / (1 + $data->profit / 100)) . "' name='harga'>
                        </div>
                    </div>  
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Harga Member</label>
                        <div class='col-lg-10'>
                            <input type='number' class='form-control' value='" . round($data->harga_member / (1 + $data->profit_member / 100)) . "' name='harga_member'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Harga Platinum</label>
                        <div class='col-lg-10'>
                            <input type='number' class='form-control' value='" . round($data->harga_platinum / (1 + $data->profit_platinum / 100)) . "' name='harga_platinum'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Harga Gold</label>
                        <div class='col-lg-10'>
                            <input type='number' class='form-control' value='" . round($data->harga_gold / (1 + $data->profit_gold / 100)) . "' name='harga_gold'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Profit</label>
                        <div class='col-lg-10'>
                            <input type='number' class='form-control' value='" . $data->profit . "' name='profit'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Profit Member</label>
                        <div class='col-lg-10'>
                            <input type='number' class='form-control' value='" . $data->profit_member . "' name='profit_member'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Profit Platinum</label>
                        <div class='col-lg-10'>
                            <input type='number' class='form-control' value='" . $data->profit_platinum . "' name='profit_platinum'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Profit Gold</label>
                        <div class='col-lg-10'>
                            <input type='number' class='form-control' value='" . $data->profit_gold . "' name='profit_gold'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label' for='example-fileinput'>Status</label>
                        <div class='col-lg-10'>
                            <select class='form-control' name='status'>
                                <option value='available' " . ($data->status == 'available' ? 'selected' : '') . ">Available</option>
                                <option value='unavailable' " . ($data->status == 'unavailable' ? 'selected' : '') . ">Unavailable</option>
                            </select>
                        </div>
                    </div>                                        
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' class='btn btn-primary'>Simpan</button>
                    </div>
                </form>
        ";

        return $send;
    }


    public function patch(Request $request, $id)
    {

        $layanan = Layanan::where('id', $id)->update([
            'layanan' => $request->layanan,
            'provider' => $request->provider,
            'provider_id' => $request->provider_id,
            'harga' => $request->harga + ($request->harga * $request->profit / 100),
            'harga_member' => $request->harga_member + ($request->harga_member * $request->profit_member / 100),
            'harga_platinum' => $request->harga_platinum + ($request->harga_platinum * $request->profit_platinum / 100),
            'harga_gold' => $request->harga_gold + ($request->harga_gold * $request->profit_gold / 100),
            'profit' => $request->profit,
            'profit_member' => $request->profit_member,
            'profit_platinum' => $request->profit_platinum,
            'profit_gold' => $request->profit_gold,
            'status' => $request->status,
        ]);


        return back()->with('success', 'Berhasil update layanan');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
            'kategori_id' => 'required|exists:kategoris,id',
            'provider' => 'required|in:digiflazz,apigames,vip,smileone,joki',
            'profit' => 'required|numeric|min:0|max:100',
            'profit_member' => 'required|numeric|min:0|max:100',
            'profit_platinum' => 'required|numeric|min:0|max:100',
            'profit_gold' => 'required|numeric|min:0|max:100',
        ]);

        try {
            $file = $request->file('excel_file');
            $kategori_id = $request->kategori_id;
            $provider = $request->provider;
            $profit = $request->profit;
            $profit_member = $request->profit_member;
            $profit_platinum = $request->profit_platinum;
            $profit_gold = $request->profit_gold;

            // Read Excel file
            $spreadsheet = IOFactory::load($file->getPathname());
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            // Remove header row
            $header = array_shift($rows);

            // Find column indexes with multiple possible names
            $kodeIndex = array_search('Kode Prod Produk', $header);
            if ($kodeIndex === false) {
                $kodeIndex = array_search('Kode Prod', $header);
            }
            if ($kodeIndex === false) {
                $kodeIndex = array_search('Kode', $header);
            }
            if ($kodeIndex === false) {
                $kodeIndex = array_search('Kode Produk', $header);
            }
            if ($kodeIndex === false) {
                $kodeIndex = array_search('Product Code', $header);
            }
            if ($kodeIndex === false) {
                $kodeIndex = array_search('Provider ID', $header);
            }

            $hargaIndex = array_search('Harga', $header);
            if ($hargaIndex === false) {
                $hargaIndex = array_search('Price', $header);
            }

            $hargaModalIndex = array_search('Harga Ma:Stok', $header);

            $statusIndex = array_search('Status', $header);

            // Prefer product name columns first, then fall back to description
            $produkIndex = array_search('Nama Produk', $header);
            if ($produkIndex === false) {
                $produkIndex = array_search('Product Name', $header);
            }
            if ($produkIndex === false) {
                $produkIndex = array_search('Produk', $header);
            }
            if ($produkIndex === false) {
                $produkIndex = array_search('Product', $header);
            }
            if ($produkIndex === false) {
                $produkIndex = array_search('Nama', $header);
            }
            // Fallbacks to description headers
            if ($produkIndex === false) {
                $produkIndex = array_search('Deskripsi', $header);
            }
            if ($produkIndex === false) {
                $produkIndex = array_search('Description', $header);
            }
            if ($produkIndex === false) {
                $produkIndex = array_search('Perubahan Deskripsi', $header);
            }
            if ($produkIndex === false) {
                $produkIndex = array_search('Perubahaı Deskripsi', $header);
            }

            // Check which columns are missing
            $missingColumns = [];
            if ($kodeIndex === false)
                $missingColumns[] = 'Kode Produk';
            if ($hargaIndex === false)
                $missingColumns[] = 'Harga';
            if ($statusIndex === false)
                $missingColumns[] = 'Status';
            if ($produkIndex === false)
                $missingColumns[] = 'Nama Produk/Produk';

            if (!empty($missingColumns)) {
                return back()->with('error', 'Format Excel tidak sesuai. Kolom yang tidak ditemukan: ' . implode(', ', $missingColumns) . '. Kolom yang tersedia: ' . implode(', ', $header));
            }

            $toCreate = [];
            $seenProviderIds = [];
            $skipped = 0;
            foreach ($rows as $row) {
                if (empty(array_filter($row))) {
                    continue;
                }

                $kode = trim($row[$kodeIndex]);
                $harga = (float) str_replace(['Rp', '.', ','], '', $row[$hargaIndex]);
                $status = trim($row[$statusIndex]);
                $deskripsi = trim($row[$produkIndex]);

                if (empty($kode) || empty($deskripsi)) {
                    $skipped++;
                    continue;
                }

                // Only take active items
                if (strpos(strtolower($status), 'aktif') === false) {
                    $skipped++;
                    continue;
                }

                if (isset($seenProviderIds[$kode])) {
                    $skipped++;
                    continue;
                }
                $seenProviderIds[$kode] = true;

                $toCreate[] = [
                    'kategori_id' => $kategori_id,
                    'layanan' => $deskripsi,
                    'provider_id' => $kode,
                    'harga' => $harga + ($harga * $profit / 100),
                    'harga_member' => $harga + ($harga * $profit_member / 100),
                    'harga_platinum' => $harga + ($harga * $profit_platinum / 100),
                    'harga_gold' => $harga + ($harga * $profit_gold / 100),
                    'profit' => $profit,
                    'profit_member' => $profit_member,
                    'profit_platinum' => $profit_platinum,
                    'profit_gold' => $profit_gold,
                    'provider' => $provider,
                    'catatan' => '',
                    'status' => 'available',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::transaction(function () use ($kategori_id, $toCreate) {
                // Replace all layanan in this category with imported ones
                Layanan::where('kategori_id', $kategori_id)->delete();
                if (!empty($toCreate)) {
                    // Use chunked inserts if very large
                    foreach (array_chunk($toCreate, 500) as $chunk) {
                        Layanan::insert($chunk);
                    }
                }
            });

            $imported = count($toCreate);
            $message = "Berhasil mengganti layanan kategori ini. Diimport: {$imported}.";
            if ($skipped > 0) {
                $message .= " Dilewati: {$skipped} baris (tidak aktif atau data kosong).";
            }

            return back()->with('success', $message);

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengimport file: ' . $e->getMessage());
        }
    }

    public function previewExcel(Request $request)
    {
        try {
            // Debug: Log request data
            \Log::info('Preview request received');
            \Log::info('Request has file: ' . ($request->hasFile('excel_file') ? 'yes' : 'no'));

            if (!$request->hasFile('excel_file')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada file yang dikirim.'
                ]);
            }

            $request->validate([
                'excel_file' => 'required|file|mimes:xlsx,xls',
            ]);

            $file = $request->file('excel_file');

            if (!$file->isValid()) {
                return response()->json([
                    'success' => false,
                    'message' => 'File tidak valid atau rusak.'
                ]);
            }

            \Log::info('File info: ' . $file->getClientOriginalName() . ', Size: ' . $file->getSize());

            // Read Excel file
            $spreadsheet = IOFactory::load($file->getPathname());
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            // Remove header row
            $header = array_shift($rows);

            // Debug: Log header columns
            \Log::info('Excel headers: ' . json_encode($header));

            // Find column indexes with multiple possible names
            $kodeIndex = array_search('Kode Prod Produk', $header);
            if ($kodeIndex === false) {
                $kodeIndex = array_search('Kode Prod', $header);
            }
            if ($kodeIndex === false) {
                $kodeIndex = array_search('Kode', $header);
            }
            if ($kodeIndex === false) {
                $kodeIndex = array_search('Kode Produk', $header);
            }
            if ($kodeIndex === false) {
                $kodeIndex = array_search('Product Code', $header);
            }
            if ($kodeIndex === false) {
                $kodeIndex = array_search('Provider ID', $header);
            }

            $hargaIndex = array_search('Harga', $header);
            if ($hargaIndex === false) {
                $hargaIndex = array_search('Price', $header);
            }

            $statusIndex = array_search('Status', $header);

            // Prefer product name columns first, then fall back to description
            $produkIndex = array_search('Nama Produk', $header);
            if ($produkIndex === false) {
                $produkIndex = array_search('Product Name', $header);
            }
            if ($produkIndex === false) {
                $produkIndex = array_search('Produk', $header);
            }
            if ($produkIndex === false) {
                $produkIndex = array_search('Product', $header);
            }
            if ($produkIndex === false) {
                $produkIndex = array_search('Nama', $header);
            }
            if ($produkIndex === false) {
                $produkIndex = array_search('Deskripsi', $header);
            }
            if ($produkIndex === false) {
                $produkIndex = array_search('Description', $header);
            }
            if ($produkIndex === false) {
                $produkIndex = array_search('Perubahan Deskripsi', $header);
            }
            if ($produkIndex === false) {
                $produkIndex = array_search('Perubahaı Deskripsi', $header);
            }

            // Check which columns are missing
            $missingColumns = [];
            if ($kodeIndex === false)
                $missingColumns[] = 'Kode Produk';
            if ($hargaIndex === false)
                $missingColumns[] = 'Harga';
            if ($statusIndex === false)
                $missingColumns[] = 'Status';
            if ($produkIndex === false)
                $missingColumns[] = 'Nama Produk/Produk';

            if (!empty($missingColumns)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Format Excel tidak sesuai. Kolom yang tidak ditemukan: ' . implode(', ', $missingColumns) . '. Kolom yang tersedia: ' . implode(', ', $header),
                    'debug' => [
                        'headers' => $header,
                        'missing' => $missingColumns
                    ]
                ]);
            }

            $previewData = [];
            $totalRows = 0;
            $activeRows = 0;
            $existingRows = 0;

            foreach (array_slice($rows, 0, 20) as $row) { // Preview first 20 rows
                // Skip empty rows
                if (empty(array_filter($row))) {
                    continue;
                }

                $totalRows++;
                $kode = trim($row[$kodeIndex]);
                $harga = (float) str_replace(['Rp', '.', ','], '', $row[$hargaIndex]);
                $status = trim($row[$statusIndex]);
                $deskripsi = trim($row[$produkIndex]);

                // For preview we still show whether it would be imported when replacing
                $existing = Layanan::where('provider_id', $kode)->first();
                $willImport = !empty($kode) && !empty($deskripsi) &&
                    strpos(strtolower($status), 'aktif') !== false;

                if ($willImport) {
                    $activeRows++;
                } elseif ($existing) {
                    $existingRows++;
                }

                $previewData[] = [
                    'kode' => $kode,
                    'harga' => number_format($harga, 0, ',', '.'),
                    'status' => $status,
                    'deskripsi' => $deskripsi,
                    'will_import' => $willImport,
                    'reason' => strpos(strtolower($status), 'aktif') === false ? 'Tidak aktif' : ($existing ? 'Akan replace' : '')
                ];
            }

            return response()->json([
                'success' => true,
                'data' => $previewData,
                'summary' => [
                    'total_previewed' => $totalRows,
                    'will_import' => $activeRows,
                    'will_skip' => $totalRows - $activeRows,
                    'existing' => $existingRows
                ]
            ]);

        } catch (\Exception $e) {
            \Log::error('Excel preview error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat membaca file: ' . $e->getMessage(),
                'debug' => [
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ]
            ]);
        }
    }

    public function testAjax()
    {
        return response()->json([
            'success' => true,
            'message' => 'AJAX test berhasil!'
        ]);
    }

    public function updateSortOrder(Request $request)
    {
        try {
            $request->validate([
                'layanan_ids' => 'required|array',
                'layanan_ids.*' => 'required|integer|exists:layanans,id'
            ]);

            foreach ($request->layanan_ids as $index => $layananId) {
                Layanan::where('id', $layananId)->update(['sort_order' => $index + 1]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Urutan produk berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
