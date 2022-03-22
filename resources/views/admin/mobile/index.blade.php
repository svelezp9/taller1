@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
    <div class="card-header">
        Manage mobiles
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["mobiles"] as $mobile)
                <tr>
                    <td>{{ $mobile->getId() }}</td>
                    <td>{{ $mobile->getName() }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('admin.mobile.edit', ['id'=> $mobile->getId()])}}">
                            <i class="bi-pencil"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection