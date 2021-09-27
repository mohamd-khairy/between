@extends('adminlte::page')

@section('title', __('cruds.mealtype.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.mealtype.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.mealtype.update' , $data->id)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.mealtype.update')}}</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.mealtype.fields.name')}} En</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('name_en' , $data->translate('en')->name ?? '')}}" name="name_en" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.mealtype.fields.name')}} Ar</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('name_ar' , $data->translate('ar')->name ?? '')}}" name="name_ar" class="form-control">
                            </div>
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

                        @if($parent && $parent == 1)

                        <input type="hidden" name="parent" value="1">
                        <input type="hidden" name="parent_id" value="">


                        @else

                        <input type="hidden" name="parent" value="{{$parent}}">

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.mealtype.fields.main_type')}}</label>
                            <select class="form-control select2" name="parent_id">
                                <option value="">select</option>
                                @foreach($main_types as $type)
                                <option value="{{$type->id}}" {{ old('parent_id' , $data->parent_id) == $type->id ? 'selected' : ''}}>{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        @endif
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