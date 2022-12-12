@extends('layouts/app')
@section('title', 'Lista de Funcionarios')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">
                <h1 class="text-center my-4"> Lista de Funcionários </h1>

                <div class="table-responsive w-75 mx-auto">
                    {{-- Pesquisa --}}
                    <h3> Pesquisa </h3>
                    <form action="{{ route('admin.funcionarios.index') }}" method="GET">
                        <div class="row m-0">
                            <div class="col-6 mb-3">
                                <select name="cidade_id" id="cidade_id" class="form-control">
                                    <option value=""> Selecione uma cidade </option>
                                    @foreach ($cidades as $cidade)
                                        <option value="{{  $cidade->id }}" {{ $cidade->id == $cidade_id ? 'selected' : '' }} > {{ $cidade->nome }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6 mb-3">
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="{{ $nome }}"/>
                            </div>

                            <div class="col-12 mb-3">
                                <a href="{{ route('admin.funcionarios.index') }}" class="btn btn-primary" title="Exibir todos os dados"> EXIBIR TODOS </a>
                                <input type="submit" value="PESQUISAR" class="btn btn-info" title="Pesquisar" />
                            </div>
                        </div>
                    </form>

                    <hr />

                    {{-- Lista --}}
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Nome </th>
                                <th> E-mail </th>
                                <th> Telefone </th>
                                <th> Cidade </th>
                                <th> Data de cadastro </th>

                                <th class="text-center"> Opções </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($funcionarios as $funcionario)
                                <tr>
                                    <th> {{ $funcionario->id }} </th>
                                    <td> {{ $funcionario->nome }} </td>
                                    <td> {{ $funcionario->email }} </td>
                                    <td> {{ $funcionario->telefone }} </td>
                                    <td> {{ $funcionario->cidade_nome }} </td>
                                    <td> {{ $funcionario->created_at }} </td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.funcionarios.edit', $funcionario->id) }}" class="btn btn-warning m-1" title="Editar"> Editar </a>

                                        {{-- <form action="{{ route('admin.funcionarios.destroy', $funcionario->id) }}" method="POST" class="m-1 d-inline-block">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" value="Excluir" class="btn btn-danger" title="Excluir"/>
                                        </form> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"> Não existem funcionários cadastrados ou não foram encontrados funcionarios que atendam aos critérios de pesquisa. </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div>
                        {{ $funcionarios->links() }}
                    </div>

                    <a href="{{ route('admin.funcionarios.create') }}" class="btn btn-success" title="Cadastrar funcionário"> Cadastrar Funcionário </a>
                </div>
            </div>
            
        </div>
    </div>

    <script>
        $('document').ready(function () {
            $('#nome').keyup(function () {
                $('#nome').val(this.value.toUpperCase());
            })
        });
    </script>

@endsection