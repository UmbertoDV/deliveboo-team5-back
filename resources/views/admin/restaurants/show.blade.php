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

                <a class="btn btn-primary my-3 mb-4" type="button" data-bs-toggle="modal"
                    data-bs-target="#delete-modal-{{ $restaurant->id }}">
                    <i class="fa-solid fa-trash-can mt-2"></i> Elimina
                </a>
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

    <!-- Modal -->


    <div class="modal fade" id="delete-modal-{{ $restaurant->id }}" tabindex="-1" data-bs-backdrop="static"
        aria-labelledby="delete-modal-{{ $restaurant->id }}-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete-modal-{{ $restaurant->id }}-label">Conferma eliminazione
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    Sei sicuro di voler spostare nel cestino il ristorante: <strong>{{ $restaurant->name }}</strong>
                    con ID
                    <strong> {{ $restaurant->id }}</strong>? <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                    <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST" class="">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
