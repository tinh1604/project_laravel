@extends('frontend.layouts.main')
@section('title','chi tiết sản phẩm')
@section('content')
    <!--Main container start -->

    <div id="main">
        <div class="container" style="max-width: 1220px">
            <div class="search-form content" style="padding-top: 20px">
                <h5>Tìm kiếm</h5>
                <!-- SEARCH nên để method get để có thể xử lý cho trường hợp phân trang-->
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"/>
                        </div>
                        <div class="col-md-4 col-12">
                            <label>Loại sản phẩm</label>
                            <select class="form-control" name="product_category_id">
                                <option value="0">Chọn</option>
                                @if (!empty($product_category))
                                    @foreach ($product_category as $value)
                                        <option value="{{ $value['id']}}"
                                        @if(old('product_category_id') && $value['id'] == old('product_category_id'))
                                            {{'selected=true'}}
                                         @endif>
                                            {{$value['name']}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-4 col-12">
                            <label>Giá</label>
                            <input type="number" name="price" value="{{ old('price') }}" class="form-control"/>
                        </div>
                        <!--cần thêm 2 input hidden tương ứng với 2 param controller và action trên url-->
                        <input type="hidden" name="controller" value="{{ old('controller') }}"/>
                        <input type="hidden" name="action" value="{{ old('action') }}"/>
                    </div>
                    <br/>
                    <div class="form-group">
                        <button type="submit" name="submit_search" class="btn btn-success">
                            <span class="fa fa-search"></span> Tìm kiếm
                        </button>
                        <a href="thuc-don" class="btn btn-secondary">Hủy</a>
                    </div>
                </form>
            </div>
            <div class="row">

                <div class="col-md-10 col-12">

                    <div id="main2">
                        <p style="display: block; margin:  20px auto" class="content10"></p>

                        <div class="container">

                            <div class="row">
                               @if (!empty($product))
                                @foreach ($product as $value)

                                <div class="col-md-3 col-12">
                                    <div class="block9" class="row">
                                        <a href="" class="hvr-grow"> <img class="img6"
                                                                                                   src="{{ asset('uploads/' . $value['img']) }}"/>
                                        </a>
                                        <a class="content12"
                                           href=""><?php echo $value['name'] ?></a>
                                        <p class="content14">{{number_format($value['price'],0,',','.').' VNĐ'}}</p>
                                        <a href="">
                                            <button class="content15"><i class="fas fa-utensils"></i>Chọn món</button>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                            </div>


                        </div>
                    </div>
                    <br/>
                </div>

                @include('frontend.layouts.sidebar-right')

            </div>
        </div>
    </div>
@endsection()
