<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wifth=device-width, initial-scale=1.0">
    <title>My Order</title>
    <!--<link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">-->
</head>

<body>
    My Order
    <hr>
    <div class="card mb-4">
        <div class="card-header">
            Order #{{ $order->getId() }}
        </div>
        <div class="card-body">
            <b>Date:</b> {{ $order->getCreatedAt() }}<br />
            <b>Total:</b> ${{ $order->getTotal() }}<br />
            <table class="table table-striped text-center mt-3">
                <thead>
                    <tr>
                        <th scope="col">Item ID - </th>
                        <th scope="col">Product Name - </th>
                        <th scope="col">Price - </th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->getItems() as $item)
                    <tr>
                        @if(is_null($item->getAccessory()))
                        <td>{{ $item->getId() }}</td>
                        <td>{{ $item->getMobile()->getName() }}</td>
                        <td>${{ $item->getPrice() }}</td>
                        <td>{{ $item->getQuantity() }}</td>
                        @endif
                        @if(is_null($item->getMobile()))
                        <td>{{ $item->getId() }}</td>
                        <td>{{ $item->getAccessory()->getName() }}</td>
                        <td>${{ $item->getPrice() }}</td>
                        <td>{{ $item->getQuantity() }}</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <hr>
</body>

</html>