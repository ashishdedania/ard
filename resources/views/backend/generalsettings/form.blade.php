<div class="box-body">
    
    <div class="form-group">
        {{ Form::label('setting_0', 'General Mega Description', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::textarea('setting_0', null, ['class' => 'form-control box-size', 'placeholder' => 'Description']) }}
        </div>
    </div>


    <div class="form-group">
        {{ Form::label('setting_1', 'Third Party code (Header Part)', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::textarea('setting_1', null, ['class' => 'form-control box-size', 'placeholder' => 'Description']) }}
        </div>
    </div>




    <div class="form-group">
        {{ Form::label('setting_2', 'Third Party code (Before Body Close Part)', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::textarea('setting_2', null, ['class' => 'form-control box-size', 'placeholder' => 'Description']) }}
        </div>
    </div>



    <div class="form-group">
        {{ Form::label('setting_3', 'Third Party code Only for Home Page (Header Part)', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::textarea('setting_3', null, ['class' => 'form-control box-size', 'placeholder' => 'Description']) }}
        </div>
    </div>




    <div class="form-group">
        {{ Form::label('setting_4', 'Third Party code only for Home Page (Before Body Close Part)', ['class' => 'col-lg-2 control-label required']) }}
        <div class="col-lg-10">
            {{ Form::textarea('setting_4', null, ['class' => 'form-control box-size', 'placeholder' => 'Description']) }}
        </div>
    </div>



    

    
    
</div>

@section("after-scripts")

@endsection
