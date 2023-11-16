<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Comentario;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    //Relacion de muchos a uno
    public function user()
    {
        return $this->beLongsTo(User::class);
    }
    public function comentarios(){
        return $this->hasMany(comentario::class)->orderBy("created_at","desc");
    }
}
