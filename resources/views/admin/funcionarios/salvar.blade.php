@extends('layouts/app')
@section('title', 'Cadastro de Funcionario')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">
                <h1 class="text-center my-4"> Cadastro de Funcionário </h1>

                <form action="{{ $action }}" method="POST" class="w-75 mx-auto">
                    @csrf
                    
                    @isset($funcionario)
                        @method('PUT')
                    @endisset

                    <input type="hidden" name="pessoa_id" value="{{ old('pessoa_id', $funcionario->pessoa->id ?? '') }}" />

                    <div class="mb-3">
                        <label for="nome" class="form-label"> Nome do Funcionário </label>
                        <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome', $funcionario->pessoa->nome ?? '') }}" required />
                        @error('nome')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <label for="email" class="form-label"> E-mail do Funcionário </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"> @ </span>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $funcionario->pessoa->email ?? '') }}" aria-describedby="basic-addon1" required />
                        @error('email')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="password" class="form-label"> Senha do Funcionário </label>
                        <input type="password" class="form-control" name="password" id="password" required />
                        @error('password')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label"> Telefone do Funcionário </label>
                        <input type="text" class="form-control" name="telefone" id="telefone" value="{{ old('telefone', $funcionario->telefone ?? '') }}" required />
                        @error('telefone')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cidade" class="form-label"> Cidade </label>
                        <select name="cidade_id" id="cidade_id" class="form-control">
                            <option> Selecione uma cidade </option>
                            @foreach ($cidades as $cidade)
                                <option {{ old('cidade_id', $funcionario->cidade->id ?? '') == $cidade->id ? 'selected' : '' }} value="{{ $cidade->id }}">
                                    {{ $cidade->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-grid gap-2 mb-2">
                        <input type="submit" value="Salvar" class="btn btn-primary" title="Salvar" />
                    </div>
                    <a href="{{ route('admin.funcionarios.index') }}" class="btn btn-dark" title="Voltar a lista de funcionários"> Voltar </a>
                </form>
            </div>

        </div>
    </div>

@endsection