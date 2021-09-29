@extends('adminlte::page')

@section('title', __('cruds.'.($view_fields ? $view_fields['crud_name'] : '').'.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.'.($view_fields ? $view_fields['crud_name'] : '').'.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.'.($view_fields ? $view_fields['crud_route'] : '').'.update' , $data->id)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.'.($view_fields ? $view_fields['crud_name'] : '').'.update')}}</h3>
                    </div>
                    <div class="card-body">
                        @if($view_fields && isset($view_fields['fields']))
                        @foreach($view_fields['fields'] as $key => $value)
                        @if($key == 'row' && isset($value['col']) && isset($value['items']))
                        <div class="form-group row">
                            @foreach($value['items'] as $k => $item)
                            <div class="col-md-{{$value['col']}}">
                                <label for="inputName">{{$item['display_name']}}</label>
                                <input type="{{$item['type']}}" placeholder="enter" value="{{old($item['name'] , $data[$item['name']])}}" name="{{$item['name']}}" id="{{$item['id']}}" class="form-control" required="{{$item['required']}}">
                            </div>
                            @endforeach
                        </div>
                        @elseif($key == 'textarea')
                        <div class="form-group">
                            <label for="inputName">{{$value['display_name']}}</label>
                            <textarea class="form-control" id="{{$value['id']}}" name="{{$value['name']}}">{{old($value['name'] , $data[$value['name']])}}</textarea>
                        </div>
                        @elseif($key == 'photo')
                        <div class="form-group row">

                            <div class="col-md-10">
                                <label for="inputName">{{$value['display_name']}}</label>
                                <input type="{{$value['type']}}" name="{{$value['name']}}" id="{{$value['id']}}" placeholder="enter" class="form-control" required="{{$value['required']}}">
                            </div>

                            <div class="col-md-2">
                                <img src="{{display_img($data->image ? $data->image->$value['name'] : null)}}" class="img-circle" style="width: 100px;height:100px;">
                            </div>
                        </div>
                        @else
                        <div class="form-group">
                            <label for="inputName">{{$value['display_name']}}</label>
                            <input type="{{$value['type']}}" value="{{old($value['name'] , $data[$value['name']])}}" name="{{$value['name']}}" id="{{$value['id']}}" placeholder="enter" class="form-control" required="{{$value['required']}}">
                        </div>
                        @endif
                        @endforeach
                        @endif
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