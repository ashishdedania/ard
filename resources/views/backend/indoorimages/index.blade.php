@extends ('backend.layouts.app')
@section ('title', 'Indoor / Outdoor Images')
@section('page-header')
<h1>Indoor / Outdoor Item</h1>
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Indoor / Outdoor Item</h3>
        <div class="box-tools pull-right">
            @include('backend.indoorimages.partials.stonecollection-header-buttons')
        </div>
    </div><!--box-header with-border-->
    <div class="box-body">
        <div class="table-responsive data-table-wrapper">
            <table id="indoorimages-table" class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Actions</th>
                        <th></th>
                    </tr>
                </thead>
                <thead class="transparent-bg">
                    <tr>
                        <th>
                            
                        </th>
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
    var dataTable = $('#indoorimages-table').dataTable({
    processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("admin.indoorimages.get") }}',
                type: 'post',
                
            },
            columns: [
            {data: 'title', name: 'indoor_images.title'},
            {data: 'category', name: 'indoor_images.category'},
            {data: 'created_at', name: 'indoor_images.created_at'},
            {data: 'actions', name: 'actions', searchable: false, sortable: false},
            {data: 'id', name: 'indoor_images.id',visible:false},
            ],
            order: [[2, "desc"]],
            searchDelay: 500,
            dom: 'lBfrtip',
            buttons: {
            
            }
    });
            //Backend.DataTableSearch.init(dataTable);
    });</script>


@endsection
