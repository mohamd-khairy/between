@extends('adminlte::page')

@section('title', __('cruds.subscription.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.subscription.title')}}</h1>
@stop

@section('adminlte_css')
<style>
    .dtr-control.sorting_1:before {
        left: 35px;
        height: 14px;
        width: 14px;
        display: block;
        position: absolute;
        color: white;
        border: 2px solid white;
        border-radius: 14px;
        box-shadow: 0 0 3px #444;
        box-sizing: content-box;
        text-align: center;
        text-indent: 0 !important;
        font-family: 'Courier New', Courier, monospace;
        line-height: 14px;
        content: '+';
        background-color: #31b131;
    }
</style>
@endsection
@section('content')

<!-- Main content -->
<section class="content">

    <div class="row p-3">
        <div class="col-12">
            <a type="submit" href="{{route('admin.subscription.create')}}" class="btn btn-success text-dark text-bold">{{__('cruds.subscription.create')}}</a>
        </div>
    </div>

    <!-- Default box -->
    <div class="card">

        <div class="card-body">
            <table id="example" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{__('cruds.subscription.fields.id')}}
                        </th>
                        <th>
                            {{__('cruds.subscription.fields.order_number')}}
                        </th>
                        <th>
                            {{__('cruds.subscription.fields.name')}}
                        </th>
                        <th>
                            {{__('cruds.subscription.fields.type')}}
                        </th>
                        <th>
                            {{__('cruds.subscription.fields.diet')}}
                        </th>
                        <th>
                            {{__('cruds.subscription.fields.dish')}}
                        </th>
                        <th>
                            {{__('cruds.subscription.fields.meal_numbers')}}
                        </th>
                        <th>
                            {{__('cruds.subscription.fields.prefered_times')}}
                        </th>

                        <th>
                            {{__('cruds.subscription.fields.ingredients')}}
                        </th>
                        <th>
                            {{__('cruds.subscription.fields.proteins')}}
                        </th>
                        <th>
                            {{__('cruds.subscription.fields.carbs')}}
                        </th>
                        <th>
                            {{__('cruds.subscription.fields.snacks')}}
                        </th>
                        <th>
                            {{__('cruds.subscription.fields.weight')}}
                        </th>
                        <th>
                            {{__('cruds.subscription.fields.price')}}
                        </th>
                        <th>
                            {{__('cruds.target.fields.photo')}}
                        </th>
                        <th>
                            {{__('cruds.subscription.fields.status')}}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                        <td></td>
                        <td>
                            {{$value->id ?? '-'}}
                        </td>
                        <td>
                            {{$value->order_number ?? '-'}}
                        </td>
                        <td>
                            {{$value->user->name ?? '-'}}
                        </td>
                        <td>
                            {{$value->target->name ?? '-'}}
                        </td>
                        <td>
                            {{$value->diet ? $value->diet->name : '-'}}
                        </td>
                        <td>
                            {{$value->dish ? $value->dish->name : '-'}}
                        </td>

                        <td>
                            {{$value->meal_number ? $value->meal_number->number : '-'}}
                        </td>

                        <td>
                            {{$value->prefered_time ? $value->prefered_time->from .'-'. $value->prefered_time->to : '-'}}
                        </td>


                        <td>
                            {{ $value->ingredient_name  ?? '-'}}
                        </td>
                        <td>
                            {{$value->proteins_name ?? '-'}}
                        </td>
                        <td>
                            {{$value->carbs_name ?? '-'}}
                        </td>
                        <td>
                            {{$value->snacks_name ?? '-'}}
                        </td>
                        <td>
                            {{$value->weight ?? '-'}}
                        </td>
                        <td>
                            {{$value->total ?? '-'}}
                        </td>
                        <td>
                            <img src="{{display_img($value->image ? $value->image->photo : null)}}" style="width: 70px;height:70px" class="img-circle">
                        </td>
                        <td>
                            {{$value->status ? 'Active' : 'Not Active'}}
                        </td>
                        <td class="project-actions text-right">

                            <a class="btn btn-primary btn-sm" href="{{route('admin.subscription.show' , $value->id)}}">
                                <i class="fas fa-eye">
                                </i>
                                {{__('cruds.view')}}
                            </a>


                            <a class="btn btn-info btn-sm" href="{{route('admin.subscription.edit' , $value->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                {{__('cruds.edit')}}
                            </a>

                            <form action="{{route('admin.subscription.destroy' , $value->id)}}" method="post" onsubmit="return confirm('Are You Sure?');" style="display: inline-block;">
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