<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    //Metodo para que solo los usuarios autenticados puedan ver este controlador

    public function __construct()
    {
        $this->middleware(['auth'])->except('show','index');
    }


    public function index(User $user)
    {

        $posts = Post::where("user_id", $user->id)->paginate(4);

         
        return view("dashboard", [
            "user" => $user,
            "posts" => $posts
        ]);
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {
        #Paso 1 validar el formulario
        $this->validate($request, ["titulo"=> "required|max:255", "descripcion"=> "required", "imagen" => "required"]);
        #Paso 2 Guardar la publicacion
        $request->user()->posts()->create([
            "titulo" => $request->titulo,
            "descripcion" => $request->descripcion,
            "imagen" => $request->imagen,
        ]);
        #paso 3 Responder de exito o fracaso
        return redirect()->route("posts.index", auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view("posts.show", [
            "post" => $post,
            "user" => $user
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();
        $imagen_path = public_path('uploads/'. $post->imagen);
        if(File::exists($imagen_path)){
            unlink($imagen_path);
        }

        return redirect()->route("posts.index", auth()->user()->username);
    }
}
