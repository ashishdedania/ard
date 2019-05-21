@extends ('backend.layouts.app')
@section ('title', trans('labels.backend.clients.profile') . ' | ' . trans('labels.backend.clients.profile'))
@section('page-header')
<h1>
    {{ trans('labels.backend.clients.profile') }}
</h1>
@endsection
@section('content')
{{ Form::model($logged_in_user, ['route' => 'admin.client.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) }}
@if (!empty($client))
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"> {{ trans('labels.backend.clients.profile') }}</h3>
    </div>
    <div class="box-body">
        <div class="panel-body">
            <div role="tabpanel">
{{--                 <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active" id="li-profile">
                        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" class="tabs">Account Information</a>
                    </li>

                {{--     <li role="presentation" id="li-edit">
                        <a href="#edit" aria-controls="edit" role="tab" data-toggle="tab" class="tabs">Other Information</a>
                    </li> --}}
                {{-- </ul> --}}
                {{-- <div role="tabpanel" class="tab-pane mt-30 active" id="profile"> --}}
                    <div class="form-group">
                        {{ Form::label('first_name', trans('validation.attributes.frontend.register-user.firstName'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::input('text', 'first_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('last_name', trans('validation.attributes.frontend.register-user.lastName'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::input('text', 'last_name', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', trans('labels.backend.clients.table.email'), ['class' => 'col-lg-2 control-label required']) }}
                        <div class="col-lg-10">
                            {{ Form::input('email', 'email', isset($getUser) ? $getUser['email'] : null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.frontend.register-user.email'),'autocomplete' => 'off']) }}
                        </div>
                    </div>
                {{-- </div> --}}
                    <div class="form-group">
                        <div class="col-lg-10 col-md-offset-4">
                            {{ Form::submit(trans('labels.general.buttons.update'), ['class' => 'btn btn-primary', 'id' => 'update-profile']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
{{ Form::close() }}
@endsection
@section("after-scripts")
<script type="text/javascript">
    jQuery('#edit').hide();
</script>
@endsection
