<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <?php echo route('article', ['id'=>2]) ?><br>
                <?php echo route('admin::dashboard') ?><br>
                <?php echo action('HomeController@index') ?><br>
                <?php echo action('Admin\ArticleController@create') ?><br>
                <?php echo Route::currentRouteAction() ?><br>
            </div>
        </div>
        欢迎来到{{ $sitename }}！<br>
        用户名:{{ $user['name'] }}<br>
        用户头像:{{ $user['avatar'] }}<br>
        <br><br>
        <h5>权限测试</h5>
                <p>
                @can('create-post')
                    <a href="#">Create Post</a>
                @endcan
                <p>
                @can('edit-post')
                    <a href="#">Edit Post</a>
                @endcan
                </p>
                <p>
                @can('delete-post')
                    <a href="#">Delete Post</a>
                @endcan
                </p>
    </body>
</html>
