<?php

error_reporting(E_ALL);

class uploader_productsController extends Controller {

    private $_is_logger = 0; //Если == 1 Записывает в upload_rit файл с логом

    public function getFilesAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("ImagesUploader", "uploader_products");
        $img = new ImagesUploader();
        $this->product_id = $this->param['product_id'] = (isset($this->param['product_id'])) ? $this->param['product_id'] : 0;
        $this->type = $this->param['type'] = (isset($this->param['type'])) ? $this->param['type'] : 0;
        $this->image_id = $this->param['image_id'] = (isset($this->param['image_id'])) ? $this->param['image_id'] : 0;

        Lavra_Loader::LoadClass("Files");
        $file = new Files();

        if (isset($this->param['act_id']) && isset($this->param['image_id'])) {
            switch ($this->param['act_id']) {
                case 1: //Удаление картинки
//                    $get_file = $file->getFileId($this->param['image_id']);
                    $upload_dir = $registry->gallery_dir;

                    $file->del($this->param['image_id'], $upload_dir); //Удаляем превьюшки
                    $img->delImagesGroup($this->param['product_id'], $this->param['image_id'], $registry->gallery_dir); //Удаляем фото товаров
                    break;
                case 5: //Удаление файла
                    $file->del($this->param['image_id'], $registry->files_products_dir); //Удаляем превьюшки
//                    $this->files = $file->getFilesPageId($this->param['type'], $this->param['image_id']); //Картинки
//                    $this->tech_files = $file->getFilesPageId(444777, $this->param['image_id']); //Файлы
                    break;
                case 2: //В право сортировка
                    $img->setLeftOrder($this->param['product_id'], $this->param['type'], $this->param['image_id'], 1);
                    break;
                case 3: //В лево сортировка
                    $img->setRightOrder($this->param['product_id'], $this->param['type'], $this->param['image_id'], 1);
                    break;

                default:
                    break;
            }
        }
        if ($this->param['product_id'] != 0) {
            $this->files = $file->getFilesPageId($this->param['type'], $this->param['product_id']); //Картинки
       
            $this->tech_files = $file->getFilesPageId(($this->param['type']), $this->param['product_id']); //Файлы
        }
    }

    /**
     * Показывает форму загрузки и другие формы 
     */
    public function uploaderAction() {
        $registry = Registry::getInstance();
        if (count($registry->get_module))
            $_GET = $registry->get_module; //Если параметры переданны через модуль

        $this->product_id = $this->param['product_id'] = (isset($registry->up_product_id)) ? $registry->up_product_id : 0;
        $this->type = $this->param['type'] = (isset($registry->up_type)) ? $registry->up_type : 0;
        $this->formats = (isset($registry->up_formats)) ? $registry->up_formats : null;

        $this->getFilesAction();
    }

    /**
     * Заливка файлов
     */
    public function uploadAction() {
        Lavra_Loader::LoadClass("Images");
        $is_image = false; //Если картинка
        $registry = Registry::getInstance();

        if ($this->_is_logger == 1) {
            ob_start();
        }
        $product_id = (isset($_GET['product_id'])) ? $_GET['product_id'] : 0;
        $type = (isset($_GET['type'])) ? $_GET['type'] : 0;

        $formats = (isset($_GET['formats'])) ? $_GET['formats'] : array();
        /* Настройка путей */
        if ($formats)
            $allowedExtensions = explode('|', $formats);
        else
            $allowedExtensions = array();

        $sizeLimit = 10 * 1024 * 1024;
        require($registry->base_dir . 'js/uploader/server/php.php');
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($registry->gallery_dir);
        echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        try {

            Lavra_Loader::LoadClass("Images");
            $images = new Images();
            $name = $uploader->getUploadName();
            if ($name) {//Если файл залит
                if ($images->isImage($registry->gallery_dir . $name) === false) { //Если это файл
           
                    $output_file = $this->_setRightPrefix($name, '_' . $product_id);
                    if (rename($registry->gallery_dir . $name, $registry->files_products_dir . $output_file)) {
                        
                        $file_size = (int)(filesize($registry->files_products_dir . $output_file) / 1024);
                        Lavra_Loader::LoadClass("Files");
                        $file = new Files();
                        $file->add($output_file, $file_size, $uploader->getRealUploadName(), null, 0, 0, $type, 0, 0, 0, 0, $product_id, 0, 0);
                    } else {
                        throw new Exception("Ошибка при копировании");
                    }
                } else { //Загрузка фоток продукта
                    $group_id = time() + rand(0, 5000);
                    $this->_uploadPreview($uploader, $type, $product_id, $group_id); //Создаем превьюшки
                    $this->_uploadImages($uploader->getUploadName(), $product_id, $group_id, $type); //Нарезаем фотки
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if ($this->_is_logger == 1) {
            $f = fopen($registry->gallery_dir . 'log.log', 'w');
            fwrite($f, ob_get_clean());
            fclose($f);
        }
    }

    /**
     * Функция создает превьюшки
     * @param type $uploader
     * @param type $type
     * @param type $product_id
     */
    private function _uploadPreview($uploader, $type, $product_id, $group_id) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Files");
        $file = new Files();
        $max_order = $file->getMaxOrder($type, $product_id);

//        $file_id = $file->add($uploader->getUploadName(), filesize($registry->gallery_dir . $uploader->getUploadName()), $uploader->getName(), null, $is_image, $resize_type, $type, $upload_dir_type, $width, $height, $category_id, $product_id, 0, $max_order);
        //Если картинка, то создаем превьюшку и нарезаем
        $output_file = $this->_setRightPrefix($uploader->getUploadName(), '_' . time() . '_prev');
        $output_dir = $registry->preview_dir . $output_file;
        $this->_setResize($registry->gallery_dir . $uploader->getUploadName(), $output_dir, 100, 100, 0.1, 0.1);
        $file->add($output_file, filesize($output_dir), $uploader->getName(), null, 1, 100, $type, 0, 100, 100, 0, $product_id, $group_id, $max_order);
    }

    /**
     * Функция нарезает картинки товаров
     * @param type $file_name
     */
    private function _uploadImages($file_name, $product_id, $group_id, $type) {
        $this->_init();
        $registry = Registry::getInstance();
        $images = new Images();
        Lavra_Loader::LoadModels("ImagesUploader", "uploader_products");
        $file = new ImagesUploader();

        if (isset($registry->resizes) && isset($registry->resizes[0])) { //Если необходимо изменение размеров фотографии
            $images = new Images();

            $max_order = $file->getMaxOrder($type, $product_id);
            foreach ($registry->resizes as $value) {

                $resize_file_name = $this->_ReSize($value, $images, $file_name, $value['type']);
                if ($resize_file_name) {
                    $size = getimagesize($registry->gallery_dir . $resize_file_name);
                    $file_size = filesize($registry->gallery_dir . $resize_file_name) / 1024;

                    $file->add($resize_file_name, "", "", $file_size, $size[0], $size[1], $value['type'], $product_id, $group_id, $max_order, $type);
                }
            }
        }

        if (file_exists($registry->gallery_dir . $file_name)) {
            unlink($registry->gallery_dir . $file_name);
        }
    }

    /**
     * Чтение параметров нарезки
     */
    private function _init() {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadClass("ProductSetting");
        $scaling_h = array();
        $scaling_w = array();

        $scaling_w[1] = 0;
        $scaling_h[1] = 0;

        $scaling_w[2] = 0;
        $scaling_h[2] = 0;

        $scaling_w[3] = 0;
        $scaling_h[3] = 0;

        $scaling_w[4] = 0;
        $scaling_h[4] = 0;

        $scaling_w[5] = 0;
        $scaling_h[5] = 0;

        $scaling_w[6] = 0;
        $scaling_h[6] = 0;

        $scaling_w[7] = 0;
        $scaling_h[7] = 0;

        $scaling_w[8] = 0;
        $scaling_h[8] = 0;

        $scaling_w[9] = 80;
        $scaling_h[9] = 0;



        $setting = new ProductSetting();
        $sizes = $setting->getImageSettings();

        $scalling = array();

        foreach ($sizes as $value) {
            if (isset($scaling_w[$value->id])) {
                $scalling['width'][$value->width] = $scaling_w[$value->id];
            } else
                $scalling['width'][$value->width] = 0;

            if (isset($scaling_h[$value->id])) {
                $scalling['height'][$value->height] = $scaling_h[$value->id];
            } else
                $scalling['height'][$value->height] = 0;
        }
        $registry->scaling = $scalling;
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

    private function _ReSize($img_arr, Images $images, $file_name, $type) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("ImagesUploader", "uploader_products");
        Lavra_Loader::LoadClass('Application');
        $app = new Application();
        $file = new ImagesUploader();

        if (!isset($img_arr['prefix']))
            $img_arr['prefix'] = null;
        if (!isset($img_arr['width']))
            $img_arr['width'] = 0;
        if (!isset($img_arr['height']))
            $img_arr['height'] = 0;
        if (!isset($img_arr['scaling_width']))
            $img_arr['scaling_width'] = 0;
        if (!isset($img_arr['scaling_height']))
            $img_arr['scaling_height'] = 0;

        if (!($img_arr['width'] == 0 && $img_arr['height'] == 0)) {
            Lavra_Loader::LoadClass("ProductSetting");
            $setting = new ProductSetting();
            $resisize = $setting->getImageSettingId($type);
            $resourse = $images->open($registry->gallery_dir . $file_name);
            if (!empty($resisize->water_file)) {
                $images->setWaterImage($registry->fronted_images_dir . '' . $resisize->water_file, $resisize->pos_top, $resisize->pos_bottom, $resisize->pos_right, $resisize->pos_left);
            } else
                $images->setWaterImage(null, 0, 0, 0, 0);

            $file_name = $app->convertToLatin($images->getImageName($file_name)) . $img_arr['prefix'] . "." . $images->getTypeImage($file_name);
            $old_file_name = $file_name;

            $check_all_name = true;

            //Проходим по цифрам, без букв
            for ($i = 1; $i <= count($registry->scaling['height']); $i++) {
                $file_name = $this->_getSubFileName($file_name) . $img_arr['prefix'] . "." . $images->getTypeImage($file_name);
                if ($file->isImageName($file_name)) { //Если файл уже существует, то пропускаем
                    $check_all_name = false;
                    break;
                }
            }

            if ($check_all_name == false) { //Если файл без букв существует
                for ($char = 'A'; $char < 'Z'; $char++) {
                    $check_all_name = true;
                    for ($i = 1; $i <= count($registry->scaling['height']); $i++) {
                        $file_name = $this->_getSubFileName($file_name) . "_" . $char . $img_arr['prefix'] . "." . $images->getTypeImage($file_name);
                        if ($file->isImageName($file_name)) {
                            $check_all_name = false;
                            break;
                        }
                    }
                    if ($check_all_name == true) {
                        break;
                        ;
                    }
                }
            } else {
                $file_name = $old_file_name;
            }

            if ($check_all_name == true) {
                if (isset($char)) {
                    $this->_first_images_char = $char;
                }
            }


            $images->setIsConvas($img_arr['is_convas']);
            $images->setScaling($img_arr['width'], $img_arr['height'], $img_arr['scaling_width'], $img_arr['scaling_height']);
            $images->save($images->ReSize($resourse, $img_arr['width'], $img_arr['height']), $registry->gallery_dir . $file_name, 90);
            return $file_name;
        }
        return false;
    }

    private function _setResize($source_file, $output_file, $width, $height, $scallign, $is_convas, $water_file = null, $pos_top = 0, $pos_bottom = 0, $pos_left = 0, $pos_right = 0) {
        $registry = Registry::getInstance();
        $images = new Images();
        $resourse = $images->open($source_file);
        $images->setIsConvas($is_convas);
        $images->setScaling($width, $height, ($width + ($width * $scallign)), ($height + ($height * $scallign)));
        if ($water_file)
            $images->setWaterImage($registry->fronted_images_dir . $water_file, $pos_top, $pos_bottom, $pos_right, $pos_left);
        $images->save($images->ReSize($resourse, $width, $height), $output_file, 100);
        return $output_file;
    }

    /**
     * Обрезает системные обозначения на конце файла
     * @param <type> $name
     * @return <type>
     */
    private function _getSubFileName($name) {
        preg_match("/(.+)_[A-Z]{1}_\d{1}\./", $name, $match);
        if (!isset($match[1])) { //Если не найдено двух символов в конце
            preg_match("/(.+)_\d{1}\./", $name, $match);
            if (isset($match[1])) { //Если не найдено двух символов в конце
                return $match[1];
            } else
                return false;
        } else
            return $match[1];
    }

}
