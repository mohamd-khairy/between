@extends('adminlte::page')

@section('title', __('cruds.address.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.address.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.address.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.address.create')}}</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.address.fields.user')}} </label>
                            <select class="form-control select2" name="user_id">
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.address.fields.state')}} </label>
                            <select class="form-control select2" name="state_id">
                                @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.address.fields.district')}} En</label>
                                <input type="text" placeholder="enter" value="{{old('district_en' , '')}}" name="district_en" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.address.fields.district')}} Ar</label>
                                <input type="text" placeholder="enter" value="{{old('district_ar' , '')}}" name="district_ar" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.address.fields.street')}} En</label>
                                <input type="text" placeholder="enter" value="{{old('street_en' , '')}}" name="street_en" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.address.fields.street')}} Ar</label>
                                <input type="text" placeholder="enter" value="{{old('street_ar' , '')}}" name="street_ar" class="form-control">
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.address.fields.floor')}}</label>
                            <input type="text" placeholder="enter" value="{{old('floor' , '')}}" name="floor" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.address.fields.building')}}</label>
                            <input type="text" placeholder="enter" value="{{old('building' , '')}}" name="building" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.address.fields.apartment_number')}}</label>
                            <input type="text" placeholder="enter" value="{{old('apartment_number' , '')}}" name="apartment_number" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.users.fields.type')}} </label>
                            <select class="form-control" name="type">
                                <option value="home" {{old('type' , '') == 'home' ? 'selected' : ''}}>{{__('cruds.home')}}</option>
                                <option value="work" {{old('type' , '') == 'work' ? 'selected' : ''}}>{{__('cruds.work')}}</option>
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