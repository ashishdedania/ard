<div class="box-body">
    <div class="form-group">
        {{ Form::label('title', trans('labels.backend.knowledgebases.table.title'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.knowledgebases.table.title')]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('description', trans('labels.backend.knowledgebases.table.description'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::textarea('description', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.knowledgebases.table.description')]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('upload', trans('labels.backend.knowledgebases.table.upload'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            <input type="file" name="file[]" multiple="multiple" class="form-control box-size">
            @if (isset($knowledgebase)) <a href="#" class="" data-toggle="modal" data-target="#knowledgebasesFiles"> View Files</a> @endif
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('status', trans('labels.backend.knowledgebases.table.status'), ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            <label class="control control--checkbox">
                <input type="checkbox" name="status" value="1" @if(isset($knowledgebase))  @if ($knowledgebase['status'] == 1) checked="checked" @endif @else checked="checked" @endif>
                <div class="control__indicator"></div>
            </label>
        </div>
    </div>
</div>

@section("after-scripts")
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery(document).on('click','.delete',function(){
            var msg = confirm('Are you sure want to Delete?');
            if(msg) {
                var files = jQuery(this).attr('data');
                var knowId = jQuery(this).attr('data-id');
                var result = AJAX.sendRequest("{{route('admin.knowledgebases.destroy.attachments')}}", "POST", {"files": files,"knowId":knowId}, function (response) {
                    jQuery('#dataModals').empty();
                    jQuery('#dataModals').html(response);
                    toastr.success('Attachments Delete Successfully.');
                });
            }

        });
    });
</script>
@endsection
