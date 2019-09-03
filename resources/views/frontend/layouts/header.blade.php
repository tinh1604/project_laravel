

<div id="block1">
    <div id="header" style="background: none">
        <!--    <div id="header">-->
        <ul id="menu1">
            <li style="<?php echo isset($_SESSION['user']) ? 'display: none' : '' ?>"><a href="{{url('login')}}" class="hvr-shrink">Đăng nhập</a></li>
            <li style="<?php echo isset($_SESSION['user']) ? 'display: none' : '' ?>"><a href="{{url('create_account')}}" class="hvr-shrink">Đăng kí</a></li>
            <?php if (isset($_SESSION['user'])) : ?>
                <ul class="user_login" >
                    <li>
                        <img src="assets/imgs/avatar.jpg" class="img_user" alt="User Image">

                        <p class="user_header">
                            Nguyễn Thanh Tình
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li >
                        <div class="pull-left">
                            <a href="index.php?controller=admin&action=detail&id=<?php echo $_SESSION['admin']['id']; ?>"
                               class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-left">
                            <a href="index.php?controller=admin&action=detail&id=<?php echo $_SESSION['admin']['id']; ?>"
                               class="btn btn-default btn-flat">Đơn hàng</a>
                        </div>
                        <div class="pull-right">
                            <a href="logout" class="btn btn-default btn-flat" onclick="return confirm('Đăng xuất?')">Sign out</a>
                        </div>
                    </li>
                </ul>
            <?php endif; ?>
        </ul>


        <img id="img1" src="{{ asset('frontend/imgs/logo3.jpg') }}"/> <br/>
        <p id="navbar">
            <i class="fas fa-bars" ></i>
        </p>
        <div id="menu_2">
        <ul id="menu2">
                <li><a href="{{'index'}}" class="hvr-float-shadow">Trang chủ</a></li>
                <li><a href="gioi-thieu" class="hvr-float-shadow">Giới thiệu</a></li>
                <li id="menu5" onclick="myfunction()"><a class="hvr-float-shadow">Thực đơn <i class="fas fa-sort-down"> </i></a>
                    <ul id="submenu">
                        <li><a href="breakfast">Điểm tâm sáng</a></li>
                        <li><a href="lunch">Món chính</a></li>
                        <li><a href="drink">Thức uống</a></li>
                        <li><a href="booze">Rượu</a></li>
                    </ul>
                </li>
                <li><a href="dich-vu" class="hvr-float-shadow">Dịch vụ</a></li>
                <li><a href="lien-he" class="hvr-float-shadow">Liên hệ</a></li>
        </ul>
        </div>
        <div id="menu4" class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                </div>
                <div class="col-md-4 col-12">
                    <p id="content1">Have A Sweet Time!</p>
                    <p id="content2">GOOD coffee</p>
                </div>
                <ul id="menu3" class="col-md-2 col-4">
                    <p id="content3">Thực đơn chính</p>
                    <li>
                        <a href="diem-tam-sang" class="hvr-forward"><i class="fas fa-hamburger"></i> Điểm tâm sáng</a>
                        <br/>
                    </li>
                    <li>
                        <a href="mon-chinh" class="hvr-forward"><i class="fas fa-utensils"></i> Cơm trưa</a> <br/>

                    </li>
                    <li>
                        <a href="thuc-uong" class="hvr-forward"><i class="fas fa-coffee"></i> Thức uống</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
