<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                // El usuario no existe en base al google_id, verifica por correo electrónico
                $user = User::where('email', $google_user->getEmail())->first();

                if (!$user) {
                    // Si el usuario no existe en absoluto, créalo
                    $new_user = User::create([
                        'name' => $google_user->getName(),
                        'email' => $google_user->getEmail(),
                        'google_id' => $google_user->getId(),
                        'profile_image' => $google_user->getAvatar(),
                    ]);

                    Auth::login($new_user);
                    return redirect()->intended('/');
                }
            }

            // El usuario existe, inicia sesión
            Auth::login($user);
            return redirect()->intended('/');
        } catch (\Throwable $th) {
            dd('Something went wrong! ' . $th->getMessage());
        }
    }
}
