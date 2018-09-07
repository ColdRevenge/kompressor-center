<?php

class Cache {
# $ram - объект с memcached

    static private $_memcache = NULL;
    static private $_instance = NULL;

    /**
     * 
     * @return Cache
     */
    static function getInstance() {

        if (self::$_instance == NULL) {
            if (extension_loaded('memcache') && FALSE) {

                $memcache = new Memcache;
                $memcache->connect('localhost', 11212);
                
//                print_r($memcache->getStats());

                self::$_instance = $memcache;
                self::$_memcache = new Cache();
            } else {
                self::$_memcache = new Cache();
            }
        }
        return self::$_memcache;
    }

    public function get($key) {
        $registry = Registry::getInstance();
        if ($registry->is_chache == false) {
            return NULL;
        }
        
        return self::$_instance->get(md5($_SERVER['HTTP_HOST'] . $key));
    }

    public function set($key, $value, $timeLife = false) {

        if (empty($value)) {
            $value = array('empty' => 'null');
        }
        return self::$_instance->set(md5($_SERVER['HTTP_HOST'] . $key), $value, false, $timeLife);
    }

    public function setTags($key, $value, $tagname, $timeLife = false) {
        $registry = Registry::getInstance();
        if ($registry->is_chache == false) {
            return NULL;
        }
        $tagname = md5($_SERVER['HTTP_HOST'] . $tagname);
        $key = md5($_SERVER['HTTP_HOST'] . $key);

        $tag = self::$_instance->get($tagname);
        if (empty($tag)) { //Создаем тег, если его не существует
            self::$_instance->set($tagname, array());
            $tag = self::$_instance->get($tagname);
        }
        if (array_search($key, $tag)) { //Если ключ есть в теге, то окей
            return true;
        } else { //Если ключа нет в теге
            $tag[] = $key;
            self::$_instance->set($tagname, $tag, false, $timeLife);
            self::$_instance->set($key, $value, false, $timeLife);
        }

//        return self::$_instance->set(md5($_SERVER['HTTP_HOST'] . $key), $value, false, $timeLife);
    }

    public function deleteTag($tagname) {

        $registry = Registry::getInstance();
        if ($registry->is_chache == false) {
            return NULL;
        }
        $tagname = md5($_SERVER['HTTP_HOST'] . $tagname);

        $get_tags = self::$_instance->get($tagname);
        if (!empty($get_tags)) {
            if (count($get_tags)) {
                foreach ($get_tags as $value) {
//                    echo '<b>'. $value .'</b><br/>';
                    self::$_instance->delete($value);
                }
                self::$_instance->delete($tagname);
            }
        }
        //     return self::$_instance->delete($tagname);
    }

    public function delete($key) {
        return self::$_instance->delete(md5($_SERVER['HTTP_HOST'] . $key));
    }

    public function flush() {
        if (self::$_instance != NULL) {
            return self::$_instance->flush();
        }
    }

    public function __construct() {
        
    }

    public function __clone() {
        
    }

}

?>