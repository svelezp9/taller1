@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="row">
    @foreach ($viewData["mobiles"] as $mobile)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card h-100">
            <img src="{{ asset('/storage/'.$mobile->getImgName()) }}" class="card-img-top">
            <div class="card-body d-flex flex-column">
                <a href="{{ route('mobiles.show', ['id'=> $mobile->getId()]) }}" class="btn btn-primary btn-lg cl-btn mt-auto"> {{ $mobile->getName() }}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection