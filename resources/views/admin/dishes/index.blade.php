@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-4">
        <a class="btn-violet" href="{{ route('admin.dishes.create') }}"><i
                class="fa-solid fa-circle-plus  text-white me-2"></i>Aggiungi un nuovo piatto</a>
        <a class="btn-violet" href="{{ route('admin.types.index') }}"><i
                class="fa-solid fa-diamond text-white me-2"></i>Aggiungi una tipologia</a>

        <a class="btn-violet" href="{{ route('admin.dishes.trash') }}"><i
                class="fa-solid fa-trash-can  text-white me-2"></i>Cestino</a>

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
                    {{-- DESCRZIONE --}}
                    <th scope="col"><a
                            href="{{ route('admin.dishes.index') }}?sort=types&order={{ $sort == 'types' && $order != 'DESC' ? 'DESC' : 'ASC' }}">Descrizione</a>

                        @if ($sort == 'types')
                            <a
                                href="{{ route('admin.dishes.index') }}?sort=types&order={{ $sort == 'types' && $order != 'DESC' ? 'DESC' : 'ASC' }}"><i
                                    class="fa-solid fa-caret-down ms-2 @if ($order == 'DESC') rotate-180 @endif"></i></a>
                        @endif
                    </th>
                    {{-- DESCRZIONE --}}
                    <th scope="col"><a
                            href="{{ route('admin.dishes.index') }}?sort=price&order={{ $sort == 'price' && $order != 'DESC' ? 'DESC' : 'ASC' }}">Prezzo</a>

                        @if ($sort == 'price')
                            <a
                                href="{{ route('admin.dishes.index') }}?sort=price&order={{ $sort == 'price' && $order != 'DESC' ? 'DESC' : 'ASC' }}"><i
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
                            <div class="image-prev-index">
                                <img src="{{ $dish->getImageUri() }}" alt="{{ $dish->name }}" id="image-prev-i">
                            </div>
                        </td>
                        <td>
                            <div>{{ $dish->name }}</div>
                        </td>
                        <td class="abstract">{{ $dish->getAbstract() }}</td>
                        <td>{{ $dish->price }} €</td>
                        <td>{{ $dish->created_at }}</td>
                        <td>{{ $dish->updated_at }}</td>
                        <td class="dishes-icons text-center">
                            <div>
                                <a href="{{ route('admin.dishes.show', $dish) }}"><i class="fa-solid fa-eye mt-2"></i></a>
                            </div>
                            <div>
                                <a href="{{ route('admin.dishes.edit', $dish) }}"><i class="fa-solid fa-pen mt-2"></i></a>
                            </div>
                            <div>
                                <a type="button" data-bs-toggle="modal"
                                    data-bs-target="#delete-modal-{{ $dish->id }}">
                                    <i class="fa-solid fa-trash-can mt-2"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                @empty
                @endforelse

            </tbody>
        </table>
        {{-- PAGINATION --}}
        {{-- {{ $dishes->links() }} --}}
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

                        <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST" class="">
                            @method('delete')
                            @csrf

                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
