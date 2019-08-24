@extends('backend.layouts.main')
@section('page_title', 'Danh mục sản phẩm')
@section('title', 'Danh mục sản phẩm')
@section('content')
    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary"
           href="{{ url('admin/product_category/create') }}">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm mới
        </a>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Loại sản phẩm</th>
                <th>Miêu tả</th>
                <th>Trang thái</th>
                <th>Thời gian tạo</th>
                <th>Chi tiết / sửa / xóa</th>
            </tr>
            @if(!empty($ProductCategory))
                @foreach ($ProductCategory as $value)
                    <tr>
                        <td>
                            {{ $value['id'] }}
                        </td>
                        <td>
                            {{ $value['name'] }}
                        </td>
                        <td>
                            {!! $value['description']  !!}
                        </td>
                        <td>
                            @php
                                $status= '';
                                switch ($value['status']) {
                                    case \App\Models\ProductCategory::STATUS_ENABLED: $status = 'Active';
                                        break;
                                    case \App\Models\ProductCategory::STATUS_DISABLED: $status = 'Disabled';
                                        break;
                                }
                            @endphp
                            {{ $status }}
                        </td>
                        <td>
                            {{ date('d-m-Y H:i:s', strtotime($value['created_at']))}}
                        </td>
                        <td>
                            <a href="{{ url('admin/product_category/detail/' . $value['id']) }}">
                                <span class="fa fa-eye"></span>
                            </a> &nbsp;
                            <a href="{{ url('admin/product_category/update/' . $value['id']) }}">
                                <i class="fas fa-edit"></i>
                            </a> &nbsp;
                            <a href="{{ url('admin/product_category/delete/' . $value['id']) }}"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục sản phẩm này hay không. Các sản phẩm thuộc danh  mục này cũng sẽ bị xóa?');">
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
        {{ $ProductCategory->links()  }}
    </section>
    <!-- /.content -->
@endsection()
