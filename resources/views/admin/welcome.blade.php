@extends('layouts.app')


@section('content')
    <div class="bg-home form-dish-bg">

        <div class="jumbo d-flex">
            <div class="d-flex">
                <img src="{{ $restaurant->getImageUri() }}" class="" alt="...">
                <div class="ms-5 mt-3 d-flex flex-column gap-2 me-5">
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
                    <div class="mt-2">
                        <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn-form-dish"> <i
                                class="fa-solid fa-pen mt-2 me-2"> </i>Modifica</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="container ps-0 form-contain-dish dish-home">
            <div class="show-dishes">
                <div class="mb-5">
                    <a class="mt-5 ms-home" href="{{ route('admin.dishes.create') }}"> <i class="fa-solid fa-plus me-2"></i>
                        Aggiungi
                        un
                        piatto</a>
                </div>
                <div class="row row-cols-4 gap-3 px-2 d-flex justify-content-center">
                    @foreach ($dishes as $dish)
                        <div class="show-card-dish" style="width: 18rem;">
                            <img src="{{ $dish->getImageUri() }}" alt="{{ $dish->name }}" class="pt-3">
                            <div class="card-body card-dish">
                                <h5 class="card-title mt-3">{{ $dish->name }}</h5>
                                <p class="card-text">{{ $dish->description }}</p>
                                <span>{{ $dish->price }}€</span>
                                <div class="icon-show-dish">
                                    <a href="{{ route('admin.dishes.edit', $dish) }}"> Modifica <i
                                            class="fa-solid fa-pen mt-2 mb-4"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="gradient"></div>
@endsection
