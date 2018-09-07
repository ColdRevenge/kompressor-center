<?php




class characteristics_techController extends Controller {

    public function addAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("CharacteristicsTech", "characteristics_tech");
        $characteristic = new CharacteristicsTech();

        if (isset($_POST['name'])) {
            if (!isset($this->param['edit_id'])) { //Добавление
                $characteristic->addCharacteristics(trim($_POST['name']), (isset($_POST['is_catalog']) && $_POST['is_catalog'] == 1 ? 1 : 0), (isset($_POST['is_selection']) && $_POST['is_selection'] == 1 ? 1 : 0), $_POST['order']);
                $this->redirect($this->MyURL . 'list/1/');
            }
//            else { //редактирование
//                $characteristic->editCharacteristic($this->param['edit_id'], $_POST['name'], $_POST['order']);
//                $this->redirect($this->MyURL . 'list/2/');
//            }
        }
//        if (isset($this->param['edit_id'])) {
//            $this->characteristic = $characteristic->getCharacteristicId($this->param['edit_id']);
//            if (!isset($this->characteristic->id)) {
//                $this->redirect($this->MyURL . 'list/4/');
//            } else {
//                $_POST['name'] = $this->characteristic->name;
//                $_POST['order'] = $this->characteristic->order;
//            }
//        } else {
//            $_POST['order'] = $characteristic->getMaxCharacteristic();
//        }
    }

    public function addValueAction() {
        
    }

    public function listAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("CharacteristicsTech", "characteristics_tech");
        $characteristics = new CharacteristicsTech();

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
                        $characteristics->delCharacteristic($this->param['del_id']);
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

        if (isset($_POST['save'])) {
            if (isset($_POST['order'])) {
                foreach ($_POST['order'] as $key => $value) {
                    $characteristics->editCharacteristic($key, $_POST['name'][$key], (isset($_POST['is_catalog'][$key]) && $_POST['is_catalog'][$key] == 1 ? 1 : 0), (isset($_POST['is_selection'][$key]) && $_POST['is_selection'][$key] == 1 ? 1 : 0), $value);
                }
            }
        }
        $_POST['order'] = $characteristics->getMaxCharacteristic();
        $this->characteristics = $characteristics->getCharacteristics();
    }

    public function typeValueAction() {
        $registry = Registry::getInstance();
        if (isset($this->param['id']) && $this->param['id'] > 0) {
            Lavra_Loader::LoadModels("CharacteristicsTech", "characteristics_tech");
            $characteristics = new CharacteristicsTech();
            $this->characteristic = $characteristics->getCharacteristicId($this->param['id']);

            if (isset($this->characteristic->id)) {
                $this->characteristic_id = $this->characteristic->id;
                if (isset($_POST['add'])) {
                    
                }
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
                                $characteristics->delValue($this->param['del_id']);
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
                if (isset($_POST['add'])) {
                    if (!isset($_POST['unit'])) $_POST['unit'] = null;
                    $characteristics->addValue($this->param['id'], 0, trim($_POST['add_name']), trim($_POST['unit']), $_POST['add_order'], (isset($_POST['is_select']) && $_POST['is_select'] == 1 ? 1 : 0), (isset($_POST['is_selection']) && $_POST['is_selection'] == 1 ? 1 : 0), (isset($_POST['is_catalog']) && $_POST['is_catalog'] == 1 ? 1 : 0));
                    $this->redirect($this->MyURL . 'type/list/' . $this->param['id'] . '/1/');
                }
                if (isset($_POST['save'])) {
                    if (isset($_POST['order'])) {
                        if (!isset($_POST['unit'])) $_POST['unit'] = array();
                        foreach ($_POST['order'] as $key => $value) {
                            if (!isset($_POST['unit'][$key])) $_POST['unit'][$key] = null;
                            $characteristics->editValue($key, trim($_POST['name'][$key]), $_POST['unit'][$key], $value, (isset($_POST['is_select'][$key]) && $_POST['is_select'][$key] == 1 ? 1 : 0), (isset($_POST['is_selection'][$key]) && $_POST['is_selection'][$key] == 1 ? 1 : 0), (isset($_POST['is_catalog'][$key]) && $_POST['is_catalog'][$key] == 1 ? 1 : 0));
                        }
                    }
                }
                $_POST['order'] = $characteristics->getMaxValue($this->param['id'], 0);
                $this->characteristics = $characteristics->getValues($this->param['id'], 0);



                if (isset($_POST['only_category_id'])) { //Если требуется установка характиристик для определенной категории
                    $characteristics->setCharCategory($this->param['id'], $_POST['only_category_id'], $_POST['only_category_2_id'], $_POST['only_category_3_id']);
                }
                else {
                    $_POST['only_category_id'] = $this->characteristic->category_id;
                    $_POST['only_category_2_id'] = $this->characteristic->category_2_id;
                    $_POST['only_category_3_id'] = $this->characteristic->category_3_id;
                }

                Lavra_Loader::LoadClass("Category");
                $category = new Category();
                $this->category = $category->getCategory(0, $registry->shop_type);
            }
            else $this->setError("Характиристика не найдена");
        }
        else $this->setError("Характиристика не найдена");
    }

    public function listValueAction() {
        $registry = Registry::getInstance();
        if (isset($this->param['id']) && $this->param['id'] > 0) {
            Lavra_Loader::LoadModels("CharacteristicsTech", "characteristics_tech");
            $characteristics = new CharacteristicsTech();
            $this->characteristic = $characteristics->getCharacteristicId($this->param['id']);

            if (isset($this->characteristic->id)) {
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
                                $characteristics->delValue($this->param['del_id']);
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
                if (isset($_POST['add'])) {
                    $characteristics->addValue($this->param['id'], $this->param['type_id'], $_POST['add_name'], $_POST['unit'], $_POST['add_order'], (isset($_POST['is_select']) && $_POST['is_select'] == 1 ? 1 : 0), (isset($_POST['is_selection']) && $_POST['is_selection'] == 1 ? 1 : 0), (isset($_POST['is_catalog']) && $_POST['is_catalog'] == 1 ? 1 : 0));
                    $this->redirect($this->MyURL . 'value/list/' . $this->param['id'] . '/' . $this->param['type_id'] . '/1/');
                }
                if (isset($_POST['save'])) {
                    if (isset($_POST['order'])) {
                        foreach ($_POST['order'] as $key => $value) {
                            $characteristics->editValue($key, $_POST['name'][$key], $_POST['unit'][$key], $value, (isset($_POST['is_select'][$key]) && $_POST['is_select'][$key] == 1 ? 1 : 0), (isset($_POST['is_selection'][$key]) && $_POST['is_selection'][$key] == 1 ? 1 : 0), (isset($_POST['is_catalog']) && $_POST['is_catalog'] == 1 ? 1 : 0));
                        }
                    }
                }
                $_POST['order'] = $characteristics->getMaxValue($this->param['id'], $this->param['type_id']);
                $this->characteristics = $characteristics->getValues($this->param['id'], $this->param['type_id']);
                $this->types = $characteristics->getValueId($this->param['type_id']);
                ;
            }
            else $this->setError("Характиристика не найдена");
        }
        else $this->setError("Характиристика не найдена");
    }

}

