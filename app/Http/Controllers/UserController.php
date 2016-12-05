<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    /**
     * 添加一个 UserController 实例。
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');

        // $this->middleware('log', ['only' => ['fooAction', 'barAction']]);

        // $this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
    }

    /**
     * 显示指定用户的个人数据。
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id)
    {
        return view('user/profile', ['user' => User::findOrFail($id)]);
    }

    /**
     * 保存新的用户。
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');

        //
    }

    /**
     * 更新指定的用户。
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function account()
    {
        $account = User::find(1)->account;
        dd($account);
    }

    public function getRoles($id)
    {
        $user = User::find($id);
        $roles = $user->roles;
        echo 'User#'.$user->name.'所拥有的角色：<br>';
        foreach($roles as $role)
        {
            echo $role->name.'<br>';
        }
    }

    public function getRolesId($id)
    {
        $roles = User::find($id)->roles;
        foreach ($roles as $role) {
            echo $role->pivot->role_id.'<br>';
        }
    }
}
