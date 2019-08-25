<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends BackendController
{
    //
    public function index()
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getAllPaginationBackend();

        return view('backend/categories/index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('backend/categories/create');
    }

    public function store(Request $request)
    {
        //xử lý validate cho form
        $rules = [
          'name' => ['required', "min:2", "unique:categories"],
          'description' => ['required'],
          'avatar' => ['image', 'max:2024']
        ];
        $messages = [
            'name.required' => 'Name không được để trống',
            'name.min' => 'Name phải nhập ít nhất 2 ký tự',
            'name.unique' => 'Đã tồn tại name này trong CSDL rồi',
            'description.required' => 'Description không được để trống'
        ];
        $this->validate($request, $rules, $messages);

        //lưu vào cơ sở dữ liệu, sử dụng Eloquent ORM
        $categoryModel = new Category();
        $categoryModel->name = $request->name;
        $categoryModel->description = $request->description;
        $categoryModel->status = $request->status;
        if ($categoryModel->save()) {
            session()->put('success', "Thêm danh mục thành công");
        }
        else {
            session()->put('error', 'Thêm danh mục thất bại');
        }

        return redirect('/admin/category');

    }

    public function detail($id) {
        $category = Category::find($id);

        return view('backend.categories.detail', [
            'category' => $category
        ]);
    }

    public function update($id) {
        $category = Category::find($id);

        return view('backend.categories.update', [
           'category' => $category
        ]);
    }

    public function edit(Request $request, $id)
    {
        $category = Category::find($id);
        //xử lý validate cho form
        $rules = [
            'name' => ['required', "min:2"],
            'description' => ['required'],
        ];
        $messages = [
            'name.required' => 'Name không được để trống',
            'name.min' => 'Name phải nhập ít nhất 2 ký tự',
            'description.required' => 'Description không được để trống',
        ];
        $this->validate($request, $rules, $messages);

        //update vào cơ sở dữ liệu, sử dụng Eloquent ORM
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        if ($category->save()) {
            session()->put('success', "Update danh mục id = $id thành công");
        }
        else {
            session()->put('error', "Update danh mục id = $id thất bại");
        }

        return redirect('/admin/category');

    }

    public function delete($id) {
        $category = Category::find($id);
        if ($category->delete()) {
            session()->put("success", "Xóa danh mục id = $id thành công");
        }
        else {
            session()->put('error', "Xóa danh mục id = $id thất bại");
        }
        return redirect('admin/category');
    }
}
