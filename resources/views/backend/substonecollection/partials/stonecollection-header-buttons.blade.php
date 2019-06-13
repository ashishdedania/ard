<!--Action Button-->
<div class="btn-group">
    <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown">Action
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ route( 'admin.substonecollection.index' ) }}">
                <i class="fa fa-list-ul"></i>All Sub Collection
            </a>
        </li>
        @permission( 'create-knowledgebase' )
        <li>
            <a href="{{ route( 'admin.substonecollection.create' ) }}">
                <i class="fa fa-plus"></i> Create Sub Collection
            </a>
        </li>
        @endauth
    </ul>
</div>
<div class="clearfix"></div>
