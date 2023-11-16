<?php

namespace App\Http\Controllers;

use App\models\User;
use App\models\Post;
use App\models\Comentario;

use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //

    public function store(Request $request, User $user, Post $post){
        //validar
        $this->validate($request,[
            "comentario" => "required|max:255",
        ]);
        //crear
        Comentario::create([
            "comentario" => $request->comentario,
            "user_id" => auth()->user()->id,
            "post_id" =>$post->id
        ]);
        //redireccionar
        return back()->with("mensaje", "comentario agregado correctamente");
    }
}
