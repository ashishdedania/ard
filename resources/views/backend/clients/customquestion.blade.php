@extends ('backend.layouts.app')
@if (!empty($customquestion))
@section ('title','Subjective Questions'. ' | ' . 'Update Question')
@else
@section ('title', trans('labels.backend.clients.custom-question') . ' | ' . trans('labels.backend.clients.create'))
@endif
@section('page-header')
<h1>
    @if (!empty($customquestion)) Subjective Questions @else {{ trans('labels.backend.clients.custom-question') }} @endif
    <small> @if (!empty($customquestion)) Subjective Questions @else {{ trans('labels.backend.clients.custom-question') }} @endif</small>
</h1>
@endsection
@section('content')
{{ Form::model($client, ['route' => ['admin.clients.store.question', $client], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-client']) }}
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"> @if (!empty($customquestion)) Subjective Questions @else {{ trans('labels.backend.clients.custom-question') }} @endif</h3>
        &nbsp;
        &nbsp;
        <div class="box-tools pull-right">
            @include('backend.clients.partials.clients-header-buttons')
        </div>
    </div>
    @if (!empty($customquestion))
    @php $queId = [];  @endphp
    @foreach ($customquestion as $questions)
    @endforeach
    @endif
    <div class="box-body">
        <div class="form-group">
            <div class="box-body">
                <div class="row">
                @php $j=0;@endphp
                @for($i=1;$i<=10;$i++)
                <div class="form-group col-sm-6">
                    {{ Form::label(null,null, ['class' => 'col-lg-1 control-label']) }}
                    <div class="col-lg-8">
                        @if (!empty($customquestion))
                        {{ Form::text('question_name[]',isset($customquestion[$j]) ? $customquestion[$j]->question_name : null, ['class' => 'form-control box-size', 'placeholder' => 'Question ' . $i]) }}
                        @else
                        {{ Form::text('question_name[]',null, ['class' => 'form-control box-size', 'placeholder' => "Question " . $i]) }}
                        @endif
                    </div>
                </div>
                <input type="hidden" name="queId[]" value="@if(isset($question[$j])) {{ $question[$j]['id'] }} @else @endif">
                @php $j++;@endphp
                @endfor
            </div>
            <div class="edit-form-btn">
                {{ link_to_route('admin.clients.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                @if(!empty($customquestion))
                <input type="hidden" name="queFlag"  value="1">
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                @else
                <input type="hidden" name="queFlag"  value="0">
                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                @endif
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
@section("after-scripts")
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#add-more').on('click', function (event) {
            event.preventDefault();
            $("#clone").clone().insertAfter("div.form-group:last").find("input").val("");
        });
    });
</script>
@endsection
@endsection