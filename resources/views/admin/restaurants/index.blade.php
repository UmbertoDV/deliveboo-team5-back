@extends('layouts.app')



@section('content')
    <div class="container rest-show mt-3">
        @if (!$restaurant)
            <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary">
                Aggiungi il tuo ristorante
            </a>
        @else
            <h2>Il tuo ristorante</h2>
        @endif


        {{-- <a href="{{ route('admin.restaurants.index') }}" class="btn btn-primary my-3 mb-4"> Torna indietro</a> --}}
        @if ($restaurant)
            <div class="d-flex gap-2">
                <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-primary my-3 mb-4"> <i
                        class="fa-solid fa-pen mt-2 me-2"> </i>Modifica</a>


                <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary my-3 mb-4"> <i
                        class="fa-solid fa-bars mt-2 me-2"></i> </i>Menù</a>
            </div>

            <div class="show-restaurant d-flex">
                <img src="{{ $restaurant->getImageUri() }}" class="card-img-top card-show-restaurant" alt="...">
                <div class="show-info-rest ms-5 d-flex flex-column">
                    <div>
                        @forelse ($restaurant->types as $type)
                            <div class="badge rounded-pill" style="background-color: {{ $type?->color }}">
                                {{ $type->name }}
                            </div>
                        @empty
                            -
                        @endforelse
                    </div>
                    <div><strong>Ristorante: </strong> {{ $restaurant->name_restaurant }} </div>
                    <div><strong>Indirizzo: </strong> {{ $restaurant->address }} </div>
                    <div> <strong>Telefono: </strong> {{ $restaurant->telephone }} </div>
                    <div><strong>Descrizione: </strong> {{ $restaurant->description }}</div>
                    <div><strong>P.IVA:</strong> {{ $restaurant->p_iva }}</div>

                </div>
            </div>
        @endif
    </div>
    {{-- MODALE --}}


@endsection
