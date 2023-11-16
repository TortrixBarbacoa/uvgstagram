@extends('Layouts.app')

@section('titulo')

@endsection

@section('contenido')
<div class="flex justify-center border-b">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
        <div class="w-8/12 lg:w-6/12 px-5">
            <img src="{{ asset('img/Fotos.png') }}" alt="Imagen Usuario">
        </div>
        <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col text-center md:items-start md:justify-center py-10 md:py-10">
            <p class="text-black font-poppins capitalize text-5xl">{{ $user->username }}</p>
            <div class="flex text-black text-sm mt-3">
                <p class="font-bold font-lato mr-3">0</p>
                <p class="form-normal font-lato mr-6">Seguidores</p>
                <p class="font-bold font-lato mr-3">0</p>
                <p class="form-normal font-lato mr-6">Siguiendo</p>
                <p class="font-bold mr-3">{{ $user->posts->count() }}</p>
                <p class="form-normal">Post</p>
            </div>
        </div>
    </div>
</div>


    <section class="container mx-auto mt-10 ">
        <h2 class="text-4xl text-center font-black my-5 text-black">Publicaciones</h2>

        @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-col-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route("posts.show", ["post" => $post, "user"=> $user])}}">
                        <img src="{{ asset("uploads/".$post->imagen) }}" alt="imagen {{ $post->titulo }}" class="rounded border border-white">
                    </a>
                </div>
            @endforeach
        </div>
        
            <div class="my-10 text-black">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-black uppercase text-sm text-center font-bold">No hay Publicaciones</p>
        @endif
    </section>
@endsection
