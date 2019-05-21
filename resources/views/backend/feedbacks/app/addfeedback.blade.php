@extends ('backend.layouts.app')
@section ('title', trans('labels.frontend.Feedback.title'))
@section('page-header')
<h1>{{ trans('labels.frontend.Feedback.add_feedback') }}</h1>
@endsection
@section('content')

{{ Form::open(['route' => ['admin.store.feedback',$intervention_type_id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

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

                <div class="form-group">

                    {{ Form::label('rating', trans('labels.frontend.Feedback.rating'), ['class' => 'col-lg-2 control-label'])
                    }}

                    <div class="col-lg-10">

                        <input required id="rating-control{!! $intervention_type_id !!}" name="ratingsValues" type="text" class="kv-svg rating-loading" value=""  data-size="xs" title="">


                    </div>
                    <!--col-lg-10-->
                </div>
            </div>
            <div class="edit-form-btn">
                <a href="{!! route('admin.feedback.index') !!}" class="btn btn-primary">Back</a>
                <button type="submit" class="btn btn-primary add_ratings">Save Feedback</button>
            </div>
        </div>
    </div>
</div>
</div>
{{ Form::close() }}
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
                'change', function () {                 console.log('Rating selected: ' + $(this).val());
                ratingVal.pop();
                ratingVal.push($(this).val());
            });
        jQuery('.add_ratings').on('click', function (event) {         var knowledgebaseId = $(this).attr('data');
        var clientId = $(this).attr('data');
        jQuery('#rating-control' + knowledgebaseId).rating('refresh', {disabled: true, showClear: false, showCaption: true});
        //ajax call for update ratings.
                var result = AJAX.sendRequest("{{route('admin.knowledgebases.ratings')}}", "POST", {"id": knowledgebaseId, 'ratingVal': ratingVal, 'clientId': clientId}, function (response) {             if (response != true) {                 jQuery('#add_ratings-' + knowledgebaseId).hide();
                toastr.success('Rating save successfully.');
            }

        });
    });


</script>
@endsection