<?php

namespace App\Policies;

use App\Models\Cidade;
use App\Models\Pessoa;
use Illuminate\Auth\Access\HandlesAuthorization;

class CidadePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Pessoa $pessoa)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Pessoa $pessoa, Cidade $cidade)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Pessoa $pessoa)
    {
       // return $pessoa->funcionario;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Pessoa $pessoa, Cidade $cidade)
    {
       // return $pessoa->funcionario; // || (auth()->check() && $cidade->id == auth()->id());
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Pessoa $pessoa, Cidade $cidade)
    {
        // return $pessoa->funcionario;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Pessoa $pessoa, Cidade $cidade)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Pessoa $pessoa, Cidade $cidade)
    {
        //
    }
}
