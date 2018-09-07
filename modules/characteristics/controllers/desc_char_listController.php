<?php

class desc_char_listController extends Controller {

    public function listAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristics = new Characteristics();
        Lavra_Loader::LoadModels("DescChar", "characteristics");
        $deac_char = new DescChar();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();


        $this->get_chars = $characteristics->getValuesAll();
        $_get_char_all = $characteristics->getCharacteristics(0, 1, $sort = '`order` ASC', $registry->shop_type);
        $get_characteristic = array();
        foreach ($_get_char_all as $key => $value) {
            $get_characteristic[$value->id] = $value->name;
        }
        $this->get_characteristic = $get_characteristic;

        if (!isset($this->param['category_id'])) { //Если категория не выбрана задаем по-умолчанию
            $get_catalog = $category->getCategory(0, $registry->shop_type);
            if (isset($get_catalog[0]) && isset($get_catalog[0][0]) && isset($get_catalog[0][0]->id)) {
                $this->category_id = $this->param['category_id'] = $get_catalog[0][0]->id;
            } else {
                $this->category_id = $this->param['category_id'] = 0;
            }
        }
        if (isset($this->param['category_id'])) {
            $this->category_id = $registry->category_id = $this->param['category_id'];
        }
        $this->category_tree_list_0 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/tree_list/0/7/");


        if (isset($this->param['message_id'])) { //Вывод сообщений
            switch ($this->param['message_id']) {
                case 1:
                    $this->setMessage("Успешно добавлено!");
                    break;
                case 2:
                    $this->setMessage("Успешно изменено!");
                    break;
                case 3:
                    if (isset($this->param['del_id'])) {
                        $deac_char->delDescChar($this->param['del_id']);
                        $this->setMessage("Успешно удалено!");
                    }
                    break;
                case 4:
                    $this->setError("Не найдено!");
                    break;
                default :
                    break;
            }
        }

        if (isset($_POST['characteristic_value_id'])) {
            if ($_POST['characteristic_value_id'] != 0) {
                $_POST['characteristic_value_2_id'] = (isset($_POST['characteristic_value_2_id']) ? $_POST['characteristic_value_2_id'] : 0);
                $_POST['characteristic_value_3_id'] = (isset($_POST['characteristic_value_3_id']) ? $_POST['characteristic_value_3_id'] : 0);
                $_POST['characteristic_value_4_id'] = (isset($_POST['characteristic_value_4_id']) ? $_POST['characteristic_value_4_id'] : 0);

                if (!(isset($_GET['edit_id']) && $_GET['edit_id'] > 0)) { //Добавление
                    $deac_char->addCharacteristics($_POST['category_id'], $_POST['characteristic_value_id'], $_POST['characteristic_value_2_id'], $_POST['characteristic_value_3_id'], $_POST['characteristic_value_4_id'], $_POST['name'], $_POST['desc'], $_POST['title'], $_POST['meta_key'], $_POST['meta_desc']);
                    $this->redirect($registry->admin_url . 'characteristics/desc/list/' . $this->param['type'] . '/' . $this->param['category_id'] . '/1/');
                    exit();
                } else { //Редактирование
                    $deac_char->editCharacteristic($_GET['edit_id'], $_POST['category_id'], $_POST['characteristic_value_id'], $_POST['characteristic_value_2_id'], $_POST['characteristic_value_3_id'], $_POST['characteristic_value_4_id'], $_POST['name'], $_POST['desc'], $_POST['title'], $_POST['meta_key'], $_POST['meta_desc']);
                    $this->redirect($registry->admin_url . 'characteristics/desc/list/' . $this->param['type'] . '/' . $this->param['category_id'] . '/2/');
                }
            } else {
                $this->setError('Не выбрана характеристика');
            }
        }


        if (isset($_GET['edit_id']) && $_GET['edit_id'] > 0) {
            $this->desc_char_edit = $deac_char->getCharacteristicDescId($_GET['edit_id']);
        }
        $this->desc_chars = $deac_char->getCharacteristics($this->param['category_id']);

        $this->menu = $registry->menu;
    }

}
