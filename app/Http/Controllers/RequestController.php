<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

class RequestController extends Controller
{    
    /**
     * 测试网址http://laravel.app/request/test/2?name=bbbb
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function test(Request $request)
    {
        $url = $request->path();    //request/test/2
        $url = $request->url();     //http://laravel.app/request/test/2
        $url = $request->fullUrl(); //http://laravel.app/request/test/2?name=bbbb
        //http://laravel.app/request/test/2/?name=bbbb&bar=ba
        $url = $request->fullUrlWithQuery(['bar' => 'baz']);

        if ($request->is('request/*')) {
            // return 'url is request/*';
        }

        $method = $request->method();
        if ($request->isMethod('GET')) {
            // return $method;
        }

        $name = $request->input('name');
        $name = $request->name;
        $name = $request->input('name', 'Sally');
        if ($request->has('name')) {
            // return $request->name;
        }
        $input = $request->all();
        $input = $request->only(['username', 'password']);
        $input = $request->except(['credit_card']);

        return $input;
    }

    /**
     * //暂存request值
     * 跳转路由带上次输入的参数值
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getLastRequest(Request $request)
    {
        // $request->flash();
        return redirect('/current-request')->withInput();
    }

    /**
     * 获取上次的request值
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getCurrentRequest(Request $request)
    {
        $lastRequestData = $request->old();
        echo '<pre>';
        print_r($lastRequestData);
    }

    public function getCookie(Request $request){
        // $cookies = $request->cookie();
        // dd($cookies);
        $cookie = $request->cookie('website');
        echo $cookie;
    }

    public function getAddCookie(){
        $response = new Response();
        //第一个参数是cookie名，第二个参数是cookie值，第三个参数是有效期（分钟）
        $response->withCookie(cookie('website','LaravelAcademy.org',1));
        //如果想要cookie长期有效使用如下方法
        //$response->withCookie(cookie()->forever('name', 'value'));
        return $response;
    }

    //文件上传表单
    public function getFileUpload()
    {
        $postUrl = '/request/file-upload';
        $csrf_field = csrf_field();
        $html = <<<CREATE
    <form action="$postUrl" method="POST" enctype="multipart/form-data">
    $csrf_field
    <input type="file" name="file"><br/><br/>
    <input type="submit" value="提交"/>
    </form>
CREATE;
        return $html;
    }

    //文件上传处理
    public function postFileUpload(Request $request){
        //判断请求中是否包含name=file的上传文件
        if (!$request->hasFile('file')) {
            exit('上传文件为空！');
        }
        $file = $request->file('file');
        //判断文件上传过程中是否出错
        if (!$file->isValid()) {
            exit('文件上传出错！');
        }
        $destPath = realpath(public_path('images'));
        if (!file_exists($destPath))
            mkdir($destPath,0755,true);
        $filename = $file->getClientOriginalName();
        if (!$file->move($destPath,$filename)) {
            exit('保存文件失败！');
        }
        exit('文件上传成功！');
    }
}
