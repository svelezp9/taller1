@extends('layouts.app')

@section('content')

<div class="row">
    <h2>{{ __('messages.welcome') }} {{ $viewData["name"] }}</h2>
    <h4> {{ __('messages.currentBalance') }} : {{ $viewData["balance"] }}</h4>
</div>

@endsection