<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // ユーザーが既に存在する場合はそのユーザーを取得し、存在しない場合は新たにユーザーを作成します。
        $user = User::firstOrCreate(
            ['email' => $user->getEmail()],
            ['name' => $user->getName(), 'password' => bcrypt(Str::random(16))]
        );

        Auth::login($user, true);

        return redirect('/');
    }
}
