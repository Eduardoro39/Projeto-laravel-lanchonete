@extends('layouts/app')
@section('title', 'Informações do Usuário')

@section('content')

    <div class="text-center mb-3">
        <h1 class="my-3"> Informações do Usuário - {{ $usuario->pessoa->nome }} </h1>

        @if ($usuario->foto)
            <img src="{{ asset('storage/' . $usuario->foto->url) }}" class="w-25 border rounded" />
        @else
            <img src="{{ asset('storage/ImagemPadraoUsuario.png') }}" class="w-25 border rounded" />
        @endif

        <p class="h5 mt-3"> <span class="fw-bold"> Nome: </span> {{ $usuario->pessoa->nome }} </p>
        <p class="h5 mb-3"> <span class="fw-bold"> E-mail: </span> {{ $usuario->pessoa->email }} </p>

        @can('update', $usuario)
            <a href="{{ route('user.usuarios.edit', $usuario->id) }}" class="btn btn-primary" title="Editar"> Editar </a>
        @endcan

        @can('delete', $usuario)
            <form action="{{ route('user.usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')

                <input type="submit" value="Excluir usuário" title="Excluir usuário" class="btn btn-danger" />
            </form>
        @endcan
    </div>

@endsection