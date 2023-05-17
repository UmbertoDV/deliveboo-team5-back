@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-3">
                    <div class="card-header">{{ __('Registrazione') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
                            @csrf
                            {{-- NOME --}}
                            <div class="mb-4 row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
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
                                    {{-- Controllo Client Side --}}
                                    <span class="fw-bold text-danger tiny-text" id="email-error">
                                    </span>
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
                                    {{-- Controllo Client Side --}}
                                    <span class="fw-bold text-danger tiny-text" id="password-error">
                                    </span>
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
                                    {{-- Controllo Client Side --}}
                                    <span class="fw-bold text-danger tiny-text" id="password-confirm-error">
                                    </span>
                                </div>
                            </div>
                            {{-- NOME ATTIVITà --}}
                            <div class="mb-4 row">
                                <label for="name_restaurant"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome Attività') }}</label>

                                <div class="col-md-6">
                                    <input id="name_restaurant" type="text"
                                        class="form-control @error('name_restaurant') is-invalid @enderror"
                                        name="name_restaurant" value="{{ old('name_restaurant') }}"
                                        autocomplete="name_restaurant" autofocus>
                                    {{-- Controllo Client Side --}}
                                    <span class="fw-bold text-danger tiny-text" id="name-activity-error">
                                    </span>
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
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" autocomplete="address" autofocus>
                                    {{-- Controllo Client Side --}}
                                    <span class="fw-bold text-danger tiny-text" id="address-error">
                                    </span>
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
                                    class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="text"
                                        class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                        value="{{ old('telephone') }}" autocomplete="telephone" autofocus>
                                    {{-- Controllo Client Side --}}
                                    <span class="fw-bold text-danger tiny-text" id="telephone-error">
                                    </span>
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
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}</label>

                                <div class="col-md-6">
                                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                                        value="{{ old('description') }}" autocomplete="description" autofocus></textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- P.IVA --}}
                            <div>
                                <div class="">
                                    <label for="type" class="form-label">P.iva </label>
                                    <input type="number" name="p_iva" id="p_iva" class="@error('p_iva') is-invalid @enderror form-control" value="{{ old('p_iva') }}">
                                    {{-- Controllo Client Side --}}
                                    <span class="fw-bold text-danger tiny-text" id="p_iva-error">
                                    </span>
                                    @error('p_iva')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- TYPES --}}
                            <div>
                                <div class="mt-4 form-check @error('types') is-invalid @enderror">
                                    @foreach ($types as $type)
                                        <label for="type-{{ $type->id }}" class="form-label">
                                            {{ $type->name }}
                                        </label>
                                        <input type="checkbox" name="types[]" id="type-{{ $type->id }}"
                                            value="{{ $type->id }}" class="form-check-control me-3"
                                            @if (in_array($type->id, old('type', $restaurant_type ?? []))) checked @endif>
                                    @endforeach
                                    @error('types')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            {{-- IMMAGINE --}}
                            <div class="image-container mt-2">
                                <div class="">
                                    <label for="image" class="form-label">
                                        Immagine
                                    </label>
                                    <input type="file" name="image" id="image"
                                        class="@error('image') is-invalid @enderror form-control">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="col-md-6 offset-md-5">
                                    <button type="submit" class="btn btn-primary mt-3">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script src="{{ asset('js/validation.js') }}" ></script>
@endpush