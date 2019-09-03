@extends('frontend.layouts.main')
@section('title','Đăng ký')
@section('content')
<!--Main container start -->
<div id="main">
    <div class="container" style="max-width: 1220px">
        <div class="row">

            <div class="col-md-10 col-12">
                <p class="cont12">Tạo một tài khoản</p>
                <div style=" width: 50%; margin: 5px auto">
                    @if (session()->get('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get('error') }}
                            @php(session()->forget('error'))
                        </div>
                    @endif
                    @if (session()->get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                            @php(session()->forget('success'))
                        </div>
                    @endif
                </div>
                <form action="registration" method="post" id="dangki">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
                    <input class="dangki1" type="text" name="first_name" placeholder="Họ" value="{{old('first_name')}}">
                    <input class="dangki1" type="text" name="last_name" placeholder="Tên" value="{{ old('last_name') }}">
                    <input class="dangki2" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    <input class="dangki2" type="password" name="password" placeholder="Mật khẩu ít nhất 8 kí tự">
                    <input class="dangki2" type="password" name="repassword" placeholder="Nhập lại mật khẩu"><br/>
                    Chọn ảnh đại diện
                    <input class="dangki1" type="file" name="avatar" ><br/>
                    <div class="form-group">
                        <input type="submit" name="submit"
                               class="btn btn-primary" value="Đăng ký"/>
                        <a href="{{ url('index') }}"
                           class="btn btn-secondary">Hủy</a>
                    </div>
                </form>


                <br/>
            </div>


            @include('frontend.layouts.sidebar-right')

        </div>
    </div><br/>
</div>


@endsection()

