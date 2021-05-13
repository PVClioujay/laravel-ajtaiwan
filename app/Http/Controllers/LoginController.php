<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        return view('member/login/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * login 檢查
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

    public function reset(Request $res)
    {
        $searchUser = User::where('email', $res->email)->first();

        $validator = Validator::make($res->all(), [
            'email' => 'required',
        ]);

        if (empty($searchUser)) {
            return view('member/reset', ['msg' => 'Email not Exsit']);
        } else {
            User::where('email', $searchUser->email)
                ->update(['password' => Hash::make($res->password)]);
            return view('member/reset', ['msg' => 'password reset success']);
        }

        return redirect('reset')
            ->withErrors($validator)
            ->withInput();
    }

    public function logout(Request $res)
    {
        Auth::logout();
        return redirect('login');
    }
}
