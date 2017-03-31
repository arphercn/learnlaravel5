<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::auth();

Route::get('welcome', 'HomeController@index');
// Route::get('about', 'HomeController@about');
Route::get('about', function () {
    $user = Auth::loginUsingId(1);
    return view('about');
});

Route::get('/', 'ArticleController@index');
Route::get('article', 'ArticleController@index');
Route::get('article/{id}', 'ArticleController@show')->name('article')->where('id', '[0-9]+');
Route::get('article1', function(){
    return redirect()->route('article',['id'=>1]);
});
Route::get('article2', function(){
    return redirect()->action('ArticleController@show',[2]);
});

Route::post('comment', 'CommentController@store');


Route::group(
    ['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth', 'as' => 'admin::'],
    function() {
        Route::get('/', 'HomeController@index')->name('dashboard');
        // Route::get('article', 'ArticleController@index');
        Route::resource('article', 'ArticleController');
});


Route::group(['middleware'=>'test'], function(){
    Route::get('write/laravelacademy', function(){
        //使用Test中间件
    });
    Route::get('update/laravelacademy', function(){
       //使用Test中间件
    });
});
Route::get('age/refuse', ['as'=>'refuse', function(){
    return "未成年人禁止入内！";
}]);


Route::get('request/test/{id}', 'RequestController@test');
Route::get('request/last-request', 'RequestController@test@getLastRequest');
Route::get('request/current-request', 'RequestController@getCurrentRequest');
Route::get('request/cookie', 'RequestController@getCookie');
Route::get('request/add-cookie', 'RequestController@getAddCookie');
Route::get('request/file-upload', 'RequestController@getFileUpload');
// 前面要加/,不然上传地址找不到
Route::post('/request/file-upload', 'RequestController@postFileUpload');

Route::get('testResponse',function(){
    $content = 'Hello LaravelAcademy！';
    $status = 200;
    $value = 'text/html;charset=utf-8';
    return response($content,$status)->header('Content-Type',$value);
});
Route::get('testResponseCookie',function(){
    $content = 'Hello LaravelAcademy！';
    $status = 200;
    $value = 'text/html;charset=utf-8';
    //设置cookie有效期为30分钟，作用路径为应用根目录，作用域名为laravel.app
    return response($content,$status)->header('Content-Type',$value)
        ->withCookie('site','LaravelAcademy.org',30,'/','laravel.app');
});
Route::get('testResponseView',function(){
    return view('response/hello',['message'=>'Hello LaravelAcademy']);
});
Route::get('testResponseJson',function(){
    return response()->json(['name'=>'LaravelAcademy','passwd'=>'LaravelAcademy.org']);
});
Route::get('testResponseJsonp',function(){
    return response()->json(['name'=>'LaravelAcademy','passwd'=>'LaravelAcademy.org'])
        ->setCallback(request()->input('callback'));
});

Route::get('testResponseDownload',function(){
    return response()->download(
        realpath(base_path('public/images')).'/laravel-5-1.jpg',
        'Laravel学院.jpg'
    );
});


Route::resource('test','TestController');

Route::get('testdb', 'TestDBController@index2');

Route::get('post', 'PostController@index');
Route::get('post/store', 'PostController@store');
Route::get('post/update', 'PostController@update');
Route::get('post/destroy', 'PostController@destroy');
Route::get('post/trash', 'PostController@trash');
Route::get('post/restore', 'PostController@restore');
Route::get('post/author', 'PostController@getAuthor'); // 多对一


Route::get('user/account', 'UserController@account'); // 一对一
Route::get('user/{id}/roles', 'UserController@getRoles'); // 多对多
Route::get('user/{id}/roles-id', 'UserController@getRolesId');
Route::get('user/{id}', 'UserController@showProfile');
Route::put('user/{id}', 'UserController@update');

Route::get('role/{id}/users', 'RoleController@getUsers'); // 多对多
// 远层一对多 - 在ContryController通过一个中间对象User访问远层的关联关系Posts,
Route::get('country/{id}/posts', 'CountryController@getPosts');

// 多态关联 - 允许一个模型Comment在单个关联下属于多个不同父模型Article,Video
Route::get('video/{id}/comments', 'VideoController@getComments');


Route::get('article/log', 'ArticleController@log');