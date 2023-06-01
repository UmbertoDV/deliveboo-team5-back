<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body class="container" style="background-color:antiquewhite; text-align:center;">
    <div class="logo_deliveboo">
        <img class="home-logo" src="https://i.ibb.co/zZ2kPfd/deliveboodef.png" alt="" style="width:200px; margin-top:2rem;">
    </div>
    <h2>Grazie {{ $order->name }} {{ $order->surname }}!</h2>
    <h3>Ordine confermato.</h3>
    <ul>

    <li>{{$dishes}}</li>
        
    </ul>
    <h2>Contatti forniti:</h2>
    <h4>E-mail: {{ $order->email }}</h4>
    <h4>Indirizzo: {{ $order->address }}</h4>
    <h4>Telefono: {{ $order->telephone }}</h4>
    <h4>Note: {{ $order->note }}</h4>
    <h4>Tot. ordine: €{{ $order->total }}</h4>
    <h4 style="text-decoration: italic;">Presto saremo da te!</h4>
</body>

</html>
