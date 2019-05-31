@extends ('backend.layouts.app')
@section ('title', trans('labels.backend.knowledgebases.send') . ' | ' . trans('labels.backend.knowledgebases.send'))
@section('page-header')
<h1>
    {{ trans('labels.backend.knowledgebases.send') }}
    <small>{{ trans('labels.backend.knowledgebases.send') }}</small>
</h1>
@endsection
@section('content')
{{ Form::model($knowledgebases, ['route' => ['admin.knowledgebases.send.customer', $knowledgebases], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-client','novalidate']) }}
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.knowledgebases.send') }}</h3>
        <div class="box-tools pull-right">
            @include('backend.knowledgebases.partials.knowledgebases-header-buttons')
        </div>
    </div>
    <div class="box-body">

        <div class="form-group">
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('filter_by','Filter By', ['class' => 'col-lg-2 control-label required']) }}
                    <div class="col-lg-10">
                        <label class="control control--radio">
                            {!! trans('labels.backend.clients.title') !!}<input type="radio" name="client_type" value="1" checked="checked">
                            <div class="control__indicator"></div>
                        </label>
                        <label class="control control--radio">
                            {!! trans('labels.backend.clients.table.clinical_service') !!}<input type="radio" name="client_type" value="2">
                            <div class="control__indicator"></div>
                        </label>
                        <label class="control control--radio">
                            {!! trans('labels.backend.clients.table.psycological_condition') !!}<input type="radio" name="client_type" value="3">
                            <div class="control__indicator"></div>
                        </label>
                    </div>
                </div>

                <div class="form-group" id="clinical_service_dropdown" style="display: none;">
                    {{ Form::label('title',trans('labels.backend.clients.table.clinical_service'), ['class' => 'col-lg-2 control-label required']) }}
                    <div class="col-lg-10">
                    <select class="form-control form-wid select2" name="clinical_service" id="clinical_service_select">
                        <option value="0">Please select</option>
                        @foreach ($clinicalService as $key => $val)
                        <option value="{!! $val['id'] !!}">{!! $val['name'] !!}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group" id="psycological_condition_dropdown" style="display: none;">
                     {{ Form::label('title',trans('labels.backend.clients.table.psycological_condition'), ['class' => 'col-lg-2 control-label required']) }}
                    <div class="col-lg-10">
                    <select class="form-control form-wid select2" name="psycological_condition" id="psycological_condition_select">
                        <option value="0">Please select</option>
                         @foreach ($psychologicalType as $key => $psycological)
                            <option value="{!! $psycological['id'] !!}">{!! $psycological['name'] !!}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group client-dropdown">
                    {{ Form::label('title', trans('labels.backend.knowledgebases.table.client'), ['class' => 'col-lg-2 control-label required']) }}
                    <div class="col-lg-10">
                        <select class="form-control form-wid select2 client-data" multiple="multiple" name="client[]">
                            @foreach ($client as $key => $clientVal)
                            <option value="{{ $clientVal['id'] }}">
                                    {!! $clientVal['users']['first_name']." ".$clientVal['users']['last_name'] !!}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                    {{ Form::label('title', trans('labels.backend.knowledgebases.table.assign_client'), ['class' => 'col-lg-2 control-label']) }}
                    <div class="col-lg-10">
                        <label class="control-label">
                            <ul class="list-inline">
                            @if(!empty($assingClient))
                            @foreach ($assingClient as $clients)
                              <li class="list-group-item">{!!  $clients['users']['first_name'].''.$clients['users']['last_name'] !!}</li>
                            @endforeach
                            @else
                              <label class="">-</label>
                            @endif
                            </ul>
                        </label>
                    </div>
                </div>
        </div>
        <div class="edit-form-btn">
            {{ link_to_route('admin.knowledgebases.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
            {{ Form::submit(trans('labels.backend.knowledgebases.send_btn'), ['class' => 'btn btn-primary btn-md btn-submit']) }}
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>
{{ Form::close() }}
@section("after-scripts")
<script type="text/javascript">
    jQuery(document).ready(function(){
         jQuery(".select2").select2();
         var knowledgebaseId = "{!! $knowledgebases->id !!}";
        jQuery('input[name=client_type]').change(function(){
            var value = jQuery( 'input[name=client_type]:checked' ).val();
            if (value == 2) {
                jQuery('#clinical_service_dropdown').show();
                jQuery("#clinical_service_select").select2();
                jQuery('#psycological_condition_dropdown').hide();
                jQuery('.client-dropdown').hide();
            }
            if (value == 3) {
                jQuery('#clinical_service_dropdown').hide();
                jQuery('#psycological_condition_dropdown').show();
                jQuery("#psycological_condition_select").select2();
                jQuery('.client-dropdown').hide();
            }
            if (value == 1) {
                var result = AJAX.sendRequest("{{route('admin.knowledgebases.servicetype')}}", "POST", {"client" : "client","knowledge_bases_id" : knowledgebaseId}, function (response) {
                        jQuery('.client-data').empty();
                        jQuery.each( response, function( key, value ) {
                        jQuery('.client-data').append(jQuery("<option></option>").attr("value",value['id']).text(value['users']['first_name']));
                        });
                });
                jQuery('#clinical_service_dropdown').hide();
                jQuery('#psycological_condition_dropdown').hide();
                jQuery('.client-dropdown').show();
                jQuery("#psycological_condition_select").select2();
            }
        });
        //clinical service
        jQuery('#clinical_service_select').on("change",function(){
            var clinicalServiceId = jQuery(this).val();
            var result = AJAX.sendRequest("{{route('admin.knowledgebases.servicetype')}}", "POST", {"clinicalServiceId": clinicalServiceId,"clinical_service" : "clinical_service","knowledge_bases_id" : knowledgebaseId}, function (response) {
                var output = [];
                jQuery('.client-data').empty();
                jQuery('.client-dropdown').show();
                 jQuery("#clinical_service_select").select2();
                jQuery.each( response, function( key, value ) {
                        jQuery('.client-data').append(jQuery("<option></option>").attr("value",value['id']).text(value['users']['first_name']));
                });
            });
        });
        //psychological service
        jQuery('#psycological_condition_select').on("change",function(){
            var psychologicalId = jQuery(this).val();
            var result = AJAX.sendRequest("{{route('admin.knowledgebases.servicetype')}}", "POST", {"psychologicalId": psychologicalId,"psychological_service" : "psychological_service","knowledge_bases_id" : knowledgebaseId}, function (response) {
                console.log(response);
                jQuery('.client-data').empty();
                jQuery('.client-dropdown').show();
                jQuery.each( response, function( key, value ) {
                        jQuery('.client-data').append(jQuery("<option></option>").attr("value",value['id']).text(value['users']['first_name']));
                });
            });
        });

        jQuery('.client-data').on("change",function(){
            var opt = jQuery(this).select2("data");
            if (opt.length > 5) {
                jQuery(this).val("");
                toastr.error('Please Select only five clients!.');
                return false;
            } else {
                return true;
            }
        });
    });
</script>
@endsection
@endsection