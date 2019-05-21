@extends ('backend.layouts.app')
@section ('title', trans('labels.backend.knowledgebases.management'))
@section('page-header')
<h1>{{ trans('labels.backend.knowledgebases.management') }}</h1>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('labels.backend.knowledgebases.management') }}</h3>
        <div class="box-tools pull-right">
            @include('backend.knowledgebases.partials.knowledgebases-header-buttons')
        </div>
    </div><!--box-header with-border-->
    <div class="box-body">
        <div class="table-responsive data-table-wrapper">
            <table id="knowledgebases-table" class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <th>{{ trans('labels.backend.knowledgebases.table.title') }}</th>
                        <th>{{ trans('labels.backend.knowledgebases.table.avg_rating') }}</th>
                        <th>{{ trans('labels.backend.knowledgebases.table.status') }}</th>
                        <th>{{ trans('labels.backend.knowledgebases.table.createdat') }}</th>
                        <th>{{ trans('labels.backend.knowledgebases.table.created_by') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <thead class="transparent-bg">
                    <tr>
                        <th>
                            {!! Form::text('title', null, ["class" => "search-input-text form-control", "data-column" => 0, "placeholder" => trans('labels.backend.knowledgebases.table.title')]) !!}
                        </th>
                        <th>
                            {!! Form::text('average_rating', null, ["class" => "search-input-text form-control", "data-column" => 3, "placeholder" => trans('labels.backend.knowledgebases.table.avg_rating')]) !!}
                        </th>
                        <th>
                            {!! Form::select('status', [0 => "Inactive", 1 => "Active"], null, ["class" => "search-input-select form-control", "data-column" => 2, "placeholder" => trans('labels.backend.clients.table.all')]) !!}
                        </th>
                        <th></th>
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
            url: '{{ route("admin.knowledgebases.get") }}',
                    type: 'post'
            },
            columns: [
            {data: 'title', name: '{{config('module.knowledgebases.table')}}.title'},
            {data: 'average_rating', name: '{{config('module.knowledgebases.table')}}.average_rating'},
            {data: 'status', name: '{{config('module.knowledgebases.table')}}.status'},
            {data: 'created_at', name: '{{config('module.knowledgebases.table')}}.created_at'},
            {data: 'first_name', name: '{{config('access.users_table')}}.first_name'},
            {data: 'actions', name: 'actions', searchable: false, sortable: false},
            {data: 'id', name: '{{config('module.knowledgebases.table')}}.id',visible:false},
            ],
            order: [[6, "desc"]],
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
<script type="text/javascript">
            jQuery(document).ready(function(){
    jQuery(document).on('click', '.ratings', function(event){
    event.preventDefault();
            var knowledgebaseId = jQuery(this).attr("data-id");
            //ajax call
            var result = AJAX.sendRequest("{{route('admin.knowledgebases.customer.ratings')}}", "POST", {"knowledgebaseId": knowledgebaseId}, function (response) {
            $('#dataModals').empty();
                    $('#dataModals').html(response);
            });
    });
    });
</script>

@endsection
<!--  Modal-box for file download -->

<div class="modal fade" id="knowledgebasesFiles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ratings of Customers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="dataModals">
                @include('backend.knowledgebases.customermodal')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal-box for file download -->