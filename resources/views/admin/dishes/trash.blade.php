@extends('layouts.app')

@section('content')
    <div class="container mt-4 mb-3">
        <a class="btn btn-primary" href="{{ route('admin.dishes.index') }}"><i
                class="fa-solid fa-circle-left  text-white me-2"></i>Torna ai piatti</a>


    </div>
    <div class="container">

        <table class="table">
            <thead>
                <tr class="table-primary">
                    {{-- ID --}}
                    <th scope="col">
                        <a
                            href="{{ route('admin.dishes.index') }}?sort=id&order={{ $sort == 'id' && $order != 'DESC' ? 'DESC' : 'ASC' }}">Id</a>

                        @if ($sort == 'id')
                            <a
                                href="{{ route('admin.dishes.index') }}?sort=id&order={{ $sort == 'id' && $order != 'DESC' ? 'DESC' : 'ASC' }}">
                                <i
                                    class="fa-solid fa-caret-down ms-2 @if ($order == 'DESC') rotate-180 @endif"></i></a>
                        @endif
                    </th>
                    {{-- IMG --}}
                    <th scope="col"><a
                            href="{{ route('admin.dishes.index') }}?sort=image&order={{ $sort == 'image' && $order != 'DESC' ? 'DESC' : 'ASC' }}">Immagine</a>

                        @if ($sort == 'image')
                            <a
                                href="{{ route('admin.dishes.index') }}?sort=image&order={{ $sort == 'image' && $order != 'DESC' ? 'DESC' : 'ASC' }}"><i
                                    class="fa-solid fa-caret-down ms-2 @if ($order == 'DESC') rotate-180 @endif"></i></a>
                        @endif
                    </th>
                    {{-- NAME --}}
                    <th scope="col"><a
                            href="{{ route('admin.dishes.index') }}?sort=name&order={{ $sort == 'name' && $order != 'DESC' ? 'DESC' : 'ASC' }}">Nome</a>

                        @if ($sort == 'name')
                            <a
                                href="{{ route('admin.dishes.index') }}?sort=name&order={{ $sort == 'name' && $order != 'DESC' ? 'DESC' : 'ASC' }}"><i
                                    class="fa-solid fa-caret-down ms-2 @if ($order == 'DESC') rotate-180 @endif"></i></a>
                        @endif
                    </th>
                    {{-- TYPES --}}
                    <th scope="col"><a
                            href="{{ route('admin.dishes.index') }}?sort=types&order={{ $sort == 'types' && $order != 'DESC' ? 'DESC' : 'ASC' }}">Descrizione</a>

                        @if ($sort == 'types')
                            <a
                                href="{{ route('admin.dishes.index') }}?sort=types&order={{ $sort == 'types' && $order != 'DESC' ? 'DESC' : 'ASC' }}"><i
                                    class="fa-solid fa-caret-down ms-2 @if ($order == 'DESC') rotate-180 @endif"></i></a>
                        @endif
                    </th>

                    {{-- CREATED --}}
                    <th scope="col">
                        <a
                            href="{{ route('admin.dishes.index') }}?sort=created_at&order={{ $sort == 'created_at' && $order != 'DESC' ? 'DESC' : 'ASC' }}">Creato</a>

                        @if ($sort == 'created_at')
                            <a
                                href="{{ route('admin.dishes.index') }}?sort=created_at&order={{ $sort == 'created_at' && $order != 'DESC' ? 'DESC' : 'ASC' }}"><i
                                    class="fa-solid fa-caret-down ms-2 @if ($order == 'DESC') rotate-180 @endif"></i></a>
                        @endif
                    </th>
                    {{-- UPDATED --}}
                    <th scope="col">
                        <a
                            href="{{ route('admin.dishes.index') }}?sort=updated_at&order={{ $sort == 'updated_at' && $order != 'DESC' ? 'DESC' : 'ASC' }}">Modificato</a>

                        @if ($sort == 'updated_at')
                            <a
                                href="{{ route('admin.dishes.index') }}?sort=updated_at&order={{ $sort == 'updated_at' && $order != 'DESC' ? 'DESC' : 'ASC' }}"><i
                                    class="fa-solid fa-caret-down ms-2 @if ($order == 'DESC') rotate-180 @endif"></i></a>
                        @endif
                    </th>

                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dishes as $dish)
                    <tr>
                        <th scope="row">{{ $dish->id }}</th>
                        <td>
                            <div class="image-prev-index border p-2 d-flex align-items-center">
                                <img src="{{ $dish->image }}" alt="{{ $dish->name }}" id="image-prev-i">
                            </div>
                        </td>
                        <td>
                            <div>{{ $dish->name }}</div>
                        </td>
                        <td class="col">{{ $dish->description }}</td>
                        <td>{{ $dish->created_at }}</td>
                        <td class="text-center">
                            <button class="ms-3 text-danger" data-bs-toggle="modal"
                                data-bs-target="#delete-modal-{{ $dish->id }}" title="Elimina il prodotto"><i
                                    class="fa-solid fa-trash"></i>
                            </button>
                            <button class="ms-3 text-success" data-bs-toggle="modal"
                                data-bs-target="#restore-modal-{{ $dish->id }}" title="Ripristina il prodotto"> <i
                                    class="fa-solid fa-arrow-up-from-bracket"></i>
                            </button>
                        </td>
                    </tr>

                @empty
                    <h4>Il cestino è vuoto.</h4>
                @endforelse

            </tbody>
        </table>
        {{-- PAGINATION --}}
        {{ $dishes->links() }}
    </div>

    {{-- MODALE --}}
    @foreach ($dishes as $dish)
        <!-- Modal -->
        <div class="modal fade" id="delete-modal-{{ $dish->id }}" tabindex="-1" data-bs-backdrop="static"
            aria-labelledby="delete-modal-{{ $dish->id }}-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="delete-modal-{{ $dish->id }}-label">Conferma eliminazione</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        Sei sicuro di voler spostare nel cestino il piatto: <strong>{{ $dish->name }}</strong> con ID
                        <strong> {{ $dish->id }}</strong>? <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                        <form action="{{ route('admin.dishes.force-delete', $dish) }}" method="POST" class="">
                            @method('delete')
                            @csrf

                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- Ripristino --}}
        {{-- Modale ripristino --}}
        <div class="modal fade" id="restore-modal-{{ $dish->id }}" tabindex="-1" data-bs-backdrop="static"
            aria-labelledby="restore-modal-{{ $dish->id }}-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="delete-modal-{{ $dish->id }}-label">Conferma Ripristino</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        Sei sicuro di voler ripristinare il progetto <strong>{{ $dish->title }}</strong> con ID
                        <strong> {{ $dish->id }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                        <form action="{{ route('admin.dishes.restore', $dish->id) }}" method="POST" class="">
                            @method('put')
                            @csrf

                            <button type="submit" class="btn btn-success">Ripristina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
