@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="d-flex align-items-center justify-content-between">
      <h1>Stai vedendo tutti i TYPES</h1>
      <div>
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary">Crea un TYPES</a>
        <a href="{{ route('admin.types.trash') }}" class="btn btn-primary">Cestino</a>
      </div>
  </div>
  <div class="card mt-4">
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">@sortablelink('id', 'ID')</th>
            <th scope="col">@sortablelink('name', 'Nome')</th>
            <th scope="col">Colore</th>
            <th scope="col">Icona</th>
            <th scope="col">@sortablelink('updated_at', 'Ultima Modifica')</th>
            <th scope="col">@sortablelink('created_at', 'Data Creazione')</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($types as $type)
            <tr>
              <th scope="row">{{ $type->id }}</th>
              <td>{{ $type->name }}</td>
              <td>{!! $type->getBadgeHTML() !!}</td>
              <td class="personal-w"><img style="width: 20%" src="{{ $type->image }}" alt="{{ $type->name }}"></td>
              <td>{{ $type->updated_at }}</td>
              <td>{{ $type->created_at }}</td>
              <td>
                <a href="{{ route('admin.types.show', $type) }}"><i class="bi bi-eye mx-2"></i></a>
                <a href="{{ route('admin.types.edit', $type) }}"><i class="bi bi-pencil mx-2"></i></i></a>
                <a href="{{ route('admin.types.edit', $type) }}" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-post-{{ $type->id }}"><i class="bi bi-trash mx-2"></i></i></a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8">Nessun risultato</td>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $types->links() }}
    </div>
  </div>
</div>

@foreach ($types as $types)
  <div class="modal modal-lg fade" id="delete-modal-post-{{ $types->id }}" tabindex="-1" aria-labelledby="delete-modal-post-{{ $types->id }}-label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="delete-modal-post-{{ $types->id }}-label">Rimuovi Types</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sei sicuro di voler eliminare il Types "{{ $types->title }}"? <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <form method="POST" action="{{ route('admin.types.destroy', $types) }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection