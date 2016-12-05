<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //获取多个Eloquent模型
        // $posts = Post::all();
        // id<3的条件下每页显示2条 按倒序
        // $posts = Post::where('id','<',3)->orderBy('id','desc')->take(2)->get();
        // 查询结果包含软删除模型
        // $posts = Post::withTrashed()->get();
        // 只想要查看被软删除的模型
        // $posts = Post::onlyTrashed()->get();
        // dd($posts);
        // 
        // Post::chunk(2,function($posts){
        //     foreach ($posts as $post) {
        //         echo $post->title.'<br>';
        //     }
        // });
        // 调用查询作用域的popular()
        // $posts = Post::popular()->orderBy('views','desc')->get();
        $posts = Post::popular()->status(1)->orderBy('views','desc')->get();
        foreach ($posts as $post) {
            echo '&lt;'.$post->title.'&gt; '.$post->views.'views<br>';
        }
         
        // 获取单个模型
        // $post = Post::where('id',1)->first();
        // $post = Post::find(2);
        // 
        // $post = Post::findOrFail(4);
        // dd($post); 

        // $count = Post::where('id','>',0)->count();
        // echo $count;

        // $views = Post::where('id','>',0)->max('views');
        // echo $views;
    }

    public function store()
    {
        $input = [
            'title'=>'test 4',
            'content'=>'test content 4',
            'cat_id'=>1,
            'views'=>100,
            'user_id'=>2
        ];
        $post = Post::create($input);
        $post->user_id = 2;
        $post->views = 100;
        $post->save();
        dd($post);

        // 其他插入数据的方法——firstOrCreate和firstOrNew
        // 两者都是先通过通过传入属性值在数据库中查找匹配记录，如果没有找到则创建一个新的模型实例，不同之处在于后者不会将数据持久化到数据库，需要调用save方法才行。
    }

    public function update()
    {
        $input = [
            'title'=>'test 44',
            'content'=>'test content 44',
            'cat_id'=>1,
            'views'=>200,
            'user_id'=>1
        ];
        // $post = Post::find(4);
        $post = Post::where('title','test 4')->firstOrFail();
        $post->user_id = 2;
        $post->views = 100;
        if($post && $post->update($input) && $post->save()){
            echo '更新文章成功！';
            dd($post);
        }else{
            echo '更新文章失败！';
        }
    }

    public function destroy()
    {
        // $deleted = Post::destroy(5);
        // $deleted = Post::destroy([1,2,3,4,5]);
        
        // $deleted = Post::where('views', 0)->delete();

        // $post = Post::findOrFail(14);
        $post = Post::where('title','test 4')->firstOrFail();
        $post->delete();

    }

    // 软删除
    public function trash()
    {
        // $post = Post::find(1);
        $post = Post::where('title','test 4')->firstOrFail();
        $post->delete();
        if($post->trashed()){
            echo '软删除成功！';
            dd($post);
        }else{
            echo '软删除失败！';
        } 
    }

    // 软删除恢复
    public function restore()
    {
        Post::withTrashed()->where('id','>',0)->restore();
    }

    // 打印文章的作者
    public function getAuthor()
    {
        $author = Post::find(1)->author;
        dd($author);
    }
}
