@extends ('backend.layouts.app')
@section ('title', trans('labels.frontend.Feedback.title'))
@section('page-header')
<h1>{{ trans('labels.frontend.Feedback.view_feedback') }}</h1>
@endsection
@section('content')

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $interventionType[0]}} :</h3>
    </div>
        <div class="box-body">
          <div class="form-group">
            <div class="row">
            <div class="col-lg-2">
                {{ Form::label('comment', trans('labels.frontend.Feedback.comment'), ['class' => ' control-label', 'style'=>"font-weight: bold"])
                }}
            </div>
                <div class="col-lg-10">
                    {!! $getFeedbackdetails[0]->comment !!}
                </div>
            </div>
                <!--col-lg-10-->
            </div>

            <div class="form-group">
                <div class="row">
                <div class="col-lg-2">
                {{ Form::label('ratings', trans('labels.frontend.Feedback.rating'), ['class' => 'control-label','style'=>"font-weight: bold"])
                }}
                </div>
                <div class="col-lg-10">


                <input id="rating-control" name="ratingsValues" @if($getFeedbackdetails[0]->ratings != '') disabled @endif  type="text" class="kv-svg rating-loading" value="@if($getFeedbackdetails[0]->ratings != '') {!! $getFeedbackdetails[0]->ratings !!} @else @endif"  data-size="xs" title=""/>
                </div>
            </div>
                <!--col-lg-10-->
            </div>
            <div class="prd-15">
                <a href="{!! route('admin.feedback.index') !!}" class="btn btn-primary">Back</a>
            </div>
        </div>

    </div>
</div>

@endsection
@section("after-scripts")
<script type="text/javascript">

    //stra ratings.
     jQuery('.kv-svg').rating({
            showClear: false,
            theme: 'krajee-svg',
            filledStar: '<span class="krajee-icon krajee-icon-star"></span>',
            emptyStar: '<span class="krajee-icon krajee-icon-star"></span>'
        });
        var ratingVal = [];
        //change the ratings.
        jQuery('.rating,.kv-gly-star,.kv-gly-heart,.kv-uni-star,.kv-uni-rook,.kv-fa,.kv-fa-heart,.kv-svg,.kv-svg-heart').on(
                'change', function () {
                    console.log('Rating selected: ' + $(this).val());
                    ratingVal.pop();
                    ratingVal.push($(this).val());
                });
        jQuery('.add_ratings').on('click',function(event) {
                    var knowledgebaseId = $(this).attr('data');
                    var clientId = $(this).attr('data');
                    jQuery('#rating-control'+knowledgebaseId).rating('refresh', {disabled: true, showClear: false, showCaption: true});

        });


</script>
@endsection