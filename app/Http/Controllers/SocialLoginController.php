<?php

namespace App\Http\Controllers;

use App\Models\SocialLogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function toProvider(string $driver) {
        return Socialite::driver($driver)->redirect();
    }

    public function handleCallback(string $driver) {
        $googleUser = Socialite::driver('google')->user();
        $user = User::query()->where('email', $googleUser->email)
            ->orWhere('google_id', $googleUser->id)->first();

        if(!$user) {
            $user = User::query()->updateOrCreate([
                'name'      => $googleUser->name,
                'email'     => $googleUser->email,
                'google_id' => $googleUser->id,
            ]);
        }

        Auth::login($user);

        return redirect(route('dashboard'));
    }


}
