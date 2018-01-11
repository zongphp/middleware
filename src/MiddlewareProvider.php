<?php

namespace zongphp\middleware;
use zongphp\framework\build\Provider;
class MiddlewareProvider extends Provider
{
    //延迟加载
    public $defer = false;

    public function boot()
    {
    }

    public function register()
    {
        $this->app->single('Middleware', function () {
            return Middleware::single();
        }
        );
    }
}
