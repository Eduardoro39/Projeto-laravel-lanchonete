<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['pessoa_id', 'foto_id'];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }

    public function foto(){
        return $this->belongsTo(Foto::class);
    }

}
