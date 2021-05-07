@extends('cursos.layout')

@section('tittle', 'Subir certificado')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />

    <div class=" sm:pt-44 pt-p4 mb-m8 sm:mb-m8 lg:mb-m5">
        <div class="px-1 pb-p6">
            <div class=" bg-white pb-28 px-2 sm:px-28 md:px-40 lg:px-52 xl:px-80 2xl:px-96 mx-1 lg:mx-10 2xl:mx-28">
                
                <!-- TITULO -->
                <div class=" text-center py-24">
                    <h1 class="font-bold text-green-100 break-normal text-3xl md:text-5xl">Subir Certificados</h1>
                </div>
                
                <!-- CONTENIDO -->
                @if (isset($alert))
                <div class="mb-20 text-center">
                    <strong class="text-center my-5 px-6 py-3 text-sm bg-red-600 w-full text-white">
                        {{$alert}}
                    </strong>
                </div>
                @endif

                @error('file')
                    <div class="mb-20 text-center">
                        <strong class="text-center my-5 px-6 py-3 text-sm bg-red-600 w-full text-white">
                            {{$message}}
                        </strong>
                    </div>
                @enderror
                
                <style type="text/css">
                        
                    #header {
                        width:500px;
                    }
                    
                    ul, ol {
                        list-style:none;
                    }
                    
                    .nav > li {
                        float:left;
                    }
                    
                    .nav li a {
                        background-color:#000;
                        color:#fff;
                        text-decoration:none;
                        padding:10px 12px;
                        display:block;
                    }
                    
                    .nav li a:hover {
                        background-color:#434343;
                    }
                    
                    .nav li ul {
                        display:none;
                        position:absolute;
                        min-width:140px;
                    }
                    
                    .nav li:hover > ul {
                        display:block;
                    }
                    
                    .nav li ul li {
                        position:relative;
                    }
                    
                    .nav li ul li ul {
                        right:-140px;
                        top:0px;
                    }
                    
                </style>

                {{-- <form action="{{ route('subirCertificados') }}" method="POST" enctype="multipart/form-data" class=" block"> --}}
                <form action="{{ route('subirCertificados') }}" 
                method="POST" 
                enctype="multipart/form-data" 
                class=" block">
                    @csrf
                    <div class="grid grid-cols-1 grid-rows-2">

                        <div class="flex w-full">
                            <label class="font-sans w-full tracking-wide text-black text-sm" for="nombre" >
                                Nombre Curso
                                @if (!isset($curso_elegido))                  
                                <input type="text" 
                                    class="mt-3 mb-4 lg:w-96 block border border-gray-500 hover:border-black rounded text-sm text-blue-800" 
                                    name="nombre"
                                    readonly
                                    placeholder="Escoge un curso de la caja negra">
                                @endif
                                @if (isset($curso_elegido))
                                <div class="text-right"></div>
                                    <input type="text" 
                                        class="mt-3 mb-4 lg:w-96 block border border-gray-500 hover:border-black rounded text-sm text-blue-800" 
                                        name="nombre"
                                        readonly
                                        value="{{$curso_elegido->nombre}}"
                                        placeholder="Programacion New">
                                @endif
                            </label>
                        </div>

                        <div class="mx-auto my-auto ">
                            <div class="">
                                <ul class="nav -mt-12">
                                    <li><div class="w-50 text-sm py-p0_7 px-20 font-sans ml-2 text-white bg-black">Cursos</div>
                                        <ul class=" m-auto">

                                            <!-- Imprimimos todos los cursos -->
                                            @if (isset($cursos))
                                                @foreach($cursos as $curso)
                                                    <div class="w-52">
                                                        <a href="{{ route('elegirCursoSubirCertificado', $curso->id) }}" class="ml-2 px-3 font-sans text-black">{{$curso->nombre}}</a>
                                                    </div>    
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                </ul>
                            </div>    
                        </div>
                        <div class="col-span-2 h-40">
                            <label class="font-san text-black text-sm text-center" for="imagen">
                                Subir Imagenes
                                <div>
                                    {{-- <input type="file" id="imagenes[]" name="imagenes[]"  multiple="" accept="image/*" class=" focus:outline-none mt-3 blockw-full p-3 rounded mb-4 text-gray-500 hover:text-black"/> --}}
                                    <input type="file" id="imagenes[]"  name="imagenes[]" multiple="" accept="image/*" class=" focus:outline-none blockw-full p-10 rounded text-gray-500 hover:text-black bg-white hover:bg-blue-300 transition duration-500 ease-in-out"/>
                                </div>
                            </label>
                        </div>

                    </div>
                    
                    <div class="m-auto text-center col-span-2 my-5">
                        <input type="submit"  type="Guardar" value="Ingresar" readonly class="py-2 w-w1_2 outline-none text-sm text-center text-white px-10 transition duration-500 ease-in-out bg-gray-500 hover:bg-blue-500 transform hover:scale-105">
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        //Inicializamos variables a 0.
        var contArchivos = 1;
        
        function anadirArchivo() { 
                //Sumamos a la variable el número de archivos.
                contArchivos=contArchivos+1;
                
                //Agregamos el componente de tipo input
                var div = document.createElement("div");
                var input = document.createElement("input");
                var a = document.createElement("a");
                
                //Añadimos los atributos de div
                div.id ='archivo'+contArchivos;
                
                //Añadimos los atributos de input
                input.type = 'file';
                input.name = 'miarchivo[]';
                
                //Añadimos los atributos del enlace a eliminar
                a.href = "#";
                a.id = 'archivo'+contArchivos;
                a.onclick = function() {
                    borrarArchivo(a.id);
                }
                a.text ="X Eliminar archivo";
                
                //Agreamos el input y enlace en el div
                document.getElementById("archivos").appendChild(div);    
                document.getElementById(a.id).appendChild(input);          
                document.getElementById(a.id).appendChild(a);    
        }
        
        function borrarArchivo(id){
            //Restamos el número de archivos
            contArchivos=contArchivos-1;
            
            var archivo = document.getElementById(id);    
            // Si existe el campo a eliminar...
            if (archivo){
                divPadre = archivo.parentNode;
                divPadre.removeChild(archivo);
            }
        }
    </script>
@endsection
