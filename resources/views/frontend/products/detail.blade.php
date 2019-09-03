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
                            @if (!empty($product))
                            <div class="col-md-6 col-12">
                                <img class="img10  hvr-grow" src="{{ asset('uploads/' . $product['img']) }}" />
                            </div>
                            <div class="col-md-6 col-12">
                                <h3 style="font-family: 'Times New Roman'; font-weight: bold">{{$product['name']}}</h3>
                                <p class="content20">{{$product['english_name']}}</p>
                                <p class="content21">Giá : <span class="content22">{{ $product['price']}}</span></p>
                                <input type="number" name="dathang" value="1" style="width: 80px; text-align: center">
                                <a href="" ><button class="cont9"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button></a> <br/><br/>
                                <p style="font-family: 'Times New Roman'; font-size: 16px; text-decoration: underline; font-weight: bold">Miêu tả:</p>
                                <p style="font-family: 'Times New Roman'; font-size: 16px">
                                    {!! $product['description'] !!}
                                </p>
                            </div>
                            @endif

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
{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--       @if (!empty($related_products))--}}
{{--            @foreach ($related_products as $value)--}}
{{--                <div class="col-md-3 col-12">--}}
{{--                    <div class="block9" class="row">--}}
{{--                        <a href="{{ url('product/detail/' . $value['id']) }}" class="hvr-grow"> <img class="img6" src="{{ asset('uploads/' . $value['img']) }}"/>--}}
{{--                        </a>--}}
{{--                        <a class="content12" href="{{ url('product/detail/' . $value['id']) }}"> {{$value['name']}}</a>--}}
{{--                        <p class="content14">{{number_format($value['price'],0,',','.').' VNĐ'}}</p>--}}
{{--                        <a href="{{ url('product/detail/' . $value['id']) }}">--}}
{{--                            <button class="content15"><i class="fas fa-utensils"></i>Chọn món</button>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        @endif--}}

{{--    </div>--}}
{{--</div>--}}
@endsection()
