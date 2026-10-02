<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tantangan;
use App\Models\Umkm;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('dashboard');
    }

    public function home() 
    {
        $todayCaloriesBurned = 0;
        $todayActiveMinutes = 0;

        if (Auth::check()) {
            $todayCaloriesBurned = 450;
            $todayActiveMinutes = 30;
        }

        $latestChallenges = Tantangan::latest()->take(6)->get();

        $allUmkmProducts = Umkm::all();
        $umkmGroupedByCategory = $allUmkmProducts->groupBy('kategori');

        $featuredUmkmProducts = [];
        foreach ($umkmGroupedByCategory as $products){
            if ($products->count() > 0) {
                $featuredUmkmProducts[] = $products->first();
            }
        }
        $featuredUmkmProducts = array_slice($featuredUmkmProducts, 0, 3);

        return view('beranda', [
            'challenges' => $latestChallenges, 
            'displayUmkm' => $featuredUmkmProducts, 
            'caloriesToday' => $todayCaloriesBurned, 
            'activeMinutesToday' => $todayActiveMinutes
        ]);
    }

    public function index() 
    {
        $allChallenges = Tantangan::all();
        $challengesGroupedByCategory = $allChallenges->groupBy('kategori');

        $umkmGroupedByCategory = Umkm::all()->groupBy('kategori');

        return view('tantangan.index', [
            'kategori' => $challengesGroupedByCategory,
            'kategoriUMKM' => $umkmGroupedByCategory 
        ]);
    }
}
