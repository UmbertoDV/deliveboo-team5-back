<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Nuovo ordine ricevuto!</h1>
    <h2>Da: {{ $order->name }} {{ $order->surname }}</h2>
    <h2>Contatti:</h2>
    <h3>E-mail: {{ $order->email }}</h3>
    <h3>Indirizzo: {{ $order->address }}</h3>
    <h3>Telefono: {{ $order->telephone }}</h3>
    <h3>Note: {{ $order->note }}</h3>
    <h2>Tot. ordine: €{{ $order->total }}</h2>
</body>

</html>
