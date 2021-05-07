
@extends('layouts.app')
@section('title', 'Encuesta')

@section('content')
    <!-- Contendor del contenido -->
    <div class="sm:pt-44 pt-96 mb-m8 sm:mb-m8 lg:mb-m5 h-auto z-40 relative">
        <div class="px-1 pb-p6 h-auto">
            <section class="header">
                <div class="w-full bg-white">
                    <img src="img/header.png" alt="persona">
                    <form action="" class="bg-white py-28 justify-center border-t-2 shadow-lg z-40 relative">
                        <iframe class="h-h7" src="https://docs.google.com/forms/d/e/1FAIpQLSeAhkkyThOuTdU72ENVrI1QfE6DDw3wsXIW2q52IilQEELH9A/viewform?embedded=true" width="1040" height="3812" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
                    </form>
                </div>
            </section>
        
            <div class="justify-center bg-white py-20"> 
                <a href="{{ route('descargarCertificado') }}" class="justify-center px-10 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-blue-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">
                    Obtener certificado
                </a>
            </div>

        </div>
    </div>

    <script>
        const menuButton = document.querySelector('#mobile-menu');

        menuButton.addEventListener('click', e =>{
            const menu = document.querySelector('.mobile-links');

            menu.classList.toggle('hidden')
        });
    </script>
@endsection