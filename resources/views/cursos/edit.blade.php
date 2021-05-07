@extends('cursos.layout')

@section('title', 'Editar Curso')

@section('content')

    <div class=" sm:pt-44 pt-p4 mb-m8 sm:mb-m8 lg:mb-m5">
        <div class="px-1 pb-p6">
            <div class=" bg-white pb-16 mx-0 lg:mx-10 2xl:mx-28">

                <div class="container lg:px-40 xl:px-72">

                    <!--======= Inicio header =========-->
                    <div class=" pt-28 pb-16 px-4 sm:px-6 lg:items-center ">
                        <h1 class="text-4xl font-bold text-green-100 text-center">Editar Curso</h1>
                    </div>
                    <!--======= Fin header=========-->


                    <!-- CONTENIDO -->
                    <div class=" text-right">
                        <a href="{{ route('cursos.index') }}" class="transition duration-500 ease-in-out bg-blue-600 hover:bg-blue-700 py-2 px-5 w-w2 hover:text-white text-gray-100 rounded hover:no-underline focus:no-underline"> SALIR</a>
                    </div>
                    
                    @if ($errors->any())
                        <div class=" bg-red-500">
                            <strong>¡Ups!</strong> Hubo algunos problemas con su entrada.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('cursos.update',$curso_Nuevo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    
                        <div class="">
                            <label for="nombre" class="font-sans ml-2 tracking-wide text-black text-sm transition duration-300 ease-in-out transform">Nombre del curso:</label>
                            <input type="text" id="nombre" name="nombre" value="{{ $curso_Nuevo->nombre }}" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-red-500 transition duration-300 ease-in-out transform" placeholder="Nombre">
                        </div>
                    
                        <div class="">
                            <label for="horas" class="font-sans ml-2 tracking-wide text-black text-sm transition duration-300 ease-in-out transform">Duración del curso:</label>
                            <input type="text" id="horas" name="horas" value="{{ $curso_Nuevo->horas }}" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-red-500 transition duration-300 ease-in-out transform" placeholder="Duracion">
                        </div>
                
                        <div class="">
                            <label for="información" class="font-sans ml-2 tracking-wide text-black text-sm transition duration-300 ease-in-out transform">Información del curso:</label>
                            <textarea name="información" id="información" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-red-500 transition duration-300 ease-in-out transform" style="min-height:100px" placeholder="Información">{{ $curso_Nuevo->información }}</textarea>
                        </div>
                    
                        <div class=" text-center">
                        <button type="submit" class="transition duration-500 ease-in-out bg-blue-600 focus:outline-none hover:bg-blue-700 py-2 px-5 w-w2 hover:text-white text-gray-100 rounded hover:no-underline focus:no-underline">GUARDAR</button>
                        </div>
                    
                    
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
