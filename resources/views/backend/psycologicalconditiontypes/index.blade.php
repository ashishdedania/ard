@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.psycologicalconditiontypes.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.psycologicalconditiontypes.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.psycologicalconditiontypes.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.psycologicalconditiontypes.partials.psycologicalconditiontypes-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="psycologicalconditiontypes-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.psycologicalconditiontypes.table.title') }}</th>
                            <th>{{ trans('labels.backend.psycologicalconditiontypes.table.status') }}</th>
                            <th>{{ trans('labels.backend.psycologicalconditiontypes.table.created_by') }}</th>
                            <th>{{ trans('labels.backend.psycologicalconditiontypes.table.createdat') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>
                            <th>
                                {!! Form::text('title', null, ["class" => "search-input-text form-control", "data-column" => 0, "placeholder" => trans('labels.backend.psycologicalconditiontypes.table.title')]) !!}
                                    <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                            </th>
                            <th>
                                {!! Form::select('status', [0 => "InActive", 1 => "Active"], null, ["class" => "search-input-select form-control", "data-column" => 1, "placeholder" => trans('labels.backend.psycologicalconditiontypes.table.all')]) !!}
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
            var dataTable = $('#psycologicalconditiontypes-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.psycologicalconditiontypes.get") }}',
                    type: 'post'
                },
                columns: [
                   {data: 'name', name: '{{config('module.psycologicalconditiontypes.table')}}.name'},
                    {data: 'status', name: '{{config('module.psycologicalconditiontypes.table')}}.status'},
                    {data: 'created_by', name: '{{config('module.psycologicalconditiontypes.table')}}.created_by'},
                    {data:"created_at" ,name: '{{config('module.psycologicalconditiontypes.table')}}.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}  
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2, 3]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2, 3 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
