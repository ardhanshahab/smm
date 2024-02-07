<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\stok;
use Illuminate\Support\Facades\DB;
use App\Models\permintaan;
use App\Models\DetailPermintaan;


class PermintaanController extends Controller
{
        public function index()
        {
            $mitras = Mitra::with(['departement', 'user'])->get();

            $barang = DB::table('barangs')
            ->join('stoks', 'barangs.kode_barang', '=', 'stoks.id_barang')
            ->select('barangs.*', 'stoks.jumlah', 'stoks.status')
            ->get();

            $permintaans = permintaan::with('user.permintaan')->paginate(5);
            // $permintaans = Permintaan::with('detailPermintaan.barang', 'mitra.user')->paginate(5);
            $detailpermintaans = DetailPermintaan::with('barang', 'permintaan')->get();
            // return response()->json($detailpermintaans);
            //render view with posts
            return view('permintaan.index', compact('mitras', 'barang', 'permintaans', 'detailpermintaans'));

        }

    public function store(Request $request)
{
    // Validasi data yang diterima dari formulir
    $request->validate([
        'nik' => 'required',
        'tanggal_permintaan' => 'required|date',
        'nama_barang.*' => 'required',
        'kuantiti.*' => 'required|numeric|min:1',
    ]);

    try {
        // Simpan permintaan barang
        $permintaan = new Permintaan();
        $permintaan->nik = $request->nik;
        $permintaan->tanggal_permintaan = $request->tanggal_permintaan;
        $permintaan->save();

        // Simpan detail permintaan barang
        $detailPermintaan = [];
        foreach ($request->nama_barang as $key => $barang) {
            $detailPermintaan[] = [
                'permintaan_id' => $permintaan->id,
                'nama_barang' => $barang,
                'kuantiti' => $request->kuantiti[$key],
                'keterangan' => $request->keterangan[$key] ?? '',
                'status' => $request->status[$key] ?? '',
            ];
        }
        DetailPermintaan::insert($detailPermintaan);

        return redirect()->route('permintaan.index')->with('success', 'Permintaan barang berhasil disimpan.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menyimpan permintaan barang. Silakan coba lagi.');
    }
}

}
