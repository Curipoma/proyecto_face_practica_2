<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\Request;
use App\Http\Resources\EncuestaResource;
use App\Models\Certificado;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar
        //all trae todos los registros

        $encuesta=Encuesta::all();
        return view('formulario');
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
        //Crear

        $encuesta=new Encuesta();
        $encuesta->link=$request->link;
        $encuesta->encuesta_Realizada=$request->encuesta_Realizada;
        if($encuesta->save()){
            return new EncuestaResource($encuesta);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Editar
        //Capturar datos del registro que quiero editar 

        $encuesta=Encuesta::findOrFail($id);
        return new EncuestaResource($encuesta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Editar raro
        //Capturar datos del registro que quiero editar 

        $encuesta=Encuesta::find($id);
        return $encuesta;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //Recien me hace el cambio

        $encuesta=Encuesta::findOrFail($id);
        $encuesta->link=$request->link;
        $encuesta->encuesta_Realizada=$request->encuesta_Realizada;
        if($encuesta->save()){
            return new EncuestaResource($encuesta);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encuesta  $encuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Elimina
        $encuesta=Encuesta::findOrFail($id); 
        if($encuesta->delete()){
            return new EncuestaResource($encuesta);
        }


    }


    // verifico si le muestro la encuesta o no
    public function verificar_encuesta ($id)
    {
        return redirect()->route('encuesta');
    }

    // Descarga certifiicado
    public function descargar_certificado ($id)
    {
        $certificado = Certificado::where('id', $id)->first();
        return "Descargando certificado";
    }
}
