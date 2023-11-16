@extends('layouts.app')

@section('titulo')
@endsection

@push('styles')
    <!-- Asegúrate de incluir el link o script de FontAwesome en la sección 'head' -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endpush

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen del Post {{ $post->titulo }}" class="w-full rounded-lg shadow-md border border-white">
            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-md mt-4 cursor-pointer">Eliminar Publicación</button>
                    </form>
                @endif

            @endauth
        </div>
        <div class="md:w-1/2 m-1">
            <div class="shadow-lg rounded-lg p-5 mb-5 dark:bg-black border boder-white">
                <div class="mb-3">
                    <p class="text-xl font-bold dark:text-white">{{ $post->user->username }}</p>
                    <p class="mt-4 text-justify dark:text-white">{{ $post->descripcion }}</p>
                </div>
                <div class="mb-3 pb-2 border-b">
                    <!-- Contenido debajo del borde -->
                </div>
                

                <div class="rounded-lg mb-3 bg-gray-100 dark:bg-black">
                    <div class="flex items-start justify-between">
                        <p class="text-lg font-bold dark:text-white">Comentarios ({{ $post->comentarios->count() }})</p>
                    </div>
                    @foreach ($post->comentarios as $comentario)
                        <div class="flex items-center my-4">
                            <div>
                                <p class="font-bold text-gray-700 dark:text-white">{{ $comentario->user->username }}</p>
                                <p class="text-gray-600 dark:text-white">{{ $comentario->comentario }}</p>
                                <p class="text-gray-500 dark:text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                            
                        </div>
                    @endforeach
                </div>
                <div class="mb-3 pb-2 border-b">
                    <!-- Contenido debajo del borde -->
                </div>
                @auth
                <div class="flex items-center mt-4">
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST" class="w-full">
                        @csrf
                        <p class="text-gray-500 dark:text-white text-sm">{{ $post->created_at->diffForHumans() }}</p>    
                        <div class="flex items-center border rounded-full p-3 mt-3">
                            <input type="text" name="comentario" placeholder="Añade un comentario..." class="bg-transparent w-full outline-none dark:text-white" value="{{ old('comentario') }}">
                            <button type="submit" class="text-blue-500 font-bold cursor-pointer">Publicar</button>
                        </div>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
