<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getList(){
        $bill = Bill::all();
        return view('admin.cart.list', compact('bill'));
    }
    public function getEdit($id){
        $cart = Bill::find($id);
        return view('admin.cart.edit', compact('cart'));
    }
    public function postEdit($id, Request $request){
        $cart = Bill::find($id);
        $cart->status = $request->status;
        $cart->save();
        return redirect()->route('cart.list')->with('message', 'Chinh sua thanh cong');
    }
}
