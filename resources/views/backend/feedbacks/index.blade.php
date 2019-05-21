@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.feedback.management'))

@section('page-header')
<h1>{{ trans('labels.backend.feedback.management') }}</h1>
@endsection

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.feedback.management') }}</h3>

        <div class="box-tools pull-right">
            @include('backend.feedbacks.partials.feedback-header-buttons')
        </div>
    </div><!--box-header with-border-->

    <div class="box-body">
        <div class="table-responsive data-table-wrapper">
            <table id="feedback-table" class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <th>{{ trans('labels.backend.feedback.table.comment') }}</th>
                        <th>{{ trans('labels.backend.feedback.table.comment') }}</th>
                        <th>{{ trans('labels.backend.feedback.table.intervention') }}</th>
                        <th>{{ trans('labels.backend.feedback.table.client') }}</th>
                        <th>{{ trans('labels.backend.feedback.table.rating') }}</th>
                        <th>{{ trans('labels.backend.feedback.table.createdat') }}</th>
                    </tr>
                </thead>
                <thead class="transparent-bg">
                    <tr>
                        <th>
                            {!! Form::text('comment', null, ["class" => "search-input-text form-control", "data-column" => 0, "placeholder" => trans('labels.backend.feedback.table.comment')]) !!}
                        </th>
                        <th>
                            {!! Form::text('intervention', null, ["class" => "search-input-text form-control", "data-column" => 2, "placeholder" => trans('labels.backend.feedback.table.intervention')]) !!}
                        </th>
                        <th>
                            {!! Form::text('client', null, ["class" => "search-input-text form-control", "data-column" => 3, "placeholder" => trans('labels.backend.feedback.table.client')]) !!}
                        </th>
                        <th>
                            {!! Form::text('rating', null, ["class" => "search-input-text form-control", "data-column" => 4, "placeholder" => trans('labels.backend.feedback.table.rating')]) !!}
                        </th>
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
    var dataTable = $('#feedback-table').dataTable({
    processing: true,
            serverSide: true,
            ajax: {
            url: '{{ route("admin.feedback.get") }}',
                    type: 'post'
            },
            columns: [
            {data: 'comment-full', visible: false, name: '{{config('module.feedback.table')}}.comment'},
            {data: 'comment', name: '{{config('module.feedback.table')}}.comment'},
            {data: 'intervention', name: '{{config('module.interventions_type.table')}}.name'},
            {data: 'client', name: '{{config('access.users_table')}}.first_name'},
            {data: 'ratings', name: '{{config('module.feedback.table')}}.ratings'},
            {data: 'created_at', name: '{{config('module.feedback.table')}}.created_at'},
            ],
            order: [[0, "asc"]],
            searchDelay: 500,
            dom: 'lBfrtip',
            buttons: {
            buttons: [
            { extend: 'copy', className: 'copyButton', exportOptions: {columns: [ 0, 2, 3, 4, 5 ]  }},
            { extend: 'csv', className: 'csvButton', exportOptions: {columns: [ 0, 2, 3, 4, 5  ]  }},
            { extend: 'excel', className: 'excelButton', exportOptions: {columns: [ 0, 2, 3, 4, 5 ]  }},
            { extend: 'pdf', className: 'pdfButton', exportOptions: {columns: [ 0, 2, 3, 4, 5 ]  }},
            { extend: 'print', className: 'printButton', exportOptions: {columns: [ 0, 2, 3, 4, 5 ]  }}
            ]
            }
    });
            Backend.DataTableSearch.init(dataTable);
    });
</script>
@endsection
