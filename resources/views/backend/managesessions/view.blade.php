@extends ('backend.layouts.app')
@section ('title', trans('labels.backend.managesessions.view'))
@section('page-header')
<h1>{{ trans('labels.backend.managesessions.view') }}</h1>
@endsection
@section('content')
<form action="#" class="form-horizontal" method="POST">
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                @include("backend.managesessions.view_form")
                <div class="edit-form-btn">
                    <a href="{!! url()->previous() !!}" class="btn btn-danger btn-md">Back</a>
                    <a href="{!! route('admin.managesessions.export.question',[$type,$managesession['id']]) !!}" class="btn btn-primary btn-md">Export</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection