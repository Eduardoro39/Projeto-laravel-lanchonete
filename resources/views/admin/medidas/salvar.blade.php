@extends('layouts/app')
@section('title', 'Cadastro de Medida')

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">
                <h1 class="text-center my-4"> Cadastro de Medida </h1>

                <form action="{{ $action }}" method="POST" class="w-75 mx-auto">
                    @csrf
                    
                    @isset($medida)
                        @method('PUT')
                    @endisset

                    <div class="mb-3">
                        <label for="nome" class="form-label"> Nome da Medida </label>
                        <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome', $medida->nome ?? '') }}" required />
                        @error('nome')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>
                
                    <div class="d-grid gap-2 mb-2">
                        <input type="submit" value="Salvar" class="btn btn-primary" title="Salvar" />
                    </div>
                    <a href="{{ route('admin.medidas.index') }}" class="btn btn-dark" title="Voltar a lista de medidas"> Voltar </a>
                </form>
            </div>

        </div>
    </div>

@endsection