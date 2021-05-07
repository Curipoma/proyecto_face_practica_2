<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Http\Resources\RolResource;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols=Rol::all();
        return $rols;
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
        $rols=new Rol();
        $rols->nombre=$request->nombre;
        $rols->descripción=$request->descripción;
        if($rols->save()){
            return new RolResource($rols);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rols=Rol::findOrFail($id);
        return new RolResource($rols);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rols=Rol::find($id);
        return $rols;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rols=Rol::findOrFail($id);
        $rols->nombre=$request->nombre;
        $rols->descripción=$request->descripción;
        if($rols->save()){
            return new RolResource($rols);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rols=Rol::findOrFail($id);
        if($rols->delete()){
            return new RolResource($rols);
        }
    }
}
