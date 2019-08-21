@extends('backend.layouts.main')
@section('page_title','Cập nhật sản phẩm')
@section('title')
    Cập nhật sản phẩm ID = {{ $product->id }}
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ url('/admin/product/edit/' . $product->id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="name" value="{{ old('name') ? old('name') : $product->name }}"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="english_name" value="{{ old('english_name') ? old('english_name') : $product->english_name }}"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label>Danh mục sản phẩm</label>
                <select name="product_category_id" class="form-control">
                    @foreach($product_category as $value)
                        @php
                            $selected = old('product_category_id') == $product->product_category_Relation->id ? "selected=true" : null;
                        @endphp
                        <option value="{{ $value->id }}" {{ $selected }}>
                            {{ $value->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>
                    Ảnh sản phẩm
                </label>
                <input type="file" name="avatar" class="form-control">
                @if(!empty($product->img))
                    <img src="{{ asset('uploads/' . $product->img) }}"
                         width="80"/>
                @endif
            </div>
            <div class="form-group">
                <label>Giá</label>
                <textarea name="price"
                          class="form-control">{{ old('price') ? old('price') : $product->summary }}</textarea>
            </div>
            <div class="form-group">
                <label>Miêu tả</label>
                <textarea name="description" class="form-control"
                          id="category-description">{{ old('description') ? old('description') : $product->description }}</textarea>
            </div>
            <div class="form-group">
                @php
                    $selectedStatusEnabled = '';
                    $selectedStatusDisabled = '';
                    $highlight = old('highlight') ? old('highlight') : $product->highlight;
                        switch ($highlight) {
                            case 1:
                                $selectedStatusEnabled = "selected=true";
                                break;
                            case 0:
                                $selectedStatusDisabled = "selected=true";
                                break;
                        }
                @endphp
                <label>Trạng thái</label>
                <select name="status" class="form-control">
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
