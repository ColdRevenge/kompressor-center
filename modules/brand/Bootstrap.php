<?php

/**
 * Модуль списка разделов меню неограниченной вложености..
 * @version 0.2 beta
 *
 */
class brandBootstrap implements IBootstrap {
	public $version = "0.1";
	private $_name = "brand"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки
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

		$route->addRoutePath($this->_name, $registry->modules_dir."brand/","controllers","templates");
		/**
		 * Разделы меню для раздела
		 */
		$route->addRoute($this->_name,$registry->admin_pseudo_dir."brand/add/","add","brand", "add");
		$route->addRoute($this->_name,$registry->admin_pseudo_dir."brand/list/:message_id/:del_id/","list","brand", "list");
                $route->addRoute($this->_name,$registry->admin_pseudo_dir."brand/list/edit/:edit_id/","list","brand", "list_edit");
		$route->addRoute($this->_name,$registry->admin_pseudo_dir."brand/edit/:edit_id/","add","brand", "add");
                $route->addRoute($this->_name,"/brand/site/:category_id/:is_404/","brand_site","brand", "getBrands");
                $route->addRoute($this->_name,"/brand/ajax/:category_id/:brand_id/",null,"brand", "getPseudoDir");
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