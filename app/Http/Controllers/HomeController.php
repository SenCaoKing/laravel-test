<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 打印 session
        dump(session()->all());

        // 获取登录用户 id
        // $userId = Auth::id();
        dump(\Auth::id());

        // 获取用户完整信息
        dump(\Auth::user());
        return view('home');
    }
}
