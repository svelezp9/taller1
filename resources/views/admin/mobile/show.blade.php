@extends('layouts.admin')

@section('title', $viewData["title"])

@section('subtitle', $viewData["subtitle"])

@section('content')

<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('/storage/'.$viewData["mobile"]->getImgName()) }}" class="card-img-top">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">

                    {{ $viewData["mobile"]->getName()}}

                </h5>

                <p class="card-text">{{__('adminMessages.price')}} {{ $viewData["mobile"]->getPrice() }}</p>
                <p class="card-text">{{__('adminMessages.brand')}} {{ $viewData["mobile"]->getBrand() }}</p>
                <p class="card-text">{{__('adminMessages.model')}} {{ $viewData["mobile"]->getModel() }}</p>
                <p class="card-text">{{__('adminMessages.color')}} {{ $viewData["mobile"]->getColor() }}</p>
                <p class="card-text">{{__('adminMessages.ram_memory')}} {{ $viewData["mobile"]->getRamMemory() }}</p>
                <p class="card-text">{{__('adminMessages.storage')}} {{ $viewData["mobile"]->getStorage() }}</p>
                <p class="card-text">{{__('adminMessages.imgName')}} {{ $viewData["mobile"]->getImgName() }}</p>
                <div class="card mb-1">
                    <a href="{{ route('admin.review.create', ['id' => $viewData["mobile"]->getId()]) }}" class="btn bg-primary text-white">{{__('adminMessages.addR')}}</a>
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
                        <a href="{{ route('admin.review.updateData', ['id' => $review->getId()]) }}" class="btn bg-primary text-white ml-auto">{{__('adminMessages.updtR')}}</a>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.review.delete', ['id' => $review->getId()]) }}" class="btn bg-primary text-white ml-auto">{{__('adminMessages.delR')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection