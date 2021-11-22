@extends('adminlte::page')

@section('title', __('cruds.coupon.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.coupon.title')}}</h1>
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
                    <th>{{__('cruds.coupon.fields.id')}}</th>
                    <td>{{$data->id ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.coupon.fields.code')}}</th>
                    <td>{{$data->code ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.coupon.fields.type')}}</th>
                    <td>{{$data->type ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.coupon.fields.discount')}}</th>
                    <td>{{$data->discount ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.coupon.fields.start_date')}}</th>
                    <td>{{$data->start_date ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.coupon.fields.end_date')}}</th>
                    <td>{{$data->end_date ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.coupon.fields.food')}}</th>
                    <td>{{$data->food->name ?? ''}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection