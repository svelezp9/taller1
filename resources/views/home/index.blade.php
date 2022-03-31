@extends('layouts.app')

@section('title', __('messages.title'))

@section('content')

<div class="text-center">

    {{ __('messages.welcome') }}
    <div class="card-body text-center">
        <a href="{{ route('mobiles.top') }}" class="btn bg-primary text-white">{{ __('messages.mostCommented') }}</a>
    </div>
    <div class="card-body text-center">
        <a href="{{ route('mobiles.lowerPrices') }}" class="btn bg-primary text-white">{{ __('messages.cheap') }}</a>
    </div>
</div>

@endsection