<!--Action Button-->
<div class="btn-group">
    <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">Action
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ route( 'admin.outdoorcollection.index' ) }}">
                <i class="fa fa-list-ul"></i>All Indoor/Outdoor
            </a>
        </li>
        @permission( 'create-knowledgebase' )
        <li>
            <a href="{{ route( 'admin.outdoorcollection.create' ) }}">
                <i class="fa fa-plus"></i> Create Indoor/Outdoor
            </a>
        </li>
        @endauth
    </ul>
</div>
<div class="clearfix"></div>
