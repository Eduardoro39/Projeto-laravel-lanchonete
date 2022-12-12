@extends('layouts/app')
@section('title', 'Informações da Comida')

@section('content')

    <h1 class="my-3 text-center"> Informações da Comida - {{ $comida->nome }} </h1>

    <div class="container">
        <div class="row">

            <div class="col-12 text-center col-md-6 text-md-end">
                @if ($comida->foto)
                    <img src="{{ asset('storage/' . $comida->foto->url) }}" class="w-50 border rounded" />
                @else
                    <div> Não existe foto para essa comida. </div>
                @endif
            </div>

            <div class="col-12 text-center col-md-6 text-md-start">
                <div class="row">
                    <p class="col-12 h5 mt-3"> <span class="fw-bold"> Nome: </span> {{ $comida->nome }} </p>
                    <p class="col-12 h5 mb-3"> <span class="fw-bold"> Preço: </span> {{ number_format($comida->preco, 2, ',', '.') }} </p>

                    <div class="col-12 border rounded py-3">
                        <p class="h5 fw-bold mb-3"> Ingredientes </p>
                        
                        @foreach ($comida->ingredientes as $ingrediente)
                            <span class="border border-info rounded bg-info text-white mx-1 p-1"> {{ $ingrediente->pivot->quantidade }} {{ $ingrediente->nome }} </span>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    
@endsection