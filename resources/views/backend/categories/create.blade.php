@extends('backend.layouts.main')
@section('page_content','Thêm mới')
@section('title')
    Thêm danh mục tin
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ url('/admin/category/store') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Tên</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="form-control"/>
            </div>

            <div class="form-group">
                <label>Miêu tả</label>
                <textarea id='category-description' name="description"
                          class="form-control">
                    {{ old('description') }}
                </textarea>
            </div>
            <div class="form-group">
                @php
                $selectedStatusEnabled = '';
                $selectedStatusDisabled = '';
                    switch (old('status')) {
                        case \App\Models\Category::STATUS_ENABLED:
                            $selectedStatusEnabled = "selected=true";
                            break;
                        case \App\Models\Category::STATUS_DISABLED:
                            $selectedStatusDisabled = "selected=true";
                            break;
                    }
                @endphp
                <label>Trạng thái</label>
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
                       class="btn btn-success" value="Lưu"/>
                <a href="{{ url('admin/category') }}"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
