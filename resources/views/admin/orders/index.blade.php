@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 ms-3">Lista ordini</h1>
        <a class="btn-violet ms-3" href="{{ route('admin.orders.trash') }}"><i
                class="fa-solid fa-trash-can  text-white me-2"></i>Cestino</a>
        <table class="table table-striped mt-5">
            <thead>
                <tr class="table-primary">
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
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->surname }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->telephone }}</td>
                        <td>{{ $order->status }}</td>
                        <td>€{{ $order->total }}</td>
                        <td class="d-flex">
                            <a href={{ route('admin.orders.show', $order) }}>
                                <i class=" btn-order fa-solid fa-eye mt-2 me-2"></i>
                            </a>

                            <a type="button" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $order->id }}">
                                <i class=" btn-order fa-solid fa-trash-can mt-2"></i>
                            </a>
                            @foreach ($orders as $order)
                                <!-- Modal -->
                                <div class="modal fade" id="delete-modal-{{ $order->id }}" tabindex="-1"
                                    aria-labelledby="delete-modal-{{ $order->id }}-label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="delete-modal-{{ $order->id }}-label">
                                                    Sposta nel cestino</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                Sei sicuro di voler spostare nel cestino l'ordine n°
                                                <strong>{{ $order->id }}</strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Annulla</button>

                                                <form action="{{ route('admin.orders.destroy', $order) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button type="submit" class="btn btn-danger">Sposta</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $orders->links('pagination::bootstrap-5') }}
@endsection
