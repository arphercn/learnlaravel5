<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Permission;

class Role extends Model
{
    
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    //给角色添加权限
    public function givePermissionTo($permission)
    {
        return $this->permissions()->save($permission);
    }
}
