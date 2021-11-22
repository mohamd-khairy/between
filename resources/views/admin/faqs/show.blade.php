@extends('adminlte::page')

@section('title', __('cruds.faq.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.faq.title')}}</h1>
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
                    <th>{{__('cruds.faq.fields.id')}}</th>
                    <td>{{$data->id ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.faq.fields.question')}} En</th>
                    <td>{{$data->translate('en')->question ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.faq.fields.question')}} Ar</th>
                    <td>{{$data->translate('ar')->question ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.faq.fields.answer')}} En</th>
                    <td>{!! $data->translate('en')->answer ?? '' !!}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.faq.fields.answer')}} Ar</th>
                    <td>{!! $data->translate('ar')->answer ?? '' !!}</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection