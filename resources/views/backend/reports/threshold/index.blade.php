@extends ('backend.layouts.app')
@section ('title', trans('labels.backend.reports.threshold.title') . ' | ' . trans('labels.backend.reports.intervention'))
@section('page-header')
<h1>
    {{ trans('labels.backend.reports.threshold.title') }}
    <small>{{ trans('labels.backend.reports.threshold.title') }}</small>
</h1>
@endsection
@section('content')
{!! Form::open(['route' => 'admin.reports.staff.threshold', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'threshold-report','files' => true]) !!}
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.reports.threshold.title') }}</h3>
    </div>
    <div class="box-body">
    	  <div class="loadings" style="display: none;">
                                    <center>
                                        <img class="loading-image" src="{{url('/')}}/img/loader.gif" alt="loading..">
                                    </center>
            </div>
        <div class="form-group">
            {{ Form::label('client', trans('labels.backend.managesessions.table.client'), ['class' => 'col-lg-2 control-label required']) }}
            <div class="col-lg-10">
                <select name="clients" id="clients" class="select2 form-control box-size" required="required">
                    <option value="0">Please select</option>
                    @foreach ($getClient as $clientKey => $clientVal)
                    <option value="{!! $clientVal['id'] !!}">{!! $clientVal['first_name']." ".$clientVal['last_name'] !!}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group error-msg" style="display: none;">
            <label class="col-lg-2 control-label"></label>
            <div class="col-lg-10">
                <div class="alert alert-danger box-size">No session records found for this client.</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2"></label>
            <div class="col-lg-10">
                <div id="session-data"></div>
            </div>
        </div>
        <div class="edit-form-btn">
            <a href="javascript:void(0);" class="btn btn-primary btn-md" id="view_report">{!! trans('buttons.general.view_report') !!}</a>
            <div class="clearfix"></div>
        </div>
        <div id="chart2"></div>
    </div>
    {!! Form::close() !!}
    @endsection
    @section("after-scripts")
    <script type="text/javascript">
	jQuery(document).ready(function () {
		jQuery(document).on('keyup','.threshold_start',function(event){
			if (event.keyCode === 46 && this.value.split('.').length === 2) {
            				return false;
        		}
				  if (jQuery(this).val() > 10) {
				  	jQuery(this).val(0);
				  }
		});
		jQuery(document).on('keyup','.threshold_end',function(e){
				if (event.keyCode === 46 && this.value.split('.').length === 2) {
	            				return false;
	        		}
				  if (jQuery(this).val() > 10) {
				  	jQuery(this).val(0);
				  }
		});
	    jQuery('#clients').on('change', function (event) {
		jQuery("#chart2").hide();
		var clientId = this.value;
		if (clientId == 0) {
		    jQuery(".error-msg").show();
		    jQuery(".edit-form-btn").show();
		} else {
		    jQuery(".error-msg").hide();
		    jQuery(".edit-form-btn").hide();
		}
		var result = AJAX.sendRequest("{{route('admin.reports.staff.session')}}", "POST", {"clientId": clientId}, function (response) {
		    if (response != '[""]') {
			jQuery(".error-msg").hide();
			jQuery(".edit-form-btn").show();
		    }
		    if (response == '') {
			jQuery(".error-msg").show();
			jQuery(".edit-form-btn").hide();
		    }
		    jQuery("#session-data").html(response);
		    //pophover
		    jQuery('[data-toggle="popover"]').popover();
		});
	    });
	    //view-report
	    jQuery("#view_report").on("click", function () {
		if (jQuery("#clients").val() == 0) {
		    toastr.error("Please select client.");
		    return false;
		}
		jQuery("#chart2").show();
		var sessionId = $("input[name='sessionId[]']")
			.map(function () {
			    return $(this).val();
			}).get();
		/* New Code for threshold start and end value get */
		var thresholdStart = $("input[name='threshold_start[]']")
			.map(function () {
			    return $(this).val();
			}).get();
		var thresholdEnd = $("input[name='threshold_end[]']")
			.map(function () {
			    return $(this).val();
			}).get();
		var insertNotes = $(".insert_note").map(function () {
		    return $(this).val();
		}).get();
		var clientId = jQuery("#clients").val();
		/* new code for threshold start and end value */
		  //Ajax Calls.
                     jQuery.ajax({
                     	url:"{{route('admin.reports.staff.threshold')}}",
                        dataType: 'json',
                        async: true,
                        type: 'POST',
                        data: {"sessionId": sessionId, "thresholdStart": thresholdStart, "thresholdEnd": thresholdEnd, "insertNotes": insertNotes, "clientId": clientId},
                         beforeSend: function () {
                              jQuery('.loadings').show();
                        },
                         success: function (response) {
                         	jQuery('.loadings').hide();
                         	console.log(response);
                         	if (response[1]) {
					toastr.error("Threshold have plateaued!");
				}
				jQuery("#chart2").html(response);
                         }
                     });
		// var result = AJAX.sendRequest("{{route('admin.reports.staff.threshold')}}", "POST", {"sessionId": sessionId, "thresholdStart": thresholdStart, "thresholdEnd": thresholdEnd, "insertNotes": insertNotes, "clientId": clientId}, function (response) {
		// if (response[0]) {
		// 	toastr.error("Threshold have plateaued!");
		// }
		//     if (response[1] == "") {
		// 	// alert('1');
		//     }
		//     jQuery("#chart2").html(response);
		// });
	    });
	});
    </script>
    @endsection
