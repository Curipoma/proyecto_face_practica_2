<?php
 
namespace App\Http\Controllers;

use App\Models\Certificado;
use App\Models\User;
use App\Models\Curso_Nuevo;
use Illuminate\Http\Request;
use App\Http\Resources\CertificadoResource;
use Illuminate\Support\Facades\Storage;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
      *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos=Curso_Nuevo::all();
        $alert = "Certificados subidos satisfactoriamente!";
        return view('cursos/subir_certificados', ['alert' => $alert, 'cursos' => $cursos]);
        // $certificado=Certificado::all();
        // return $certificado;
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

        // dd($request->imagenes[0]->getClientOriginalName());

        if ($request->nombre == NULL or $request->imagenes == NULL) {
            $alert = "Lena todos los campos para subir los certificaddos";

            $cursos=Curso_Nuevo::all();
            $certificado = Certificado::all();
            return view('cursos/subir_certificados', ['cursos' => $cursos, 'certificado' => $certificado, 'alert' => $alert]);
        }

        if (isset($request->imagen)) {
            return redirect()->route('subir_certificados');

        } else {
            function guardarimagenCertificado ($image, $nombre_archivo, $nombre_cedula_, $request) {

                $certificado=new Certificado();
                $certificado->nombre = $request->nombre;
                // Horario de 24 horas sin ceros, de 0 a 23
                $hora = date("G");
                // minutos con ceros iniciales
                $min = date("i");
                // segundos con ceros iniciales
                $seg = date("s");







                
                
                $num = rand(1,100);
                $num = strval($num);

                $hora_subido_certificado =  strval($hora) . strval($min) . strval($seg); 
                
                $nombre_cedula_ = strval($nombre_cedula_);
                $nombre_en_carpte = $nombre_cedula_ . $num . ".jpg";
                
                $nombre_completo_archivo = $nombre_cedula_ . $hora_subido_certificado . $num . ".jpg";
                
                $img = $image->storeAs('public/certificados', $nombre_completo_archivo);
                $url = Storage::url($img);
                $certificado->nombre_archivo = $nombre_completo_archivo;
                $certificado->imagen = $url;
                $certificado->save();
                
                // $certificado=new Certificado();
                // $certificado->nombre=$request->nombre;
                // $img = $image->store('public/certificados');
                // $url = Storage::url($img);
                // $certificado->imagen = $url;
                
                // $certificado->save();
            }








            
            foreach ($request->imagenes as $image) {
                $nombre = $image->getClientOriginalName();
                
                $solo_nombre = [];
                // traemos solo el número de cédula
                for ($i = 0; $i < 10; $i++) {
                    array_push($solo_nombre, $nombre[$i]);
                }
                
                $nombre_cedula_ = "";
                // creamos el número de cédula que acompañará al nombre completo
                for ($i = 0; $i < 10; $i++) {
                    // array_push($nombre_cedula_, $nombre[$i]);
                    $nombre_cedula_ = $nombre_cedula_ . $solo_nombre[$i];
                }
        
                $nombre_archivo = $image->getClientOriginalName();
                guardarimagenCertificado($image, $nombre_archivo, $nombre_cedula_, $request);
            }
            return redirect()->route('certificado.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('mostrarCertificadosAprobados', $id);
        // $certificados = Certificado::where()->first();

       


        // $certificado=Certificado::findOrFail($id);
        // return new CertificadoResource($certificado);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificado=Certificado::find($id);
        return $certificado;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $certificado=Certificado::findOrFail($id);
        $certificado->nombre=$request->nombre;
        $certificado->fecha=$request->fecha;
        $certificado->imagen=$request->imagen;
        if($certificado->save()){
            return new CertificadoResource($certificado);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificado=Certificado::findOrFail($id);
        if($certificado->delete()){
            return new CertificadoResource($certificado);
        }
    }

    // Descargar certificado
    public function download($id)
    {

        $certificado_usuario = Certificado::where('id', $id)->first();
        $pathToFile = storage_path("certificados/" . $certificado_usuario->nombre_archivo);
  
        $url = "C:/xampp/htdocs/certificadosTest/public/storage/certificados/$certificado_usuario->nombre_archivo";

        return response()->download($url);

     }

    // Mostrtar todos los cursos para subir el certificado
    public function mostrarCursosCertifcados() 
    {
        $cursos=Curso_Nuevo::all();
        $certificado = Certificado::all();
        return view('cursos/subir_certificados', ['cursos' => $cursos, 'certificado' => $certificado]);
    }

    // Mostrar nombre de curso para subir la imagen del certificado
    public function elegirCursoSubirCertificado ($id) 
    {
        $cursos=Curso_Nuevo::all();

        $curso_elegido = Curso_Nuevo::where('id', $id)->first();
        return view('cursos/subir_certificados', ['curso_elegido' => $curso_elegido, 'cursos' => $cursos]);
    }


    // mustra Certificados Aprobados según el usuario
    public function mostrarCertificadosAprobados ($id)
    {

        $user = User::where('id', $id)->first();
        $certificados = Certificado::all();

        return view('auth.cursos_recibidos', ['certificados' => $certificados]);

    }
}
