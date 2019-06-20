<div class="box-body">
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
            <input type="checkbox" name="del_image1"> Delete
        </div>
        <div class="col-lg-1">
            @if(isset($stonecollection)) @if($stonecollection->image1)
            <a href='{{ URL::to('/') }}/images/{{$stonecollection->image1}}' target="_blank"> <img src='{{ URL::to('/') }}/images/{{$stonecollection->image1}}' height="42" width="42"> </a> 
            @endif @endif
            
        </div>
        
        
    </div>
    <div class="form-group">
        {{ Form::label('upload', 'Image-2', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-3">
            {!! Form::file('image2', array('class' => 'form-control box-size')) !!}
           
        </div>

        <div class="col-lg-1">
            <input type="checkbox" name="del_image2"> Delete
        </div>
        
        <div class="col-lg-1">
            @if(isset($stonecollection))
        @if($stonecollection->image2)
            
            <a href='{{ URL::to('/') }}/images/{{$stonecollection->image2}}' target="_blank"> <img src='{{ URL::to('/') }}/images/{{$stonecollection->image2}}' height="42" width="42"> </a> 
            
             @endif
        @endif
        </div>
       
        

        
    </div>
    <div class="form-group">
        {{ Form::label('upload', 'Image-3', ['class' => 'col-lg-2 control-label']) }}
        <div class="col-lg-3">
            {!! Form::file('image3', array('class' => 'form-control box-size')) !!}
           
        </div>
        
        <div class="col-lg-1">
            <input type="checkbox" name="del_image3" value = 1> Delete
        </div>
        <div class="col-lg-1">
            @if(isset($stonecollection)) @if($stonecollection->image3)
            <a href='{{ URL::to('/') }}/images/{{$stonecollection->image3}}' target="_blank"> <img src='{{ URL::to('/') }}/images/{{$stonecollection->image3}}' height="42" width="42"> </a> 
            @endif @endif
            
        </div>
        
    </div>


    <div class="form-group">
        {{ Form::label('Meta Title', 'Meta Title', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('meta_title', null,['class' => 'form-control box-size', 'placeholder' => 'Meta Title']) }}
        </div><!--col-lg-3-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('Meta Description', 'Meta Description', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('meta_description', null,['class' => 'form-control box-size', 'placeholder' => 'Meta Description']) }}
        </div><!--col-lg-3-->
    </div>
    
</div>

@section("after-scripts")

@endsection
