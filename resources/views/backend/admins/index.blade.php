@extends('backend.layouts.main')
@section('page_title', 'Quản lý Admin')
@section('title', 'Quản lý Admin')
@section('content')
    <!-- Main content -->
    <section class="content">
        <a class="btn btn-primary"
           href="{{ url('admin/admins/create') }}">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm tài khoản
        </a>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Tên tài khoản</th>
                <th>Quyền</th>
                <th>Hình ảnh</th>
                <th>Thời gian tạo</th>
                <th>Xem/sửa/xóa</th>
            </tr>
            @if(!empty($admins))
                @foreach ($admins as $value)
                    <tr>
                        <td>
                            {{ $value['id'] }}
                        </td>
                        <td>
                            {{ $value['username'] }}
                        </td>
                        <td>
                            @if($value->role_Relation)
                                {{ $value->role_Relation->name }}
                            @endif
                        </td>

                        <td>
                            @if(!empty($value['img']))
                                <img src="{{ asset('uploads/' . $value['img']) }}"
                                     width="100px"/>
                            @endif
                        </td>

                        <td>
                            {{ date('d-m-Y H:i:s', strtotime($value['created_at']))}}
                        </td>

                        <td>
                            <a href="{{ url('admin/admins/detail/' . $value['id']) }}">
                                <span class="fa fa-eye"></span>
                            </a> &nbsp;
                            <a href="{{ url('admin/admins/update/' . $value['id']) }}">
                                <i class="fas fa-edit"></i>
                            </a> &nbsp;
                            <a href="{{ url('admin/admins/delete/' . $value['id']) }}"
                               onclick="return confirm('Bạn có chắc chắn muốn tài khoản này hay không?');">
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
        {{ $admins->links()  }}
    </section>
    <!-- /.content -->
@endsection()
