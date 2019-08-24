@extends('backend.layouts.main')
@section('page_title', 'Thêm tài khoản')
@section('title', 'Thêm tài khoản')
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ url('/admin/admins/store') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Tên tài khoản</label>
                <input type="text" name="username" value="{{ old('username') }}"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Chọn quyền</label>
                <select name="role_id" class="form-control">
                    @foreach($roles as $value)
                        @php
                            $selected = old('role_id') == $value->id ? "selected=true" : null;
                        @endphp
                        <option value="{{ $value->id }}" {{ $selected }}>
                            {{ $value->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="password" value="{{ old('password') }}"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu</label>
                <input type="password" name="repassword" value="{{ old('repassword') }}"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Ảnh đại diện</label>
                <input type="file" name="img" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Lưu"/>
                <a href="{{ url('admin/index') }}"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
