<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tantangan;
use App\Models\Registrasi;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class TantanganController extends Controller
{
    public function index()
    {
        $challengesGroupedByCategory = Tantangan::all()->groupBy('kategori');
        return view('tantangan.index', [
            'kategori' => $challengesGroupedByCategory
        ]);
    }

    public function show($slug)
    {
        $selectedChallenge = Tantangan::where('slug', $slug)->firstOrFail();
        $userRegistrationStatus = null;
        if (Auth::check()) {
            $userRegistrationStatus = Registrasi::where('user_id', Auth::id())
                            ->where('tantangan_id', $selectedChallenge->id)
                            ->first();
        }

        return view('tantangan.detail', [
            'event' => $selectedChallenge, 
            'statusDaftar' => $userRegistrationStatus   
        ]);
    }

    public function register($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $authenticatedUser = Auth::user(); 
        
        $selectedChallenge = Tantangan::findOrFail($id);

        $hasExistingRegistration = Registrasi::where('user_id', $authenticatedUser->id)
                            ->where('tantangan_id', $id)
                            ->exists();

        if ($hasExistingRegistration) {
            return back()->with('error', 'Kamu sudah terdaftar di tantangan ini!');
        }

        Registrasi::create([
            'user_id' => $authenticatedUser->id,
            'tantangan_id' => $id,
            'status' => 'aktif',
            'sudah_klaim_daftar' => true
        ]);

        $authenticatedUser->increment('coins', 10);

        Notification::create([
            'user_id' => $authenticatedUser->id,
            'title' => 'Tantangan Selesai!',
            'message' => 'Kamu telah mencapai target ' . $selectedChallenge->judul . '. Klik di sini untuk klaim koin!',
            'url' => route('tantangan.show', $selectedChallenge->slug),
        ]);

        return redirect()->route('tantangan.index')->with('success', 'Berhasil mendaftar tantangan! +10 koin telah ditambahkan.');
    }

    public function klaimKoinSisa($id)
    {
        $authenticatedUser = Auth::user();
        
        $challengeRegistration = Registrasi::with('tantangan')
                                ->where('user_id', $authenticatedUser->id)
                                ->where('tantangan_id', $id)
                                ->first();

        if (!$challengeRegistration) {
            return back()->with('error', 'Kamu belum daftar tantangan ini.');
        }

        if ($challengeRegistration->sudah_mengikuti_tantangan) {
            return back()->with('error', 'Kamu sudah ambil hadiah untuk tantangan ini.');
        }

        $userRunningDistance = 100;
        $requiredChallengeDistance = (float) $challengeRegistration->tantangan->jarak; 

        if ($userRunningDistance >= $requiredChallengeDistance) {
            $totalRewardCoins = $challengeRegistration->tantangan->koin; 

            $authenticatedUser->increment('coins', $totalRewardCoins);
            $challengeRegistration->update(['sudah_mengikuti_tantangan' => true]);
            
            return redirect()->route('tantangan.index')->with('success', 'Selamat kamu sudah menyelesaikan tantangannya! Kamu mendapat ' . $totalRewardCoins . ' koin sebagai hadiahnya!');
        }

        return redirect()->route('tantangan.index')->with('error', 'Aktivitas kamu belum mencapai target ' . $challengeRegistration->tantangan->jarak . '. Ayo semangat!');

    }
}
