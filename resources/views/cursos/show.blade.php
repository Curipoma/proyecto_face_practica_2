@extends('cursos.layout')

@section('title', 'Ver Curso')

@section('content')
    <div class=" sm:pt-44 pt-p4 mb-m8 sm:mb-m8 lg:mb-m5">
        <div class="px-1 pb-p6">
            <div class=" bg-white pb-28 px-3 sm:px-16 md:px-32 lg:px-52 xl:px-80 mx-1 lg:mx-10 2xl:mx-28">

                <!--======= Inicio header =========-->
                <div class=" pt-28 pb-16 px-4 sm:px-6 lg:items-center ">
                    <h1 class="text-4xl font-bold text-green-100 text-center">Curso</h1>
                </div>
                <!--======= Fin header=========-->

                <div class="container">

                    <div class=" text-right">
                        <a href="{{ route('cursos.index') }}" class="transition duration-500 ease-in-out bg-blue-600 hover:bg-blue-700 py-2 px-5 w-w2 hover:text-white text-gray-100 rounded hover:no-underline focus:no-underline"> SALIR</a>
                    </div>

                    <!-- CONTENIDO -->
                    <div class="w-full sm:w-w5 md:w-w6 lg:w-w6">

                        <div class="">
                            <strong class="font-sans antialiased text-md"> INFORMACION DEL CURSO</strong>
                        </div>
                        
                        <div class="ml-3 py-4 grid grid-cols-1 grid-rows-3 gap-y-1">
                            <div class=" flex">
                                <h3 class="pr-1 font-sans antialiased text-sm">Nombre del curso:</h3> 
                                <div class="font-sans antialiased text-sm">
                                    {{ $curso_Nuevo->nombre }}
                                </div>
                            </div>
    
                            <div class=" flex">
                                <h3 class="pr- font-sans antialiased text-sm">Duración del curso:</h3>
                                <div class="font-sans antialiased text-sm">
                                    {{ $curso_Nuevo->horas }}
                                </div>
                            </div>
    
                            <div class=" flex">
                                <h3 class="pr-1 font-sans antialiased text-sm">Información del curso:</h3>
                                <div class="font-sans antialiased text-sm">
                                    {{ $curso_Nuevo->información }}
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
