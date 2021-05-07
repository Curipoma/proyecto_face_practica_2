@extends('layouts.app')
@section('title', 'login')

@section('content')

     <!-- Contendor del contenido -->
     <div class="sm:pt-72 pt-40 mb-m8 sm:mb-m8 lg:mb-m5">
        <div class="px-1 pb-p3">
            <!-- Imprimimos datos del usuario ( nombre y num.cedula ) -->
            <div class="py-20 px-5 sm:px-10 lg:items-center bg-white max-w-lg m-auto">
                
                <!--======= Inicio header =========-->
                <header class="">
                    <div class="py-6 px-4 sm:px-6 lg:items-center ">
                        <h1 class="text-xl uppercase text-center text-black font-sans">Iniciar sesión</h1>
                    </div>
                </header>
                <!--======= Fin header=========-->

                <form action="{{ route('checkUser') }}" method="PUT" class="m-auto">
                    @csrf
                    
                    @if ($errors->all())
                        <ul class="bg-red-100 p-5 text-white my-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    @if (isset($alert))
                        <div class="my-5 px-5 py-3 text-sm text-center bg-red-500 w-full text-white">
                            {{$alert}}
                        </div>
                    @endif

                    <label class="font-sans ml-2 uppercase tracking-wide text-gray-500 hover:text-black w-50 text-sm transition duration-300 ease-in-out transform"for="usuario">Email
                        <input name="email" type="email" required placeholder="ejemplo@ejemplo.com" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform"/>
                    </label>
    
                    <label class="font-sans ml-2 uppercase tracking-wide text-gray-500 hover:text-black w-50 text-sm transition duration-300 ease-in-out transform" for="password">Contraseña
                        <div class="flex py-1 leading-normal">
                            <input id="password" name="password" type="password" minlength="5" maxlength="20" required placeholder="contraseña" class="mt-3 mb-4 block border border-gray-500 hover:border-black w-full rounded text-sm text-blue-800 transition duration-300 ease-in-out transform" />     
                            <button type="button" onclick="pass()" 
                                class="flex m-auto py-2 px-2 ml-2 border-0 focus:outline-none rounded-md bg-white text-black hover:text-white hover:bg-yellow-500 transition duration-300 ease-in-out transform">
                                <div class="w-20 text-center m-auto">
                                    <input type="button" name="showPass" id="showPass" value="Ver" class="bg-transparent">
                                </div>
                            </button>
                        </div>
                    </label>
    
                    <div class="grid grid-row-2 gap-1">
                        <div class="m-auto">
                            <input id="submit" type="submit" value="Ingresar" class="py-2 w-w1_2 outline-none text-sm text-white px-10 transition duration-500 ease-in-out bg-gray-500 hover:bg-blue-500 transform hover:scale-105">
                        </div>
                       
                        <div class="w-32 m-auto">
                            <a href="{{ url('crear_cuenta') }}" class="no-underline text-black text-center">
                                <p class="py-5 w-full text-sm">Crear cuenta</p>
                            </a>
                        </div>
                    </div>

                    <div class="block sm:flex mt-4">
                        <a class="flex my-3 sm:my-0" href="{{ url('login/facebook') }}">
                            <img class="mx-3 transition duration-500 ease-in-out transform hover:scale-110 h-8" alt="logo facebook" src="https://cdn.icon-icons.com/icons2/2108/PNG/512/facebook_icon_130940.png"/>
                            <p class="py-p0_1 w-full sm:w-w1_2 sm:mx-2 text-center leading-relaxed bg-blue-100 text-sm text-white rounded transition duration-500 ease-in-out hover:bg-blue-600 transform hover:scale-105">Login with facebook</p>
                        </a>
                        <a class="flex my-3 sm:my-0" href="{{ url('login/google') }}">
                            <img class="mx-3 transition duration-500 ease-in-out transform hover:scale-110  h-8" alt="logo google" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                            <p class="py-p0_1 w-full sm:w-w1_2 sm:ml-2 text-center leading-relaxed bg-red-100 text-sm text-white rounded transition duration-500 ease-in-out hover:bg-red-600 transform hover:scale-105">Login with google</p>
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>


    <script>
        function pass(){
            var tipo = document.getElementById("password");
            if(tipo.type == "password"){
                tipo.type = "text";
                document.getElementById('showPass').value = "ocultar";
            }else{
                tipo.type = "password";
                document.getElementById('showPass').value = "ver";
            }
        }
    </script>

@endsection
