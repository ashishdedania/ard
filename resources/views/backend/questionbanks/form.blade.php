
<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
         {{ Form::label('type_id', trans('labels.backend.questionbanks.table.title'), ['class' => 'col-lg-2 control-label required']) }} 

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            
            {{ Form::select('type_id',$question_type, null, ['class' => 'question_type form-control box-size', 'placeholder' => trans('labels.backend.questionbanks.table.select'), 'required' => 'required']) }} 
        </div><!--col-lg-10-->
    </div><!--form-group-->
</div><!--box-body-->

<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
         {{ Form::label('question', trans('labels.backend.questionbanks.table.question'), ['class' => 'col-lg-2 control-label required']) }} 

        <div class="col-lg-10">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            {{ Form::text('question', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.questionbanks.table.question'), 'required' => 'required']) }} 
        </div><!--col-lg-10-->
    </div><!--form-group-->
</div><!--box-body-->

<div class="box-body">
    <div class="form-group">
        <!-- Create Your Field Label Here -->
        <!-- Look Below Example for reference -->
         {{ Form::label('options & score', trans('labels.backend.questionbanks.table.options_score'), ['class' => 'col-lg-2 control-label required']) }} 

        <div class="col-lg-10 input_fields_wrap">
            <!-- Create Your Input Field Here -->
            <!-- Look Below Example for reference -->
            
              <button class="add_field_button btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span></button>
            
            @if(isset($option_score_array))

                @foreach ($option_score_array as $key => $val) 
               <div style="margin-top: 10px"> 
                    <input type="text" name="option_score_id[]" value={{$val->id}} hidden="" />
                {{ Form::text('score',$val->marks,['class' => 'check_only_number score_field form-control box-size', 'placeholder' => trans('labels.backend.questionbanks.table.score'), 'required' => 'required' , 'id' => 'scores','name'=> 'score[]',"style"=>"width:61px"]) }}&nbsp;{{ Form::text('options', $val->option, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.questionbanks.table.options'), 'required' => 'required','name'=>'option[]',"style"=>"margin-left: 66px; margin-top: -54px; width: 666px;"]) }} <a href="#" class="remove_field" style="float:left; margin-left:750px;margin-top: -26px;color: red"><i class="fa fa-close"></i></a> 
                </div> </br>
           @endforeach
           @else
           <div style="margin-top: 10px">{{ Form::text('score', null, ['class' => 'check_only_number form-control', 'placeholder' => trans('labels.backend.questionbanks.table.score'), 'required' => 'required' ,"name"=>"score[]" ,"style"=>"width:61px" ]) }}&nbsp;{{ Form::text('options', null, ['class' => 'form-control box-size', 'placeholder' => trans('labels.backend.questionbanks.table.options'), 'required' => 'required' ,"name"=>"option[]", "style"=>"margin-left: 66px; margin-top:-54px; width: 666px;"]) }}  
           </div> </br>
           @endif
        </div><!--col-lg-10-->
    </div><!--form-group-->
</div><!--box-body-->


<div class="form-group behaviour">

  <span id="">
      
  </span>
    @if(isset($questionbank))
    {{-- @php print_r(count($behaviour));
    die();@endphp --}}
    {{-- @if(count($behaviour) != 0) --}}
        {{ Form::label('Behaviour', trans('validation.attributes.backend.questionbanks.behaviour'), ['class' => 'col-lg-2 control-label required' ,'id'=>'label_behaviour','data-behaviour'=> count($behaviour)]) }}
    {{-- @endif --}}
    @else
    {{ Form::label('Behaviour', trans('validation.attributes.backend.questionbanks.behaviour'), ['class' => 'col-lg-2 control-label required' ,'id'=>'label_behaviour' ]) }}
    
    @endif
        <div class="col-lg-10 radio_behaviour" >
        <div id="radio_behaviour">
        @if(isset($questionbank)) 
        @foreach($behaviour as $key => $radio_behaviour)
             <label class="control control--radio"><input type="radio" name="choose_behaviour" class="radio choose_behaviour" @if ($questionbank->behaviour_id == $key) checked="checked" @endif value= {{ $key }} >{{ $radio_behaviour }}<div class="control__indicator"></div></label>
       
        @endforeach
        @endif
        </div>
        </div>
        
</div>


<div class="form-group">
        {{ Form::label('status', trans('validation.attributes.backend.questionbanks.is_active'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            
            @if(isset($questionbank))
            @if($questionbank->status == 1)
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

    

@section("after-scripts")
    <script type="text/javascript">

        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() 
        {

            var newURL = window.location.protocol + "://" + window.location.host + "/" + window.location.pathname;
            var pathArray = window.location.pathname.split( '/' );
            var segment_4 = pathArray[4];
            //$("#label_behaviour").hide();

            var max_fields      = 4; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID


            
           
           if(segment_4!== "edit")
           {
             $("#label_behaviour").hide();
                var x = 1;
               
                $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields)
                { 
                    x++;
                    $(wrapper).append('<div><input placeholder="Score" required="required" id="score" type="text" name="score[]" style="width:62px" class="check_only_number form-control box-size"/>&nbsp;<input placeholder="Options" required="required" id="options" type="text" name="option[]"  style="margin-left:66px; margin-top: -54px; width: 666px;" class="form-control box-size"/><a href="#" class="remove_field" style="float: left;margin-left:750px;margin-top: -26px"><i class="fa fa-close" style="color:red"></i></a></div> </br>');
                }
            });
           }
           else
           {
                if($("#label_behaviour").data('behaviour') == 0){
                    
                $("#label_behaviour").css('display','none');
                }
                var add_button  = $(".add_field_button");
                var inputs = $(".score_field").length;
                var x = inputs;
                $(add_button).click(function(e){ 
               //on add input button click
                e.preventDefault();
                if(x < max_fields)
                { 
                    x++;
                    $(wrapper).append('<div><input placeholder="Score" required="required" id="score" type="text" name="score_new[]" style="width:62px" class="check_only_number form-control box-size"/>&nbsp;<input placeholder="Option" required="required" id="options" type="text" name="option_new[]" style="margin-left: 66px;margin-top: -54px;width: 666px;" class="form-control box-size"/><a href="#" class="remove_field" style="float: left;margin-left:750px;margin-top: -26px"><i class="fa fa-close" style="color:red"></i></a></div> </br>');
                }
            });
           }
                
            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault();
                if(x>1)
                {
                    $(this).parent('div').remove(); 
                    x--;
                }
            })

            /* if(segment_4 == "edit")
             {
                if($("#type_id").val() !=1)
                {
                    $("#label_behaviour").show();
                    $("#radio_behaviour").show();
                }
                else
                {
                    $("#label_behaviour").hide();
                    $("#radio_behaviour").hide();
                }
             }*/


            //Show behaviour 
            $(".question_type").change(function() 
            {
                $("#label_behaviour").hide();
                $('#radio_behaviour').hide();
                $('.radio_behaviour').hide();
                $('.behaviour').hide();

                        
                        var wrapper = $(".radio_behaviour");
                        $(wrapper).html(""); 
                        var type_id = $('#type_id').val();
                        var token = $("input[name='_token']").val();
                        $.ajax({
                            url: '{{ route("admin.questionbanks.selectBehaviour") }}',
                            method: 'POST',
                            data: {type_id: type_id, _token: token},
                            success: function (data) 
                            {
                                 
                                var behaviour = data.behaviour.length;

                                if(behaviour != 0)
                                {
                                
                                    $("#label_behaviour").css("display", "block");
                                    //$("#label_behaviour").show();
                                    $('.radio_behaviour').show();
                                    $('.behaviour').show();
                                    //console.log(data.behaviour);
                                    $.each(data.behaviour, function (key, value)
                                    {
                                        
                                        $(wrapper).append('<label class="control control--radio"><input type="radio" name="choose_behaviour" checked="checked" class="radio choose_behaviour" value='+key+'>'+value+'<div class="control__indicator"></div></label>');

                                    });
                                }
                            }
                        });                
                
            });
        });


        
    </script>
@endsection
