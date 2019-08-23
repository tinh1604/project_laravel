@extends('backend.layouts.login')
@section('page_title', 'Đăng nhập')
@section('content')
    <div class="container" style="width: 100%">
        <form method="post" action="">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label>Tên đăng nhập</label>
                <input type="text" name="username"
                       class="form-control" />
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="password"
                       class="form-control" />
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       value="Đăng nhập" class="btn btn-primary" />
            </div>
        </form>
    </div>
@endsection