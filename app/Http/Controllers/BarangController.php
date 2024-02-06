<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\stok;

class BarangController extends Controller
{
    public function index()
    {
        //get posts
        $posts = Barang::paginate(5);

        //render view with posts
        return view('barang.index', compact('posts'));
    }

     /**
     * create
     *
     * @return View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
{
    // Validate form
    $this->validate($request, [
        'nama_barang'   => 'required|min:1',
        'jenis_barang'  => 'required|min:1',
        'kode_barang'   => 'required|min:1',
    ]);

    // Create barang
    $barang = Barang::create([
        'nama_barang'   => $request->nama_barang,
        'jenis_barang'  => $request->jenis_barang,
        'kode_barang'   => $request->kode_barang,
    ]);

    // Create initial stock
    Stok::create([
        'id_barang'     => $barang->kode_barang,
        'jumlah'          => 10, // Initial stock value
        'status'        => 'Available', // Initial status
    ]);

    // Redirect to index
    return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
}

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id)
    {
        //get post by ID
        $post = Barang::findOrFail($id);

        //render view with post
        return view('posts.show', compact('post'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id)
    {
        //get post by ID
        $post = Barang::findOrFail($id);

        //render view with post
        return view('barang.edit', compact('post'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'nama_barang'     => 'required|min:1',
            'jenis_barang'   => 'required|min:1',
            'kode_barang'   => 'required|min:1'
        ]);

        //get post by ID
        $post = Barang::findOrFail($id);

        //check if image is uploaded
        // if ($request->hasFile('image')) {

        //     //upload new image
        //     $image = $request->file('image');
        //     $image->storeAs('public/posts', $image->hashName());

        //     //delete old image
        //     Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
            'nama_barang'     => $request->nama_barang,
            'jenis_barang'     => $request->jenis_barang,
            'kode_barang'   => $request->kode_barang
            ]);

        // } else {

        //     //update post without image
        //     $post->update([
        //         'title'     => $request->title,
        //         'content'   => $request->content
        //     ]);
        // }

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Barang::findOrFail($id);

        //delete image
        // Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


// public function store(Request $request): RedirectResponse
//     {
//         //validate form
//         $this->validate($request, [
//             // 'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
//             'nama_barang'     => 'required|min:1',
//             'jenis_barang'   => 'required|min:1',
//             'kode_barang'   => 'required|min:1'
//         ]);

//         //upload image
//         // $image = $request->file('image');
//         // $image->storeAs('public/posts', $image->hashName());
//         // dd($request);
//         //create post
//         Barang::create([
//             // 'image'     => $image->hashName(),
//             'nama_barang'     => $request->nama_barang,
//             'jenis_barang'     => $request->jenis_barang,
//             'kode_barang'   => $request->kode_barang
//         ]);

//         //redirect to index
//         return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Disimpan!']);
//     }
