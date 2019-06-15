<div class="box-body">



    <div class="form-group">
        {{ Form::label('type', 'Type', ['class' => 'col-lg-2 control-label required']) }}

        <?php
            $incheck = 'checked="checked"';
            $outcheck = '';
            $showindoor = '';
            $showoutdoor = 'hidden';

            if (isset($stonecollection))
            {
                if($stonecollection->parent_group->is_indoor == 0)
                {
                    $outcheck = 'checked="checked"';
                    $incheck = '';
                    $showindoor = 'hidden';
                    $showoutdoor = '';
                }
            }

        ?>
        <div class="col-lg-10">
             <label class="control control--radio">Indoor<input type="radio" name="is_indoor" class="radio choose_behaviour" {{$incheck}} value=1 data-id='indoor_div' ><div class="control__indicator"></div></label>

             <label class="control control--radio" >Outdoor<input type="radio" name="is_indoor" class="radio choose_behaviour" {{$outcheck}} value=0 data-id='outdoor_div'><div class="control__indicator"></div></label>
        </div>
    
        <div class="form-group {{$showindoor}}" id='indoor_div'>
            
             {{ Form::label('', 'Indoor', ['class' => 'col-lg-2 control-label']) }} 

            <div class="col-lg-10">
                
                
                {{ Form::select('collection_id_1',$collection1, isset($stonecollection) ? $stonecollection->collection_id : '', ['class' => 'question_type form-control box-size', 'placeholder' => 'Select']) }} 
            </div><!--col-lg-10-->
        </div>



    <div class="form-group {{$showoutdoor}}" id='outdoor_div'>
        
         {{ Form::label('', 'Outdoor', ['class' => 'col-lg-2 control-label']) }} 

        <div class="col-lg-10">
            
            
            {{ Form::select('collection_id',$collections, null, ['class' => 'question_type form-control box-size', 'placeholder' => 'Select']) }} 
        </div><!--col-lg-10-->
    </div>

    <!--form-group-->

    <div class="form-group">
        {{ Form::label('title', 'Title', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => 'Title']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::textarea('description', null, ['class' => 'form-control box-size', 'placeholder' => 'Description']) }}
        </div>
    </div>
     <div class="form-group">
        {{ Form::label('upload', 'Image-1', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-3">
            {!! Form::file('image1', array('class' => 'form-control box-size')) !!}
           
        </div>
        <div class="col-lg-1">
            
        </div>
        <div class="col-lg-1">
            @if(isset($stonecollection)) @if($stonecollection->image1)
            <a href='{{ URL::to('/') }}/images/{{$stonecollection->image1}}' target="_blank"> <img src='{{ URL::to('/') }}/images/{{$stonecollection->image1}}' height="42" width="42"> </a> 
            @endif @endif
            
        </div>
        
        
    </div>
    <div class="form-group">
        {{ Form::label('', 'Order No', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::number('sr_no', null, ['class' => 'form-control box-size', 'placeholder' => '1' , 'style' => 'width:100px;' ,  'min' =>"1"]) }}
        </div>
    </div>
    
    
</div>

@section("after-scripts")
<script type="text/javascript">
$(document).ready(function () {  
$(".choose_behaviour").change(function(){
     
     var id = $(this).data('id');
     if(id == 'indoor_div')
    {
        $('#indoor_div').removeClass('hidden');
        $('#outdoor_div').addClass('hidden');

        /*document.getElementById('indoor_div').classList.remove = 'hidden';
        document.getElementById('outdoor_div').classList.add = 'hidden';*/
    }  

    else
    {

        $('#outdoor_div').removeClass('hidden');
        $('#indoor_div').addClass('hidden');
        /*document.getElementById('indoor_div').classList.add = 'hidden';
        document.getElementById('outdoor_div').classList.remove = 'hidden';*/
    }

});
 });
</script>
@endsection
