@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')
<!--<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Móviles en su orden</h1>
            <ul>
                @foreach($viewData["mobilesInCart"] as $key => $mobile)
                <li>
                    Id: {{ $mobile->getId() }} -
                    Nombre: {{ $mobile->getName() }} -
                    Precio: {{ $mobile->getPrice() }}
                </li>
                @endforeach
            </ul>
            <a href="{{ route('cart.removeAll') }}">Remover todos los móviles de la orden</a>
        </div>
    </div>
</div>-->


<div class="card">
    <div class="card-header">
        Mobiles in Cart
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["mobilesInCart"] as $mobile)
                <tr>
                    <td>{{ $mobile->getId() }}</td>
                    <td>{{ $mobile->getName() }}</td>
                    <td>${{ $mobile->getPrice() }}</td>
                    <td>{{ session('mobiles')[$mobile->getId()] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="text-end">
                <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
                @if (count($viewData["mobilesInCart"]) > 0)
                <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">Buy now!</a>
                <a href="{{ route('cart.removeAll') }}">
                    <button class="btn btn-danger mb-2">
                        Remove all mobiles from Cart
                    </button>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection