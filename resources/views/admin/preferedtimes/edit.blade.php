@extends('adminlte::page')

@section('title', __('cruds.mealnumber.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.mealnumber.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.mealnumber.update' , $data->id)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.mealnumber.update')}}</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.preferedtime.fields.from')}}</label>
                            <input type="time" id="inputName" placeholder="enter" value="{{old('from' , $data->from)}}" name="from" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.preferedtime.fields.to')}}</label>
                            <input type="time" id="inputName" placeholder="enter" value="{{old('to' , $data->to)}}" name="to" class="form-control">
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