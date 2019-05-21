@extends ('backend.layouts.app')
@section ('title', trans('labels.frontend.managesessions.submit_question'))
@section('page-header')
<h1>{{ trans('labels.frontend.managesessions.submit_question') }}</h1>
@endsection
@section('content')
{{ Form::open(['route' => 'admin.managesessions.submit.question', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-managesession']) }}
<div class="box box-info ">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.frontend.managesessions.submit_question') }} for {!! $sessionDet['title']!!}</h3>
    </div>
    <div class="box-body">
        <?php
        //echo "<pre>"; print_r($data); die;
        
        ?>
        <div class="form-group">
            <div class="box-body submit-question">
                <!-- Subjective Questions -->
                <input type="hidden" name="interventionType" value="{!!  $sessionDet['intervention_type'] !!}">
                <input type="hidden" name="Session" value="{!! $sessionId !!}">
                @if ($qtype == 'CustomQuestion')
                <input type="hidden" name="qtype" value="{!! $qtype !!}">
                @php $i=1;
                $cnt = [];
                @endphp
                @if(!empty($data))
                @foreach ($data as $key =>  $CustomQuestions)
                @if ($CustomQuestions['question_name'] != null)
                <div class="form-group">
                    {{ Form::label('client','Question-'.+$i, ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                         {{ Form::label('client',$CustomQuestions['question_name'], ['class' => '']) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('client', trans('labels.frontend.managesessions.table.answer'), ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        <div class="range-slider form-inline">
                            <input class="input-range form-control box-size"  id="input-range-{{ $i }}" type="range" value="" min="-10" max="10">
                            <input type="text" readonly="readonly" id="range-value-{{ $i }}" class="range-value" value="@if(!empty($customQueAns))@if(isset($customQueAns[$key])){!! $customQueAns[$key]['options'] !!}@endif @else 0 @endif" name="ans[]">
                        </div>
                    </div>
                    <input type="hidden" name="customqueSaveId[]" value="@if(!empty($customQueAns)) @if(isset($customQueAns[$key])){!! $customQueAns[$key]['id'] !!}@endif @endif">
                    <input type="hidden" name="subjectiveQueId[]" value="{!! $CustomQuestions['id'] !!}">
                </div>
                @php $cnt[] = $i @endphp
                
                @endif
                @php $i++; @endphp
               
                @endforeach
                
                <input type="hidden" name="submit-type" value="0" id="submit-type">
                <div class="edit-form-btn">
                    {{-- {{ link_to_route('admin.managesessions.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }} --}}
                    <a href="{!! url()->previous() !!}" class="btn btn-danger btn-md">{!! trans('buttons.general.cancel') !!}</a>
                    <a href="javascript:void(0)" id="save-btn"  class="btn btn-primary">Save</a>
                    <a href="javascript:void(0)" id="submit-btn"  class="btn btn-primary">Submit</a>
                    <div class="clearfix"></div>
                </div>
                @else
                No questions found, please contact your administrator.
                @endif
                @endif
                <!-- Objective Questions. -->

                @if ($qtype == 'ObjectiveQuestion')
                <input type="hidden" name="qtype" value="{!! $qtype !!}">
                @php $i=1; @endphp
                @if (!empty($questions))
                @foreach ($questions  as $qkey => $queDes)
                @php
                $submitId = array_column($data,'id');
                $optId = array_column($data,'option_id');
                @endphp
                <div class="form-group">
                    {{ Form::label('client','Question-'.$i, ['class' => 'col-sm-2 control-label']) }}
                    <div class="col-sm-10">
                        {{ Form::label('client',$queDes['question'], ['class' => '']) }}
                    </div>
                </div>
                <div class="form-group ">
                    {{ Form::label('client','Answer', ['class' => 'col-sm-2 control-label']) }}
                    @if (!empty($queDes['question_option']))
                    <div class="col-sm-10">
                    @foreach ($queDes['question_option'] as $optkey => $option)
                    <label class="control control--radio custom-radio-btn">
                        <input type="radio" name="questionAns[{{ $option['question_id'] }}]" class="radio choose_question" value="{{ $option['id'] }}" @if(!empty($data)) @if(in_array($option['id'],$optId)) checked="checked" @endif @else checked="checked" @endif>{!! $option['option']!!}
                               <div class="control__indicator"></div>
                    </label>
                    @endforeach
                    </div>
                    <input type="hidden" name="questionSubmitId[]" value="@if(!empty($submitId))@if(isset($submitId[$qkey])) {{ $submitId[$qkey] }} @endif @endif">
                    @else
                    <label class="control control--radio">No Options</label>
                    @endif
                </div>
                   @php $i++; @endphp
                @endforeach
                
                <input type="hidden" name="submit-type" value="0" id="submit-type">
                <div class="edit-form-btn">
                    {{-- {{ link_to_route('admin.managesessions.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }} --}}
                    <a href="{!! url()->previous() !!}" class="btn btn-danger btn-md">{!! trans('buttons.general.cancel') !!}</a>
                    <a href="javascript:void(0)" id="save-btn"  class="btn btn-primary">Save</a>
                    <a href="javascript:void(0)" id="submit-btn"  class="btn btn-primary">Submit</a>
                    <div class="clearfix"></div>
                </div>
                
                @else
                <div class="btn-danger box-size">
                <label class="control  control-label">No questions found, please contact your administrator.</label>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
@stop
@section('after-scripts')
<script type="text/javascript">
    jQuery(document).ready(function () {
	jQuery('#save-btn').on('click', function (event) {
	    jQuery('#submit-type').val('Save');
	    var form = jQuery(this).parents('form');
	    form.submit();
	});
	jQuery('#submit-btn').on('click', function (event) {
	    event.preventDefault();
	    jQuery('#submit-type').val('Submit');
	    var form = jQuery(this).parents('form');
	    swal({
		title: "Are you sure you want to submit answers?",
		type: "warning",
		showCancelButton: true,
		confirmButtonClass: "btn-primary",
		confirmButtonText: "Submit!",
		cancelButtonText: "Cancel!",
		cancelButtonClass: "btn-danger",
		closeOnConfirm: false,
		closeOnCancel: true
	    },
		    function (isConfirm) {
			if (isConfirm) {
			    form.submit();
			    swal.close();
			} else {
			    swal.close();
			}

		    });
	});

    //slider value selected.
	var range = $('.input-range');
    for (var i=1;i<=range.length;i++) {
     var sliderVal =  $('#range-value-'+i).val();
        $('#input-range-'+i).val(parseInt(sliderVal)).change();
    }
	range.on('input', function () {
	    var dynId = $(this).attr('id');
        // var sliderVal = $(this).val();
	    var array = dynId.split('-');
	    var value = $('#range-value-' + array[2].toString());
	    value.val(this.value);
	});
    });
</script>
@endsection
