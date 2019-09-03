@extends('backend.layouts.main')
@section('page_title', 'Danh sách sản phẩm')
@section('title', 'Quản lý sản phẩm')
@section('content')
    <!-- Main content -->
    <div class="search-form content">
        <h4>Tìm kiếm</h4>
        <!-- SEARCH nên để method get để có thể xử lý cho trường hợp phân trang-->
        <form action="" method="GET">
            <div class="row">
                <div class="col-md-4 col-12">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control"/>
                </div>
                <div class="col-md-4 col-12">
                    <label>Loại sản phẩm</label>
                    <select class="form-control" name="product_category_id">
                        <option value="0">Chọn</option>
{{--                       @if (!empty($product_category))--}}
{{--                        @foreach ($product_category as $value)--}}
{{--                        <option value="{{$value['id']}}--}}
{{--                        @if(old('product_category_id') && $value['id'] == old('product_category_id'))--}}
{{--                        {{'selected=true'}}--}}
{{--                        @endif >--}}
{{--                           {{$value['name']}}--}}
{{--                        </option>--}}
{{--                        @endforeach()--}}
{{--                        @endif--}}
                    </select>
                </div>
                <div class="col-md-3 col-12">
                    <label>Giá</label>
                    <input type="number" name="price" value="<?php echo isset($_GET['price']) ? $_GET['price'] : ''?>" class="form-control"/>
                </div>
                <!--cần thêm 2 input hidden tương ứng với 2 param controller và action trên url-->
                <input type="hidden" name="controller" value="<?php echo isset($_GET['controller']) ? $_GET['controller'] : ''?>"/>
                <input type="hidden" name="action" value="<?php echo isset($_GET['action']) ? $_GET['action'] : ''?>"/>
            </div>
            <br />
            <div class="form-group">
                <button type="submit" name="submit_search" class="btn btn-success">
                    <span class="fa fa-search"></span> Tìm kiếm
                </button>
                <a href="index.php?controller=product&action=index" class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </div>

    <section class="content">
        <a class="btn btn-primary"
           href="{{ url('admin/product/create') }}">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm sản phẩm
        </a>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Tên tiếng Anh</th>
                <th>Danh mục</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th style="text-align: center">Miêu tả</th>
                <th>Thời gian tạo</th>
                <th>Trạng thái</th>
                <th>Xem/sửa/xóa</th>
            </tr>
            @if(!empty($product))
                @foreach ($product as $value)
                    <tr>
                        <td>
                            {{ $value['id'] }}
                        </td>
                        <td>
                            {{ $value['name'] }}
                        </td>
                        <td>
                            {{ $value['english_name'] }}
                        </td>
                        <td>
                            @if($value->product_category_Relation)
                                {{ $value->product_category_Relation->name }}
                            @endif
                        </td>

                        <td>
                            @if(!empty($value['img']))
                                <img src="{{ asset('uploads/' . $value['img']) }}"
                                     width="100px"/>
                            @endif
                        </td>
                        <td>
                            {{ $value['price'] }}
                        </td>
                        <td>{!! $value['description'] !!}</td>
                        <td>
                            {{ date('d-m-Y H:i:s', strtotime($value['created_at']))}}
                        </td>
                        <td>
                            @php
                                $statusText = '';
                                switch ($value['highlight']) {
                                    case 1:
                                        $statusText = 'nổi bật';
                                        break;
                                    case 0:
                                        $statusText = 'bình thường';
                                        break;
                                }
                            @endphp
                            {{ $statusText }}
                        </td>
                        <td>
                            <a href="{{ url('admin/product/detail/' . $value['id']) }}">
                                <span class="fa fa-eye"></span>
                            </a> &nbsp;
                            <a href="{{ url('admin/product/update/' . $value['id']) }}">
                                <i class="fas fa-edit"></i>
                            </a> &nbsp;
                            <a href="{{ url('admin/product/delete/' . $value['id']) }}"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này hay không?');">
                                <i class="fas fa-trash-alt"></i>
                            </a> &nbsp;
                        </td>
                    </tr>
                @endforeach()
            @else
                <tr>
                    <td colspan="7">
                        Không có bản ghi nào
                    </td>
                </tr>
            @endif
        </table>
        {{ $product->links()  }}
    </section>
    <!-- /.content -->
@endsection()
