@extends('adminlte::page')

@section('title', __('cruds.subscription.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.subscription.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.subscription.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.subscription.create')}}</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.subscription.fields.users')}}</label>
                            <select onchange="get_data('user_id', 'addresses', 'user_addresses', 'address_id', 'full_address', 'id')" class="form-control select2" id="user_id" name="user_id">
                                <option value="">select</option>
                                @foreach($allData['users'] as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="addresses"></div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.subscription.fields.ingredients')}}</label>
                            <select class="form-control select2" name="ingredient_ids[]" multiple>
                                @foreach($allData['ingredients'] as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="inputName">{{__('cruds.subscription.fields.proteins')}}</label>
                            <select class="form-control select2" name="protien_ids[]" multiple>
                                @foreach($allData['proteins'] as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.subscription.fields.carbs')}}</label>
                            <select class="form-control select2" name="carb_ids[]" multiple>
                                @foreach($allData['carbs'] as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.subscription.fields.snacks')}}</label>
                            <select class="form-control select2" name="snack_ids[]" multiple>
                                @foreach($allData['snacks'] as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.subscription.fields.type')}}</label>
                            <select class="form-control select2" name="target_id">
                                @foreach($allData['targets'] as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.subscription.fields.diet')}}</label>
                            <select onchange="get_data('diet_id', 'day_numbers', 'diet_day_numbers', 'day_number_id', 'number', 'id');
                            get_data('diet_id', 'meal_numbers', 'diet_meal_numbers', 'meal_number_id', 'number', 'id')" class="form-control select2" id="diet_id" name="diet_id">
                                <option value="">select</option>
                                @foreach($allData['diets'] as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="day_numbers"></div>

                        <div id="meal_numbers"></div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.subscription.fields.dish')}}</label>
                            <select class="form-control select2" id="dish_id" name="dish_id">
                                <option value="">select</option>
                                @foreach($allData['dishs'] as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.subscription.fields.prefered_times')}}</label>
                            <select class="form-control select2" name="prefered_time_id">
                                @foreach($allData['prefered_times'] as $item)
                                <option value="{{$item->id}}">{{$item->from}} - {{$item->to}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.subscription.fields.start_date')}} </label>
                                <input type="date" id="inputName" placeholder="enter" value="{{old('start_date' , '')}}" name="start_date" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.subscription.fields.end_date')}} </label>
                                <input type="date" id="inputName" placeholder="enter" value="{{old('end_date' , '')}}" name="end_date" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputName">{{__('cruds.subscription.fields.paymentmethods')}}</label>
                            <select class="form-control select2" id="payment_method_id" name="payment_method_id">
                                @foreach($allData['paymentmethods'] as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
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