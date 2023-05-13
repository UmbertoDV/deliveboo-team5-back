@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="show-dishes">
            <div class="mt-5 mb-4">
                {{-- Se stai modificando i progetti pubblicati torna li alla fine della modifica --}}
                @if ($dish->visibility == 1)
                    <a class="mt-5 mb-3" href="{{ route('admin.dishes.index', ['visibility' => 1]) }}"> Torna
                        Indietro</a>
                @else
                    {{-- sennò vai alla bozze --}}
                    <a class="btn btn-primary mt-3 mb-3" href="{{ route('admin.dishes.index', ['visibility' => 0]) }}">Vai
                        alle
                        bozze</a>
                @endif
            </div>

            <div class="card show-card-dish" style="width: 18rem;">
                <img src="{{ $dish->getImageUri() }}" alt="{{ $dish->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $dish->name }}</h5>
                    <p class="card-text">{{ $dish->description }}</p>
                    <div class="icon-show-dish">
                        <a href="{{ route('admin.dishes.edit', $dish) }}"> Modifica <i class="fa-solid fa-pen mt-2"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
