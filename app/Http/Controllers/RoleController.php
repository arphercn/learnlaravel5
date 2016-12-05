<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Role;

class RoleController extends Controller
{
    
    public function getUsers($id)
    {
        $role = Role::find($id);
        $users = $role->users;
        echo 'Role#'.$role->name.'下面的用户：<br>';
        foreach ($users as $user) {
            echo $user->name.'<br>';
        }
    }
}
