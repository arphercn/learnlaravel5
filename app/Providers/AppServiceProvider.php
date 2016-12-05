<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //视图间共享数据
        view()->share('sitename','Laravel学院');

         // 使用闭包型态的视图组件...,article/index指视图目录,前面不加/
        view()->composer(['about','article/index'],function($view){
            $view->with('user',array('name'=>'test','avatar'=>'/path/to/test.jpg'));
        });

        //模型事件,...App前面加\指根目录
        \App\Models\Post::deleting(function($post){
            //echo 'deleting event is fired<br>';
            if($post->user_id==1) {
                echo '管理员的文章不能删除';
                return false;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
