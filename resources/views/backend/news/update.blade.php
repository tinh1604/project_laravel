@extends('backend.layouts.main')
@section('page_title', 'Create')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h1>Update news {{ $news->id }}</h1>
        <form method="POST" action="{{ url('/admin/news/edit/' . $news->id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title') ? old('title') : $news->title }}"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Category</label>
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
                    Upload ảnh đại diện
                    (File dạng ảnh, dung lượng upload không vượt quá 2Mb)
                </label>
                <input type="file" name="avatar" class="form-control">
                @if(!empty($news->avatar))
                    <img src="{{ asset('uploads/' . $news->avatar) }}"
                         width="80"/>
                @endif
            </div>
            <div class="form-group">
                <label>Summary</label>
                <textarea name="summary"
                          class="form-control">{{ old('summary') ? old('summary') : $news->summary }}</textarea>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" class="form-control"
                          id="category-description">{{ old('content') ? old('content') : $news->content }}</textarea>
            </div>
            <div class="form-group">
                <label>Comment_total</label>
                <input type="number" class="form-control" name="comment_total"
                       value="{{ old('comment_total') ? old('comment_total') : $news->comment_total }}"
                       min="0"/>
            </div>
            <div class="form-group">
                <label>Like_total</label>
                <input type="number" class="form-control" name="like_total"
                       value="{{ old('like_total') ? old('like_total') : $news->like_total }}" min="0"/>
            </div>
            <div class="form-group">
                <label>View</label>
                <input type="number" class="form-control" name="view"
                       value="{{ old('view') ? old('view') : $news->view }}" min="0"/>
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
                <label>Status</label>
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
