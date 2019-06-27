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
            exit;
        }

        return view('users/show', compact('user'));
    }

    // 注册页面
    public function create()
    {
        return view('users/create');
    }

    // 执行注册
    public function store(Request $request)
    {
        // 用户输入验证
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
        ]);
        // 创建用户到mysql
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->email),
        ]);
        // 下次请求，session()->flash中的信息只存在一次
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        // 跳转到用户信息页
        return redirect(route('users.show', [$user->id]));
    }

}
