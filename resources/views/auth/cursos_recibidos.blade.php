@extends('layouts.app')
@section('title', 'Cursos recibidos')

@section('content')

<!-- Contendor del contenido -->
<div class="sm:pt-48 pt-40 mb-m8 sm:mb-m8 lg:mb-m5">
    <div class="px-1 pb-p6">
        <!-- Imprimimos datos del usuario ( nombre y num.cedula ) -->
        <div class="px-0 pb-32 sm:px-5 md:px-10 lg:px-20 xl:px-40 2xl:px-80 lg:items-center bg-white m-auto mx-1 md:mx-14">
            <div class="bg-white border-b-2 shadow-xl p-0">

            <!--======= Inicio header =========-->
            <div class=" pt-16 px-4 sm:px-6 lg:items-center ">
                <h1 class="text-3xl font-bold text-green-100 text-center">Certificados</h1>
            </div>
            <!--======= Fin header=========-->

            @auth
                <!-- Imprimimos datos del usuario ( nombre y num.cedula ) -->
                <div class=" py-10 px-4 sm:px-10 lg:items-center">

                    <div class="sm:flex block justify-end mb-5">
                        <h3 class="text-base font-sans antialiased leading-none mr-2">Nombre del usuario :</h3>
                        <p class="text-base leading-none">{{ auth()->user()->name }}</p>
                    </div>
               
                    <div class="sm:flex block justify-end">
                        <h3 class="text-base font-sans antialiased leading-none mr-2">Número de Cedula :</h3>
                        <p class="text-base leading-none">{{ auth()->user()->cedula }}</p>
                    </div>
                </div>

                <!-- Imprimimos cursos aprobados del usuario -->
                @if (isset($certificados))
                    <table class="min-w-full divide-y divide-gray-200 border border-grey-100">
                        <thead class="text-left text-gray-700 bg-grey-100 border-collapse border border-grey-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased">Cursos</th>
                                <th scope="col" class="px-6 py-3 text-left text-base font-sans antialiased">Descargar</th>
                            </tr>
                        </thead>
                        <tbody class="border-collapse border border-grey-100">
        
                            <!-- Imprimimos todos los cursos -->
                            @if (isset($certificados))
                                @foreach($certificados as $certificado)
                                    <tr class="border-collapse border border-grey-200">

                                        <td class="px-6 py-3 text-left m-auto">
                                            {{$certificado->nombre}}
                                        </td>

                                        <td class="px-6 py-3 text-left">

                                            <a href="{{ route('descargarCertificado', $certificado->id) }}">Descargar Certificado
                                                <img src="http://localhost/certificadosTest/public/{{$certificado->imagen}}" alt="certificado" class="h-10">
                                            </a>

                                        </td>
                                        
                                    </tr>
                                @endforeach
                            @endif
                            <!-- mas tablas tr -->
                        </tbody>
                    </table>

                    <div class="py-5 px-10">
                        {{-- {!! $cursosAprobado->links() !!} --}}
                    </div>

                @endif
            @endauth
        </div>
    </div>
</div>

@endsection


