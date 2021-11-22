@extends('adminlte::page')

@section('title', __('cruds.faq.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.faq.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.faq.update' , $data->id)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.faq.update')}}</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.faq.fields.question')}} En</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('question_en' , $data->translate('en')->question ?? '')}}" name="question_en" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.faq.fields.question')}} Ar</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('question_ar' , $data->translate('ar')->question ?? '')}}" name="question_ar" class="form-control">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="inputName">{{__('cruds.faq.fields.answer_en')}}</label>
                                <textarea name="answer_en" class="ckeditor form-control">{{old('answer_en' , $data->translate('en')->answer ?? '')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="inputName">{{__('cruds.faq.fields.answer_ar')}}</label>
                                <textarea name="answer_ar" class="ckeditor form-control">{{old('answer_ar' , $data->translate('ar')->answer ?? '')}}</textarea>
                            </div>
                        </div>
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