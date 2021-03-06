@extends('adminlte::page')

@section('title', __('cruds.diet.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.diet.title')}}</h1>
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
                    <th>{{__('cruds.diet.fields.id')}}</th>
                    <td>{{$data->id ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.diet.fields.name')}} En</th>
                    <td>{{$data->translate('en')->name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.diet.fields.name')}} Ar</th>
                    <td>{{$data->translate('ar')->name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.diet.fields.target')}}</th>
                    <td>{{$data->target->name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.diet.fields.protein')}}</th>
                    <td>{{$data->protein ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.diet.fields.carb')}}</th>
                    <td>{{$data->carb ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.diet.fields.fats')}}</th>
                    <td>{{$data->fats ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.diet.fields.calories')}}</th>
                    <td>{{$data->calories ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.diet.fields.weight_from')}}</th>
                    <td>{{$data->weight_from ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.diet.fields.weight_to')}}</th>
                    <td>{{$data->weight_to ?? ''}}</td>
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