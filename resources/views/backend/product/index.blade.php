@extends('backend.layouts.main')
@section('page_title', 'Danh sách sản phẩm')
@section('title', 'Quản lý sản phẩm')
@section('content')
    <!-- Main content -->
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
                                <span class="fa fa-pencil"></span>
                            </a> &nbsp;
                            <a href="{{ url('admin/product/delete/' . $value['id']) }}"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này hay không?');">
                                <span class="fa fa-trash"></span>
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
