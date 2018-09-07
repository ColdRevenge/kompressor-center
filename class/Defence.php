<?php
class Defence {
    static public function isMail($email) {
        return preg_match("/^[0-9A-Za-z_\.\-А-Яа-я]{2,100}@[a-zА-Яа-яA-Z0-9_\.\-]{2,50}\.[a-zA-ZА-Яа-я]{2,10}$/",$email);
    }

    public static function isName($name) {
        return (1-(int)preg_match("/[^А-Яа-я\.\sЁё]/",$name));
    }
    public static function isPhone($name) {
        return (1-(int)preg_match("/[0-9]{5,11}/",$name));
    }
    /**
     * @param
     * string $login - логин
     * integer $minlenght - минимальное количество символов пароля(если не указывается, то берется из конфигурационого файла)
     * integer $maxlenght - минимальное количество символов пароля(если не указывается, то берется из конфигурационого файла)
     * @return string
     **/
    public static function isLogin($login='') {
        if (!preg_match("#^[-A-Z_a-z0-9]+$#","$login")) return false;
        return true;
    }

    public static function isICQ($login='') {
        if (!preg_match("#^[0-9]{4,10}$#","$login")) return false;
        return true;
    }

    /**
     * Функция проверяет на правильность магнет ссылки
     * @param <type> $magnet
     * @return <boolean>
     */
    public static function isMagnetLink($magnet=null) {

        if (!preg_match("/^magnet:\?xt\=urn:tree:tiger:([A-Z0-9]*)&x.\=([0-9]*)&dn\=(.*)$/",$magnet))  return false;
        else return true;
        ///magnet:?xt=urn:tree:tiger:2SA6KVQ7TKCPO5JTYIVANS2UT5LLAWLMY65RYXQ&xl=731441152&dn=100.futov.2008.P.DVDRip.KINODOME.avi
        // magnet:?xt=urn:tree:tiger:HNGSMDMB44ETCFXVCN5O2BXD3UZ7U4BQI4UF6RI&xl=80422912&dn=devahi+i+butilka.avi

    }

    /**
     * Проверяет магнет-ссылки, и возвращает правильный массив магнет ссылок (игнорируя пустые значения)
     * @param array $magnets
     * @return <Array>
     */
    public static function getIsMagnetLinks(Array $magnets) {
        $magnet = array();
        foreach ($magnets as $key => $value) {
            if (!empty ($value)) {
                if (!Defence::isMagnetLink($value)) {
                    throw new Exception("Магнет ссылка заполнена не корректно \"$value\"");
                }
                else $magnet[] = $value;
            }
        }
        
        if (!count($magnet)) {
            throw new Exception("Магнет ссылки не заполнены");
        }
        return $magnet;;

    }

    /**
     * @desc Функция проверяет правильность пароля
     * @param
     * string $password - пароль
     * @return string
     **/
    public static function isPassword($password='') {
        return (1-(int)preg_match("/[^A-Za-z0-9_]/",$password));
        return true;
    }

    /**
     * Проверка правильности IP-шника
     *
     * @param string $ip
     * @return boolean
     */
    public function isIP($ip) {
        preg_match("/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/",$ip,$mathes);
        if (isset($mathes[0]) && !preg_match("/[^\d\.]/",$ip)) return true;
        else return false;
    }

    public static function isMAC($mac) {
        preg_match("/[A-Fa-f0-9]{2}.{1}[A-Fa-f0-9]{2}.{1}[A-Fa-f0-9]{2}.{1}[A-Fa-f0-9]{2}.{1}[A-Fa-f0-9]{2}.{1}[A-Fa-f0-9]{2}/",$mac,$mathes);

        if (isset($mathes[0]) && !preg_match("/[^\d:A-Za-z-]/",$mac)) return true;
        else return false;
    }
}