<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    // 登录页面
    public function login()
    {
        return view('users/login');
    }

    // 用户信息页面
    public function show(User $user)
    {
        if (\request('test') == 1) {
            dump($user->toArray());
        }

        return view('users/show', compact('user'));
    }

    // 注册页面
    public function create()
    {
        return view('users/create');
    }

    // 执行注册
    public function store()
    {
        dump(\request());
    }

}
