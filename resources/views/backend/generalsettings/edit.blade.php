@extends ('backend.layouts.app')
@section ('title', 'Outdoor Slider Image')
@section('page-header')
<h1>
    General Settings
    <small></small>
</h1>
@endsection

@section('content')
{{ Form::model($stonecollection, ['route' => ['admin.generalsettings.update',1], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-knowledgebase', 'files' => true]) }}

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">General Settings</h3>
        <div class="box-tools pull-right">
           
        </div>
    </div>
    <div class="box-body">
        <div class="form-group">
            {{-- Including Form blade file --}}
            @include("backend.generalsettings.form")
            <div class="edit-form-btn">
                
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<!-- End Modal-box for file download -->
{{ Form::close() }}
@endsection
