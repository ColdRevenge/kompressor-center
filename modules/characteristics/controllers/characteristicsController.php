<?php

class characteristicsController extends Controller {

//Настроки нарезки иконок при заливке, если 0, то не нарезается
    private $_icon_width = 0;
    private $_icon_height = 0;

    /**
     * Загрузка иконок при редактировании / Добавлении иконок
     * @return boolean 
     */
    private function _icon() {
        try {
            $registry = Registry::getInstance();
            $name = "icon_" . key($_POST['load_img_id']);
            Lavra_Loader::LoadClass("Uploader");
            if (isset($_FILES[$name]['name']) && !empty($_FILES[$name]['name'])) { //Если пошел запрос на загрузку
                $upload = new Uploader($registry->icons_dir);
                $upload->setPrefix("icon_" . time() . "_" . rand(0, 100) . "_");
                $upload->isConvertLatinName(true);
                $upload->setMaxSize(1500);

                $upload->addAllowMimeType("image/jpeg");
                $upload->addAllowMimeType("image/gif");
                $upload->addAllowMimeType("image/png");

                if ($this->_icon_height == 0 && $this->_icon_width == 0) {
                    $file_cover = $upload->upload();
                } else {
                    $file_cover = $this->_resizeIcon($upload->upload());
                }
                $this->uploaded_image = $file_cover;
                return $this->uploaded_image;
            } elseif (isset($_POST['uploaded_image']) && $_POST['uploaded_image'] && !empty($_POST['uploaded_image'])) {
                $this->uploaded_image = $_POST['uploaded_image'];
                return $this->uploaded_image;
            }
            return false;
        } catch (Exception $e) {
            echo $e->getMessage();
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
//            $images->setWaterImage($registry->gallery_dir."water.png", 0, 0, 0, 0);
        $images->save($images->ReSize($resourse, $this->_icon_width, $this->_icon_height), $registry->icons_dir . $icon, 100);
        return $icon;
    }

    /**
     * Редактирование/добавление х-к прямо из продуктов
     */
    public function product_quickAction() {
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
        $this->is_change = 0;
        if (isset($_POST['value_id'])) {
            Lavra_Loader::LoadClass('Application');
            $_post_arr = $_POST;
            foreach ($_post_arr as $key => $value) {
                $_POST[$key] = ($value);
            }
            if (!isset($_POST['value_unit'])) {
                $_POST['value_unit'] = '';
            }
            if ($_POST['value_id'] > 0) { //Редактирование
                $characteristic->setValueName($_POST['value_id'], trim($_POST['value_name']), trim($_POST['value_unit']));
                $this->is_edit = 1;
            } else { //Добавление
                if (isset($_POST['characteristic_id'])) {
                    $is_added = $characteristic->getValueName(trim($_POST['value_name']), $_POST['characteristic_id']);
                    if (isset($is_added->id)) {
                        $this->add_value_id = $is_added->id;
                    } else {
                        $this->add_value_id = $this->param['value_id'] = $characteristic->addValue($_POST['characteristic_id'], trim($_POST['value_name']), '', trim($_POST['value_unit']), 0, 1, 0, 0, 0, '', '', '', 0);
                    }
                }
            }
            $this->is_change = 1;
        }
        if (isset($this->param['is_del']) && $this->param['is_del'] == 1) {
            $this->is_del = 1;
            $this->is_change = 1;
            $characteristic->delValue($this->param['value_id']);
        } elseif (isset($this->param['value_id'])) {
            $this->value_id = $this->param['value_id'];
            if ($this->value_id > 0) {
                $this->get_value = $characteristic->getValueId($this->value_id);
            }
        }
    }

    public function getPseudoDirAction() {
        Lavra_Loader::LoadClass("Application");
        if (isset($_GET['name'])) {
            $app = new Application();
            $name = $_GET['name'];
            echo trim(Application::replaceExcelSymbol(str_replace('--', '-', str_replace('--', '-', mb_strtolower(Application::getPseudoDir($app->convertToLatin(trim((trim($name))))))))), '-');
        }
    }

    /**
     * Обновление селектов в продуктах
     */
    public function product_quick_selectAction() {
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();
        if (isset($this->param['value_id'])) {
            $this->get_values = $characteristic->getValues($this->param['characteristic_id']);
            $this->selected_id = $this->param['value_id'];
        }
    }

    public function addAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristic = new Characteristics();

        if (isset($_POST['name'])) {
            if (!isset($this->param['edit_id'])) { //Добавление
                if (!isset($_POST['is_param_1']))
                    $_POST['is_param_1'] = 0;
                if (!isset($_POST['is_param_2']))
                    $_POST['is_param_2'] = 0;
                if (!isset($_POST['param_str_1']))
                    $_POST['param_str_1'] = null;
                if (!isset($_POST['param_str_2']))
                    $_POST['param_str_2'] = null;
                if (!isset($_POST['pseudo_dir']))
                    $_POST['pseudo_dir'] = null;

                if (!isset($_POST['category_id']))
                    $_POST['category_id'] = 0;
                if (!isset($_POST['category_2_id']))
                    $_POST['category_2_id'] = 0;
                if (!isset($_POST['category_3_id']))
                    $_POST['category_3_id'] = 0;

                $characteristic->setShopType($characteristic->addCharacteristics(str_replace('"', "&quot;", trim($_POST['name'])), $_POST['pseudo_dir'], $_POST['is_param_1'], $_POST['is_param_2'], $_POST['param_str_1'], $_POST['param_str_2'], $_POST['order'], $_POST['category_id'], $_POST['category_2_id'], $_POST['category_3_id']), $registry->shop_type);
                $this->redirect($this->MyURL . 'list/0/' . $this->param['category_id'] . '/1/');
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
        $this->menu = $registry->menu;
    }

    public function addValueAction() {
        
    }

    public function listAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristics = new Characteristics();

        if (isset($_POST['load_img_id'])) {
            $icon = $this->_icon();
            $characteristics->setIconCharacteristic(key($_POST['load_img_id']), $icon);
        }
        if (isset($_GET['del_icon'])) {
            $characteristics->setIconCharacteristic($_GET['del_icon'], '');
        }

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->get_catalog = $get_catalog = $category->getCategory(0, $registry->shop_type);


        if (!isset($this->param['category_id'])) { //Если категория не выбрана задаем по-умолчанию
            $this->param['category_id'] = 0;
        }

        if (isset($this->param['category_id'])) {
            $registry->category_id = $this->param['category_id'];
        }
        $this->category_tree_list_0 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/tree_list/0/2/");
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
                    $_POST['name'][$key] = str_replace('"', "&quot;", trim($_POST['name'][$key]));


                    if (!isset($_POST['is_param_1'][$key]))
                        $_POST['is_param_1'][$key] = 0;
                    if (!isset($_POST['is_param_2'][$key]))
                        $_POST['is_param_2'][$key] = 0;
                    if (!isset($_POST['category_id'][$key]))
                        $_POST['category_id'][$key] = 0;
                    if (!isset($_POST['category_2_id'][$key]))
                        $_POST['category_2_id'][$key] = 0;
                    if (!isset($_POST['category_3_id'][$key]))
                        $_POST['category_3_id'][$key] = 0;
                    if (!isset($_POST['param_str_1'][$key]))
                        $_POST['param_str_1'][$key] = null;
                    if (!isset($_POST['param_str_2'][$key]))
                        $_POST['param_str_2'][$key] = null;
                    if (!isset($_POST['pseudo_dir']))
                        $_POST['pseudo_dir'] = null;

                    $characteristics->editCharacteristic($key, $_POST['name'][$key], $_POST['pseudo_dir'][$key], $_POST['is_param_1'][$key], $_POST['is_param_2'][$key], $_POST['param_str_1'][$key], $_POST['param_str_2'][$key], $value, $_POST['category_id'][$key], $_POST['category_2_id'][$key], $_POST['category_3_id'][$key]);
                }
            }
        }
        $_POST['order'] = $characteristics->getMaxCharacteristic();
        $this->characteristics = $characteristics->getCharacteristics($this->param['category_id'], 1, '`order` ASC', $registry->shop_type);
        $this->menu = $registry->menu;
    }

    public function listValueAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Characteristics", "characteristics");
        $characteristics = new Characteristics();
        if (isset($this->param['id']) && $this->param['id'] > 0) {
            if (isset($_POST['load_img_id'])) {
                $icon = $this->_icon();
                $characteristics->setIconCharacteristicValue(key($_POST['load_img_id']), $icon);
            }
            if (isset($_GET['del_icon'])) {
                $characteristics->setIconCharacteristicValue($_GET['del_icon'], '');
            }
            if (!isset($this->param['category_id'])) { //Если категория не выбрана задаем по-умолчанию
                $this->param['category_id'] = 0;
            }
            $registry->category_id = $this->param['category_id'];
            $this->category_tree_list_0 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/tree_list/0/2/");

            Lavra_Loader::LoadClass("Category");
            $category = new Category();
            $this->get_catalog = $get_catalog = $category->getCategory(0, $registry->shop_type);


            $this->characteristic = $characteristics->getCharacteristicId($this->param['id']);


            if (isset($this->characteristic->id)) {
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
                    if (!isset($_POST['price']))
                        $_POST['price'] = 0;
                    if (!isset($_POST['is_param_1']))
                        $_POST['is_param_1'] = 0;
                    if (!isset($_POST['is_param_2']))
                        $_POST['is_param_2'] = 0;
                    if (!isset($_POST['is_param_3']))
                        $_POST['is_param_3'] = 0;
                    if (!isset($_POST['param_str_1']))
                        $_POST['param_str_1'] = '';
                    if (!isset($_POST['param_str_2']))
                        $_POST['param_str_2'] = '';
                    if (!isset($_POST['param_str_3']))
                        $_POST['param_str_3'] = '';


                    $characteristics->addValue($this->param['id'], str_replace('"', "&quot;", trim($_POST['add_name'])), str_replace('"', "&quot;", trim($_POST['pseudo_dir'])), str_replace('"', "&quot;", trim($_POST['unit'])), $_POST['price'], $_POST['is_select'], $_POST['is_param_1'], $_POST['is_param_2'], $_POST['is_param_3'], $_POST['param_str_1'], $_POST['param_str_2'], $_POST['param_str_3'], $_POST['add_order']);
                    $this->redirect($this->MyURL . 'value/list/' . $this->param['category_id'] . '/' . $this->param['id'] . '/1/');
                }
                if (isset($_POST['save'])) {
                    if (isset($_POST['order'])) {
                        foreach ($_POST['order'] as $key => $value) {
                            if (!isset($_POST['price'][$key]))
                                $_POST['price'][$key] = 0;

                            if (!isset($_POST['is_param_1'][$key]))
                                $_POST['is_param_1'][$key] = 0;
                            if (!isset($_POST['is_param_2'][$key]))
                                $_POST['is_param_2'][$key] = 0;
                            if (!isset($_POST['is_param_3'][$key]))
                                $_POST['is_param_3'][$key] = 0;
                            if (!isset($_POST['param_str_1'][$key]))
                                $_POST['param_str_1'][$key] = null;
                            if (!isset($_POST['param_str_2'][$key]))
                                $_POST['param_str_2'][$key] = null;
                            if (!isset($_POST['param_str_3'][$key]))
                                $_POST['param_str_3'][$key] = null;


                            $_POST['unit'][$key] = (isset($_POST['unit'][$key]) ? $_POST['unit'][$key] : '');
                            $_POST['is_select'][$key] = (isset($_POST['is_select'][$key]) ? $_POST['is_select'][$key] : '');

                            $_POST['name'][$key] = str_replace('"', "&quot;", trim($_POST['name'][$key]));
                            $_POST['unit'][$key] = str_replace('"', "&quot;", trim($_POST['unit'][$key]));

                            $characteristics->editValue($key, $_POST['name'][$key], $_POST['pseudo_dir'][$key], $_POST['unit'][$key], $_POST['price'][$key], $_POST['is_select'][$key], $_POST['is_param_1'][$key], $_POST['is_param_2'][$key], $_POST['is_param_3'][$key], $_POST['param_str_1'][$key], $_POST['param_str_2'][$key], $_POST['param_str_3'][$key], $value);
                        }
                    }
                }
                $_POST['order'] = $characteristics->getMaxValue($this->param['id']);
                $this->characteristics = $characteristics->getValues($this->param['id']);
            }
            else {
                $this->setError("Характиристика не найдена");
            }
        } else {
            $this->setError("Характиристика не найдена");
        }
        $this->menu = $registry->menu;
        $this->all_characteristic = $characteristics->getCharacteristics(-1, 1, $sort = '`order` ASC', $registry->shop_type);
        $this->all_char_values = $characteristics->getValuesAll();
    }

}
