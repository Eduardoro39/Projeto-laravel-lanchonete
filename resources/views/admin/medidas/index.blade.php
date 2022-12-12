@extends('layouts/app')
@section('title', 'Lista de Medidas')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">
                <h1 class="text-center my-4"> Lista de Medidas </h1>

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
                            @forelse ($medidas as $medida)
                                <tr>
                                    <th> {{ $medida->id }} </th>
                                    <td> {{ $medida->nome }} </td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.medidas.edit', $medida->id) }}" class="btn btn-warning m-1" title="Editar"> Editar </a>

                                        <form action="{{ route('admin.medidas.destroy', $medida->id) }}" method="POST" class="m-1 d-inline-block">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" value="Excluir" class="btn btn-danger" title="Excluir" />
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"> Não existem medidas cadastradas. </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div>
                        {{ $medidas->links() }}
                    </div>

                    <a href="{{ route('admin.medidas.create') }}" class="btn btn-success" title="Cadastrar medida"> Cadastrar Medida </a>
                </div>
            </div>

        </div>
    </div>

@endsection