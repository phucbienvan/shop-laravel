<?php

namespace App\Http\Controllers;

use App\Product;
use App\Slide;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){

        // in ra slide
        $slide = Slide::all();
//        var_dump($slide);
//        die();

        //san pham moi
        $new_product = Product::where('new', 1)->paginate(4); //paginate dung de phan trang
        $product = Product::where('id', '>', 0)->paginate(12);


        return view('page.home', compact('slide', 'new_product', 'product'));
    }
    public function getCategory(){
        return view('page.category');
    }

    public function getProduct(){
        return view('page.product');
    }

    public function getContact(){
        return view('page.contact');
    }

    public function getAbout(){
        return view('page.about');
    }
}
