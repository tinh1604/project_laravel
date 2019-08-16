@extends('backend.layouts.main')
@section('page_title', 'Thêm danh mục sản phẩm')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h2>Thêm mới Danh mục sản phẩm</h2>
        <form method="POST" action="{{ url('/admin/product_category/store') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Tên danh mục</label>
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
                        case 1:
                            $selectedStatusEnabled = "selected=true";
                            break;
                        case 0:
                            $selectedStatusDisabled = "selected=true";
                            break;
                    }
                @endphp
                <label>Status</label>
                <select name="status" class="form-control">
                    <option
                        {{ $selectedStatusEnabled }} value="1">
                        Enabled
                    </option>
                    <option
                    {{ $selectedStatusDisabled }} value="0">
                        Disabled
                    </option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Lưu"/>
                <a href="{{ url('admin/product_category') }}"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
@endsection
