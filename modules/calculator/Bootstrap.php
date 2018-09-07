<?php

class calculatorBootstrap implements IBootstrap {

    public $version = "0.1";
    private $_name = "calculator";

    public function config() {
        
    }

    public function route() {
        $registry = Registry::getInstance();
        $registry->MyName = $this->_name;
        $route = Router::getInstance();

        $route->addRoutePath($this->_name, $registry->modules_dir . "calculator/", "controllers", "templates");

        $route->addRoute($this->_name, "calculator/", "calculator", "calculator", "calculator");
        $route->addRoute($this->_name, "calculator/:brand_id/:model_id/", "calculator", "calculator", "calculator");
    }

    public function run($default_url = null) {
        $route = Router::getInstance();
        return $route->delegate($this->_name, $default_url);
    }

}