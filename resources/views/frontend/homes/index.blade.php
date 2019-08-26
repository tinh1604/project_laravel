@extends('frontend.layouts.main')
@section('title','Trang chủ')
@section('content')
    <div id="main">
        <?php
        ?>
        <div class="container" style="max-width: 1220px">
            <div class="row">

                <div class="col-md-10 col-12">
                    <div id="main1" >
                        <p id="content8">Giới thiệu</p>
                        <p id="content16">Về Victoria Coffee</p>
                        <div class="container">
                            <div class="row" style="border-bottom: #e9d8a4 1px solid;">
                                <div class="col-md-2 col-12">
                                    <img id="img2" src="{{ asset('frontend/imgs/img12.jpg') }}"/>
                                </div>
                                <div class="col-md-10 col-12">
                                    <a id="content9" href="">
                                        Nằm ở ngay khu đô thị sầm uất Himlam, nhưng Victoria Coffee vẫn giữ nguyên những
                                        giá trị của một
                                        quán cà phê yên bình, chốn nghỉ ngơi cho những tâm hồn cần lắm một ngày lánh xa
                                        mệt mỏi. Ngay từ
                                        cái tên cũng chất chứa nét nhẹ nhàng, thanh tao...
                                    </a>
                                    <a id="content17" href="">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br/>

                    <div id="main2">
                        <p style="display: block; margin:  20px auto" class="content10">Menu nổi bật</p>

                        <div class="container">

                            <div class="row">
                                @if (!empty($product))
                                @foreach ($product as $value)
                                <div class="col-md-3 col-12">
                                    <div class="block8" class="row">
                                        <a href="" class="hvr-grow"> <img class="img6" src="{{ asset('uploads/' . $value['img']) }}"/>
                                        </a>
                                        <a class="content12"
                                           href="">{{$value['name']}}</a>
                                        <p class="content14">{{number_format($value['price'],0,',','.').' VNĐ'}}</p>
                                        <a href="">
                                            <button class="content15" ><i class="fas fa-utensils"></i>&nbsp Chọn món</button>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                            </div>

                        </div>

                    </div> <br/>
                </div>
                @include('frontend.layouts.sidebar-right')

            </div>
        </div>
    </div>
@endsection

