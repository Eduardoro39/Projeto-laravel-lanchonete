@extends('layouts/app')
@section('title', 'Lista de Bebidas')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">
                <h1 class="text-center my-4"> Lista de Bebidas </h1>

                <div class="table-responsive w-75 mx-auto">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Nome </th>
                                <th> Descrição </th>
                                <th> Preço </th>
                                <th> Tamanho </th>
                                <th> Medida </th>

                                <th class="text-center"> Opções </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bebidas as $bebida)
                                <tr>
                                    <th> {{ $bebida->id }} </th>
                                    <td> {{ $bebida->nome }} </td>
                                    <td> {{ $bebida->descricao }} </td>
                                    <td> {{ $bebida->preco }} </td>
                                    <td> {{ $bebida->tamanho }} </td>
                                    <td> {{ $bebida->medida->nome }} </td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.bebidas.fotos.index', $bebida->id) }}" class="btn btn-info mt-sm-1 mt-lg-0" title="Foto"> <i class="bi-image"></i> </a>

                                        <a href="{{ route('admin.bebidas.edit', $bebida->id) }}" class="btn btn-warning mt-sm-1 mt-lg-0" title="Editar"> Editar </a>

                                        <form action="{{ route('admin.bebidas.destroy', $bebida->id) }}" method="POST" class="d-inline-block mt-sm-1 mt-lg-0">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" value="Excluir" class="btn btn-danger" title="Excluir" />
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"> Não existem bebidas cadastradas. </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div>
                        {{ $bebidas->links() }}
                    </div>
    
                    <a href="{{ route('admin.bebidas.create') }}" class="btn btn-success" title="Cadastrar bebida"> Cadastrar Bebida </a>
                </div>
            </div>

        </div>
    </div>

@endsection