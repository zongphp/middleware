<?php
namespace zongphp\middleware;

use zongphp\config\Config;
use zongphp\framework\build\Provider;

class MiddlewareProvider extends Provider {
	//延迟加载
	public $defer = false;

	public function boot() {
		//执行中间件
		Middleware::globals();
		Middleware::system( 'csrf_validate' );
		Middleware::system( 'form_validate' );
	}

	public function register() {
		//控制器访问时控制器或方法不存在时执行的中间件
		Config::set( 'middleware.system.controller_not_found', [ 'zongphp\middleware\middleware\ControllerNotFound' ] );
		Config::set( 'middleware.system.action_not_found', [ 'zongphp\middleware\middleware\ActionNotFound' ] );
		//路由规则没有匹配时执行
		Config::set( 'middleware.system.router_not_found', [ 'zongphp\middleware\middleware\RouterNotFound' ] );
		//csrf表单令牌验证
		Config::set( 'middleware.system.csrf_validate', [ 'zongphp\middleware\middleware\Csrf' ] );
		//分配表单验证失败信息
		Config::set( 'middleware.system.form_validate', [ 'zongphp\middleware\middleware\Validate' ] );
		$this->app->single( 'Middleware', function () {
			return Middleware::single();
		} );

	}
}