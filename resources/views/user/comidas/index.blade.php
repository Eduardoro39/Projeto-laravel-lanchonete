@extends('layouts/app')
@section('title', 'Lista de Comidas')

@section('content')
    <h1 class="text-center my-3"> Lista de Comidas </h1>

    <div class="{{ $comidas->count() < 2 ? 'w-25' : 'w-50' }} mx-auto mb-5">
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

    <div>
        {{ $comidas->links() }}
    </div>

@endsection