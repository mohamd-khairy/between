@extends('adminlte::page')

@section('title', __('cruds.users.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.users.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.user.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.users.create')}}</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.users.fields.name')}} En</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('name_en' , '')}}" name="name_en" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.users.fields.name')}} Ar</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('name_ar' , '')}}" name="name_ar" class="form-control">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.users.fields.email')}} </label>
                            <input type="email" id="inputName" placeholder="enter" value="{{old('email' , '')}}" name="email" class="form-control">
                        </div>

                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.users.fields.password')}} </label>
                            <input type="password" id="inputName" placeholder="enter" value="{{old('password' , '')}}" name="password" class="form-control">
                        </div>

                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.users.fields.phone')}} </label>
                            <input type="text" id="inputName" placeholder="enter" value="{{old('phone' , '')}}" name="phone" class="form-control">
                        </div>

                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.users.fields.weight')}} </label>
                            <input type="text" id="inputName" placeholder="enter" value="{{old('weight' , '')}}" name="weight" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.users.fields.height')}} </label>
                            <input type="text" id="inputName" placeholder="enter" value="{{old('height' , '')}}" name="height" class="form-control">
                        </div>

                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.users.fields.gender')}} </label>
                            <select class="form-control" name="gender">
                                <option value="male" {{old('gender' , '') == 'male' ? 'selected' : ''}}>{{__('cruds.male')}}</option>
                                <option value="female" {{old('gender' , '') == 'female' ? 'selected' : ''}}>{{__('cruds.female')}}</option>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label for="inputName">{{__('cruds.users.fields.type')}} </label>
                            <select class="form-control" name="type">
                                <option value="user" {{old('type' , '') == 'user' ? 'selected' : ''}}>{{__('cruds.user')}}</option>
                                <option value="admin" {{old('type' , '') == 'admin' ? 'selected' : ''}}>{{__('cruds.admin')}}</option>
                            </select>
                        </div>
                        <!-- /.card-body -->
                        <div class="row p-3">
                            <div class="col-12">
                                <input type="submit" value="{{__('cruds.create')}}" class="btn btn-success float-right">
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </form>
        </div>
    </div>
</section>

@endsection