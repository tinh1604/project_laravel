<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $RoleModel = new Role();
        $roles = $RoleModel->getAllPaginationBackend();

        return view('backend/roles/index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return view('backend/roles/create');
    }

    public function store(Request $request)
    {
        //xử lý validate cho form
        $rules = [
            'name' => ['required', "min:2", "unique:roles"],
            'description' => ['required'],
        ];
        $messages = [
            'name.required' => 'Name không được để trống',
            'name.min' => 'Name phải nhập ít nhất 2 ký tự',
            'name.unique' => 'Đã tồn tại name này trong CSDL rồi',
            'description.required' => 'Description không được để trống',
        ];
        $this->validate($request, $rules, $messages);

        //lưu vào cơ sở dữ liệu, sử dụng Eloquent ORM
        $RoleModel = new Role();
        $RoleModel->name = $request->name;
        $RoleModel->description = $request->description;
        if ($RoleModel->save()) {
            session()->put('success', "Thêm Role thành công");
        }
        else {
            session()->put('error', 'Thêm Role thất bại');
        }

        return redirect('/admin/roles');


    }

    public function detail($id) {
        $role = Role::find($id);

        return view('backend.roles.detail', [
            'role' => $role
        ]);
    }

    public function update($id) {
        $role = Role::find($id);

        return view('backend.roles.update', [
            'role' => $role
        ]);
    }

    public function edit(Request $request, $id)
    {
        $roles = Role::find($id);
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
        $roles->name = $request->name;
        $roles->description = $request->description;
        if ($roles->save()) {
            session()->put('success', "Update role $id thành công");
        }
        else {
            session()->put('error', "Update role $id thất bại");
        }

        return redirect('/admin/roles');


    }

    public function delete($id) {
        $roles = Role::find($id);
        if ($roles->delete()) {
            session()->put("success", "Xóa role $id thành công");
        }
        else {
            session()->put('error', "Xóa role $id thất bại");
        }
        return redirect('admin/roles');
    }
}
