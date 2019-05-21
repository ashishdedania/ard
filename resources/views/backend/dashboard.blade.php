@extends('backend.layouts.app')
@section('page-header')
@if (getRoles()->id != env('CLIENT_ROLE_ID'))
<h1>
    {{ app_name() }}
    <small>{{ trans('strings.backend.dashboard.title') }}</small>
</h1>
@else
<h1>
    {{ trans('strings.backend.dashboard.title') }}
</h1>
@endif
@endsection
@section('content')
{{ Form::model($logged_in_user, ['route' => 'admin.client.profile.update','id' => 'dashboard_form', 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
<div class="box collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title">
            @if (getRoles()->id != env('CLIENT_ROLE_ID'))
            {{ trans('history.backend.recent_history') }}
            @else
            My Information
            @endif
        </h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div><!-- /.box tools -->
    </div><!-- /.box-header -->
    <div class="box-body">
        @if (getRoles()->id != env('CLIENT_ROLE_ID'))
        {!! history()->render() !!}
        @else
        <div class="box-body">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Information</a></li>
                <li><a href="#tab2" data-toggle="tab">{{ $pages[2]['title'] }}</a></li>
                <li><a href="#tab4" data-toggle="tab">{{ $pages[4]['title'] }}</a></li>
                <li><a href="#tab3" data-toggle="tab">{{ $pages[3]['title'] }}</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <br/>
                    <div class="form-group">
                        {{ Form::label('dob', trans('labels.backend.clients.table.dob'), ['class' => 'col-lg-2 control-label required']) }}
                        <div class="col-lg-10">
                            {{ Form::text('dob',isset($client->dob) ? date("d-m-Y",strtotime($client->dob)) : null, ['id' => 'datetimepicker1','class' => 'form-control box-size datepicker', 'placeholder' => 'DD-MM-YYYY', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('age', trans('labels.backend.clients.table.age'), ['class' => 'col-lg-2 control-label required']) }}
                        <div class="col-lg-10">
                            {{ Form::text('age', isset($client->age) ? $client->age : null, ['readonly' => 'readonly','id' => 'age','class' => 'form-control box-size age', 'placeholder' => trans('labels.backend.clients.table.age'), 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('parent', trans('labels.backend.clients.table.parent'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::text('parent', isset($client->parent) ? $client->parent : null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.clients.table.parent')]) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('telephone', trans('labels.backend.clients.table.telephone'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::text('telephone', isset($client->telephone) ? $client->telephone : null, ['class' => 'form-control box-size check-no', 'placeholder' => trans('labels.backend.clients.table.telephone')]) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('ok_to_contact', trans('labels.backend.clients.table.ok_to_contact'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            <label class="control control--radio">
                                <input type="radio" name="ok_to_contact" value="1" @if($client->ok_to_contact == 1) @php echo 'checked="checked"' @endphp @endif>YES
                                       <div class="control__indicator"></div>
                            </label>
                            <label class="control control--radio">
                                <input type="radio" name="ok_to_contact" value="0" @if($client->ok_to_contact == 0) @php echo 'checked="checked"' @endphp @endif>NO
                                       <div class="control__indicator"></div>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('ok_to_write', trans('labels.backend.clients.table.ok_to_write'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            <label class="control control--radio">
                                <input type="radio" name="ok_to_write" value="1" @if($client->ok_to_write == 1) @php echo 'checked="checked"' @endphp @endif>YES
                                       <div class="control__indicator"></div>
                            </label>
                            <label class="control control--radio">
                                <input type="radio" name="ok_to_write" value="0" @if($client->ok_to_write == 0) @php echo 'checked="checked"' @endphp @endif>NO
                                       <div class="control__indicator"></div>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('about_actualise', trans('labels.backend.clients.table.about_actualise'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::text('about_actualise', isset($client->about_actualise) ? $client->about_actualise : null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.clients.table.about_actualise')]) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('gp', trans('labels.backend.clients.table.gp'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::text('gp', isset($client->gp) ? $client->gp : null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.clients.table.gp')]) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('contact_address', trans('labels.backend.clients.table.contact_address'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::text('contact_address',  isset($client->contact_address) ? $client->contact_address : null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.clients.table.contact_address')]) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('contact_tel_no', trans('labels.backend.clients.table.contact_tel_no'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::text('contact_tel_no', isset($client->contact_tel_no) ? $client->contact_tel_no : null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.clients.table.contact_tel_no')]) }}
                        </div>
                    </div>
                      <div class="form-group">
                        @php
                        $disclaimer = !empty(\Session::get('data')) ? \Session::get('data')->disclaimer : $client->termes_condition;
                        $termCondition = !empty(\Session::get('data')) ? \Session::get('data')->termes_condition : $client->disclaimer;
                        $referredBy = explode(",",$client->referred_by);
                        @endphp
                        {{ Form::label('referred_by', trans('labels.backend.clients.table.referred_by'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            <label class="control control--checkbox">
                                <input type="checkbox" name="referred_by[]" value="1" @if(in_array(1,$referredBy)) @php echo 'checked="checked"'; @endphp @endif>Self
                                       <div class="control__indicator"></div>
                            </label>
                            <label class="control control--checkbox">
                                <input type="checkbox" name="referred_by[]" value="2" @if(in_array(2,$referredBy)) @php echo 'checked="checked"'; @endphp @endif>Health Centre
                                       <div class="control__indicator"></div>
                            </label>
                            <label class="control control--checkbox">
                                <input type="checkbox" name="referred_by[]" value="3" @if(in_array(3,$referredBy)) @php echo 'checked="checked"'; @endphp @endif>Friend
                                       <div class="control__indicator"></div>
                            </label>
                            <label class="control control--checkbox">
                                <input type="checkbox" name="referred_by[]" value="4" @if(in_array(4,$referredBy)) @php echo 'checked="checked"'; @endphp @endif>Family
                                       <div class="control__indicator"></div>
                            </label>
                            <label class="control control--checkbox">
                                <input type="checkbox" name="referred_by[]" value="5" @if(in_array(5,$referredBy)) @php echo 'checked="checked"'; @endphp @endif>GP
                                       <div class="control__indicator"></div>
                            </label>
                            <label class="control control--checkbox">
                                <input type="checkbox" name="referred_by[]" value="6" @if(in_array(6,$referredBy)) @php echo 'checked="checked"'; @endphp @endif>Clinic
                                       <div class="control__indicator"></div>
                            </label>
                            <label class="control control--checkbox">
                                <input type="checkbox" name="referred_by[]" value="7" @if(in_array(7,$referredBy)) @php echo 'checked="checked"'; @endphp @endif>Other Professional
                                       <div class="control__indicator"></div>
                            </label>
                            <label class="control control--checkbox">
                                <input type="checkbox" name="referred_by[]" value="8" @if(in_array(8,$referredBy)) @php echo 'checked="checked"'; @endphp @endif>Clinic
                                       <div class="control__indicator"></div>
                            </label>
                            <label class="control control--checkbox">
                                <input type="checkbox" name="referred_by[]" value="9" @if(in_array(9,$referredBy)) @php echo 'checked="checked"'; @endphp @endif>Other
                                       <div class="control__indicator"></div>
                            </label>
                            <div class="referred_by_description" style="display: none;">
                                <input type="textbox" name="referred_by_description" class="form-control box-size" value="{!! $client->referred_by_description !!}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('medication_choise', trans('labels.backend.clients.table.medication_choise'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            <label class="control control--radio">
                                <input type="radio" class="medication_choise_radio" name="medication_choise[]" value="1" @if($client->medication_choise == 1) @php echo 'checked="checked"' @endphp @endif>YES
                                       <div class="control__indicator"></div>

                            </label>
                            <label class="control control--radio">
                                <input type="radio" class="medication_choise_radio" name="medication_choise[]" value="2" @if($client->medication_choise == 2)  @php echo 'checked="checked"' @endphp @endif>NO
                                       <div class="control__indicator"></div>

                            </label>
                            <div class="medication_input" style="display: none;">
                                <input type="text" name="medication_description" class="form-control box-size" value="{!! $client->medication_description!!}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group"  style="display: none;">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <label class="control control--checkbox ">
                                {{-- @if(in_array(9,$referredBy)) @php echo 'checked="checked"'; @endphp @endif --}}
                                 <input type="checkbox" name="information" checked="checked" value="0" class="accept" @if ($client->information == 1) @php echo 'checked="checked"'; @endphp @endif>Accept
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-offset-4">
                        <a href="{!! route('admin.managesessions.index') !!}" class="btn btn-danger previous_button">Not Now</a>
                        <input type="submit" value="Submit" name="Submit" class="btn btn-primary submit_btn">
                    </div>
                </div>
                <div class="tab-pane" id="tab2">
                    <div class="form-group">
                         <label class="col-lg-2  control-label">
                        </label>
                         <div class="col-lg-10">
                            <br/>{!! $pages[2]['description'] !!}
                         </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <label class="control control--checkbox ">
                                 <input type="checkbox" name="gdpr" value="0" class="accept2" @if ($client->gdpr == 1) @php echo 'checked="checked"'; @endphp @endif>I agree with terms of services
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-offset-4">
                      <a class="btn btn-primary btnPrevious previous_button">Previous</a>
                    </div>
                </div>
                <div class="tab-pane" id="tab3">
                    <div class="form-group">
                         <label class="col-lg-2  control-label">
                        </label>
                         <div class="col-lg-10">
                            <br/>{!! $pages[3]['description'] !!}
                         </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <label class="control control--checkbox ">
                                 <input type="checkbox" name="consent_data_collection" value="0" class="accept3" @if ($client->consent_data_collection == 1) @php echo 'checked="checked"'; @endphp @endif>  I consent to my anonymised data being entered into a data store for use in potential future research projects.
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                    </div>
                     <div class="col-lg-10 col-md-offset-4">
                      <a class="btn btn-primary btnPrevious previous_button">Previous</a>
                    </div>
                </div>
                 <div class="tab-pane" id="tab4">
                    <div class="form-group">
                         <label class="col-lg-2  control-label">
                        </label>
                         <div class="col-lg-10">
                            <br/>{!! $pages[4]['description'] !!}
                         </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-10">
                            <label class="control control--checkbox ">
                                 <input type="checkbox" name="research" value="0" class="accept4" @if ($client->research == 1) @php echo 'checked="checked"'; @endphp @endif> I agree to my Personal Data being collected and processed by Actualise Psychological Services.
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-offset-4">
                    {{-- <a class="btn btn-primary btnPrevious" >Previous</a> --}}
                    </div>
                     <div class="col-lg-10 col-md-offset-4">
                      <a class="btn btn-primary btnPrevious previous_button">Previous</a>

                    </div>
                         {{--    <div class="col-lg-10 col-md-offset-4">
                          <a class="btn btn-primary btnPrevious" style="margin-bottom: -275px;
        margin-left: 154px;" >Previous</a>
                        </div> --}}
                </div><br/>

            </div>
            <!-- End Tabs --->
             <div class="form-group">
                <div class="col-lg-10 col-md-offset-4">

                    {{-- {{ Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'update-profile']) }} --}}
                    <input type="submit" value="Submit" name="Submit" class="btn btn-primary" id="update-profile" style="display: none;">
                    <a class="btn btn-primary btnNext" >Next</a>
        </div>
    </div>
            <input type="hidden" name="dashboard" value="1">
                        </div>
                        @endif
                    </div><!-- /.box-body -->
                </div><!--box box-info-->
                {!! Form::close() !!}
                @if (getRoles()->id == env('CLIENT_ROLE_ID'))
                <div class="box collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Subjective Goals</h3>
                        <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            @php $j=0; @endphp
                             <div class="loadings" style="display: none;">
                                    <center>
                                        <img class="loading-image" src="{{url('/')}}/img/loader.gif" alt="loading..">
                                    </center>
                                    </div>
                            @for($i=1;$i <= 10;$i++)
                            <div class="form-group col-sm-6">
                                {{ Form::label(null,null, ['class' => 'col-lg-1 control-label']) }}
                                <div class="col-lg-8">
                                    @if (!empty($customquestion))
                                    {{ Form::text('question_name[]',isset($questions[$j]) ? $questions[$j]->question_name : null, ['disabled' => true,'id' => "Que-".$i,'class' => 'question_name form-control box-size', 'placeholder' => "Goals " . $i]) }}
                                    @else
                                    {{ Form::text('question_name[]',isset($questions[$j]) ? $questions[$j]->question_name : null, ['id' => "Que-".$i,'class' => 'question_name form-control box-size', 'placeholder' => "Goals " . $i]) }}
                                    @endif
                                </div>
                            </div>
                            @php $j++; @endphp
                            @endfor
                        </div><br/>
                        <div class="edit-form-btn">
                            @if (empty($customquestion))
                            <a href="javascript:void(0)" class="subjective-question btn btn-primary">Submit</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endif

                <!-- Modal for terms and condition -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Terms and Conditions</h4>
                            </div>
                            <div class="modal-body">
                                <p>@if (isset($pages)){!!  html_entity_decode($pages[0]['description']) !!}@endif</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="disclaimer" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Disclaimer</h4>
                            </div>
                            <div class="modal-body">
                                <p>@if (isset($pages)){!!  html_entity_decode($pages[1]['description']) !!}@endif</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection
@section("after-scripts")
<script type="text/javascript">
		    $(document).ready(function () {
            @if (getRoles()-> id == env('CLIENT_ROLE_ID'))
                @if ($client->medication_choise == 1)
                    $('.medication_input').show();
                @else
                    $('.medication_input').hide();
                @endif
                 //Refered By check other
                     @if(in_array(9,$referredBy))
                        $('.referred_by_description').show();
                    @else
                        $('.referred_by_description').hide();
                     @endif
            @endif
                    $('input[type=radio][class=medication_choise_radio').change(function() {
                        if (this.value == 1) {
                            $('.medication_input').show();
                        } else {
                            $('.medication_input').hide();
                        }
                    });

                   $('input[type=checkbox]').on('change',function(){

                        if (this.value == 9 && $(this).is(':checked')) {
                            $('.referred_by_description').show();
                        } else if (this.value == 9 && $(this).is(':checked') == false) {
                            $('.referred_by_description').hide();
                        }
                   });
                   $("ul.nav li").addClass('disabledTab');
              	    $('.btnNext').on('click', function () {
                        var tab1 = $("#tab1").select("select", this.hash);
                        var tab2 = $("#tab2").select("select", this.hash);
                        var tab3 = $("#tab3").select("select", this.hash);
                        var tab4 = $("#tab4").select("select", this.hash);

                       if(tab1[0].className == 'tab-pane active') {
                                $('#update-profile').hide();
                               if (jQuery(".accept").is(":checked")) {
                                $('.nav-tabs > .active').next('li').find('a').trigger('click');
                                 } else {
                                 toastr.error('Please check agreement!.');
                                 return false;
                               }
                       }else if(tab2[0].className == 'tab-pane active'){
                         $('#update-profile').hide();
                                 if (jQuery(".accept2").is(":checked")) {
                                          $('.nav-tabs > .active').next('li').find('a').trigger('click');
                                   } else {
                                           toastr.error('Please check agreement!.');
                                            return false;
                                   }
                       }else if(tab3[0].className == 'tab-pane'){

                                 $('#update-profile').hide();
                                 if (jQuery(".accept4").is(":checked")) {
                                          $('.nav-tabs > .active').next('li').find('a').trigger('click');
                                          $('#update-profile').show();
                                          $('.btnNext').hide();
                                   } else {
                                           toastr.error('Please check agreement!.');
                                            return false;
                                   }
                       }else if(tab4[0].className == 'tab-pane'){
                              $('.nav-tabs > .active').next('li').find('a').trigger('click');
                                  $('#update-profile').show();
                                  // $('.btnPrevious').show();
                                  $('.btnNext').hide();
                                 if (jQuery(".accept3").is(":checked")) {
                                   } else {
                                   }
                       }
        		    });
                    $('.btnPrevious').click(function () {
                         $('#update-profile').hide();
                          $('.btnNext').show();
		                  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
                    });
		    });
		    Actulise.Client.init();
		    Actulise.Client.ageCalculation();
		    jQuery('#edit').hide();
		    jQuery("body").on("dp.change", '#datetimepicker1', function (e) {
		    Actulise.Client.ageCalculation();
		    });
		    jQuery("#update-profile").on("click", function (event) {
		    event.preventDefault();
		    // if (jQuery("#termes_condition_chk").is(":checked") == false) {
		    // jQuery("#termes_condition_chk").val(0);
		    // toastr.error('You must agree to the terms and conditions before submit.');
		    // } else if (jQuery("#disclaimer_chk").is(":checked") == false) {
		    // jQuery("#termes_condition_chk").val(0);
		    // toastr.error('You must agree to the disclaimer before submit.');
		    // } else {
		    //  jQuery("#termes_condition_chk").val(1);
		    // jQuery("#disclaimer_chk").val(1);
             jQuery(".accept").val(1);
             jQuery(".accept2").val(1);
             jQuery(".accept3").val(1);
             jQuery(".accept4").val(1);
            jQuery("#disclaimer_chk").val(1);
		    jQuery('#dashboard_form').submit();
		    });
            @if (getRoles()-> id == env('CLIENT_ROLE_ID'))
			    jQuery(".subjective-question").on("click", function(event) {
                     event.preventDefault();
                     var questionVal = $("input[name='question_name[]']").map(function(){return $(this).val(); }).get();
                     var clientId = "{!! $client->id !!}";
                     var baseUrl = window.location.origin;
                     var Url = baseUrl + '/admin/clients/store/question/' + clientId;
                     swal({
                        title: "You cannot make changes in your goals afterwards, however you can contact administrator to do that for you ?",
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
                            //Ajax Calls.
                              swal.close();
                                 jQuery.ajax({
                                    url:Url,
                                    dataType: 'json',
                                    async: true,
                                    type: 'POST',
                                    data:{"clientId" : clientId, "question_name" : questionVal},
                                     beforeSend: function () {
                                          jQuery('.loadings').show();
                                    },
                                    success: function (response) {
                                        jQuery('.loadings').hide();
                                          var j = 0;
                                         for (var i = 1; i <= response.length; i++) {
                                          $("#Que-" + i).val(response[j]['question_name']);
                                          $(".question_name").attr('disabled', true);
                                          $(".subjective-question").hide();
                                          j++;
                                        }
                                        toastr.success("Goals Submited Successfully!");
                                    }
                                 });
                        } else {
                               swal.close();
                         }
                     });


      //                var result = AJAX.sendRequest(Url, "POST", {"clientId" : clientId, "question_name" : questionVal}, function (response) {
      //                jQuery('.loadings').hide();
		    //          var j = 0;
		    //          for (var i = 1; i <= response.length; i++) {
      //   		      $("#Que-" + i).val(response[j]['question_name']);
      //   		      $(".question_name").attr('disabled', true);
      //   		      $(".subjective-question").hide();
      //   		      j++;
      //   		    }
		    //        toastr.success("Goals Submited Successfully!");
		    // });
		  });
		    @endif
</script>
@endsection
