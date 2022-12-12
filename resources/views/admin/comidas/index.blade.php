@extends('layouts/app')
@section('title', 'Lista de Comidas')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">
                <h1 class="text-center my-4"> Lista de Comidas </h1>

                <div class="table-responsive w-75 mx-auto">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Nome </th>
                                <th> Preço </th>
                                <th class="text-center"> Ingredientes </th>

                                <th class="text-center"> Opções </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($comidas as $comida)
                                <tr>
                                    <th> {{ $comida->id }} </th>
                                    <td> {{ $comida->nome }} </td>
                                    <td> {{ $comida->preco }} </td>
                                    <td>
                                        @foreach ($comida->ingredientes as $ingrediente)
                                            <p class="border border-info rounded bg-info text-white float-start mx-1 mb-2 p-1"> {{ $ingrediente->pivot->quantidade }} {{ $ingrediente->nome }} </p>
                                        @endforeach 
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.comidas.fotos.index', $comida->id) }}" class="btn btn-info mt-sm-1 mt-lg-0" title="Foto"> <i class="bi-image"></i> </a>

                                        <a href="{{ route('admin.comidas.edit', $comida->id) }}" class="btn btn-warning mt-sm-1 mt-lg-0" title="Editar"> Editar </a>

                                        <form action="{{ route('admin.comidas.destroy', $comida->id) }}" method="POST" class="d-inline-block mt-sm-1 mt-lg-0">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" value="Excluir" class="btn btn-danger" title="Excluir" />
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"> Não existem comidas cadastradas. </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div>
                        {{ $comidas->links() }}
                    </div>

                    <a href="{{ route('admin.comidas.create') }}" class="btn btn-success" title="Cadastrar comida"> Cadastrar Comida </a>
                </div>
            </div>

        </div>
    </div>

@endsection