<?php


class Captcha {
    private $_width = 150, $_height = 50, $_count_symbol = 5, $_deffects = 2000, $_x = 0, $_y = 0, $_font_size = 15, $_corner = 0;
    private  $_red = 233, $_green = 233, $_blue = 231;
    /**
     * Установка ширины области капчи
     * @param <type> $width
     */
    public function setWidth($width) {
        $this->_width = $width;
    }

    /**
     * Установка высоты области капчи
     * @param <type> $height
     */
    public function setHeight($height) {
        $this->_height = $height;
    }

    /**
     * Установка кол-ва символов, которые будут выводиться
     * @param <type> $count_symbol
     */
    public function setCountSymbol($count_symbol) {
        $this->_count_symbol = $count_symbol;
    }

    /**
     * Возвращает код, который сгенерирован в капче
     * @return <type>
     */
    public function getCode() {
        if (isset ($_SESSION['code'])) {
            return $_SESSION['code'];
        }
        else return false;
    }

    /**
     * Установка высоты текста в капче
     * @param <type> $font_size
     */
    public function setFontSize($font_size = 15) {
        $this->_font_size = $font_size;
    }

    /**
     * Установка угла повората текста в капче
     * @param <type> $corner
     */
    public function setCorner($corner = 0) {
        $this->_corner = $corner;
    }

    /**
     * Установка помех в капче. Чем больше область, тем больше требуется значение. Чем больше значение, тем меньше помех
     * @param <type> $deffects
     */
    public function setDefects($deffects = 2000) {
        $this->_deffects = $deffects;
    }

    /**
     * Координаты текста (возморжно не работает)
     * @param <type> $x
     */
    public function setCoorText($x = 0) {
        $this->_x = $x;
    }

    public function setBackGround($red, $green, $blue) {
        $this->_red = $red;
        $this->_green = $green;
        $this->_blue = $blue;
    }

    public function outCaptcha() {
        $code = null;
        $letters = array('a','b','c','d','e','f',
                'g','h','j','k','m','n',
                'p','q','r','s','t','u',
                'v','w','x','y','z','2',
                '3','4','5','6','7','8','9'); // Символы, используемые в коде

//        $figures = array('50','70','90','110',
//                '130','150','170','190','210'); // Компоненты для RGB-цвета
        $figures = array(0); // Компоненты для RGB-цвета

        $img = imagecreatetruecolor($this->_width, $this->_height); // Создаем пустое изображение
        $fon = imagecolorallocate($img, $this->_red, $this->_green, $this->_blue); // Заливаем фон белым цветом
        imagefill($img, 0, 0, $fon);


// Накладываем защитный код
        for($i=0; $i<$this->_count_symbol; $i++) {
            //Ориентир
            $h = 1;
            //Рисуем
            $color = imagecolorallocatealpha(
                    $img,
                    $figures[rand(0,count($figures)-1)],
                    $figures[rand(0,count($figures)-1)],
                    $figures[rand(0,count($figures)-1)],
                    rand(10,30));

            // Генерируем случайный символ
            $letter = $letters[rand(0,sizeof($letters)-1)];

            // Формируем координаты для вывода символа
            if($this->_x == 0) $this->_x = $this->_width*0.9;
            else $this->_x = $this->_x + ($this->_width*0.9)/$this->_count_symbol+rand(0,$this->_width*0.01);

            if($h == rand(1,2)) $this->_y = (($this->_height*1)/4) + rand(0,$this->_height*0.1);
            else $this->_y = (($this->_height*1-$this->_font_size)/4) - rand(0,$this->_height*0.1);

            $code .= $letter; // Запоминаем символ в переменной $code
            if($h == rand(0,1)) $letter = mb_strtoupper($letter); // Изменяем регистр символа
//            imagestring($img, 7,$this->_x, $this->_y, $letter, $color); // Выводим символ на изображение
            $registry = Registry::getInstance();
            imagettftext($img,$this->_font_size,$this->_corner,$this->_x, $this->_y+20,$color,$registry->lib_dir."elephant.ttf",$letter);
        }

//        for($j=0; $j<$this->_width; $j++) {
//            for($i=0; $i<($this->_height*$this->_width)/$this->_deffects; $i++) {
//                $color = imagecolorallocatealpha(
//                        $img,
//                        $figures[rand(0,count($figures)-1)],
//                        $figures[rand(0,count($figures)-1)],
//                        $figures[rand(0,count($figures)-1)],
//                        rand(10,30));
//                imagesetpixel($img,
//                        rand(0,$this->_width),
//                        rand(0,$this->_height),
//                        $color);
//            }
//        }

        $_SESSION['code'] = $code;

        header ("Content-type: image/jpeg");
        imagejpeg($img,null,100);
    }
}