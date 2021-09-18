@extends('adminlte::page')

@section('title', __('cruds.mealtype.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.mealtype.title')}}</h1>
@stop

@section('content')

<!-- Main content -->
<section class="content">

    <div class="row p-3">
        <div class="col-12">
            @if(request('parent'))
            <a type="submit" href="{{route('admin.mealtype.create')}}?parent={{request('parent')}}" class="btn btn-success text-dark text-bold">{{__('cruds.mealtype.create')}}</a>
            @else
            <a type="submit" href="{{route('admin.mealtype.create')}}" class="btn btn-success text-dark text-bold">{{__('cruds.mealtype.create')}}</a>
            @endif
        </div>
    </div>

    <!-- Default box -->
    <div class="card">

        <div class="card-body">
            <table id="example" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            {{__('cruds.mealtype.fields.id')}}
                        </th>
                        <th>
                            {{__('cruds.mealtype.fields.name')}}
                        </th>
                        @if(!request('parent'))
                        <th>
                            {{__('cruds.mealtype.fields.main_type')}}
                        </th>
                        @endif
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
                        @if(!request('parent'))
                        <td>
                            {{$value->main_type->name ?? '-'}}
                        </td>
                        @endif

                        <td class="project-actions text-right">

                            <a class="btn btn-primary btn-sm" href="{{route('admin.mealtype.show' , $value->id)}}">
                                <i class="fas fa-eye">
                                </i>
                                {{__('cruds.view')}}
                            </a>


                            @if(request('parent'))
                            <a class="btn btn-info btn-sm" href="{{route('admin.mealtype.edit' , $value->id)}}?parent={{request('parent')}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{__('cruds.edit')}}
                            </a>
                            @else
                            <a class="btn btn-info btn-sm" href="{{route('admin.mealtype.edit' , $value->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{__('cruds.edit')}}
                            </a>
                            @endif



                            <form action="{{route('admin.mealtype.destroy' , $value->id)}}" method="post" onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
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

</section>
<!-- /.content -->
@endsection

