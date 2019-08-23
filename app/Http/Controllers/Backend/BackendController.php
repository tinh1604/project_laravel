<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    public function __construct(Request $request)
    {
        if (!session()->get("admin") && $request->path() != 'admin/login') {
            session()->put("error", "Bạn cần đăng nhập để sử dụng hệ thống");
            return redirect('/admin/login')->send();
        }

    }

}
