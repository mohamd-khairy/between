@extends('adminlte::page')

@section('title', __('cruds.diet.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.diet.title')}}</h1>
@stop

@section('content')

<!-- Main content -->
<section class="content">

    <div class="row p-3">
        <div class="col-12">
            <a type="submit" href="{{route('admin.diet.create')}}" class="btn btn-success text-dark text-bold">{{__('cruds.diet.create')}}</a>
        </div>
    </div>

    <!-- Default box -->
    <div class="card">

        <div class="card-body">
            <table id="example" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            {{__('cruds.diet.fields.id')}}
                        </th>
                        <th>
                            {{__('cruds.diet.fields.name')}}
                        </th>
                        <th>
                            {{__('cruds.diet.fields.target')}}
                        </th>
                        <th>
                            {{__('cruds.diet.fields.protein')}}
                        </th>
                        <th>
                            {{__('cruds.diet.fields.carb')}}
                        </th>
                        <th>
                            {{__('cruds.diet.fields.fats')}}
                        </th>
                        <th>
                            {{__('cruds.diet.fields.calories')}}
                        </th>
                        <th>
                            {{__('cruds.diet.fields.weight_from')}}
                        </th>
                        <th>
                            {{__('cruds.diet.fields.weight_to')}}
                        </th>
                        <th>
                            {{__('cruds.target.fields.photo')}}
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
                            {{$value->target->name ?? '-'}}
                        </td>
                        <td>
                            {{$value->protein ?? '-'}}
                        </td>
                        <td>
                            {{$value->carb ?? '-'}}
                        </td>
                        <td>
                            {{$value->fats ?? '-'}}
                        </td>
                        <td>
                            {{$value->calories ?? '-'}}
                        </td>
                        <td>
                            {{$value->weight_from ?? '-'}}
                        </td>
                        <td>
                            {{$value->weight_to ?? '-'}}
                        </td>
                        <td>
                            <img src="{{display_img($value->image ? $value->image->photo : null)}}" style="width: 70px;height:70px" class="img-circle">
                        </td>
                        <td class="project-actions text-right">

                            <a class="btn btn-primary btn-sm" href="{{route('admin.diet.show' , $value->id)}}">
                                <i class="fas fa-eye">
                                </i>
                                {{__('cruds.view')}}
                            </a>


                            <a class="btn btn-info btn-sm" href="{{route('admin.diet.edit' , $value->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{__('cruds.edit')}}
                            </a>

                            <form action="{{route('admin.diet.destroy' , $value->id)}}" method="post" onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
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


