@extends('layouts/app')
@section('title', 'Login')

@section('content')

        <h1 class="text-center my-4"> Login </h1>

        {{-- Verifica se veio um erro, se veio mostra ele --}}
        @if (session('danger'))
            <div class="text-center">
                <span class="text-danger"> {{ session('danger') }} </span>
            </div>
        @endif

        <form action="{{ route('auth.pessoa') }}" method="POST" class="w-50 mx-auto">
            @csrf

            <label for="email" class="form-label"> E-mail </label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="basic-addon1" autofocus required />
                @error('email')
                    <span><small> {{ $message }} </small></span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"> Senha </label>
                <input type="password" class="form-control" name="password" id="password" required />
                @error('password')
                    <span><small> {{ $message }} </small></span>
                @enderror
            </div>

            <div class="mb-3">
                <input type="submit" value="Logar" class="btn btn-primary form-control form-control-lg" />
            </div>

        </form>

        {{-- @if (auth()->check())
            <span> Você está logado. </span>
            <a href="{{ route('logout.pessoa') }}"> Deslogar </a> <br />
        @endif --}}

@endsection