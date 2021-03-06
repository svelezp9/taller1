@extends('layouts.admin')

@section("title", $viewData["title"])

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header">{{__('adminMessages.updtR')}}</div>

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
                    <form method="POST" action="{{ route('admin.review.update', ['id' => $viewData["review"]->getId()]) }}">

                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="Enter comment" name="comment" value="{{ $viewData["review"]->getComment() }}" />

                        <p class="form-control mb-2">
                                <label for="cars">{{__('adminMessages.rating')}} </label>
                                <select name="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </p>

                        <input type="submit" class="btn btn-primary" value="Send" />

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</div>

@endsection