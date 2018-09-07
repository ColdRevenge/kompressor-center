<?php

class bannersController extends Controller {

    public function editAction() {
        Lavra_Loader::LoadModels("Banners", "banners");
        $bann = new Banners();

        if (isset($_POST['link'])) {
            $bann->edit($this->param['img_id'], $_POST['link'], $_POST['short_desc']);
            $this->is_save_banner = 1;
        }
        $get_banner = $bann->geBannerDesc($this->param['img_id']);
        if (isset($get_banner->link)) {
            $_POST['link'] = $get_banner->link;
            $_POST['short_desc'] = $get_banner->short_desc;
        }
    }

    public function listAction() {
        $registry = Registry::getInstance();

        $this->_loadMenu(); //Подгружаем меню
        /* Меню в разделе страницы */

        if (isset($this->param['category_id']))
            $registry->category_id = $this->param['category_id'];

        if (isset($registry->category_id)) {
            /**
             * Заливка Файлов, настройщик
             */
            $registry->up_category_id = $this->param['category_id']; //id-категории
            $registry->up_page_id = 0;
            $registry->up_action_id = 7; //id - акшена, сам экшен прописан в модуле upload: getFilesAction, и uploaderAction
            $registry->up_action_width = '320'; //
            $registry->up_action_height = '150';

            $registry->up_width = 0; //Размеры главной картинки
            $registry->up_height = 0;
            $registry->up_type = 200 + $this->param['type'];
            $registry->up_formats = 'jpg|gif|png|jpeg'; //Разрешенные форматы
            $registry->up_upload_dir_type = 3; //Тип папки
            //Настройки нарезки 1 
//            print_r($this->param);
            if ($this->param['type'] == 5) {
                $registry->up_resize_width[1] = 165;
                $registry->up_resize_heigth[1] = 185;
                $registry->up_resize_right_prefix[1] = '_b';
                $registry->up_resize_scallign[1] = 0.65;
                $registry->up_resize_is_convas[1] = 1;
                //Настройка водяных знаков
                $registry->up_water_file[1] = '';
                $registry->up_pos_top[1] = '';
                $registry->up_pos_bottom[1] = '';
                $registry->up_pos_left[1] = '';
                $registry->up_pos_right[1] = '';
            }
//            //Настройки нарезки 2
//            $registry->up_resize_width[2] = 70;
//            $registry->up_resize_heigth[2] = 90;
//            $registry->up_resize_right_prefix[2] = '_s';
//            $registry->up_resize_scallign[2] = 0.2;
//            $registry->up_resize_is_convas[2] = 1;
//            //Настройка водяных знаков
//            $registry->up_water_file[2] = '';
//            $registry->up_pos_top[2] = '';
//            $registry->up_pos_bottom[2] = '';
//            $registry->up_pos_left[2] = '';
//            $registry->up_pos_right[2] = '';

            $this->upload = Lavra_Loader::getLoadModule('uploader', '/xadmin/uploader/list/');
	
			Lavra_Loader::LoadClass("Category");
			$category = new Category();

			if (isset($_POST['order'])) { //Изменения порядка сортировки
				foreach ($_POST['order'] as $category_id => $order) {
					$category->setOrder($category_id, $order);
				}
				header("location: /xadmin/banners/list/".$this->param['type']."/");
			}
	
        } else
            $this->setError("Раздел не найден");
    }

    /*
     * Меню в разделе страницы
     * Сделать подгрузку меню не только для подразделов, но и для разделов, в зависимости от типа сайта
     */

    private function _loadMenu() {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        if (!isset($this->param['type']))
            $this->param['type'] = 0; //Тип по умолчанию
        if (!isset($this->param['category_id'])) { //Категория по умолчанию
            $category_list = $category->getCategory($this->param['type'], $registry->shop_type);
            if (isset($category_list[0]) && isset($category_list[0][0]) && isset($category_list[0][0]->id)) {
                $this->root_category_id = $category_list[0][0]->id;
                if (isset($category_list[$this->root_category_id]) && isset($category_list[$this->root_category_id][0]) && isset($category_list[$this->root_category_id][0]->id)) {
                    $this->param['category_id'] = $this->category_id = $category_list[$this->root_category_id][0]->id;
                } else
                    $this->param['category_id'] = $this->category_id = $this->root_category_id;
            }
            //  else $this->setError("Разделы меню не заполнены. Для заполнения перейдите в <a href='".$this->admin_rul."category/list/'>раздел меню</a>");
        }
        else { //Выделяем рутовую категорию
            $category_list = $category->getCategoryId($this->param['category_id']);

            if (isset($category_list->id)) {
                $this->root_category_id = $category_list->parent_id;
                $this->category_id = $category_list->id;
            } else
                $this->setError("Раздел не найден");
        }
        $registry->root_category_id = $this->root_category_id; //Выделяем разделы меню
        $registry->category_id = $this->category_id; //Выделяем разделы меню
        if ($registry->category_id) {
            $this->category_name = $category->getCategoryId($registry->category_id);
        }
        $this->_setMenu();
    }

    private function _setMenu() {
        $registry = Registry::getInstance();
        //Подгрузка модуля выбора категорий
        $this->category_tree_list_1 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/tree_list/1/1/");
        $this->category_tree_list_0 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/tree_list/0/1/");
//        $this->category_tree_list_2 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/tree_list/2/1/");
        $this->category_tree_list_3 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/tree_list/3/1/");
        $this->category_tree_list_5 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/tree_list/5/1/"); // Фотогалерея
//        $this->category_tree_list_4 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/tree_list/4/1/");
//        $this->category_tree_list_5 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/page_list/5/");
//        $this->category_tree_list_6 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/page_list/6/");
    }

}
