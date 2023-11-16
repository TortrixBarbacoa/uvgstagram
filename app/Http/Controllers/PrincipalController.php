<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index()
    {
        // Obtén todos los posts de los usuarios registrados
        $posts = Post::with('user')->latest()->get();

        return view('principal', compact('posts'));
    }
}
