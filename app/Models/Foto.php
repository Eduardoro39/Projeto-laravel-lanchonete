<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = ['url'];
    
    public function bebidas(){
        return $this->hasMany(Bebida::class);
    }

    public function usuarios(){
        return $this->hasMany(Usuario::class);
    }

    public function comidas(){
        return $this->hasMany(Comida::class);
    }

}
