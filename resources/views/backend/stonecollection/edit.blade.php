@extends ('backend.layouts.app')
@section ('title', trans('labels.backend.knowledgebases.management') . ' | ' . trans('labels.backend.knowledgebases.edit'))
@section('page-header')
<h1>
    {{ trans('labels.backend.knowledgebases.management') }}
    <small>{{ trans('labels.backend.knowledgebases.edit') }}</small>
</h1>
@endsection
@section('content')
{{ Form::model($knowledgebase, ['route' => ['admin.knowledgebases.update',$knowledgebase], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-knowledgebase', 'files' => true]) }}
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Stone Collection Edit</h3>
        <div class="box-tools pull-right">
            @include('backend.stonecollection.partials.stonecollection-header-buttons')
        </div>
    </div>
    <div class="box-body">
        <div class="form-group">
            {{-- Including Form blade file --}}
            @include("backend.knowledgebases.form")
            <div class="edit-form-btn">
                {{ link_to_route('admin.knowledgebases.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!--  Modal-box for file download -->
<div class="modal fade" id="knowledgebasesFiles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">KnowledgeBase Files</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="dataModals">
                @include('backend.knowledgebases.files')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
            </div>
        </div>
    </div>
</div>
<!-- End Modal-box for file download -->
{{ Form::close() }}
@endsection
