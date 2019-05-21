<div class="box-body">
    <div class="form-group">
        {{ Form::label('first_name', trans('labels.backend.clients.table.forename'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::text('first_name', isset($getUser) ? $getUser['first_name'] : null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.clients.table.forename'), 'required' => 'required']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('surname', trans('labels.backend.clients.table.surname'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::text('last_name',isset($getUser) ? $getUser['last_name'] : null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.clients.table.surname'), 'required' => 'required']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('client_code', trans('labels.backend.clients.table.client_code'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::input('client_code', 'client_code', isset($getUser) ? $getUser['client_code'] : null, ['class' => 'form-control box-size check_alpha_numeric', 'placeholder' => trans('validation.attributes.frontend.register-user.client_code'),'autocomplete' => 'off','maxlength'=>"8"]) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('email', trans('labels.backend.clients.table.email'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::input('email', 'email', isset($getUser) ? $getUser['email'] : null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.email'),'autocomplete' => 'off']) }}
        </div>
    </div>

     @if (isset($client))
     <input type ="text" hidden="true" value={{ $client->id }} name="client_id">
    {{-- <div class="form-group">
        {{ Form::label('password', trans('labels.backend.clients.table.password'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::input('password', 'password', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.password'),'autocomplete' => 'off']) }}
        </div>
    </div> --}}
    @endif
 {{--    <div class="form-group">
        {{ Form::label('clinical_service', trans('labels.backend.clients.table.clinical_service'), ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">

            <select class="select2 form-control box-size" name="clinical_service_id[]" multiple="multiple">

                @foreach ($clinicalService as $key => $val)
                @if($val['status'] == 1)
                <option value="{!! $val['id'] !!}"
                        @if(isset($clientData))
                        @if(in_array($val['id'],$clientData))
                        selected="selected"
                        @endif
                        @endif
                        >
                        {!! $val['name'] !!}
                </option>
            @endif
            @endforeach
        </select>
    </div>
</div> --}}

<div class="form-group">
    {{ Form::label('psycological_condition', trans('labels.backend.clients.table.psycological_condition'), ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        <select class="form-control select2 box-size" multiple="multiple" name="psycological_types_id[]">
            @foreach ($psycologicalData as $key => $psycological)
            @if($psycological['status'] == 1)
            <option value="{!! $psycological['id'] !!}"
                    @if (!empty($psycologicalId))
                    @if(in_array($psycological['id'],$psycologicalId))
                    selected="selected"
                    @endif @endif>
                    {!! $psycological['name'] !!}</option>
            @endif
            @endforeach

        </select>
    </div>
</div>
@if (isset($client))
<div class="form-group">
    {{ Form::label('psycological_condition', trans('labels.backend.clients.table.telephone'), ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        <input type="text" name="" disabled="disabled" value="{!! $client->telephone !!}" class="form-control box-size">
    </div>
</div>
@endif
<div class="form-group">
    @php
    if (isset($client)) {
    //$interventionType = array_column($clientIntervention,['intervention_type', 'status']);
    //$clientIntervention = $clientIntervention->toArray();
    $masterIntervention = $interventionsType->toArray();
    }
    @endphp
<?php
//    echo "<pre>";
//    //print_r($interventionType);
//    print_r($clientIntervention);
//    die;
?>
{{ Form::label('intervention_type', trans('labels.backend.clients.table.clinical_service'), ['class' => 'col-lg-2 control-label required']) }}
    <div class="col-lg-10">
        @if (isset($client))
        @foreach ($clientIntervention as $stdClass)
        <div class="form-group">
            <div class="col-md-5">
                {{$masterIntervention[$stdClass->intervention_type]}}
            </div>
            <div class="col-md-3">
                @php
                if($stdClass->status == 1) {
                $completed = 'selected';
                $pending = '';
                }
                else {
                $completed = '';
                $pending = 'selected';
                }
                @endphp
                <select class="form-control box-size" name="intervention_status~{{$stdClass->intervention_type}}">
                    <option value="">Status Completed ?</option>>
                    <option value="1" {{$completed}}>Yes</option>>
                    <option value="0" {{$pending}} >No</option>>
                </select>
            </div>
        </div>
        @endforeach
        @else
        <select class="form-control select2 box-size" multiple="multiple" name="intervention_type[]">
            @foreach ($interventionsType as $key => $interventionVal)
            @if($interventionVal['status'] == 1)
            <option value="{!! $interventionVal['id'] !!}">{!! $interventionVal['name'] !!}</option>
             @endif
            @endforeach

        </select>
        @endif
    </div>
</div>

<div class="form-group">
    {{ Form::label('dob', trans('labels.backend.clients.table.dob'), ['class' => 'col-lg-2 control-label required']) }}
    @if (isset($client))
    @php
    $dob = date('d-m-Y',strtotime($client->dob))
    @endphp
    <div class="col-lg-10">
        {{ Form::text('dob', $dob, ['id' => 'datetimepicker1','class' => 'form-control  box-size datepicker', 'placeholder' => 'DD-MM-YYYY', 'required' => 'required' ,'autocomplete'=> "off"]) }}
    </div>
    @else
    <div class="col-lg-10">
        {{ Form::text('dob', null, ['id' => 'datetimepicker1','class' => 'form-control box-size datepicker', 'placeholder' => 'DD-MM-YYYY', 'required' => 'required','autocomplete'=>"off"]) }}
    </div>
    @endif
</div>
<div class="form-group">
    {{ Form::label('age', trans('labels.backend.clients.table.age'), ['class' => 'col-lg-2 control-label required']) }}
    <div class="col-lg-10">
        {{ Form::text('age', null, ['readonly' => 'readonly','id' => 'age','class' => 'form-control box-size age', 'placeholder' => trans('labels.backend.clients.table.age'), 'required' => 'required']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('status', trans('labels.backend.clients.table.status'), ['class' => 'col-lg-2 control-label']) }}
    <div class="col-lg-10">
        @if(isset($client))
        @if($client->status == 1)
        <label class="control control--checkbox">
            <input type="checkbox" name="status" value="1" checked="checked">
            <div class="control__indicator"></div>
        </label>
        @else
        <label class="control control--checkbox">
            <input type="checkbox" name="status" value="1">
            <div class="control__indicator"></div>
        </label>
        @endif
        @else
        <label class="control control--checkbox">
            <input type="checkbox" name="status" value="1" checked="checked">
            <div class="control__indicator"></div>
            @endif
    </div>
</div>
</div>
@section("after-scripts")
<script type="text/javascript">
    Actulise.Client.init();
    Actulise.Client.ageCalculation();

    jQuery("body").on("dp.change", '#datetimepicker1', function (e) {
        Actulise.Client.ageCalculation();
    });
    jQuery(document).ready(function () {
    });
</script>
@endsection
