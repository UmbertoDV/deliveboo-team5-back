@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="">
            {{-- Se stai modificando i progetti pubblicati torna li alla fine della modifica --}}
            @if ($dish->visibility == 1)
                <a class="btn btn-primary mt-3 mb-3" href="{{ route('admin.dishes.index', ['visibility' => 1]) }}"> Torna
                    Indietro</a>
            @else
                {{-- sennò vai alla bozze --}}
                <a class="btn btn-primary mt-3 mb-3" href="{{ route('admin.dishes.index', ['visibility' => 0]) }}">Vai alle
                    bozze</a>
            @endif
            <div class="card card-body">
                <div class="d-flex">
                    <div>
                        <span class="badge rounded-pill type-pill mb-3">
                            {{ $dish->types?->name }}
                        </span>
                        <h2>{{ $dish->name }}</h2>
                        <p>{{ $dish->description }}</p>
                    </div>
                    <div class="ms-5">
                        <img src="{{ $dish->getImageUri() }}" alt="{{ $dish->name }}">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
