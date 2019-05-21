<div class="box-body">
    <div class="form-group">
        <label class="col-lg-2 control-label"><b>{!! trans('labels.backend.managesessions.table.client') !!}</b></label>
        <div class="col-lg-9">
            <span class="text-align-question">{!! $managesession['sessionClient']['users']['first_name']." ".$managesession['sessionClient']['users']['last_name'] !!}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label"><b>{!! trans('labels.backend.managesessions.table.intervention') !!}</b></label>
        <div class="col-lg-10">
             <span class="text-align-question">{!! $managesession['sessionIntervention']['name'] !!}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label"><b>Question Pattern</b></label>
        <div class="col-lg-10">
             <span class="text-align-question">{!! $type !!}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label"><b>{!! trans('labels.backend.managesessions.table.title') !!}</b></label>
        <div class="col-lg-10">
             <span class="text-align-question">{!! $managesession['title'] !!}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label"><b>{!! trans('labels.backend.managesessions.table.description') !!}</b></label>
        <div class="col-lg-10">                      
            @if(strlen($managesession['description']) < 100) 
            <span class="text-align-question">{!! $managesession['description'] !!}</span>
            @else
            <span class="text-align-question note-desc">{!! $managesession['description'] !!}</span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label"><b>{!! trans('labels.backend.managesessions.table.session_date') !!}</b></label>
        <div class="col-lg-10">
             <span class="text-align-question">{!! date("d-m-Y",strtotime($managesession['session_date'])) !!}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-lg-2 control-label"><b>{!! trans('labels.backend.managesessions.table.session_visit') !!}</b></label>
        <div class="col-lg-10">
             <span class="text-align-question">@if($managesession['session_visit'] == 1) YES @else No @endif</span>
        </div>
    </div>
    <div class="form-group">
        {{-- <h4 class="pull-left" style="margin: 20px;">Question Details</h4> --}}
        <table class="table table-bordered table-hover" style="width: 95%;margin: 20px;">
            <thead>
            <th>Sr.No</th>
            <th>Question Name</th>
            <th>Option</th>
            @if(access()->user()->roles()->first()->id != env('CLIENT_ROLE_ID') && $type != 'Subjective')<th>Score</th>@endif
            </thead>
            <tbody>
            <tbody>
                @if (!empty($questionAns))
                @if ($type == 'Subjective')
                @foreach ($questionAns as $key => $questionAns)
                @if ($questionAns->question_name != null)
                <tr>
                    <td>{!! ++$key !!}</td>
                    <td>{!! $questionAns->question_name !!}</td>
                    <td>{!! $questionAns->options !!}</td>
                </tr>
                @endif
                @endforeach
                @else
                @foreach ($questionAns as $key => $questionAns)
                <tr>
                    <td>{!! ++$key !!}</td>
                    <td>{!! $questionAns['question'] !!}</td>
                    <td>{!! $questionAns['option'] !!}</td>
                    @if(access()->user()->roles()->first()->id != env('CLIENT_ROLE_ID') &&  $type != 'Subjective')
                    <td>{!! $questionAns['marks'] !!}</td>
                    @endif
                </tr>
                @endforeach
                @endif
                @else
                <tr>
                    <td colspan="4" align="center" style="background: #efefef;">No Records Found!</td>
                </tr>
                @endif
            </tbody>
            </tbody>
        </table>
    </div>
</div>