<?php

namespace App\Http\Controllers;

use App\Models\Detalle_User_Certificado;
use App\Models\User;
use App\Models\Certificado;
use Illuminate\Http\Request;
use App\Http\Resources\DetalleUserCertificadoControllerResource;

class DetalleUserCertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalle=Detalle_User_Certificado::all();
        return $detalle;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->certificado != NULL and $request->curso != NULL and $request->user != NULL) {
        //     $user = User::where('id', $request->user)->first();
        //     $certificado = Certificado::where('nombre', $request->certificado)->first();
            
        //     $detalle=new Detalle_User_Certificado();
        //     $detalle->id_usuarios=$user->id;
        //     $detalle->id_certificado=$certificado->id;
        //     if($detalle->save()){
        //         return new DetalleUserCertificadoControllerResource($detalle);
        //     }
        // }
        // if ($request->curso_nombre) {
        //     return $request;
        //     $certificados = Certificado::all();
        //     $user = User::where('id', $request->user)->first();
        //     return view('cursos/crear_cursos_aprobados', ['user' => $user, 'certificados' => $certificados]);

        // }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detalle_User_Certificado  $detalle_User_Certificado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalle=Detalle_User_Certificado::findOrFail($id);
        return new DetalleUserCertificadoControllerResource($detalle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detalle_User_Certificado  $detalle_User_Certificado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $detalle=Detalle_User_Certificado::find($id);
        return new DetalleUserCertificadoControllerResource($detalle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detalle_User_Certificado  $detalle_User_Certificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detalle=Detalle_User_Certificado::findOrFail($id);
        $detalle->id_usuarios=$request->id_usuarios;
        $detalle->id_certificado=$request->id_certificado;
        if($detalle->save()){
            return new DetalleUserCertificadoControllerResource($detalle);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detalle_User_Certificado  $detalle_User_Certificado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalle=Detalle_User_Certificado::findOrFail($id);
        if($detalle->delete()){
            return new DetalleUserCertificadoControllerResource($detalle);
        }
    }
}
