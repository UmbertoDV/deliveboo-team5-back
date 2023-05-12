@extends('layouts.app')

@section('content')
    <h1 class="my-4">Cestino ordini</h1>
    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Stato</th>
                <th scope="col">Totale</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->surname }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->telephone }}</td>
                    <td>{{ $order->status }}</td>
                    <td>€{{ $order->total }}</td>
                    <td class="d-flex">

                        <button type="button" class="btn btn-success me-2" data-bs-toggle="modal"
                            data-bs-target="#restore-modal-{{ $order->id }}">
                            {{-- <i class="fa-solid fa-rotate-right"></i> --}}
                            Ripristina
                        </button>

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-modal-{{ $order->id }}">
                            {{-- <i class="fa-solid fa-trash"></i> --}}
                            Elimina
                        </button>


                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $orders->links('pagination::bootstrap-5') }}

    @foreach ($orders as $order)
        <!-- Modal -->
        <div class="modal fade" id="delete-modal-{{ $order->id }}" tabindex="-1"
            aria-labelledby="delete-modal-{{ $order->id }}-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="delete-modal-{{ $order->id }}-label">
                            Conferma eliminazione</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        Sei sicuro di voler eliminare l'ordine n° <strong>{{ $order->id }}</strong>?
                        <br>
                        L'operazione non è reversibile
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                        <form action="{{ route('admin.orders.destroy', $order) }}" method="POST">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal restore -->
        <div class="modal fade" id="restore-modal-{{ $order->id }}" tabindex="-1"
            aria-labelledby="restore-modal-{{ $order->id }}-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="restore-modal-{{ $order->id }}-label">
                            Conferma ripristino</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        Sei sicuro di voler ripristinare l'ordine n° <strong>{{ $order->id }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                        <form action="{{ route('admin.orders.restore', $order) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <button type="submit" class="btn btn-success">Ripristina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
