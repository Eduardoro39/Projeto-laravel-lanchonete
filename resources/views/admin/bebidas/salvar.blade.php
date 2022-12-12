@extends('layouts/app')
@section('title', 'Cadastro de Bebida')

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">
                <h1 class="text-center my-4"> Cadastro de Bebida </h1>

                <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="w-75 mx-auto">
                    @csrf
                    
                    @isset($bebida)
                        @method('PUT')
                    @endisset

                    <div class="mb-3">
                        <label for="nome" class="form-label"> Nome da Bebida </label>
                        <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome', $bebida->nome ?? '') }}" required />
                        @error('nome')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label"> Descrição da Bebida </label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{{ old('descricao', $bebida->descricao ?? '') }}" required />
                        @error('descricao')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <label for="preco" class="form-label"> Preço da Bebida </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"> $ </span>
                        <input type="text" class="form-control" name="preco" id="preco" value="{{ old('preco', $bebida->preco ?? '') }}" aria-describedby="basic-addon1" required />
                        @error('preco')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tamanho" class="form-label"> Tamanho da Bebida </label>
                        <input type="number" class="form-control" name="tamanho" id="tamanho" value="{{ old('tamanho', $bebida->tamanho ?? '') }}" required />
                        @error('tamanho')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="medida" class="form-label"> Medida </label>
                        <select name="medida_id" id="medida_id" class="form-select">
                            <option> Selecione uma medida </option>
                            @foreach ($medidas as $medida)
                                <option {{ old('medida_id', $bebida->medida->id ?? '') == $medida->id ? 'selected' : '' }} value="{{ $medida->id }}">
                                    {{ $medida->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label"> Foto da Bebida </label>
                        <input type="file" class="form-control" name="foto" id="foto" required/>
                        @error('foto')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>
                
                    <div class="d-grid gap-2 mb-2">
                        <input type="submit" value="Salvar" class="btn btn-primary" title="Salvar" />
                    </div>
                    <a href="{{ route('admin.bebidas.index') }}" class="btn btn-dark" title="Voltar a lista de bebidas"> Voltar </a>
                </form>
            </div>
            
        </div>
    </div>

@endsection