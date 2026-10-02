<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LengkapiProfilController extends Controller
{
    public function index()
    {
        $authenticatedUser = Auth::user();
        return view('lengkapi-profil', [
            'user' => $authenticatedUser
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:4',
            'email' => 'required|unique:users,email,' . Auth::id(),
            'kata-sandi' => 'nullable|min:8',
            'nomor-telepon' => 'required|digits_between:10,13',
            'jenis-kelamin' => 'required|in:laki,perempuan',
            'tinggi-badan' => 'required|numeric|min:1',
            'berat-badan' => 'required|numeric|min:1',
            'tanggal-lahir' => 'required',
            'kota-kabupaten' => 'required',
            'aplikasi-kesehatan' => 'required|in:google_fit,strava',
            'e-wallet' => 'required|in:gopay,ovo,dana,shopeepay'
        ]);

        $authenticatedUser = Auth::user();

        $authenticatedUser->name = $request->nama;
        $authenticatedUser->email = $request->email;
        $authenticatedUser->no_telp = $request->input('nomor-telepon');
        $authenticatedUser->jenis_kelamin = $request->input('jenis-kelamin');
        $authenticatedUser->tinggi_badan = $request->input('tinggi-badan');
        $authenticatedUser->berat_badan = $request->input('berat-badan');
        $authenticatedUser->tanggal_lahir = $request->input('tanggal-lahir');
        $authenticatedUser->kota = $request->input('kota-kabupaten');
        $authenticatedUser->aplikasi_sehat = $request->input('aplikasi-kesehatan');
        $authenticatedUser->e_wallet = $request->input('e-wallet');

        if ($request->filled('kata-sandi')) {
            $authenticatedUser->password = Hash::make($request->input('kata-sandi'));
        }

        $authenticatedUser->save();

        return redirect()->route('beranda')->with('success', 'Profil kamu berhasil diperbarui!');
    }
}
