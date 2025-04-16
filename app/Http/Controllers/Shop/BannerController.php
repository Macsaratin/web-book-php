<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    //

    public function banner(){
        $banners = Banner::where('status', 1)->get();
        return view("shop.banner.banner", compact("banners"));
    }
}
