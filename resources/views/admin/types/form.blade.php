@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row">
      @if ($type->id)
        <h1>Stai modificando un TYPES</h1>
      @else
        <h1>Stai creando un TYPES</h1>
      @endif
      <span>Compila tutti campi qua sotto</span>
    </div>
    <div class="card mt-4">
      <div class="card-body">
        @if ($type->id)
          <form method="POST" action="{{ route('admin.types.update', $type) }}" class="row" enctype="multipart/form-data">
            @method('put')
        @else
          <form method="POST" action="{{ route('admin.types.store') }}" class="row" enctype="multipart/form-data">
        @endif
        @csrf
          <div class="row">
            <div class="col-6">
              {{-- NOME --}}
              <label for="name" class="form-label">Nome</label>
              <div class="input-group input-group-sm mb-3">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $type->name) }}">
              </div>
              {{-- IMMAGINE --}}
              <label for="image" class="form-label">Immagine</label>
              <div class="input-group input-group-sm mb-3">
                <input type="file" id="image" name="image" class="form-control">
              </div>
              {{-- COLORE --}}
                <label for="color" class="form-label">Colore</label>
              <div class="input-group-sm mb-3">
                <input type="color" name="color" class="form-control form-control-color force-width" id="exampleColorInput" value="{{ old('color', $type->color) }}" title="Choose your color">
              </div>
              <div class="col-auto text-center">
                <input type="submit" class="btn btn-primary mt-3 w-25" value="Salva">
              </div>
            </div>
            <div class="col-6">
              <div class="text-center mb-2">Preview Immagine</div>
              <img class="mx-auto d-block rounded types-image-preview" id="image-preview" src="https://picsum.photos/600/500">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection