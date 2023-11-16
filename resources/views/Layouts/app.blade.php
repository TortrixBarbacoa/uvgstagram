<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('styles')
    <title>UvgStagram @yield('titulo')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Poppins:wght@700&family=Roboto&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/instagram.png') }}">
    <script src="https://kit.fontawesome.com/87a0dc1d3c.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-100">
    <header class="p-5 bg-gray-100 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('principal') }}" class=" flex flex-row gap-x-3">

                <i
                    class="fa-brands fa-square-instagram text-5xl uppercase text-transparent bg-gradient-to-r bg-clip-text from-yellow-500 to-purple-600 via-red-500"></i>
                <h1
                    class="text-5xl uppercase text-transparent bg-gradient-to-r bg-clip-text from-yellow-500 to-purple-600 via-red-500 font-poppins">
                    UvgStagram
                </h1>

            </a>

            @auth
                <nav class="flex gap-4 items-center">

                    <a class="flex items-center gap-2 bg-black border p-4 font-bold font-lato text-white rounded-md text-sm uppercase cursor-pointer"
                        href="{{ route('posts.create') }}">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                        Crear
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="font-bold uppercase text-black bg-red-500 p-4 rounded-md font-lato" type="submit">Cerrar Sesión</button>
                    </form>
                    <a class=" text-black font-lato" href="{{ route('posts.index', auth()->user()->username) }}">
                        <span class="font-bold capitalize font-lato text-black">{{ auth()->user()->username }}</span></a>
                </nav>
            @endauth
            @guest
                <nav class="flex gap-4 items-center">
                    <a class="font-bold bg uppercase text-white font-poppins bg-black p-3 rounded-md hover:scale-105 transition" href="{{ route('login') }}">Login</a>
                    <a class="font-bold uppercase text-white font-poppins bg-black p-3 rounded-md hover:scale-105 transition" href="{{ route('register') }}">Crear
                        Cuenta</a>
                </nav>
            @endguest
        </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="dark:text-white font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')


    </main>
    <footer class="text-center p-5 text-black font-lato font-bold text-sm capitalize mt-10">
        Elian Alvarado, Proyecto UvgStagram - Todos los derechos reservados &copy; 2023
    </footer>
</body>

</html>
