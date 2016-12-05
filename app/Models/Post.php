<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // 默认可删除
    // public $table = 'posts';
    // 默认可删除
    // public $primaryKey = 'id';
    // 取消时间created_at,updated_at自动管理
    // public $timestamps = false;
    // 设置日期时间格式为Unix时间戳
    protected $dateFormat = 'U';
    
    // 黑名单
    protected $guarded = ['views','user_id'];
    // 白名单
    // $fillable
    
    //使用软删除
    use SoftDeletes; 
    protected $dates = ['delete_at'];

    //查询作用域-将一些常用的查询封装到模型方法中，方便调用
    public function scopePopular($query)
    {
        return $query->where('views','>=',400);
    }

    public function scopeStatus($query,$status=1)
    {
        return $query->where('status',$status);
    }

    // 定义文章属于作者的关联
    public function author()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

}

