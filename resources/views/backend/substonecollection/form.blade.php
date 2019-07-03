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
        {{ Form::label('description', 'Description', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::textarea('description', null, ['class' => 'form-control box-size', 'placeholder' => 'Description']) }}
        </div>
    </div>
    


    <div class="form-group">
        {{ Form::label('upload', 'Image-1', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-3">
            {!! Form::file('image1', array('class' => 'form-control box-size')) !!}
           
        </div>
        
        <div class="col-lg-1">
            @if(isset($stonecollection)) @if($stonecollection->image1)
            <a href='{{ URL::to('/') }}/images/{{$stonecollection->image1}}' target="_blank"> <img src='{{ URL::to('/') }}/images/{{$stonecollection->image1}}' height="42" width="42"> </a> 
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
    

    <div class="form-group">
        {{ Form::label('Image Alt Text', 'Image Alt Text', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('image_alt_text', null,['class' => 'form-control box-size', 'placeholder' => 'Image Alt Text']) }}
        </div><!--col-lg-3-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('Image Title Text', 'Image Title Text', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('image_title_text', null,['class' => 'form-control box-size', 'placeholder' => 'Image Title Text']) }}
        </div><!--col-lg-3-->
    </div>

    <div class="form-group">
        {{ Form::label('SEO Id', 'SEO Id', ['class' => 'col-lg-2 control-label required']) }}

        <div class="col-lg-10">
            {{ Form::textarea('slug_id', null,['class' => 'form-control box-size', 'placeholder' => 'SEO Id']) }}
            <font color="red"><b>NOTE: SEO Id only contain alphabate numer and dash, SEO Id will be unique</b></font>
        </div><!--col-lg-3-->
    </div><!--form control-->

    <div class="form-group">
        {{ Form::label('Canonical Link', 'Canonical Link', ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
            {{ Form::textarea('canonical_link', null,['class' => 'form-control box-size', 'placeholder' => 'Canonical Link']) }}
        </div><!--col-lg-3-->
    </div>


    
</div>

@section("after-scripts")

@endsection
