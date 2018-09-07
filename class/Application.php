<?php

class Application {

    static public function checkPrice($price) {
        return str_replace("$", null, str_replace(" ", null, str_replace(",", ".", trim(str_replace(" ", null, str_replace(" ", null, $price))))));
    }

    /**
     * Заменяет невидимые экселевксие символы на пробелы
     */
    static public function replaceExcelSymbol($string, $replace = ' ') {
        return trim(preg_replace('/([^ёЁа-яА-Яa-zA-Z0-9_\(\)\{\}\[\]\+\\\=\`\~\-,\.\/\•])/i', $replace, $string));
    }

    public static function getMonths($format = 0) {
        if ($format == 0) {
            return array("Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря");
        } elseif ($format == 1) {
            return array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
        }
    }

    /**
     * Конвертирует текст из русского в латиницу
     * @param <type> $name
     * @return <type>
     */
    public function convertToLatin($name) {
        $convert_chars = array("{" => "_", "}" => "_", ")" => "_", "(" => "_", "№" => "_", " " => "-", "!" => null, "?" => null, "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "e", "ж" => "j", "з" => "z", "и" => "i", "й" => "iy", "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t", "у" => "y", "ф" => "f", "х" => "x", "ц" => "c", "ч" => "ch", "ш" => "sh", "щ" => "sh", "ъ" => "", "ы" => "u", "ь" => "", "э" => "e", "ю" => "u", "я" => "ya", "А" => "A", "Б" => "B", "В" => "V", "Г" => "G", "Д" => "D", "Е" => "E", "Ё" => "E", "Ж" => "J", "З" => "Z", "И" => "I", "Й" => "IY", "К" => "K", "Л" => "L", "М" => "M", "Н" => "N", "О" => "O", "П" => "P", "Р" => "R", "С" => "S", "Т" => "T", "У" => "Y", "Ф" => "F", "Х" => "X", "Ц" => "C", "Ч" => "CH", "Ш" => "SH", "Щ" => "SH", "Ъ" => "", "Ы" => "U", "Ь" => "", "Э" => "E", "Ю" => "U", "Я" => "YA",);
        $str = null;

        for ($i = 0; $i <= mb_strlen($name); $i++) {
            $char = mb_substr($name, $i, 1);

            if (isset($convert_chars[$char])) {
                $str .= $convert_chars[$char];
            } else
                $str .= $char;
        }
        return $str;
    }

    /**
     * Возвращает только буквы и тире
     *      */
    static public function getPseudoDir($dir) {
        return preg_replace('/[^A-Za-z0-9\-]/', '-', $dir);
    }

    /**
     * Переводит в нижний регистр (родная функция не работает)
     */
    public function lower($string) {
        $convert_chars = array("Ц" => "ц", "А" => "а", "Б" => "б", "В" => "в", "Г" => "г", "Д" => "д", "Е" => "е", "Ё" => "ё", "Ж" => "ж", "З" => "з", "И" => "и", "Й" => "й", "К" => "к", "Л" => "л", "М" => "м", "Н" => "н", "О" => "о", "П" => "п", "Р" => "р", "С" => "с", "Т" => "т", "У" => "у", "Ф" => "ф", "Х" => "х", "ц" => "с", "Ч" => "ч", "Ш" => "ш", "Щ" => "щ", "Ъ" => "ъ", "Ы" => "ы", "Ь" => "ь", "Э" => "э", "Ю" => "ю", "Я" => "я");
        $return = null;
        for ($c = 0; $c <= mb_strlen($string); $c++) {
            if (isset($string[$c]))
                if (isset($convert_chars[$string[$c]])) {
                    $return .= $convert_chars[$string[$c]];
                } else
                    $return .= $string[$c];
        }
        return mb_strtolower($return);
    }

    /**
     * Определяет язык
     * @param <type> $string
     * @return $type - тип, 1 - русский символ, 2 - латиница, 3 - цифра
     *
     * @return <type>
     */
    public function getLangType($string) {
        if (preg_match("/^[A-Za-z]+$/", $string)) {
            return 2;
        } elseif (preg_match("/^[0-9]+$/", $string)) {
            return 3;
        } else
            return 1;
    }

    public function getParseMagnetLink($magnet) {
        preg_match("/^magnet:\?xt\=urn:tree:tiger:([A-Z0-9]*)&x.\=([0-9]*)&dn\=(.*)$/", $magnet, $matches);
        return array("file" => $matches[3], "size" => $matches[2], "tth" => $matches[1]);
    }

    /**
     * Перекодировка из utf-8 в cp-1251
     *
     * @param string $string - текст который нужно перекодировать
     * @return string
     */
    static public function utf8_to_cp1251($string) {
        if (!empty($string)) {
            if (Application::isUtf8($string)) {
                return iconv("utf-8", "cp1251", $string);
            }
            return $string;
        } else
            return null;
    }

    /**
     * Определяет кодировку, если utf-8 возвращает true
     */
    static public function isUtf8($string) {
        if (preg_match('//u', $string)) {
            return true;
        } else
            return false;
    }

    /**
     * Перекодировка из cp-1251 в utf-8
     *
     * @param string $string - текст который нужно перекодировать
     * @return string
     */
    static public function cp1251_to_uft8($string) {
        return iconv("cp1251", "utf-8", $string);
    }

    /**
     * Обрезает строку до $count_chars кол-ва символов. Обрезает так, что на конце будет какой-нибудь знак.
     * @return string
     */
    static public function getPreviewText($text, $count_chars = 300) {
        $text = mb_substr($text, 0, $count_chars);
        $char_1 = mb_strrpos($text, ".");
        $char_2 = mb_strrpos($text, "?");
        $char_3 = mb_strrpos($text, "!");
        $char = ($char_1 > $char_2) ? $char_1 : $char_2;
        $char = ($char > $char_3) ? $char : $char_3;
        return mb_substr($text, 0, $char + 1);
    }

    /**
     * Меняет регистр первой буквы у русских слов
     *
     * @param unknown_type $word
     * @return unknown
     */
    public static function upFirst($word) {
        if (!empty($word[0])) {
            $ascii = ord($word);
            $word[0] = chr((($ascii - 32) >= 192) ? $ascii - 32 : $ascii);
            return $word;
        } else
            return null;
    }

    /**
     * Функция преобразовывает телефон к единому виду
     * 8(916)702-99-29 11 цифр
     * 502-02-70 - 7 цифр
     * (495)502-02-70 - 10 цифр
     * @return string
     */
    static public function transPhoneNumb($phone_number) {
        $phone_numb = str_replace("+", null, str_replace(" ", null, str_replace("-", null, str_replace(")", null, str_replace("(", null, $phone_number)))));

        //Если только цифры
        if (!preg_match("/\D/", $phone_numb)) {
            $count_char = mb_strlen($phone_numb);
            if ($count_char == 7 || $count_char == 10 || $count_char == 11) {
                return $phone_numb;
            } else
                return $phone_numb;
        } else
            return $phone_numb;
    }

    static public function cutCharPhone($phone_numb) {
        $phone_numb = str_replace(" ", null, str_replace("-", null, str_replace(")", null, str_replace("(", null, $phone_numb))));
        return $phone_numb;
    }

    /**
     * Функция преобразовывает телефон к единому виду
     * 8(916)702-99-29 11 цифр
     * 502-02-70 - 7 цифр
     * (495)502-02-70 - 10 цифр
     * @return string
     */
    static public function transPhoneString($phone_number) {
        $phone_numb = str_replace(" ", null, str_replace("-", null, str_replace(")", null, str_replace("(", null, $phone_number))));
        $str = null;
        //Если только цифры
        if (!preg_match("/\D/", $phone_numb)) {
            $count_char = mb_strlen($phone_numb);
            if ($count_char == 7 || $count_char == 10 || $count_char == 11) {
                switch ($count_char) {
                    case 7:
                        for ($i = 0; $i <= mb_strlen($phone_numb); $i++) {
                            switch ($i) {
                                case '3': $str .= "-";
                                    break;
                                case '5': $str .= "-";
                                    break;
                            }
                            if (isset($phone_numb[$i]))
                                $str .= $phone_numb[$i];
                        }
                        return $str;
                    case 10:
                        for ($i = 0; $i <= mb_strlen($phone_numb); $i++) {
                            switch ($i) {
                                case '0': $str .= "(";
                                    break;
                                case '3': $str .= ")";
                                    break;
                                case '6': $str .= "-";
                                    break;
                                case '8': $str .= "-";
                                    break;
                            }
                            if (isset($phone_numb[$i]))
                                $str .= $phone_numb[$i];
                        }
                        return $str;
                    case 11:
                        for ($i = 0; $i <= mb_strlen($phone_numb); $i++) {
                            switch ($i) {
                                case '1': $str .= "(";
                                    break;
                                case '4': $str .= ")";
                                    break;
                                case '7': $str .= "-";
                                    break;
                                case '9': $str .= "-";
                                    break;
                            }
                            if (isset($phone_numb[$i]))
                                $str .= $phone_numb[$i];
                        }
                        return $str;
                }
            } else
                return $phone_number;
        } else
            return $phone_number;
    }

}
