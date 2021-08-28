@extends('adminlte::page')

@section('title', __('cruds.daynumber.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.daynumber.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.daynumber.update' , $data->id)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.daynumber.update')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">{{__('cruds.daynumber.fields.diet')}}</label>
                            <select name="number" class="form-control select2">
                                @foreach($allData['diets'] as $diet)
                                <option value="{{$diet->id}}" {{old('diet_id' , $data->diet_id) == $diet->id ? 'selected' : ''}}>{{$diet->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputName">{{__('cruds.daynumber.fields.number')}}</label>
                            <input type="number" id="inputName" placeholder="enter" value="{{old('number' , $data->number)}}" name="number" class="form-control">
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