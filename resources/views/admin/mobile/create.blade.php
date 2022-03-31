@extends('layouts.admin')

@section("title", $viewData["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('adminMessages.create')}}</div>
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
                    <form method="POST" action="{{ route('admin.mobile.save') }}" enctype="multipart/form-data">

                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ old('price') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter brand" name="brand" value="{{ old('brand') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter model" name="model" value="{{ old('model') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter color" name="color" value="{{ old('color') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter ramMemory" name="ramMemory" value="{{ old('ramMemory') }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter storage" name="storage" value="{{ old('storage') }}" />
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{__('adminMessages.img')}}</label>
                                    <div class="col-lg-10 col-md-6 col-sm-12">
                                        <input class="form-control" type="file" name="imgName">
                                    </div>
                                </div>
                                <img src="{{ URL::asset('storage/test.png') }}" />
                            </div>
                            <div class="col">
                                &nbsp;
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Send" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection