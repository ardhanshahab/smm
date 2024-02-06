<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\stok;
use Illuminate\Support\Facades\DB;

class PermintaanController extends Controller
{
    public function index()
    {
        $mitras = Mitra::with(['departement', 'user'])->get();

        $barang = DB::table('barangs')
        ->join('stoks', 'barangs.kode_barang', '=', 'stoks.id_barang')
        ->select('barangs.*', 'stoks.jumlah', 'stoks.status')
        ->get();

        //render view with posts
        return view('permintaan.index', compact('mitras', 'barang'));

    }
}
