@extends('adminlte::page')

@section('title', __('cruds.address.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.address.title')}}</h1>
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
                    <th>{{__('cruds.address.fields.id')}}</th>
                    <td>{{$data->id ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.address.fields.user')}}</th>
                    <td>{{$data->user->name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.address.fields.country')}}</th>
                    <td>{{$data->country ?? ''}}</td>
                </tr>


                <tr>
                    <th>{{__('cruds.address.fields.state')}}</th>
                    <td>{{$data->state ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.address.fields.district')}}</th>
                    <td>{{$data->district ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.address.fields.full_address')}}</th>
                    <td>{{$data->full_address ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.address.fields.building')}}</th>
                    <td>{{$data->building ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.address.fields.floor')}}</th>
                    <td>{{$data->floor ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.address.fields.street')}}</th>
                    <td>{{$data->street ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.address.fields.apartment_number')}}</th>
                    <td>{{$data->apartment_number ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.address.fields.type')}}</th>
                    <td>{{$data->type ?? ''}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection