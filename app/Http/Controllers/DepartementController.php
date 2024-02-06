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
        try{
        // validate form
        $this->validate($request, [
            'nama_departement'     => 'required|min:1',
            'lokasi_departement'   => 'required|min:1',
        ]);

        Departement::create([
            'nama_departement'     => $request->nama_departement,
            'lokasi_departement'   => $request->lokasi_departement,
        ]);

            return redirect()->route('departement.index')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->route('departement.index')->with('error', 'Terjadi kesalahan saat menyimpan data!');
        }
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
        try{
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

            return redirect()->route('departement.index')->with('success', 'Data berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->route('departement.index')->with('error', 'Terjadi kesalahan saat mengupdate data!');
        }
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        try{
        //get post by ID
        $post = Departement::findOrFail($id);

        //delete post
        $post->delete();

        return redirect()->route('departement.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
        return redirect()->route('departement.index')->with('error', 'Terjadi kesalahan saat menghapus data!');
        }
    }
}
