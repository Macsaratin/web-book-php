<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //  đăng nhập
    public function login()
    {
        return view('auth.login');
    }

    public function dologin(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $credentials = [
            'password' => $request->password,
            'status' => 1, 
        ];

        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->username;
        } else {
            $credentials['username'] = $request->username;
        }

        if (Auth::attempt($credentials)) {
            // Lưu thông tin người dùng vào session
            $user = Auth::user();
            session(['isLoggedIn' => true, 'username' => $user->name]);

            return redirect()->route('shop.home');
        } else {
            return redirect()->route('auth.login')->with('message', 'Login failed!');
        }
    }

    //  đăng xuất
    public function logout()
    {
        Auth::logout();
        session()->flush();  // Xóa tất cả thông tin session

        return redirect()->route('shop.home');
    }

    //  đăng ký
    public function registration()
    {
        return view('auth.register');
    }

    public function doregistration(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect()->route('auth.login');
    }

    //tài khoản
    public function account()
        {
            if (!session('isLoggedIn')) {
                return redirect()->route('auth.login');
            }

            return view('shop.user.account');
        }



}
