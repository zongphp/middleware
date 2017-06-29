<?php namespace zongphp\middleware\middleware;

/**
 * 控制器方法不存在时执行的中间件
 * Class ActionNotFound
 * @package zongphp\middleware\middleware
 */
class ActionNotFound {
	public function run() {
		_404();
	}
}