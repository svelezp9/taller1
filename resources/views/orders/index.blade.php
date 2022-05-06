@extends('layouts.app')

@section('title', $viewData["title"])

@section('content')

@foreach ($viewData["orders"] as $order)
<div class="row">
        <div class="card">
            <div class="card-body text-center">
                <p> Order #{{ $order->getId()}} Total paid : {{ $order ->getTotal() }}</p>
            </div>
        </div>
</div>
@endforeach

@endsection