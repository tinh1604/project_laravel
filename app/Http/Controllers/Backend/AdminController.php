<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends BackendController
{
    public function login(Request $request) {

        if ($request->get('submit')) {
            $rules = [
                'username' => ['required', 'min:4'],
                'password' => ['required', 'min: 4']
            ];
            $messages = [
                'username.required' => "Username không được để trống",
                'username.min' => "Username phải nhập ít nhất 4 ký tự",
                'password.required' => "Password không được để trống",
                'password.min' => "Password phải nhập ít nhất 4 ký tự",
            ];
            $this->validate($request, $rules, $messages);

            //kiểm tra login
            $username = $request->get('username');
            $password = $request->get('password');
            $password = md5($password);

            $admin = Admin::getAdmin($username, $password);

            if (!empty($admin)) {
                session()->put('success', "Đăng nhập thành công");
                session()->put('admin', $admin);
                return redirect('/admin/product');
            }
            else {
                session()->put('error', "Sai tài khoản hoặc mật khẩu");
                return redirect('/admin/login');
            }
        }

        return view('backend/admins/login');
    }
}
