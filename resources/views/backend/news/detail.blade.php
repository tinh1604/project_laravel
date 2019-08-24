@extends('backend.layouts.main')
@section('page_title','Detail')
@section('title')
    Chi tiết news # {{ $new->id }}
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">

        <p>
            ID: {{ $news->id }}
        </p>
        <p>
            Tên bài: {{ $new['title'] }}
        </p>
        <p>
            Danh mục:
            @if($news->categoriesRelation)
                {{ $news->categoriesRelation->name }}
            @endif
        </p>
        <p>
            Ảnh đại diện:
            @if(!empty($new->avatar))
                <img width="80" src="{{ asset('/uploads/' . $news->avatar) }}" />
            @endif
        </p>
        <p>
            Giới thiệu: {!! $news['summary'] !!}
        </p>
        <p>
            Nội dung: {!! $news['content'] !!}
        </p>
        <p>
            Số comment: {{ $news['comment_total'] }}
        </p>
        <p>
            Tác giả: {{ $news['author'] }}
        </p>
        <p>
            Created at:
            {{ date('d-m-Y H:i:s', strtotime($news->created_at)) }}
        </p>
        <a href="{{ url('/admin/news') }}" class="btn btn-primary">
            Back
        </a>
    </section>
    <!-- /.content -->
@endsection()
