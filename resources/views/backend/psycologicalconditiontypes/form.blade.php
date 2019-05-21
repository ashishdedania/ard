
    
      {{ Form::label('name', trans('validation.attributes.backend.psycologicalcondtion.title'), ['class' => 'col-lg-2 control-label required']) }}

       
           <div class="col-lg-10">
            {{ Form::text('name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.psycologicalcondtion.title'), 'required' => 'required']) }}
        </div><!--col-lg-10-->
        </div>
    

<div class="form-group">
        {{ Form::label('status', trans('validation.attributes.backend.psycologicalcondtion.is_active'), ['class' => 'col-lg-2 control-label']) }}

        <div class="col-lg-10">
             @if(isset($psycologicalconditiontype))
            @if($psycologicalconditiontype->status == 1)
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
        </div><!--col-lg-3-->
    </div>

@section("after-scripts")
    <script type="text/javascript">
        //Put your javascript needs in here.
        //Don't forget to put `@`parent exactly after `@`section("after-scripts"),
        //if your create or edit blade contains javascript of its own
        $( document ).ready( function() {
            //Everything in here would execute after the DOM is ready to manipulated.
        });
    </script>
@endsection
