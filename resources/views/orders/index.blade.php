@extends('layouts.app')

@section('title', $viewData["title"])

@section('content')

@foreach ($viewData["orders"] as $order)
<div class="row">
        <div class="card">
            <div class="card-body text-center">
                <a href="{{ route('orders.show', ['id'=> $order->getId()]) }}">{{__('messages.orderNumber')}}{{ $order->getId() }}{{__('messages.oTotalP')}}{{ $order->getTotal() }}</a>
            </div>
        </div>
</div>
@endforeach

@endsection