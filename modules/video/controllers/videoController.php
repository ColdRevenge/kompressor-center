<?php


/**
 ALTER TABLE `files` ADD `category_id` INT( 11 ) NOT NULL DEFAULT '0' AFTER `height` ;

ALTER TABLE `files` ADD INDEX ( `category_id` ) ;

 */
class videoController extends Controller {
    public function xuploaderAction() {
        $this->_loadMenu();
        Lavra_Loader::LoadModels("FileUploader", "video");
        $file = new FileUploader();

        $registry = Registry::getInstance();
        if (isset ($this->param['del_id'])) {
            $del_file = $file->getFileId($this->param['del_id']);
            unlink($registry->video_dir.$del_file->file);

            $file->del($this->param['del_id']);

        }
        //Настройки вывода текстовых полей/форм
        if (isset ($registry->is_name) && $registry->is_name == 1) $this->is_name = 1;
        else $this->is_name = 0;
        if (isset ($registry->is_desc) && $registry->is_desc == 1) $this->is_desc = 1;
        else $this->is_desc = 0;

        if (isset ($this->param['category_id'])) {
            $this->files = $file->getFiles($registry->type, $this->param['category_id']);
         //   $this->template = $registry->template.'.tpl';
        }
        else $this->setError("Не выбрана категория (в левом меню)");
    }

    /**
     * Заливка файлов
     */
    public function uploadAction() {
        $registry = Registry::getInstance();
        try {
            Lavra_Loader::LoadClass("Uploader");
            Lavra_Loader::LoadClass("Images");
            Lavra_Loader::LoadModels("FileUploader", "video");
            $file = new FileUploader();
            $images = new Images();

            $upload = new Uploader($registry->video_dir);
            $upload->setPrefix($registry->prefix);
            $upload->setMaxSize($registry->max_size);
            $upload->isConvertLatinName(true);
            $upload->addAllowType('flv');
            $upload->addAllowType('swf');
            $upload->setMaxSize(2500);
            
            $file_name = $upload->upload();



            if (!isset ($_POST['name'])) $_POST['name'] = null;
            if (!isset ($_POST['desc'])) $_POST['desc'] = null;
            if (!isset ($_POST['category_id'])) $_POST['category_id'] = 0;

            $file->add($file_name, $upload->getSize(), $_POST['name'], $_POST['desc'], 0, $registry->type, $_POST['category_id']);

            $this->out = "<script type='text/javascript'>window.parent.document.getElementById('load_file').innerHTML=''; AjaxQueryParentFrame('file_list', '".$this->MyURL."list/".$_POST['category_id']."/');</script>";
        }
        catch (Exception $e) {
            $this->out = "<script type='text/javascript'>window.parent.document.getElementById('load_file').innerHTML='Произошла ошибка: ".$e->getMessage()."';</script>";
        }
    }

    public function site_videoAction() {
        Lavra_Loader::LoadModels("FileUploader", "video");
        $file = new FileUploader();
        $this->files = $file->getFiles(5, 34);
    }

    /*
     * Меню в разделе страницы
     * Сделать подгрузку меню не только для подразделов, но и для разделов, в зависимости от типа сайта
    */
    private function _loadMenu() {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        if (!isset ($this->param['type'])) $this->param['type'] = 0; //Тип по умолчанию
        if (!isset ($this->param['category_id'])) { //Категория по умолчанию
            $category_list = $category->getCategory($this->param['type'], $registry->shop_type);
            if (isset ($category_list[0]) && isset ($category_list[0][0]) && isset ($category_list[0][0]->id)) {
                $this->root_category_id = $category_list[0][0]->id;
                if (isset ($category_list[$this->root_category_id]) && isset ($category_list[$this->root_category_id][0]) && isset ($category_list[$this->root_category_id][0]->id)) {
                    $this->category_id = $category_list[$this->root_category_id][0]->id;
                }
                else $this->setError("Подразделы меню не заполнены. Для заполнения перейдите в <a href='".$this->admin_rul."category/list/'>раздел меню</a>");
            }
            else $this->setError("Разделы меню не заполнены. Для заполнения перейдите в <a href='".$this->admin_rul."category/list/'>раздел меню</a>");
        }
        else { //Выделяем рутовую категорию
            $category_list = $category->getCategoryId($this->param['category_id']);

            if (isset ($category_list->id)) {
                $this->root_category_id = $category_list->parent_id;
                $this->category_id = $category_list->id;
            }
            else $this->setError("Раздел не найден");
        }
        $registry->root_category_id = $this->root_category_id; //Выделяем разделы меню
        $registry->category_id = $this->category_id; //Выделяем разделы меню
        $this->param['category_id'] = $registry->category_id;

        //Подгрузка модуля выбора категорий
        $this->category_tree_list = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir."category/video/16/");
    }

}

