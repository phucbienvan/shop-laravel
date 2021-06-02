<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getList(){
        $user = User::all();
        return view('admin.user.list', compact('user'));
    }
    public function getAdd(){
        return view('admin.user.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'name'=>'required|unique:users,name',
                'email'=>'required',
                'password'=>'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tiêu đề',
                'name.unique' => 'Tiêu đề đã tồn tại',
                'email.required' => 'Bạn chưa nhập email',
                'password.required' => 'Bạn chưa nhập mat khau '
            ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('user.list')->with('message', 'Thêm thành công');
    }

    // Chinh sua user
    public function getEdit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function postEdit(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('user.list')->with('message', 'Sửa user thành công');
    }


}
