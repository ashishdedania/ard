@extends ('backend.layouts.app')
@section ('title', trans('labels.frontend.testimonials.title'))
@section('page-header')
<h1>{{ trans('labels.frontend.testimonials.view_feedback') }}</h1>
@endsection
@section('content')
 
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $interventionType[0]}} :</h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            <div class="box-body">

              <div class="form-group">

                    {{ Form::label('comment', trans('labels.frontend.Feedback.comment'), ['class' => 'col-lg-2 control-label', 'style'=>"font-weight: bold"])
                    }}

                    <div class="col-lg-10">
                        {!! $getTestimonialsdetails[0]->comment !!}
                    </div>
                    <!--col-lg-10-->
                </div> 

                
            </div>
                 

                <div class="edit-form-btn">

                    <a href="{!! route('admin.testimonials.index') !!}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section("after-scripts")

@endsection