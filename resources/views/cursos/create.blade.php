@extends('cursos.layout')

@section('title', 'Crear Cuenta')

@section('content')

    <div class=" sm:pt-44 pt-p4 mb-m8 sm:mb-m8 lg:mb-m5">
        <div class="px-1 pb-p6">
            <div class=" bg-white py-10 px-2 sm:px-28 mx-0 lg:mx-10 2xl:mx-28">

                <!--======= Inicio header =========-->
                <div class="">
                    <h1 class="text-4xl font-bold text-green-100 text-center">Curso</h1>
                </div>
                <!--======= Fin header=========-->

                <!-- CONTENIDO -->
                <div class="">
                    <div class=" text-left">
                        <h2>CREAR NUEVO CURSO</h2>
                    </div>
                    <div class=" text-right">
                        <a href="{{ route('cursos.index') }}" class="transition duration-500 ease-in-out bg-blue-500 hover:bg-blue-600 py-2 px-5 hover:text-white text-gray-100 rounded hover:no-underline focus:no-underline"> SALIR</a>
                    </div>
                </div>

                @if (isset($alert))
                <div class="bg-red-500 py-3 w-64 text-center m-auto">
                    {{ $alert }}
                </div>
                @endif
                
                @if ($errors->any())
                    <div class="">
                        <strong>¡Ups!</strong> Hubo algunos problemas con su entrada.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('cursos.store') }}" method="POST">
                    @csrf

                    <div class="block lg:flex w-full">
                    
                            <div class=" w-full lg:mx-2">
                                <label class="font-sans ml-2 tracking-wide text-black w-50 text-sm transition duration-300 ease-in-out transform">Nombre del curso:</label>
                                <input type="text" name="nombre" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-red-500 transition duration-300 ease-in-out transform" placeholder="Nombre">
                            </div>
                       
                            <div class=" w-full lg:mx-2">
                                <label class="font-sans ml-2 tracking-wide text-black w-50 text-sm transition duration-300 ease-in-out transform">Duración del curso:</label>
                                <input type="text" name="horas" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-red-500 transition duration-300 ease-in-out transform" placeholder="Duracion">
                            </div>
                      
                        </div>

                        <div class=" w-full lg:mx-2">
                            <label class="font-sans ml-2 tracking-wide text-black w-50 text-sm transition duration-300 ease-in-out transform">Información del curso:</label>
                            <textarea class="mt-3 mb-4 h-20 block border border-gray-500 hover:border-black w-full rounded text-sm text-red-500 transition duration-300 ease-in-out transform" name="información" placeholder="Información"></textarea>
                        </div>
                        
                    <div class=" text-center">
                            <button type="submit" class="transition duration-500 ease-in-out bg-blue-500 hover:bg-blue-600 focus:outline-none py-2 px-5 hover:text-white text-gray-100 rounded hover:no-underline focus:no-underline">GUARDAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection