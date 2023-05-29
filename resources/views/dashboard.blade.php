@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        <div class="gap-3 d-flex align-items-end">
                            <div class="fw-bold homelogo-text">
                                Benvenuto su
                            </div>
                            <div class="logo_deliveboo">
                                <img class="home-logo" src="https://i.ibb.co/zZ2kPfd/deliveboodef.png" alt="">
                            </div>
                            <div class="fw-bold homelogo-text">
                                {{ Auth::user()->name }}!
                            </div>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
