<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
//        var_dump($slide);
//        die();
        return view('page.home', compact('slide'));
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
