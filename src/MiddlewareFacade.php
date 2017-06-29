<?php
namespace zongphp\middleware;

use zongphp\framework\build\Facade;

class MiddlewareFacade extends Facade {
	public static function getFacadeAccessor() {
		return 'Middleware';
	}
}