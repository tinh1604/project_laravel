@extends('backend.layouts.main')
@section('page_title', 'Thêm sản phẩm')
@section('title', 'Thêm sản phẩm')
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ url('/admin/product/store') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Tên tiếng Anh</label>
                <input type="text" name="english_name" value="{{ old('english_name') }}"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <select name="product_category_id" class="form-control">
                    @foreach($ProductCategory as $value)
                        @php
                            $selected = old('product_category_id') == $value->id ? "selected=true" : null;
                        @endphp
                        <option value="{{ $value->id }}" {{ $selected }}>
                            {{ $value->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" name="img" class="form-control">
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input type="number" name="price" value="{{ old('price') }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Miêu tả</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
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
                <label>Trạng thái</label>
                <select name="highlight" class="form-control">
                    <option
                            {{ $selectedStatusEnabled }} value="1">
                        Nổi bật
                    </option>
                    <option
                            {{ $selectedStatusDisabled }} value="0">
                        Bình thường
                    </option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Lưu"/>
                <a href="{{ url('admin/product') }}"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
