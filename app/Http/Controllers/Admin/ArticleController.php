<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;
use DB;

class ArticleController extends Controller
{
    public function index()
    {
        // return view('admin/article/index')->withArticles(Article::all());
 
        //使用查询构建器进行简单分页，每页显示3条记录
        // $articles = DB::table('articles')->simplePaginate(2);
        // $articles = DB::table('articles')->paginate(2);
        $articles = Article::where('id','>',0)->paginate(2);
        return view('admin/article/index',['articles'=>$articles]);
    }

    public function create()
    {
        return view('admin/article/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles|max:20',//汉字或字母的个数
            'body' => 'required',
        ]);

        $article = new Article;
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;

        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    public function edit($id)
    {
        return view('admin/article/edit')->withArticle(Article::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:articles,title,'.$id.'|max:255',
            'body' => 'required', 
        ]);

        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');

        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');
        }
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article->delete()) {
            return redirect()->back()->withErrors('删除成功！');
        } else {
            return redirect()->back()->withErrors('删除失败！');
        }
    }
    
}
