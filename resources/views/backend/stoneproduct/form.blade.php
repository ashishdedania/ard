<div class="box-body">

    
    <div class="form-group">
        
         {{ Form::label('collection_id', 'Collection', ['class' => 'col-lg-2 control-label required']) }} 

        <div class="col-lg-10">
            
            
            {{ Form::select('collection_id',$collections, null, ['class' => 'question_type form-control box-size', 'placeholder' => 'Select', 'required' => 'required']) }} 
        </div><!--col-lg-10-->
    </div><!--form-group-->

    <div class="form-group">
        {{ Form::label('title', 'Title', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::text('title', null, ['class' => 'form-control box-size', 'placeholder' => 'Title']) }}
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
        {{ Form::label('product_carousel_area', 'Product Carousel', ['class' => 'col-lg-2 control-label ']) }}
        <div class="col-lg-10">
            {{ Form::textarea('product_carousel_area', null, ['class' => 'form-control box-size', 'placeholder' => 'Product Carousel']) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('versitility_of_application', 'Versatility Of Application', ['class' => 'col-lg-2 control-label ']) }}
        <div class="col-lg-10">
            {{ Form::textarea('versitility_of_application', null, ['class' => 'form-control box-size', 'placeholder' => 'Versatility Of Application']) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('technical_info_section', 'Technical Info', ['class' => 'col-lg-2 control-label ']) }}
        <div class="col-lg-10">
            {{ Form::textarea('technical_info_section', null, ['class' => 'form-control box-size', 'placeholder' => 'Technical Info']) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('quote_selection', 'Quote Selection', ['class' => 'col-lg-2 control-label ']) }}
        <div class="col-lg-10">
            {{ Form::textarea('quote_selection', null, ['class' => 'form-control box-size', 'placeholder' => 'Quote Selection']) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('edging_option', 'Edging Option', ['class' => 'col-lg-2 control-label ']) }}
        <div class="col-lg-10">
            {{ Form::textarea('edging_option', null, ['class' => 'form-control box-size', 'placeholder' => 'Edging Option']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('maintainance_section', 'Maintainance', ['class' => 'col-lg-2 control-label ']) }}
        <div class="col-lg-10">
            {{ Form::textarea('maintainance_section', null, ['class' => 'form-control box-size', 'placeholder' => 'Maintainance']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('section_seven', 'More Detail', ['class' => 'col-lg-2 control-label ']) }}
        <div class="col-lg-10">
            {{ Form::textarea('section_seven', null, ['class' => 'form-control box-size', 'placeholder' => 'More Detail']) }}
        </div>
    </div>
    
    
</div>

@section("after-scripts")

@endsection
