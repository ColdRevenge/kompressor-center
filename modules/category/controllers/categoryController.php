<?php

class categoryController extends Controller {

    /**
     * Загрузка иконок при редактировании / Добавлении иконок
     * @return boolean 
     */
    private function _icon($input_name = 'icon', $width = 0, $height = 0) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Uploader");
        if (isset($_FILES[$input_name]['name']) && !empty($_FILES[$input_name]['name'])) { //Если пошел запрос на загрузку
            $upload = new Uploader($registry->icons_dir, $input_name);

            $upload->setPrefix("icon_" . time() . "_" . rand(0, 100) . "_");
            $upload->isConvertLatinName(true);
            $upload->setMaxSize(1500);


            $upload->addAllowMimeType("image/jpeg");
            $upload->addAllowMimeType("image/gif");
            $upload->addAllowMimeType("image/png");

            if ($width == 0 && $height == 0) {
                $file_cover = $upload->upload();
            } else {
                $file_cover = $this->_resizeIcon($upload->upload(), $width, $height);
            }

            $this->uploaded_image = $file_cover;
            return $this->uploaded_image;
        } elseif ($input_name == 'icon' && isset($_POST['uploaded_image']) && $_POST['uploaded_image'] && !empty($_POST['uploaded_image'])) {
            $this->uploaded_image = $_POST['uploaded_image'];
            return $this->uploaded_image;
        } elseif ($input_name == 'icon_2' && isset($_POST['uploaded_image_2']) && $_POST['uploaded_image_2'] && !empty($_POST['uploaded_image_2'])) {
            $this->uploaded_image_2 = $_POST['uploaded_image_2'];
            return $this->uploaded_image_2;
        } elseif ($input_name == 'icon_3' && isset($_POST['uploaded_image_3']) && $_POST['uploaded_image_3'] && !empty($_POST['uploaded_image_3'])) {
            $this->uploaded_image_3 = $_POST['uploaded_image_3'];
            return $this->uploaded_image_3;
        }
        return false;
    }

    /**
     * Нарезка иконки 
     */
    private function _resizeIcon($icon, $width, $height) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Images");
        $images = new Images();
        $resourse = $images->open($registry->icons_dir . $icon);
        $images->setIsConvas(true);
        $images->setScaling($width, $height, ($width + ($width * 0.65)), ($height + ($height * 0.65)));
//            $images->setWaterImage($registry->gallery_dir."water.png", 0, 0, 0, 0);
        $images->save($images->ReSize($resourse, $width, $height), $registry->icons_dir . $icon, 100);
        return $icon;
    }

    public function addAction() {
        $registry = Registry::getInstance();
        if ($registry->shop == 'lady' || $registry->shop == 'woman') {
            $this->icon_width = 183;
            $this->icon_height = 130;
        } else {
            $this->icon_width = 183;
            $this->icon_height = 130;
        }
        $this->icon_2_width = 0;
        $this->icon_2_height = 0;

        $this->icon_3_width = 0;
        $this->icon_3_height = 0;

        Lavra_Loader::LoadClass("Category");
        Lavra_Loader::LoadClass("Application");
        $category = new Category();
        $app = new Application();
        if (!isset($this->param['type']))
            $this->param['type'] = 0;
        $this->type = $this->param['type'];
        if (!isset($_POST['is_visible']))
            $_POST['is_visible'] = 1;
        else
            $_POST['is_visible'] = 0;

        $_POST['is_param_1'] = (isset($_POST['is_param_1']) ? $_POST['is_param_1'] : 0);

        if (!isset($this->param['parent_id']))
            $this->param['parent_id'] = 0;
        if (!isset($this->param['link']))
            $this->param['link'] = null;
        if (!isset($_POST['meta_key']))
            $_POST['meta_key'] = null;
        if (!isset($_POST['title']))
            $_POST['title'] = null;
        if (!isset($_POST['meta_desc']))
            $_POST['meta_desc'] = null;
        if (!isset($_POST['param_str_1']))
            $_POST['param_str_1'] = null;
        if (!isset($_POST['h1']))
            $_POST['h1'] = null;
        if (!isset($_POST['order']) || empty($_POST['order'])) {
            $_POST['order'] = $category->getMaxCount($this->param['parent_id'], $this->param['type']);
        }


        if (isset($_POST['name'])) { //Добавление категории
            if (!isset($_POST['pseudo_dir'])) {
                $_POST['pseudo_dir'] = null;
            } else {
                if (empty($_POST['pseudo_dir'])) {
//  $_POST['pseudo_dir'] = $app->convertToLatin($_POST['name']);
                }
            }
            if (!isset($_POST['category_id']))
                $_POST['category_id'] = 0;
            if (!isset($_POST['link']))
                $_POST['link'] = null;

            $icon = $this->_icon('icon', $this->icon_width, $this->icon_height);
            $icon_2 = $this->_icon('icon_2', $this->icon_2_width, $this->icon_2_height);
            $icon_3 = $this->_icon('icon_3', $this->icon_3_width, $this->icon_3_height);

            if (isset($_POST['name'])) {
                $_POST['name'] = trim(str_replace('"', '&quot;', $_POST['name']));
                $_POST['meta_key'] = trim(str_replace('"', '&quot;', $_POST['meta_key']));
                $_POST['title'] = trim(str_replace('"', '&quot;', $_POST['title']));
                $_POST['param_str_1'] = (isset($_POST['param_str_1'])) ? trim(str_replace('"', '&quot;', $_POST['param_str_1'])) : null;
                $_POST['param_str_2'] = (isset($_POST['param_str_2'])) ? trim(str_replace('"', '&quot;', $_POST['param_str_2'])) : null;
                $_POST['param_str_3'] = (isset($_POST['param_str_3'])) ? trim(str_replace('"', '&quot;', $_POST['param_str_3'])) : null;
                $_POST['param_str_4'] = (isset($_POST['param_str_4'])) ? trim(str_replace('"', '&quot;', $_POST['param_str_4'])) : null;
                $_POST['param_str_5'] = (isset($_POST['param_str_5'])) ? trim(str_replace('"', '&quot;', $_POST['param_str_5'])) : null;
                $_POST['h1'] = trim(str_replace('"', '&quot;', $_POST['h1']));

                if (!isset($_POST['desc'])) {
                    $_POST['desc'] = null;
                }
                if (isset($this->param['edit_id'])) {
                    $_get_category = $category->getCategoryId($this->param['edit_id']);
                }
                if (!empty($_POST['pseudo_dir']) && !$category->isPseudoDir(trim($_POST['pseudo_dir']), $this->param['type'], (isset($this->param['edit_id']) ? $this->param['edit_id'] : -1), $_get_category->parent_id, $registry->shop_type) || empty($_POST['pseudo_dir']) && $this->param['type'] != 0) {
                    if (!isset($this->param['edit_id'])) { //Если добавление нового раздела
                        $category->clearCategoryRoutesCache(); //Очищаем маршруты
                        $category_id = $category->add(trim($_POST['name']), $_POST['link'], trim($_POST['pseudo_dir']), $_POST['desc'], $_POST['param_str_1'], $_POST['param_str_2'], $_POST['param_str_3'], $_POST['param_str_4'], $_POST['param_str_5'], $_POST['h1'], $_POST['meta_key'], $_POST['meta_desc'], $_POST['title'], $icon, $_POST['category_id'], $_POST['order'], $_POST['is_param_1'], $_POST['is_visible'], $this->param['type']);
                        if ($category_id) {


                            $category->setShopType($category_id, $registry->shop_type);
                            $category->setIcons($category_id, $icon_2, $icon_3);

                            if (isset($_GET['not_menu'])) {
                                echo '<script type="text/javascript">window.parent.location.href = parent.location.href;parent.$.fancybox.close();</script>';
                            } else {
                                $this->redirect($this->MyURL . "list/" . $this->param['type'] . "/1/");
                            }
                        } else
                            $this->setError("При добавлении раздела возникли ошибки");
                    } else { //Редактирование старого раздела
                        $category->clearCategoryRoutesCache(); //Очищаем маршруты
                        $category->edit($this->param['edit_id'], trim($_POST['name']), $_POST['link'], trim($_POST['pseudo_dir']), $_POST['desc'], $_POST['param_str_1'], $_POST['param_str_2'], $_POST['param_str_3'], $_POST['param_str_4'], $_POST['param_str_5'], $_POST['h1'], $_POST['meta_key'], $_POST['meta_desc'], $_POST['title'], $icon, $_POST['category_id'], $_POST['order'], $_POST['is_param_1'], $_POST['is_visible'], $this->param['type']);
                        $category->setIcons($this->param['edit_id'], $icon_2, $icon_3);
                        if (isset($_GET['not_menu'])) {
                            echo '<script type="text/javascript">window.parent.location.href = parent.location.href;parent.$.fancybox.close();</script>';
                        } else {
                            $this->redirect($this->MyURL . "list/" . $this->param['type'] . "/2/");
                        }
                    }
                } elseif (empty($_POST['pseudo_dir']) && $this->param['type'] == 0) {
                    $this->setError("Не заполнено поле <b>Адрес</b>");
                } else {
                    $this->setError("Адрес <b>" . $this->url . '' . $_POST['pseudo_dir'] . "/</b> уже существует.");
                }
            }
        }

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->category = $category->getCategory($this->param['type'], $registry->shop_type);

        $this->edit_id = 0;
        if (isset($this->param['edit_id'])) {
            if (!isset($_POST['submit'])) {
                $categoryes = $category->getCategoryId($this->param['edit_id']);


                $_POST['name'] = $categoryes->name;
                $_POST['desc'] = $categoryes->desc;
                $_POST['title'] = $categoryes->title;
                $_POST['meta_key'] = $categoryes->meta_key;
                $_POST['meta_desc'] = $categoryes->meta_desc;
                $_POST['h1'] = $categoryes->h1;
                $_POST['param_str_1'] = $categoryes->param_str_1;
                $_POST['param_str_2'] = $categoryes->param_str_2;
                $_POST['param_str_3'] = $categoryes->param_str_3;
                $_POST['param_str_4'] = $categoryes->param_str_4;
                $_POST['param_str_5'] = $categoryes->param_str_5;

                $_POST['category_id'] = $categoryes->parent_id;
                $_POST['pseudo_dir'] = $categoryes->pseudo_dir;
                $_POST['order'] = $categoryes->order;
                $this->uploaded_image = $categoryes->icon;
                $this->uploaded_image_2 = $categoryes->icon_2;
                $this->uploaded_image_3 = $categoryes->icon_3;

                $_POST['link'] = $categoryes->link;
                $_POST['is_visible'] = $categoryes->is_visible;
                $_POST['is_param_1'] = $categoryes->is_param_1;
                $this->is_read_only = $categoryes->is_read_only;
                $this->edit_id = $this->param['edit_id'];
                $_GET['parent_id'] = $categoryes->parent_id;
            }
        } elseif (isset($this->param['parent_id'])) {
            $_POST['category_id'] = $this->param['parent_id'];
        }
    }

    private function _getPseudoDir($name, $prefix = null) {
        Lavra_Loader::LoadClass("Application");

        $app = new Application();
        return trim(Application::replaceExcelSymbol(str_replace('--', '-', str_replace('--', '-', mb_strtolower(Application::getPseudoDir($app->convertToLatin(trim((trim($name))))))))), '-') . $prefix;
    }

    public function auto_pseudo_dirAction() {
        /* Старая версия, когда псевдо-папка писалась в текстовое поле */
//        Lavra_Loader::LoadClass("Application");
//        if (isset($_GET['name'])) {
//            $app = new Application();
//            $this->auto_pseudo_dir = str_replace('--', '-', str_replace('--', '-', mb_strtolower(Application::getPseudoDir($app->convertToLatin(trim(($_GET['name'])))))));
//            echo $this->auto_pseudo_dir;
//            exit();
//        }
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        if (isset($_GET['name'])) {
            for ($i = 1; $i <= 100; $i++) {
                if ($i > 1) {
                    $prefix = "-$i";
                } else
                    $prefix = null;

                $pseudo_dir = $this->_getPseudoDir(trim($_GET['name']), $prefix);

                if (!empty($pseudo_dir)) {
                    if (!isset($_GET['edit_id'])) {
                        $_GET['edit_id'] = 0;
                    }
                    if (!$category->isPseudoDir($pseudo_dir, 0, $_GET['edit_id'], $_GET['parent_id'])) {
                        echo trim(Application::replaceExcelSymbol($pseudo_dir));
                        exit();
                        break;
                    } else
                        continue; //Если псевда папка уже есть, то след. итерация
                }
            }
        }
//
//:pseudo_dir/:type/:edit_id
        if (isset($this->param['pseudo_dir'])) {
            
        }
    }

    public function isPseudoDirAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
//:pseudo_dir/:type/:edit_id
        if (isset($this->param['pseudo_dir'])) {
            if (!isset($this->param['edit_id']))
                $this->param['edit_id'] = 0;
            if (!isset($this->param['type']))
                $this->param['type'] = 0;
            if (!$category->isPseudoDir($this->param['pseudo_dir'], $this->param['type'], $this->param['edit_id'])) {
                $this->is_dir = 0;
            } else
                $this->is_dir = 1;
        }
    }

    public function map_siteAction() {

        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        if ($registry->shop == 'lady') {
            $registry->head_title = "Карта сайта - Lady.Lalipop";
        } elseif ($registry->shop == 'platok') {
            $registry->head_title = "Карта сайта - Platok.Lalipop";
        } elseif ($registry->shop == 'sumka') {
            $registry->head_title = "Карта сайта - Sumka.Lalipop";
        } elseif ($registry->shop == 'woman') {
            $registry->head_title = "Карта сайта - Woman.Lalipop";
        } else {
            $registry->head_title = "Карта сайта - Lalipop";
        }
        $this->category = $category->getCategory(0, $registry->shop_type);
        $this->category_1 = $category->getCategory(1, $registry->shop_type);
        $this->category_2 = $category->getCategory(2, $registry->shop_type);
        $this->category_3 = $category->getCategory(3, $registry->shop_type);
        $this->category_4 = $category->getCategory(4, $registry->shop_type);
        $this->category_5 = $category->getCategory(5, $registry->shop_type);
        $this->category_6 = $category->getCategory(6, $registry->shop_type);
        $this->register_object('this', $this);
    }

    /**
     * Список подразделов
     *
     */
    public function listAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();

        if (isset($_POST['save_order'])) { //Изменения порядка сортировки
            foreach ($_POST['order'] as $category_id => $order) {
                $category->setOrder($category_id, $order);
            }
        }

        if (!isset($this->param['type'])) {
            $this->param['type'] = 1;
        }
        $this->type = $this->param['type'];
        if (!isset($_POST['order']))
            $_POST['order'] = $category->getMaxCount(0, $this->type);
        if (!isset($_POST['is_visible']))
            $_POST['is_visible'] = 1;

        if (isset($this->param['message_id'])) { //Вывод сообщений
            switch ($this->param['message_id']) {
                case 1:
                    $this->setMessage("Раздел меню успешно добавлен!");
                    break;
                case 2:
                    $this->setMessage("Раздел меню успешно изменен!");
                    break;
                case 3:
                    $this->setMessage("Раздел меню успешно удален!");
                    break;
                default :
                    break;
            }
        }

        if (isset($_POST['category_id']) && count($_POST['category_id']) > 0 && isset($_POST['action_product'])) {
            foreach ($_POST['category_id'] as $category_id => $value) {
                if ($_POST['action_product'] > 0) {
                    $category->setParentId($category_id, $_POST['action_product']);
                } else {
                    switch ($_POST['action_product']) {
                        case -2: //Удаление
                            $category->delCategory($category_id);
                            break;
                        case -3: //Видим
                            $category->setVisible($category_id, 1);
                            break;
                        case -4: //Не видим
                            $category->setVisible($category_id, 0);
                            break;
                    }
                }
            }
            $category->clearCategoryRoutesCache(); //Очищаем маршруты
        }


        if (isset($this->param['del_id'])) { //Удаление разлела
            $category->delCategory($this->param['del_id']);
//            if ($this->param['type'] == 0) {
//                $this->redirect($this->admin_url . "products/list/");
//            }

            if (isset($_GET['not_menu'])) {
                header("location: /xadmin/banners/list/5/");
            }
        }
        $this->file_tree = "category_tree.tpl";
        $this->category = $category->getCategory($this->param['type'], $registry->shop_type);
        $this->menu = $registry->menu;
    }

    public function list_editAction() {
        $registry = Registry::getInstance();
        $this->list_edit = 1;
        Lavra_Loader::LoadClass("Category");
        Lavra_Loader::LoadClass("Application");
        $category = new Category();

        if (!isset($this->param['type']))
            $this->param['type'] = 0;
        $this->type = $this->param['type'];
        if (!isset($_POST['is_visible']))
            $_POST['is_visible'] = 1;
        else
            $_POST['is_visible'] = 0;

        if (!isset($this->param['parent_id']))
            $this->param['parent_id'] = 0;

        if (isset($_POST['name'])) {
            $_POST['name'] = trim(str_replace('"', '&quot;', $_POST['name']));
            $category->clearCategoryRoutesCache(); //Очищаем маршруты
            if (!isset($this->param['category_id'])) {
                if (!isset($_POST['category_id']))
                    $_POST['category_id'] = 0;
                $add_category_id = $category->addQuick($_POST['name'], $_POST['link'], $_POST['category_id'], $_POST['order'], $_POST['is_visible'], $this->param['type']);
                if ($add_category_id) {
                    $category->setParamStr_1($add_category_id, (isset($_POST['param_str_1']) ? 1 : 0));
                    $category->setShopType($add_category_id, $registry->shop_type);
                    $this->redirect($this->MyURL . "list/" . $this->param['type'] . "/1/");
                }
            } else {
                if ($category->editQuick($this->param['category_id'], $_POST['name'], $_POST['link'], $_POST['category_id'], $_POST['order'], $_POST['is_visible'], $this->param['type'])) {
                    $category->setParamStr_1($this->param['category_id'], (isset($_POST['param_str_1']) ? 1 : 0));
                    $this->redirect($this->MyURL . "list/" . $this->param['type'] . "/2/");
                }
            }
        }

        if (isset($this->param['category_id'])) {
            $get_category = $category->getCategoryId($this->param['category_id']);

            $_POST['name'] = $get_category->name;
            $_POST['is_visible'] = $get_category->is_visible;
            $_POST['type'] = $get_category->type;
            $_POST['link'] = $get_category->link;
            $_POST['category_id'] = $get_category->parent_id;
            $_POST['order'] = $get_category->order;
            $_POST['param_str_1'] = $get_category->param_str_1;
            $this->edit_id = $this->param['category_id'];
        }

        if (isset($this->param['parent_category_id'])) {
            $get_category = $category->getCategoryId($this->param['parent_category_id']);
            $_POST['category_id'] = $this->param['parent_category_id'];
        }

        $this->listAction();
    }

    /**
     * Для подгрузки списка разделов для всех модулей
     * УНИВЕРСАЛЬНОЕ!!! (без подсчета кол-ва страниц, продуктов и т.д.)
     */
    public function tree_listAction() {
        if (!isset($this->param['type'])) {
            $this->param['type'] = 0;
        }
        $this->type = $this->param['type'];

        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();

        if (!isset($this->param['template'])) {
            echo "Не указан id-шаблона  categoryController";
            exit();
        }
        switch ($this->param['template']) {
            case 1: //Баннеры
                $this->tree_url = $this->admin_url . 'banners/list/' . $this->param['type'] . '/';
                break;
            case 2: //Характеристики
                $this->tree_url = $this->admin_url . 'characteristics/list/0/';
                break;
            case 3: //Импорт
                $this->tree_url = $this->admin_url . 'import/';
                break;
            case 4: //Подборы
                $this->tree_url = $this->admin_url . 'selection/list/';
                break;
            case 5: //Новости - продукты
                $this->tree_url = $this->admin_url . 'news/product/' . $this->param['param_1'] . '/';
                $this->is_modal = 1;
                break;
            case 7: //Описания характеристик
                $this->tree_url = $this->admin_url . 'characteristics/desc/list/0/';
                break;

            default:
                break;
        }
        $this->file_tree = "tree_list.tpl";

        $this->offset = 20;
        $this->id = 0; //id раздела который нужно пройти, 0 - корень
        $this->level = 0;
        $this->tree = $category->getCategoryTree($this->param['type'], $registry->shop_type);

        if (isset($registry->root_category_id)) {
            $this->root_category_id = $registry->root_category_id;
        }
        if (isset($registry->category_id)) {
            $this->category_id = $registry->category_id;
        }

        if (isset($registry->open_category_id)) {
            $this->open_category_id = $registry->open_category_id;
            $this->open_category_parent_id = $registry->open_category_parent_id;
            $this->_getParentCategoryes($this->tree, $registry->open_category_id);
            $this->parents_category_arr = $this->_parents_category_arr;
        }
    }

    /**
     * Для подгрузки списка разделов из модуля Страницы
     */
    public function page_tree_listAction() {
        if (!isset($this->param['type'])) {
            $this->param['type'] = 0;
        }
        $this->type = $this->param['type'];

        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        if (isset($this->param['offset'])) { //Отступы
            $this->offset = (int) $this->param['offset'];
        } else
            $this->offset = 20;

        $this->file_tree = "product_tree_list.tpl";
        $this->id = 0; //id раздела который нужно пройти, 0 - корень
        $this->level = 0;
        $this->tree = $category->getPageCategory($this->param['type'], $registry->shop_type);

        if (isset($registry->root_category_id)) {
            $this->root_category_id = $registry->root_category_id;
        }
        if (isset($registry->category_id)) {
            $this->category_id = $registry->category_id;
        }

        if (isset($registry->open_category_id)) {
            $this->open_category_id = $registry->open_category_id;
            $this->open_category_parent_id = $registry->open_category_parent_id;
            $this->_getParentCategoryes($this->tree, $registry->open_category_id);
            $this->parents_category_arr = $this->_parents_category_arr;
        }
    }

    public function admin_related_treeAction() {
        if (!isset($this->param['type'])) {
            $this->param['type'] = 0;
        }
        $this->type = $this->param['type'];


        if (isset($this->param['product_id'])) {
            $this->product_id = $this->param['product_id'];
        }
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        if (isset($this->param['offset'])) { //Отступы
            $this->offset = (int) $this->param['offset'];
        } else
            $this->offset = 17;

        $this->file_tree = "product_tree_list.tpl";
        $this->id = 0; //id раздела который нужно пройти, 0 - корень
        $this->level = 0;
        $this->tree = $category->getProductCategory(0, $registry->shop_type);


        if (isset($registry->root_category_id) && $registry->root_category_id > 0) {
            $this->root_category_id = $registry->root_category_id;
        }
        if (isset($registry->category_id) && $registry->category_id > 0) {
            $this->category_id = $registry->category_id;
        } elseif (isset($this->tree[0][0])) {
            $this->category_id = $this->tree[0][0]->id;
        }


        if (isset($registry->root_category_id)) {
            $this->root_category_id = $registry->root_category_id;
        }
        if (isset($registry->category_id)) {
            $this->category_id = $registry->category_id;
        }

        if (isset($registry->open_category_id)) {
            $this->open_category_id = $registry->open_category_id;
            $this->open_category_parent_id = $registry->open_category_parent_id;
            $this->_getParentCategoryes($this->tree, $registry->open_category_id);
            $this->parents_category_arr = $this->_parents_category_arr;
        }
//        elseif(isset ($this->tree[0][0]->id)) {
//            $this->category_id = $this->tree[0][0]->id;
//        }
    }

    public function product_tree_listAction() {
        if (!isset($this->param['type'])) {
            $this->param['type'] = 0;
        }
        $this->type = $this->param['type'];

        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        if (isset($this->param['offset'])) { //Отступы
            $this->offset = (int) $this->param['offset'];
        } else
            $this->offset = 20;

        $this->file_tree = "product_tree_list.tpl";
        $this->id = 0; //id раздела который нужно пройти, 0 - корень
        $this->level = 0;
        $this->tree = $category->getProductCategory($this->param['type'], $registry->shop_type);
        if (isset($registry->root_category_id) && $registry->root_category_id > 0) {
            $this->root_category_id = $registry->root_category_id;
        }
        if (isset($registry->category_id) && $registry->category_id > 0) {
            $this->category_id = $registry->category_id;
        }
//        elseif(isset ($this->tree[0][0]->id)) {
//            $this->category_id = $this->tree[0][0]->id;
//        }
    }

    public function catalog_tree_listAction() {
        if (!isset($this->param['type'])) {
            $this->param['type'] = 0;
        }
        $this->_addFilterChar();
        $this->type = $this->param['type'];

        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        if (isset($this->param['offset'])) { //Отступы
            $this->offset = (int) $this->param['offset'];
        } else
            $this->offset = 20;

        $this->file_tree = "tree_list.tpl";
        $this->level = 0;
        $this->id = (isset($this->param['parent_id']) ? (int) $this->param['parent_id'] : 0);

        if (isset($this->param['parent_id'])) { //Если задан стартовая категория, то загоняем в кеш родителей
            Lavra_Loader::LoadClass('ApplicationDB');
            $app = new ApplicationDB();
            $parents_id = $app->getParentsCategory($this->param['parent_id']);
//            print_r($parents_id);
            foreach ($parents_id as $key => $value) {
                $category->getFullAdressCategoryIdRoutes(array('category_id' => $value->id, 'hide' => 1));
            }
        }

        $this->tree = $category->getProductCategoryQuick($this->param['type'], $registry->shop_type);

        if (isset($registry->open_category_id) && isset($registry->open_category_parent_id)) {
            $this->open_category_id = $registry->open_category_id;
            $this->open_category_parent_id = $registry->open_category_parent_id;
            $this->_getParentCategoryes($this->tree, $registry->open_category_id);
            $this->parents_category_arr = $this->_parents_category_arr;
        }
        $this->register_object('category_obj', $category);

        $this->register_object('this', $this);
    }

    /**
     * Отпределяет полную структуру меню
     * Нужен для того чтобы при входе в 5ый уровень вложености, мы знали об этом
     * и открывали меню
     * @var <type> 
     */
    private $_parents_category_arr = array();

    private function _getParentCategoryes($_tree, $open_category_id) {
        foreach ($_tree as $parent_id => $tree) {
            foreach ($tree as $key => $child_tree) {
                $open_arr[$child_tree->id] = 1;
                if ($open_category_id == $child_tree->id) {
                    $this->_parents_category_arr[$child_tree->id] = 1;
                    $this->_getParentCategoryes($_tree, $child_tree->parent_id);
                    return true;
                }
            }
        }
    }

}
