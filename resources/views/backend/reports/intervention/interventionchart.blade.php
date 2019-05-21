@extends ('backend.layouts.app')
@section ('title', trans('labels.backend.reports.management') . ' | ' . trans('labels.backend.reports.intervention'))
@section('page-header')
<h1>
    {{ trans('labels.backend.reports.management') }}
    <small>{{ trans('labels.backend.reports.intervention') }}</small>
</h1>
@endsection
@section('content')
{!! Form::open(['route' => 'admin.reports.charts.data', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'charts','files' => true]) !!}
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.reports.intervention') }}</h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('client', trans('labels.backend.managesessions.table.intervention'), ['class' => 'col-lg-2 control-label required']) }}
            <div class="col-lg-10">
                {!! Form::select('intervention_type',$interventionType,isset($interventionId) ? $interventionId : NULL, ['id' => 'intervention_type','class' => 'select2 form-control box-size']) !!}
            </div>
        </div>
        <div class="form-group error-msg" style="display: none;">
            <label class="col-lg-2"></label>
            <div class="col-lg-10">
                <div class="alert alert-danger box-size">
                    No Result Found.
                </div>
            </div>
        </div>
        <div class="edit-form-btn">
            <a href="javascript:void(0);" class="btn btn-primary btn-md" id="view_report">{!! trans('buttons.general.view_intervention_report') !!}</a>
        </div>
        <div id="chart2"></div>
        <div id="ss" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg view-details-popup" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}
@endsection
@section("after-scripts")
<script type="text/javascript">
    jQuery(document).ready(function () {
    // Create the chart
	//button click generate report.
	jQuery("#view_report").on("click", function () {
	    var interventionId = jQuery("#intervention_type").val();
	    if (interventionId == 0) {
		toastr.error("Please select intervention type");
		return false;
	    }
	    //ajax call for chart data
	    var result = AJAX.sendRequest("{{route('admin.reports.intervention.chart')}}", "POST", {"intervention_type": interventionId}, function (response) {
        		if (response.length != 0) {
        		    jQuery("#chart2").html(response);
        		    jQuery("#ss").show();
        		    jQuery(".error-msg").hide();
        		} else {
        		    jQuery(".error-msg").show();
        		    jQuery("#ss").hide();
        		}
	    });
	});
	//on change intervention hide chart and error message.
	jQuery("#intervention_type").on("change", function () {
	    jQuery(".error-msg").hide();
	    jQuery("#chart2").hide();
	});
    });
</script>
@endsection
