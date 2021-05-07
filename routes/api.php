<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\DetalleUserCertificadoController;
use App\Http\Controllers\CursoNuevoController;
use App\Http\Controllers\CursoAprobadoController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//APIS Encuesta
Route::get('/encuestas',[EncuestaController::class, 'index']);
Route::post('/encuestas/create',[EncuestaController::class, 'store']);
Route::get('/encuestas/{id}',[EncuestaController::class, 'edit']);
Route::put('/encuestas/{id}',[EncuestaController::class, 'update']);
Route::delete('/encuestas/{id}',[EncuestaController::class, 'destroy']);

//APIS Roles
Route::get('/rols',[RolController::class, 'index']);
Route::post('/rols/create',[RolController::class, 'store']);
Route::get('/rols/{id}',[RolController::class, 'edit']);
Route::put('/rols/{id}',[RolController::class, 'update']);
Route::delete('/rols/{id}',[RolController::class, 'destroy']);

//APIS Detalle_usuarios_certificado
Route::get('/detalle__user__certificados',[DetalleUserCertificadoController::class, 'index']);
Route::post('/detalle__user__certificados/create',[DetalleUserCertificadoController::class, 'store']);
Route::get('/detalle__user__certificados/{id}',[DetalleUserCertificadoController::class, 'edit']);
Route::put('/detalle__user__certificados/{id}',[DetalleUserCertificadoController::class, 'update']);
Route::delete('/detalle__user__certificados/{id}',[DetalleUserCertificadoController::class, 'destroy']);

//APIS Cursos Nuevos
Route::get('/curso__nuevos',[CursoNuevoController::class, 'index']);
Route::post('/curso__nuevos/create',[CursoNuevoController::class, 'store']);
Route::get('/curso__nuevos/{id}',[CursoNuevoController::class, 'edit']);
Route::put('/curso__nuevos/{id}',[CursoNuevoController::class, 'update']);
Route::delete('/curso__nuevos/{id}',[CursoNuevoController::class, 'destroy']);

//APIS Cursos Aprobados
Route::get('/curso__aprobados',[CursoAprobadoController::class, 'index']);
Route::post('/curso__aprobados/create',[CursoAprobadoController::class, 'store']);
Route::get('/curso__aprobados/{id}',[CursoAprobadoController::class, 'edit']);
Route::put('/curso__aprobados/{id}',[CursoAprobadoController::class, 'update']);
Route::delete('/curso__aprobados/{id}',[CursoAprobadoController::class, 'destroy']);

//APIS Certificado
Route::get('/certificados',[CertificadoController::class, 'index']);
Route::post('/certificados/create',[CertificadoController::class, 'store']);
Route::get('/certificados/{id}',[CertificadoController::class, 'edit']);
Route::put('/certificados/{id}',[CertificadoController::class, 'update']);
Route::delete('/certificados/{id}',[CertificadoController::class, 'destroy']);

//APIS User
Route::get('/users',[UserController::class, 'index']);
Route::post('/users/create',[UserController::class, 'store']);
Route::get('/users/{id}',[UserController::class, 'edit']);
Route::put('/users/{id}',[UserController::class, 'update']);
Route::delete('/users/{id}',[UserController::class, 'destroy']);