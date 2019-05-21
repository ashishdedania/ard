@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.feedback.management'))

@section('page-header')
<h1>{{ trans('labels.frontend.Feedback.management') }}</h1>
@endsection

@section('content')
<div class="box box-info feedback-session">
         <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.frontend.Feedback.message') }}</h3>
        </div><!--box-header with-border-->
    <div class="row" >
      <div class="col-sm-6 feedback-main-section">
        @if(!empty($interventionType))
        @php
        $i = 0
        @endphp

         @foreach ($interventionType as $interventionKey => $interventionVal)

         <div class="card card-1 feeback-card text-center">
            @if($intervention_client_status[$i] == "1")

             <a id="intervention" href="{!! route('admin.feedback.add.feedback',array_values($interventionVal)[0]) !!}">{{key($interventionVal)}} </a>
            @else
             <a name="alert_feedback" href="{!! route('admin.feedback.add.feedback',array_values($interventionVal)[0]) !!}">{{key($interventionVal)}}</a>
             @endif


        </div>
        @php
        $i++
        @endphp
        @endforeach
        @endif
    </div>
    </div>
</div>


@section("after-scripts")
<script type="text/javascript">

</script>
@endsection
@endsection

