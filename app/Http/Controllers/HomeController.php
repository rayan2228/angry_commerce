<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('welcome',[
            "categories" => Category::where("status",1)->get(),
            "brands" => Brand::where("brand_status",1)->get(),
        ]);
    }
}
