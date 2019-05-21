@extends ('backend.layouts.app')
@section ('title', trans('labels.frontend.testimonials.title'))
@section('page-header')
<h1>{{ trans('labels.frontend.testimonials.add_testimonials') }}</h1>
@endsection
@section('content')

{{ Form::open(['route' => ['admin.store.testimonial',$intervention_type_id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $interventionType[0]}} :</h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            <div class="box-body">

                <div class="form-group">

                    {{ Form::label('comment', trans('labels.frontend.Feedback.comment'), ['class' => 'col-lg-2 control-label'])
                    }}

                    <div class="col-lg-10">
                        {{ Form::textarea('comment', null, ['class' => 'form-control','required','style'=> 'width:81%', 'placeholder' => trans('labels.frontend.Feedback.comment')])
                        }}
                    </div>
                    <!--col-lg-10-->
                </div>
                
            </div>
            <div class="edit-form-btn">
                <a href="{!! route('admin.testimonials.index') !!}" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary add_ratings">Save</button>
            </div>
        </div>
    </div>
</div>
</div>
{{ Form::close() }}
@endsection
@section("after-scripts")

@endsection