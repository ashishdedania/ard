@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.reports.management') . ' | ' . trans('labels.backend.reports.scared.title'))

@section('page-header')
<h1>
    {{ trans('labels.backend.reports.management') }}
    <small>{{ trans('labels.backend.reports.scared.title') }}</small>
</h1>
@endsection

@section('content')
{!! Form::open(['route' => 'admin.reports.scared.generate', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.reports.scared.title') }}</h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('client_id', trans('labels.backend.reports.scared.client'), ['class' => 'col-lg-2 control-label required']) }}
            <div class="col-lg-10">
                <select name="client_id" id="client_id" class="select2 form-control box-size" required>
                    <option value="">Please Select</option>
                    @foreach($client as $clientRow)
                    <option value="{{$clientRow['id']}}">{{$clientRow['first_name'] . ' ' . $clientRow['last_name']}}</option>
                    @endforeach;
                </select>
            </div>
        </div>
        <div class="form-group error-msg" style="display: none;">
            <label class="col-lg-2 control-label"></label>
            <div class="col-lg-10">
                <div class="alert alert-danger box-size">No SCARED session records found for this client.</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2"></label>
            <div class="col-lg-10">
                <div id="session-data"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="edit-form-btn">
                {{ Form::submit(trans('buttons.general.generate'), ['class' => 'btn btn-primary btn-md', 'id' => 'generate']) }}
                <div class="clearfix"></div>
            </div><!--edit-form-btn-->
        </div><!-- form-group -->
    </div>

</div>
{!! Form::close() !!}
@endsection
@section("after-scripts")

<script type="text/javascript">
    jQuery(document).ready(function () {
        var numberOfChecked;

        // max 3 checkbox restriction
        $('body').on('change', '.check-session', function () {
            numberOfChecked = $('input:checkbox:checked').length;
            if (numberOfChecked >= 4) {
                $('.check-session').prop('checked', false);
                toastr.error("You can compare maximum 3 sessions.");
                return false;
            }
        });

        // generate button click event
        jQuery('#generate').on('click', function (event) {
            // client select validation
            if ($('#client_id').val() == "") {
                $('.check-session').prop('checked', false);
                toastr.error("Please select client to view report.");
                return false;
            }

            // checkbox select validation
            if (!numberOfChecked) {
                $('.check-session').prop('checked', false);
                toastr.error("Please select at least 1 session to view report.");
                return false;
            }
        });

        // ajax call to load sessions
        jQuery('#client_id').on('change', function (event) {
            var clientId = this.value;
            var result = AJAX.sendRequest("{{route('admin.reports.scared.session')}}", "POST", {"clientId": clientId}, function (response) {
                if (response != '[""]') {
                    jQuery(".error-msg").hide();
                    jQuery(".edit-form-btn").show();
                }
                if (response == '') {
                    jQuery(".error-msg").show();
                    jQuery(".edit-form-btn").hide();
                }
                jQuery("#session-data").html(response);
            });
        });
    });
</script>
@endsection