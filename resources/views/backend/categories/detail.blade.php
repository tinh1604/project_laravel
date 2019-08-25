@extends('backend.layouts.main')
@section('page_content','Chi tiết tin')
@section('title')
    Chi tiết category # {{ $category->id }}
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">
        <p>
            <b>ID:</b> {{ $category->id }}
        </p>
        <p>
            <b>Tên:</b> {{ $category->name }}
        </p>
        <p>
            <b>Miêu tả:</b> {!! $category->description !!}
        </p>
        <p>
            <b>Thời gian tạo:</b>
            {{ date('d-m-Y H:i:s', strtotime($category->created_at)) }}
        </p>
        <a href="{{ url('/admin/category') }}" class="btn btn-primary">
            Back
        </a>
    </section>
    <!-- /.content -->
@endsection()
