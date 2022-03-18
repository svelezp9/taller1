@extends('layouts.admin')

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
                <div class="card mb-1">
                    <a href="{{ route('admin.review.create', ['id' => $viewData["mobile"]->getId()]) }}" class="btn bg-primary text-white">Añadir Reseña</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-1">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <h2>Cellphone Reviews</h2>
        @foreach($viewData["mobile"]->reviews as $review)
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-6 col-12 pb-4">
                    <div class="comment mt-4 text-justify float-left">
                        <h4>Rating: {{ $review->getRating() }}</h4>
                        <p> - {{ $review->getComment() }}</p>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.review.updateData', ['id' => $review->getId()]) }}" class="btn bg-primary text-white ml-auto">Actualizar reseña</a>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.review.delete', ['id' => $review->getId()]) }}" class="btn bg-primary text-white ml-auto">Borrar reseña</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection