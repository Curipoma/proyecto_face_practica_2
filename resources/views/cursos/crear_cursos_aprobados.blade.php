@extends('cursos.layout')

@section('title', 'Crear curso aprobado')

@section('content')

    <div class=" sm:pt-44 pt-p4 mb-m8 sm:mb-m8 lg:mb-m5">
        <div class="px-1 pb-p6">
            <div class=" bg-white pb-16 mx-0 lg:mx-10 2xl:mx-28">

                <div class="container lg:px-40 xl:px-72">

                    <!--======= Inicio header =========-->
                    <div class=" pt-28 pb-16 px-4 sm:px-6 lg:items-center ">
                        <h1 class="text-4xl font-bold text-green-100 text-center">Cursos aprobados</h1>
                    </div>
                    <!--======= Fin header=========-->

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
                    
                    <form action="{{ route('buscarCedula') }}" method="PUT">
                        @csrf
                        @if (isset($certificados))
                        
                            <div class=" px-5 block lg:grid grid-cols-4">
                                
                                <div class=" lg:p-10 xl:px-16 col-span-3 grid grid-cols-1 grid-rows-2">

                                    @if (isset($user))
                                        <div class=" hidden">
                                            <input id="user" name="user" value="{{ $user->id }}" readonly>
                                        </div>
                                    @endif

                                    @if (isset($certificado_elegido))
                                        <label for="certificado">certificado
                                            <input type="text" id="certificado" value="{{ $certificado_elegido->nombre }}" name="certificado" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform">
                                        </label>
                                    @endif
                                    @if (!isset($certificado_elegido))
                                        <label for="certificado">certificado
                                            <input type="text" id="certificado" placeholder="Escoge certificado desde la caja negra" name="certificado" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform">
                                        </label>
                                    @endif

                                    @if (isset($cursoElegido))
                                        <label for="curso">curso
                                            <input type="text" id="curso" value="{{ $cursoElegido->información }}" name="curso" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform">
                                        </label>
                                    @endif
                                    @if (!isset($cursoElegido))
                                        <label for="curso">curso
                                            <input type="text" id="curso" name="curso" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform">
                                        </label>
                                    @endif
                                    
                                </div>

                                <div class="mx-auto my-auto ">
                                    <div class="">
                                        <ul class="nav mt-4">
                                            <li><div class="w-50 text-sm py-p_10 px-14 font-sans ml-2 text-white bg-black">certificados</div>
                                                <ul class=" m-auto">
                                                    <!-- Imprimimos todos los certificados -->
                                                    @if (isset($certificados))
                                                        @foreach($certificados as $certificado)
                                                            <div class="w-52 bg-black">
                                                                @if (isset($user))
                                                                <a href="{{ route('buscarCedula', ['certificado_elegido' => $certificado, 'user' => $user->id]) }}" class="font-sans ml-2 px-3 text-white bg-black">{{$certificado->nombre}}</a>
                                                                @endif
                                                                @if (!isset($user))
                                                                <a href="{{ route('buscarCedula', ['certificado_elegido' => $certificado]) }}" class="font-sans ml-2 px-3 text-white bg-black">{{$certificado->nombre}}</a>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>    
                                </div>
                                
                            </div>
                            
                            <div class=" text-center">
                                <input id="submit" type="submit" value="Crear" class="py-2 w-w1_2 outline-none text-sm text-white px-10 transition duration-500 ease-in-out bg-gray-500 hover:bg-blue-500 transform hover:scale-105">
                            </div>

                        
                        @endif
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <script>

        function escribirNombre (name) {

            // var nameCurso = document.getElementById('nameCurso');
    
            nameCurso.addEventListener('click', function () {
                // var nameCurso = document.getElementById('nameCurso').value;
                document.getElementById('name').value = name;
            });
        } 

    </script>

@endsection
