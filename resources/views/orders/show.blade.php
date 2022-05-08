@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<b>{{__('messages.myOrder')}}</b>
    <hr>
    <div class="card mb-4">
        <div class="card-header">
        {{__('messages.orderNumber')}}{{ $viewData["order"]->getId() }}
        </div>
        <div class="card-body">
            <b>{{__('messages.date')}}</b> {{ $viewData["order"]->getCreatedAt() }}<br />
            <b>{{__('messages.total')}}</b> ${{ $viewData["order"]->getTotal() }}<br />
            <table class="table table-striped text-center mt-3">
                <thead>
                    <tr>
                        <th scope="col">{{__('messages.itemId')}}</th>
                        <th scope="col">{{__('messages.pName')}}</th>
                        <th scope="col">{{__('messages.Price')}}</th>
                        <th scope="col">{{__('messages.qnt')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData["order"]->getItems() as $item)
                    <tr>
                        @if(is_null($item->getAccessory()))
                        <td>{{ $item->getId() }}</td>
                        <td>{{ $item->getMobile()->getName() }}</td>
                        <td>${{ $item->getPrice() }}</td>
                        <td>{{ $item->getQuantity() }}</td>
                        @endif
                        @if(is_null($item->getMobile()))
                        <td>{{ $item->getId() }}</td>
                        <td>{{ $item->getAccessory()->getName() }}</td>
                        <td>${{ $item->getPrice() }}</td>
                        <td>{{ $item->getQuantity() }}</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <hr>


@endsection