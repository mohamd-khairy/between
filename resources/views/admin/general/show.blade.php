@extends('adminlte::page')

@section('title', __('cruds.'.($view_fields ? $view_fields['crud_name'] : '').'.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.'.($view_fields ? $view_fields['crud_name'] : '').'.title')}}</h1>
@stop

@section('content')

<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('cruds.value')}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{__('cruds.target.fields.id')}}</th>
                    <td>{{$data->id ?? ''}}</td>
                </tr>
                @if($view_fields && isset($view_fields['fields']))
                @foreach($view_fields['fields'] as $key => $value)
                @if($key == 'row' && isset($value['translated']))
                <tr>
                    <th>{{$value['translated']['display_name'] ?? '-'}}</th>
                    <td>{{$data[$value['translated']['name']] ?? '-'}}</td>
                </tr>
                @elseif($key == 'photo')
                <tr>
                    <th>{{$value['display_name']}}</th>
                    <td><img src="{{display_img($data->image?$data->image->$value['name']:null)}}" style="width: 70px;height:70px" class="img-circle"></td>
                </tr>
                @elseif($key == 'select')
                <tr>
                    <th>{{$value['display_name'] ?? '-'}}</th>
                    <td>{{$data[$value['relation']['name']][$value['relation']['item_name']]  ?? '-'}}</td>
                </tr>
                @else
                <tr>
                    <th>{{$value['translated']['display_name'] ?? '-'}}</th>
                    <td>{{$data[$value['translated']['name']] ?? '-'}}</td>
                </tr>
                @endif
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection