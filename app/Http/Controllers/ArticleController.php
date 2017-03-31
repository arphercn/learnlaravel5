<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Article;
use Monolog\Logger as Log;


class ArticleController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('article/index')->withArticles(Article::all());
    }

    public function show($id)
    {
        return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));
    }

    // 在App/Exceptions/Handler.php设置
    public function log()
    {
        // $articles = Article::findOrFail(100); // 不产生错误日志
        // dd($article);
        // $num = 1/0; // 产生错误日志
        // abort(403,'对不起，您无权访问该页面！');
        
        Log::emergency("系统挂掉了");
        Log::alert("数据库访问异常");
        Log::critical("系统出现未知错误");
        Log::error("指定变量不存在");
        Log::warning("该方法已经被废弃");
        Log::notice("用户在异地登录");
        Log::info("用户xxx登录成功");
        Log::debug("调试信息");
    }
    
}
