@extends('layouts.app')


@section('content')

<div class="container">

<div class="">
    <h2 class="my-4">{{ $restaurant->id ? 'Modifica informazioni ristorante ' . $restaurant->title : 'Aggiungi un nuovo ristorante' }}
    </h2>

    <a href="{{ route('admin.restaurants.index') }}" class="btn btn-primary">
        Vai al Menu
    </a>
</div>

<div class="my-5">
    <div class="body-form card p-3">

        @if ($restaurant->id)
            <form method="POST" action="{{ route('admin.restaurants.update', $restaurant) }}" enctype="multipart/form-data">
                @method('put')
            @else
                <form method="POST" action="{{ route('admin.restaurants.store') }}" enctype="multipart/form-data">
        @endif
        @csrf
        <div class="input-container d-flex">
            {{-- Left side --}}
            <div class="d-flex flex-column">

                {{-- NOME ATTIVITA' --}}
                <div class="title-container">
                    <label for="name" class="form-label">
                        Nome attività
                    </label>
                    <input type="text" name="name" id="name"
                        class="@error('name') is-invalid @enderror form-control"
                        value="{{ old('name', $restaurant->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- INDIRIZZO --}}
                <div class="title-container">
                    <label for="address" class="form-label">
                        Indirizzo
                    </label>
                    <input type="text" name="address" id="address"
                        class="@error('address') is-invalid @enderror form-control"
                        value="{{ old('address', $restaurant->address) }}">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="title-container">
                    <label for="email" class="form-label">
                        Email
                    </label>
                    <input type="text" name="email" id="email"
                        class="@error('email') is-invalid @enderror form-control"
                        value="{{ old('email', $restaurant->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- TELEFONO --}}
                <div>
                    <div class="">
                        <label for="type class=" class="form-label">
                            Telefono
                        </label>
                        <input type="number" name="telephone" id="telephone"
                            class="@error('telephone') is-invalid @enderror form-control"
                            value="{{ old('telephone', $restaurant->telephone) }}">
                        @error('telephone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        @error('telephone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                {{-- DESCRIZIONE --}}
                <div class="text-container mt-1">
                    <label for="description" class="form-label">
                        Descrizione
                    </label>
                    <textarea name="description" id="description" class="@error('description') is-invalid @enderror form-control">{{ old('description', $restaurant->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                  {{-- P.IVA --}}
                  <div>
                    <div class="">
                        <label for="type class=" class="form-label">
                            P.iva
                        </label>
                        <input type="number" name="p_iva" id="p_iva"
                            class="@error('p_iva') is-invalid @enderror form-control"
                            value="{{ old('p_iva', $restaurant->p_iva) }}">
                        @error('p_iva')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        @error('p_iva')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                {{-- IMMAGINE --}}
                <div class="image-container mt-1">
                    <div class="">
                        <label for="image" class="form-label">
                            Immagine
                        </label>
                        <input type="file" name="image" id="image"
                            class="@error('image') is-invalid @enderror form-control"
                            value="{{ old('image', $restaurant->image) }}">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>


                {{-- Button --}}
                <div class="align-self-end">
                    <button type="submit" class="btn btn-primary mt-4">
                        Salva
                    </button>
                </div>
            </div>
            {{-- Right Side Image Preview --}}
            {{-- <div class="d-flex flex-column">
                <div class="image-upload border p-2">
                    <img src="{{ $restaurant->image }}" alt="{{ $restaurant->title }}" id="image_preview">
                </div>
            </div> --}}
        </div>

        </form>
    </div>
</div>
</section>
</div>
<script></script>
@endsection




