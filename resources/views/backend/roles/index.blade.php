@extends('backend.layouts.main')
@section('page_title', 'Danh mục quyền')
@section('title', 'Danh mục quyền')
@section('content')
    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary"
           href="{{ url('admin/roles/create') }}">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm mới
        </a>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Tên quyền</th>
                <th>Miêu tả </th>
                <th>Thời gian tạo </th>
                <th>Xem / sửa / xóa</th>
            </tr>
            @if(!empty($roles))
                @foreach ($roles as $value)
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
                            {{ date('d-m-Y H:i:s', strtotime($value->created_at)) }}
                        </td>
                        <td>
                            <a href="{{ url('admin/roles/detail/' . $value['id']) }}">
                                <span class="fa fa-eye"></span>
                            </a> &nbsp;
                            <a href="{{ url('admin/roles/update/' . $value['id']) }}">
                                <i class="fas fa-edit"></i>
                            </a> &nbsp;
                            <a href="{{ url('admin/roles/delete/' . $value['id']) }}"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa quyền này hay không ? Các tài khoản thuộc quyền này cũng sẽ bị xóa.');">
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
        {{ $roles->links()  }}
    </section>
    <!-- /.content -->
@endsection()
