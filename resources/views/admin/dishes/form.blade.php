@extends('layouts.app')
{{-- TO DO --}}
@section('content')
    <div class="form-dish-bg">
        <section class="container form-contain-dish pt-4">

            <a href="{{ route('admin.dishes.index') }}" class="btn-violet">
                Vai al Menu
            </a>
            <div class="card reg-card mt-4">
                <div class="card-header">
                    <h4 class="mb-2 ms-3 mt-2">{{ $dish->id ? 'Modifica ' . $dish->title : 'Aggiungi un nuovo piatto' }}
                    </h4>
                </div>

                <div class="card-body card-dish p-3">

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
                                <textarea name="description" id="description" style="resize:none"
                                    class="@error('description') is-invalid @enderror form-control">{{ old('description', $dish->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- SELECT TYPE --}}
                            {{-- <div>
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
                        </div> --}}

                            {{-- PRICE --}}
                            <div>
                                <div class="">
                                    <label for="type class=" class="form-label">
                                        Prezzo
                                    </label>
                                    <input type="number" name="price" id="price" step="0.01" min="0"
                                        class="@error('price') is-invalid @enderror form-control"
                                        value="{{ old('price', $dish->price) }}">
                                    @error('price')
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
                                        value="{{ old('image', $dish->image) }}">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- VISIBILITY --}}
                            <div class="mt-4 form-check @error('visibility') is-invalid @enderror">

                                <label for="visibility" class="form-label ms-3">
                                    <i class="fa-solid fa-eye me-2"></i>Visibility
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
                            {{-- Button --}}
                            <div class="align-self-end">
                                <button type="submit" class="btn-form-dish mt-2">
                                    Salva
                                </button>
                            </div>
                        </div>
                        {{-- Right Side Image Preview --}}
                        <div class="right-side-dish d-flex flex-column">
                            <div class="image image-upload p-2">
                                <img src="{{ $dish->getImageUri() }}" alt="{{ $dish->title }}" id="image_preview">
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </section>
    </div>
    <div class="gradient"></div>
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
