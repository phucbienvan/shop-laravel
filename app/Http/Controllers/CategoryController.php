<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getList(){
        $category = ProductType::all();
        return view('admin.category.list', compact('category'));
    }

    //  Them danh muc san pham
    public function getAdd(){
        return view('admin.category.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'name'=>'required|unique:type_products,name',
                'description'=>'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập danh muc',
                'name.unique' => 'Danh muc đã tồn tại',
                'description.required' => 'Bạn chưa nhập ',
            ]);
        $category = new ProductType();
        $category->name = $request->name;
        $category->description = $request->description;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->getClientOriginalExtension();
            //  kiem tra duoi file
            if ($path != 'jpg' && $path != 'png') {
                return redirect()->back()->with('message', 'Bạn phải chọn file ảnh');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;

            // Tranh trung ten image
            while (file_exists("source/image/product" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move("source/image/product", $image);
            $category->image = $image;
        }else{
            $category->image = "";
        }
        $category->save();
        return redirect()->route('category.list')->with('message', 'thêm thành công');
    }

    //  xoa danh muc san pham
    public function getDelete($id){
        $category = ProductType::find($id);
        $category->delete();
        return redirect()->back()->with('message', 'xoa danh muc thành công');
    }

    //  chinh sua danh muc san pham
    public function getEdit($id){
        $category = ProductType::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function postEdit(Request $request,$id){
        $category = ProductType::find($id);

        $this->validate($request,
            [
                'name'=>'required|',
                'description'=>'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tiêu đề',
                'description.required' => 'Bạn chưa nhập mo ta',
            ]);
        $category->name = $request->name;
        $category->description = $request->description;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->getClientOriginalExtension();
            $fileHopLe = ['png', 'jpg', 'jepg'];
            if($path != $fileHopLe){
                return redirect()->back()->with('message', 'Bạn phải chọn file ảnh');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;

            // Tranh trung ten image
            while (file_exists("source/image/product" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move("source/image/product", $image);
            $category->image = $image;
        }
        $category->save();
        return redirect()->route('category.list')->with('message', 'Sửa danh muc thành công');
    }
}
