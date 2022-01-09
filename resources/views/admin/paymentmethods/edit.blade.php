@extends('adminlte::page')

@section('title', __('cruds.paymentmethod.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.paymentmethod.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.paymentmethod.update' , $data->id)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.paymentmethod.update')}}</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.paymentmethod.fields.key')}}</label>
                            <input type="text" readonly id="inputName" placeholder="enter" value="{{old('key' , $data->key ?? '')}}" name="key" class="form-control">
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.paymentmethod.fields.title')}} En</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('title_en' , $data->translate('en')->title ?? '')}}" name="title_en" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.paymentmethod.fields.title')}} Ar</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('title_ar' , $data->translate('ar')->title ?? '')}}" name="title_ar" class="form-control">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.paymentmethod.fields.status')}}</label>
                            <select style="width: 100%;" data-live-search="true" class="form-control " name="status">
                                <option value="">select</option>
                                <option value="1" {{old('status' , $data->status) == 1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{old('status' , $data->status) == 0 ? 'selected' : ''}}>Not Active</option>
                            </select>
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