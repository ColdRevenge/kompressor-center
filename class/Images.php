<?php

class Images {

    private $_OpenResourse = array(); // Хранит все открытые ресурсы, с целью их автоматического закрытия..
    private $_water_file_path = null, $_water_pos_top = 0, $_water_pos_bottom = 0, $_water_pos_left = 0, $_water_pos_right = 0;
    private $_scaling = array(); //масштабирование
    private $_is_convas = 0; //На холсте

    /**
     *
     * @param <type> $width - ширина, на которую будет сжиматься
     * @param <type> $height - высота, на которую будет сжиматься
     * @param <type> $scaling_width - ширина масштабирования
     * @param <type> $scaling_height - высота масштабирования
     */

    public function setScaling($width, $height, $scaling_width, $scaling_height) {
        $this->_scaling['width'][$width] = $scaling_width;
        $this->_scaling['height'][$height] = $scaling_height;
    }

    /**
     * Размещать изображения на холсте
     * @param <type> $is_convas
     */
    public function setIsConvas($is_convas) {
        $this->_is_convas = $is_convas;
    }

    public function getType($file) {
        $pos_type = mb_strrpos($file, ".");
        $type = mb_substr($file, $pos_type);
        $file = mb_substr($file, 0, $pos_type);

        return array("file" => $file, 'type' => $type);
    }

    private function _getAutoWidth($height, $real_height, $real_width) {
        $k = $height / $real_height;
        return round($real_width * $k);
    }

    private function _getAutoHeight($width, $real_width, $real_height) {
        $k = $width / $real_width;
        return round($real_height * $k);
    }

    /**
     * Изменяет размер изображения 
     * @param array $resourse - ресурс возвращаемый методом open
     * @param string $width, размер на который нужно изменить, если 0 то размер вычесляется по-высоте
     * @param string $height, размер на который нужно изменить, если 0 то размер вычесляется по-ширине
     * @return resourse - возвращает ресурс на измененный размер
     */
    public function ReSize(Array $resourse, $width, $height) {
        if ($width != 0 || $height != 0) { //Если задана ширина или высота
            //Реальный размер картинки
            $real_width = imagesx($resourse['resourse']);
            $real_height = imagesy($resourse['resourse']);


            if ($height == 0) $height = $this->_getAutoHeight($width, $real_width, $real_height);
            if ($width == 0) $width = $this->_getAutoWidth($height, $real_height, $real_width);

            //Размер холста
            $convas_width = $width;
            $convas_height = $height;

            //Установка новых размеров
            $new_width = $width;
            $new_height = $height;

            $is_change_width = false;

//            print_r($this->_scaling);
            if (isset($this->_scaling['width']) && isset($this->_scaling['height']) && isset($this->_scaling['height'][$height]) && isset($this->_scaling['width'][$width]) && ($this->_scaling['width'][$width] != 0 && $this->_scaling['height'][$height] != 0)) { //Если установлена масштабируемость
                if (isset($this->_scaling['width'][$width]) && $this->_scaling['width'][$width] > 0) {
                    $new_width = $this->_scaling['width'][$width];
                    $new_height = round(($this->_scaling['width'][$width] / $width) * $height);
                    $is_change_width = true;
                }
                if (isset($this->_scaling['height'][$height]) && $this->_scaling['height'][$height] > 0) {
                    $new_height = $this->_scaling['height'][$height];
                    if ($is_change_width == false) {
                        $new_width = round(($this->_scaling['height'][$height] / $height) * $width);
                    }
                }
                
                $this->_is_convas = true; //Автоматом ставим холст, в противном случае будет увеличение размеров
//                echo "<pre>";
//                print_r($this->_scaling);
//                echo $this->_is_convas . '#<br/></pre>';
            }


            if ($real_width >= $new_width) {
                $width = $new_width;
            } else {
                $width = $real_width;
            }
            $k = $width / $real_width;
            $height = round($real_height * $k);

            if ($height > $new_height) { //Если требуется еще уменьшить по высоте
                $k = $new_height / $height;
                $height = $new_height;
                $width = ceil($width * $k);
            }

            if (!$this->_is_convas) {
                $convas_width = $width;
                $convas_height = $height;
            } else { //Если изображение меньше, то будет заливка белым фоном (если не хватает)
            }

            $left = ($convas_width - $width) / 2;
            $top = ($convas_height - $height) / 2;

            $new_resourse = imagecreatetruecolor($convas_width, $convas_height);
            $ink = imagecolorallocate($new_resourse, 255, 255, 255);
            imagefilledrectangle($new_resourse, 0, 0, $convas_width, $convas_height, $ink);

            $this->_OpenResourse[] = $new_resourse; //Записываем открытый ресурс..
            if ($resourse['type'] == 2) { //Для png сохраняем прозрачность
                //$this->_transparent($new_resourse, $width, $height);
            }
            //  echo "$top x $left<br/>#$width x $height<br/>";
            imagecopyresampled($new_resourse, $resourse['resourse'], $left, $top, 0, 0, $width, $height, imagesx($resourse['resourse']), imagesy($resourse['resourse']));
            return array("resourse" => $new_resourse, "type" => $resourse['type'], 'width' => $width, 'height' => $height);
        }
    }

    /**
     * Устанавливает водяной знак на изображение
     * @param <type> $file_path
     * @param <type> $pos_top
     * @param <type> $pos_bottom
     * @param <type> $pos_right
     * @param <type> $pos_left
     */
    public function setWaterImage($file_path, $pos_top, $pos_bottom, $pos_right, $pos_left) {
        $this->_water_file_path = $file_path;
        $this->_water_pos_bottom = $pos_bottom;
        $this->_water_pos_left = $pos_left;
        $this->_water_pos_right = $pos_right;
        $this->_water_pos_top = $pos_top;
    }

    /**
     * Проверяет, есть ли для заливаемой картинки водяной знак
     * @return <type>
     */
    private function _isWaterImage() {
        if (!empty($this->_water_file_path) && file_exists($this->_water_file_path)) {
            return true;
        }
        else return false;
    }

    /**
     * Непосредствено устанавливат водяной знак на изображение
     */
    private function _setWaterImage(Array $resourse) {
        if ($this->_isWaterImage()) {
            $water_resourse = $this->_open($this->_water_file_path); //Открываем водный знак

            $water_width = imagesx($water_resourse['resourse']);
            $water_height = imagesy($water_resourse['resourse']);

            imageAlphaBlending($water_resourse['resourse'], false);
            imageSaveAlpha($water_resourse['resourse'], true);

            $trcolor = imagecolorallocate($water_resourse['resourse'], 255, 255, 255);
            imagecolortransparent($water_resourse['resourse'], $trcolor);

            //$pos_left = $resourse['width'] - $water_width;

            if ($this->_water_pos_left > 0) { //Отступ слева на право
                $pos_left = $this->_water_pos_left;
            } elseif ($this->_water_pos_right > 0) { //Отступ справа на лево
                $pos_left = (int) (imagesx($resourse['resourse']) - $water_width) - $this->_water_pos_right;
            } 
            else { //По центру
                $pos_left = (int) (imagesx($resourse['resourse']) - $water_width) / 2;
            }

            if ($this->_water_pos_top > 0) { //Подсчет отступа по-высоте
                $pos_right = $this->_water_pos_top;
            } 
            elseif ($this->_water_pos_bottom > 0) { //Отступ снизу
                $pos_right = (int) (imagesy($resourse['resourse']) - $water_height) - $this->_water_pos_bottom;
            } 
            else { //По центру
                $pos_right = (int) (imagesy($resourse['resourse']) - $water_height) / 2;
            }

            echo "
width = " . imagesx($resourse['resourse']) . "                <br/>
    
height = " . imagesy($resourse['resourse']) . "                                    <br/>
       water_width = $water_width             <br/>
       water_height   =        $water_height 
                    <br/>---<br/>
pos_left = $pos_left,<br/> 
pos_right = $pos_right, <br/>
water_width = $water_width, <br/>
water_height = $water_height<br/><Br/><br/>=====<br/>
";

            imagecopy($resourse['resourse'], $water_resourse['resourse'], $pos_left, $pos_right, 0, 0, $water_width, $water_height);
        }
    }

    /**
     * Для изображений gif и png сохраняет прозрачность
     */
    private function _transparent($resourse, $width = 0, $height = 0) {
        imagealphablending($resourse, false);
        imagesavealpha($resourse, true);
        $transparent = imagecolorallocatealpha($resourse, 255, 255, 255, 127);
        imagefilledrectangle($resourse, 0, 0, $width, $height, $transparent);
    }

    /**
     *
     * @param array $resourse
     * @param string $path_image
     * @return boolean
     */
    public function save(Array $resourse, $path_image, $quality = 100) {
        $this->_setWaterImage($resourse); //Перед сохранением накладываем водяной знак(если он есть)

        switch ($resourse['type']) {
            case 1:
                $this->_transparent($resourse['resourse']);
                if (!imagegif($resourse['resourse'], $path_image, $quality)) return false;
                break;
            case 2:
                $this->_transparent($resourse['resourse']);
                if (!imagepng($resourse['resourse'], $path_image)) return false;
                break;
            case 3: if (!imagejpeg($resourse['resourse'], $path_image, $quality)) return false;
                break;
            case 4: if (!imagewbmp($resourse['resourse'], $path_image, $quality)) return false;
                break;
            default: throw new Exception("Неведанный тип картинки O_o");
        }
        return true;
    }

    /**
     * Пишет текст на картинке
     * @param <type> $text
     */
    public function setText($text = null) {
        
    }

    public function show($resourse) {
        switch ($resourse['type']) {
            case 1:
                header("Content-type: image/gif");
                imagesavealpha($resourse['resourse'], true);
                if (!imagegif($resourse['resourse'])) return false;
                break;
            case 2:
                header("Content-type: image/png");
                imagesavealpha($resourse['resourse'], true);
                if (!imagepng($resourse['resourse'])) return false;
                break;
            case 3:
                header("Content-type: image/jpeg");
                if (!imagejpeg($resourse['resourse'])) return false;
                break;
            case 4:
                header("Content-type: image/bmp");
                if (!imagewbmp($resourse['resourse'])) return false;
                break;
            default: throw new Exception("Невиданный тип картинки O_o");
        }
        return true;
    }

    public function getWidth($resourse) {
        return imagesx($resourse['resourse']);
    }

    public function getHeight($resourse) {
        return imagesy($resourse['resourse']);
    }

    /**
     * Открывает картинку, возвращает ресурс
     * @param string $path_image
     * @return resourse
     */
    public function open($path_image) {
        $resourse = $this->_open($path_image);
        $this->_OpenResourse[] = $resourse['resourse']; //Записываем открытый ресурс..
        return $resourse;
    }

    private function _open($path_image) {
        if (file_exists($path_image) && filetype($path_image) == 'file') {
            if ($this->isImage($path_image)) {
                $type = $this->isImage($path_image);

                switch ($type) {
                    case 1: $resourse = imagecreatefromgif($path_image);
                        break;
                    case 2: $resourse = imagecreatefrompng($path_image);
                        break;
                    case 3: $resourse = imagecreatefromjpeg($path_image);
                        break;
                    case 4: $resourse = imagecreatefromwbmp($path_image);
                        break;
                    default: throw new Exception("Невиданный тип картинки O_o");
                }
                return array("resourse" => $resourse, "type" => $type);
            }
            else throw new Exception("Файл $path_image не является картинкой");
        }
        else throw new Exception("Файл $path_image не найден, или не является файлом");
    }

    /**
     * Очищает память
     * @param Resourse $resourse
     * @return boolean
     */
    private function close($resourse) {
        return imagedestroy($resourse);
    }

    /**
     *  Проверяет файл на картинка или нет, возвращает порядковый номер типа картинки
     * @param string $path_image
     * @return integer
     */
    public function isImage($path_image) {
        $mime_type = array("image\/gif", "image\/png", "image\/jpeg", "image\/bmp");
        if (function_exists("mime_content_type")) { //Если функция mime_content_type существует
            foreach ($mime_type as $key => $mime) {
                if (preg_match("/$mime/", mime_content_type($path_image))) {
                    return ($key + 1);
                }
            }
        } else {
            $type = array("gif", "png", "jpeg", "jpg", "bmp");
            foreach ($type as $key => $mime) {
                if (preg_match("/\.[a-zA-Z]{3,4}$/", $path_image, $match)) {
                    if (mb_strtolower(trim(($match[0]), ".")) == $mime) {
                        if ($key == 3) return 3;
                        return ($key + 1);
                    }
                }
            }
        }
        return false;
    }

    public function getTypeImage($img) {
        return mb_substr($img, mb_strrpos($img, '.') + 1);
    }

    public function getImageName($img) {
        return mb_substr($img, 0, mb_strrpos($img, '.'));
    }

    public function __destruct() {
        foreach ($this->_OpenResourse as $resourse) {
            if (!$this->close($resourse)) {
                throw new Exception("Ресурс-картинки \"$resourse\" не может быть закрыт");
            }
        }
    }

}