<?php
 
class Access {

    private $_access = array();
    static private $_object = null;

    static public function getInstance() {
        if (Access::$_object != null) {
            return Access::$_object;
        } else {
            Access::$_object = new Access();
            return Access::$_object;
        }
    }

    public function addExceptions($access_id, $route = null) {
        
    }

    public function setMenuName($access_id, $title, $order, $menu_link = null) {
        $this->_access[$access_id]['title'] = $title;
        $this->_access[$access_id]['order'] = $order;
        $this->_access[$access_id]['menu_link'] = $menu_link;
    }

    public function setAccess($access_id, $title, Array $routes, $is_menu, $menu_link = null) {
        if (isset($this->_access[$access_id]) && isset($this->_access[$access_id]['access'])) {
            $count[$access_id] = count($this->_access[$access_id]['access']);
        } else {
            $count[$access_id] = 0;
        }

        $this->_access[$access_id]['access'][$count[$access_id]]['title'] = $title;
        $this->_access[$access_id]['access'][$count[$access_id]]['routes'] = $routes;
        $this->_access[$access_id]['access'][$count[$access_id]]['is_menu'] = $is_menu;
        $this->_access[$access_id]['access'][$count[$access_id]]['menu_link'] = $menu_link;
        foreach ($routes as $route) {
            $this->_access['accesses'][] = $route; //Все что доступно пользователю
        }
    }

    public function getAccess() {
        $access_tmp = array();
        foreach ($this->_access as $key => $value) {
            if (isset($this->_access[$key]['order'])) {
                $order = $this->_access[$key]['order'];
            } else {
                $order = 0;
            }
            if ($key != 'accesses') {
                $access_tmp[$order][$key] = $value;
            } else {
                $access_tmp[$key] = $value;
            }
        }
        ksort($access_tmp);
        return $access_tmp;
    }

}
