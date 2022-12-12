@extends('layouts/app')
@section('title', 'Cadastro de Comida')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">
                <h1 class="text-center my-4"> Cadastro de Comida </h1>

                <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="w-75 mx-auto">
                    @csrf
                    
                    @isset($comida)
                        @method('PUT')
                    @endisset

                    <div class="mb-3">
                        <label for="nome" class="form-label"> Nome da Comida </label>
                        <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome', $comida->nome ?? '') }}" required />
                        @error('nome')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <label for="preco" class="form-label"> Preço da Comida </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"> $ </span>
                        <input type="text" class="form-control" name="preco" id="preco" value="{{ old('preco', $comida->preco ?? '') }}" aria-describedby="basic-addon1" required />
                        @error('preco')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label"> Foto da Comida </label>
                        <input type="file" class="form-control" name="foto" id="foto" required/>
                        @error('foto')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <div class="mb-3 border rounded p-3">
                        <table>
                            <p class="h5 fw-bold mb-3"> Ingredientes </p>

                            @foreach ($ingredientes as $ingrediente)
                                <tr>
                                    <td> <input type="checkbox" class="ingredient-enable" data-id="{{ $ingrediente->id }}" {{ $ingrediente->value ? 'checked' : null }} > </td>
                                    <td class="px-1"> {{ $ingrediente->nome }} </td>
                                    <td class="py-1"> <input type="text" class="ingredient-amount mx-2" name="ingredientes[{{ $ingrediente->id }}]" data-id="{{ $ingrediente->id }}" placeholder="Quantidade" value="{{ $ingrediente->value ?? null }}" {{ $ingrediente->value ? null : 'disabled' }}> </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                
                    <div class="d-grid gap-2 mb-2">
                        <input type="submit" value="Salvar" class="btn btn-primary" title="Salvar" />
                    </div>
                    <a href="{{ route('admin.comidas.index') }}" class="btn btn-dark" title="Voltar a lista de comidas"> Voltar </a>
                </form>

                <script>
                    $('document').ready(function () {
                        $('.ingredient-enable').on('click', function () {
                            let id = $(this).attr('data-id')
                            let enabled = $(this).is(":checked")
                            $('.ingredient-amount[data-id="' + id + '"]').attr('disabled', !enabled)
                            $('.ingredient-amount[data-id="' + id + '"]').val(null)
                        })
                    });
                </script>
            </div>

        </div>
    </div>

@endsection