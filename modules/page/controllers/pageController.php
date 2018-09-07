<?php

class pageController extends Controller {

    public function photogalereyaAction() {

        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Pages", "page");
        $page = new Pages();
        $this->register_object('page_obj', $page);

        /* if (isset($this->param['pseudo_dir'])) {
          $this->page = $page->getPageFromPseudoDir($this->param['pseudo_dir'], $registry->language_id);
          if (isset($registry->is_main)) $this->is_main = $registry->is_main;
          if (isset($this->page->id)) {
          $this->page->header = ($this->page->header);
          $registry->page_id = $this->page->id;
          $registry->head_title = ($this->page->title ? $this->page->title : $this->page->header);
          $registry->header = ($this->page->header ? $this->page->header : $this->page->header);
          $registry->head_key = ($this->page->meta_keyword ? $this->page->meta_keyword : $this->page->header);
          $registry->head_desc = ($this->page->meta_desc ? $this->page->meta_desc : $this->page->meta_desc);
          $registry->open_category_id = $this->page->category_id; */
        Lavra_Loader::LoadClass("Category");
        $category = new Category();

        Lavra_Loader::LoadClass("Files");
        $files = new Files();
        if (isset($this->param['category_id'])) {
            if (isset($this->param['is_photos_cat_id'])) {

                $this->gallery = $files->getFiles(205, $this->param['is_photos_cat_id'], 1000);

                $bread = $category->getCategoryId($this->param['is_photos_cat_id']);
                $this->bread_name = $bread->name;
                $this->bread_id = $bread->id;

                $bread = $category->getCategoryId($this->param['category_id']);
                $this->bread_name_2 = $bread->name;
                $this->bread_id_2 = $bread->id;
            } else {
                $this->gallery = $files->getFiles(205, $this->param['category_id'], 1000);

                $this->middle_menu = $category->getChildCategory($this->param['category_id'], 1, 5);

                $bread = $category->getCategoryId($this->param['category_id']);
                $this->bread_name = $bread->name;
                $this->bread_id = $bread->id;
            }
        } else {
            $this->middle_menu = $category->getChildCategory(0, 1, 5);
        }
        /*    }
          }
          else $this->text = "Страница не существует";
         */
    }

    private function _cleanCache() {
        //Очищаем кеш маршрутов и категорий
        $cac = Cache::getInstance();
        $cac->deleteTag('Category');
        $cac->deleteTag('Routes');
        $cac->deleteTag('Files');
        $cac->flush();
    }

    public function getPageAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Pages", "page");
        $page = new Pages();
        if (isset($this->param['pseudo_dir']) || isset($this->param['page_id'])) {
            if (isset($this->param['page_id'])) {
                $this->page = $page->getPageId($this->param['page_id'], $registry->shop_type);
            } else {
                $this->page = $page->getPageFromPseudoDir($this->param['pseudo_dir'], $registry->shop_type);
            }
            if (isset($registry->is_main))
                $this->is_main = $registry->is_main;
            if (isset($this->page->id)) {
                $this->page->header = ($this->page->header);
                $registry->page_id = $this->page->id;
                $registry->head_title = ($this->page->title ? $this->page->title : $this->page->header);
                $registry->head_key = ($this->page->meta_keyword ? $this->page->meta_keyword : $this->page->header);
                $registry->head_desc = ($this->page->meta_desc ? $this->page->meta_desc : $this->page->meta_desc);
                $this->open_category_id = $registry->open_category_id = $this->page->category_id;
                
                Lavra_Loader::LoadClass("Category");
                $category = new Category();
                $parent_cat = $category->getCategoryId($this->page->category_id);
                if (isset($parent_cat->parent_id))
                    $registry->open_category_parent_id = $parent_cat->parent_id;


                $page->getFullAdressPage($registry->page_id, 0, 0, -1, $registry->shop_type);
                $this->bread_page_arr = $page->getFullAdressPageArr();
                //Для хлебной крошки, если есть несколько статей
//                $this->comments = Lavra_Loader::getLoadModule("comments", '/comments/list/5/' . $this->page->id . '/');
            }
        } else
            $this->text = "Страница не существует";
    }

    public function galleryAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Pages", "page");
        $page = new Pages();
        if (isset($registry->page_id) && $registry->page_id > 0) {
            Lavra_Loader::LoadModels("FileUploader", "xuploader");
            $file = new FileUploader();
            $this->files = $file->getFilesPageId(4, $registry->page_id);

            $this->register_object('setFile', $this);
        }
    }

    public function addAction() {
        $registry = Registry::getInstance();
        $this->register_object('setFile', $this);
        if (isset($this->param['type']) && isset($this->param['category_id'])) { //Тип и категория страницы
            $this->param['type'] = 0;
            $this->type = $this->param['type'];
            $this->category_id = $this->param['category_id'];

            /* Пишем  категорию по умолчания в поле Заголовок */
            Lavra_Loader::LoadClass("Category");
            $category = new Category();
            $get_category = $category->getCategoryId($this->category_id);

            if (isset($get_category->name))
                $this->auto_header = $get_category->name;
        } else
            $this->setError("Тип или категория не заданы");
//
        Lavra_Loader::LoadModels("Pages", "page");
        $page = new Pages();

        $this->register_object('page_obj', $page);

        if (!isset($_POST['pseudo_dir']) && isset($this->param['category_id'])) { //Автозаполнение полей
            $category_catalog = $category->getCategoryId($this->param['category_id']);

            $auto_write['title'] = $category_catalog->title;
            $auto_write['meta_key'] = $category_catalog->meta_key;
            $auto_write['meta_desc'] = $category_catalog->meta_desc;

            $this->is_read_only = $category_catalog->is_read_only;

            $_POST['title'] = $auto_write['title'];
            $_POST['meta_keyword'] = $auto_write['meta_key'];
            $_POST['meta_desc'] = $auto_write['meta_desc'];
        }
//
        if (isset($_POST['pseudo_dir'])) {

            if (!isset($_POST['meta_keyword']))
                $_POST['meta_keyword'] = null;
            if (!isset($_POST['meta_desc']))
                $_POST['meta_desc'] = null;
            if (!isset($_POST['pseudo_dir']))
                $_POST['pseudo_dir'] = null;
            if (!isset($_POST['category_id']))
                $_POST['category_id'] = 0;
            if (!isset($_POST['order']))
                $_POST['order'] = $page->getMaxOrder($this->param['category_id']);
            $_POST['pseudo_dir'] = trim($_POST['pseudo_dir']);
            //print_r($_POST);
            $_POST['header'] = str_replace('"', '&quot;', $_POST['header']);
            $_POST['title'] = str_replace('"', '&quot;', $_POST['title']);
            $_POST['meta_keyword'] = str_replace('"', '&quot;', $_POST['meta_keyword']);
            $_POST['meta_desc'] = str_replace('"', '&quot;', $_POST['meta_desc']);

            if (!($_POST['category_id'] == 0 && empty($_POST['pseudo_dir']))) {

                Lavra_Loader::LoadClass("Routes"); //Кэш адресов
                $routes = new Routes();
                $this->_cleanCache();
                if (!isset($this->param['page_id'])) { //Если добавление
                    /* Проверяем существование адреса */
                    if (!$routes->isAdress($page->getFullAdressPage(0, $this->param['category_id'], 0, -1, $registry->shop_type) . $_POST['pseudo_dir'] . '/', 0, $registry->shop_type)) {
                        $page_id = $page->add($_POST['header'], $_POST['text'], $_POST['title'], $_POST['bread_name'], $_POST['meta_keyword'], $_POST['meta_desc'], $_POST['pseudo_dir'], $this->param['category_id'], $this->param['type'], $_POST['order'], $registry->user_id, $registry->user_region_id);
                        $page->setShopType($page_id, $registry->shop_type);
                        if (isset($_POST['text_mobile'])) {
                            $page->setMobileText($page_id, $_POST['text_mobile']);
                        }
                        $routes->setAdress($page_id, 0, $page->getFullAdressPage($page_id, 0, 0, -1, $registry->shop_type), $page->getFullAdressPageArr(), $registry->shop_type);

                        if (isset($this->param['temp_page_id'])) {
                            $page->setPageIdFiles($page_id, $this->param['temp_page_id']);
                        }
                        $this->_cleanCache();
                        if ($_POST['add_image'] == 1) { //Если вход в раздел изображения, редиректим туда
                            $this->redirect($this->admin_url . 'page_images/list/10/' . $page_id . '/');
                        } else {
                            $this->redirect($registry->admin_url . "page/list/$this->type/$this->category_id/1/");
                        }
                    } else
                        $this->setError('Адрес /' . $_POST['pseudo_dir'] . '/ уже используется. Введите другой адрес.');
                } else { //Если редактирование
                    /* Проверяем существование адреса */
                    if (!($routes->isAdress($page->getFullAdressPage($this->param['page_id'], 0, 0, -1, $registry->shop_type), 1, $registry->shop_type) > 0)) {

                        $page->edit($this->param['page_id'], $_POST['header'], $_POST['text'], $_POST['title'], $_POST['bread_name'], $_POST['meta_keyword'], $_POST['meta_desc'], $_POST['pseudo_dir'], $_POST['order']);
                        if (isset($_POST['text_mobile'])) {
                            $page->setMobileText($this->param['page_id'], $_POST['text_mobile']);
                        }
                        $routes->setAdress($this->param['page_id'], 0, $page->getFullAdressPage($this->param['page_id'], 0, 0, -1, $registry->shop_type), $page->getFullAdressPageArr(), $registry->shop_type);

                        $this->_cleanCache();
                        if (!isset($_POST['submit_and'])) {
                            if (!(isset($_POST['save_and']) && $_POST['save_and'])) {
                                if ($_POST['add_image'] == 1) { //Если вход в раздел изображения, редиректим туда
                                    $this->redirect($this->admin_url . 'page_images/list/10/' . $this->param['page_id'] . '/');
                                } else {
                                    $this->redirect($registry->admin_url . "page/list/$this->type/$this->category_id/2/");
                                }
                            } else
                                $this->setMessage("Успешно сохранено!");
                        }
                    } else
                        $this->setError('Адрес <b>' . $_POST['pseudo_dir'] . '</b> уже используется. Введите другой адрес.#');
                }
            } else
                $this->setError("Введите адрес добавляемой страницы");
        }
//
        if (isset($this->param['page_id'])) { //Если редактирование
            $this->page_id = $this->param['page_id'];
            $edit_page = $page->getPage($this->param['page_id'], $registry->shop_type);
            $_POST['order'] = $edit_page->order;
            if (!isset($edit_page->pseudo_dir)) {
//                $this->redirect($registry->admin_url . "page/list/$this->type/$this->category_id/5/");
            }

            $_POST['header'] = $edit_page->header;
            $_POST['text'] = $edit_page->text;
            $_POST['text_mobile'] = $edit_page->text_mobile;
            $_POST['title'] = $edit_page->title;
            $_POST['bread_name'] = $edit_page->bread_name;
            $_POST['meta_keyword'] = $edit_page->meta_keyword;
            $_POST['meta_desc'] = $edit_page->meta_desc;


            Lavra_Loader::LoadModels("FileUploader", "xuploader");
            $file = new FileUploader();
            $this->gallery_url = $registry->gallery_url;
            $_POST['pseudo_dir'] = $edit_page->pseudo_dir;
            $this->page_id = $this->param['page_id'];
            $this->files = $file->getFilesPageId(4, $this->page_id);
            $page_id = $this->page_id;
        } elseif (isset($this->param['temp_page_id']))
            $page_id = $this->param['temp_page_id'];


        $registry->up_category_id = 10; // $this->param['category_id']; //id-категории
        $this->up_page_id = $page_id;

        $registry->up_page_id = $page_id;
        $registry->up_action_id = 7; //id - акшена, сам экшен прописан в модуле upload: getFilesAction, и uploaderAction
        $registry->up_action_width = '320'; //
        $registry->up_action_height = '50';

        $registry->up_width = 0; //Размеры главной картинки
        $registry->up_height = 0;
        $registry->up_type = 1100;
        $registry->up_formats = ''; //Разрешенные форматы
        $registry->up_upload_dir_type = 4; //Тип папки
        //Настройки нарезки 1
        $registry->up_resize_width[1] = 750;
        $registry->up_resize_heigth[1] = 0;
        $registry->up_resize_right_prefix[1] = '_b';
//            $registry->up_resize_scallign[1] = 0.05;
        $registry->up_resize_is_convas[1] = 0;
//            //Настройка водяных знаков
        $registry->up_water_file[1] = '';
        $registry->up_pos_top[1] = '';
        $registry->up_pos_bottom[1] = '';
        $registry->up_pos_left[1] = '';
        $registry->up_pos_right[1] = '';
        $this->upload_photo = Lavra_Loader::getLoadModule('uploader_article', '/uploader_article/list/');
    }

    public function auto_pseudo_dirAction() {
        Lavra_Loader::LoadClass("Application");
        if (isset($_GET['name'])) {
            $app = new Application();
            $this->auto_pseudo_dir = str_replace('--', '-', mb_strtolower(Application::getPseudoDir($app->convertToLatin(trim(($_GET['name']))))));
            echo $this->auto_pseudo_dir;
            exit();
        }
    }

    function isPseudoDirAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Pages", "page");
        Lavra_Loader::LoadClass("Defence");
        $page = new Pages();
        if (isset($this->param['pseudo_dir'])) {
            if ($page->isPseudoDir($this->param['pseudo_dir'])) {
                $this->is_dir = 1;
            } else
                $this->is_dir = 0;
        }
    }

    public function listAction() {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadModels("Pages", "page");
        $pages = new Pages();

        if (isset($this->param['message_id'])) {
            switch ($this->param['message_id']) {
                case 1:
                    $this->setMessage("Страница успешно добавленна!");
                    break;
                case 2:
                    $this->setMessage("Успешно сохранено");
                    break;
                case 3:
                    if ($this->param['del_id']) { // Удаление страницы
                        $this->setMessage("Страница успешно удалена");
                        $pages->del($this->param['del_id']);
                    }
                    break;
                case 5:
                    $this->setMessage("Страница не найдена");
                    break;
            }
        }

        if (isset($_POST['order'])) {
            foreach ($_POST['order'] as $page_id => $order) {
                $pages->setSortOrder($page_id, $order);
            }
        }

        $this->_loadMenu(); //Подгружаем меню
        /* Меню в разделе страницы */

        if (isset($this->param['category_id']))
            $registry->category_id = $this->param['category_id'];

        if (isset($registry->category_id)) {
            $this->pages = $pages->getPages($registry->category_id, 0);

            $this->register_object('page_obj', $pages);

            $this->type = $this->param['type'];
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
                    $this->category_id = $category_list[$this->root_category_id][0]->id;
                } else
                    $this->category_id = $this->root_category_id;
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
        $this->category_tree_list_1 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/page_list/1/");
        //$this->category_tree_list_0 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/page_list/0/");
        $this->category_tree_list_2 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/page_list/2/");
        $this->category_tree_list_3 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/page_list/3/");
        $this->category_tree_list_4 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/page_list/4/");
        $this->category_tree_list_5 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/page_list/5/");
        $this->category_tree_list_6 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/page_list/6/");
        $this->category_tree_list_7 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/page_list/7/");
        if ($registry->shop == 'forum') {
            $this->category_tree_list_101 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/page_list/101/");
        }
    }

    public function setFile($params) {
        return $this->_setFileNameText($params['file'], "_s");
    }

    public function setFileM($params) {
        return $this->_setFileNameText($params['file'], "_m");
    }

    private function _setFileNameText($file_name, $end_string) {
        Lavra_Loader::LoadClass("Images");
        $images = new Images();
        $file = $images->getType($file_name);
        return $file['file'] . $end_string . $file['type'];
    }

    /* Содержание страниц */

    public function contentAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Pages", "page");
        $page = new Pages();

        $this->register_object('page_obj', $page);
//        $content = $page->getPagesContent($registry->open_category_id);
        $this->open_category_id = $registry->open_category_id;
//        echo $registry->open_category_id;
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->childs = $category->getChildCategory($registry->open_category_id, 1);
//        print_r($childs);
//
//        if (count($content) > 20) {
//            $this->last_content = $page->getLastPagesContent($registry->open_category_id);
//        }
//
//        if (count($content)) {//Удаляем основной раздел из списка
//            if (isset($content[0]) && isset($content[0]->pseudo_dir)) {
//                $this->pseudo_dir = $content[0]->pseudo_dir;
//                $this->pseudo_name = $content[0]->header;
//                unset($content[0]);
//                $this->content = $content;
//            }
//        }
    }

    public function findAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Pages", "page");
        $page = new Pages();
        if (isset($_POST['find']) && !empty($_POST['find'])) {
            $this->content = $page->getFindPage($_POST['find']);
        }
        $this->is_find = 1;
    }

}
