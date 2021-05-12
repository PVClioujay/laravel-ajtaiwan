<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * loging首頁
     */
    public function index()
    {
        //
        return view('login/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 建立使用者
     */
    public function check(Request $res)
    {
        $credentials = $res->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('login');
        } else {
            return redirect('login')->withErrors([
                'error' => 'The provided credentials do not match our records.',
            ]);
        }
    }
}
