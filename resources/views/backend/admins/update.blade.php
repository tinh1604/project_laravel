@extends('backend.layouts.main')
@section('page_title','Cập nhật sản phẩm')
@section('title')
    Cập nhật tài khoản id = {{ $admin->id }}
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ url('/admin/admins/edit/' . $admin->id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Tên tài khoản</label>
                <input type="text" name="username" value="{{ old('username') ? old('username') : $admin->username }}"
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
                            $selected = old('product_category_id') == $admin->product_category_Relation->id ? "selected=true" : null;
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
                @if(!empty($admin->img))
                    <img src="{{ asset('uploads/' . $admin->img) }}"
                         width="80"/>
                @endif
            </div>
            <div class="form-group">
                <label>Giá</label>
                <textarea name="price"
                          class="form-control">{{ old('price') ? old('price') : $admin->price }}</textarea>
            </div>
            <div class="form-group">
                <label>Miêu tả</label>
                <textarea name="description" class="form-control"
                          id="category-description">{{ old('description') ? old('description') : $admin->description }}</textarea>
            </div>

            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Lưu"/>
                <a href="{{ url('admin/admins') }}"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
