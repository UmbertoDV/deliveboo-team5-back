@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="row">
    <h1>Stai vedendo tutti i TYPES nel CESTINO</h1>
  </div>
  <div class="card mt-4">
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Colore</th>
            <th scope="col">Ultima Modifica</th>
            <th scope="col">Data Creazione</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($types as $type)
            <tr>
              <th scope="row">{{ $type->id }}</th>
              <td>{{ $type->name }}</td>
              <td>{!! $type->getBadgeHTML() !!}</td>
              <td>{{ $type->updated_at }}</td>
              <td>{{ $type->created_at }}</td>
              <td>
                <a href="#" data-bs-toggle="modal" data-bs-target="#restore-modal-post-{{ $type->id }}"><i class="bi bi-arrow-repeat"></i></a>
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
  {{-- MODAL PER IL FORCE DELETE --}}
  <div class="modal modal-lg fade" id="delete-modal-post-{{ $types->id }}" tabindex="-1" aria-labelledby="delete-modal-post-{{ $types->id }}-label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="delete-modal-post-{{ $types->id }}-label">Rimuovi Types</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sei sicuro di voler eliminare definitivamente il Types "{{ $types->title }}"? <br>
          Operazione non reversibile.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <form method="POST" action="{{ route('admin.types.force-delete', $types) }}">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{-- MODAL PER IL RIPRISTINO --}}
  <div class="modal modal-lg fade" id="restore-modal-post-{{ $types->id }}" tabindex="-1" aria-labelledby="restore-modal-post-{{ $types->id }}-label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="restore-modal-post-{{ $types->id }}-label">Rimuovi Types</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sei sicuro di voler eliminare definitivamente il Types "{{ $types->title }}"? <br>
          Operazione non reversibile.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          <form method="POST" action="{{ route('admin.types.restore', $types) }}">
            @csrf
            @method('put')
            <button type="submit" class="btn btn-danger">Ripristina</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endsection