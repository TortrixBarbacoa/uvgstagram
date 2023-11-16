<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    //metodos index
    public function index()
    {
        return view("auth.register");
    }
    

    //Metodo para registar un nuevo usuario

    public function store(Request $request)
    {
        $request->request->add([
            'username' => Str::slug($request->username)
        ]);


        //validaciones antes de guardar

        $this->validate($request, [
            'name' => ['required', 'min:2', 'max:30'],
            'username' => ['required', 'unique:users', 'max:50'],
            'email' => ['required', 'email', 'unique:users', 'max:100'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);


       User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => strtolower($request->email),
        'password' => Hash::make($request->password)
       ]);

       //opcion 1 para autenticar al usuario
        auth()->attempt([
        "email" => $request->email,
        "password" => $request->password
       ]);

       //opcion 2 para autenticar a un usuario
       //auth()->attemp($request->only("email", "password"));

       return redirect()->route("posts.index", auth()->user()->username);

    }
}
