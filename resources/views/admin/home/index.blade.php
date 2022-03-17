@extends('layouts.app')

@section('title', 'Taller 1')

@section('content')

<div class="text-center">
    Welcome to the application
    <div class="card-body text-center">
        <a href="{{ route('admin.mobile.create') }}" class="btn bg-primary text-white">Añadir Móvil</a>
    </div>
    <div class="card-body text-center">
        <a href="{{ route('admin.mobile.index') }}" class="btn bg-primary text-white">Listar Móviles</a>
    </div>
</div>
@endsection