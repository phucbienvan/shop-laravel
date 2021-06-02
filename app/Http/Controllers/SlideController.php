<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function getList(){
        $slide = Slide::all();
        return view('admin.slide.list', compact('slide'));
    }

    // them slide
    public function getAdd(){
        return view('admin.slide.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'link'=>'required'
            ],
            [
                'link.required' => 'Bạn chưa nhập nội dung'
            ]);
        $slide = new Slide();
        $slide->link = $request->link;
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
            while (file_exists("source/image/slide/" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move("source/image/slide/", $image);
            $slide->image = $image;
        }else{
            $slide->image = "";
        }
        $slide->save();
        return redirect()->route('slide.list')->with('message', 'Thêm thành công');
    }

    //  chinh sua slide
    public function getEdit($id){
        $slide = Slide::find($id);
        return view('admin.slide.edit', compact('slide'));
    }

    public function postEdit(Request $request, $id){
        $slide = Slide::find($id);
        $this->validate($request,
            [
                'link'=>'required'
            ],
            [
                'link.required' => 'Bạn chưa nhập link'
            ]);
        $slide->link = $request->link;

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
            while (file_exists("source/image/slide/" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move("source/image/slide/", $image);
            $slide->image = $image;
        }
        $slide->save();
        return redirect()->route('slide.list')->with('message', 'Sửa slide thành công');
    }
    public function getDelete($id){
        $slide = Slide::find($id);
        $slide->delete();
        return redirect()->back()->with('message', 'xoa slide thành công');
    }

}
