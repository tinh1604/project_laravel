<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('backend/images/avatar.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ session()->get('admin.username') }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">LAOYOUT ADMIN</li>
            <li>
                <a href="{{ url('/admin/index') }}">
                    <i class="fas fa-user-shield"></i> <span> Quản lý Admin</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li >
                <a href="roles">
                    <i class="fas fa-users-cog"></i> <span id="category"> Quản lý quyền</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li id="menu_news">
                <a>
                    <i class="fas fa-newspaper"></i> <span> Quản lý tin tức</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <ul id="list_news">
                <li>
                    <a href="index.php?controller=news&action=index">
                        <i class="fas fa-chevron-circle-right"></i> <span> Nội dung tin tức</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?controller=category&action=index">
                        <i class="fas fa-chevron-circle-right"></i> Danh mục tin tức</span>
                        <span class="pull-right-container"></span>
                    </a>
                </li>
            </ul>

            <li id="menu_sp">
                <a >
                    <i class="fab fa-product-hunt"></i> <span id="category"> Quản lý sản phẩm</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <ul id="list1">
                <li> <a href="{{ url('/admin/product') }}"> <i class="fas fa-chevron-circle-right"></i> Chi tiết sản phẩm</a></li>
                <li> <a href="{{ url('/admin/product_category') }}"><i class="fas fa-chevron-circle-right"></i> Danh mục sản phẩm</a></li>
            </ul>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>