@extends('adminlte::page')

@section('title', __('cruds.city.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.city.title')}}</h1>
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
                    <th>{{__('cruds.city.fields.id')}}</th>
                    <td>{{$data->id ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.city.fields.name')}} En</th>
                    <td>{{$data->translate('en')->name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.city.fields.name')}} Ar</th>
                    <td>{{$data->translate('ar')->name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.city.fields.state')}}</th>
                    <td>{{$data->state->name ?? ''}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection