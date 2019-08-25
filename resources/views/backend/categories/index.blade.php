@extends('backend.layouts.main')
@section('page_content','Danh mục tin tức')
@section('title')
    Quản lý danh mục tin tức
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary"
           href="{{ url('admin/category/create') }}">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm mới
        </a>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Miêu tả</th>
                <th>Trạng thái</th>
                <th>Thời gian tạo</th>
                <th>Xem/sửa/xóa</th>
            </tr>
            @if(!empty($categories))
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            {{ $category['id'] }}
                        </td>
                        <td>
                            {{ $category['name'] }}
                        </td>
                        <td>
                            {!! $category['description'] !!}
                        </td>

                        <td>
                            @php
                                $statusText = '';
                                switch ($category['status']) {
                                    case \App\Models\Category::STATUS_ENABLED:
                                        $statusText = 'Active';
                                        break;
                                    case \App\Models\Category::STATUS_DISABLED:
                                        $statusText = 'Disabled';
                                        break;
                                }
                            @endphp
                            {{ $statusText }}
                        </td>
                        <td>
                            {{ date('d-m-Y H:i:s', strtotime($category['created_at']))}}
                        </td>
                        <td>
                            <a href="{{ url('admin/category/detail/' . $category['id']) }}">
                                <span class="fa fa-eye"></span>
                            </a> &nbsp;
                            <a href="{{ url('admin/category/update/' . $category['id']) }}">
                                <i class="fas fa-edit"></i>
                            </a> &nbsp;
                            <a href="{{ url('admin/category/delete/' . $category['id']) }}"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này hay không. Các tin tức liên quan đến danh mục này cũng sẽ bị xóa?');">
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
        {{ $categories->links()  }}
    </section>
    <!-- /.content -->
@endsection()
