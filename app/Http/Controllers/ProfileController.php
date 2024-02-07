<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

public function update(ProfileRequest $request)
{
    $user = auth()->user();

    $user->name = $request->input('nama');
    $user->email = $request->input('email');
    $user->role = $request->input('role');
    $user->no_hp = $request->input('nohp');
    $user->jenis_kelamin = $request->input('jenis_kelamin');
    $user->tanggal_lahir = $request->input('tanggal_lahir');
    $user->alamat = $request->input('alamat');

    if ($user->save()) {
        Session::flash('success', 'Profil berhasil diperbarui.');
    } else {
        Session::flash('error', 'Gagal memperbarui profil. Silakan coba lagi.');
    }

    return back();
}



    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
