@extends('adminlte::page')

@section('title', __('cruds.food.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.food.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.food.update' , $data->id)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.food.update')}}</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.food.fields.name')}} En</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('name_en' , $data->translate('en')->name ?? '')}}" name="name_en" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.food.fields.name')}} Ar</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('name_ar' , $data->translate('ar')->name ?? '')}}" name="name_ar" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.food.fields.details')}} En</label>
                                <input type="text" id="inputdetails" placeholder="enter" value="{{old('details_en' , $data->translate('en')->details ?? '')}}" name="details_en" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputdetails">{{__('cruds.food.fields.details')}} Ar</label>
                                <input type="text" id="inputdetails" placeholder="enter" value="{{old('details_ar' , $data->translate('ar')->details ?? '')}}" name="details_ar" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName">{{__('cruds.food.fields.mealtypes')}}</label>
                            <select class="form-control select2" name="meal_type_id[]" multiple>
                                @foreach($allData['MealType'] as $type)
                                <option value="{{$type->id}}" {{in_array($type->id , $data->mealtypes_many->pluck('meal_type_id')->toArray()) ? 'selected' : '' }}>{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="inputName">{{__('cruds.food.fields.type')}}</label>
                            <select class="form-control select2" name="type[]" multiple>
                                @foreach($allData['dishs'] as $item)
                                <option value="{{$item->id}}" {{in_array($item->id , $data->foodtypes_many->pluck('dish_id')->toArray()) ? 'selected' : '' }}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.food.fields.protein')}}</label>
                                <input type="number" id="inputName" placeholder="enter" value="{{old('protein' , $data->protein)}}" name="protein" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.food.fields.carb')}}</label>
                                <input type="number" id="inputName" placeholder="enter" value="{{old('carb' , $data->carb)}}" name="carb" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.food.fields.fats')}}</label>
                                <input type="number" id="inputName" placeholder="enter" value="{{old('fats' , $data->fats)}}" name="fats" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.food.fields.calories')}}</label>
                                <input type="number" id="inputName" placeholder="enter" value="{{old('calories' , $data->calories)}}" name="calories" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.food.fields.weight')}}</label>
                            <input type="number" id="inputName" placeholder="enter" value="{{old('weight' , $data->weight)}}" name="weight" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.food.fields.price')}}</label>
                            <input type="number" id="inputName" placeholder="enter" value="{{old('price' , $data->price)}}" name="price" class="form-control">
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10">
                                <label for="inputName">{{__('cruds.food.fields.photo')}}</label>
                                <input type="file" id="inputName" placeholder="enter" name="photo" class="form-control">
                            </div>

                            <div class="col-md-2">
                                <img src="{{display_img($data->image ? $data->image->photo : null)}}" class="img-circle" style="width: 100px;height:100px;">
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="row p-3">
                        <div class="col-12">
                            <input type="submit" value="{{__('cruds.edit')}}" class="btn btn-success float-right">
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </form>
        </div>
    </div>
</section>

@endsection