@extends('layouts.app')

@section('title', __('messages.mobiles'))

@section('subtitle', __('messages.all'))

@section('content')
<form method="GET" class="mb-5" action="{{ route('mobiles.search') }}">
    <div class="input-group mb-3">
        <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
        <button class="btn btn-primary" type="submit" id="button-addon2">{{__('messages.search')}}</button>
    </div>
</form>
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