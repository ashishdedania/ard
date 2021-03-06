<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            
            <li class="{{ active_class(Active::checkUriPattern('admin/dashboard')) }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ trans('menus.backend.sidebar.dashboard') }}</span>
                </a>
            </li>
            
            <!-- <li class="{{ active_class(Active::checkUriPattern('admin/profile/edit')) }}">
                <a href="{{ route('admin.profile.edit') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Edit Profile</span>
                </a>
            </li> -->

            <li class="{{ active_class(Active::checkUriPattern('admin/client/change/password?1')) }}">
                <a href="{{ route('admin.client.change.password',[access()->user()->id]) }}">
                    <i class="fa fa-book"></i>
                    <span>Change Password</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/pages*')) }}">
                <a href="{{ route('admin.pages.index') }}">
                    <i class="fa fa-file-text"></i>
                    <span>{{ trans('labels.backend.pages.title') }}</span>
                </a>
            </li>

            

            <li class="{{ active_class(Active::checkUriPattern('admin/stonecollection*')) }}">
                <a href="{{ route('admin.stonecollection.index') }}">
                    <i class="fa fa-file-text"></i>
                    <span>Collection</span>
                </a>
            </li>
            
             <li class="{{ active_class(Active::checkUriPattern('admin/collectionimage*')) }}">
                <a href="{{ route('admin.collectionimage.index') }}">
                    <i class="fa fa-file-text"></i>
                    <span>Collection Slider Image</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/substonecollection*')) }}">
                <a href="{{ route('admin.substonecollection.index') }}">
                    <i class="fa fa-file-text"></i>
                    <span>Sub Collection</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/stoneproduct*')) }}">
                <a href="{{ route('admin.stoneproduct.index') }}">
                    <i class="fa fa-file-text"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/outdoorcollection*')) }}">
                <a href="{{ route('admin.outdoorcollection.index') }}">
                    <i class="fa fa-file-text"></i>
                    <span>Indoor/Outdoor</span>
                </a>
            </li>
            

            <li class="{{ active_class(Active::checkUriPattern('admin/indoorimages*')) }}">
                <a href="{{ route('admin.indoorimages.index') }}">
                    <i class="fa fa-file-text"></i>
                    <span>Indoor/Outdoor Items</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/indoorcollectionimage*')) }}">
                <a href="{{ route('admin.indoorcollectionimage.index') }}">
                    <i class="fa fa-file-text"></i>
                    <span>Indoor Slider Image</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('admin/outdoorimage*')) }}">
                <a href="{{ route('admin.outdoorimage.index') }}">
                    <i class="fa fa-file-text"></i>
                    <span>Outdoor Slider Image</span>
                </a>
            </li>

           
            <li class="{{ active_class(Active::checkUriPattern('admin/generalsettings*')) }}">
                <a href="{{ route('admin.generalsettings.index') }}">
                    <i class="fa fa-file-text"></i>
                    <span>General Settings</span>
                </a>
            </li>

            <li class="{{ active_class(Active::checkUriPattern('logout')) }}">
                <a href="{{ route('frontend.auth.logout') }}">
                    <i class="fa fa-window-close"></i>
                    <span>Logout</span>
                </a>
            </li>


            
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>s