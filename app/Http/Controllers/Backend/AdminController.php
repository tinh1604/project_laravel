<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use App\Models\Role;
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

    public function logout() {
        session()->forget('admin');
        session()->put('success', "Bạn đã đăng xuất!");
        return redirect('/admin/login');
    }

    public function index()
    {
        $adminModel = new Admin();
        $admins = $adminModel->getAllPaginationBackend();

        return view('backend/admins/index', [
            'admins' => $admins
        ]);
    }

    public function create()
    {
        $roles = Role::select(['id', 'name'])->get();
        return view('backend/admins/create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'username' => ['required', "min:4"],
            'password' => ['required','min:8'],
            'repassword' => ['required','same:password'],
            'img' => ['required','image', 'max:2024']
        ];
        $messages = [
            'username.required' => 'Username không được để trống',
            'username.min' => 'Username phải nhập ít nhất 4 ký tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 8 kí tự',
            'repassword.required' => 'Chưa nhập lại mật khẩu',
            'repassword.same' => 'Mật khẩu nhập lại chưa đúng',
            'img.required' => 'chưa chọn ảnh đại diện',
            'img.image' => 'Phải upload định dạng ảnh',
            'img.max' => 'Ảnh đại diện dung lượng không được > 2Mb'
        ];
        $this->validate($request, $rules, $messages);

            $imgFileName = '';
            if (!empty($request->img)) {
                $img = $request->img;
                $imgFileName = time().'-' . $img->getClientOriginalName();
                $img->move(public_path('uploads'), $imgFileName);
            }


            //lưu vào cơ sở dữ liệu, sử dụng Eloquent ORM
            $adminModel = new Admin();
            $adminModel->username = $request->get('username');
            $adminModel->password = md5($request->get('password'));
            $adminModel->role_id = $request->get('role_id');
            $adminModel->img = $imgFileName;
            if ($adminModel->save()) {
                session()->put('success', "Thêm tài khoản thành công");
            } else {
                session()->put('error', 'Thêm tài khoản thất bại');
            }
            return redirect('/admin/index');

    }

    public function detail($id)
    {
        $admin = Admin::getByIdRelation($id);

        return view('backend.admins.detail', [
            'admin' => $admin
        ]);
    }

    public function update($id)
    {
        $roles = Role::select(['id', 'name'])->get();
        $admin = Admin::getByIdRelation($id);

        return view('backend.admins.update', [
            'admin' => $admin,
            'roles' => $roles
        ]);
    }

    public function edit(Request $request, $id)
    {
        $admin = Admin::getByIdRelation($id);
        $rules = [
            'username' => ['required', "min:4"],
            'password' => ['required','min:8'],
            'repassword' => ['required','same:password'],
            'img' => ['image', 'max:2024']
        ];
        $messages = [
            'username.required' => 'Username không được để trống',
            'username.min' => 'Username phải nhập ít nhất 4 ký tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 8 kí tự',
            'repassword.required' => 'Chưa nhập lại mật khẩu',
            'repassword.same' => 'Mật khẩu nhập lại chưa đúng',
            'img.image' => 'Phải upload định dạng ảnh',
            'img.max' => 'Ảnh đại diện dung lượng không được > 2Mb'
        ];
        $this->validate($request, $rules, $messages);
            $imgFileName = $admin->img;

            if (!empty($request->img)) {
                //xóa ảnh cũ nếu đã tồn tại
                @unlink(public_path('uploads' . '/' . $imgFileName));
                $img = $request->img;
                //đặt lại tên file ảnh, để đảm bảo ảnh ko bị trùng
                $imgFileName = time().'-'.$img->getClientOriginalName();
                //lưu ảnh lên thư mục public/uploads
                $img->move(public_path('uploads'), $imgFileName);
            }
            //lưu vào cơ sở dữ liệu, sử dụng Eloquent ORM
            $admin->username = $request->get('username');
            $admin->password = md5($request->get('password'));
            $admin->role_id = $request->get('role_id');
            $admin->img = $imgFileName;

            if ($admin->save()) {
                session()->put('success', "Update tài khoản thành công");
            } else {
                session()->put('error', 'Update tài khoản thất bại');
            }

            return redirect('/admin/index');


    }

    public function delete($id)
    {
        $admin = Admin::find($id);
        if ($admin->delete()) {
            session()->put("success", "Xóa tài khoản id = $id thành công");
        } else {
            session()->put('error', "Xóa tài khoản id = $id thất bại");
        }
        return redirect('admin/index');
    }
}
