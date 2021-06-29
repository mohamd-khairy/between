@extends('adminlte::page')

@section('title', __('cruds.users.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.users.title')}}</h1>
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
                    <th>{{__('cruds.users.fields.id')}}</th>
                    <td>{{$data->id ?? '-'}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.users.fields.name')}} En</th>
                    <td>{{$data->translate('en')->name ?? '-'}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.users.fields.name')}} Ar</th>
                    <td>{{$data->translate('ar')->name ?? '-'}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.users.fields.email')}}</th>
                    <td>{{$data->email ?? '-'}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.users.fields.phone')}}</th>
                    <td>{{$data->phone ?? '-'}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.users.fields.gender')}}</th>
                    <td> {{$data->gender ? __('cruds.'.$data->gender) : '-'}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.users.fields.type')}}</th>
                    <td>{{__('cruds.'.$data->type) ?? '-'}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection