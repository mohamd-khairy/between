@extends('adminlte::page')

@section('title', __('cruds.mealnumber.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.mealnumber.title')}}</h1>
@stop

@section('content')

<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('cruds.value')}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{__('cruds.mealnumber.fields.id')}}</th>
                    <td>{{$data->id ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.mealnumber.fields.number')}}</th>
                    <td>{{$data->number ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.mealnumber.fields.price')}}</th>
                    <td>{{$data->price ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.mealnumber.fields.diet')}}</th>
                    <td>{{$data->diet->name ?? ''}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection