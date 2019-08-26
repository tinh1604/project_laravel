@extends('frontend.layouts.main')
@section('title','chi tiết sản phẩm')
@section('content')
<!--Main container start -->
<div id="main">
    <div class="container" style="max-width: 1220px">
        <div class="row">
            <div class="col-md-10 col-12">
                <div style="padding-top: 20px" id="main2">
                    <a href="thuc-don" class="content19">Thực đơn</a> <br/> <br/>
                    <div class="container">
                        <div class="row">
                            <?php if (!empty($product)): ?>

                            <?php
                            $alias = Helper::alias($product['name']);
                            $id = $product['id'];
                            $urlProduct = "san-pham/$alias/$id";
                            $productCartUrl = "them-gio-hang/$id";
                            ?>
                            <div class="col-md-6 col-12">
                                <img class="img10  hvr-grow" src="../backend/assets/uploads/<?php echo $product['img'] ?>" />
                            </div>
                            <div class="col-md-6 col-12">
                                <h3 style="font-family: 'Times New Roman'; font-weight: bold"><?php echo $product['name']?></h3>
                                <p class="content20"><?php echo $product['english_name']?></p>
                                <p class="content21">Giá : <span class="content22"><?php echo $product['price']?></span></p>
                                <input type="number" name="dathang" value="1" style="width: 80px; text-align: center">
                                <a href="<?php echo $productCartUrl?>" ><button class="cont9"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button></a> <br/><br/>
                                <p style="font-family: 'Times New Roman'; font-size: 16px; text-decoration: underline; font-weight: bold">Miêu tả:</p>
                                <p style="font-family: 'Times New Roman'; font-size: 16px">
                                    <?php echo $product['description']?>
                                </p>
                            </div>
                            <?php endif;?>

                        </div>
                    </div>


                </div>
            </div>


            @include('frontend.layouts.sidebar-right')

        </div>
    </div><br/>
</div>

<p class="content23">CÓ THỂ BẠN THÍCH</p>
<hr id="hr1"> <br/>
<div class="container">
    <div class="row">
        <?php if (!empty($related_products)): ?>
            <?php foreach ($related_products as $value):
                $alias = Helper::alias($value['name']);
                $id = $value['id'];
                $urlProduct = "san-pham/$alias/$id";
                ?>
                <div class="col-md-3 col-12">
                    <div class="block9" class="row">
                        <a href="<?php echo $urlProduct ?>" class="hvr-grow"> <img class="img6" src="../backend/assets/uploads/<?php echo $value['img'] ?>"/>
                        </a>
                        <a class="content12"
                           href="<?php echo $urlProduct ?>"><?php echo $value['name'] ?></a>
                        <p class="content14"><?php echo number_format($value['price'],0,',','.').' VNĐ' ?></p>
                        <a href="<?php echo $urlProduct ?>">
                            <button class="content15"><i class="fas fa-utensils"></i>Chọn món</button>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
</div>
@endsection()
