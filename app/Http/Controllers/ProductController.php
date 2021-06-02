<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getList(){
        $product = Product::all();
        return view('admin.product.list', compact('product'));
    }

    //  them san pham
    public function getAdd(){
        $category = ProductType::all();
        return view('admin.product.add', compact('category'));
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'name'=>'required|unique:products,name',
                'description'=>'required',
                'unit_price'=>'required',
                'promotion_price'=>'required',
                'unit'=>'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập ',
                'description.unique' => 'Tiêu đề đã ',
                'unit_price.required' => 'Bạn chưa nhập ',
                'promotion_price.required' => 'Bạn chưa nhập ',
                'unit.required' => 'Bạn chưa nhập '
            ]);
        $product = new Product();

        $product->name = $request->name;
        $product->id_type = $request->product_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->new = 1;
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
            $product->image = $image;
        }else{
            $product->image = "";
        }
        $product->save();
        return redirect()->route('product.list')->with('message', 'thêm thành công');
    }

    //  Chinh sua san pham
    public function getEdit($id){
        $product = Product::find($id);
        $category = ProductType::all();
        return view('admin.product.edit', compact('product', 'category'));
    }
    public function postEdit(Request $request, $id){
        $product = Product::find($id);
        $this->validate($request,
            [
                'name'=>'required',
                'description'=>'required',
                'unit_price'=>'required',
                'promotion_price'=>'required',
                'unit'=>'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập ',
                'description.unique' => 'Tiêu đề đã ',
                'unit_price.required' => 'Bạn chưa nhập ',
                'promotion_price.required' => 'Bạn chưa nhập ',
                'unit.required' => 'Bạn chưa nhập '
            ]);

        $product->name = $request->name;
        $product->id_type = $request->product_type;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->unit = $request->unit;
        $product->new = 1;
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
            $product->image = $image;
        }else{
            $product->image = "";
        }
        $product->save();
        return redirect()->route('product.list')->with('message', 'Sua thành công');

    }

    //  xoa san pham
    public function getDelete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'xoa san pham thành công');
    }
}
