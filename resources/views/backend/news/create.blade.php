@extends('backend.layouts.main')
@section('page_title', 'Create')
@section('title')
    Thêm mới news
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ url('/admin/news/store') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        @php
                            $selected = old('category_id') == $category->id ? "selected=true" : null;
                        @endphp
                        <option value="{{ $category->id }}" {{ $selected }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>
                    Upload ảnh đại diện
                    (File dạng ảnh, dung lượng upload không vượt quá 2Mb)
                </label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label>Summary</label>
                <textarea name="summary" class="form-control">{{ old('summary') }}</textarea>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" class="form-control" id="category-description">{{ old('content') }}</textarea>
            </div>
            <div class="form-group">
                <label>Comment_total</label>
                <input type="number" class="form-control" name="comment_total" value="{{ old('comment_total') }}" min="0" />
            </div>
            <div class="form-group">
                <label>Auth</label>
                <input type="text" class="form-control" name="auth" value="{{ old('auth') }}" />
            </div>
            <div class="form-group">
                @php
                    $selectedStatusEnabled = '';
                    $selectedStatusDisabled = '';
                        switch (old('status')) {
                            case \App\Models\News::STATUS_ENABLED:
                                $selectedStatusEnabled = "selected=true";
                                break;
                            case \App\Models\News::STATUS_DISABLED:
                                $selectedStatusDisabled = "selected=true";
                                break;
                        }
                @endphp
                <label>Status</label>
                <select name="status" class="form-control">
                    <option
                            {{ $selectedStatusEnabled }} value="{{ \App\Models\News::STATUS_ENABLED }}">
                        Tin nổi bật
                    </option>
                    <option
                            {{ $selectedStatusDisabled }} value="{{ \App\Models\News::STATUS_DISABLED }}">
                        Tin thường
                    </option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Save"/>
                <a href="{{ url('admin/news') }}"
                   class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
