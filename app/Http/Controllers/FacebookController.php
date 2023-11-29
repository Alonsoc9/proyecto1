<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacebookUser;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function callbackFacebook()
    {
        try {
            $facebook_user = Socialite::driver('facebook')->user();

            // Buscar al usuario en la base de datos por facebook_id
            $user = FacebookUser::where('facebook_id', $facebook_user->getId())->first();

            if (!$user) {
                // Si el usuario no existe, buscar por correo electrónico
                $user = FacebookUser::where('email', $facebook_user->getEmail())->first();

                if (!$user) {
                    // Si el usuario no existe en absoluto, créalo
                    $new_user = FacebookUser::create([
                        'name' => $facebook_user->getName(),
                        'email' => $facebook_user->getEmail(),
                        'facebook_id' => $facebook_user->getId(),
                        'profile_image' => $facebook_user->getAvatar(),
                    ]);

                    // Autenticar al nuevo usuario
                    Auth::login($new_user);

                    // Redirigir a la ruta deseada después del inicio de sesión
                    return redirect()->to('/dashboard');

                }
            }

            // El usuario existe, inicia sesión
            Auth::login($user);
            

            // Redirigir a la ruta deseada después del inicio de sesión
            // Limpiar el fragmento extra de la URL si existe
            return redirect()->to('/dashboard');
        } catch (\Throwable $th) {
            // Manejar errores de manera adecuada
            dd('Something went wrong! ' . $th->getMessage());
        }
    }
}
