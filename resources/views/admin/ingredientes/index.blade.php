@extends('layouts/app')
@section('title', 'Lista de Ingredientes')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">
                <h1 class="text-center my-4"> Lista de Ingredientes </h1>

                <div class="table-responsive w-75 mx-auto">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Nome </th>

                                <th class="text-center"> Opções </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ingredientes as $ingrediente)
                                <tr>
                                    <th> {{ $ingrediente->id }} </th>
                                    <td> {{ $ingrediente->nome }} </td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.ingredientes.edit', $ingrediente->id) }}" class="btn btn-warning m-1" title="Editar"> Editar </a>

                                        <form action="{{ route('admin.ingredientes.destroy', $ingrediente->id) }}" method="POST" class="m-1 d-inline-block">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" value="Excluir" class="btn btn-danger" title="Excluir" />
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"> Não existem ingredientes cadastrados. </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div>
                        {{ $ingredientes->links() }}
                    </div>

                    <a href="{{ route('admin.ingredientes.create') }}" class="btn btn-success" title="Cadastrar ingrediente"> Cadastrar Ingrediente </a>
                </div>
            </div>

        </div>
    </div>

@endsection