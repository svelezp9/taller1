@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
    <div class="card-header">
        {{__('adminMessages.manage')}}
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">{{ __('adminMessages.id') }}</th>
                    <th scope="col">{{ __('adminMessages.name') }}</th>
                    <th scope="col">{{ __('adminMessages.edit') }}</th>
                    <th scope="col">{{ __('adminMessages.show') }}</th>
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
                    <td>
                        <a class="btn btn-primary" href="{{route('admin.mobile.show', ['id'=> $mobile->getId()])}}">
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