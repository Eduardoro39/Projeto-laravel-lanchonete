@extends('layouts/app')
@section('title', 'Informações da Bebida')

@section('content')

    <h1 class="my-3 text-center"> Informações da Bebida - {{ $bebida->nome }} </h1>

    <div class="container">
        <div class="row">

            <div class="col-12 text-center col-md-6 text-md-end">
                @if ($bebida->foto)
                    <img src="{{ asset('storage/' . $bebida->foto->url) }}" class="w-50 border rounded" />
                @else
                    <div> Não existe foto para essa bebida. </div>
                @endif
            </div>

            <div class="col-12 text-center col-md-6 text-md-start">
                <div class="row">
                    <p class="col-12 h5 mt-3"> <span class="fw-bold"> Nome: </span> {{ $bebida->nome }} </p>
                    <p class="col-12 h5"> <span class="fw-bold"> Descrição: </span> {{ $bebida->descricao }} </p>
                    <p class="col-12 h5"> <span class="fw-bold"> Preço: </span> {{ number_format($bebida->preco, 2, ',', '.') }} </p>
                    <p class="col-12 h5"> <span class="fw-bold"> Tamanho: </span> {{ $bebida->tamanho }} </p>
                    <p class="col-12 h5"> <span class="fw-bold"> Medida: </span> {{ $bebida->medida->nome }} </p>
                </div>
            </div>

        </div>
    </div>

@endsection