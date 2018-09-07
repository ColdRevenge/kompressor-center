<?php

/**
 * Модуль списка разделов меню неограниченной вложености..
 * @version 0.2 beta
 *
 */
class characteristics_techBootstrap implements IBootstrap {
	public $version = "0.1";
	private $_name = "characteristics_tech"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки
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

		$route->addRoutePath($this->_name, $registry->modules_dir."characteristics_tech/","controllers","templates");
		
		
		$route->addRoute($this->_name,$registry->admin_pseudo_dir."characteristics_tech/list/:message_id/:del_id/","list","characteristics_tech", "list");
//		$route->addRoute($this->_name,$registry->admin_pseudo_dir."characteristics_tech/edit/:edit_id/","add_characteristics_tech","characteristics_tech", "add");
                $route->addRoute($this->_name,$registry->admin_pseudo_dir."characteristics_tech/add/",null,"characteristics_tech", "add");

                $route->addRoute($this->_name,$registry->admin_pseudo_dir."characteristics_tech/value/list/:id/:type_id/:message_id/:del_id/","list_value","characteristics_tech", "listValue");
                $route->addRoute($this->_name,$registry->admin_pseudo_dir."characteristics_tech/type/list/:id/:message_id/:del_id/","type_value","characteristics_tech", "typeValue");
              
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