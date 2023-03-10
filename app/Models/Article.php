<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable=["nombre","descripcion","imagen","precio","stock","slug","user_id"];

    // 1:N
    public function user(){
        return $this->BelongsTo(User::class);
    }

    //Metodo para "activar" las url amigables
    public function getRouteKeyName()
    {
        return "slug";
    }
}
