@extends ('backend.layouts.app')
@section ('title', trans('labels.frontend.managesessions.view-question'))
@section('page-header')
<h1>{{ trans('labels.frontend.managesessions.view-question') }}</h1>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.frontend.managesessions.view-question') }}</h3>
    </div>
    <div class="box-body">
        <div class="form-group">
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <th>Sr.No</th>
                    <th>Question Name</th>
                    <th>Option</th>
                    @if(access()->user()->roles()->first()->id != env('CLIENT_ROLE_ID') && $type != 'Subjective')<th>Score</th>@endif
                    </thead>
                    <tbody>
                        @if ($type == 'Subjective')
                        @foreach ($questionAns as $key => $questionAns)
                        @if ($questionAns->question_name != null)
                        <tr>
                            <td>{!! ++$key !!}</td>
                            <td>{!! $questionAns->question_name !!}</td>
                            <td>{!! $questionAns->options !!}</td>
                        </tr>
                        @endif
                        @endforeach
                        @else
                        @foreach ($questionAns as $key => $questionAns)
                        <tr>
                            <td>{!! ++$key !!}</td>
                            <td>{!! $questionAns['question'] !!}</td>
                            <td>{!! $questionAns['option'] !!}</td>
                              @if(access()->user()->roles()->first()->id != env('CLIENT_ROLE_ID') &&  $type != 'Subjective')
                                <td>{!! $questionAns['marks'] !!}</td>
                             @endif
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <div class="edit-form-btn">
                     <a href="{!! url()->previous() !!}" class="btn btn-danger btn-md">Back</a>
                     <a href="{!! route('admin.managesessions.export.question',[$type,$sessionId]) !!}" class="btn btn-primary btn-md">Export</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
