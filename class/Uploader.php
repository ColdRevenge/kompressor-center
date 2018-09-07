<?php


/**
 @example
 $upload = new Uploader("files/");
 $upload->setPrefix("x_".rand(0, 1000)."_");
 $upload->addAllowMimeType("image/png");
 $upload->addAllowMimeType("image/jpeg");
 $upload->addAllowMimeType("image/gif");
 $upload->addAllowType(".png");
 $upload->addAllowType("jpeg");
 $upload->addAllowType("gif");
 $upload->setMaxSize(290);
 $upload->setMinSize(120);
 $filename = $upload->upload();
 echo "Имя загруженого файла: ".$upload->upload();
 */
class Uploader {
    private $_dinst_dir,$_name_field = null;
    private $_name, $_size, $_error, $_tmp_name, $_type = null;
    private $_allow_mime_type = array(), $_allow_type = array();
    private $_prefix = null;
    private $_max_size = 0, $_min_size = 0;
    private $_is_convert = false;

    /**
     *
     * @param <string> $dinst_dir - путь до папки куда должно заливаться
     * @param <string> $name_field - атрибут name поля file в html-форме.
     * Указывать нужно при отправке нескольких файлов из одной формы. Если не указать берется первый.
     */
    public function __construct($dinst_dir, $name_field = null) {
        if (file_exists($dinst_dir) && filetype($dinst_dir) == "dir") { //Проверяем на существование папку заливки
            $this->_dinst_dir = rtrim($dinst_dir,"/")."/";
        }
        else throw new Exception("Папка куда должны заливаться файлы не существует [$dinst_dir]");

        if ($name_field == null) { //Если имя поля не задано
            $this->_name_field = key($_FILES);
        }
        elseif (isset($_FILES[$name_field])) $this->_name_field = $name_field;

        if (!empty($this->_name_field)) { //Если файл был залит
            $this->_error = $_FILES[$this->_name_field]['error'];
            if ($this->_error == 0) {
                $this->_name = $_FILES[$this->_name_field]['name'];
                $this->_size = $_FILES[$this->_name_field]['size']/1024;
                $this->_tmp_name = $_FILES[$this->_name_field]['tmp_name'];
                $this->_type = $_FILES[$this->_name_field]['type'];
            }
            else $this->getError($this->_error);
        }
    }

    /**
     * Устанавливает имя загружаемого файла
     * @param <type> $name
     */
    public function setName($name) {
        $this->_name = $name;
    }

    /**
     * Добовляет разрешенные для загрузки расширения файлов
     * @param string $type
     */
    public function addAllowType($type) {
        $this->_allow_type[] = trim($type,".");
    }

    /**
     * Добовляет разрешенные для загрузки mime-типы файлов
     * @param string $mime_type
     */
    public function addAllowMimeType($mime_type) {
        $this->_allow_mime_type[] = trim($mime_type);
    }

    /**
     * По номеру ошибки возвращает сообщение
     * @param <integer> $error_num
     */
    private function getError($error_num) {
        switch ($error_num) {
            case 1: throw new Exception("Размер файла слишком большой");
                break;
            case 2: throw new Exception("Размер файла слишком большой");
                break;
            case 3: throw new Exception("Файл загружен не полностью");
                break;
            default: throw new Exception("Файл не был загружен");
                break;
        }
    }

    public function getSize() {
        return $this->_size;
    }

    /**
     * Возвращает расширение файла $file_name
     *
     * @param string $file_name
     * @return string
     */
    public function getType($file_name) {
        return mb_strtolower(trim(mb_substr($file_name,mb_strrpos($file_name,".")+1)));
    }

    private function _isMimeType() {
        if (in_array($this->_type,$this->_allow_mime_type) || empty($this->_allow_mime_type)) {
            return true;
        }
        else return false;
    }

    private function _isType() {
        if (in_array($this->getType($this->_name),$this->_allow_type) || empty($this->_allow_type)) {
            return true;
        }
        else return false;
    }

    /**
     * Если true, конвертирует русское имя в латиницу. Необходимо при заливки файлов с русскими именами
     */
    public function isConvertLatinName($converted = false) {
        $this->_is_convert = $converted;
    }

    /**
     * Устанавливает префикс для загруженого имени файла
     * @param <string> $prefix
     */
    public function setPrefix($prefix = null) {
        $this->_prefix = $prefix;
    }

    /**
     * Устанавливает максимальный размер загружаемого файла (в килобайтах)
     * @param <integer> $max_size
     */
    public function setMaxSize($max_size) {
        $this->_max_size = $max_size;
    }

    /**
     * Устанавливает минимальный размер загружаемого файла (в килобайтах)
     * @param <integer> $max_size
     */
    public function setMinSize($min_size) {
        $this->_min_size = $min_size;
    }

    private function _getConvertLatinName($name) {
        $convert_chars = array(" " => "_", "!" => null, "?" => null, "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "e", "ж" => "j", "з" => "z", "и" => "i", "й" => "iy", "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t", "у" => "y", "ф" => "f", "х" => "x", "ц" => "c", "ч" => "ch", "ш" => "sh", "щ" => "sh", "ъ" => "", "ы" => "u", "ь" => "", "э" => "e", "ю" => "u", "я" => "ya", "А" => "A", "Б" => "B", "В" => "V", "Г" => "G", "Д" => "D", "Е" => "E", "Ё" => "E", "Ж" => "J", "З" => "Z", "И" => "I", "Й" => "IY", "К" => "K", "Л" => "L", "М" => "M", "Н" => "N", "О" => "O", "П" => "P", "Р" => "R", "С" => "S", "Т" => "T", "У" => "Y", "Ф" => "F", "Х" => "X", "Ц" => "C", "Ч" => "CH", "Ш" => "SH", "Щ" => "SH", "Ъ" => "", "Ы" => "U", "Ь" => "", "Э" => "E", "Ю" => "U", "Я" => "YA",);
        $str = null;

        for ($i=0; $i<=mb_strlen($name); $i++) {
            $char = mb_substr($name, $i, 1);

            if (isset ($convert_chars[$char])) {
                $str .= $convert_chars[$char];
            }
            else $str .= $char;
        }
        return $str;
    }

    /**
     * Смотрит, была ли отправка файла на сервера
     */
    public function isUpload() {
        return (isset ($_FILES[$this->_name_field]) && !empty($_FILES[$this->_name_field]['name']));
    }

    /**
     * Загружает файл
     * @return <boolean>
     */
    public function upload() {
        if (!empty($this->_name_field)) {
            if ($this->_isType() && $this->_isMimeType()) {
                if (($this->_size <= $this->_max_size || $this->_max_size == 0)) {
                    if (($this->_size >= $this->_min_size || $this->_min_size == 0)) {
                        if ($this->_is_convert == true) { //Если нужно конвертировать имя в латиницу, то конвертим
                            $this->_name = $this->_getConvertLatinName($this->_name);
                        }
                        if (move_uploaded_file($this->_tmp_name,"$this->_dinst_dir$this->_prefix$this->_name")) {
                            return $this->_prefix.$this->_name;
                        }
                        else throw new Exception("Ошибка при копировании из временой директории [$this->_dinst_dir$this->_prefix$this->_name]");
                    }
                    else throw new Exception("Загружаемый файл слишком маленький");
                }
                else throw new Exception("Загружаемый файл слишком большой");
            }
            else throw new Exception("Тип файла не поддерживается");
        }
        return false;
    }
}
