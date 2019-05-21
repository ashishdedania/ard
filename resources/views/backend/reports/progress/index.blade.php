@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.reports.management') . ' | ' . trans('labels.backend.reports.progress.title'))

@section('page-header')
<h1>
    {{ trans('labels.backend.reports.management') }}
    <small>{{ trans('labels.backend.reports.progress.title') }}</small>
</h1>
@endsection

@section('content')
{!! Form::open(['route' => 'admin.reports.progress.generate', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.reports.progress.title') }}</h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('client_id', trans('labels.backend.reports.progress.client'), ['class' => 'col-lg-2 control-label required']) }}
            <div class="col-lg-10">
                <select id="client_id" name="client_id" class="select2 form-control box-size" required>
                    <option value="0">Please Select</option>
                    @foreach($client as $clientRow)
                    <option value="{{$clientRow['id']}}">{{$clientRow['first_name'] . ' ' . $clientRow['last_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="edit-form-btn">
                {{ Form::submit(trans('buttons.general.generate'), ['class' => 'btn btn-primary btn-md']) }}
                <a href="javascript:void(0);" class="btn btn-primary" id="view_report">View Report</a>
                <div class="clearfix"></div>
            </div><!--edit-form-btn-->
            <div id="chart2"></div>
    </div>

</div>
{!! Form::close() !!}
@endsection
@section("after-scripts")
<script type="text/javascript">
//    jQuery(document).ready(function () {
//        jQuery('#intervention_type').on("change", function () {
//            var interventionId = jQuery(this).val();
//            jQuery('#interventionId').val(interventionId);
//            jQuery('#charts').submit();
//        });
//    });
jQuery(document).ready(function () {
    jQuery("#view_report").on("click", function () {
	jQuery('.alert alert-danger').hide();
	var clientId = jQuery("#client_id option:selected").val();
	if (clientId != 0) {
	    var result = AJAX.sendRequest("{{route('admin.reports.progress.goal')}}", "POST", {"clientId": clientId}, function (response) {
		if (response == "") {
		    toastr.error('Report for this client does not exist.');
		    jQuery("#chart2").hide();
		} else {
		    jQuery("#chart2").show();
            jQuery("#chart2").html('');
		    jQuery("#chart2").html(response);
		}

	    });
	} else {
	    toastr.error('Report for this client does not exist.');
	    return false;
	}
    });

});
</script>
@endsection
