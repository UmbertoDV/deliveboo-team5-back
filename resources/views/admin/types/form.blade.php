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
          <form method="POST" action="{{ route('admin.types.update') }}" class="row" enctype="multipart/form-data">
            @method('PUT')
        @else
          <form method="POST" action="{{ route('admin.types.store') }}" class="row" enctype="multipart/form-data">
        @endif
        @csrf
          <div class="row">
            <div class="col-6">
              <label for="name" class="form-label">Nome</label>
              <div class="input-group input-group-sm mb-3">
                <input type="text" name="name" class="form-control">
              </div>
              <label for="image" class="form-label">Immagine</label>
              <div class="input-group input-group-sm mb-3">
                <input type="file" id="image" name="image" class="form-control">
              </div>
                <label for="color" class="form-label">Colore</label>
              <div class="input-group-sm mb-3">
                <input type="color" class="form-control form-control-color force-width" id="exampleColorInput" value="#563d7c" title="Choose your color">
              </div>
              <div class="col-auto text-center">
                <button type="submit" class="btn btn-primary mt-3 w-25">Salva</button>
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