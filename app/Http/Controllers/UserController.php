<?php

namespace App\Http\Controllers;

use App\Models\User;
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
                'phone'=>'required',
                'address'=>'required',
                'password'=>'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập ten',
                'name.unique' => 'Ten đề đã tồn tại',
                'email.required' => 'Bạn chưa nhập email',
                'phone.required' => 'Bạn chưa nhập phone',
                'address.required' => 'Bạn chưa nhập address',
                'password.required' => 'Bạn chưa nhập mat khau '
            ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->level = $request->level;

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
