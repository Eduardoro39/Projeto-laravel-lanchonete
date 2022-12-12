@extends('layouts/app')
@section('title', 'Lista de Usuários')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">
                <h1 class="text-center my-4"> Lista de Usuários </h1>

                <div class="table-responsive w-75 mx-auto">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Nome </th>
                                <th> E-mail </th>
                                <th> Data de cadastro </th>

                                <th class="text-center"> Opções </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($usuarios as $usuario)
                                <tr>
                                    <th> {{ $usuario->id }} </th>
                                    <td> {{ $usuario->pessoa->nome }} </td>
                                    <td> {{ $usuario->pessoa->email }} </td>
                                    <td> {{ $usuario->created_at }} </td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.usuarios.fotos.index', $usuario->id) }}" class="btn btn-info mt-sm-1 mt-lg-0" title="Foto"> <i class="bi-image"></i> </a>

                                        <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="btn btn-warning mt-sm-1 mt-lg-0" title="Editar"> Editar </a>

                                        <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline-block mt-sm-1 mt-lg-0">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" value="Excluir" class="btn btn-danger" title="Excluir"/>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"> Não existem usuários cadastrados. </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div>
                        {{ $usuarios->links() }}
                    </div>

                    <a href="{{ route('admin.usuarios.create') }}" class="btn btn-success" title="Cadastrar usuário"> Cadastrar Usuário </a>
                </div>
            </div>

        </div>
    </div>

@endsection