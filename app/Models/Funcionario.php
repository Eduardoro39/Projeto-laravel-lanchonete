<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = ['telefone', 'cidade_id'];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }

    public function cidade(){
        return $this->belongsTo(Cidade::class);
    }

}
