<?php

/**
 * Модуль списка разделов меню неограниченной вложености..
 * @version 0.2 beta
 *
 */
class statBootstrap implements IBootstrap {
	public $version = "0.1";
	private $_name = "stat"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки
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

		$route->addRoutePath($this->_name, $registry->modules_dir."stat/","controllers","templates");
                $route->addRoute($this->_name,"/stat/profile/","profile","stat", "profile");
                $route->addRoute($this->_name,"/stat/profile/forum/","profile_forum","stat", "profile");
                $route->addRoute($this->_name,"/stat/orders/","orders","stat", "orders");
                $route->addRoute($this->_name,"/stat/password/","password_change","stat", "password_change");
                $route->addRoute($this->_name,"/stat/delivery/post/","delivery_post","stat", "delivery_post");
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