<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function bebidas(){
        return $this->hasMany(Bebida::class);
    }

}
