<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $category = ProductType::all();
        return view('admin.category.list', compact('category'));
    }

}
