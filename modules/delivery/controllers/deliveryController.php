<?php

class deliveryController extends Controller {

//Настроки нарезки иконок при заливке, если 0, то не нарезается
    private $_icon_width = 127;
    private $_icon_height = 54;

    /**
     * Настройка доставки 
     */
    public function list_deliveryAction() {
        $registry = Registry::getInstance();
        $this->is_delivery = 1;
        Lavra_Loader::LoadModels("Delivery", "delivery");
        $delivery = new Delivery();

        if (isset($this->param['del_id'])) {
            $delivery->delDelivery((int) $this->param['del_id']);
            $this->setMessage("Метод доставки успешно удален!");
        }
        if (isset($_GET['del_icon'])) {
            $delivery->delIcon($_GET['del_icon']);
            $this->setMessage('Иконка успешно удалена!');
        }

        if (isset($_POST['is_save']) && $_POST['is_save'] == 1) { //Если сохранение
            foreach ($_POST['name'] as $id => $name) {
                $_POST['from_day'][$id] = (isset($_POST['from_day'][$id]) ? $_POST['from_day'][$id] : 0);
                $_POST['to_day'][$id] = (isset($_POST['to_day'][$id]) ? $_POST['to_day'][$id] : 0);
                $_POST['free_sum'][$id] = (isset($_POST['free_sum'][$id]) ? $_POST['free_sum'][$id] : 0);
                $_POST['info'][$id] = (isset($_POST['info'][$id]) ? $_POST['info'][$id] : '');

                $icon = $this->_icon("_" . $id);
                if ($icon) {
                    $delivery->setIcon($id, $icon);
                }

                $delivery->setDelivery($id, $name, $_POST['order'][$id], $_POST['price'][$id], $_POST['free_sum'][$id], $_POST['from_day'][$id], $_POST['to_day'][$id], $_POST['info'][$id]);
            }
            $this->setMessage("Настройки доставки успешно сохранены!");
        }


        if (isset($_POST['is_add']) && $_POST['is_add'] == 1) { //Если сохранение
            $_POST['from_day'] = (isset($_POST['from_day']) ? $_POST['from_day'] : 0);
            $_POST['to_day'] = (isset($_POST['to_day']) ? $_POST['to_day'] : 0);
            $_POST['info'] = (isset($_POST['info']) ? $_POST['info'] : '');
            $_POST['parent_id'] = (isset($_POST['parent_id']) ? $_POST['parent_id'] : 0);

            $dev_id = $delivery->addDelivery($_POST['name'], $_POST['order'], $_POST['price'], $_POST['from_day'], $_POST['to_day'], $_POST['info'], $_POST['parent_id']);

            $icon = $this->_icon();
            if ($icon) {
                $delivery->setIcon($dev_id, $icon);
            }
            if (isset($_GET['is_modal']) && $_GET['is_modal'] == '1') {
                echo '<script type="text/javascript">'
                . 'parent.document.location.href = "' . $this->admin_url . 'delivery/list/1/"'
                . '</script>';
            }
            $this->setMessage("Новый метод доставки успешно добавлен!");
        }

        if (isset($this->param['message_id'])) {
            switch ($this->param['message_id']) {
                case 1:
                    $this->setMessage("Новый метод доставки успешно добавлен!");
                    break;

                default:
                    break;
            }
        }

        $this->delivery = $delivery->getDelivery();
        $this->menu = $registry->menu;
    }

    public function service_adressAction() {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadModels("Metro", "metro");
        $metro = new Metro();
        $this->metro = $metro->getStantions();

        if (isset($this->param['delivery_id'])) { //Бесплатная доставка от:
            Lavra_Loader::LoadModels("Delivery", "delivery");
            $delivery = new Delivery();
            $get_delivery = $delivery->getDeliveryId($this->param['delivery_id']);
            if ($get_delivery->free_sum > 0) {
                Lavra_Loader::LoadModels("Basket", "basket");
                $basket = new Basket();
                $get_basket = $basket->getBasket($registry->session_id);
                $this->free_sum = $get_delivery->free_sum;
                $this->sum_basket = $get_basket->sum;
                $this->lacking = $get_delivery->free_sum - $get_basket->sum;
                
            }
        }
    }

    public function service_edost_russianpostAction() {
        Lavra_Loader::LoadModels("Metro", "metro");
        $metro = new Metro();
        $this->metro = $metro->getStantions();
    }

    /**
     * Загрузка иконок при редактировании / Добавлении иконок
     * @return boolean 
     */
    private function _icon($id = null) {
        try {
            $registry = Registry::getInstance();
            Lavra_Loader::LoadClass("Uploader");
            $name = 'icon' . $id;
            if (isset($_FILES[$name]['name']) && !empty($_FILES[$name]['name'])) { //Если пошел запрос на загрузку
                $upload = new Uploader($registry->icons_dir, $name);
                $upload->setPrefix("icon_delivery_" . time() . "_" . rand(0, 100) . "_");
                $upload->isConvertLatinName(true);

                $upload->addAllowMimeType("image/jpeg");
                $upload->addAllowMimeType("image/gif");
                $upload->addAllowMimeType("image/png");

                if ($this->_icon_height === 0 && $this->_icon_width == 0) {
                    $file_cover = $upload->upload();
                } else {
                    $file_cover = $this->_resizeIcon($upload->upload());
                }
                return $file_cover;
            }
            return false;
        } catch (Exception $e) {
            //  echo $e->getMessage();
        }
    }

    /**
     * Нарезка иконки 
     */
    private function _resizeIcon($icon) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Images");
        $images = new Images();
        $resourse = $images->open($registry->icons_dir . $icon);
        $images->setScaling($this->_icon_width, $this->_icon_height, ($this->_icon_width + ($this->_icon_width * 0.1)), ($this->_icon_height + ($this->_icon_height * 0.1)));
        $images->save($images->ReSize($resourse, $this->_icon_width, $this->_icon_height), $registry->icons_dir . $icon, 100);
        return $icon;
    }

}
