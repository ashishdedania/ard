@extends ('backend.layouts.app')
@section ('title', trans('labels.frontend.managesessions.management'))
@section('page-header')
<h1>{{ trans('labels.frontend.managesessions.management') }}</h1>
@endsection
@section('content')
{!! Form::open([ 'route' => 'admin.managesessions.intervention.data', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'get', 'id' => 'show-executivesummary']) !!}
<div class="box box-info">
    <div class="box-body">
        <div class="intervention">
            <div class="row">
                <div class="col-sm-2 ">
                    {{ Form::label('client', trans('labels.backend.managesessions.table.intervention'), ['class' => 'control-label required']) }}
                </div>
                <div class="col-sm-10">
                    <select name="intervention_type" id="intervention_type" class="select2 form-control box-size">
                        <option value="0">Select Clinic Service</option>
                        @foreach ($interventionType as $interventionKey => $interventionVal)
                        <option value="{!! $interventionVal->id !!}" @if ($interventionVal->id == $interventionTypeId) selected="selected" @endif>{!! $interventionVal->name !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row session-data">
        @if (count($clientSessionData) != 0)
        @foreach ($clientSessionData as $sessionKey => $sessionData)
        @php
        $sessionType   = trans('strings.backend.session_type');
        $type          = array_search($sessionData['custom_question_id'],$sessionType);
        $status        = sessionStatus($sessionData['status']);
        $class         = sessionStatusClass($status);
        @endphp
        <div class="col-md-3 col-sm-6 mrg-15">
            <div class="card card-1">
                <!-- Session Status Details -->
                <label>Status</label>
                <span class="{!! $class !!}">{!! $status !!}</span>
                <div class="box-divider"></div>
                <!-- Session Title Details -->
                <label>{{ trans('labels.frontend.managesessions.table.session_title') }}</label>
                <span>{{$sessionData['title']}}</span>
                <div class="box-divider"></div>
                <!-- Session Date Details -->
                <label>{{ trans('labels.frontend.managesessions.table.session_date') }}</label>
                <span>{{date('d-m-Y',strtotime($sessionData['session_date']))}}</span>
                <div class="box-divider"></div>
                <!-- Session Question Pattern Details -->
                <label>{{ trans('labels.frontend.managesessions.table.question_pattern') }}</label>
                <span>
                    {!! $type !!}</span>
                <div class="box-divider"></div>
                <!-- view details button -->
                @if ($sessionData['custom_question_id'] != 2)
                @if ($status == 'Pending')
                <a id="view_details" href="{!! route('admin.managesessions.view.details',$sessionData['sessionId']) !!}" class="btn btn-primary">{{ trans('labels.frontend.managesessions.view_details') }}</a>
                @else
                <a id="view_details" href="{!! route('admin.managesessions.view.question',[$type,$sessionData['sessionId']]) !!}" class="btn btn-primary">View Questions</a>
                @endif
                @endif
            </div>
        </div>
        @endforeach
        @else
        <div class="col-sm-6 col-md-3 col-sm-push-2">
            <div class="alert alert-danger box-size">Assessment Not Found.</div>
        </div>
        @endif
        <div class="col-sm-12 text-center">
            {!! $clientSessionData->appends(request()->query())->links() !!}
        </div>
    </div>
</div>
</h4>
</div>
</div>
</div>
</div>
{!! Form::close() !!}
@endsection
@section("after-scripts")
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#intervention_type').on("change", function () {
            this.form.submit();
        });
    });
</script>
@endsection
