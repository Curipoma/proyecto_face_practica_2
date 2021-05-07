<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="icon" type="image/x-icon" href="http://esquel.org.ec/templates/g5_hydrogen/custom/images/logos/Logo%20Esquel%20favicon.svg">
        <title>@yield('title')</title>
    </head>

    <body class="bg-grey-100 font-sans antialiased">
        
        <div class="">

            <!-- Barra de navegacion -->
            <nav class=" fixed w-full bg-white border-b-2 shadow-xl py-6 z-50">
                <div class="lg:mx-44 block md:flex">
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <!-- Logo -->
                        <div class="flex-shrink-0 block sm:flex items-center">
                            <a href="https://www.esquel.org.ec/" class="mx-4 lg:w-auto w-full">
                                <img alt="logo esquel" width="200" height="200" src="https://www.esquel.org.ec/templates/g5_hydrogen/custom/images/Logo%20Esquel%20Horizontal.svg">
                            </a>    
                            <a href="https://esquelclic.org/" class="mx-4 lg:w-auto w-full">
                                <img alt="esquel clic" width="210" height="200" src="https://esquelclic.org/images/logos/LogoCLIC%20.svg">
                            </a>     
                        </div>    
                    </div>     
                    
                    <div class="flex">
                        
                        <div class="text-sm px-5 my-auto flex">
                            <a href="{{ route('cursos.index') }}" class=" text-gray-700 hover:no-underline hover:text-black mr-14 transition duration-500 ease-in-out">Crear curso</a>
                        </div>

                        <div class="text-sm px-5 my-auto flex">
                            <a href="{{ route('formarCertificados') }}" class=" text-gray-700 hover:no-underline hover:text-black mr-14 transition duration-500 ease-in-out">Crear certificado</a>
                        </div>  
                        
                        <!-- nos lleva a cerrar sesión -->
                        <div class="text-sm px-5 my-auto flex">
                            {{-- @if (isset(auth()->user()->cedula))  --}}
                            <form style="display: inline" action="logout" method="POST">
                                <a href="{{ url('logout') }}" onclick="this.closest('form').submit()" class=" text-gray-700 hover:no-underline hover:text-black mr-14 transition duration-500 ease-in-out">Cerrar sesión</a>
                            </form>
                            {{-- @endif     --}}
                        </div>  

                    </div>
                </div>    
            </nav>
            <!-- Barra de navegacion -->

            <!--======= footer =========-->
            <footer class="bg-gray-800 dark:bg-gray-800 h-full fixed mt-m4 sm:mt-m3 md:mt-m4 lg:mt-m6 xl:mt-m6 w-full">
                <div class="container px-6 py-4 mx-auto">
                    <div class="lg:flex">
                        <div class="w-full -mx-6 lg:w-2/5">
                            <div class="px-6 py-6">
                                <div>
                                    <a href="https://esquel.org.ec/es/quienes-somos/nuestra-organizacion.html" class="text-xl font-bold text-white dark:text-white hover:text-gray-700 dark:hover:text-gray-300">SOBRE NOSOTROS</a>
                                </div>
                                
                                <p class="max-w-md mt-2 text-white dark:text-gray-400">Esquel nace a raíz de la trayectoria de esta organización en el fortalecimiento y construcción de capacidades a organizaciones de la sociedad civil (OSC)</p>
                                
                                <div class="flex mt-4 -mx-2">
                                    <a href="#" class="mx-2 text-white dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400" aria-label="Linkden">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 512 512">
                                            <path d="M444.17,32H70.28C49.85,32,32,46.7,32,66.89V441.61C32,461.91,49.85,480,70.28,480H444.06C464.6,480,480,461.79,480,441.61V66.89C480.12,46.7,464.6,32,444.17,32ZM170.87,405.43H106.69V205.88h64.18ZM141,175.54h-.46c-20.54,0-33.84-15.29-33.84-34.43,0-19.49,13.65-34.42,34.65-34.42s33.85,14.82,34.31,34.42C175.65,160.25,162.35,175.54,141,175.54ZM405.43,405.43H341.25V296.32c0-26.14-9.34-44-32.56-44-17.74,0-28.24,12-32.91,23.69-1.75,4.2-2.22,9.92-2.22,15.76V405.43H209.38V205.88h64.18v27.77c9.34-13.3,23.93-32.44,57.88-32.44,42.13,0,74,27.77,74,87.64Z"/>
                                        </svg>
                                    </a>
        
                                    <a href="https://www.facebook.com/FundacionEsquel/" class="mx-2 text-white dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400" aria-label="Facebook">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 512 512">
                                            <path d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"/>
                                        </svg>
                                    </a>
        
                                    <a href="https://twitter.com/FundacionEsquel" class="mx-2 text-white dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400" aria-label="Twitter">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 512 512">
                                            <path d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"/>
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        </div>
        
                        <div class="mt-6 lg:mt-0 lg:flex-1">
                            <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 py-6"> <br>
                                <div>
                                    <h3 class="text-white uppercase dark:text-white">Acerca de</h3>
                                    <a href="https://esquel.org.ec/es/quienes-somos/nuestra-organizacion.html" class="block mt-2 text-sm text-white dark:text-gray-400 hover:underline">Organizacion</a>
                                    <a href="https://esquel.org.ec/es/quienes-somos/equipo/junta-directiva.html" class="block mt-2 text-sm text-white dark:text-gray-400 hover:underline">Comunidad</a>
                                </div>
        
                                <div>
                                    <h3 class="text-white uppercase dark:text-white">Productos</h3>
                                    <a href="#" class="block mt-2 text-sm text-white dark:text-gray-400 hover:underline">Cursos</a>
                                    <a href="#" class="block mt-2 text-sm text-white dark:text-gray-400 hover:underline">Certificados</a>
                                    <a href="https://esquel.org.ec/es/que-hacemos/nuestro-trabajo.html" class="block mt-2 text-sm text-white dark:text-gray-400 hover:underline">Nuestro boletin</a>
                                </div>
        
                                <div>
                                    <h3 class="text-white uppercase dark:text-white">Contacto</h3>
                                    <span class="block mt-2 text-sm text-white dark:text-gray-400 hover:underline">Av. Colón E4-175 entre Amazonas y Foch, Ed. Torres de la Colón, Mezzanine Of. 12 Quito - Ecuador</span>
                                    <span class="block mt-2 text-sm text-white dark:text-gray-400 hover:underline">info@esquelclic.org</span>
                                    <span class="block mt-2 text-sm text-white dark:text-gray-400 hover:underline">+(5932) 252-0001</span>
        
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <hr class="h-px my-6 bg-gray-300 border-none dark:bg-gray-700">
        
                    <div>
                        <p class="text-center text-white dark:text-white">© ESQUEL 2021 - Todos los derechos reservados</p>
                    </div>
                </div>
            </footer>
            <!--======= footer =========-->
            

            <!--======= contenido =========-->
            <div class="bg-grey-100 relative">
                @yield('content')
            </div>
            <!--======= contenido =========-->

        </div>

    </body>

</html>
