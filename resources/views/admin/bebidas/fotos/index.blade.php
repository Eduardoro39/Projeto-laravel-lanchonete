@extends('layouts/app')
@section('title', 'Foto da Bebida')

@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.menu_funcionario')

            <div class="col-md-9 text-center my-4">
                <h4> Foto da Bebida </h4>

                <section class="my-2">
                    
                    @if ($foto)
                        <img src="{{ asset("storage/$foto->url") }}" class="w-25" />
                    @else
                        <div> Não existe foto para essa bebida. </div>
                    @endif

                </section>

                <a href="{{ route('admin.bebidas.index') }}" class="btn btn-dark" title="Voltar a lista de bebidas"> Voltar </a>
            </div>

        </div>
    </div>

@endsection