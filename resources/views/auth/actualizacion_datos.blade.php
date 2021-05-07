@extends('layouts.app')

@section('title', 'Actualizacion de datos del usuario')

@section('content')

    <!-- Contendor del contenido -->
    <div class="sm:pt-20 pt-5 mb-m8 sm:mb-m8 lg:mb-m5">
        <div class="px-1 pb-p6">
            <!-- Imprimimos datos del usuario ( nombre y num.cedula ) -->
            <div class="p-20 mt-32 sm:px-10 xl:px-40 lg:items-center bg-white m-auto mx-1 sm:mx-4 lg:mx-6 xl:mx-20">

                <!--======= Inicio header =========-->
                <header class="">
                    <div class="py-6 px-4 sm:px-6 lg:items-center ">
                        <h1 class="text-xl uppercase text-center text-black font-sans">Actualiza tus datos</h1>
                    </div>
                </header>
                <!--======= Fin header=========-->

                <div class="container">
                    @if ($errors->all())
                        <ul class="bg-red-500 p-5 text-white my-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            
                <form action="{{ route('user.update', auth()->user()->id) }}" method="POST"
                    class="mt-16">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-x-10 grid-rows-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
                        <label class="font-sans uppercase tracking-wide text-gray-500 hover:text-black w-50 text-sm transition duration-300 ease-in-out transform">Nombres
                            <input value="{{ auth()->user()->name }}" name="name" type="text" placeholder="Lucia Mary" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform">
                        </label>
                    
                        <label class="font-sans uppercase tracking-wide text-gray-500 hover:text-black w-50 text-sm transition duration-300 ease-in-out transform">Apellidos
                            <input name="apellido" type="text" placeholder="Garcia Perez" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform">
                        </label>
                
                        <label class="font-sans uppercase tracking-wide text-gray-500 hover:text-black w-50 text-sm transition duration-300 ease-in-out transform">Cédula o pasaporte
                            <input name="cedula" type="text" placeholder="1254896352" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform">
                        </label>
                
                        <label class="font-sans uppercase tracking-wide text-gray-500 hover:text-black w-50 text-sm transition duration-300 ease-in-out transform">Celular
                            <input name="telefono" type="text" placeholder="0987532156" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform">
                        </label>
                
                        <label class="font-sans uppercase tracking-wide text-gray-500 hover:text-black w-50 text-sm transition duration-300 ease-in-out transform">Genero
                            <input name="genero" type="text" placeholder="1254896352" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform">
                        </label>

                        {{-- <div>
                            <label for="genero"><input id="Hombre" type="radio" name="genero" value="Hombre"> Indoor</label>
                            <label for="genero"><input id="outdoor" type="radio" name="genero" value="Mujer"> Outdoor</label><br>
                        </div> --}}
                    </div>
                    
                    @if (isset($pedirPassword))
                        @if ($pedirPassword == 'TRUE')
                            <div class="md:grid block gap-x-10 grid-rows-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-6">
                    
                                <div class="xl:col-start-2 xl:col-span-2">
                                    <label for="password_1" class="font-sans uppercase tracking-wide text-gray-500 hover:text-black w-50 text-sm transition duration-300 ease-in-out transform">Crear contraseña
                                        <div class="flex py-1">
                                            <input name="password_1" id="password_1" type="password" placeholder="1254896352" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform">
                                            <button type="button" onclick="pass1()" class="flex m-auto py-2 px-2 ml-2 border-0 focus:outline-none rounded-md bg-white text-black hover:text-white hover:bg-yellow-500 transition duration-300 ease-in-out transform">
                                                <div class="w-20 text-center m-auto puntero-eventos-auto">
                                                    <input type="button" name="showPass1" id="showPass1" value="Ver" class="bg-transparent" readonly>
                                                </div>
                                            </button>
                                        </div>
                                    </label>
                                </div>
                    
                                <div class="xl:col-start-4 xl:col-span-2">
                                    <label for="password_2" class="font-sans uppercase tracking-wide text-gray-500 hover:text-black w-50 text-sm transition duration-300 ease-in-out transform">Confirmar contraseña
                                        <div class="flex py-1">
                                            <input name="password_2" id="password_2" type="password" placeholder="1254896352" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform">
                                            <button type="button" onclick="pass2()" class="flex m-auto py-2 px-2 ml-2 border-0 focus:outline-none rounded-md bg-white text-black hover:text-white hover:bg-yellow-500 transition duration-300 ease-in-out transform">
                                                <div class="w-20 text-center m-auto puntero-eventos-auto">
                                                    <input type="button" name="showPass2" id="showPass2" value="Ver" class="bg-transparent" readonly>
                                                </div>
                                            </button>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        @endif
                    @endif
                
                    @if (isset($alert))
                        <div class="text-center my-5 px-5 py-3 text-sm bg-red-500 w-full text-white">
                            {{$alert}}
                        </div>
                    @endif

                    <div class="grid grid-row-1 gap-1">
                        <div class="m-auto">
                            <input id="submit" type="submit" value="Guardar" class="py-2 w-w1_2 outline-none text-sm text-white px-10 transition duration-500 ease-in-out bg-gray-500 hover:bg-blue-500 transform hover:scale-105">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function pass1(){
            var tipo = document.getElementById("password_1");
            if(tipo.type == "password"){
                tipo.type = "text";
                document.getElementById('showPass1').value = "ocultar";
            }else{
                tipo.type = "password";
                document.getElementById('showPass1').value = "ver";
            }
        }
        function pass2(){
            var tipo = document.getElementById("password_2");
            if(tipo.type == "password"){
                tipo.type = "text";
                document.getElementById('showPass2').value = "ocultar";
            }else{
                tipo.type = "password";
                document.getElementById('showPass2').value = "ver";
            }
        }
    </script>
@endsection