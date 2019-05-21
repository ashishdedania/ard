@extends ('backend.layouts.app')
@section ('title', trans('labels.backend.knowledgebases.management'))
@section('page-header')
<h1>{{ trans('labels.backend.knowledgebases.management') }}</h1>
@endsection
@section('content')
<div class="box box-info knowledge-management">
    @php
    $knowledgebaseData = $knowledgebase->toArray()['data'];
    @endphp
    <div class="row flex-box">
        @if (!empty($knowledgebaseData))
        @foreach ($knowledgebaseData as $key => $getknowledgeBase )
        @if ($getknowledgeBase['client_knowledge_id'] != null)
        @php
        $fileName[] = json_decode($getknowledgeBase['file'],TRUE);
        @endphp
        <div class="col-md-3 col-sm-6 mrg-15">
            <div class="card card-1">
                <label>Knowledge Base Title</label> <span>{!! $getknowledgeBase['title'] !!}</span>
                <div class="box-divider"></div>
                <label>Attachments</label>
                <span><a href="#" title="show files" id="attachments" data-id="{!!  $getknowledgeBase['knowledgebaseId'] !!}" data-toggle="modal" data-target="#knowledgebasesFiles">View Attachments</a></span>
                <div class="box-divider"></div>
                <label>Ratings</label>
                <span>
                    <input id="rating-control{!! $getknowledgeBase['client_knowledge_id']  !!}" name="ratingsValues" @if($getknowledgeBase['ratings'] != '') disabled @endif  type="text" class="kv-svg rating-loading" value="@if($getknowledgeBase['ratings'] != '') {!! $getknowledgeBase['ratings'] !!} @else @endif"  data-size="xs" title=""></span>
                <div class="clearfix"></div>
                @if (empty($getknowledgeBase['ratings']))
                <button value="Save Rating" id="add_ratings-{!! $getknowledgeBase['client_knowledge_id'] !!}" class="btn btn-primary add_ratings" data-id="{!! $getknowledgeBase['client_id']  !!}" data="{!! $getknowledgeBase['client_knowledge_id'] !!}" value="" name="add">Save Ratings</button>
                @endif
            </div>
        </div>
        @endif
        @endforeach
        @else
                 <div class="col-sm-6 col-md-3 col-sm-push-2">
                        <label class="btn-danger box-size">KnowledgeBase Not Found.</label>
                </div>
        @endif
        <div class="col-sm-12 text-center">
    {{ $knowledgebase->links() }}
    </div>
    </div>
</div>
<!--  Modal-box for file download -->
<div class="modal fade" id="knowledgebasesFiles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Attachments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="dataModals">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@section("after-scripts")
<script type="text/javascript">
    jQuery(document).ready(function () {
        //attachment modal.
        jQuery(document).on('click', '#attachments', function () {
            var knowledgebaseId = $(this).attr('data-id');
            var result = AJAX.sendRequest("{{route('admin.knowledgebases.attachments')}}", "POST", {"knowledgebaseId": knowledgebaseId}, function (response) {
                jQuery('#dataModals').empty();
                jQuery('#dataModals').html(response);
            });
        });
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
                    ratingVal.pop();
                    ratingVal.push($(this).val());
                });
        jQuery('.add_ratings').on('click', function (event) {
            var knowledgebaseId = $(this).attr('data');
            var clientId = $(this).attr('data-id');
            jQuery('#rating-control' + knowledgebaseId).rating('refresh', {disabled: true, showClear: false, showCaption: true});
            //ajax call for update ratings.
            var result = AJAX.sendRequest("{{route('admin.knowledgebases.ratings')}}", "POST", {"id": knowledgebaseId, 'ratingVal': ratingVal, 'clientId': clientId}, function (response) {
                if (response != true) {
                    jQuery('#add_ratings-' + knowledgebaseId).hide();
                    toastr.success('The Rating saved successfully.');
                }

            });
        });
    });
</script>
@endsection
@endsection

