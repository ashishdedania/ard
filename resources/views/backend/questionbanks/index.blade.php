@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.questionbanks.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.questionbanks.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.questionbanks.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.questionbanks.partials.questionbanks-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="questionbanks-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.questionbanks.table.title') }}</th>
                            <th>{{ trans('labels.backend.questionbanks.table.question') }}</th>
                            <th>{{ trans('labels.backend.questionbanks.table.status') }}</th>
                            <th>{{ trans('labels.backend.questionbanks.table.createdat') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>

                            <th>
                                {!! Form::text('questionName', null, ["class" => "search-input-text form-control", "data-column" => 0, "placeholder" => trans('labels.backend.questionbanks.table.title')]) !!}
                                    <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                            </th>
                             <th>
                                {!! Form::text('title', null, ["class" => "search-input-text form-control", "data-column" => 1, "placeholder" => trans('labels.backend.questionbanks.table.question')]) !!}
                                    <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                            </th>
                            <th>
                                {!! Form::select('status', [0 => "InActive", 1 => "Active"], null, ["class" => "search-input-select form-control", "data-column" => 2, "placeholder" => trans('labels.backend.questionbanks.table.all')]) !!}
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
            var dataTable = $('#questionbanks-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.questionbanks.get") }}',
                    type: 'post'
                },
                columns: [
                    {data:'questionName','name':'{{config('module.question_type.table')}}.question_type'},
                    {data: 'question',name:'{{config('module.questions.table')}}.question'},
                    {data:'status',name:'{{config('module.questions.table')}}.status'},
                    {data:"created_at",name: '{{config('module.questions.table')}}.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false},
                    {data: 'id',name:'{{config('module.questions.table')}}.id',visible:false},
                ],
                order: [[5, "desc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
