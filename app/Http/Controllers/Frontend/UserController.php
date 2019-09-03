<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;


class UserController extends Controller
{
    public function create()
    {
        return view('frontend/users/registration');
    }

    public function registration(Request $request)
    {
        $rules = [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required','min:8'],
            'repassword' => ['required','same:password'],
            'img' => ['required','image', 'max:2024']
        ];
        $messages = [
            'first_name.required' => 'FirstName không được để trống',
            'last_name.required' => 'LastName không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
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
        $UserModel = new User();
        $UserModel->first_name = $request->get('first_name');
        $UserModel->last_name = $request->get('last_name');
        $UserModel->email = $request->get('email');
        $UserModel->password = md5($request->get('password'));
        $UserModel->img = $imgFileName;
        if ($UserModel->save()) {
            session()->put('success', "Đăng ký thành công!");
        } else {
            session()->put('error', 'Đăng ký không thành công');
        }
        return redirect('/');

    }


}
