<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Socialite;
use Exception;
use Auth;
use App\Models\SocialProfile;
use App\Models\User;

use App\Models\Certificado;
use App\Models\Curso_Aprobado;


use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\redirect;

class SocialController extends Controller
{
    public function facebookRedirect($driver)
    {
        $drivers = ['facebook', 'google'];

        if (in_array($driver, $drivers)) {
            return Socialite::driver($driver)->redirect();
        } else {
            return redirect('login')->with('info',$driver.' no es una aplicación valida para poder loguearse');
        }
    }
    public function loginWithFacebook(Request $request, $driver)
    {
        // entra si no permites iniciar sesón desde la red social
        if ($request->get('error')){
            return redirect('auth.login');
        }

        // extraemos usuario de con el modelo Socialite
        $userSocialite = Socialite::driver($driver)->user();

        // verificamos si existe o no el usuario ( si exite va a cursos recibidos, si no existe entra y crea el user )
        $social_profile = SocialProfile::where('social_id', $userSocialite->getId())->where('social_name', $driver)->first();
        if (!$social_profile) {
            $user = User::where('email', $userSocialite->email)->first();
            
            if (!$user) {
                $user = User::create([
                    'name' => $userSocialite->getName(),
                    'email' => $userSocialite->getEmail(),
                    'fb_id' => $userSocialite->getId(),
                    ]);
            }

            $social_profile = SocialProfile::create([
                'user_id'=>$user->id,
                'social_id'=>$userSocialite->getId(),
                'social_name'=>$driver,
                'social_avatar'=>$userSocialite->getAvatar()
            ]);

            auth()->login($user);
            
            $pedirPassword = 'TRUE';
            $alert = "Llena todos los campos";
            return redirect()->route('alert_actualizar_datos', ['pedirPassword'=> $pedirPassword, 'alert' => $alert]);
            // return redirect('actualizacion_datos')->with($pedirPass);
        }

        // buscamos al usuario con ese email para loguearlo
        $user = User::where('email', $userSocialite->getEmail())->first();
        auth()->login($user);
        if ($user) {
            return redirect()->route('CursoAprobado.show', [$user->id]);
        }
    }
}
