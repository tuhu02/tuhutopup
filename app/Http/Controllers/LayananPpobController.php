<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\LayananPpob;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class LayananPpobController extends Controller
{
    public function create()
    {
        $datas = LayananPpob::join('kategoris', 'layanan_ppobs.kategori_id', 'kategoris.id')
            ->orderBy('layanan_ppobs.created_at', 'desc')
            ->select('layanan_ppobs.*', 'kategoris.nama AS nama_kategori')->get();

        $kategoris = Kategori::where('tipe', 'pulsa-ppob')->get();

        return view('components.admin.layanan-ppob', ['datas' => $datas, 'kategoris' => $kategoris]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'brand' => 'required',
            'harga' => 'required|numeric',
            'harga_reseller' => 'required|numeric',
            'provider_id' => 'required|unique:layanan_ppobs,provider_id',
            'tipe_layanan' => 'required',
            'tipe' => 'required',
            'provider' => 'required',
        ]);

        $layanan = new LayananPpob();
        $layanan->kategori_id = $request->kategori;
        $layanan->brand = $request->brand;
        $layanan->layanan = $request->nama;
        $layanan->provider_id = $request->provider_id;
        $layanan->tipe_layanan = $request->tipe_layanan;
        $layanan->tipe = $request->tipe;
        $layanan->harga = $request->harga;
        $layanan->harga_reseller = $request->harga_reseller;
        $layanan->status = 'available';
        $layanan->save();

        return back()->with('success', 'Berhasil menambahkan layanan PPOB');
    }

    public function delete($id)
    {
        LayananPpob::where('id', $id)->delete();
        return back()->with('success', 'Berhasil menghapus layanan PPOB');
    }

    public function update($id, $status)
    {
        LayananPpob::where('id', $id)->update([
            'status' => $status
        ]);
        return back()->with('success', 'Berhasil mengupdate status layanan PPOB');
    }

    public function detail($id)
    {
        $data = LayananPpob::where('id', $id)->first();

        $send = "
                <form action='" . route("layanan-ppob.detail.update", [$id]) . "' method='POST'>
                    <input type='hidden' name='_token' value='" . csrf_token() . "'>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label'>Layanan</label>
                        <div class='col-lg-10'>
                            <input type='text' class='form-control' value='" . $data->layanan . "' name='layanan'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label'>Brand</label>
                        <div class='col-lg-10'>
                            <input type='text' class='form-control' value='" . $data->brand . "' name='brand'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label'>Provider</label>
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
                        <label class='col-lg-2 col-form-label'>Provider ID</label>
                        <div class='col-lg-10'>
                            <input type='text' class='form-control' value='" . $data->provider_id . "' name='provider_id'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label'>Tipe Layanan</label>
                        <div class='col-lg-10'>
                            <input type='text' class='form-control' value='" . $data->tipe_layanan . "' name='tipe_layanan'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label'>Tipe</label>
                        <div class='col-lg-10'>
                            <input type='text' class='form-control' value='" . $data->tipe . "' name='tipe'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label'>Harga</label>
                        <div class='col-lg-10'>
                            <input type='number' class='form-control' value='" . $data->harga . "' name='harga'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label'>Harga Reseller</label>
                        <div class='col-lg-10'>
                            <input type='number' class='form-control' value='" . $data->harga_reseller . "' name='harga_reseller'>
                        </div>
                    </div>
                    <div class='mb-3 row'>
                        <label class='col-lg-2 col-form-label'>Status</label>
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
        LayananPpob::where('id', $id)->update([
            'layanan' => $request->layanan,
            'brand' => $request->brand,
            'provider' => $request->provider,
            'provider_id' => $request->provider_id,
            'tipe_layanan' => $request->tipe_layanan,
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'harga_reseller' => $request->harga_reseller,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Berhasil update layanan PPOB');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
            'kategori_id' => 'required|exists:kategoris,id',
            'provider' => 'required|in:digiflazz,apigames,vip,smileone,joki',
        ]);

        try {
            $file = $request->file('excel_file');
            $kategori_id = $request->kategori_id;
            $provider = $request->provider;

            // Read Excel file
            $spreadsheet = IOFactory::load($file->getPathname());
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            // Remove header row
            $header = array_shift($rows);

            // Find column indexes
            $kodeIndex = null;
            $hargaIndex = null;
            $statusIndex = null;
            $produkIndex = null;

            foreach ($header as $index => $col) {
                $col = strtolower(trim($col));
                if (in_array($col, ['kode', 'kode produk', 'kode prod produk'])) {
                    $kodeIndex = $index;
                } elseif (in_array($col, ['harga', 'price'])) {
                    $hargaIndex = $index;
                } elseif (in_array($col, ['status'])) {
                    $statusIndex = $index;
                } elseif (in_array($col, ['produk', 'deskripsi', 'perubahaı deskripsi'])) {
                    $produkIndex = $index;
                }
            }

            if ($kodeIndex === null || $hargaIndex === null || $statusIndex === null || $produkIndex === null) {
                return back()->with('error', 'Format Excel tidak sesuai. Pastikan ada kolom: Kode, Harga, Status, dan Produk');
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
                    'brand' => 'PLN', // Default brand, bisa diubah sesuai kebutuhan
                    'layanan' => $deskripsi,
                    'provider_id' => $kode,
                    'tipe_layanan' => 'Token Listrik',
                    'tipe' => 'pulsa',
                    'harga' => $harga,
                    'harga_reseller' => $harga,
                    'status' => 'available',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::transaction(function () use ($toCreate) {
                LayananPpob::insert($toCreate);
            });

            return back()->with('success', "Berhasil import " . count($toCreate) . " layanan PPOB. " . $skipped . " data dilewati.");

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
