<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    public function login(){
        return view("shop.user.login");
    }
    public function registration(){
        return view("shop.user.registration");
    }
    //
    public function User(){
        
    }   
}
