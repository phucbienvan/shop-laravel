<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function __construct()
    {
        $category = ProductType::all();
        view()->composer(['layout.header', 'page.checkout'],function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,
                    'totalQty'=>$cart->totalQty]);
            }
        });
        view()->share('category',$category);
    }

    // trang chu
    public function getIndex(){
        // in ra slide
        $slide = Slide::all();
        //san pham moi
        $new_product = Product::where('new', 1)->paginate(4); //paginate dung de phan trang, san pham moi
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
        $product_similar= Product::where('id_type', $product['id_type'])->paginate(3); // san pham tuong tu
        $product_other = Product::where('id_type', '<>', $product->id_type)->paginate(3); //san pham khác
//        var_dump($product_other);
//        die();
        return view('page.product', compact('product', 'product_similar', 'product_other'));
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
        if ($product != null){
            $oldCart = Session('cart') ? Session('cart'):null;
            $cart = new Cart($oldCart);
            $cart ->add($product, $id);
            $req->session()->put('cart',$cart);
            return redirect()->back();
        }
    }

    //  xoa san pham khoi gio hang
    public function getDeleteCart($id){
        $oldCart = Session('cart') ? Session('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        Session::put('cart', $cart);
        return redirect()->back();
    }

    //  checkout
    public function getCheckout(){
        return view('page.checkout');
    }
    public function postCheckout(Request $request){
        $cart = Session::get('cart');
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->note = $request->note;
        $customer->save();

        $bill = new Bill();
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment;
        $bill->note = $request->note;
        $bill->save();

        foreach ($cart->items as $key => $value){
            $bill_detail = new BillDetail();
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['promotion_price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('message', 'Đặt hàng thành công');
    }



    // Dang ki khach hang
    public function getRegisterCustomer(){
        return view('page.register_customer');
    }
    public function postRegisterCustomer(Request $request){
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
        $user->level =0;
        $user->save();
        return redirect()->route('login.customer')->with('message', 'Thêm thành công');
    }

    // Dang nhap khach hang
    public function getLoginCustomer(){
        return view('page.login');
    }
    public function postLoginCustomer(Request $request){
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
            return redirect()->route('home');
        }
        else
            return redirect()->back()->with('message','Đăng Nhập không thành công!');
    }

    //  Dang xuat nguoi dung
    public function getLogoutCustomer(){
        Auth::logout();
        return redirect('/');
    }
}
