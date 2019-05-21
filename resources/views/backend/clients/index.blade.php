@extends ('backend.layouts.app')
@section ('title', trans('labels.backend.clients.management'))
@section('page-header')
<h1>{{ trans('labels.backend.clients.management') }}</h1>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.clients.management') }}</h3>
        <div class="box-tools pull-right">
            @include('backend.clients.partials.clients-header-buttons')
        </div>
    </div><!--box-header with-border-->
    <div class="box-body">
        <div class="table-responsive data-table-wrapper">
            <table id="clients-table" class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <th>{{ trans('labels.backend.clients.table.client_code') }}</th>
                        <th>{{ trans('labels.backend.clients.table.forename') }}</th>
                        <th>{{ trans('labels.backend.clients.table.surname') }}</th>
                        <th>{{ trans('labels.backend.clients.table.email') }}</th>
                        <th>{{ trans('labels.backend.clients.table.phone') }}</th>
                        <th>{{ trans('labels.backend.clients.table.dob') }}</th>
                        <th>{{ trans('labels.backend.clients.table.age') }}</th>
                        <th>{{ trans('labels.backend.clients.table.clinical_service') }}</th>
                        <th>{{ trans('labels.backend.clients.table.session') }}</th>
                        <th>{{ trans('labels.backend.clients.table.status') }}</th>
                        <th>{{ trans('labels.backend.clients.table.createdat') }}</th>
                        <th>{{ trans('labels.backend.clients.table.createdby') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                </thead>
                <thead class="transparent-bg">
                    <tr>
                        <th>
                            {!! Form::text('client_code', null, ["class" => "search-input-text form-control", "data-column" => 0, "placeholder" => trans('labels.backend.clients.table.client_code')]) !!}
                            <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </th>
                        <th>
                            {!! Form::text('first_name', null, ["class" => "search-input-text form-control", "data-column" => 1, "placeholder" => trans('labels.backend.clients.table.surname')]) !!}
                            <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </th>
                        <th>
                            {!! Form::text('last_name', null, ["class" => "search-input-text form-control", "data-column" => 2, "placeholder" => trans('labels.backend.clients.table.last_name')]) !!}
                            <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </th>
                        <th>
                            {!! Form::text('email', null, ["class" => "search-input-text form-control", "data-column" => 3, "placeholder" => trans('labels.backend.clients.table.email')]) !!}
                            <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </th>
                        <th>
                            {!! Form::text('phone', null, ["class" => "search-input-text form-control", "data-column" => 4, "placeholder" => trans('labels.backend.clients.table.phone')]) !!}
                            <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </th>
                        <th></th>
                        <th>
                            {!! Form::text('age', null, ["class" => "search-input-text form-control", "data-column" => 6, "placeholder" => trans('labels.backend.clients.table.age')]) !!}
                            <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </th>
                        <th>
                            {!! Form::text('services', null, ["class" => "search-input-text form-control", "data-column" => 7, "placeholder" => trans('labels.backend.clients.table.services')]) !!}
                            <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </th>
                         <th>
                        <th>
                            {!! Form::select('status', [0 => "Inactive", 1 => "Active"], null, ["class" => "search-input-select form-control", "data-column" => 8, "placeholder" => trans('labels.backend.clients.table.all')]) !!}
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div><!--table-responsive-->
    </div><!-- /.box-body -->
</div><!--box-->
@endsection
@section('after-scripts')
{{-- For DataTables --}}
{{ Html::script(mix('js/dataTable.js')) }}
<script>
    //Below written line is short form of writing $(document).ready(function() { })
    $(function() {
    var dataTable = $('#clients-table').dataTable({
    processing: true,
            serverSide: true,
            ajax: {
            url: '{{ route("admin.clients.get") }}',
                    type: 'post'
            },
            columns: [
            {data: 'client_code', name: '{{config('access.clients_table')}}.client_code',sortable:true},
            {data: 'first_name', name: '{{config('access.users_table')}}.first_name',sortable:true},
            {data: 'last_name', name: '{{config('access.users_table')}}.last_name'},
            {data: 'email', name: '{{config('access.users_table')}}.email'},
             {data: 'telephone', name: '{{config('access.clients_table')}}.telephone'},
            {data: 'dob', name: '{{config('access.clients_table')}}.dob'},
            {data: 'age', name: '{{config('module.clients.table')}}.age'},
            {data: 'interventionName', name: '{{config('module.interventions_type.table')}}.name',sortable:true},
            {data: 'session', name: '{{config('module.managesessions.table')}}.session_visit'},
            {data: 'status', name: '{{config('module.clients.table')}}.status'},
            {data: 'created_at', name: '{{config('module.clients.table')}}.dob'},
            {data: 'createdBy', name: 'myuser2.first_name'},
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ],
            order: [[0, "desc"]],
            searchDelay: 500,
            dom: 'lBfrtip',
            buttons: {
            buttons: [
            { extend: 'copy', className: 'copyButton', exportOptions: {columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]  }},
            { extend: 'csv', className: 'csvButton', exportOptions: {columns: [ 0,1,2,3,4,5,6,7,8,9,10,11]  }},
            { extend: 'excel', className: 'excelButton', exportOptions: {columns: [0,1,2,3,4,5,6,7,8,9,10,11 ]  }},
            { extend: 'pdf', className: 'pdfButton', exportOptions: {columns: [ 0,1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] },pageSize:'LEGAL',orientation:'landscape'},
            { extend: 'print', className: 'printButton', exportOptions: {columns: [ 0,1,2,3,4,5,6,7,8,9,10,11]  }}
            ]
            }
    });
            Backend.DataTableSearch.init(dataTable);
    });
</script>
@endsection
