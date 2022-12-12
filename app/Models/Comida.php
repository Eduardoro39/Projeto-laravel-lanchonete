<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'preco', 'foto_id'];

    public function ingredientes(){
        return $this->belongsToMany(Ingrediente::class)->withTimestamps()->withPivot(['quantidade']);
    }

    public function foto(){
        return $this->belongsTo(Foto::class);
    }

}
