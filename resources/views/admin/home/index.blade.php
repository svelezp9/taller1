@extends('layouts.admin')

@section('title', 'Taller 1')

@section('content')

<div class="text-center">
    Welcome to the application
    <div class="card-body text-center">
        <a href="{{ route('admin.mobile.create') }}" class="btn bg-primary text-white">Create Mobiles</a>
    </div>
    <div class="card-body text-center">
        <a href="{{ route('admin.mobile.index') }}" class="btn bg-primary text-white">List Mobiles</a>
    </div>
</div>
@endsection