@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.questionbanks.management') . ' | ' . trans('labels.backend.questionbanks.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.questionbanks.management') }}
        <small>{{ trans('labels.backend.questionbanks.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.questionbanks.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-questionbank']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.questionbanks.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.questionbanks.partials.questionbanks-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
                    {{-- Including Form blade file --}}
                    @include("backend.questionbanks.form")
                    <div class="edit-form-btn">
                        {{ link_to_route('admin.questionbanks.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
        </div><!--box box-success-->
    {{ Form::close() }}
@endsection
