<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Umkm;
use Illuminate\Support\Facades\Auth;

class UMKMController extends Controller
{
    public function index()
    {
        $allUmkmProducts = Umkm::all();
        $umkmGroupedByCategory = $allUmkmProducts->groupBy('kategori');
        $currentUserCoins = Auth::check() ? Auth::user()->coins : 0;

        return view('umkm.index', [
            'kategori' => $umkmGroupedByCategory, 
            'healthkoin' => $currentUserCoins
        ]);
    }

    public function show($slug)
    {
        $selectedUmkmProduct = Umkm::where('slug', $slug)->firstOrFail();
        $currentUserCoins = Auth::check() ? Auth::user()->coins : 0;

        return view('umkm.show', [
            'product' => $selectedUmkmProduct, 
            'healthkoin' => $currentUserCoins
        ]);
    }

    public function tukar($slug)
    {
        $authenticatedUser = Auth::user();
        if (!$authenticatedUser) {
            return redirect()->route('login')->with('error', 'Login dulu yuk!');
        }

        $selectedUmkmProduct = Umkm::where('slug', $slug)->firstOrFail();

        if ($authenticatedUser->coins < $selectedUmkmProduct->healthkoin) {
            return redirect()->route('umkm.index')->with('error', 'Coins kamu tidak cukup untuk ' . $selectedUmkmProduct->nama);
        }

        $authenticatedUser->coins -= $selectedUmkmProduct->healthkoin;
        $authenticatedUser->save();

        return redirect()->route('umkm.index')->with('success', 'Berhasil menukar ' . $selectedUmkmProduct->nama);
    }
}
