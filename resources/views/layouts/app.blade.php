<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- FONT-AWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm {{ isset(Auth::user()->name) ? 'nav-bg' : 'navbar' }}">
            <div class="container">
                <a class="d-flex align-items-center" href="{{ url('dashboard') }}">
                    <div class="logo_deliveboo me-3">
                        <svg id="Deliveboo" data-name="Deliveboo" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 231.13 183.21">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: none;
                                        stroke: #f5bb05;
                                        stroke-linecap: round;
                                        stroke-miterlimit: 10;
                                        stroke-width: 8px;
                                    }

                                    .cls-2 {
                                        fill: #fff;
                                    }

                                    .cls-3 {
                                        fill: #fbbb0a;
                                    }
                                </style>
                            </defs>
                            <title>DELEVIBOO</title>
                            <line class="cls-1" x1="44.2" y1="69.54" x2="30.41" y2="69.54" />
                            <line class="cls-1" x1="43.77" y1="54.04" x2="16.16" y2="54.04" />
                            <path class="cls-2"
                                d="M161.19,33.36s11.14,1.69,15.64,3.38,7.54.11,8.33-1.69-3.6-10.24-14.41-12.72-20.37.72-25,7.57a15.66,15.66,0,0,0-1.92,14.38c.45,1.24,3.38,8.44,15.42,11.93s19.93,4.62,23.08,0c0,0,1.57-.56-3.6-1.24S162,51,162,51,156.91,36.74,157.81,36,161.19,33.36,161.19,33.36Z" />
                            <path class="cls-2"
                                d="M137.27,72.11a5.12,5.12,0,0,1,3.3,2.32c1.44,2.1,6.84,10.37,10.37,12.13s10.81,4,19.42,4,7.5,1.44,8.93-.77,2.1-5.62-.55-6.62-5.29-2.75-6.73-2.53-1.32,1.78-2.54.94-11-4.8-11.36-4.91-9-21.07-11.25-23.06-6-4.63-13.12-2.76-22.4,13-26.59,26.81-2.09,22.39,0,24.93,7.52,5.62,31.22,10.7c0,0,1.78,1.21,0,3.64s-8.16,20-9.27,20.73-3.42,5,.66,6.29,9.49,4.41,10.15,4.52,5.3.78,5.52-1.21.44-2.65-.88-3.31-5.19-.55-4.64-3.31,18.64-27.24,19-29.89,1.11-4.63-3.41-9.38c0,0-15.89-5.84-29.35-10.36,0,0,2.72-14.33,8.17-18.32C136.23,71.24,137.27,72.11,137.27,72.11Z" />
                            <path class="cls-2"
                                d="M183.35,118.12a19.38,19.38,0,0,0-4.84,2l-3.58-13.35-2.1-7.88a4,4,0,0,1,4.66-1.35l2.07,7.27Z" />
                            <path class="cls-3"
                                d="M61.06,103.45s-5.72-2.39-5.72-6.15v-43s-.43-5.09,5.72-5.94,27.15,0,27.15,0,7-1.48,8.06,8.27,4.45,33.51,4.67,36.9-1.07,7.64-4.67,7.85-22.9-.64-28.84,8.48A80.78,80.78,0,0,0,58.52,130s-1.27-15.9,3.18-24.39C61.7,105.63,63,104.5,61.06,103.45Z" />
                            <path class="cls-2"
                                d="M183.65,84.48s1.55-8.48,8.52-13.36,10.14,10.23,10.56,15.61-1.48,10.9-3.39,11.11S184.28,95.3,183.65,84.48Z" />
                            <path class="cls-2"
                                d="M126,123.73a24.54,24.54,0,0,0-14-17,28,28,0,0,0-12-2.54q-13.18,0-24.2,9.36T62.41,136.14a28.44,28.44,0,0,0,1.43,16,24.57,24.57,0,0,0,9.61,11.65,27.48,27.48,0,0,0,15.27,4.29q13.19,0,24.2-9.39t13.35-22.57A29.19,29.19,0,0,0,126,123.73Zm-14.1,12.41a20.35,20.35,0,0,1-7.31,12.34,20.12,20.12,0,0,1-13.28,5.14,14,14,0,0,1-11.44-5.14,14.49,14.49,0,0,1-2.92-12.34,21.67,21.67,0,0,1,20.52-17.41,14.07,14.07,0,0,1,11.44,5.1A14.57,14.57,0,0,1,111.85,136.14Z" />
                            <path class="cls-2"
                                d="M103.81,135.57a8.12,8.12,0,0,1-2.49,6.1,8.27,8.27,0,0,1-5.92,2.4,7.23,7.23,0,0,1-3.36-.79A7.82,7.82,0,0,1,90.22,142,7.08,7.08,0,0,1,88,136.59a7.67,7.67,0,0,1,2.54-6.15,8.87,8.87,0,0,1,5.88-2.18,7.74,7.74,0,0,1,5.26,1.86,5.28,5.28,0,0,1,.82.89h0A7.33,7.33,0,0,1,103.81,135.57Z" />
                            <path class="cls-2"
                                d="M216.86,122.47a24.55,24.55,0,0,0-14-17,28.09,28.09,0,0,0-12-2.53,34.81,34.81,0,0,0-11.32,1.86,33.79,33.79,0,0,0-4.63,2,42.21,42.21,0,0,0-8.25,5.53q-11,9.36-13.35,22.55a28.42,28.42,0,0,0,1.43,16,24.55,24.55,0,0,0,9.61,11.66,27.48,27.48,0,0,0,15.27,4.29q13.2,0,24.2-9.39t13.35-22.57A29,29,0,0,0,216.86,122.47Zm-14.09,12.41a21.81,21.81,0,0,1-20.6,17.47,14,14,0,0,1-11.43-5.13,14.5,14.5,0,0,1-2.93-12.34,20.32,20.32,0,0,1,7.29-12.32,23,23,0,0,1,3.41-2.41,19.41,19.41,0,0,1,9.84-2.69,14.1,14.1,0,0,1,11.43,5.1C202.6,126,203.59,130.06,202.77,134.88Z" />
                            <path class="cls-2"
                                d="M191.55,134.31a8.09,8.09,0,0,1-2.5,6.1,8.25,8.25,0,0,1-5.92,2.4,7.31,7.31,0,0,1-5.17-2.08,7.11,7.11,0,0,1-2.21-5.41,7.63,7.63,0,0,1,2.54-6.14,8.86,8.86,0,0,1,2.25-1.42l-2-7.61a19.38,19.38,0,0,1,4.84-2l2.57,9.06a7.28,7.28,0,0,1,3.5,1.67A6.83,6.83,0,0,1,191.55,134.31Z" />
                        </svg>
                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (!isset(Auth::user()->name))
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                            </li>
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>

                                    <a class="dropdown-item"
                                        href="{{ route('admin.dishes.index') }}">{{ __('Menu') }}</a>
                                    <a
                                        class="dropdown-item"href="{{ route('admin.restaurants.index') }}">{{ __('Ristorante') }}</a>
                                    <a class="dropdown-item"
                                        href="{{ route('admin.orders.index') }}">{{ __('Ordini') }}</a>
                                    <a
                                        class="dropdown-item"href="{{ route('admin.types.index') }}">{{ __('Tipologie') }}</a>

                                    <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            <div class="">
                @yield('content')
            </div>
        </main>
    </div>
    @stack('js')
</body>

</html>
