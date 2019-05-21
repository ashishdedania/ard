@extends ('backend.layouts.app')
@section ('title', trans('labels.backend.managesessions.management'))
@section('page-header')
<h1>{{ trans('labels.backend.managesessions.management') }}</h1>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.managesessions.management') }}</h3>
        <div class="box-tools pull-right">
            @include('backend.managesessions.partials.managesessions-header-buttons')
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive data-table-wrapper">
            <table id="managesessions-table" class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <th>{{ trans('labels.backend.managesessions.table.client') }}</th>
                        <th>{{ trans('labels.backend.managesessions.table.question_pattern') }}</th>
                        <th>{{ trans('labels.backend.managesessions.table.title') }}</th>
                        <th>{{ trans('labels.backend.managesessions.table.session_date') }}</th>
                        <th>{!! trans('labels.backend.clients.table.intervention_name') !!}</th>
                        <th>{!! trans('labels.backend.managesessions.table.session_visit') !!}
                        <th>{{ trans('labels.backend.managesessions.table.status') }}</th>
                        <th>{{ trans('labels.backend.managesessions.table.createdat') }}</th>
                        <th>{{ trans('labels.backend.managesessions.table.created_by') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <thead class="transparent-bg">
                    <tr>
                         <th>
                            {!! Form::text('first_name', null, ["class" => "search-input-text form-control", "data-column" => 0, "placeholder" => trans('labels.backend.managesessions.table.client')]) !!}
                        </th>
                        <th>
                              {!! Form::select('custom_question_id',array_keys(trans('strings.backend.session_type')), null, ["class" => "search-input-select form-control", "data-column" => 1, "placeholder" => trans('labels.backend.managesessions.table.all')]) !!}
                        </th>
                        <th>
                            {!! Form::text('title', null, ["class" => "search-input-text form-control", "data-column" => 2, "placeholder" => trans('labels.backend.managesessions.table.title')]) !!}
                            <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </th>
                        <th></th>
                        <th>
                             {!! Form::text('interventionName', null, ["class" => "search-input-text form-control", "data-column" => 4, "placeholder" =>  trans('labels.backend.clients.table.intervention_name')]) !!}
                        </th>
                        <th>
                            {!! Form::select('session_visit',array_keys(trans('strings.backend.session_visit')),null,["class" => "search-input-select form-control","data-column" => 5, "placeholder" => trans('labels.backend.managesessions.table.all')]) !!}
                        </th>
                        <th>
                            {!! Form::select('status',array_keys(trans('strings.backend.session_status')), null, ["class" => "search-input-select form-control", "data-column" => 6, "placeholder" => trans('labels.backend.clients.table.all')]) !!}
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
@section('after-scripts')
{{-- For DataTables --}}
{{ Html::script(mix('js/dataTable.js')) }}
<script>
    //Below written line is short form of writing $(document).ready(function() { })
    $(function() {
    var dataTable = $('#managesessions-table').dataTable({
        processing: true,
	    serverSide: true,
	    ajax: {
	    url: '{{ route("admin.managesessions.get") }}',
		    type: 'post'
	    },
	    columns: [
        {data: 'FirstName', name: 'myuser2.first_name'},
        {data: 'custom_question_id', name: '{{config('module.managesessions.table')}}.custom_question_id'},
	    {data: 'title', name: '{{config('module.managesessions.table')}}.title'},
        {data: 'session_date', name: '{{config('module.managesessions.table')}}.session_date'},
        {data: 'interventionsName', name: '{{config('module.interventions_type.table')}}.name'},
        {data: 'session_visit',name:'{{ config('module.managesessions.table')}}.session_visit'},
	    {data: 'status', name: '{{config('module.managesessions.table')}}.status'},
	    {data: 'created_at', name: '{{config('module.managesessions.table')}}.created_at'},
	    {data: 'first_name', name: '{{config('access.users_table')}}.first_name'},
	    {data: 'actions', name: 'actions', searchable: false, sortable: false},
         {data: 'id', name: '{{config('module.managesessions.table')}}.id',visible:false},
	    ],
	    order: [[10, "desc"]],
	    searchDelay: 500,
	    dom: 'lBfrtip',
	    buttons: {
	    buttons: [
	    { extend: 'copy', className: 'copyButton', exportOptions: {columns: [0, 1, 2, 3, 4,5,6,7,8]  }},
	    { extend: 'csv', className: 'csvButton', exportOptions: {columns: [0, 1, 2, 3, 4,5,6,7,8]  }},
	    { extend: 'excel', className: 'excelButton', exportOptions: {columns: [0, 1, 2, 3, 4,5,6,7,8]  }},
	    { extend: 'pdf', className: 'pdfButton', exportOptions: {columns: [0, 1, 2, 3, 4,5,6,7,8]  }},
	    { extend: 'print', className: 'printButton', exportOptions: {columns: [0, 1, 2, 3, 4,5,6,7,8]  }}
	    ]
	    }
    });
    Backend.DataTableSearch.init(dataTable);
    });
</script>
@endsection
