@extends('backend.layouts.main')
@section('page_title','Cập nhật sản phẩm')
@section('title')
    Cập nhật tài khoản id = {{ $admin->id }}
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ url('/admin/admins/edit/' . $admin->id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Tên tài khoản</label>
                <input type="text" name="username" value="{{ old('username') ? old('username') : $admin->username }}"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Chọn quyền</label>
                <select name="role_id" class="form-control">
                    @foreach($roles as $value)
                        @php
                            $selected = old('role_id') == $admin->role_Relation->id ? "selected=true" : null;
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
                @if(!empty($admin->img))
                    <img src="{{ asset('uploads/' . $admin->img) }}"
                         width="80"/>
                @endif
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
