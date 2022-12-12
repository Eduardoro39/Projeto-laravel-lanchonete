@extends('layouts/app')
@section('title', 'Lista de Bebidas')

@section('content')
    <h1 class="text-center my-3"> Lista de Bebidas </h1>

    <div class="{{ $bebidas->count() < 3 ? 'w-25' : 'w-50' }} mx-auto mb-5">
        <div class="row card-group">
            @forelse ($bebidas as $bebida)
                <div class="col-sm-3 card border border-info text-center p-0 mx-2">
                    <div class="card-header border-info fw-bold h5"> {{ $bebida->nome }} </div>
                    
                    <img src="{{ asset('storage/' . $bebida->foto->url) }}" class="card-img-top" alt="Foto da bebida" />
                    
                    <div class="card-body">
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

    <div>
        {{ $bebidas->links() }}
    </div>

@endsection