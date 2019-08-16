@extends('backend.layouts.main')
@section('page_title', 'Chi tiết Danh mục sản phẩm')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h2>
            Chi tiết Danh mục # {{ $ProductCategory->id }}
        </h2>
        <p>
            ID: {{ $ProductCategory->id }}
        </p>
        <p>
            Name: {{ $ProductCategory->name }}
        </p>

        <p>
            Description: {{ $ProductCategory->description }}
        </p>
        <p>
            Created at:
            {{ date('d-m-Y H:i:s', strtotime($ProductCategory->created_at)) }}
        </p>
        <a href="{{ url('/admin/category') }}" class="btn btn-primary">
            Back
        </a>
    </section>
    <!-- /.content -->
@endsection()
