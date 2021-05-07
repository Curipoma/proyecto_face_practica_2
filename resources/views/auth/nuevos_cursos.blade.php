<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevos Cursos</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
</head>
<body class="bg-grey-100 grid grid-rows-1">
    
<div class="grid grid-rows-1 flex-auto w-full max-w-md mx-auto rounded sm:rounded-xl shadow-md overflow-hidden md:max-w-2xl my-2">
    <div class="bg-white">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 my-2 " >
            <div>
                <a href="https://www.esquel.org.ec/">
                    <img class="transform scale-75 sm:scale-100 object-center md:object-top" src="https://www.esquel.org.ec/templates/g5_hydrogen/custom/images/Logo%20Esquel%20Horizontal.svg"alt="Fundacion Esquel" link="https://www.esquel.org.ec/" >
                </a>
            </div> 
            <div>
                <a href="https://esquelclic.org/">
                    <img class="transform scale-75 sm:scale-100 object-center md:object-top" src="https://esquelclic.org/images/logos/LogoCLIC%20.svg" alt="esquel clic">
                </a> 
            </div>    
        </div>
        <div class="grid grid-rows-4 gap-3">
            <div class="object-bottom mt-12">
                <h1 class='text-center text-3xl sm:text-6xl object-scale-down '>Nuevos Cursos</h1>
            </div>

            <div class="md:flex w-9/12  max-w-md mx-auto rounded-xl shadow-md overflow-hidden md:max-w-2xl my-2">
                <div class="p-8 ">
                    <h1 class="block mt-1 text-xl leading-tight font-medium text-black">Nuevo Curso</h1>
                    <input type="text" class="mt-5 pt-3 pr-4 sm:pr-40 focus:ring-black focus:border-black block w-full shadow-sm sm:text-sm border-black rounded-md" placeholder="Programacion New">
                </div>
            </div>
                
            <div class="md:flex w-9/12  max-w-md mx-auto rounded-xl shadow-md overflow-hidden md:max-w-2xl my-2">
                <div class="p-8">
                    <h1 class="block mt-1 text-xl leading-tight font-medium text-black">Horas del Curso</h1>
                    <div class="relative">
                        <select class="mt-5 pt-3 pr-4 sm:pr-40 focus:ring-black focus:border-black block w-full shadow-sm sm:text-sm border-black rounded-md">
                            <option>30</option>
                            <option>50</option>
                            <option>80</option>
                            <option>90</option>
                            <option>100</option>
                        </select>
                        <div class="pointer-events-none">
                            <svg class="fill-current h-4 w-4" viewBox="0 0 20 20"></svg>
                        </div>
                    </div>
                </div>
            </div>
            
                
            <div class="md:flex w-9/12  max-w-md mx-auto rounded-xl shadow-md overflow-hidden md:max-w-2xl my-2">
                <div class="p-8">
                    <h1 class="block mt-1 text-xl leading-tight font-medium text-black">Mas Informacion</h1>
                    <button type="submit" class="mt-5 pr-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-xl font- rounded-xl text-black bg-grey-200 hover:bg-grey-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ">
                    ir
                    </button>
                </div>
            </div>
        </div>

        <div class="text-left mb-8">
            <button type="submit" class="ml-20 mt-5 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-xl font- rounded-xl text-black bg-grey-200 hover:bg-grey-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Guardar
            </button>
        </div>
        <div >
            <footer>
            </footer>
        </div>
    </div>
</div>
</html>
