@extends('backend.layouts.main')
@section('title')
    Chi tiết tài khoản # {{ $admin['id'] }}
@endsection()
@section('content')
    <section class="content">
        <p>
            <b>ID: </b> {{ $admin['id'] }}
        </p>
        <p>
            <b>Tên tài khoản: </b> {{ $admin['username'] }}
        </p>
        <p>
            <b>Quyền: </b>
            @if($admin->role_Relation)
                {{ $admin->role_Relation->name }}
            @endif
        </p>
        <p>
            <b>Ảnh đại diện: </b> <br/>
            @if(!empty($admin->img))
                <img width="150" src="{{ asset('/uploads/' . $admin->img) }}"/>
            @endif
        </p>
        <p>
            <b>Thời gian tạo: </b>
            {{ date('H:i:s d-m-Y', strtotime($admin->created_at)) }}
        </p>

        <a href="{{ url('/admin/index') }}" class="btn btn-primary">
            Quay lại
        </a>
    </section>
@endsection()
