@extends('layouts.app')

@section('content')

    <div class="container pt-5 d-flex justify-content-end">
    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary">
      Aggiungi nuovo ristorante
    </a>
  </div>


<div class="container py-5">
   

    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Descrizione</th>
                <th scope="col">P.IVA</th>
                <th scope="col">Immagine</th>
                <th scope="col"></th>
                <th scope="col"></th>
                
            </tr>
        </thead>
        <tbody>

            @foreach ($restaurants as $restaurant)
            <tr>
                <th scope="row">{{ $restaurant->name }}</th>
                <td>{{ $restaurant->address }}</td>
                <td>{{ $restaurant->email }}</td>
                <td>{{ $restaurant->telephone }}</td>
                <td>{{ $restaurant->getAbstract() }}</td>
                <td>{{ $restaurant->p_iva }}</td>
                <td><div class="image-prev-index border p-2 d-flex align-items-center">
                    <img src="{{ $restaurant->getImageUri() }}" alt="{{ $restaurant->name }}" id="image-prev-i">
                </div></td>
                
                <td class="d-flex">
                 <a href="{{ route('admin.restaurants.show', $restaurant)}}">
                    <i class="bi bi-eye mx-2"> <button class="btn btn-primary">Dettaglio</button> </i>
                </a>

                <a href="{{ route('admin.restaurants.edit', $restaurant)}}">
                    <i class="bi bi-eye mx-2"> <button class="btn btn-primary">Modifica</button> </i>
                </a>


                <a href="{{ route('admin.restaurants.edit', $restaurant)}}" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $restaurant->id}}">
                    <i class="bi bi-trash mx-2"> </i>
                </a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-modal-{{ $restaurant->id }}">
                            <i class="fa-solid fa-trash">Elimina</i>
                        </button>

            @foreach ($restaurants as $restaurant)

            <div class="modal fade" id="delete-modal-{{ $restaurant->id }}" tabindex="-1"
                aria-labelledby="delete-modal-{{ $restaurant->id }}-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="delete-modal-{{ $restaurant->id }}-label">
                                Conferma eliminazione</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            Sei sicuro di voler eliminare l'ordine n° <strong>{{ $restaurant->id }}</strong>
                            <br>
                            L'operazione non è reversibile
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Annulla</button>

                                <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn btn-danger">Elimina</button>
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
       

        <div class="mt-3">

            {{ $restaurants->links() }}
        </div>

@endsection



