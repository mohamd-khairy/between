@extends('adminlte::page')

@section('title', __('cruds.coupon.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.coupon.title')}}</h1>
@stop

@section('content')

<!-- Main content -->
<section class="content">

    <div class="row p-3">
        <div class="col-12">
            <a type="submit" href="{{route('admin.coupon.create')}}" class="btn btn-success text-dark text-bold">{{__('cruds.coupon.create')}}</a>
        </div>
    </div>

    <!-- Default box -->
    <div class="card">

        <div class="card-body">
            <table id="example" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            {{__('cruds.coupon.fields.id')}}
                        </th>
                        <th>
                            {{__('cruds.coupon.fields.food')}}
                        </th>
                        <th>
                            {{__('cruds.coupon.fields.code')}}
                        </th>
                        <th>
                            {{__('cruds.coupon.fields.type')}}
                        </th>
                        <th>
                            {{__('cruds.coupon.fields.discount')}}
                        </th>
                        <th>
                            {{__('cruds.coupon.fields.start_date')}}
                        </th>
                        <th>
                            {{__('cruds.coupon.fields.end_date')}}
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
                            {{$value->food->name ?? '-'}}
                        </td>
                        <td>
                            {{$value->code ?? '-'}}
                        </td>
                        <td>
                            {{$value->type ?? '-'}}
                        </td>
                        <td>
                            {{$value->discount ?? '-'}}
                        </td>
                        <td>
                            {{$value->start_date ?? '-'}}
                        </td>
                        <td>
                            {{$value->end_date ?? '-'}}
                        </td>

                        <td class="project-actions text-right">

                            <a class="btn btn-primary btn-sm" href="{{route('admin.coupon.show' , $value->id)}}">
                                <i class="fas fa-eye">
                                </i>
                                {{__('cruds.view')}}
                            </a>


                            <a class="btn btn-info btn-sm" href="{{route('admin.coupon.edit' , $value->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{__('cruds.edit')}}
                            </a>

                            <form action="{{route('admin.coupon.destroy' , $value->id)}}" method="post" onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
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


