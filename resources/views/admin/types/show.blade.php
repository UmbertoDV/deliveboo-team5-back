@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row">
        <h1>Stai vedendo {{ $type->name }}</h1>
    </div>
    <div class="card mt-4">
      <div class="card-body">
          <div class="row">
            <div class="col-6">
              {{-- NOME --}}
              <h2>Nome</h2>
              <div class="input-group input-group-sm mb-3">
                <span>{{ $type->name }}</span>
              </div>
              {{-- COLORE --}}
              <h2>Colore</h2>
              <div class="input-group-sm mb-3">
                <span>{!! $type->getBadgeHTML() !!}</span>
              </div>
            </div>
            <div class="col-6">
              <h2 class="text-center mb-2">Immagine</h2>
              <img class="mx-auto d-block rounded types-image-preview" id="image-preview" src="{{ $type->getImageUri() }}">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection