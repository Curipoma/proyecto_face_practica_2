
@extends('layouts.app')
@section('title', 'Mas cursos')

@section('content')

<!-- Contendor del contenido -->
<div class="sm:pt-48 pt-40 mb-m8 sm:mb-m8 lg:mb-m5">
    <div class="px-1 pb-p6">
        <!-- Imprimimos datos del usuario ( nombre y num.cedula ) -->
        <div class="px-0 pb-32 sm:px-5 md:px-10 lg:px-20 xl:px-40 2xl:px-80 lg:items-center bg-white m-auto mx-1 md:mx-14">
            <div class="bg-white border-b-2 shadow-xl p-0">

                <!--======= Inicio header =========-->
                <div class=" py-16 px-4 sm:px-6 lg:items-center">
                    <h1 class="text-3xl font-bold text-green-100 text-center">Mas cursos para ti</h1>
                </div>
                <!--======= Fin header=========-->

            @auth
                    <div class="rounded">
                        <table class="min-w-full divide-y divide-gray-200 border border-grey-100">
                            <thead class="text-left text-gray-700 bg-grey-100 border-collapse border border-grey-200">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased">CURSO</th>
                                    <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased">FECHA DE INICIO</th>
                                    <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased">INFORMACION</th>
                                </tr>
                            </thead>
                            <tbody class="border-collapse border border-grey-100">
            
                                <!-- Imprimimos todos los cursos -->
                                @if (isset($cursosNuevo))
                                    @foreach($cursosNuevo as $nuevo)
                                        <tr class="border-collapse border border-grey-200">

                                            <td class="px-6 py-2 text-left m-auto">
                                            
                                                <div class="sm:flex block text-left">
                                                    <img class="sm:m-0 m-auto h-10 w-10 rounded-full" src="https://image.flaticon.com/icons/png/512/1567/1567341.png" alt="icono del curso">
                                                    <p class="text-base text-center font-sans antialiased mr-2 px-5 leading-loose text-gray-900 border-t-0 border-l-0 border-r-0">{{$nuevo->nombre}}</p>
                                                </div>
                                            
                                            </td>
                                            <td class="px-6 py-2 text-left">
                                                <span class="text-base text-center font-sans antialiased leading-none mr-2 px-4 py-2 inline-flex rounded bg-green-100 text-white">{{$nuevo->horas}}</span>
                                            </td>
                                            <td class="px-6 py-2 text-left">
                                                <button href="#" class="transition duration-500 ease-in-out bg-gray-500 hover:bg-yellow-500 focus:outline-none text-white text-base text-center font-sans antialiased py-1 px-4 rounded-full">VER</button>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                @endif
                                <!-- mas tablas tr -->
                            </tbody>
                        </table>
                    </div>
                    <div class="py-5  px-10">
                        {!! $cursosNuevo->links() !!}
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>

@endsection
