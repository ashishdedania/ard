@extends ('backend.layouts.app')
@section ('title', 'Sub Stone Collection')
@section('page-header')
<h1>
    Sub Stone Collection
    <small></small>
</h1>
@endsection

@section('content')
{{ Form::model($stonecollection, ['route' => ['admin.substonecollection.update',$stonecollection->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-knowledgebase', 'files' => true]) }}

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Stone Collection Edit</h3>
        <div class="box-tools pull-right">
            @include('backend.substonecollection.partials.stonecollection-header-buttons')
        </div>
    </div>
    <div class="box-body">
        <div class="form-group">
            {{-- Including Form blade file --}}
            @include("backend.substonecollection.form")
            <div class="edit-form-btn">
                {{ link_to_route('admin.substonecollection.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<!-- End Modal-box for file download -->
{{ Form::close() }}
@endsection
