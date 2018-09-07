<?php

//http://utm-soft.ru/xadmin/uploader/list/?category_id=0&page_id=0&width=0&height=0&type=1&formats=jpg|gif|png|jpeg&resize_width_1=100&resize_heigth_1=100&resize_right_prefix_1=_aaa&resize_scallign_1=0.4&resize_is_convas_1=1

error_reporting(E_ALL);

class uploader_articleController extends Controller {

    private $_is_logger = 0; //Если == 1 Записывает в upload_rit файл с логом

    public function getFilesAction() {
        $this->param['page_id'] = (isset($this->param['page_id'])) ? $this->param['page_id'] : 0;
        $this->param['category_id'] = (isset($this->param['category_id'])) ? $this->param['category_id'] : 0;
        $this->type = $this->param['type'] = (isset($this->param['type'])) ? $this->param['type'] : 0;
        $this->param['image_id'] = (isset($this->param['image_id'])) ? $this->param['image_id'] : 0;

        /**
         * АКШЕНЫ! 
         */
        $this->act_url = null;
        $this->action_id = $this->param['action_id'] = (isset($this->param['action_id'])) ? $this->param['action_id'] : 0;
        switch ($this->action_id) {
            case 7:  //Акшен для модуля баннеры
                $this->act_url = $this->base_url . 'banners/edit/#img_id#/';
                break;
        }
//echo $this->action_id;

        Lavra_Loader::LoadClass("Files");
        $file = new Files();

        if (isset($this->param['act_id']) && isset($this->param['image_id'])) {
            switch ($this->param['act_id']) {
                case 1: //Удаление
                    $get_file = $file->getFileId($this->param['image_id']);
                    $upload_dir = $this->_getUploadDir($get_file->upload_dir_type);

                    $file->del($this->param['image_id'], $upload_dir);
                    break;
                case 2: //В право сортировка
                    $file->setLeftOrder($this->param['page_id'], $this->param['type'], $this->param['image_id']);
                    break;
                case 3: //В лево сортировка
                    $file->setRightOrder($this->param['page_id'], $this->param['type'], $this->param['image_id']);
                    break;

                default:
                    break;
            }
        }
        if ($this->param['page_id'] != 0) {
            $this->files = $file->getFilesPageId($this->param['type'], $this->param['page_id']);
        } elseif ($this->param['category_id'] != 0) {
            $this->files = $file->getFilesCategoryId($this->param['type'], $this->param['category_id'], 0);
        }
//        echo "<pre>";
//        print_r($this->files);
//        echo "</pre>";
    }

    /**
     * Показывает форму загрузки и другие формы 
     */
    public function uploaderAction() {
        $registry = Registry::getInstance();
        if (count($registry->get_module)) $_GET = $registry->get_module; //Если параметры переданны через модуль

        $this->page_id = $this->param['page_id'] = (isset($registry->up_page_id)) ? $registry->up_page_id : 0;
        $this->category_id = $this->param['category_id'] = (isset($registry->up_category_id)) ? $registry->up_category_id : 0;
        $this->type = $this->param['type'] = (isset($registry->up_type)) ? $registry->up_type : 0;
        $this->height = (isset($registry->up_height)) ? $registry->up_height : 0;
        $this->width = (isset($registry->up_width)) ? $registry->up_width : 0;
        $this->formats = (isset($registry->up_formats)) ? $registry->up_formats : null;
        $this->action_id = $this->param['action_id'] = (isset($registry->up_action_id)) ? $registry->up_action_id : 0;

        switch ($this->action_id) {
            case 7:  //Акшен для модуля баннеры
                $this->act_width = (isset($registry->up_action_width) ? $registry->up_action_width : '200px');
                $this->act_height = (isset($registry->up_action_height) ? $registry->up_action_height : '200px');
                break;
        }
        //3 режима нарезки фотографий


        $this->resize_type = (isset($_GET['resize_type'])) ? $_GET['resize_type'] : 0;
        $this->upload_dir_type = (isset($registry->up_upload_dir_type)) ? $registry->up_upload_dir_type : 0;

        for ($i = 1; $i <= 6; $i++) { //6 режимов нарезки фоток
            $this->{'resize_width_' . $i} = (isset($registry->up_resize_width[$i])) ? $registry->up_resize_width[$i] : 0;
            $this->{'resize_heigth_' . $i} = (isset($registry->up_resize_heigth[$i])) ? $registry->up_resize_heigth[$i] : 0;
            $this->{'resize_right_prefix_' . $i} = (isset($registry->up_resize_right_prefix[$i])) ? $registry->up_resize_right_prefix[$i] : 0;
            $this->{'resize_scallign_' . $i} = (isset($registry->up_resize_scallign[$i])) ? $registry->up_resize_scallign[$i] : 0;
            $this->{'resize_is_convas_' . $i} = (isset($registry->up_resize_is_convas[$i])) ? $registry->up_resize_is_convas[$i] : 0;

            $this->{'water_file_' . $i} = (isset($registry->up_water_file[$i])) ? $registry->up_water_file[$i] : 0;
            $this->{'pos_top_' . $i} = (isset($registry->up_pos_top[$i])) ? $registry->up_pos_top[$i] : 0;
            $this->{'pos_bottom_' . $i} = (isset($registry->up_pos_bottom[$i])) ? $registry->up_pos_bottom[$i] : 0;
            $this->{'pos_left_' . $i} = (isset($registry->up_pos_left[$i])) ? $registry->up_pos_left[$i] : 0;
            $this->{'pos_right_' . $i} = (isset($registry->up_pos_right[$i])) ? $registry->up_pos_right[$i] : 0;
        }

        $this->getFilesAction();
    }

    private function _getUploadDir($upload_dir_type) {
        $registry = Registry::getInstance();
        switch ($upload_dir_type) {
            case 1: //Иконки 
                $upload_dir = $registry->icons_dir;
                break;
            case 2: //Картинки 
                $upload_dir = $registry->gallery_dir;
                break;
            case 3: //Баннеры 
                $upload_dir = $registry->banners_dir;
                break;
            case 4: //Картинки к статьям 
                $upload_dir = $registry->articles_images_dir;
                break;
            case 5: //Файлы к статьям 
                $upload_dir = $registry->articles_files_dir;
                break;
            default: //Файлы
                $upload_dir = $registry->files_dir;
                break;
        }
        return $upload_dir;
    }

    /**
     * Заливка файлов
     */
    public function uploadAction() {
        Lavra_Loader::LoadClass("Images");
        $is_image = false; //Если картинка
        $registry = Registry::getInstance();
        if (count($registry->get_module)) $_GET = $registry->get_module; //Если параметры переданны через модуль

        if ($this->_is_logger == 1) {
            ob_start();
        }
        $page_id = (isset($_GET['page_id'])) ? $_GET['page_id'] : 0;
        $category_id = (isset($_GET['category_id'])) ? $_GET['category_id'] : 0;
        $type = (isset($_GET['type'])) ? $_GET['type'] : 0;
        $formats = (isset($_GET['formats'])) ? $_GET['formats'] : array();
        $resize_type = (isset($_GET['resize_type'])) ? $_GET['resize_type'] : 0; //Тип нарезки изображений
        /* Настройка путей */
        $upload_dir_type = (isset($_GET['upload_dir_type'])) ? $_GET['upload_dir_type'] : 0;
        $upload_dir = $this->_getUploadDir($upload_dir_type);
// list of valid extensions, ex. array("jpeg", "xml", "bmp")
        if ($formats) $allowedExtensions = explode('|', $formats);
        else $allowedExtensions = array();

// max file size in bytes
        $sizeLimit = 10 * 1024 * 1024;

        require($registry->base_dir . 'js/uploader/server/php.php');
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

// Call handleUpload() with the name of the folder, relative to PHP's getcwd()
        $result = $uploader->handleUpload($upload_dir);

// to pass data through iframe you will need to encode all html tags
        echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);


        //Если требуется нарезка фотографий
        $width = (isset($_GET['width'])) ? $_GET['width'] : 0;
        $height = (isset($_GET['height'])) ? $_GET['height'] : 0;
        try {
            if ($uploader->getUploadName()) {//Если файл залит
                $images = new Images();
                $is_image = $images->isImage($upload_dir . $uploader->getUploadName());
                if ($is_image == false) $resize_type = 200; //Если файл не картинка, то тип будет 200

                $img_size = (getimagesize($upload_dir . $uploader->getUploadName()));
//Если загружаемое фото больше 1400 пикселей, то уменьшаем до 1400
                if ($img_size[0] > 1400) {
                    $this->_setResize($upload_dir . $uploader->getUploadName(), $upload_dir . $uploader->getUploadName(), 1400, 0, 0, 0, 'water-1000.png', 0, 0);
                } elseif ($is_image != false) {
                    $this->_setResize($upload_dir . $uploader->getUploadName(), $upload_dir . $uploader->getUploadName(), $img_size[0], 0, 0, 0, 'water-550.png', 0, 0);
                }

                Lavra_Loader::LoadClass("Files");
                $file = new Files();
                $max_order = $file->getMaxOrder($type, $page_id);

                $file_id = $file->add($uploader->getUploadName(), filesize($upload_dir . $uploader->getUploadName()), $uploader->getName(), null, $is_image, $resize_type, $type, $upload_dir_type, $width, $height, $category_id, $page_id, 0, $max_order);

                if ($is_image != false) { //Если картинка, то создаем превьюшку и нарезаем
                    $output_file = $this->_setRightPrefix($uploader->getUploadName(), '_' . time() . '_prev');
                    $output_dir = $registry->preview_dir . $output_file;
                    $this->_setResize($upload_dir . $uploader->getUploadName(), $output_dir, 100, 100, 0.1, 0.1);
                    $file->add($output_file, filesize($output_dir), $uploader->getName(), null, 1, 100, $type, $upload_dir_type, 100, 100, $category_id, $page_id, $file_id, $max_order);
                    //Нарезка фоток
                    if ($img_size[0] > 750) { //Уменьшаем фотки если очень большие
                        $this->_setMultiResize($upload_dir, $upload_dir_type, $uploader->getUploadName(), $uploader->getUploadName(), null, $type, $category_id, $page_id, $file_id, $max_order);
                    }
                    if ($img_size[0] > 160) { //Уменьшаем фотки если очень большие
                        $output_small_file = $this->_setRightPrefix($uploader->getUploadName(), '_s');
                        $output_small_dir = $upload_dir . $output_small_file;
                        $this->_setResize($upload_dir . $uploader->getUploadName(), $output_small_dir, 160, 0, 0.1, 0.1);
                        $file->add($output_small_file, filesize($output_small_dir), $uploader->getName(), null, 1, 2, $type, $upload_dir_type, 180, 0, $category_id, $page_id, $file_id, $max_order);
//                        $this->_setMultiResize($upload_dir, $upload_dir_type, $uploader->getUploadName(), $uploader->getUploadName(), null, $type, $category_id, $page_id, $file_id, $max_order);
                    }
                }
            }
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
        if ($this->_is_logger == 1) {
            $f = fopen($upload_dir . 'log.log', 'w');
            fwrite($f, ob_get_clean());
            fclose($f);
        }
    }

    /**
     * Нарезка дополнительных фото 
     */
    private function _setMultiResize($upload_dir, $upload_dir_type, $source_file, $name, $desc, $type, $category_id, $page_id, $file_id, $max_order) {
        //3 режима нарезки фотографий
        Lavra_Loader::LoadClass("Files");
        $file = new Files();
        try {
            if (isset($_GET['resize_width'])) {
                $_GET['resize_width'] = explode('|', $_GET['resize_width']);
                $_GET['resize_heigth'] = explode('|', $_GET['resize_heigth']);
                $_GET['resize_right_prefix'] = explode('|', $_GET['resize_right_prefix']);
                $_GET['resize_scallign'] = explode('|', $_GET['resize_scallign']);
                $_GET['resize_is_convas'] = explode('|', $_GET['resize_is_convas']);

                $_GET['water_file'] = explode('|', $_GET['water_file']);
                $_GET['pos_top'] = explode('|', $_GET['pos_top']);
                $_GET['pos_bottom'] = explode('|', $_GET['pos_bottom']);
                $_GET['pos_left'] = explode('|', $_GET['pos_left']);
                $_GET['pos_right'] = explode('|', $_GET['pos_right']);

                foreach ($_GET['resize_width'] as $key => $value) {
                    if ($_GET['resize_width'][$key] > 0 || $_GET['resize_heigth'][$key] > 0) {
                        $output_file = $this->_setRightPrefix($upload_dir . $source_file, $_GET['resize_right_prefix'][$key]);
                        $this->_setResize($upload_dir . $source_file, $output_file, $_GET['resize_width'][$key], $_GET['resize_heigth'][$key], $_GET['resize_scallign'][$key], $_GET['resize_is_convas'][$key], $_GET['water_file'][$key], $_GET['pos_top'][$key], $_GET['pos_bottom'][$key], $_GET['pos_left'][$key], $_GET['pos_right'][$key]);

                        $file->add($this->_setRightPrefix($source_file, $_GET['resize_right_prefix'][$key]), filesize($output_file), $name, $desc, 1, $key + 1, $type, $upload_dir_type, $_GET['resize_width'][$key], $_GET['resize_heigth'][$key], $category_id, $page_id, $file_id, $max_order);
                    }
                }
            }
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Устанавливает префикс до типа файла
     * @param type $file_name
     * @param type $end_string
     * @return type 
     */
    private function _setRightPrefix($file_name, $prefix) {
        $images = new Images();
        $file = $images->getType($file_name);
        return $file['file'] . $prefix . $file['type'];
    }

    private function _setResize($source_file, $output_file, $width, $height, $scallign, $is_convas, $water_file = null, $pos_top = 0, $pos_bottom = 0, $pos_left = 0, $pos_right = 0) {
        $registry = Registry::getInstance();
        $images = new Images();
        $resourse = $images->open($source_file);
        $images->setIsConvas($is_convas);
        $images->setScaling($width, $height, ($width + ($width * $scallign)), ($height + ($height * $scallign)));
        if ($water_file) $images->setWaterImage($registry->fronted_images_dir . $water_file, $pos_top, $pos_bottom, $pos_right, $pos_left);
        $images->save($images->ReSize($resourse, $width, $height), $output_file, 100);
        return $output_file;
    }

}

