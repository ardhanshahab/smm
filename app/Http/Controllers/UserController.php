<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function destroy($id)
{
    try {
        // Mengambil data users berdasarkan ID
        $users = User::findOrFail($id);

        // Menghapus data users
        $users->delete();

        return redirect()->route('users.index')->with('success', 'Data berhasil dihapus!');
    } catch (\Exception $e) {
        return redirect()->route('users.index')->with('error', 'Terjadi kesalahan saat menghapus data!');
    }
}
}
