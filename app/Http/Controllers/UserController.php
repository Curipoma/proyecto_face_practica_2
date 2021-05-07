<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\Curso_Aprobado;


use App\Models\Certificado;
use App\Models\Detalle_User_Certificado;
use App\Http\Requests\StoreUserRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::all()->first();
        // return view('actualizacion_datos', compact('user'));
        return redirect('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->email == null) {
            $alert = "Llena el email";
        } else {
            $user = User::where('email', $request->email)->first();

            // Le recomendamos crear cuenta por que ese usre no existe
            if (!$user) {
                $emailIncorrect = $request->email;
                $alert = "El email ". $emailIncorrect. " no esta registrado. Crea una cuenta con aquel email";
                return view('auth.crear_cuenta', ['alert' => $alert]);
            }
        }
        if ($request->password == null) {
            $user = User::where('email', $request->email)->first();

            // verifica si este user existe  en la base de datos
            if ($user) {
                $alert = $user->name. " llena el campo de contraseña";
            } else {
                $alert = "Llena el campo de contraseña";
            }
        }
        if ($request->email == null and $request->password == null) {
            $alert = "Llena todos los campos";
        }
        if (isset($alert)) {
            return view('auth.login', ['alert' => $alert]);
        }
        
        if ($request->email != null and $request->password != null) {
            $findEmail = User::where('email', $request->email)->first();

            // si existe en la base de datos el correo 
            if ($findEmail) {
                $user = User::where('email', $request->email)->where('password', $request->password)->first();

                // verificamos el password y email (entra y son correctos esos datos)
                if ($user->id !=3) {
                    
                    // logueamos al usuario
                    auth()->login($user);
                    return redirect()->route('CursoAprobado.show', [$user->id]);

                } 
                
                if($user->id==3)
                return redirect()->route('cursos.index', [$user->id]);
                
                else {
                    $user = User::where('email', $request->email)->first();
                    $alert = $user->name. " tu contraseña es incorrecta";
                    return view('auth.login', ['alert' => $alert]);
                }
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // un request laravel trae toda la info del formulario
    public function store(StoreUserRequest $request)
    {
        // verificamos que los campos esten llenos
        if ($request->email === NULL || $request->email==='') {
            $alert = "Llena el campo de email";
            
            return redirect()->route('crear_cuenta_alert', ['alert'=> $alert]);
        }
        if ($request->password_1 === NULL or $request->password_2 === NULL
        || $request->password_1 === '' or $request->password_2 === '') {
            $alert = "Llena los campos de contraseña";
            return redirect()->route('crear_cuenta_alert', ['alert'=> $alert]);
        }
        
        // Si el user existe en la base de datos, no entra al if a crear el mismo user
        $findUser = User::where('email', $request->email)->first();
        $pedirPassword = 'FALSE';
        $alert = "Llena todos los campos";
        
        if (!$findUser) {
            
            if ($request->password_1 != $request->password_2) {
                $alert = "Las contraseñas no son iguales";
                return redirect()->route('crear_cuenta_alert', ['alert'=> $alert]);
            }
            
            $user=new User();
            $user->email=$request->email;
            $user->password=$request->password_1;
            
            $user->email_verified_at=$request->email_verified_at;
            $user->remember_token=$request->_token;
            $user->current_team_id=$request->current_team_id;
            $user->profile_photo_path=$request->profile_photo_path;
            $user->id_roles=$request->id_roles;
            
            if($user->save()){
                
                // logueamos al usuario validado
                auth()->login($user);
                
                // redireccionamos a actualizar datos
                return redirect()->route('alert_actualizar_datos', ['pedirPassword'=> $pedirPassword, 'alert' => $alert]);
            }
            
        }
        return redirect()->route('alert_actualizar_datos', ['pedirPassword'=> $pedirPassword, 'alert' => $alert]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
        $user=User::findf0rFail($id);
        return new UserResource($user);
        // return view('auth/', ($user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "Estas en edit";
        $user=User::findOrFail($id);
        return view('auth/actualizacion_datos',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pass_user = User::where('id', $id)->first();

        if ($pass_user->password != NULL) {
            $pedirPassword = 'FALSE';
        } else {
            $pedirPassword = 'TRUE';
        }

        // verificamos que todos los campos se han direfentes de NULL
        if ($request->name == NULL or $request->apellido == NULL or $request->cedula == NULL or $request->telefono == NULL or $request->genero == NULL) {
            $alert = "Llena todos los campos";
            return redirect()->route('alert_actualizar_datos', ['pedirPassword'=> $pedirPassword, 'alert' => $alert]);
            
        }

        if ($request->password_1 or $request->password_2) {
            // verificamos que los campos de contraseña no esten vacios
            if ($request->password_1 == NULL or $request->password_2 == NULL) {
                $alert = "Llena los campos de contraseña"; 
                return redirect()->route('alert_actualizar_datos', ['pedirPassword'=> $pedirPassword, 'alert' => $alert]);
            }
        
        }

        // verificamos si el número de cédula que ingresa el usuario ya esta registrado
        $findUser = User::where('cedula', $request->cedula)->first();
        if ($findUser) {
            $alert = "Número de cedula ya registrado"; 
            return redirect()->route('alert_actualizar_datos', ['pedirPassword'=> $pedirPassword, 'alert' => $alert]);
        }

        // verificamos si estamos pidiendo contraseña
        if (isset($request->password_1)) {
            if (isset($request->password_2)) {

                // verificamos si las contraseña son iguales
                if ($request->password_1 != $request->password_2) {
                    return redirect('actualizacion_datos');
                }
            }
        }

        $findUser = User::where('email', $request->email)->first();
        if (!$findUser) {
            $user = User::findOrFail($id);
            $user->name=$request->input('name');
            $user->apellido=$request->input('apellido');
            $user->telefono=$request->input('telefono');
            $user->cedula=$request->input('cedula');
            $user->genero=$request->input('genero');
            if (isset($request->password_1)) {
                $user->password=$request->input('password_1');
            }
            $user->remember_token=$request->_token;
            
            if ($user->save()) {
                return redirect()->route('certificadosAprobados', $user->id);
            }
        }
        
        return redirect('actualizacion_datos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->delete()){
            return new UserResource($user);
        }
    }

    // mas metodos aprate de los que se crean por default
    // metodo para cerrar sessión
    public function logoutUser(Request $request) {

        // ingresa a la session y genera una nueva
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // borra datos dek usuario logueado
        auth()->logout();
        return redirect('login');
    }

    // metodo para cerrar sesión a los usuarios de redes sociales
    public function logoutUserSocialNetwork ()
    {
        return redirect('login');
    }

    // muestra los cuersos aprobados del usuario
    public function cursosAprobados ($id)
    {
        return redirect()->route('CursoAprobado.show', [$id]);
    }

    public function actualizar_datos ($pedirPassword, $alert)
    {
        return view('auth/actualizacion_datos', ['pedirPassword'=> $pedirPassword, 'alert' => $alert]);
    }

    public function crear_cuenta_alert ($alert) 
    {
        return view('auth/crear_cuenta', ['alert' => $alert]);
    }
}
