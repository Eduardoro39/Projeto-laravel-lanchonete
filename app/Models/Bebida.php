<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'preco', 'tamanho', 'medida_id', 'foto_id'];

    public function medida(){
        return $this->belongsTo(Medida::class);
    }

    public function foto(){
        return $this->belongsTo(Foto::class);
    }
}
