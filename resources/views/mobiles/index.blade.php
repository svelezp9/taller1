@extends('layouts.app')

@section('title', 'Taller 1')

@section('subtitle', 'All Mobiles')

@section('content')

<div class="row">

@foreach ($viewData["mobiles"] as $mobile)

<div class="col-md-4 col-lg-3 mb-2">

    <div class="card">

        <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">

        <div class="card-body text-center">

            <a href="{{ route('mobiles.show', ['id'=> $mobile->getId()]) }}" class="btn btn-primary btn-lg cl-btn">{{ $mobile->getName() }}</a>



        </div>

    </div>

</div>

@endforeach

</div>

@endsection