@extends('backend.layouts.main')
@section('page_title', 'Thêm mới tin')
@section('title')
    Thêm mới news
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ url('/admin/news/store') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Tên bài</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Danh mục tin</label>
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
                    Ảnh
                </label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label>Tóm lược</label>
                <textarea name="summary" class="form-control">{{ old('summary') }}</textarea>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="content" class="form-control" id="category-description">{{ old('content') }}</textarea>
            </div>
            <div class="form-group">
                <label>Lượt comment</label>
                <input type="number" class="form-control" name="comment_total" value="{{ old('comment_total') }}" min="0" />
            </div>
            <div class="form-group">
                <label>Tác giả</label>
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
                <label>Trạng thái</label>
                <select name="status" class="form-control">
                    <option
                            {{ $selectedStatusEnabled }} value="{{ \App\Models\News::STATUS_ENABLED }}">
                        Enabled
                    </option>
                    <option
                            {{ $selectedStatusDisabled }} value="{{ \App\Models\News::STATUS_DISABLED }}">
                        Disable
                    </option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Lưu"/>
                <a href="{{ url('admin/news') }}"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
