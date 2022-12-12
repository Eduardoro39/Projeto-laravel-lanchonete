<?php

namespace App\Policies;

use App\Models\Pessoa;
use App\Models\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
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
        
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Pessoa $pessoa, Usuario $usuario)
    {
        return $pessoa->funcionario || (auth()->check() && $usuario->pessoa_id == auth()->id());
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Pessoa $pessoa)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Pessoa $pessoa, Usuario $usuario)
    {
        return $pessoa->funcionario || (auth()->check() && $usuario->pessoa_id == auth()->id());
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Pessoa $pessoa, Usuario $usuario)
    {
        return $pessoa->funcionario || (auth()->check() && $usuario->pessoa_id == auth()->id());
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Pessoa $pessoa, Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Pessoa $pessoa, Usuario $usuario)
    {
        //
    }
}
