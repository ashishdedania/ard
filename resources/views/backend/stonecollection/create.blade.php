@extends ('backend.layouts.app')
@section ('title', 'Stone Collection')
@section('page-header')
<h1>
    Collection
    <small></small>
</h1>
@endsection

@section('content')
{{ Form::open(['route' => 'admin.stonecollection.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-stonecollection','files' => true]) }}

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Collection Create</h3>

        <div class="box-tools pull-right">
            @include('backend.stonecollection.partials.stonecollection-header-buttons')
        </div><!--box-tools pull-right-->
    </div><!--box-header with-border-->

    <div class="box-body">
        <div class="form-group">
            {{-- Including Form blade file --}}
            @include("backend.stonecollection.form")
            <div class="edit-form-btn">
                {{ link_to_route('admin.stonecollection.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                <div class="clearfix"></div>
            </div><!--edit-form-btn-->
        </div><!-- form-group -->
    </div><!--box-body-->
</div><!--box box-success-->
{{ Form::close() }}
@endsection
