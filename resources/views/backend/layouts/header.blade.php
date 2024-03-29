<header class="main-header">
    <!-- Logo -->
    <a href="product" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">Admin</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Victoria</b> Coffee</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <i class="fas fa-bars"></i>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('uploads/' . session()->get('admin.img')) }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ session()->get('admin.username') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('uploads/' . session()->get('admin.img')) }}" class="img-circle" alt="User Image">

                            <p>
                                {{ session()->get('admin.username') }}
                                <small>Tạo ngày {{ date('d-m-Y', strtotime(session()->get('admin.created_at'))) }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{url('admin/admins/detail')}}/{{session()->get('admin.id')}}"
                                   class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{url('admin/logout')}}" class="btn btn-default btn-flat">Sign
                                    out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>