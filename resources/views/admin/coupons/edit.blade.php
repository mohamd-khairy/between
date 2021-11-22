@extends('adminlte::page')

@section('title', __('cruds.coupon.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.coupon.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.coupon.update' , $data->id)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.coupon.update')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">{{__('cruds.coupon.fields.food')}}</label>
                            <select name="food_id" class="form-control select2">
                                <option value="">select</option>
                                @foreach($allData['foods'] as $food)
                                <option value="{{$food->id}}" {{old('food_id' , $data->food_id) == $food->id ? 'selected' : ''}}>{{$food->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="inputName">{{__('cruds.coupon.fields.code')}}</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('code' , $data->code)}}" name="code" class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label for="inputName">{{__('cruds.coupon.fields.type')}}</label>
                                <select class="form-control" name="type">
                                    <option value="cash" {{old('type' ,$data->type) == 'cash' ? 'selected' : ''}}>{{__('cruds.coupon.fields.cash')}}</option>
                                    <option value="percentage" {{old('type' , $data->type) == 'percentage' ? 'selected' : ''}}>{{__('cruds.coupon.fields.percentage')}}</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="inputName">{{__('cruds.coupon.fields.discount')}}</label>
                                <input type="number" id="inputName" placeholder="enter" value="{{old('discount' , $data->discount)}}" name="discount" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.coupon.fields.start_date')}}</label>
                                <input type="date" id="inputName" placeholder="enter" value="{{old('start_date' , $data->start_date)}}" name="start_date" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.coupon.fields.end_date')}}</label>
                                <input type="date" id="inputName" placeholder="enter" value="{{old('end_date' , $data->end_date)}}" name="end_date" class="form-control">
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