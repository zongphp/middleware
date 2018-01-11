<?php
namespace zongphp\middleware\build;

use zongphp\response\Response;

trait Dispatcher
{
    /**
     * 执行中间件
     *
     * @param $middleware
     */
    public function middleware($middleware)
    {
        $middleware = array_reverse($middleware);
        $dispatcher = array_reduce($middleware, $this->getSlice(), function () {
        });
        $dispatcher();
    }

    /**
     * @return \Closure
     */
    protected function getSlice()
    {
        return function ($next, $step) {
            return function () use ($next, $step) {
                if ($content = call_user_func_array([new $step, 'run'], [$next])) {
                    die(is_string($content) ? Response::make($content) : $content);
                }
            };
        };
    }
}
