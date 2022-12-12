<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Pessoa extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'password', 'tipo', 'funcionario'];

    public function setNomeAttribute($value){
        $this->attributes['nome'] = strtoupper($value);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }

    public function funcionarios(){
        return $this->hasMany(Funcionario::class);
    }

    public function usuarios(){
        return $this->hasMany(Usuario::class);
    }

}
