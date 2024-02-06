<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use App\Models\stok;

class StokController extends Controller
{
    //
    public function index()
    {
        //get posts
        $barang = DB::table('barangs')
        ->join('stoks', 'barangs.kode_barang', '=', 'stoks.id_barang')
        ->select('barangs.*', 'stoks.jumlah', 'stoks.status')
        ->paginate(5);

        //render view with posts
        return view('stock.index', compact('barang'));
    }
    public function update(Request $request, $id)
{
    // Validasi formulir jika diperlukan
    $request->validate([
        'new_stock' => 'required|numeric|min:0',
        'new_status' => 'required|in:Available,Empty',
    ]);

    // Temukan stok berdasarkan kode_barang
    $stok = Stok::where('id_barang', $id)->firstOrFail();

    // Perbarui jumlah stok dan status
    $stok->jumlah = $request->new_stock;
    $stok->status = $request->new_status;
    $stok->save();

    // Redirect atau kirim respons sesuai kebutuhan Anda
    return redirect()->back()->with('success', 'Stok berhasil diperbarui.');
}






}
