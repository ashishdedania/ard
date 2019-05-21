@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.questiontypes.management') . ' | ' . trans('labels.backend.questiontypes.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.questiontypes.management') }}
        <small>{{ trans('labels.backend.questiontypes.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.questiontypes.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-questiontype']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.questiontypes.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.questiontypes.partials.questiontypes-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.questiontypes.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.questiontypes.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection
