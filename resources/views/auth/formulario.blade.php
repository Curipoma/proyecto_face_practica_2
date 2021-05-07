<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <title>Formulario</title>
</head>
<body class="bg-grey-100">
<div class="max-w-6xl mx-auto sm:px-40 lg:px-40">

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg centrar" >
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
                        <div class="p-20">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-2 text-lg leading-7 font-semibold"><h1 class=" text-gray-900 dark:text-white">FORMULARIO</h1></div>
                            </div>
                            <div class="container mx-auto">
                            <form action="ejemplo.php" method="get" >
                                        <p class=" text-black py-2 px-4 font-bold mt-5" >Apellido:
                                        <input  class=" text-black py-1 px-4 font-bold mt-5" type="text" name="apellidos" size="40" placeholder="Escriba su apellido" ></p>
                                        <p class=" text-black py-2 px-4 font-bold mt-1" >Nombre:
                                        <input class=" text-black py-1 px-5 font-bold mt-5" type="text" name="nombre" size="40" placeholder="Escriba su nombre" ></p>
                                        <p class=" text-black py-2 px-4 font-bold mt-2 izquierda"  >Teléfono:
                                        <input class=" text-black py-1 px-4 font-bold mt-3" type="text" name="telefono"size="40" placeholder="Escriba sus 10 dígitos de su teléfono"></p>
                                        <div class="ContenedorCedula">
                                        <p class=" text-black py-2 px-4 font-bold mt-5 izquierda" >Cédula o Pasaporte:
                                        </p> <select name="menu">
                                        <option class=" text-black py-2 px-4 font-bold mt-5" >Cédula</option>
                                        <option class=" text-black py-2 px-4 font-bold mt-5">Pasaporte</option>
                                        </select>
                                        </div>
                                        <p class=" text-black py-2 px-4 font-bold mt-1 izquierda" >Escribe los dígitos:
                                        <input class=" text-black py-1 px-4 font-bold mt-5" type="text" name="cedula"  size="32" placeholder="Escriba sus 10 dígitos de su cédula/pasaporte"></p>
                                        <p class=" text-black py-2 px-4 font-bold mt-5 izquierda" >Sexo:
                                        <input type="radio" name="hm" value="h" class=" text-white py-2 px-4 font-bold "> Hombre
                                        <input type="radio" name="hm" value="m" > Mujer
                                    </p>

                                    <button type= "submit" class="bg-blue-500 hover:bg-green-600 text-white py-2 px-4 font-bold rounded mt-10">
                                        <a href="mas_cursos">
                                            Enviar
                                        </a>
                                    </button>

                                    <button type= "reset" class="bg-blue-500 hover:bg-red-600 text-white py-2 px-4 font-bold rounded " >
                                        Limpiar
                                    </button>

                            </form>
                            </div>



                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-left sm:ml-0 centrar pt-5">
                        Todos los derechos reservados @ESQUEL
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
