<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class TestDBController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {

        // DB::insert('insert into users (id, name, email, password) values (?, ?, ? , ? )',
        //     [3, 'Laravel','laravel@test.com','123456']);
        // DB::insert('insert into users (id, name, email, password) values (?, ?, ?, ? )',
        //     [4, 'Academy','academy@test.com','123456']);
            
        // $user = DB::select('select * from users where id = ?', [3]);
        $user = DB::select('select * from users where id = :id', [':id'=>4]);
        dd($user);
        
        // $affected = DB::update('update users set name="LaravelAcademy" where name = ?',
        //     ['Academy']);
        // echo $affected;

        // $deleted = DB::delete('delete from users where id = :id', ['id'=>4]);
        // echo $deleted;
    }

    public function index2()
    {
        // DB::table('users')->insert([
        //     ['id'=>3,'name'=>'Laravel','email'=>'laravel@test.com','password'=>'123456'],
        //     ['id'=>4,'name'=>'Academy','email'=>'academy@test.com','password'=>'123456'],
        // ]);

        // $insertId = DB::table('users')->insertGetId(
        //     ['name'=>'Laravel-Academy','email'=>'laravelacademy@test.com','password'=>'456']
        // );
        // dd($insertId);

        // $affected = DB::table('users')->where('name','Laravel-Academy')->update(['password'=>'123456']);
        // dd($affected);
        
        // $deleted = DB::table('users')->where('id', '>', 2)->delete();
        // dd($deleted);

        // //查询
        // $users = DB::table('users')->get();
        // $users = DB::table('users')->select('name','email')->get();
        // dd($users);
        // 
        // $user = DB::table('users')->where('name','Laravel')->first();
        // dd($user);
        // 
        // DB::table('users')->chunk(2,function($users){
        //     foreach($users as $user){
        //         // if($user->name=='LaravelAcademy')
        //             // return false;
        //         echo $user->name.'<br>';
        //     }
        // });
        // 
        // $users = DB::table('users')->lists('name');
        // dd($users);
        // 
        // //关联查询
        // $users = DB::table('users')->join('posts','users.id','=','posts.user_id')->get();
        // $users = DB::table('users')->leftJoin('posts','users.id','=','posts.user_id')->get();
        // $users = DB::table('users')->join('posts',function($join){
        //     $join->on('users.id','=','posts.user_id')
        //          ->where('posts.id','>',1);
        // })->get();
        // 
        // $users = DB::table('users')->where('id','<',2);
        // $users = DB::table('users')->where('id','>',3)->union($users)->get();
        // 
        // $users = DB::table('users')->where('name','=','Laravel')->get();
        // $users = DB::table('users')->where('name','=','Laravel')->where('id','>','2')->get();
        // $users = DB::table('users')->where('name','=','Laravel')->orWhere('id','=','2')->get();
        // 
        // $users = DB::table('users')->orderBy('id','desc')->get();
        //
        // dd($users);

        // 分组,统计每个分类下有几篇文章
        // $posts = DB::table('posts')->select('cat_id',DB::raw('COUNT(id) as num'))
        //     ->groupBy('cat_id')->get();
        // 分组加上条件,统计总浏览数大于500的分类
        // $posts = DB::table('posts')->select('cat_id',DB::raw('SUM(views) as views'))
        //     ->groupBy('cat_id')->having('views','>',700)->get();
        //     
        // 分页 skip-起始条数 take-每页显示条数
        $posts = DB::table('posts')->skip(0)->take(2)->get();
        dd($posts);


    }

}
