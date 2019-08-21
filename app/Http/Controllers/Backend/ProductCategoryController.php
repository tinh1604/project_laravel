<?php

namespace App\Http\Controllers\Backend;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductCategoryController extends BackendController
{
    public function index(){
        $ProductCategoryModel = new ProductCategory();
        $product_category = $ProductCategoryModel->getAllPaginationBackend();
        return view('backend/product_category/index',['ProductCategory' => $product_category]);

    }
    public function create()
    {
        return view('backend/product_category/create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', "min:2", "unique:product_category"],
            'description' => ['required']
        ];
        $messages = [
            'name.required' => 'Name không được để trống',
            'name.min' => 'Name phải nhập ít nhất 2 ký tự',
            'name.unique' => 'Đã tồn tại name này trong CSDL rồi',
            'description.required' => 'Description không được để trống',
        ];
        $this->validate($request, $rules, $messages);

        //lưu vào cơ sở dữ liệu, sử dụng Eloquent ORM
        $ProductCategoryModel = new ProductCategory();
        $ProductCategoryModel->name = $request->name;
        $ProductCategoryModel->description = $request->description;
        $ProductCategoryModel->status = $request->status;
        if ($ProductCategoryModel->save()) {
            session()->put('success', "Thêm danh mục thành công");
        }
        else {
            session()->put('error', 'Thêm danh mục thất bại');
        }

        return redirect('/admin/product_category');
    }

    public function detail($id) {
        $product_category = ProductCategory::find($id);

        return view('backend.product_category.detail', [
            'ProductCategory' => $product_category
        ]);
    }

    public function update($id) {
        $ProductCategory = ProductCategory::find($id);

        return view('backend.product_category.update', [
            'ProductCategory' => $ProductCategory
        ]);
    }

    public function edit(Request $request, $id)
    {
        $ProductCategory = ProductCategory::find($id);
        //xử lý validate cho form
        $rules = [
            'name' => ['required', "min:2"],
            'description' => ['required']
        ];
        $messages = [
            'name.required' => 'Name không được để trống',
            'name.min' => 'Name phải nhập ít nhất 2 ký tự',
            'description.required' => 'Description không được để trống',
        ];
        $this->validate($request, $rules, $messages);
        //update vào cơ sở dữ liệu, sử dụng Eloquent ORM
        $ProductCategory->name = $request->name;
        $ProductCategory->description = $request->description;
        $ProductCategory->status = $request->status;
        if ($ProductCategory->save()) {
            session()->put('success', "Update danh mục $id thành công");
        }
        else {
            session()->put('error', "Update danh mục $id thất bại");
        }

        return redirect('/admin/product_category');
    }

    public function delete($id) {
        $ProductCategory = ProductCategory::find($id);
        if ($ProductCategory->delete()) {
            session()->put("success", "Xóa danh mục $id thành công");
        }
        else {
            session()->put('error', "Xóa danh mục $id thất bại");
        }
        return redirect('admin/product_category');
    }
}
