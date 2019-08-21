@extends('backend.layouts.main')
@section('page_title', 'Cập nhật Danh mục sản phẩm')
@section('content')
    <!-- Main content -->
    <section class="content">
        <h2>cập nhật danh mục sản phẩm #{{ $ProductCategory->id }}</h2>
        <form method="POST"
              action="{{ url('/admin/product_category/edit/' . $ProductCategory->id) }}"
              enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Tên danh mục</label>
                <input type="text" name="name"
                       value="{{ old('name') ? old('name') : $ProductCategory->name}}"
                       class="form-control"/>
            </div>

            <div class="form-group">
                <label>Miêu tả</label>
                <textarea id='category-description' name="description"
                          class="form-control">
                 {{ old('description') ? old('description') :
                 $ProductCategory->description }}
                </textarea>
            </div>
            <div class="form-group">
                @php
                    $selectedStatusEnabled = '';
                    $selectedStatusDisabled = '';
                    $status = old('status') ? old('status') : $ProductCategory->status;
                        switch ($status) {
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
                       class="btn btn-success" value="Save"/>
                <a href="{{ url('admin/product_category') }}"
                   class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
