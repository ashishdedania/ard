@extends ('backend.layouts.app')
@section ('title', trans('labels.backend.knowledgebases.management'))
@section('page-header')
<h1>{{ trans('labels.backend.knowledgebases.management') }}</h1>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Stone Collection</h3>
        <div class="box-tools pull-right">
            @include('backend.stonecollection.partials.stonecollection-header-buttons')
        </div>
    </div><!--box-header with-border-->
    <div class="box-body">
        <div class="table-responsive data-table-wrapper">
            <table id="knowledgebases-table" class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <th>{{ trans('labels.backend.knowledgebases.table.title') }}</th>
                        <th>{{ trans('labels.backend.knowledgebases.table.createdat') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <thead class="transparent-bg">
                    <tr>
                        <th>
                            {!! Form::text('title', null, ["class" => "search-input-text form-control", "data-column" => 0, "placeholder" => trans('labels.backend.knowledgebases.table.title')]) !!}
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
    var dataTable = $('#knowledgebases-table').dataTable({
    processing: true,
            serverSide: true,
            ajax: {
            url: '{{ route("admin.stonecollection.get") }}',
                    type: 'post'
            },
            columns: [
            {data: 'title', name: '{{config('module.knowledgebases.table')}}.title'},
            {data: 'created_at', name: '{{config('module.knowledgebases.table')}}.created_at'},
            {data: 'actions', name: 'actions', searchable: false, sortable: false},
            {data: 'id', name: '{{config('module.knowledgebases.table')}}.id',visible:false},
            ],
            order: [[2, "desc"]],
            searchDelay: 500,
            dom: 'lBfrtip',
            buttons: {
            buttons: [
            { extend: 'copy', className: 'copyButton', filename : 'knowledgebases', exportOptions: {columns: [0, 1, 2, 3, 4, 5]  }},
            { extend: 'csv', className: 'csvButton', filename : 'knowledgebases', exportOptions: {columns: [0, 1, 2, 3, 4, 5]  }},
            { extend: 'excel', className: 'excelButton', filename : 'knowledgebases', exportOptions: {columns: [0, 1, 2, 3, 4, 5]  }},
            { extend: 'pdf', className: 'pdfButton', exportOptions: {columns: [0, 1, 2, 3, 4, 5]  }},
            { extend: 'print', className: 'printButton', filename : 'knowledgebases', exportOptions: {columns: [0, 1, 2, 3, 4, 5]  }},
            ]
            }
    });
            Backend.DataTableSearch.init(dataTable);
    });</script>


@endsection
