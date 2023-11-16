<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PrincipalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Ruteo Nomerl
Route::get("/", [LoginController::class, "index"])->name("login");
//RUTEO PARA MOSTRAR POSTS DE OTROS USUARIOS
Route::get('/', [PrincipalController::class, 'index'])->name('principal')->middleware('auth');


//Ruteo con sintaxis Closure

//Ruteo con sintaxis de Controlador

Route::get("/register", [RegisterController::class, "index"])->name("register");
Route::post("/register", [RegisterController::class, "store"])->name("register");

//Ruteo de Autenticación
Route::post("/logout", [LogoutController::class, "store"])->name("logout");
Route::get("/login", [LoginController::class, "index"])->name("login");
Route::post("/login", [LoginController::class, "store"])->name("login");

//Ruteo por Route Model Binding
Route::get("/{user:username}", [PostController::class, "index"])->name("posts.index");
Route::get("/", [PrincipalController::class, "index"])->name("principal");
//Ruteo para Resources

//Ruteo para Publicaciones
Route::get("/post/create", [PostController::class, "create"])->name("posts.create");
//Ruta para crear Nueva publicación
Route::post("/posts", [PostController::class, "store"])->name("posts.store");

//Ruteo para subir imagenes
Route::post("/imagenes", [ImagenController::class, "store"])->name("imagenes.store");

//Ruteo para ver una publicación
Route::get("/{user:username}/posts/{post}", [PostController::class, "show"])->name("posts.show");

//Rutero para agregar comentarios
Route::post("/{user:username}/posts/{post}", [ComentarioController::class, "store"])->name("comentarios.store");

Route::delete("/post/{post}", [PostController::class, "destroy"])->name("posts.destroy");


