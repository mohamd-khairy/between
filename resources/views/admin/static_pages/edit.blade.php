@extends('adminlte::page')

@section('title', __('cruds.staticpages.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.staticpages.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.staticpages.update' , $data->id)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.staticpages.update')}}</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="inputName">{{__('cruds.staticpages.fields.name')}}</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('name' , $data->name)}}" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="inputName">{{__('cruds.staticpages.fields.body_en')}}</label>
                                <textarea name="body_en" class="form-control">{{old('body_en' , $data->body_en)}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="inputName">{{__('cruds.staticpages.fields.body_ar')}}</label>
                                <textarea name="body_ar" class="form-control">{{old('body_ar' , $data->body_ar)}}</textarea>
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