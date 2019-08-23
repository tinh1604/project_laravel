@extends('backend.layouts.main')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h1>
            Chi tiết news # {{ $news->id }}
        </h1>
        <p>
            ID: {{ $news->id }}
        </p>
        <p>
            Name: {{ $news->name }}
        </p>
        <p>
            Avatar:
            @if(!empty($news->avatar))
                <img width="80" src="{{ asset('/uploads/' . $news->avatar) }}" />
            @endif
        </p>
        <p>
            Description: {{ $news->description }}
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
