@extends('layouts.app')

@section('content')
    <a class="btn btn-primary my-3" href="{{ route('admin.orders.index') }}">Torna alla lista</a>
    <h1 class="text-center mt-4">Dettagli ordine n° {{ $order->id }}</h1>
    <div class="row">
        <div class="card col-6 offset-3 card-order">
            <div class="card-body">
                <div class="div">
                    <h5 class="text-center">
                        <strong>ID ORDINE:</strong> {{ $order->id }}
                    </h5>
                </div>
                <h6 class="mb-2 my-3"><strong>Nome:</strong> {{ $order->name }}</h6>
                <h6 class="mb-2 my-3"><strong>Cognome:</strong> {{ $order->surname }}</h6>
                <h6 class="mb-2 my-3"><strong>e-mail:</strong> {{ $order->email }}</h6>
                <h6 class="mb-2 my-3"><strong>Indirizzo:</strong> {{ $order->address }}</h6>
                <h6 class="mb-2 my-3"><strong>Ora e data ordine:</strong> {{ $order->updated_at }}</h6>
                <h6 class="mb-2 my-3"><strong>Telefono:</strong> {{ $order->telephone }}</h6>
                <h6 class="mb-2 my-3"><strong>Totale:</strong> €{{ $order->total }}</h6>
                <h6 class="mb-2 my-3"><strong>Stato:</strong> {{ $order->status }}</h6>
                <h6 class="mt-4"><strong>Note:</strong></h6>
                <p>{{ $order->note }}</p>

            </div>
        </div>
    </div>
@endsection
