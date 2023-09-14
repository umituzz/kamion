<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<p>{{ __('You have a new order') }} </p>
<p>Order Details</p>
<span>Shipper: {{ $order->shipper->first_name  }} {{ $order->shipper->last_name }}</span> <br>
<span>Load Type: {{ $order->loadType->name }}</span> <br>
<span>Departure City: {{ $order->departureCity->name }}</span> <br>
<span>Arrival City: {{ $order->arrivalCity->name }}</span> <br>
<span>Created At: {{ $order->created_at }}</span> <br>

</body>
</html>
