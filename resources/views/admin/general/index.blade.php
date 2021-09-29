@extends('adminlte::page')

@section('title', __('cruds.'.($view_fields ? $view_fields['crud_name'] : '').'.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.'.($view_fields ? $view_fields['crud_name'] : '').'.title')}}</h1>
@stop

@section('content')

<!-- Main content -->
<section class="content">

    <div class="row p-3">
        <div class="col-12">
            <a type="submit" href="{{route('admin.'.($view_fields ? $view_fields['crud_route'] : '').'.create')}}" class="btn btn-success text-dark text-bold">{{__('cruds.target.create')}}</a>
        </div>
    </div>

    @if($view_fields && isset($view_fields['fields']))

    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <table id="example" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            {{__('cruds.target.fields.id')}}
                        </th>
                        @foreach($view_fields['fields'] as $key => $value)
                        @if($key == 'row')
                        @if(isset($value['translated']))
                        <th>
                            {{$value['translated']['display_name']}}
                        </th>
                        @else
                        @foreach($value['items'] as $k => $item)
                        <th>
                            {{$item['display_name']}}
                        </th>
                        @endforeach
                        @endif
                        @else
                        <th>
                            {{$value['display_name']}}
                        </th>
                        @endif
                        @endforeach
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $result)
                    <tr>
                        <td>
                            {{$result->id ?? '-'}}
                        </td>
                        @foreach($view_fields['fields'] as $key => $value)
                        @if($key == 'row')
                        @if(isset($value['translated']))
                        <td>
                            {{$result[$value['translated']['name']]}}
                        </td>
                        @else
                        @foreach($value['items'] as $k => $item)
                        <td>
                            {{$result->$item['name']}}
                        </td>
                        @endforeach
                        @endif
                        @elseif($key == 'photo')
                        <td>
                            <img src="{{display_img($result->image ? $result->image->$value['name'] : null)}}" style="width: 70px;height:70px" class="img-circle">
                        </td>
                        @else
                        <td>
                            {{$result->$value['name']}}
                        </td>
                        @endif
                        @endforeach
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{route('admin.'.($view_fields ? $view_fields['crud_route'] : '').'.show' , $result->id)}}">
                                <i class="fas fa-eye">
                                </i>
                                {{__('cruds.view')}}
                            </a>
                            <a class="btn btn-info btn-sm" href="{{route('admin.'.($view_fields ? $view_fields['crud_route'] : '').'.edit' , $result->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{__('cruds.edit')}}
                            </a>
                            <form action="{{route('admin.'.($view_fields ? $view_fields['crud_route'] : '').'.destroy' , $result->id)}}" method="post" onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash">
                                    </i>
                                    {{__('cruds.delete')}}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    @endif
</section>
<!-- /.content -->
@endsection