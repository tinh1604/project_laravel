<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Rules\CustomRule;
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
            'description.required' => 'Description không được để trống',
            'avatar.image' => 'Phải upload định dạng ảnh',
            'avatar.max' => 'Ảnh upload dung lượng không được > 2Mb',
        ];
        $this->validate($request, $rules, $messages);
        //tiến hành lưu ảnh nếu có
        $avatarFileName = '';
        //nếu có ảnh upload lên, thì tiến hành lưu ảnh
        if (!empty($request->avatar)) {
            $avatar = $request->avatar;
            //đặt lại tên file ảnh, để đảm bảo ảnh ko bị trùng
            $avatarFileName = 'category-' . time() .
                '-' . $avatar->getClientOriginalName();
            //lưu ảnh lên thư mục public/uploads
            $avatar->move(public_path('uploads'), $avatarFileName);
        }

        //lưu vào cơ sở dữ liệu, sử dụng Eloquent ORM
        $categoryModel = new Category();
        $categoryModel->name = $request->name;
        $categoryModel->avatar = $avatarFileName;
        $categoryModel->description = $request->description;
        $categoryModel->status = $request->status;
        if ($categoryModel->save()) {
            session()->put('success', "Thêm category thành công");
        }
        else {
            session()->put('error', 'Thêm category thất bại');
        }

        return redirect('/admin/category');
//        return redirect()->route();
//        $categoryModel->name = $request->input('name');


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
            'name' => ['required', "min:2", new CustomRule()],
            'description' => ['required', new CustomRule()],
            'avatar' => ['image', 'max:2024']
        ];
        $messages = [
            'name.required' => 'Name không được để trống',
            'name.min' => 'Name phải nhập ít nhất 2 ký tự',
            'description.required' => 'Description không được để trống',
            'avatar.image' => 'Phải upload định dạng ảnh',
            'avatar.max' => 'Ảnh upload dung lượng không được > 2Mb',
        ];
        $this->validate($request, $rules, $messages);
        //tiến hành lưu ảnh nếu có
        $avatarFileName = $category->avatar;
        //nếu có ảnh upload lên, thì tiến hành lưu ảnh
        if (!empty($request->avatar)) {
            $avatar = $request->avatar;
            //xóa file ảnh nếu đã tồn tại
            @unlink(public_path('uploads/' . $avatarFileName));
            //đặt lại tên file ảnh, để đảm bảo ảnh ko bị trùng
            $avatarFileName = 'category-' . time() .
                '-' . $avatar->getClientOriginalName();
            //lưu ảnh lên thư mục public/uploads
            $avatar->move(public_path('uploads'), $avatarFileName);
        }

        //update vào cơ sở dữ liệu, sử dụng Eloquent ORM
        $category->name = $request->name;
        $category->avatar = $avatarFileName;
        $category->description = $request->description;
        $category->status = $request->status;
        if ($category->save()) {
            session()->put('success', "Update category $id thành công");
        }
        else {
            session()->put('error', "Update category $id thất bại");
        }

        return redirect('/admin/category');
//        return redirect()->route();
//        $categoryModel->name = $request->input('name');


    }

    public function delete($id) {
        $category = Category::find($id);
        if ($category->delete()) {
            session()->put("success", "Xóa category $id thành công");
        }
        else {
            session()->put('error', "Xóa category $id thất bại");
        }
        return redirect('admin/category');
    }
}
