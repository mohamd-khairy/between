@extends('adminlte::page')

@section('title', __('cruds.users.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.users.title')}}</h1>
@stop

@section('content')

<!-- Main content -->
<section class="content">

    <div class="row p-3">
        <div class="col-12">
            <a type="submit" href="{{route('admin.user.create')}}" class="btn btn-success text-dark text-bold">{{__('cruds.users.create')}}</a>
        </div>
    </div>

    <!-- Default box -->
    <div class="card">

        <div class="card-body">
            <table id="example" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            {{__('cruds.users.fields.id')}}
                        </th>
                        <th>
                            {{__('cruds.users.fields.name')}}
                        </th>
                        <th>
                            {{__('cruds.users.fields.email')}}
                        </th>
                        <th>
                            {{__('cruds.users.fields.phone')}}
                        </th>
                        <th>
                            {{__('cruds.users.fields.gender')}}
                        </th>
                        <th>
                            {{__('cruds.users.fields.type')}}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>
                            {{$value->id ?? '-'}}
                        </td>
                        <td>
                            {{$value->name ?? '-'}}
                        </td>
                        <td>
                            {{$value->email ?? '-'}}
                        </td>
                        <td>
                            {{$value->phone ?? '-'}}
                        </td>
                        <td>
                            {{$value->gender ? __('cruds.'.$value->gender) : '-'}}
                        </td>
                        <td>
                            {{__('cruds.'.$value->type) ?? '-'}}
                        </td>

                        <td class="project-actions text-right">

                            <a class="btn btn-primary btn-sm" href="{{route('admin.user.show' , $value->id)}}">
                                <i class="fas fa-eye">
                                </i>
                                {{__('cruds.view')}}
                            </a>


                            <a class="btn btn-info btn-sm" href="{{route('admin.user.edit' , $value->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{__('cruds.edit')}}
                            </a>
                            
                            @if($value->id != 1)
                            <form action="{{route('admin.user.destroy' , $value->id)}}" method="post" onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash">
                                    </i>
                                    {{__('cruds.delete')}}
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@stop