@extends('backend.layouts.main')
@section('page_title','Chi tiết tin tức')
@section('title')
    Chi tiết tin tức id = {{ $news->id }}
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">

        <p>
            ID: {{ $news->id }}
        </p>
        <p>
            <b>Tên bài:</b> {{ $news['title'] }}
        </p>
        <p>
            <b>Danh mục:</b>
            @if($news->categoriesRelation)
                {{ $news->categoriesRelation->name }}
            @endif
        </p>
        <p>
            <b>Ảnh đại diện:</b>
            @if(!empty($news->avatar))
                <img width="80" src="{{ asset('/uploads/' . $news->avatar) }}" />
            @endif
        </p>
        <p>
            <b>Tóm lược:</b> {!! $news['summary'] !!}
        </p>
        <p>
            <b>Nội dung:</b> {!! $news['content'] !!}
        </p>
        <p>
            <b>Lượt comment:</b> {{ $news['comment_total'] }}
        </p>
        <p>
            <b>Tác giả:</b> {{ $news['author'] }}
        </p>
        <p>
            <b>Thời gian tạo</b>
            {{ date('d-m-Y H:i:s', strtotime($news->created_at)) }}
        </p>
        <a href="{{ url('/admin/news') }}" class="btn btn-primary">
            Quay lại
        </a>
    </section>
    <!-- /.content -->
@endsection()
