@extends('layouts/app')
@section('title', 'Cadastro de Cidade')

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">
                <h1 class="text-center my-4"> Cadastro de Cidade </h1>

                <form action="{{ $action }}" method="POST" class="w-75 mx-auto">
                    @csrf
                    
                    @isset($cidade)
                        @method('PUT')
                    @endisset

                    <div class="mb-3">
                        <label for="nome" class="form-label"> Nome da Cidade </label>
                        <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome', $cidade->nome ?? '') }}" required />
                        @error('nome')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="uf" class="form-label"> UF da Cidade </label>
                        <input type="text" class="form-control" name="uf" id="uf" value="{{ old('uf', $cidade->uf ?? '') }}" required />
                        @error('uf')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>
                
                    <div class="d-grid gap-2 mb-2">
                        <input type="submit" value="Salvar" class="btn btn-primary" title="Salvar" />
                    </div>
                    <a href="{{ route('admin.cidades.index') }}" class="btn btn-dark" title="Voltar a lista de cidades"> Voltar </a>
                </form>
            </div>

        </div>
    </div>

@endsection