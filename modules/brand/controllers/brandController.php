<?php

class brandController extends Controller {

    private function _icon() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Uploader");
        if (isset($_FILES['icon']['name']) && !empty($_FILES['icon']['name'])) { //Если пошел запрос на загрузку
            $upload = new Uploader($registry->icons_dir);

            $upload->setPrefix("icon_" . time() . "_" . rand(0, 100) . "_");
            $upload->isConvertLatinName(true);
            $upload->setMaxSize(1500);

            $upload->addAllowMimeType("image/jpeg");
            $upload->addAllowMimeType("image/gif");
            $upload->addAllowMimeType("image/png");
            $file_cover = $upload->upload();

            $this->uploaded_image = $file_cover;
            return $this->uploaded_image;
        } elseif (isset($_POST['uploaded_image']) && $_POST['uploaded_image'] && !empty($_POST['uploaded_image'])) {
            $this->uploaded_image = $_POST['uploaded_image'];
            return $this->uploaded_image;
        }
        return false;
    }

    public function getPseudoDirAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Brand", "brand");
        $brand = new Brand();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        if (isset($this->param['category_id'])) {
            if (isset($this->param['brand_id'])) {
                Lavra_Loader::LoadClass("Application");
                $app = new Application();
                $get_brand = $brand->getBrandId($this->param['brand_id']);
                $brand_name = '';
                if (!isset($get_brand->name)) {
                    $brand_name = $_GET['brand_name'];
                }
                else {
                    $brand_name = $get_brand->name;
                }
                if ($this->param['category_id'] == 0) { //Для брендов
                    echo str_replace('--', '-', str_replace('--', '-', mb_strtolower(Application::getPseudoDir($app->convertToLatin(trim(($brand_name)))))));
                } else { //Для категорий
                    $get_category = $category->getCategoryId($this->param['category_id']);
                    if (isset($get_category->id)) {
                        if (isset($get_brand->id)) {
                            echo str_replace('--', '-', str_replace('--', '-', mb_strtolower(Application::getPseudoDir($app->convertToLatin(trim(($brand_name))))))) . '-' . str_replace('--', '-', str_replace('--', '-', mb_strtolower(Application::getPseudoDir($app->convertToLatin(trim(($get_category->name)))))));
                        }
                    }
                }
            }
        }
        exit();
    }

    public function addAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Brand", "brand");
        $brand = new Brand();

        if (!isset($_POST['is_visible']))
            $_POST['is_visible'] = 1;
        else
            $_POST['is_visible'] = 0;
        if (!isset($_POST['order']) || empty($_POST['order'])) {
            $_POST['order'] = $brand->getMaxCount(0);
        }

        if (isset($_POST['name'])) { //Добавление категории
            $_POST['desc'] = (isset($_POST['desc']) ? $_POST['desc'] : null);
            $_POST['text_top'] = (isset($_POST['text_top']) ? $_POST['text_top'] : null);
            $_POST['text_bottom'] = (isset($_POST['text_bottom']) ? $_POST['text_bottom'] : null);

            $_POST['title'] = (isset($_POST['title']) ? $_POST['title'] : null);
            $_POST['h1'] = (isset($_POST['h1']) ? $_POST['h1'] : null);
            $_POST['meta_key'] = (isset($_POST['meta_key']) ? $_POST['meta_key'] : null);
            $_POST['meta_desc'] = (isset($_POST['meta_desc']) ? $_POST['meta_desc'] : null);
            $_POST['pseudo_dir'] = (isset($_POST['pseudo_dir']) ? $_POST['pseudo_dir'] : null);


            $_POST['param_str_1'] = (isset($_POST['param_str_1']) ? $_POST['param_str_1'] : '');
            $_POST['param_str_2'] = (isset($_POST['param_str_2']) ? $_POST['param_str_2'] : '');
            $_POST['param_str_3'] = (isset($_POST['param_str_3']) ? $_POST['param_str_3'] : '');
            $_POST['param_1'] = (isset($_POST['param_1']) ? $_POST['param_1'] : 0);
            $_POST['param_2'] = (isset($_POST['param_2']) ? $_POST['param_2'] : 0);
            $_POST['param_3'] = (isset($_POST['param_3']) ? $_POST['param_3'] : 0);

            $icon = $this->_icon();
            if (!isset($this->param['edit_id'])) { //Если добавление нового раздела
                $brand_id = $brand->add($_POST['name'], $_POST['title'], $_POST['h1'], $_POST['meta_key'], $_POST['meta_desc'], $_POST['pseudo_dir'], $_POST['desc'], $_POST['text_top'], $_POST['text_bottom'], $icon, $_POST['order'], $_POST['category_id'], $_POST['is_visible']);
                $brand->setShopType($brand_id, $registry->shop_type);


                $this->redirect($this->MyURL . "list/1/");
            } else { //Редактирование старого раздела
                $brand->edit($this->param['edit_id'], $_POST['name'], $_POST['title'], $_POST['h1'], $_POST['meta_key'], $_POST['meta_desc'], $_POST['pseudo_dir'], $_POST['desc'], $_POST['text_top'], $_POST['text_bottom'], $icon, $_POST['order'], $_POST['category_id'], $_POST['is_visible']);

                $this->redirect($this->MyURL . "list/2/");
            }
        }

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->category = $category->getCategory(0, $registry->shop_type);

        $this->edit_id = 0;
        if (isset($this->param['edit_id'])) {
            if (!isset($_POST['submit'])) {
                $brand = $brand->getBrandId($this->param['edit_id']);
                $_POST['name'] = $brand->name;
                $_POST['order'] = $brand->order;
                $_POST['desc'] = $brand->desc;
                $_POST['text_top'] = $brand->text_top;
                $_POST['text_bottom'] = $brand->text_bottom;
                $this->uploaded_image = $brand->icon;
                $_POST['category_id'] = $brand->category_id;
                $_POST['is_visible'] = $brand->is_visible;
                $_POST['param_str_1'] = $brand->param_str_1;
                $_POST['param_str_2'] = $brand->param_str_2;
                $_POST['param_str_3'] = $brand->param_str_3;
                $_POST['param_1'] = $brand->param_1;
                $_POST['param_2'] = $brand->param_2;
                $_POST['param_3'] = $brand->param_3;

                $this->edit_id = $this->param['edit_id'];
            }
        } elseif (isset($this->param['parent_id'])) {
            $_POST['category_id'] = $this->param['parent_id'];
        }
        $this->menu = $registry->menu;
    }

    public function list_editAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Brand", "brand");
        $brand = new Brand();
        $this->list_edit = 1;

        if (isset($_POST['order']) && !isset($_POST['is_send_add'])) { //Сортировка
            foreach ($_POST['order'] as $brand_id => $order) {
                $brand->setSortOrder($brand_id, $order);
            }
        }

        /* Добавление и редактирование */
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->category = $category->getCategory(0, $registry->shop_type);

        if (!isset($_POST['is_visible']))
            $_POST['is_visible'] = 1;
        else
            $_POST['is_visible'] = 0;
        if (!isset($_POST['category_id']))
            $_POST['category_id'] = 0;

        $_POST['param_str_1'] = (isset($_POST['param_str_1']) ? $_POST['param_str_1'] : '');
        $_POST['param_str_2'] = (isset($_POST['param_str_2']) ? $_POST['param_str_2'] : '');
        $_POST['param_str_3'] = (isset($_POST['param_str_3']) ? $_POST['param_str_3'] : '');
        $_POST['param_1'] = (isset($_POST['param_1']) ? $_POST['param_1'] : 0);
        $_POST['param_2'] = (isset($_POST['param_2']) ? $_POST['param_2'] : 0);
        $_POST['param_3'] = (isset($_POST['param_3']) ? $_POST['param_3'] : 0);

        if (isset($this->param['edit_id']) && $this->param['edit_id'] > 0) {
            $this->edit_id = $this->param['edit_id'];
            $get_brand = $brand->getBrandId($this->param['edit_id']);

            if (!isset($_POST['text_top'])) {
                $_POST['text_top'] = '';
            }
            if (isset($get_brand->id)) {
                if (isset($_POST['is_send_category_add'])) { //Добавление текста для категорий
                    foreach ($_POST['category_title'] as $category_id => $value) {
                        $brand->delCategoryBrandAll($category_id, $this->param['edit_id']);
                        $brand->addCategoryBrand($_POST['category_desc'][$category_id], $_POST['category_title'][$category_id], $_POST['category_h1'][$category_id], $_POST['category_meta_key'][$category_id], $_POST['category_meta_desc'][$category_id], $_POST['category_pseudo_dir'][$category_id], $category_id, $this->param['edit_id']);
                    }
                } else {
                    if (isset($_POST['is_send_add'])) { //Редактирование
                        $icon = $this->_icon();
                        $brand->edit($this->param['edit_id'], $_POST['name'], $_POST['title'], $_POST['h1'], $_POST['meta_key'], $_POST['meta_desc'], $_POST['pseudo_dir'], $_POST['desc'], $_POST['text_top'], $_POST['text_bottom'], $icon, $_POST['order'], $_POST['category_id'], 1);
                        $brand->setParam($this->param['edit_id'], $_POST['param_str_1'], $_POST['param_str_2'], $_POST['param_str_3'], $_POST['param_1'], $_POST['param_2'], $_POST['param_3']);
                        $this->setMessage("Производитель успешно изменен");
                        $this->list_edit = 0;
                    }
                }

                $_POST['title'] = $get_brand->title;
                $_POST['h1'] = $get_brand->h1;
                $_POST['meta_key'] = $get_brand->meta_key;
                $_POST['meta_desc'] = $get_brand->meta_desc;
                $_POST['pseudo_dir'] = $get_brand->pseudo_dir;
                $_POST['param_str_1'] = $get_brand->param_str_1;
                $_POST['param_str_2'] = $get_brand->param_str_2;
                $_POST['param_str_3'] = $get_brand->param_str_3;
                $_POST['param_1'] = $get_brand->param_1;
                $_POST['param_2'] = $get_brand->param_2;
                $_POST['param_3'] = $get_brand->param_3;

                $_POST['name'] = $get_brand->name;
                $_POST['order'] = $get_brand->order;
                $_POST['desc'] = $get_brand->desc;
                $_POST['text_top'] = $get_brand->text_top;
                $_POST['text_bottom'] = $get_brand->text_bottom;
                $this->uploaded_image = $get_brand->icon;
                $_POST['category_id'] = $get_brand->category_id;
            }

            $this->brands_categoryes = $brand->getBrandCategoryesAll($this->param['edit_id']);
        } else { //Добавление
            if (!isset($_POST['order'])) {
                $_POST['order'] = $brand->getMaxCount();
            }
            if (!isset($_POST['text_top'])) {
                $_POST['text_top'] = '';
            }
            if (isset($_POST['is_send_add'])) {
                $icon = $this->_icon();
                $brand_id = $brand->add($_POST['name'], $_POST['title'], $_POST['h1'], $_POST['meta_key'], $_POST['meta_desc'], $_POST['pseudo_dir'], $_POST['desc'], $_POST['text_top'], $_POST['text_bottom'], $icon, $_POST['order'], $_POST['category_id'], 1);
                $brand->setShopType($brand_id, $registry->shop_type);
                $this->setMessage("Производитель успешно добавлен");
                $this->list_edit = 0;
                $_POST = array();
                $_POST['order'] = $brand->getMaxCount();
            }
        }

        $this->brands = $brand->getBrands($registry->shop_type);
        if (isset($this->param['edit_id'])) {
            $this->brands_category = $brand->getBrandCategory($this->param['edit_id']);
        }
        $this->menu = $registry->menu;
    }

    public function listAction() {

        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Brand", "brand");
        $brand = new Brand();

        if (isset($_POST['order']) && !isset($_POST['is_send_add'])) {
            foreach ($_POST['order'] as $brand_id => $order) {
                $brand->setSortOrder($brand_id, $order);
            }
        }

        if (isset($this->param['message_id'])) { //Вывод сообщений
            switch ($this->param['message_id']) {
                case 1:
                    $this->setMessage("Производитель меню успешно добавлен!");
                    break;
                case 2:
                    $this->setMessage("Производитель меню успешно изменен!");
                    break;
                case 3:
                    $this->setMessage("Производитель меню успешно удален!");
                    break;
                default :
                    break;
            }
        }



        if (isset($this->param['del_id'])) { //Удаление разлела
            $brand->delBrand($this->param['del_id']);
        }

        $this->brands = $brand->getBrands($registry->shop_type);
        $this->menu = $registry->menu;
    }

    public function getBrandsAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Brand", "brand");
        $brand = new Brand();
        if (isset($this->param['is_404'])) {
            throw new Exception('Error');
        }
        if (isset($registry->selected_brand_name)) {
            $this->selected_brand_name = $registry->selected_brand_name;
        }
        if (isset($this->param['category_id'])) {
            $this->brands = $brand->getBrandsCategoryId($this->param['category_id']);
        } else {
            $this->brands = $brand->getBrands($registry->shop_type);
        }
    }

}
