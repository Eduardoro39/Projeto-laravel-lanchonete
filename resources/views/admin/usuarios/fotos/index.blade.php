@extends('layouts/app')
@section('title', 'Foto do Usuario')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 text-center my-4">
                <h4> Foto do Usuário </h4>

                <section class="my-2">
                    
                    @if ($foto)
                        <img src="{{ asset("storage/$foto->url") }}" class="w-25" />
                    @else
                        <div> Não existe foto para esse usuário. </div>
                    @endif

                </section>
                
                <a href="{{ route('admin.usuarios.index') }}" class="btn btn-dark" title="Voltar a lista de usuários"> Voltar </a>
            </div>

        </div>
    </div>

@endsection