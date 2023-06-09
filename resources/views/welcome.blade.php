@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container">
            <div class="gap-3 d-flex align-items-end">
                <div class="fw-bold homelogo-text">
                    Benvenuto su
                </div>
                <div class="logo_deliveboo">
                    {{-- <svg id="Deliveboo_home" data-name="Deliveboo_home" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 938.48 320.88">
                    <defs>
                        <style>
                            .cls-11 {
                                fill: none;
                                stroke: #e9511d;
                                stroke-linecap: round;
                                stroke-miterlimit: 10;
                                stroke-width: 10px;
                            }

                            .cls-22 {
                                fill: #e9511d;
                            }
                        </style>
                    </defs>
                    <title>DELEVBOO-def</title>
                    <line class="cls-11" x1="495.66" y1="135.03" x2="410.72" y2="135.03" />
                    <line class="cls-11" x1="493.01" y1="117.63" x2="322.95" y2="117.63" />
                    <path class="cls-22"
                        d="M106.8,241.57a3.86,3.86,0,0,1-3.57-2.59,14.08,14.08,0,0,1-1.23-6.09q0-5.05,1.17-16.47l6.48-64q7-.65,14.78-1t13.74-.33q21,0,32.61,9.92t11.61,27.68a54.47,54.47,0,0,1-6.49,26.78A45.86,45.86,0,0,1,157,233.86q-12.39,6.67-30.28,6.67c-3.45,0-7,.18-10.5.52S109.56,241.57,106.8,241.57Zm15.56-11.67q12.44,0,21.13-5.12a33.77,33.77,0,0,0,13.22-14,44.21,44.21,0,0,0,4.54-20.42q0-13.74-7.06-21.39t-22.63-7.65h-3.24L122.49,219c-.09,1.47-.16,3.16-.2,5.06S122.27,227.92,122.36,229.9Z" />
                    <path class="cls-22"
                        d="M209.48,242.61q-10,0-16.07-6.29T187.31,219a48.87,48.87,0,0,1,2.79-16.85,42.64,42.64,0,0,1,7.71-13.36A34.76,34.76,0,0,1,209.29,180a32.26,32.26,0,0,1,14.07-3.12c5.61,0,10.22,1.28,13.8,3.83s5.38,6.2,5.38,11a17.32,17.32,0,0,1-5,12.31q-5.06,5.33-14.26,9.14a122,122,0,0,1-21.53,6.42L200,210.84a49.53,49.53,0,0,0,12-2.91,24.58,24.58,0,0,0,9-5.71,12.68,12.68,0,0,0,3.69-8.36,9.19,9.19,0,0,0-1.1-5.25,4.29,4.29,0,0,0-4-2c-2.43,0-4.69,1.28-6.81,3.82a29.07,29.07,0,0,0-5.12,10.05,44.44,44.44,0,0,0-1.95,13.36q0,7.51,2,11.21c1.34,2.46,3.83,3.7,7.46,3.7a26.59,26.59,0,0,0,10.37-2,52.35,52.35,0,0,0,8-4.09c.69-.43,1.36-.82,2-1.16a3.61,3.61,0,0,1,1.62-.52,1.59,1.59,0,0,1,1.3.65,2.43,2.43,0,0,1,.51,1.55,11.11,11.11,0,0,1-2,5.58,27,27,0,0,1-5.83,6.41,33.42,33.42,0,0,1-21.72,7.46Z" />
                    <path class="cls-22"
                        d="M255.9,242.35q-3.9,0-5.32-2.53a13.32,13.32,0,0,1-1.29-6.93q.12-4.41.71-10.51t1.36-12.06l4.15-32.93a25.65,25.65,0,0,0,0-8.94q-.78-3.76-1.69-6.75a18.93,18.93,0,0,1-.9-5.44c0-1.12.79-2.14,2.39-3a23.32,23.32,0,0,1,5.77-2.2,25.89,25.89,0,0,1,6.23-.84,6.59,6.59,0,0,1,6,3,12.6,12.6,0,0,1,2,6.94c0,1-.09,2.94-.26,5.71s-.52,5.92-1,9.46l-4.15,29.82q-1.29,9.33-1.94,18.93t-1.3,18.28Z" />
                    <path class="cls-22"
                        d="M337.84,242.61a12.58,12.58,0,0,1-9.6-4q-3.76-4-4.54-11.93l-2.85-29a58.21,58.21,0,0,0-.84-6,19.39,19.39,0,0,0-1.49-4.86A12.44,12.44,0,0,0,317,184.2a2.51,2.51,0,0,1-.65-1.75c0-.69.59-1.36,1.75-2a26.31,26.31,0,0,1,4.28-1.82,35.15,35.15,0,0,1,5.19-1.29,27.69,27.69,0,0,1,4.47-.46,4.54,4.54,0,0,1,4.15,2.47c1,1.64,1.69,4.88,2.2,9.72l3.5,32.93a20.35,20.35,0,0,0,1.11,5.45,2.37,2.37,0,0,0,2.27,1.68c.6,0,1.57-.66,2.91-2a27.91,27.91,0,0,0,4.35-6.36,46.53,46.53,0,0,0,3.95-11.28,75.55,75.55,0,0,0,1.62-16.92,11,11,0,0,0-.84-4.79,6.88,6.88,0,0,1-.84-3,3.85,3.85,0,0,1,1.68-2.72,18.12,18.12,0,0,1,4.22-2.59,34,34,0,0,1,5-1.88,15,15,0,0,1,4-.72,7.65,7.65,0,0,1,3.63,1c1.21.65,1.81,2.35,1.81,5.12a59.93,59.93,0,0,1-1.88,13.87,99.74,99.74,0,0,1-5.31,15.82,80.93,80.93,0,0,1-8.24,14.84,44.53,44.53,0,0,1-10.69,11A21.82,21.82,0,0,1,337.84,242.61Z" />
                    <path class="cls-22"
                        d="M402.53,242.61q-10,0-16.07-6.29T380.36,219a48.87,48.87,0,0,1,2.79-16.85,42.64,42.64,0,0,1,7.71-13.36A34.76,34.76,0,0,1,402.34,180a32.24,32.24,0,0,1,14.06-3.12q8.43,0,13.81,3.83t5.38,11a17.32,17.32,0,0,1-5,12.31q-5.06,5.33-14.26,9.14a122,122,0,0,1-21.53,6.42l-1.68-8.69a49.53,49.53,0,0,0,12-2.91,24.67,24.67,0,0,0,8.95-5.71,12.68,12.68,0,0,0,3.69-8.36,9.19,9.19,0,0,0-1.1-5.25,4.29,4.29,0,0,0-4-2c-2.43,0-4.69,1.28-6.81,3.82a29.07,29.07,0,0,0-5.12,10.05,44.44,44.44,0,0,0-2,13.36q0,7.51,2,11.21c1.34,2.46,3.83,3.7,7.46,3.7a26.59,26.59,0,0,0,10.37-2,52.35,52.35,0,0,0,8-4.09c.69-.43,1.36-.82,2-1.16a3.61,3.61,0,0,1,1.62-.52,1.56,1.56,0,0,1,1.29.65,2.38,2.38,0,0,1,.52,1.55,11.11,11.11,0,0,1-2,5.58,27,27,0,0,1-5.83,6.41,33.42,33.42,0,0,1-21.72,7.46Z" />
                    <path class="cls-22"
                        d="M466.32,242.61a55.4,55.4,0,0,1-13.68-1.49q-5.76-1.49-8.68-4.28a8.07,8.07,0,0,1-2.66-6.68l8.94-80h11.28c1.9,0,3.48,1,4.74,3.11a12.82,12.82,0,0,1,1.88,6.74,38.42,38.42,0,0,1-.72,7.84c-.47,2.3-1.14,5.34-2,9.14l-9.07,39,2.59,20.1Zm0,0a25,25,0,0,1-4.21-.71q-3.18-.72-7.07-2t-7.26-2.53l6.74-14.65a50.06,50.06,0,0,0,5.84,4.54,36.17,36.17,0,0,0,6.22,3.37,15.11,15.11,0,0,0,5.83,1.3,10.26,10.26,0,0,0,7.65-3.37,22.9,22.9,0,0,0,5.06-9.6,52.59,52.59,0,0,0,1.82-14.65,49.33,49.33,0,0,0-.85-10.11q-.84-3.88-2.78-3.89c-.7,0-1.84.63-3.44,1.88a35.28,35.28,0,0,0-5.77,6.35,106.65,106.65,0,0,0-7.65,12.19,188.75,188.75,0,0,0-9.08,19.38l-4.27-10.5q7-16.47,13.35-25.74t12.19-13.09q5.83-3.83,11.15-3.83a12.18,12.18,0,0,1,11,6.1q3.75,6.09,3.76,16.34a49.71,49.71,0,0,1-4.8,22.29A37.51,37.51,0,0,1,486.35,237,36,36,0,0,1,466.32,242.61Z" />
                    <path class="cls-22"
                        d="M625.81,91.49s12.5,1.9,17.56,3.79,8.46.13,9.34-1.89-4-11.49-16.16-14.27-22.87.8-28,8.48a17.59,17.59,0,0,0-2.15,16.15c.5,1.39,3.79,9.47,17.3,13.38s22.36,5.18,25.9,0c0,0,1.76-.63-4-1.39s-18.82-4.42-18.82-4.42S621,95.28,622,94.4,625.81,91.49,625.81,91.49Z" />
                    <path class="cls-22"
                        d="M599,135a5.78,5.78,0,0,1,3.71,2.6c1.61,2.35,7.67,11.63,11.63,13.61s12.13,4.46,21.79,4.46,8.42,1.61,10-.87,2.35-6.31-.62-7.42-6-3.1-7.55-2.85-1.49,2-2.85,1.06-12.38-5.39-12.75-5.52-10.15-23.64-12.63-25.87S603.05,109,595,111.09s-25.12,14.61-29.83,30.08-2.35,25.13,0,28,8.44,6.31,35,12c0,0,2,1.36,0,4.08s-9.17,22.41-10.4,23.27-3.84,5.57.74,7.06,10.64,4.95,11.39,5.07,5.94.87,6.19-1.36.49-3-1-3.71-5.81-.62-5.19-3.71,20.91-30.58,21.29-33.55,1.23-5.2-3.84-10.52c0,0-17.83-6.56-32.93-11.63,0,0,3-16.08,9.16-20.55C597.81,134,599,135,599,135Z" />
                    <path class="cls-22"
                        d="M659.89,204.76a9.1,9.1,0,0,1-2.81,6.85,9.22,9.22,0,0,1-6.63,2.7,8.24,8.24,0,0,1-5.81-2.33,8,8,0,0,1-2.49-6.07A8.57,8.57,0,0,1,645,199a10.06,10.06,0,0,1,2.53-1.6l-2.28-8.53a21.37,21.37,0,0,1,5.44-2.27l2.89,10.15a8.13,8.13,0,0,1,3.92,1.89A7.66,7.66,0,0,1,659.89,204.76Z" />
                    <path class="cls-22"
                        d="M650.69,186.61a21.37,21.37,0,0,0-5.44,2.27l-4-15-2.36-8.84a4.56,4.56,0,0,1,5.24-1.51l2.32,8.15Z" />
                    <path class="cls-22"
                        d="M513.46,170.15s-6.43-2.69-6.43-6.9V115s-.47-5.71,6.43-6.66,30.46,0,30.46,0,7.85-1.67,9,9.28,5,37.6,5.24,41.41-1.19,8.56-5.24,8.8-25.7-.71-32.36,9.52-10,22.61-10,22.61-1.43-17.85,3.57-27.37C514.17,172.59,515.66,171.32,513.46,170.15Z" />
                    <path class="cls-22"
                        d="M651,148.86s1.75-9.52,9.56-15,11.38,11.47,11.86,17.52-1.66,12.23-3.81,12.46S651.73,161,651,148.86Z" />
                    <path class="cls-22"
                        d="M586.27,192.9a27.56,27.56,0,0,0-15.75-19A31.37,31.37,0,0,0,557.11,171q-14.8,0-27.16,10.49t-15,25.3a31.89,31.89,0,0,0,1.61,18,27.5,27.5,0,0,0,10.79,13.09,30.86,30.86,0,0,0,17.13,4.81q14.79,0,27.15-10.54t15-25.33A32.51,32.51,0,0,0,586.27,192.9Zm-15.82,13.92a24.48,24.48,0,0,1-23.11,19.61q-8.08,0-12.83-5.76t-3.28-13.85a24.34,24.34,0,0,1,23-19.54q8.09,0,12.83,5.73T570.45,206.82Z" />
                    <path class="cls-22"
                        d="M552,215.73a8.15,8.15,0,0,1-3.77-.89,8.67,8.67,0,0,1-2-1.45,7.93,7.93,0,0,1-2.49-6.07,8.54,8.54,0,0,1,2.86-6.89,9.8,9.8,0,0,1,6.58-2.44,8.74,8.74,0,0,1,5.92,2.07,6.24,6.24,0,0,1,.92,1h0a8.37,8.37,0,0,1,1.46,5.11,9.09,9.09,0,0,1-2.8,6.85A9.25,9.25,0,0,1,552,215.73Z" />
                    <path class="cls-22"
                        d="M688.3,192.9a27.56,27.56,0,0,0-15.75-19A31.52,31.52,0,0,0,659.14,171a39.32,39.32,0,0,0-12.7,2.08,39.89,39.89,0,0,0-5.2,2.2,47.68,47.68,0,0,0-9.26,6.22q-12.36,10.5-15,25.29a31.88,31.88,0,0,0,1.6,18,27.55,27.55,0,0,0,10.79,13.09,30.82,30.82,0,0,0,17.13,4.81q14.81,0,27.16-10.53t15-25.34A32.83,32.83,0,0,0,688.3,192.9Zm-15.82,13.92a24.5,24.5,0,0,1-23.11,19.61q-8.1,0-12.83-5.76t-3.28-13.85A22.72,22.72,0,0,1,641.42,193a25.76,25.76,0,0,1,3.83-2.71,21.37,21.37,0,0,1,5.44-2.27,20.89,20.89,0,0,1,5.6-.74q8.1,0,12.83,5.72T672.48,206.82Z" />
                    <path class="cls-22"
                        d="M309.58,152a10.86,10.86,0,0,0-7.39-2.6,12.33,12.33,0,0,0-8.24,3.05q-3.56,3-3.56,8.62a10,10,0,0,0,3.11,7.59,10.3,10.3,0,0,0,7.26,2.91,11.56,11.56,0,0,0,8.3-3.37,11.37,11.37,0,0,0,3.5-8.55C312.56,156.26,311.56,153.71,309.58,152Zm-3.44,27.74a4.14,4.14,0,0,0-4.21-2.85h-11.8l-4.67,41.62q-.51,4.41-.78,7.33t-.26,6.54a18.74,18.74,0,0,0,1.3,7c.86,2.16,2.08,3.25,3.63,3.25H300.5q.39-3,.84-6.36c.31-2.24.67-4.88,1.11-7.91s.86-6.69,1.29-11l2.47-21.13q.51-4.16.77-6.16a28.63,28.63,0,0,0,.26-3.82A18.06,18.06,0,0,0,306.14,179.72Z" />
                    <path class="cls-22"
                        d="M561.43,206.18a9.09,9.09,0,0,1-2.8,6.85,9.25,9.25,0,0,1-6.64,2.7,8.15,8.15,0,0,1-3.77-.89,8.67,8.67,0,0,1-2-1.45,7.93,7.93,0,0,1-2.49-6.07,8.54,8.54,0,0,1,2.86-6.89,9.8,9.8,0,0,1,6.58-2.44,8.74,8.74,0,0,1,5.92,2.07,6.24,6.24,0,0,1,.92,1h0A8.37,8.37,0,0,1,561.43,206.18Z" />
                </svg> --}}
                    <img class="home-logo" src="https://i.ibb.co/zZ2kPfd/deliveboodef.png" alt="">
                </div>
            </div>
            <div>
                <h2 class="col-md-8 fs-4 mt-3">Diventa un partner!</h2>
                <a href="{{ route('register') }}" class="btn-violet-home btn-lg mt-3" type="button">Iscriviti</a>
            </div>
        </div>

    </div>


    <div class="content">
        <div class="container">
            <h3>Insieme possiamo aiutarti a raggiungere sempre più clienti!</h3>
        </div>
    </div>
@endsection
