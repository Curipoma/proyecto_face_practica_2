<?php

namespace App\Http\Controllers;

use App\Models\Curso_Nuevo;
use Illuminate\Http\Request;

class CursoNuevoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cursosNuevo=Curso_Nuevo::latest()->paginate(10);
        return view ('cursos.index',compact('cursosNuevo'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->nombre != NULL and $request->horas != NULL and $request->información != NULL) {
            $request->validate([
                'nombre' => 'required',
                'horas' => 'required',
                'información' => 'required',
            ]);
    
            Curso_Nuevo::create($request->all());
    
            return redirect()->route('cursos.index')
            ->with('success','Curso creado con éxito.');
        } else {
            $alert = "No llenasate todos los campso";
            return view('cursos.create', ['alert' => $alert]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso_Nuevo  $curso_Nuevo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $curso_Nuevo  = Curso_Nuevo::where('id', $id)->first();
        return view('cursos.show',compact('curso_Nuevo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso_Nuevo  $curso_Nuevo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $curso_Nuevo = Curso_Nuevo::where('id', $id)->first();
        return view('cursos.edit',compact('curso_Nuevo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso_Nuevo  $curso_Nuevo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $curso_Nuevo = Curso_Nuevo::findOrFail($id);
        $curso_Nuevo->nombre = $request->input('nombre');
        $curso_Nuevo->horas = $request->input('horas');
        $curso_Nuevo->información = $request->input('información');
        if ($curso_Nuevo->save()) {
            return view('cursos.show',compact('curso_Nuevo'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso_Nuevo  $curso_Nuevo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $curso_Nuevo = Curso_Nuevo::findOrFail($id);
        $curso_Nuevo->delete();
        
        return redirect()->route('cursos.index')
        ->with('success','Curso eliminado con éxito.');
    }
}
