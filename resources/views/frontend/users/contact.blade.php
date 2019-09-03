<?php include_once 'views/layouts/header.php' ?>
<!--Main container start -->
<div id="main">
    <div class="container" style="max-width: 1220px">
        <div class="row">

            <div class="col-md-10 col-12">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <p id="cont1"> VICTORIA COFFEE </p>
                        <p class="cont6"><i class="fas fa-map-marker-alt"></i> 108 Đường 14, KĐT Himlam, Quận Tây
                            Hồ, TP Hà Nội. </p>
                        <p class="cont6"><i class="fas fa-phone-volume"></i> 024.888.6886. </p>
                        <p class="cont6"><i class="fas fa-envelope"></i> Victoria@gmail.com </p>
                        <a class="cont6" href=""><i class="fas fa-globe"></i> Http://Victoriacoffee.vn </a><br/> <br/>
                        <p class="cont9">Ý kiến của bạn</p> <br/><br/>
                        <div>
                            <?php  if(isset($_SESSION['error'])):?>
                                <div class="alert alert-danger" style="background: red; color: white">
                                    <?php
                                    echo $_SESSION['error'] ;
                                    unset($_SESSION['error'])
                                    ?>

                                </div>
                            <?php  endif; ?>
                            <?php  if(isset($_SESSION['success'])):?>
                                <div class="alert alert-success" style="background: green; color: white">
                                    <?php
                                    echo $_SESSION['success'] ;
                                    unset($_SESSION['success'])
                                    ?>

                                </div>
                            <?php  endif; ?>

                        </div>
                        <form action="" method="post">
                            <label>Họ và tên:</label>
                            <input class="contact" type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"> <br/>
                            <label>Địa chỉ:</label>
                            <input class="contact" type="text" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>"> <br/>
                            <label>Số điện thoại:</label>
                            <input class="contact" type="number" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>"> <br/>
                            <label>Email:</label>
                            <input class="contact" type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"> <br/>
                            <label>Nội dung:</label>
                            <textarea class="contact"  rows="6" name="content"><?php echo isset($_POST['content']) ? $_POST['content'] : '' ?></textarea>
                            <input class="submit1" type="submit" name="submit" value="Gửi"> <br/><br/>
                        </form>
                    </div>

                    <div class="col-md-6 col-12" style="padding-top: 90px">
                        <iframe style="width: 100%; height: 200px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.8493153962604!2d106.45806011480116!3d10.822841292289999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310ad41594229c33%3A0x7ac7ea49fbb02db7!2zQ8OgIHBow6ogVmljdG9yaWE!5e0!3m2!1svi!2s!4v1564196313304!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>

                <br/>
            </div>

            <?php include_once 'views/layouts/sidebar-right.php' ?>

        </div>
    </div>
</div>
<?php include_once 'views/layouts/footer.php' ?>
