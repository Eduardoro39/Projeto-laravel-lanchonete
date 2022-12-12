@extends('layouts/app')
@section('title', 'Início')

@section('content')

    <h1 class="text-center fw-bold mt-5"> Bem-vindo </h1>
    <p class="text-center"> Em nossa lanchonete temos varias comidas e bebidas para o seu gosto! </p>
    <h4 class="text-center fw-bold text-primary"> Telefone: 0000-0000 </h4>

    <div class="{{ $comidas->count() < 2 ? 'w-25' : 'w-50' }} mx-auto my-5">
        <p class="h2"> Comidas </p>
        <a href="{{ route('user.comidas.index') }}"> Ver todas as comidas </a>

        <div class="row card-group">
            @forelse ($comidas as $comida)
                <div class="col-sm-3 card border border-info text-center p-0 mx-2">
                    <div class="card-header border-info fw-bold h5"> {{ $comida->nome }} </div>
                    
                    <img src="{{ asset('storage/' . $comida->foto->url) }}" class="card-img-top" alt="Foto da comida" />
                    
                    <div class="card-body">
                        <p class="h5"> Preço: R$ {{ number_format($comida->preco, 2, ',', '.') }} </p>
                    </div>
                    
                    <div class="card-footer border-info">
                        <a href="{{ route('user.comidas.show', $comida->id) }}" class="btn btn-info text-white"> Vizualizar </a>
                    </div>
                </div>
            @empty
                <p> Não existem comidas cadastradas. </p>
            @endforelse
        </div>
    </div>

    <div class="{{ $bebidas->count() < 3 ? 'w-25' : 'w-50' }} mx-auto mb-5">
        <p class="h2"> Bebidas </p>
        <a href="{{ route('user.bebidas.index') }}"> Ver todas as bebidas </a>

        <div class="row card-group">
            @forelse ($bebidas as $bebida)
                <div class="col-sm-3 card border border-info text-center p-0 mx-2">
                    <div class="card-header border-info fw-bold h5"> {{ $bebida->nome }} </div>
                    
                    <img src="{{ asset('storage/' . $bebida->foto->url) }}" class="card-img-top" alt="Foto da bebida" />
                    
                    <div class="card-body">
                        {{-- <p class="card-text"> {{ $bebida->descricao }} </p> --}}
                        <p class="h5"> {{ $bebida->tamanho }} {{ $bebida->medida->nome }} </p>
                        <p class="h5"> Preço: R$ {{ number_format($bebida->preco, 2, ',', '.') }} </p>
                    </div>
                    
                    <div class="card-footer border-info">
                        <a href="{{ route('user.bebidas.show', $bebida->id) }}" class="btn btn-info text-white"> Vizualizar </a>
                    </div>
                </div>
            @empty
                <p> Não existem bebidas cadastradas. </p>
            @endforelse
        </div>
    </div>

@endsection