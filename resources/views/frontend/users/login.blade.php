<?php include_once 'views/layouts/header.php' ?>
<!--Main container start -->
<div id="main">
    <div class="container" style="max-width: 1220px">
        <div class="row">

            <div class="col-md-10 col-12">
                <p class="cont12">Xin mời bạn đăng nhập!</p>
                <div style=" width: 50%; margin: 5px auto">
                    <?php  if(isset($_SESSION['error'])):?>
                        <div class="alert alert-danger" style="background: red; color: white; text-align: center">
                            <?php
                            echo $_SESSION['error'] ;
                            unset($_SESSION['error'])
                            ?>

                        </div>
                    <?php  endif; ?>
                </div>
                <form action="" method="post" id="dangki">
                    <input class="dangki2" type="email" name="email" placeholder="Email đăng nhập" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>">
                    <input class="dangki2" type="password" name="password" placeholder="Mật khẩu đăng nhập" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''?>">
                    <input class="submit1" type="submit" name="submit" value="Đăng nhập"> <br/>
                </form>


                <br/>
            </div>


            <?php include_once 'views/layouts/sidebar-right.php' ?>

        </div>
    </div><br/>
</div>


<?php include_once 'views/layouts/footer.php' ?>

