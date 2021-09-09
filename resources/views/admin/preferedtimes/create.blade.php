@extends('adminlte::page')

@section('title', __('cruds.preferedtime.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.preferedtime.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.preferedtime.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.preferedtime.create')}}</h3>
                    </div>
                    <div class="card-body">


                        <div class="form-group">
                            <label for="inputName">{{__('cruds.preferedtime.fields.from')}}</label>
                            <input type="time" id="inputName" placeholder="enter" value="{{old('from' , '')}}" name="from" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.preferedtime.fields.to')}}</label>
                            <input type="time" id="inputName" placeholder="enter" value="{{old('to' , '')}}" name="to" class="form-control">
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