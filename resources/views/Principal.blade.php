@extends('layouts.app')

@section('contenido')
<section class="container mx-auto mt-2">
    <div class="grid grid-cols-3 gap-4">
        @foreach ($posts as $post)
            <div class="post">
                <p>{{ $post->name }}</p>
                <!-- Enlace para ver la publicación -->
                <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}">
                    <img src="{{ asset('uploads/' . $post->imagen) }}" alt="Imagen {{ $post->titulo }}" class="rounded border border-white">
                </a>
                <!-- Aquí puedes mostrar los comentarios y otros detalles -->
            </div>
        @endforeach
    </div>
</section>
@endsection
