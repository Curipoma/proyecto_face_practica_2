
@extends('layouts.app')
@section('title', 'Registro')

@section('content')
    <!-- Contendor del contenido -->
    <div class="sm:pt-44 pt-96 mb-m8 sm:mb-m8 lg:mb-m5">
        <div class="px-1 pb-p4">
            <!-- Imprimimos datos del usuario ( nombre y num.cedula ) -->
            <div class="p-20 sm:px-10 lg:items-center bg-white max-w-lg m-auto">
                
                <!--======= Inicio header =========-->
                <header class="">
                    <div class="py-6 px-4 sm:px-6 lg:items-center ">
                        <h1 class="text-xl uppercase text-center text-black font-sans">Crear cuenta</h1>
                    </div>
                </header>
                <!--======= Fin header=========-->

                @if ($errors->all())
                <ul class="text-center  bg-red-500 p-5 text-white my-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                @if (isset($alert))
                    <div class="text-center my-5 px-5 py-3 text-sm bg-red-500 w-full text-white">
                        {{$alert}}
                    </div>
                @endif

                <form action="{{ route('user.store') }}" method="POST" class="rounded max-w-lg">
                    @csrf
                    <label class="font-sans ml-2 tracking-wide text-gray-500 hover:text-black w-50 text-sm transition duration-300 ease-in-out transform" for="email">Email 
                        <input type="email" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform"
                            name="email" placeholder="Email"/>
                    </label>
    
                    <label class="font-sans ml-2 tracking-wide text-gray-500 hover:text-black w-50 text-sm transition duration-300 ease-in-out transform" for="password">Contraseña 
                        <div class="flex py-1">
                            <input minlength="5" maxlength="20" required 
                                type="password"
                                class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform"
                                id="password_1" name="password_1"
                                placeholder="Contraseña"/>
                            <button type="button" onclick="pass1()" class="flex m-auto py-2 px-2 ml-2 border-0 focus:outline-none rounded-md bg-white text-black hover:text-white hover:bg-yellow-500 transition duration-300 ease-in-out transform">
                                <div class="w-20 text-center m-auto puntero-eventos-auto">
                                    <input type="button" name="showPass" id="showPass1" value="Ver" class="bg-transparent" readonly>
                                </div>
                            </button>
                        </div>
                    </label>
                    
                    <label class="font-sans ml-2 tracking-wide text-gray-500 hover:text-black w-50 text-sm transition duration-300 ease-in-out transform" for="password">Confirmar contraseña
                        <div class="flex py-1">
                            <input minlength="5" maxlength="20" required 
                                type="password"
                                class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform"
                                id="password_2" name="password_2"
                                placeholder="Contraseña"/>   
                            <button type="button" onclick="pass2()" class="flex m-auto py-2 px-2 ml-2 border-0 focus:outline-none rounded-md bg-white text-black hover:text-white hover:bg-yellow-500 transition duration-300 ease-in-out transform">
                                <div class="w-20 text-center m-auto">
                                    <input type="button" name="showPass" id="showPass2" value="Ver" class="bg-transparent" readonly>
                                </div>
                            </button>
                        </div>
                    </label>
    
                    

                    <div class="grid grid-row-2 gap-1">

                        <div class="m-auto">
                            <input type="submit" value="Crear" readonly class="py-2 w-w1_2 outline-none text-sm text-white px-10 transition duration-500 ease-in-out bg-gray-500 hover:bg-blue-500 transform hover:scale-105">
                        </div>
                       
                        <div class="w-32 m-auto">
                            <a href="login" class="no-underline text-black text-center">
                                <p class="py-5 w-full text-sm">Iniciar sesión</p>
                            </a>
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