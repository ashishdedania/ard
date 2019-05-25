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

            <li class="{{ active_class(Active::checkUriPattern('logout')) }}">
                <a href="{{ route('frontend.auth.logout') }}">
                    <i class="fa fa-window-close"></i>
                    <span>Logout</span>
                </a>
            </li>


            
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>s