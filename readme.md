# Laravel PHP Framework
## arpher adding
从5.2到5.3升级
复制5.3的composer.json到文件下，覆盖掉原来的

参考https://laracasts.com/discuss/channels/forge/laravel-53-update-causing-error-on-forge-only
修改 App\Providers\RouteServiceProvide
App\Providers\EventServiceProvider

public function boot()
    {
        parent::boot();
    }

一直用google大法

http://www.cnblogs.com/yuwensong/p/3955834.html
导入数据（注意sql文件的路径）的方法
mysql>source /home/abc/abc.sql;

https://github.com/laravel/framework/issues/9080
错误The only supported ciphers are AES-128-CBC and AES-256-CBC
解决
run this command

php artisan key:generate
and the clear config cache using

php artisan config:clear
will solve this problem


[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).


