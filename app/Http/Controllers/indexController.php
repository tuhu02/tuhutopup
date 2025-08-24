<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Berita;
class indexController extends Controller
{
    public function create()
    {
        // Ambil semua berita untuk menghitung jumlah
        $allBanner = Berita::where('tipe', 'banner')->latest()->get();
        
        return view('template.index', [
            'kategori' => Kategori::where('status', 'active')->get(),
            'banner' => $allBanner->take(3), // Ambil 3 berita pertama untuk tampilan
            'allBanner' => $allBanner, // Semua berita untuk perhitungan
            'logoheader' => Berita::where('tipe', 'logoheader')->latest()->first(),
            'logofooter' => Berita::where('tipe', 'logofooter')->latest()->first(),
            'popup' => Berita::where('tipe', 'popup')->latest()->first(),
            'pay_method' => \App\Models\Method::all(),
            'populers' => Kategori::where('is_popular', 1)->where('status', 'active')->get(),
            'sub_nama' => kategori::where('status', 'active')->get(),
        ]);
    }

    public function berita()
    {
        $banner = Berita::where('tipe', 'banner')
                        ->orderBy('created_at', 'desc')
                        ->paginate(9);

        return view('template.berita', compact('banner'));
    }
    
    public function searchBerita(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return response()->json([
                'success' => false,
                'message' => 'Query pencarian tidak boleh kosong'
            ]);
        }

        $results = Berita::where('tipe', 'banner')
                        ->where(function($q) use ($query) {
                            $q->where('judul', 'LIKE', "%{$query}%")
                              ->orWhere('deskripsi', 'LIKE', "%{$query}%");
                        })
                        ->orderBy('created_at', 'desc')
                        ->limit(10)
                        ->get();

        return response()->json([
            'success' => true,
            'results' => $results
        ]);
    }

    public function cariIndex(Request $request)
    {
        if ($request->ajax()) {

            $data = Kategori::where('nama', 'LIKE', '%' . $request->data . '%')->where('status', 'active')->limit(6)->get();


            $res = '';


            foreach ($data as $d) {

                $res .= '
                
                           <li>
                                <a class="dropdown-item" style="color:#dee2e6" href="' . url("/order") . '/' . $d->kode . '">
                                        <div class="row">
                                            <div class="col-3">
                                                <img src="' . $d->thumbnail . '" alt="" class="img-fluid">
                                            </div>
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <b>' . $d->nama . '</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                ';

            }

            return $res;


        }
    }
}
