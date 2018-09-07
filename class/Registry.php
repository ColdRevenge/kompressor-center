<?php

class Registry implements ArrayAccess {

    private $_var = array();
    static private $_object = null;

    public static function create() {
        if (Registry::$_object != null)
            return Registry::$_object;
        else {
            Registry::$_object = new Registry();
            return Registry::$_object;
        }
    }

    public static function getInstance() {
        if (Registry::$_object != null)
            return Registry::$_object;
        else {
            Registry::$_object = new Registry();
            return Registry::$_object;
        }
    }

    public function offsetExists($offset) {
        if (isset($this->_var[$offset])) {
            return true;
        } else
            return false;
    }

    public function offsetUnset($offset) {

        throw new Exception("Не готово ArrayAccess 1");
    }

    public function offsetGet($offset) {
        return $this->_var[$offset];
    }

    public function offsetSet($offset, $value) {
        $this->_var[$offset] = $value;
    }

}

?>