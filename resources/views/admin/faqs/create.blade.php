@extends('adminlte::page')

@section('title', __('cruds.faq.title'))

@section('content_header')
<h1 class="m-0 text-dark">{{__('cruds.faq.title')}}</h1>
@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('admin.faq.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{__('cruds.faq.create')}}</h3>
                    </div>
                    <div class="card-body">
                    
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.faq.fields.question')}} En</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('question_en' , '')}}" name="question_en" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="inputName">{{__('cruds.faq.fields.question')}} Ar</label>
                                <input type="text" id="inputName" placeholder="enter" value="{{old('question_ar' , '')}}" name="question_ar" class="form-control">
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="inputName">{{__('cruds.faq.fields.answer_en')}}</label>
                                <textarea name="answer_en" class="ckeditor form-control">{{old('answer_en' , '')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="inputName">{{__('cruds.faq.fields.answer_ar')}}</label>
                                <textarea name="answer_ar" class="ckeditor form-control">{{old('answer_ar' , '')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="row p-3">
                        <div class="col-12">
                            <input type="submit" value="{{__('cruds.create')}}" class="btn btn-success float-right">
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </form>
        </div>
    </div>
</section>

@endsection
