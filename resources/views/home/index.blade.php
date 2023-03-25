@extends('layouts.app')

@section('title', __('messages.title'))

@section('content')
<div class="row">
    <h3>{{__('messages.pBeers')}}</h3>
    @foreach(range($viewData["random"], $viewData ["random"] + 3) as $item) 
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
        </div>
    </div>
    @endforeach
    <div class="row justify-content-center">
        
    </div>

</div>

<div class="row justify-content-center">
    <h2>{{__('messages.mostCommented')}}</h2>
    @foreach ($viewData["mobilesTop"] as $mobileT)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card h-100">
            <img src="{{ asset('/storage/'.$mobileT->getImgName()) }}" class="card-img-top">
            <div class="card-body d-flex flex-column">
                <a href="{{ route('mobiles.show', ['id'=> $mobileT->getId()]) }}" class="btn btn-primary btn-lg cl-btn mt-auto"> {{ $mobileT->getName() }}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<br>

<div class="row justify-content-center">
    <h2>{{__('messages.cheap')}}</h2>
    @foreach ($viewData["mobilesLower"] as $mobileL)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card h-100">
            <img src="{{ asset('/storage/'.$mobileL->getImgName()) }}" class="card-img-top">
            <div class="card-body d-flex flex-column">
                <a href="{{ route('mobiles.show', ['id'=> $mobileL->getId()]) }}" class="btn btn-primary btn-lg cl-btn mt-auto"> {{ $mobileL->getName() }}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection