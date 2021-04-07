<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use App\Category;

class HomeController extends Controller
{

    //Lay banner va danh sach menu
    public function __construct()
    {
        $categories = Category::where('is_active', 1)->get();
        $this->categories = $categories;

        $banners = Banner::where('is_active', 1)->get();
        view()->share(['banners' => $banners, 'categories' => $categories ]);
    }

    public function notfound ()
    {
        return view('home.not_found');
    }
}
