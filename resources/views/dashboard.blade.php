@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3>Benvenuto {{ Auth::user()->name }}!</h3>
                        {{-- {{ __('Inserisci un ristorante!') }} --}}
                        {{-- <div class="my-3">
                            <a href="{{ route('admin.restaurants.create') }}" class="btn-violet">
                                Aggiungi il tuo ristorante
                            </a>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
