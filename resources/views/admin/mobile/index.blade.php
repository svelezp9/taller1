@extends('layouts.admin')

@section('title', $viewData["title"])

@section('subtitle', $viewData["subtitle"])

@section('content')

<div class="row">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    @foreach ($viewData["mobiles"]->reverse() as $mobile)
    <div class="col-md-4 col-lg-3 mb-2">


        <div class="card">

            <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">

            <div class="card-body text-center">

                <a href="{{ route('admin.mobile.show', ['id'=> $mobile->getId()]) }}" class="btn bg-primary text-white">{{ $mobile->getName() }}</a>

            </div>

        </div>

    </div>

    @endforeach

</div>

@endsection