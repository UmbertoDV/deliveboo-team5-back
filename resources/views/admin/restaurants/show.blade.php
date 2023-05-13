@extends('layouts.app')

@section('content')
    <div class="container rest-show mt-3">

        <a href="{{ route('admin.restaurants.index') }}" class="btn btn-primary my-3 mb-4"> Torna indietro</a>
        <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-primary my-3 mb-4"> Modifica</a>
        <div class="show-restaurant d-flex">
            <img src="{{ $restaurant->getImageUri() }}" class="card-img-top" alt="...">
            <div class="show-info-rest ms-5 d-flex flex-column">
                <div><strong>Ristorante: </strong> {{ $restaurant->name }} </div>
                <div><strong>Indirizzo: </strong> {{ $restaurant->address }} </div>
                <div><strong>Email: </strong> {{ $restaurant->email }} </div>
                <div> <strong>Telefono: </strong> {{ $restaurant->telephone }} </div>
                <div><strong>Descrizione: </strong> {{ $restaurant->description }}</div>
                <div><strong>P.IVA:</strong> {{ $restaurant->p_iva }}</div>
            </div>
        </div>
    </div>
@endsection
