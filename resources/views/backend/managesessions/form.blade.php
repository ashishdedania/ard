<div class="box-body">
    <div class="form-group">
        {{ Form::label('client', trans('labels.backend.managesessions.table.client'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            <select name="client_id" id="client-drop" class="select2 form-control box-size">
                <option value="0">Please select</option>
                @foreach ($client as $c)
                <option value="{!! $c['id'] !!}" @if(isset($managesession)) @if ($c['id'] == $managesession->client_id) selected="selected" @endif @endif>{!! $c['first_name']." ".$c['last_name'] !!}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group intervention_type">
        {{ Form::label('client', trans('labels.backend.managesessions.table.intervention'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            <select name="intervention_type" id="intervention_type" class="select2 form-control box-size">
            </select>
        </div>
    </div>
    <div class="form-group choose-question">
        {{ Form::label('Question Pattern','Question Pattern', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            <label class="control control--radio">
                 {!! Form::radio('choose_question', '2', true, array('class'=>'radio choose_question')) !!} No Questions
                <div class="control__indicator"></div>
            </label>
            <label class="control control--radio">
                @if(isset($managesession ))
                  @if ($managesession->custom_question_id == 1)
                    {!! Form::radio('choose_question', '0',true, array('class'=>'radio choose_question')) !!} Subjective
                 @else
                    {!! Form::radio('choose_question', '0',false, array('class'=>'radio choose_question')) !!} Subjective
                 @endif
                @else
                    {!! Form::radio('choose_question', '0',false, array('class'=>'radio choose_question')) !!} Subjective
               @endif
                       <div class="control__indicator"></div>
            </label>
            <label class="control control--radio">
                 @if(isset($managesession ))
                    @if ($managesession->custom_question_id == 0)
                            {!! Form::radio('choose_question', '1',true, array('class'=>'radio choose_question')) !!} Objective
                    @else
                            {!! Form::radio('choose_question', '1',false, array('class'=>'radio choose_question')) !!} Objective
                    @endif
                @else
                      {!! Form::radio('choose_question', '1',false, array('class'=>'radio choose_question')) !!} Objective
                @endif
                       <div class="control__indicator"></div>
            </label>

        </div>
    </div>
    <div class="form-group question-type-div">
        {{ Form::label('question', trans('labels.backend.managesessions.table.question'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            <select name="question_type_id" id="question_type_id" class="select2 form-control box-size">
                <option value="0">Please select objective question</option>
                @foreach ($questionsType as $question)
                @if($question->status == 1)
                <option value="{!! $question->id !!}" @if(isset($managesession)) @if($question->id == $managesession->question_type_id) selected="selected" @endif @endif>{!! $question->question_type !!}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('title', trans('labels.backend.managesessions.table.title'), ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'maxlength' => '20', 'placeholder' => trans('labels.backend.managesessions.table.title')]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('description', trans('labels.backend.managesessions.table.description'), ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-10">
            {{ Form::textarea('description', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.managesessions.table.description')]) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('session_date', trans('labels.backend.managesessions.table.session_date'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::text('session_date',isset($managesession) ? date('d-m-Y',strtotime($managesession['session_date'])) : null, ['autocomplete' => 'off', 'id' => 'datepicker','class' => 'form-control  box-size datepicker-date', 'placeholder' => 'DD-MM-YYYY']) }}
        </div>
    </div>
  
    <div class="form-group">
        {{ Form::label('session_visit', trans('labels.backend.managesessions.table.session_visit'), ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            <label class="control control--checkbox">
                <input type="checkbox" name="session_visit" value="0" id="session_visit" @if (isset($managesession)) @if ($managesession->session_visit == 1) checked="checked" @endif @endif>
                 <div class="control__indicator"></div>
            </label>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('show_card','Client Viewable',['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            <label class="control control--checkbox">
                <input type="checkbox" name="show_card" value="0" id="show_card" @if (isset($managesession)) @if ($managesession->show_tile_card == 1) checked="checked" @endif @endif>
                <div class="control__indicator"></div>
            </label>
        </div>
    </div>
      <div class="form-group schedule_assessment" style="display: none;">
        {!! Form::label('schedule_assessment','Send Later',['class' => 'col-lg-2 control-label']) !!}
        <div class="col-lg-10">
            {!! Form::text('schedule_date',isset($managesession) ? date('d-m-Y',strtotime($managesession['schedule_date'])) : null,['autocomplete' => 'off','id' => 'schedule_assessment', 'class' => 'form-control','placeholder' => 'DD-MM-YYYY']) !!}
        </div>
    </div>
</div>
@section("after-scripts")
<script type="text/javascript">
    jQuery(".select2").select2();
    jQuery(document).ready(function() {
        $('#schedule_assessment').datetimepicker({                
                minDate: moment().millisecond(0).second(0).minute(0).hour(0),
                format: 'DD-MM-YYYY',
                defaultDate: new Date(),
                useCurrent : true
            });
    @if (isset($interventionType) && !empty($interventionType))
            jQuery('.intervention_type').show();
            var inName = "{!! $interventionType->name !!}";
            var intervention_type = "<option value = '" + inName + " '>" + inName + " </option>";
            jQuery("#intervention_type").attr('disabled', true);
            jQuery("#intervention_type").html(intervention_type);
            @else
            jQuery('.intervention_type').hide();
            @endif
            @if (isset($managesession))
            jQuery("#client-drop").attr('disabled', 'disabled');
            jQuery("input[type=radio][value=" + 0 + "]").attr("disabled", true);
            jQuery("input[type=radio][value=" + 1 + "]").attr("disabled", true);
            jQuery("input[type=radio][value=" + 2 + "]").attr("disabled", true);
            @endif
            if (jQuery('input[name=choose_question]:checked').val() == 2) {
                $("#question_type_id").removeAttr('name');
                jQuery('.question-type-div').hide();
            }
           else if (jQuery('input[name=choose_question]:checked').val() == 0) {
              jQuery("#question_type_id").removeAttr('name');
              jQuery('.question-type-div').hide();
          } else {
            jQuery("#question_type_id").attr('name','question_type_id');
            jQuery('.question-type-div').show();
        }
       if (jQuery("input[type=radio][name='choose_question']").is(":checked") == false) {
           jQuery("#question_type_id").removeAttr('name');
           jQuery('.question-type-div').hide();
       }
    jQuery('input[name=choose_question]').on('change', function(e){
    if (jQuery('input[name=choose_question]:checked').val() == 0) {
        jQuery("#question_type_id").removeAttr('name');
        jQuery('.question-type-div').hide();
    } else if (jQuery('input[name=choose_question]:checked').val() == 2) {
        jQuery("#question_type_id").removeAttr('name');
        jQuery('.question-type-div').hide();
    }
    else {
        jQuery("#question_type_id").attr('name','question_type_id');
        jQuery('.question-type-div').show();
    }
    });
jQuery('#client-drop').on('change', function(event) {
    if (this.value == - 1) {
    jQuery('.choose-question').hide();
    } else if (this.value == 0) {
    jQuery('.choose-question').hide();
    } else {
    jQuery('.choose-question').show();
    }
});
            // Intervention Type Dropdown value
jQuery('#client-drop').on('change', function(){
    var clientId = jQuery(this).val();
            if (clientId != 0) {
    jQuery('.intervention_type').show();
    } else {
    jQuery('.intervention_type').hide();
    }
    var result = AJAX.sendRequest("{{route('admin.managesessions.intervention')}}", "POST", {"clientId" : clientId}, function (response) {
                    if (response[1]) {
                        toastr.error("Threshold have plateaued!");
                    }
                   var appenddata1 = "";
                   $("#intervention_type").empty();
                   if (response[0] != "") {
                        $.each(response[0], function(i, data) {
                            appenddata1 += "<option value = '" + data["id"] + " '>" + data["name"] + " </option>";
                        });
                        jQuery("#intervention_type").html(appenddata1);
                }
    });
});
    //show card checkbox checked value check
    if ($('#show_card').is(':checked') == true) {
         jQuery("#show_card").val(1);
        jQuery('.schedule_assessment').show();
    }
        jQuery("#show_card").change(function() {
            if (jQuery(this).is(":checked")) {
                    jQuery('.schedule_assessment').show();
                    jQuery("#show_card").val(1);
            } else {
                    jQuery('.schedule_assessment').hide();
                    jQuery("#show_card").val(0);
            }
        });
    });
</script>
@endsection
