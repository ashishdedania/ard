@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.psycologicalconditiontypes.management') . ' | ' . trans('labels.backend.psycologicalconditiontypes.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.psycologicalconditiontypes.management') }}
        <small>{{ trans('labels.backend.psycologicalconditiontypes.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($psycologicalconditiontype, ['route' => ['admin.psycologicalconditiontypes.update', $psycologicalconditiontype], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'edit-psycologicalconditiontype']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.psycologicalconditiontypes.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.psycologicalconditiontypes.partials.psycologicalconditiontypes-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.psycologicalconditiontypes.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.psycologicalconditiontypes.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!--form-group-->
            </div><!--box-body-->
        </div><!--box box-success -->
    {{ Form::close() }}
@endsection
