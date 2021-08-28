@extends('adminlte::page')

@section('title', __('cruds.diet.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.diet.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.diet.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.diet.create')}}</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.diet.fields.name')}} En</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('name_en' , '')}}" name="name_en" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.diet.fields.name')}} Ar</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('name_ar' , '')}}" name="name_ar" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.diet.fields.target')}}</label>
                            <select class="form-control select2" name="target_id">
                                <option value="">select</option>
                                @foreach($targets as $target)
                                <option value="{{$target->id}}">{{$target->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.diet.fields.protein')}}</label>
                                <input type="number" id="inputName" placeholder="enter" value="{{old('protein' , '')}}" name="protein" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.diet.fields.carb')}}</label>
                                <input type="number" id="inputName" placeholder="enter" value="{{old('carb' , '')}}" name="carb" class="form-control">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.diet.fields.price_for_meal')}}</label>
                            <input type="number" id="inputName" placeholder="enter" value="{{old('price_for_meal' , '')}}" name="price_for_meal" class="form-control">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="row p-3">
                        <div class="col-12">
                            <input type="submit" value="{{__('cruds.create')}}" class="btn btn-success float-right">
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </form>
        </div>
    </div>
</section>

@endsection