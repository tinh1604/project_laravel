@extends('backend.layouts.main')
@section('page_title', 'Chi tiết quyền')
@section('title')
    Chi tiết quyền id = {{ $role->id }}
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">

        <p>
            <b>ID:</b> {{ $role->id }}
        </p>
        <p>
            <b>Tên:</b>  {{ $role->name }}
        </p>

        <p>
            <b>Miêu tả:</b>  {!! $role->description !!}
        </p>
        <p>
            <b>Thời gian tạo:</b>
            {{ date('d-m-Y H:i:s', strtotime($role->created_at)) }}
        </p>

        <a href="{{ url('/admin/roles') }}" class="btn btn-primary">
            Back
        </a>
    </section>

@endsection()
