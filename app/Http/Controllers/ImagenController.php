<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ImagenController extends Controller
{
    //

    public function store(Request $request)
    {
        $imagen = $request->file("file");
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        //Utilizar intervention imagen
        $imagenServidor = Image::make($imagen)->fit(2000, 2000);
        //Mover Imagen al servidor
        $imagenPath = public_path("uploads") . "/" . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json(["imagen" => $nombreImagen]);
    }
}
