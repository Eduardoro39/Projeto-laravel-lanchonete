<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function comidas(){
        return $this->belongsToMany(Comida::class)->withTimestamps();
    }

}
