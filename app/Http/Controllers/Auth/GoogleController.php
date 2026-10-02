<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $authenticatedGoogleUser = Socialite::driver('google')->stateless()->user();

        $existingUser = User::where('email', $authenticatedGoogleUser->getEmail())->first();

        $userToAuthenticate = $existingUser;

        if (!$existingUser) {
            $userToAuthenticate = User::create([
                'name' => $authenticatedGoogleUser->getName(),
                'email' => $authenticatedGoogleUser->getEmail(),
                'password' => bcrypt(Str::random(16)),
            ]);
        }

        Auth::login($userToAuthenticate);

        return redirect('/');
    }
}
