<?php
/**
 * Модуль списка разделов меню неограниченной вложености..
 * @version 0.2 beta
 *
 */
class adminBootstrap implements IBootstrap {
	public $version = "0.1";
	private $_name = "admin"; //Имя модуля! Для изменения нужно также имзиенить название класса, и папки
	/**
	 * Сонфигурирование модуля
	 *
	 */
	public function config() {
            
        }

	/**
	 * Маршруты модуля
	 *
	 */
	public function route() {
		$registry = Registry::getInstance();
		$registry->MyName = $this->_name;
		$route = Router::getInstance();
		$route->addRoutePath($this->_name, $registry->modules_dir."admin/","controllers","templates");
		$route->addRoute($this->_name,$registry->admin_pseudo_dir.":module/","admin","admin","admin", false);
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