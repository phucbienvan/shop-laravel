<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $category = ProductType::all();
        return view('admin.category.list', compact('category'));
    }

    //  Dang nhap admin
    public function getLoginAdmin(){
        return view('admin.login');
    }
    public function postLoginAdmin(Request $request){
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Bạn chưa nhập email ',
                'password.required' => 'Bạn chưa nhập mat khau'
            ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->route('category.list');
        }
        else
            return redirect()->back()->with('message','Đăng Nhập không thành công!');
    }

    // Dang xuat
    public function getLogoutAdmin(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
