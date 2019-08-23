@extends('backend.layouts.main')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h1>
            Chi tiết category # {{ $category->id }}
        </h1>
        <p>
            ID: {{ $category->id }}
        </p>
        <p>
            Name: {{ $category->name }}
        </p>
        <p>
            Avatar:
            @if(!empty($category->avatar))
                <img width="80" src="{{ asset('/uploads/' . $category->avatar) }}" />
            @endif
        </p>
        <p>
            Description: {{ $category->description }}
        </p>
        <p>
            Created at:
            {{ date('d-m-Y H:i:s', strtotime($category->created_at)) }}
        </p>
        <a href="{{ url('/admin/category') }}" class="btn btn-primary">
            Back
        </a>
    </section>
    <!-- /.content -->
@endsection()
