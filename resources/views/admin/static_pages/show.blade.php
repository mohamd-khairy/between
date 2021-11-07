@extends('adminlte::page')

@section('title', __('cruds.staticpages.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.staticpages.title')}}</h1>
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
                    <th>{{__('cruds.staticpages.fields.id')}}</th>
                    <td>{{$data->id ?? ''}}</td>
                </tr>


                <tr>
                    <th>{{__('cruds.staticpages.fields.name')}} Ar</th>
                    <td>{{$data->name ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.staticpages.fields.body_en')}} En</th>
                    <td>{!! $data->body_en ?? '' !!}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.staticpages.fields.body_ar')}} En</th>
                    <td>{!! $data->body_ar ?? '' !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection