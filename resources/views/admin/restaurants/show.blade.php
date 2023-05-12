@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card" style="width: 18rem;">
        <img src="{{$restaurant->getImageUri()}}" class="card-img-top" alt="...">
        <div class="card-body">
            <strong>Ristorante: </strong> {{ $restaurant->name }} <br />
            <strong>Indirizzo: </strong> {{ $restaurant->address }} <br />
            <strong>Email: </strong> {{ $restaurant->email }} <br />
            <strong>Telefono: </strong> {{ $restaurant->telephone }} <br />
            <strong>Descrizione: </strong> {{ $restaurant->description }} <br />
            <strong>P.IVA:</strong> {{ $restaurant->p_iva }} <br />
            
        </div>
      </div>
      <a href="{{ route('admin.restaurants.index') }}" class="btn btn-primary my-5"> Torna indietro</a>
</div>






@endsection