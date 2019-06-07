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
        {{ Form::label('type', 'Type', ['class' => 'col-lg-2 control-label required']) }}

        <?php
            $incheck = 'checked="checked"';
                $outcheck = '';

            if (isset($stonecollection))
            {
                if($stonecollection->is_indoor == 0)
                {
                    $outcheck = 'checked="checked"';
                    $incheck = '';
                }
            }

        ?>
        <div class="col-lg-10">
             <label class="control control--radio">Indoor<input type="radio" name="is_indoor" class="radio choose_behaviour" {{$incheck}} value=1 ><div class="control__indicator"></div></label>

             <label class="control control--radio">Outdoor<input type="radio" name="is_indoor" class="radio choose_behaviour" {{$outcheck}} value=0 ><div class="control__indicator"></div></label>
        </div>
    </div>





    <div class="form-group">
        {{ Form::label('upload', 'Image-1', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-3">
            {!! Form::file('image1', array('class' => 'form-control box-size')) !!}
           
        </div>
        <div class="col-lg-3">
            @if (isset($stonecollection))<a href='{{ URL::to('/') }}/images/{{$stonecollection->image1}}' target="_blank"> View Uploaded File </a> @endif
        </div>
        
    </div>
    <div class="form-group">
        {{ Form::label('upload', 'Image-2', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-3">
            {!! Form::file('image2', array('class' => 'form-control box-size')) !!}
           
        </div>
        <div class="col-lg-3">
            @if (isset($stonecollection))<a href='{{ URL::to('/') }}/images/{{$stonecollection->image2}}' target="_blank"> View Uploaded File </a> @endif
        </div>
        
    </div>
    <div class="form-group">
        {{ Form::label('upload', 'Image-3', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-3">
            {!! Form::file('image3', array('class' => 'form-control box-size')) !!}
           
        </div>
        <div class="col-lg-3">
            @if (isset($stonecollection))<a href='{{ URL::to('/') }}/images/{{$stonecollection->image3}}' target="_blank"> View Uploaded File </a> @endif
        </div>
        
    </div>
    
</div>

@section("after-scripts")

@endsection
