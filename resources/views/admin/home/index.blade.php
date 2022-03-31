@extends('layouts.admin')

@section('title', __('adminMessages.title') )

@section('content')

<div class="text-center">
    {{__('adminMessages.welcome') }}
    <div class="card-body text-center">
        <a href="{{ route('admin.mobile.create') }}" class="btn bg-primary text-white">{{__('adminMessages.create') }}</a>
    </div>
    <div class="card-body text-center">
        <a href="{{ route('admin.mobile.index') }}" class="btn bg-primary text-white">{{__('adminMessages.list') }}</a>
    </div>
</div>
@endsection