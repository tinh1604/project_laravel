@extends('backend.layouts.main')
@section('page_title', 'Cập nhật quyền')
@section('title')
    Cập nhật quyền id = {{ $role->id }}
@endsection()
@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="POST"
              action="{{ url('/admin/roles/edit/' . $role->id) }}"
              enctype="multipart/form-data">
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <label>Tên danh mục</label>
                <input type="text" name="name"
                       value="{{ old('name') ? old('name') : $role->name}}"
                       class="form-control"/>
            </div>

            <div class="form-group">
                <label>Miêu tả</label>
                <textarea id='category-description' name="description"
                          class="form-control">
                 {{ old('description') ? old('description') :
                 $role->description }}
                </textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="submit"
                       class="btn btn-success" value="Lưu"/>
                <a href="{{ url('admin/roles') }}"
                   class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
