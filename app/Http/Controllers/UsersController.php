<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    // 用户注册
    public function create()
    {
        return view('users/create');
    }

    // 用户登录
    public function login()
    {
        return view('users/login');
    }

    public function show(User $user)
    {
        if (\request('test') == 1) {
            dump($user->toArray());
        }

        return view('users/show', compact('user'));
    }
}
