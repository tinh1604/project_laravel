@extends('backend.layouts.main')
@section('page_title', 'Chi tiết Danh mục sản phẩm')
@section('title')
    Chi tiết Danh mục # {{ $ProductCategory->id }}
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">

        <p>
            <b>ID:</b> {{ $ProductCategory->id }}
        </p>
        <p>
            <b>Tên:</b>  {{ $ProductCategory->name }}
        </p>

        <p>
            <b>Miêu tả:</b>  {{ $ProductCategory->description }}
        </p>
        <p>
            <b>Thời gian tạo:</b>
            {{ date('d-m-Y H:i:s', strtotime($ProductCategory->created_at)) }}
        </p>
        <a href="{{ url('/admin/category') }}" class="btn btn-primary">
            Back
        </a>
    </section>

@endsection()
