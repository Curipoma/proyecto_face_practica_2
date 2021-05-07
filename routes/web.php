<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ActualizarDatosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoAprobadoController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\MasCursosController;
use App\Http\Controllers\CursoNuevoController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\DetalleUserCertificadoController;

// ============ COMIENZA ============
// ============ TERMINA ============

// Route::get('dashboard', function () {
//     return view('dashboard');
// });






// ============ COMIENZA VER VISTA LOGIN ============
Route::get('/', function () {
    return view('auth/login');
});

Route::get('/login', function () {
    return view('auth/login');
})->name('login');
// ============ TERMINA VER VISTA LOGIN ============





// ============ COMIENZA CRUD DE USUARIO ============
// crud de usuario
Route::resource('user', UserController::class);

Route::get('alert_actualizar_datos/{pedirPassword}/{alert}', [UserController::class, 'actualizar_datos'])->name('alert_actualizar_datos');
Route::get('crear_cuenta_alert/{alert}', [UserController::class, 'crear_cuenta_alert'])->name('crear_cuenta_alert');

// verifica al usuario al hacer login
Route::get('checkUser', [UserController::class, 'create'])->name('checkUser');

// muestra todos los cursos al usuario 
Route::get('masCursos', [MasCursosController::class, 'index'])->name('masCursos');

// cierra sesión
Route::get('logout', [UserController::class, 'logoutUser'])->name('logout');

// cierra sesión al usuario de red social
Route::get('/login/{driver}/logout', [UserController::class, 'logoutUserSocialNetwork'])->name('/login/{driver}/logout');
// ============ TERMINA CRUD DE USUARIO ============





// ============ COMIENZA certificados Aprobados USUARIO ============
// !!!!!  muestra certificados Aprobados aprobados segun el usuario
Route::resource('CursoAprobado', CursoAprobadoController::class);

Route::get('certificadosAprobados/{id}', [CertificadoController::class, 'show'])->name('certificadosAprobados');
Route::get('mostrarCertificadosAprobados/{id}', [CertificadoController::class, 'mostrarCertificadosAprobados'])->name('mostrarCertificadosAprobados');
// ============ TERMINA certificados Aprobados USUARIO ============





// ============ COMIENZA ENCUESTA ============
// vista encuesta
Route::get('/encuesta', function () {
    return view('auth/encuesta');
})->name('encuesta');

Route::get('/verificar_encuesta/{id}', [EncuestaController::class, 'verificar_encuesta'])->name('verificar_encuesta');
Route::get('/descargar_certificado/{id}', [EncuestaController::class, 'descargar_certificado'])->name('descargar_certificado');
// ============ TERMINA ENCUESTA ============





// ============ COMIENZA USUARIO DE REDES SOCIALES ============
// redirige al usuario ya existente a cursos recibidos
Route::get('login/{driver}', [SocialController::class, 'facebookRedirect']);

// crea usuario de redes sociales
Route::get('login/{driver}/callback', [SocialController::class, 'loginWithFacebook']);
// ============ TERMINA UARIO DE REDES SOCIALES ============





// ============ COMIENZA DEVOLUCION DE VISTAS ============
Route::get('perfil', function () {
    return view('profile/show');
})->name('perfil');

Route::get('actualizacion_datos', function () {
    return view('auth/actualizacion_datos');
});

Route::get('crear_cuenta', function () {
    return view('auth/crear_cuenta');
});

Route::get('cursos_recibidos', function () {
    return view('auth/cursos_recibidos');
})->name('cursos_recibidos');

Route::get('formulario', function () {
    return view('auth/formulario');
});

Route::get('mas_cursos', function () {
    return view('auth/mas_cursos');
});

Route::get('nuevos_cursos', function () {
    return view('auth/nuevos_cursos');
})->name('nuevos_cursos');

Route::get('crear_cursos_aprobados', function () {
    return view('cursos/crear_cursos_aprobados');
});
Route::get('subir_certificados', function () {
    return view('cursos/subir_certificados');
})->name('subir_certificados');
// ============ TERMINA DEVOLUCION DE VISTAS  ============














// ============ ACOMIENZA DMIN ============

// ============ COMIENZA CRUD DE USUARIO ============
// Subir certificados
Route::post('subirCertificados',[CertificadoController::class, 'store'])->name('subirCertificados');

// vista subir certificados
Route::get('formarCertificados',[CertificadoController::class, 'mostrarCursosCertifcados'])->name('formarCertificados');
Route::get('elegirCursoSubirCertificado/{id}',[CertificadoController::class, 'elegirCursoSubirCertificado'])->name('elegirCursoSubirCertificado');

// !
Route::get('descargarCertificado/{id}', [CertificadoController::class , 'download'])->name('descargarCertificado');

Route::resource('certificado', CertificadoController::class);

Route::get('ver_certificado/{imagenCertificado}', function () {
    return view('cursos/ver_certificado');    
})->name('ver_certificado');

// Verificar numero de cedula del usuario
Route::get('buscarCedula', [CursoAprobadoController::class, 'buscarCedula'])->name('buscarCedula');

// ! 
// Buscamos el curso que le vamos a otorgar
Route::get('buscar_curso_a_aprobar/{id}', [CursoAprobadoController::class, 'buscar_curso_a_aprobar'])->name('buscar_curso_a_aprobar');

// crea el curso aprobado
Route::get('crear_curso_Aprobado', [CursoAprobadoController::class, 'store'])->name('crear_curso_Aprobado');

// llenamos la tabla detalle de curso aprobado
Route::get('detall_crear_curso_Aprobado', [DetalleUserCertificadoController::class, 'store'])->name('detall_crear_curso_Aprobado');
// ============ TERMINA CRUD DE USUARIO ============






// ============ COMIENZA CRUD CURSOS ADMINISTRADOR ============
Route::get('curso__nuevos__destroy/{id}',[CursoNuevoController::class, 'destroy'])->name('curso__nuevos__destroy');
Route::resource('cursos', CursoNuevoController::class);
// ============ TERMINA CRUD CURSOS ADMINISTRADOR ============

// ============ TERMINA DMIN ============
