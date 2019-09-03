@extends('frontend.layouts.main')
@section('title','Dịch vụ')
@section('content')
<!--Main container start -->
<div id="main">
    <div class="container" style="max-width: 1220px">
        <div class="row">

            <div class="col-md-10 col-12">
                <p id="cont1">Cung cấp cà phê nguyên chất giá sỉ cho quán, nhà hàng, khách sạn trên toàn quốc</p>
                <p class="cont2">
                    BẠN CẦN TÌM DÒNG CÀ PHÊ CHO QUÁN?
                </p>
                <p class="cont6">
                    Phân khúc bình dân, chúng tôi có:
                </p>
                <div style="margin-left: 30px">
                    <li><b>Bản Đôn</b> với các mã: RIC1, RIC2, RIC3, đây là các dòng pha phin, pha vợt. Hương vị đậm đà,
                        màu nâu hổ phách, gần giống gu truyền thống nhất. Giá tầm 110.000đ – 125.000đ/kg.
                    </li>
                    <li><b>Passion Blend</b> thì có BIC1, BIC2, BIC3, dành cho chuỗi quán pha máy mang đi (Take Away
                        Coffee). Pha máy nhưng đảm bảo phong vị đậm đà gần giống pha phin. Điểm nhấn, dòng này pha
                        cafe sữa đá từ máy là tuyệt. Giá tầm 160.000đ – 180.000đ/kg.
                    </li>
                </div><br/>
                <p class="cont6">
                    Phân khúc tầm trung đến sành điệu, chúng tôi có:
                </p>
                <div style="margin-left: 30px">
                    <li><b>Harmony Blend:</b> 7 Arabica, 3 Robusta    </li>
                    <li><b>Pongour:</b> 100% Arabica    </li>
                    <li><b>Red Land:</b> 100% Moka   </li>
                    <li><b>Eroka:</b>  100% Arabica Cầu Đất và Arabica Ethiopia</li>
                </div> <br/>
                <p class="cont6">
                    Sự khác biệt chính từ Victoria Coffee:
                </p>
                <div style="margin-left: 30px">
                    <li>Xưởng rang đạt chuẩn HACCP</li>
                    <li>Máy rang Hot Air, rang theo Profile</li>
                    <li>Các dòng cà phê đều rang mộc</li>
                    <li>Hướng dẫn các kiểu pha cà phê và tư vấn menu miễn phí</li>
                </div>
                <img class="imgnews3" src="{{ asset('frontend/imgs/dichvu/img1.jpg') }}" /> <br/>
                <img class="imgnews3" src="{{ asset('frontend/imgs/dichvu/img2.jpg') }}" />
                <br/>
{{--                @if (!empty($news))--}}
{{--                    @foreach ($news as $value)--}}
{{--                    {!! $value['content'] !!}--}}
{{--                    @endforeach--}}
{{--                @endif--}}
            </div>

            @include('frontend.layouts.sidebar-right')

        </div>
    </div>
</div>
@endsection()
