@extends('adminlte::page')

@section('title', __('cruds.daynumber.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.daynumber.title')}}</h1>
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
                    <th>{{__('cruds.daynumber.fields.id')}}</th>
                    <td>{{$data->id ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.daynumber.fields.number')}}</th>
                    <td>{{$data->number ?? ''}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection