@extends ('backend.layouts.app')
@section ('title', 'Sub Stone Collection')
@section('page-header')
<h1>Sub Stone Collection</h1>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Sub Stone Collection</h3>
        <div class="box-tools pull-right">
            @include('backend.substonecollection.partials.stonecollection-header-buttons')
        </div>
    </div><!--box-header with-border-->
    <div class="box-body">
        <div class="table-responsive data-table-wrapper">
            <table id="substonecollection-table" class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Actions</th>
                        <th></th>
                    </tr>
                </thead>
                <thead class="transparent-bg">
                    <tr>
                        <th>
                            
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
    var dataTable = $('#substonecollection-table').dataTable({
    processing: true,
            serverSide: true,
            ajax: {
            url: '{{ route("admin.substonecollection.get") }}',
                    type: 'post'
            },
            columns: [
            {data: 'title', name: 'sub_stone_collection.title'},
            {data: 'created_at', name: 'sub_stone_collection.created_at'},
            {data: 'actions', name: 'actions', searchable: false, sortable: false},
            {data: 'id', name: 'sub_stone_collection.id',visible:false},
            ],
            order: [[2, "desc"]],
            searchDelay: 500,
            dom: 'lBfrtip',
            buttons: {
            
            }
    });
            Backend.DataTableSearch.init(dataTable);
    });</script>


@endsection
