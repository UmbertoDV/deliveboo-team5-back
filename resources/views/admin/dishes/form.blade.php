@extends('layouts.app')
{{-- TO DO --}}
@section('content')
    <section class="container form-contain">

        <div class="">
            <h2 class="my-4">{{ $dish->id ? 'Modifica ' . $dish->title : 'Aggiungi un nuovo piatto' }}
            </h2>

            <a href="{{ route('admin.dishes.index') }}" class="btn-violet">
                Vai al Menu
            </a>
        </div>

        <div class="my-5">
            <div class="body-form card p-3">

                @if ($dish->id)
                    <form method="POST" action="{{ route('admin.dishes.update', $dish) }}" enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form method="POST" action="{{ route('admin.dishes.store') }}" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="input-container d-flex form-dishes">
                    {{-- Left side --}}
                    <div class="left-side-dish d-flex flex-column">

                        {{-- NAME --}}
                        <div class="title-container">
                            <label for="name" class="form-label">
                                Nome
                            </label>
                            <input type="text" name="name" id="name"
                                class="@error('name') is-invalid @enderror form-control"
                                value="{{ old('name', $dish->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- DESCRIPTION --}}
                        <div class="text-container mt-1">
                            <label for="description" class="form-label">
                                Descrizione
                            </label>
                            <textarea name="description" id="description" class="@error('description') is-invalid @enderror form-control">{{ old('description', $dish->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- SELECT TYPE --}}
                        <div>
                            <div class="">
                                <label for="type class=" class="form-label">
                                    Tipologia
                                </label>
                                <select name="type" id="type"
                                    class="form-select @error('type') is-invalid @enderror">
                                    @foreach ($types as $type)
                                        <option @if (old('type', $dish->$type) == $type->id) selected @endif
                                            value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- PRICE --}}
                        <div>
                            <div class="">
                                <label for="type class=" class="form-label">
                                    Prezzo
                                </label>
                                <input type="number" name="price" id="price"
                                    class="@error('price') is-invalid @enderror form-control"
                                    value="{{ old('price', $dish->price) }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- VISIBILITY --}}
                        <div class="mt-4 form-check @error('visibility') is-invalid @enderror">

                            <label for="visibility" class="form-label ms-3">
                                Visibility
                            </label>
                            <input type="checkbox" id="visibility" value="1" name="visibility"
                                class="form-check-control @error('visibility') is-invalid @enderror"
                                @checked(old('visibility', $dish->visibility))>

                            @error('visibility')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- IMMAGINE --}}
                        <div class="image-container mt-1">
                            <div class="">
                                <label for="image" class="form-label">
                                    Immagine
                                </label>
                                <input type="file" name="image" id="image"
                                    class="@error('image') is-invalid @enderror form-control"
                                    value="{{ old('image', $dish->image) }}">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- Button --}}
                        <div class="align-self-end">
                            <button type="submit" class="btn-form-dish mt-4">
                                Salva
                            </button>
                        </div>
                    </div>
                    {{-- Right Side Image Preview --}}
                    <div class="right-side-dish d-flex flex-column">
                        <div class="image image-upload border p-2">
                            <img src="{{ $dish->getImageUri() }}" alt="{{ $dish->title }}" id="image_preview">
                        </div>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </section>
    <script>
        const imageEl = document.getElementById('image');
        const imagePreviewEl = document.getElementById('image_preview');
        const imagePlaceholder = imagePreviewEl.src;
        imageEl.addEventListener(
            'change', () => {
                if (imageEl.files && imageEl.files[0]) {
                    const reader = new FileReader();
                    reader.readAsDataURL(imageEl.files[0]);
                    reader.onload = e => {
                        imagePreviewEl.src = e.target.result;
                    }
                } else {
                    imagePreviewEl.src = imagePlaceholder;
                }
            });
    </script>
@endsection
