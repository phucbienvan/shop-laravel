<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\ProductType;
use App\Slide;
use Session;
use Illuminate\Http\Request;

class PageController extends Controller
{

    // trang chu
    public function getIndex(){
        // in ra slide
        $slide = Slide::all();
//        var_dump($slide);
//        die();
        //san pham moi
        $new_product = Product::where('new', 1)->paginate(4); //paginate dung de phan trang
        $product = Product::where('id', '>', 0)->paginate(12,['*'],'pag');
        return view('page.home', compact('slide', 'new_product', 'product'));
    }

    //danh muc san pham
    public function getCategory($type){
        $cate_pro = Product::where('id_type', $type)->get(); //san pham the danh muc san pham
        $product_other = Product::where('id_type', '<>', $type)->paginate(3); //san pham khác
        $category = ProductType::all();
        $category_name = ProductType::where('id', $type)->first();
        return view('page.category', compact('cate_pro', 'product_other', 'category', 'category_name'));
    }

    // chi tiet san phẩm
    public function getProduct($id){
        $product = Product::where('id', $id)->first();
        $product_similar= Product::where('id_type', $product['id_type'])->paginate(3);
        return view('page.product', compact('product', 'product_similar'));
    }

    //lien he
    public function getContact(){
        return view('page.contact');
    }

    // gioi thieu
    public function getAbout(){
        return view('page.about');
    }

    //  them san pham vao gio hang
    public function getAddToCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
}
