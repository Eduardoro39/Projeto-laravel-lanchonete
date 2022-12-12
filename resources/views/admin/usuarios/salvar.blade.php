@extends('layouts/app')
@section('title', 'Cadastro de Usuário')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 py-4">    
                <h1 class="text-center my-4"> Cadastro de Usuário </h1>

                <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="w-75 mx-auto">
                    @csrf
                    
                    @isset($usuario)
                        @method('PUT')
                    @endisset

                    <input type="hidden" name="pessoa_id" value="{{ old('pessoa_id', $usuario->pessoa->id ?? '') }}" />

                    <div class="mb-3">
                        <label for="nome" class="form-label"> Nome do Usuário </label>
                        <input type="text" class="form-control" name="nome" id="nome" value="{{ old('nome', $usuario->pessoa->nome ?? '') }}" required />
                        @error('nome')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <label for="email" class="form-label"> E-mail do Usuário </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"> @ </span>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $usuario->pessoa->email ?? '') }}" aria-describedby="basic-addon1" required />
                        @error('email')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="password" class="form-label"> Senha do Usuário </label>
                        <input type="password" class="form-control" name="password" id="password" {{ isset($usuario->pessoa->password) ? '' : 'required' }} />
                        @error('password')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label"> Foto do Usuário </label>
                        <input type="file" class="form-control" name="foto" id="foto" />
                        @error('foto')
                            <span><small> {{ $message }} </small></span>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 mb-2">
                        <input type="submit" value="Salvar" class="btn btn-primary" title="Salvar" />
                    </div>
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-dark" title="Voltar a lista de usuários"> Voltar </a>
                </form>
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