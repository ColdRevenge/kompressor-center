<?php
error_reporting(E_ALL);
/**
 * Модуль списка разделов меню неограниченной вложености..
 * @version 0.2 beta
 *
 */
class relatedBootstrap implements IBootstrap {
	public $version = "0.1";
	private $_name = "related"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки
	/**
	 * Сонфигурирование модуля
	 *
	 */
	public function config() {}

	/**
	 * Маршруты модуля
	 *
	 */
	public function route() {
		$registry = Registry::getInstance();
		$registry->MyName = $this->_name;
		$route = Router::getInstance();

		$route->addRoutePath($this->_name, $registry->modules_dir."related/","controllers","templates");
		
		
		//$route->addRoute($this->_name,$registry->admin_pseudo_dir."related/:message_id/:del_id/","related","related", "related");
                $route->addRoute($this->_name,$registry->admin_pseudo_dir."related/add/:type/:category_id/:product_id/","admin_related","related", "list");
                $route->addRoute($this->_name,$registry->admin_pseudo_dir."related/add/product/:type/:category_id/:product_id/","product_list","related", "list");
                $route->addRoute($this->_name,$registry->admin_pseudo_dir."related/get/product/:type/:category_id/:product_id/","getProducts","related", "getProduct");
                $route->addRoute($this->_name,$registry->admin_pseudo_dir."related/get/related/:type/:category_id/:product_id/","getRelatedProduct","related", "getRelatedProduct");
                $route->addRoute($this->_name,$registry->admin_pseudo_dir."related/del/product/:type/:related_id/:product_id/","getProducts","related", "getProduct");
	}

	/**
	 * Запуск модуля
	 *
	 */
	public function run($default_url = null) {
		$route = Router::getInstance();
		return $route->delegate($this->_name, $default_url);
	}
}