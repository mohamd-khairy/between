@extends('adminlte::page')

@section('title', __('cruds.dish.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.dish.title')}}</h1>
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
                    <th>{{__('cruds.dish.fields.id')}}</th>
                    <td>{{$data->id ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.dish.fields.name')}} En</th>
                    <td>{{$data->translate('en')->name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.dish.fields.name')}} Ar</th>
                    <td>{{$data->translate('ar')->name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.target.fields.photo')}}</th>
                    <td><img src="{{display_img($value->image?$value->image->photo:null)}}" style="width: 70px;height:70px" class="img-circle"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection