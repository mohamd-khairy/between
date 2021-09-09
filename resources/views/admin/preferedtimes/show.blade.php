@extends('adminlte::page')

@section('title', __('cruds.preferedtime.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.preferedtime.title')}}</h1>
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
                    <th>{{__('cruds.preferedtime.fields.id')}}</th>
                    <td>{{$data->id ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.preferedtime.fields.from')}}</th>
                    <td>{{$data->from ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.preferedtime.fields.to')}}</th>
                    <td>{{$data->to ?? ''}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection