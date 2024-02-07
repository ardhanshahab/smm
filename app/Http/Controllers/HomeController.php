<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Mitra;
use App\Models\permintaan;
use App\Models\stok;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalBarang = Barang::count();
        $totalDepartement = Departement::count();
        $totalMitra = Mitra::count();

        // Mengambil 3 data permintaan terbaru
        $permintaans = permintaan::latest()->take(3)->get();

        // Mengambil 3 data stok terbaru dengan mengurutkan berdasarkan tanggal pembuatan
        $stoks = DB::table('barangs')
            ->join('stoks', 'barangs.kode_barang', '=', 'stoks.id_barang')
            ->select('barangs.*', 'stoks.jumlah', 'stoks.status')
            ->latest()->take(3)->get();

        return view('dashboard', compact('totalBarang', 'totalDepartement', 'totalMitra', 'permintaans',  'stoks'));
    }

}
