@extends('layouts.app')

@section('titulo')
@endsection

@section('contenido')
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endpush

    <div class="md:flex md:item-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store') }}" 
            method="POST" 
            enctype="multipart/form-data" 
            id="dropzone"
                class="text-white dropzone border-white border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center bg-black">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-6 dark:bg-black border border-whiter rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{route("posts.store")}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase dark:text-white font-bold">
                        Nombre
                    </label>
                    <input type="text" id="titulo" name="titulo" placeholder="Titulo de la publicacion"
                        class="border p-3 w-full rounded-lg  bg-black text-white @error('titulo')  border-red-500" @enderror value="{{ old('titulo') }}">
                    @error('titulo')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase dark:text-white font-bold">
                    descripción
                    </label>
                    <textarea 
                    id="descripcion" 
                    name="descripcion" 
                    placeholder="Descripción de la Publicación"
                    class="border p-3 w-full rounded-lg  bg-black text-white @error('descripcion')  border-red-500" @enderror value="{{ old('descripcion') }}">
                    </textarea>
                    @error('descripcion')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">

                    <input type="hidden" id="imagen" name="imagen"value="{{ old('imagen') }}">
                    @error('imagen')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>


                <input type="submit" value="Publicar"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">

            </form>
        </div>
    </div>
@endsection
