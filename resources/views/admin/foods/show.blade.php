@extends('adminlte::page')

@section('title', __('cruds.food.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.food.title')}}</h1>
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
                    <th>{{__('cruds.food.fields.id')}}</th>
                    <td>{{$data->id ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.food.fields.name')}} En</th>
                    <td>{{$data->translate('en')->name ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.food.fields.name')}} Ar</th>
                    <td>{{$data->translate('ar')->name ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.food.fields.details')}} En</th>
                    <td>{{$data->translate('en')->details ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.food.fields.details')}} Ar</th>
                    <td>{{$data->translate('ar')->details ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.food.fields.mealtypes')}}</th>
                    <td>{{$data->mealtypes->pluck('name') ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.food.fields.type')}}</th>
                    <td> {{$data->foodtypes_many ? $data->foodtypes_many->pluck('dish.name') : '-'}}
                    </td>
                </tr>
                <tr>
                    <th>{{__('cruds.food.fields.ingredients')}}</th>
                    <td> {{$data->ingredients_many ? $data->ingredients_many->pluck('ingredient.name') : '-'}}
                    </td>
                </tr>
                <tr>
                    <th>{{__('cruds.food.fields.protein')}}</th>
                    <td>{{$data->protein ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.food.fields.carb')}}</th>
                    <td>{{$data->carb ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.food.fields.fats')}}</th>
                    <td>{{$data->fats ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.food.fields.calories')}}</th>
                    <td>{{$data->calories ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.food.fields.weight')}}</th>
                    <td>{{$data->weight ?? ''}}</td>
                </tr>

                <tr>
                    <th>{{__('cruds.food.fields.price')}}</th>
                    <td>{{$data->price ?? ''}}</td>
                </tr>
                <tr>
                    <th>{{__('cruds.target.fields.photo')}}</th>
                    <td><img src="{{display_img($data->image?$data->image->photo:null)}}" style="width: 70px;height:70px" class="img-circle"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection