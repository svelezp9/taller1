@extends('layouts.app')

@section('title', $viewData["title"])

@section('subtitle', $viewData["subtitle"])

@section('content')

<div class="card mb-3">

    <div class="row g-0">

        <div class="col-md-4">

            <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">

        </div>

        <div class="col-md-8">

            <div class="card-body">

                <h5 class="card-title">

                    {{ $viewData["mobile"]->getName()}}

                </h5>

                <p class="card-text">Precio: {{ $viewData["mobile"]->getPrice() }}</p>
                <p class="card-text">Marca: {{ $viewData["mobile"]->getBrand() }}</p>
                <p class="card-text">Modelo: {{ $viewData["mobile"]->getModel() }}</p>
                <p class="card-text">Color: {{ $viewData["mobile"]->getColor() }}</p>
                <p class="card-text">Memoria ram: {{ $viewData["mobile"]->getRamMemory() }}</p>
                <p class="card-text">Alamacenamiento: {{ $viewData["mobile"]->getStorage() }}</p>
                <p class="card-text">Nombre de la imagen: {{ $viewData["mobile"]->getImgName() }}</p>

                @foreach($viewData["mobile"]->reviews as $review)

                - {{ $review->getComment() }}<br />

                Rating = {{ $review->getRating() }}<br />
                @endforeach

            </div>

        </div>

    </div>

</div>
<div class="card mb-1">
    <a href="{{ route('mobile.delete', ['id' => $viewData["mobile"]->getId()]) }}" class="text-danger">Borrar Móvil</a>
</div>

@endsection