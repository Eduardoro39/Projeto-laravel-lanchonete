@extends('layouts/app')
@section('title', 'Lista de Cidades')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">
                <h1 class="text-center my-4"> Lista de Cidades </h1>

                <div class="table-responsive w-75 mx-auto">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Nome </th>
                                <th> UF </th>

                                <th class="text-center"> Opções </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cidades as $cidade)
                                <tr>
                                    <th> {{ $cidade->id }} </th>
                                    <td> {{ $cidade->nome }} </td>
                                    <td> {{ $cidade->uf }} </td>

                                    <td class="text-center">
                                        {{-- @can('update', $cidade) --}}
                                            <a href="{{ route('admin.cidades.edit', $cidade->id) }}" class="btn btn-warning m-1" title="Editar"> Editar </a>
                                        {{-- @endcan --}}

                                        {{-- @can('delete', $cidade) --}}
                                            <form action="{{ route('admin.cidades.destroy', $cidade->id) }}" method="POST" class="m-1 d-inline-block">
                                                @csrf
                                                @method('DELETE')

                                                <input type="submit" value="Excluir" class="btn btn-danger" title="Excluir" />
                                            </form>
                                        {{-- @endcan --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"> Não existem cidades cadastradas. </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div>
                        {{ $cidades->links() }}
                    </div>

                    {{-- @can('create', \App\Models\Cidade::class) --}}
                        <a href="{{ route('admin.cidades.create') }}" class="btn btn-success" title="Cadastrar cidade"> Cadastrar Cidade </a>
                    {{--  @endcan --}}
                </div>
            </div>

        </div>
    </div>

@endsection