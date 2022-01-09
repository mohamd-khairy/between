@extends('adminlte::page')

@section('title', __('cruds.paymentmethod.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.paymentmethod.title')}}</h1>
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
                    <th>{{__('cruds.paymentmethod.fields.id')}}</th>
                    <td>{{$data->id ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.paymentmethod.fields.key')}}</th>
                    <td>{{$data->key ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.paymentmethod.fields.title')}} En</th>
                    <td>{{$data->translate('en')->title ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.paymentmethod.fields.title')}} Ar</th>
                    <td>{{$data->translate('ar')->title ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.paymentmethod.fields.status')}}</th>
                    <td> {{$data->status ? 'Active' : 'Not Active'}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection