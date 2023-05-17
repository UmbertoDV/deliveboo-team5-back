@extends('layouts.app')

@section('content')
    <div class="mt-3 form-register-ctn d-flex justify-content-center">
        <div class="row justify-content-center form-register">
            <div class="col">

                <div class="card my-3 reg-card">
                    <div class="card-header">{{ __('Registrazione') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                            onsubmit="return validateForm()">
                            @csrf
                            <div class="d-flex">
                                <div class="col-3 right-register">
                                    {{-- NOME --}}
                                    <div class="mb-4 row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" autocomplete="name" autofocus>
                                            {{-- Controllo Client Side --}}
                                            <span class="fw-bold text-danger tiny-text" id="name-error">
                                            </span>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- SURNAME --}}
                                    <div class="mb-4 row">
                                        <label for="surname"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                                        <div class="col-md-6">
                                            <input id="surname" type="text"
                                                class="form-control @error('surname') is-invalid @enderror" name="surname"
                                                value="{{ old('surname') }}" autocomplete="surname" autofocus>
                                            {{-- Controllo Client Side --}}
                                            <span class="fw-bold text-danger tiny-text" id="surname-error">
                                            </span>
                                            @error('surname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- EMAIL --}}
                                    <div class="mb-4 row">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- PASSWORD & CONFERMA --}}
                                    <div class="mb-4 row">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" autocomplete="new-password">
                                        </div>
                                    </div>


                                    {{-- IMAGE PREVIEW --}}
                                    <div class="row right-side-reg d-flex justify-content-center">
                                        <div class="col-10 image image-upload p-2">
                                            <img src="{{ $restaurant->getImageUri() }}" id="image_preview">
                                        </div>
                                    </div>

                                </div>



                                <div lass="left-register">
                                    {{-- NOME ATTIVITà --}}
                                    <div class="mb-4 row">
                                        <label for="name_restaurant"
                                            class="col-md-2 col-form-label text-md-right">{{ __('Nome Attività') }}</label>

                                        <div class="col-md-6">
                                            <input id="name_restaurant" type="text"
                                                class="form-control @error('name_restaurant') is-invalid @enderror"
                                                name="name_restaurant" value="{{ old('name_restaurant') }}"
                                                autocomplete="name_restaurant" autofocus>

                                            @error('name_restaurant')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- INDIRIZZO --}}
                                    <div class="mb-4 row">
                                        <label for="address"
                                            class="col-md-2 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                                        <div class="col-md-6">
                                            <input id="address" type="text"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                value="{{ old('address') }}" autocomplete="address" autofocus>

                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- TELEPHONE --}}
                                    <div class="mb-4 row">
                                        <label for="telephone"
                                            class="col-md-2 col-form-label text-md-right">{{ __('Telefono') }}</label>

                                        <div class="col-md-6">
                                            <input id="telephone" type="text"
                                                class="form-control @error('telephone') is-invalid @enderror"
                                                name="telephone" value="{{ old('telephone') }}" autocomplete="telephone"
                                                autofocus>

                                            @error('telephone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- DESCRIPTION  --}}
                                    <div class="mb-4 row">
                                        <label for="description"
                                            class="col-md-2 col-form-label text-md-right">{{ __('Descrizione') }}</label>

                                        <div class="col-md-6">
                                            <textarea type="text" style="resize:none" class="form-control @error('description') is-invalid @enderror"
                                                name="description" value="{{ old('description') }}" autocomplete="description" autofocus></textarea>

                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }} </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- P.IVA --}}
                                    <div class="mb-4 row">
                                        <label for="p_iva" class="form-label col-form-label col-md-2 text-md-right">
                                            P.iva
                                        </label>
                                        <div class="col-md-6">
                                            <input type="number" name="p_iva" id="p_iva"
                                                class="@error('p_iva') is-invalid @enderror form-control"
                                                value="{{ old('p_iva') }}" autocomplete="telephone" autofocus>

                                            @error('p_iva')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong> {{ $message }} </strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- TYPES --}}
                                    <div class="row types-reg">
                                        <div class="mt-4 form-check @error('types') is-invalid @enderror">
                                            <div class="d-flex flex-wrap ">
                                                @foreach ($types as $type)
                                                    <div class="d-flex flex-icons mt-3">
                                                        <label for="type-{{ $type->id }}" class="form-label mb-0">
                                                            {{ $type->name }}
                                                        </label>
                                                        <span class="personal-w2"><img style="width: 25px"
                                                                src="{{ $type->image }}"
                                                                alt="{{ $type->name }}"></span>
                                                        <input type="checkbox" name="types[]"
                                                            id="type-{{ $type->id }}" value="{{ $type->id }}"
                                                            class="form-check-control me-3"
                                                            @if (in_array($type->id, old('type', $restaurant_type ?? []))) checked @endif>
                                                    </div>
                                                @endforeach
                                                {{-- @error('types')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror --}}
                                            </div>
                                        </div>
                                    </div>
                                    {{-- IMMAGINE --}}
                                    <div class="row image-container mt-4">
                                        <div class="row">
                                            <div class="col-11 d-flex flex-column">
                                                <label for="image" class="form-label">
                                                    Immagine
                                                </label>
                                                <div class="col">
                                                    <input type="file" name="image" id="image"
                                                        class="@error('image') is-invalid @enderror form-control img-reg">
                                                </div>
                                                <div class="mb-3 row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button type="submit" class="btn-register mt-3">
                                                            {{ __('Registrati') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="bg-form">
        <div class="row-1 row-a"></div>
        <div class="row-2 row-a"></div>
        <div class="row-3 row-a"></div>
        <div class="row-4 row-a"></div>
        <div class="row-5 row-a"></div>
        <div class="row-6 row-a"></div>
        <div class="row-7 row-a"></div>
        <div class="row-8 row-a"></div>
        <div class="row-9 row-a"></div>
        <div class="row-10 row-a"></div>
    </div>

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

{{-- @push('js')
    <script src="{{ asset('js/validation.js') }}"></script>
@endpush --}}
