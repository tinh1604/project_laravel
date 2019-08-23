@extends('backend.layouts.main')
@section('page_title', 'Update')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h1>Update category #{{ $category->id }}</h1>
        <form method="POST"
              action="{{ url('/admin/category/edit/' . $category->id) }}"
              enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name"
                       value="{{ old('name') ? old('name') : $category->name}}"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>
                    Upload ảnh đại diện
                    (File dạng ảnh, dung lượng upload không vượt quá 2Mb)
                </label>
                <input type="file" name="avatar" class="form-control">
                @if(!empty($category->avatar))
                    <img src="{{ asset('uploads/' . $category->avatar) }}"
                    width="80" />
                @endif
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea id='category-description' name="description"
                          class="form-control">
                 {{ old('description') ? old('description') :
                 $category->description }}
                </textarea>
            </div>
            <div class="form-group">
                @php
                    $selectedStatusEnabled = '';
                    $selectedStatusDisabled = '';
                    $status = old('status') ? old('status') : $category->status;
                        switch ($status) {
                            case \App\Models\Category::STATUS_ENABLED:
                                $selectedStatusEnabled = "selected=true";
                                break;
                            case \App\Models\Category::STATUS_DISABLED:
                                $selectedStatusDisabled = "selected=true";
                                break;
                        }
                @endphp
                <label>Status</label>
                <select name="status" class="form-control">
                    <option
                            {{ $selectedStatusEnabled }} value="{{ \App\Models\Category::STATUS_ENABLED }}">
                        Enabled
                    </option>
                    <option
                            {{ $selectedStatusDisabled }} value="{{ \App\Models\Category::STATUS_DISABLED }}">
                        Disabled
                    </option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Save"/>
                <a href="{{ url('admin/category') }}"
                   class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
