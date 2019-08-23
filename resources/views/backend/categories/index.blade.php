@extends('backend.layouts.main')
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
                <th>Name</th>
                <th>Avatar</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Ation</th>
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
                            @if(!empty($category['avatar']))
                                <img src="{{ asset('uploads/' . $category['avatar']) }}"
                                     width="80px"/>
                            @endif
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
                                <span class="fa fa-pencil"></span>
                            </a> &nbsp;
                            <a href="{{ url('admin/category/delete/' . $category['id']) }}"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này hay không. Các bản ghi tin tức liên quan đến category này cũng sẽ bị xóa?');">
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
        {{ $categories->links()  }}
    </section>
    <!-- /.content -->
@endsection()
