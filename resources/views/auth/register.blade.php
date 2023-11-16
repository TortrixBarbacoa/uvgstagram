@extends('Layouts.app')

@section("titulo")

@endsection

@section("contenido")
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5 hidden md:flex">
        <img src="{{ asset("img/REGISTRO.png") }}" alt="Imagen Registro de Usuarios">
    </div>

    <div class="md:w-4/12 bg-gradient-to-tl from-yellow-500 to-purple-600 via-red-500 p-6 rounded-lg shadow-lg">
        <form method="POST" action="{{ route("register") }}"> 
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 dark:text-white font-bold">
                    Nombre
                </label>
                <input type="text" id="name" name="name" placeholder="Ingresa tu nombre"
                class="border p-3 w-full rounded-lg text-black bg-white @error('name')  border-red-500" @enderror value="{{ old("name") }}">
                @error("name")
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                        
                @enderror
            </div>

            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 dark:text-white font-bold">
                    Username
                </label>
                <input type="text" id="username" name="username" placeholder="Ingresa un nombre de usuario"
                class="border p-3 w-full rounded-lg text-black bg-white @error('username')  border-red-500" @enderror value="{{ old("username") }}">
                @error("username")
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                        
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 dark:text-white font-bold">
                    Email
                </label>
                <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico"
                class="border p-3 w-full rounded-lg text-black bg-white @error('email')  border-red-500" @enderror value="{{ old("email") }}">
                @error("email")
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                        
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 dark:text-white font-bold">
                    Contraseña
                </label>
                <input type="password" id="password" name="password" placeholder="Ingresa una contraseña"
                class="border p-3 w-full rounded-lg text-black bg-white @error('password')  border-red-500" @enderror value="{{ old("password") }}">
                @error("password")
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                        
                @enderror
            </div>

            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 dark:text-white font-bold">
                    Confirmar contraseña
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu contraseña"
                class="border p-3 w-full rounded-lg text-black bg-white">
            </div>

            <input type="submit"
            value="Crear Cuenta"
            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

        </form>

    </div>
</div>
@endsection
