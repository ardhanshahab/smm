<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DepartementController extends Controller
{
    public function index()
    {
        //get posts
        $posts = Departement::paginate(5);

        //render view with posts
        return view('departement.index', compact('posts'));
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
    // validate form
    $this->validate($request, [
        'nama_departement'     => 'required|min:1',
        'lokasi_departement'   => 'required|min:1',
    ]);

    Departement::create([
        'nama_departement'     => $request->nama_departement,
        'lokasi_departement'   => $request->lokasi_departement,
    ]);

    // set notification
    $request->session()->flash('success', 'Data Berhasil Disimpan!');

    // redirect to index
    return redirect()->route('departement.index');
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
        $post = Departement::findOrFail($id);

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
        $post = Departement::findOrFail($id);

        //render view with post
        return view('departement.edit', compact('post'));
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
            'nama_departement'     => 'required|min:1',
            'lokasi_departement'   => 'required|min:1',

        ]);

        //get post by ID
        $post = Departement::findOrFail($id);

            //update post with new image
            $post->update([
            'nama_departement'     => $request->nama_departement,
            'lokasi_departement'     => $request->lokasi_departement,
            ]);

        //redirect to index
        return redirect()->route('departement.index')->with(['success' => 'Data Berhasil Diubah!']);
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
        $post = Departement::findOrFail($id);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('departement.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
