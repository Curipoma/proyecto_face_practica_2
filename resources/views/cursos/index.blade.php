@extends('cursos.layout')

@section('title', 'Cursos')

@section('content')

    <div class=" sm:pt-44 pt-p4 mb-m8 sm:mb-m8 lg:mb-m5">
        <div class="px-1 pb-p6">
            <div class=" bg-white pb-28 mx-0 lg:mx-10 2xl:mx-28">


                <!--======= Inicio header =========-->
                <div class=" pt-28 pb-16 px-4 sm:px-6 lg:items-center ">
                    <h1 class="text-4xl font-bold text-green-200 text-center">Cursos</h1>
                </div>
                <!--======= Fin header=========-->

                <div class="container lg:px-40 xl:px-72">
                    
                    @if ($message = Session::get('success'))
                    <div class=" bg-green-500 py-3 w-52 text-center m-auto">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <div class=" text-right">
                        <a class="transition duration-500 ease-in-out bg-green-200 shadow-md hover:bg-green-100 py-2 px-5 hover:text-white text-gray-100 rounded hover:no-underline focus:no-underline" href="{{ route('cursos.create') }}">CREAR CURSO</a>
                    </div>
                    
                    <table class="divide-y divide-gray-200 border border-grey-100 m-auto">
                        <thead class="text-left text-gray-700 bg-grey-100 border-collapse border border-grey-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-base font-sans antialiased w-10">No</th>
                                <th class="px-6 py-3 text-left text-base font-sans antialiased ">NOMBRE</th>
                                <th class="px-6 py-3 text-left text-base font-sans antialiased ">DURACION</th>
                                <th class="px-6 py-3 text-left text-base font-sans antialiased ">INFORMACION</th>
                                <th class="px-6 py-3 text-left text-base font-sans antialiased w-w1 lg:w-w3">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cursosNuevo as $curso_Nuevo => $cursos_Nuevo)
                                <tr class="border-collapse border border-grey-200">
                                    <td class="px-6 py-2 text-left">{{ ++$i }}</td>
                                    <td class="px-6 py-2 text-left">{{ $cursos_Nuevo->nombre }}</td>
                                    <td class="px-6 py-2 text-left">{{ $cursos_Nuevo->horas }}</td>
                                    <td class="px-6 py-2 text-left">{{ $cursos_Nuevo->información }}</td>
                                    <td class="px-6 py-2 text-left flex flex-col lg:flex-row justify-around">
                                        {{-- transition duration-500 ease-in-out --}}
                                        <a href="{{ route('cursos.edit',$cursos_Nuevo->id) }}" class="transition duration-500 ease-in-out bg-yellow-500 hover:bg-yellow-600 py-1 px-5 my-auto hover:text-white text-gray-100 text-center rounded hover:no-underline focus:no-underline">Editar</a>
                                        <a href="{{ route('cursos.show',$cursos_Nuevo->id) }}" class="transition duration-500 ease-in-out bg-green-500 hover:bg-green-600 py-1 px-5 my-auto hover:text-white text-gray-100 text-center rounded hover:no-underline focus:no-underline">Ver</a>
                                        <a href="{{ route('curso__nuevos__destroy',$cursos_Nuevo->id) }}" class="transition duration-500 ease-in-out bg-red-500 hover:bg-red-600 py-1 px-5 my-auto hover:text-white text-gray-100 text-center rounded hover:no-underline focus:no-underline">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="my-5">
                        {!! $cursosNuevo->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
