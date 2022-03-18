@extends('layouts.admin')

@section("title", $viewData["title"])

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Create product</div>

                <div class="card-body">

                    @if($errors->any())

                    <ul id="errors" class="alert alert-danger list-unstyled">

                        @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                    @endif
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('admin.mobile.save') }}">

                        @csrf

                        <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />

                        <input type="text" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ old('price') }}" />

                        <input type="text" class="form-control mb-2" placeholder="Enter brand" name="brand" value="{{ old('brand') }}" />

                        <input type="text" class="form-control mb-2" placeholder="Enter model" name="model" value="{{ old('model') }}" />

                        <input type="text" class="form-control mb-2" placeholder="Enter color" name="color" value="{{ old('color') }}" />

                        <input type="text" class="form-control mb-2" placeholder="Enter ramMemory" name="ramMemory" value="{{ old('ramMemory') }}" />

                        <input type="text" class="form-control mb-2" placeholder="Enter storage" name="storage" value="{{ old('storage') }}" />

                        <input type="text" class="form-control mb-2" placeholder="Enter imgName" name="imgName" value="{{ old('imgName') }}" />

                        <input type="submit" class="btn btn-primary" value="Send" />

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</div>
@endsection