<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        //validar el formulario con los datos
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        //autenticar al usuario
        if(!auth()->attempt($request->only("email", "password")))
        {
            return back()->with("status", "DATOS INCORRECTOS PORFAVOR VERIFIQUE LOS DATOS");
        }

        //redireccionar al usuario con su perfil
        return redirect()->route("posts.index", auth()->user()->username);
    }
}
