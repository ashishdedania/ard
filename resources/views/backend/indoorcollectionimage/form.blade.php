<div class="box-body">
    
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
