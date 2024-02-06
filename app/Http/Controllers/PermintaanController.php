<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Mitra;

class PermintaanController extends Controller
{
    public function index()
    {
        $mitras = Mitra::with(['departement', 'user'])->get();
        $barang = Barang::all();

        //render view with posts
        return view('permintaan.index', compact('mitras', 'barang'));

    }
}
