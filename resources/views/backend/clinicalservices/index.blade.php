@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.clinicalservices.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.clinicalservices.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.clinicalservices.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.clinicalservices.partials.clinicalservices-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="clinicalservices-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                       <tr>
                            <th>{{ trans('labels.backend.clinicalservices.table.title') }}</th>
                            <th>{{ trans('labels.backend.clinicalservices.table.status') }}</th>
                            <th>{{ trans('labels.backend.clinicalservices.table.createdby') }}</th>
                            <th>{{ trans('labels.backend.clinicalservices.table.createdat') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>
                            <th>
                                {!! Form::text('title', null, ["class" => "search-input-text form-control", "data-column" => 0, "placeholder" => trans('labels.backend.clinicalservices.table.title')]) !!}
                                    <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                            </th>
                            <th>
                                {!! Form::select('status', [0 => "InActive", 1 => "Active"], null, ["class" => "search-input-select form-control", "data-column" => 1, "placeholder" => trans('labels.backend.clinicalservices.table.all')]) !!}
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
            var dataTable = $('#clinicalservices-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.clinicalservices.get") }}',
                    type: 'post'
                },
                columns: [
                     {data: 'name', name: '{{config('module.clinicalservices.table')}}.name'},
                    {data: 'status', name: '{{config('module.clinicalservices.table')}}.status'},
                    {data: 'created_by', name: '{{config('module.clinicalservices.table')}}.created_by'},
                    {data: 'created_at', name: '{{config('module.clinicalservices.table')}}.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
