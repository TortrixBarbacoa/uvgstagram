<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //Finzalizar la sesión del usuario
    public function store()
    {
        auth()->logout();
        return redirect()->route("login");
    }
}
