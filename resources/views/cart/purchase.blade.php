@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
    <div class="card-header">
        {{__('messages.pCompleted')}}
    </div>
    <div class="card-body">
        <div class="alert alert-success" role="alert">
            {{__('messages.pCongrat')}} <b>#{{ $viewData["order"]->getId() }}</b>
        </div>
        <a href="{{ route('cart.pdf', ['id'=> $viewData['order']->getId()]) }}">{{__('messages.dPDF')}}</a>
    </div>
</div>
@endsection