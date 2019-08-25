@extends('backend.layouts.main')
@section('page_title', 'cập nhật tin')
@section('title')
    Cập nhật tin id = {{ $news->id }}
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ url('/admin/news/edit/' . $news->id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Tên</label>
                <input type="text" name="title" value="{{ old('title') ? old('title') : $news->title }}"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        @php
                            $selected = old('category_id') == $news->categoriesRelation->id ? "selected=true" : null;
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
                @if(!empty($news->avatar))
                    <img src="{{ asset('uploads/' . $news->avatar) }}"
                         width="80"/>
                @endif
            </div>
            <div class="form-group">
                <label>Tóm lược</label>
                <textarea name="summary"
                          class="form-control">{{ old('summary') ? old('summary') : $news->summary }}</textarea>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="content" class="form-control"
                          id="category-description">{{ old('content') ? old('content') : $news->content }}</textarea>
            </div>
            <div class="form-group">
                <label>Lượt comment</label>
                <input type="number" class="form-control" name="comment_total"
                       value="{{ old('comment_total') ? old('comment_total') : $news->comment_total }}"
                       min="0"/>
            </div>
            <div class="form-group">
                <label>Tác giả</label>
                <input type="number" class="form-control" name="like_total"
                       value="{{ old('like_total') ? old('like_total') : $news->like_total }}" min="0"/>
            </div>

            <div class="form-group">
                @php
                    $selectedStatusEnabled = '';
                    $selectedStatusDisabled = '';
                    $status = old('status') ? old('status') : $news->status;
                        switch ($status) {
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
                        Disabled
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
