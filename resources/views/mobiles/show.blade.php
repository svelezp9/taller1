@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('/storage/'.$viewData["mobile"]->getImgName()) }}" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $viewData["mobile"]->getName() }}
                </h5>
                <p class="card-text">Marca: {{ $viewData["mobile"]->getBrand() }}</p>
                <p class="card-text">Modelo: {{ $viewData["mobile"]->getModel() }}</p>
                <p class="card-text">Color: {{ $viewData["mobile"]->getColor() }}</p>
                <p class="card-text">Memoria RAM: {{ $viewData["mobile"]->getRamMemory() }}</p>
                <p class="card-text">Almacenamiento: {{ $viewData["mobile"]->getStorage() }}</p>
                @if ($viewData["mobile"]->getPrice() < 100) <p class="card-text" style="color:#00FF00">
                    ${{ $viewData["mobile"]->getPrice() }}</p>
                    @else
                    <p class="card-text">${{ $viewData["mobile"]->getPrice() }}</p>
                    @endif
                    <p class="card-text">
                    <form method="POST" action="{{ route('cart.addMobile', ['id'=> $viewData['mobile']->getId()]) }}">
                        <div class="row">
                            @csrf
                            <div class="col-auto">
                                <div class="input-group col-auto">
                                    <div class="input-group-text">Quantity</div>
                                    <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn bg-primary text-white" type="submit">Add to cart</button>
                            </div>
                        </div>
                    </form>
                    </p>
                    <!--<a href="{{ route('cart.addMobile', ['id'=> $viewData["mobile"]->getId()]) }}">Añadir a la orden</a>-->
                    @auth
                    <div class="card mb-1">
                        <a href="{{ route('reviews.create', ['id' => $viewData["mobile"]->getId()]) }}" class="btn bg-primary text-white">Rate and review!</a>
                    </div>
                    @endauth
            </div>
        </div>
        <hr />
        <div class="col-md-5">
            @foreach($viewData["mobile"]->accessories as $accessory)
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-md-6 col-12 pb-4">
                        <div class="comment mt-4 text-justify float-left">
                            <h6>Accesories for this Mobile: </h6>
                            <p>{{ $accessory->getName() }} : {{ $accessory->getPrice() }}$</p>
                            <p> - {{ $accessory->getDescription() }}</p>
                        </div>
                        <form method="POST" action="{{ route('cart.addAccessory', ['id'=> $accessory->getId()]) }}">
                            <div class="row">
                                @csrf
                                <div class="col-auto">
                                    <div class="input-group col-auto">
                                        <div class="input-group-text">Quantity</div>
                                        <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn bg-primary text-white" type="submit">Add to cart</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-7">
            <h5>Cellphone Reviews</h5>
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            @foreach($viewData["mobile"]->reviews as $review)
            <hr />
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-md-6 col-12 pb-4">
                        <div class="comment mt-4 text-justify float-left">
                            <h6>Rating: {{ $review->getRating() }}</h6>
                            <p> - {{ $review->getComment() }}</p>
                        </div>
                        <!--<div class="card-body">
                                <a href="{{ route('reviews.delete', ['id' => $review->getId()]) }}"
                                    class="btn bg-primary text-white ml-auto">Borrar reseña</a>
                            </div>-->
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection