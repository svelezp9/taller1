@extends('layouts.app')

@section('title', 'Taller 1')

@section('content')

<div class="text-center">

    Welcome to the application
    <div class="card-body text-center">
        <a href="{{ route('mobiles.top') }}" class="btn bg-primary text-white">Most Commented mobiles</a>
    </div>
    <div class="card-body text-center">
        <a href="{{ route('mobiles.lowerPrices') }}" class="btn bg-primary text-white">Top 3 cheapest Mobiles</a>
    </div>
</div>

@endsection