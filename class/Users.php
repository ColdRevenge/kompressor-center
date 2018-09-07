<?php

class Users {

    public function add($login, $password, $name, $last_name, $middle_name, $phone, $email, $email_2, $email_3, $city, $city_index, $adress, $profession, $metro_id, $icq, $birth_day, $info, $company_name, $company_fax, $company_inn, $company_ur_adress, $company_bank, $company_bik, $company_rs, $company_ks, $company_kpp, $company_okpo, $company_oknx, $company_fio_director, $company_fio_accountant, $param_str_1, $param_str_2, $param_str_3, $b2b_price, $reg_ip, $default_currency_id, $is_jur_person, $is_mailer, $is_mailer_2, $user_type) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("INSERT INTO users (created, login, password, name, last_name, middle_name, phone, email, email_2, email_3, city, city_index, adress, profession, metro_id, icq, birth_day, info, company_name, company_fax, company_inn, company_ur_adress, company_bank, company_bik, company_rs, company_ks, company_kpp, company_okpo, company_oknx, company_fio_director, company_fio_accountant, param_str_1, param_str_2, param_str_3, b2b_price, reg_ip, default_currency_id, is_jur_person , is_mailer, is_mailer_2, user_type, is_blocked, is_delete) VALUES (UNIX_TIMESTAMP(NOW()), :login, :password, :name, :last_name, :middle_name, :phone, :email, :email_2, :email_3, :city, :city_index, :adress, :profession, :metro_id, :icq, :birth_day, :info, :company_name, :company_fax, :company_inn, :company_ur_adress, :company_bank, :company_bik, :company_rs, :company_ks, :company_kpp, :company_okpo, :company_oknx, :company_fio_director, :company_fio_accountant, :param_str_1, :param_str_2, :param_str_3, :b2b_price, :reg_ip, :default_currency_id, :is_jur_person, :is_mailer, :is_mailer_2, :user_type, 0, 0)");
        $query->bindParam("login", $login, PDO::PARAM_STR, 255);
        $query->bindParam("password", $password, PDO::PARAM_STR, 255);
        $query->bindParam("name", $name, PDO::PARAM_STR, 255);
        $query->bindParam("last_name", $last_name, PDO::PARAM_STR, 255);
        $query->bindParam("middle_name", $middle_name, PDO::PARAM_STR, 255);
        $query->bindParam("phone", $phone, PDO::PARAM_STR, 255);
        $query->bindParam("email", $email, PDO::PARAM_STR, 255);
        $query->bindParam("email_2", $email_2, PDO::PARAM_STR, 255);
        $query->bindParam("email_3", $email_3, PDO::PARAM_STR, 255);
        $query->bindParam("city", $city, PDO::PARAM_STR, 255);
        $query->bindParam("city_index", $city_index, PDO::PARAM_STR, 255);
        $query->bindParam("adress", $adress, PDO::PARAM_STR);
        $query->bindParam("profession", $profession, PDO::PARAM_STR, 255);
        $query->bindParam("metro_id", $metro_id, PDO::PARAM_INT, 11);
        $query->bindParam("icq", $icq, PDO::PARAM_INT, 11);
        $query->bindParam("birth_day", $birth_day, PDO::PARAM_INT, 11);
        $query->bindParam("info", $info, PDO::PARAM_STR);
        $query->bindParam("company_name", $company_name, PDO::PARAM_STR, 255);
        $query->bindParam("company_fax", $company_fax, PDO::PARAM_STR, 255);
        $query->bindParam("company_inn", $company_inn, PDO::PARAM_STR, 255);
        $query->bindParam("company_ur_adress", $company_ur_adress, PDO::PARAM_STR, 255);
        $query->bindParam("company_bank", $company_bank, PDO::PARAM_STR, 255);
        $query->bindParam("company_bik", $company_bik, PDO::PARAM_STR, 255);
        $query->bindParam("company_rs", $company_rs, PDO::PARAM_STR, 255);
        $query->bindParam("company_ks", $company_ks, PDO::PARAM_STR, 255);
        $query->bindParam("company_kpp", $company_kpp, PDO::PARAM_STR, 255);
        $query->bindParam("company_okpo", $company_okpo, PDO::PARAM_STR, 255);
        $query->bindParam("company_oknx", $company_oknx, PDO::PARAM_STR, 255);
        $query->bindParam("company_fio_director", $company_fio_director, PDO::PARAM_STR, 255);
        $query->bindParam("company_fio_accountant", $company_fio_accountant, PDO::PARAM_STR, 255);
        $query->bindParam("param_str_1", $param_str_1, PDO::PARAM_STR, 255);
        $query->bindParam("param_str_2", $param_str_2, PDO::PARAM_STR, 255);
        $query->bindParam("param_str_3", $param_str_3, PDO::PARAM_STR, 255);
        $query->bindParam("b2b_price", $b2b_price, PDO::PARAM_INT, 11);
        $query->bindParam("reg_ip", $reg_ip, PDO::PARAM_INT, 11);
        $query->bindParam("default_currency_id", $default_currency_id, PDO::PARAM_INT, 5);
        $query->bindParam("is_jur_person", $is_jur_person, PDO::PARAM_INT, 5);
        $query->bindParam("is_mailer", $is_mailer, PDO::PARAM_INT, 5);
        $query->bindParam("is_mailer_2", $is_mailer_2, PDO::PARAM_INT, 5);
        $query->bindParam("user_type", $user_type, PDO::PARAM_INT, 5);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function addUserSocial($login, $password, $name, $social_type, $social_uid, $social_screen_name, $user_type, $city, $birth_day, $phone = '', $email = '') {

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');
        
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO users (created, login, password, name, social_type, social_uid, social_screen_name, phone, email, city, birth_day, reg_ip, user_type) VALUES "
                . "(UNIX_TIMESTAMP(NOW()), :login, :password, :name, :social_type, :social_uid, :social_screen_name, :phone, :email, :city, :birth_day, :reg_ip, :user_type)");
        $query->bindParam("login", $login, PDO::PARAM_STR, 255);
        $query->bindParam("password", $password, PDO::PARAM_STR, 255);
        $query->bindParam("name", $name, PDO::PARAM_STR, 255);
        $query->bindParam("social_type", $social_type, PDO::PARAM_STR, 255);
        $query->bindParam("social_uid", $social_uid, PDO::PARAM_INT, 11);
        $query->bindParam("social_screen_name", $social_screen_name, PDO::PARAM_STR, 255);
        $query->bindParam("phone", $phone, PDO::PARAM_STR, 255);
        $query->bindParam("email", $email, PDO::PARAM_STR, 255);
        $query->bindParam("city", $city, PDO::PARAM_STR, 255);
        $query->bindParam("birth_day", $birth_day, PDO::PARAM_INT, 11);
        $query->bindParam("reg_ip", $_SERVER['REMOTE_ADDR'], PDO::PARAM_INT, 11);
        $query->bindParam("user_type", $user_type, PDO::PARAM_INT, 5);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function edit($id, $login, $password, $name, $last_name, $middle_name, $phone, $email, $email_2, $email_3, $city, $city_index, $adress, $profession, $metro_id, $icq, $birth_day, $info, $company_name, $company_fax, $company_inn, $company_ur_adress, $company_bank, $company_bik, $company_rs, $company_ks, $company_kpp, $company_okpo, $company_oknx, $company_fio_director, $company_fio_accountant, $param_str_1, $param_str_2, $param_str_3, $b2b_price, $default_currency_id, $is_jur_person, $is_mailer, $is_mailer_2, $user_type) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users SET login=:login, password=:password, name=:name, last_name=:last_name, middle_name=:middle_name, phone=:phone, email=:email, email_2=:email_2, email_3=:email_3, city=:city, city_index=:city_index, adress=:adress, profession=:profession, metro_id=:metro_id, icq=:icq, birth_day=:birth_day, info=:info, company_name=:company_name, company_fax=:company_fax, company_inn=:company_inn, company_ur_adress=:company_ur_adress, company_bank=:company_bank, company_bik=:company_bik, company_rs=:company_rs, company_ks=:company_ks, company_kpp=:company_kpp, company_okpo=:company_okpo, company_oknx=:company_oknx, company_fio_director=:company_fio_director, company_fio_accountant=:company_fio_accountant, param_str_1=:param_str_1, param_str_2=:param_str_2, param_str_3=:param_str_3, b2b_price=:b2b_price, default_currency_id=:default_currency_id, is_jur_person=:is_jur_person , is_mailer=:is_mailer, is_mailer_2=:is_mailer_2, user_type=:user_type WHERE id=:id LIMIT 1");
        $query->bindParam("id", $id, PDO::PARAM_INT, 11);
        $query->bindParam("login", $login, PDO::PARAM_STR, 255);
        $query->bindParam("password", $password, PDO::PARAM_STR, 255);
        $query->bindParam("name", $name, PDO::PARAM_STR, 255);
        $query->bindParam("last_name", $last_name, PDO::PARAM_STR, 255);
        $query->bindParam("middle_name", $middle_name, PDO::PARAM_STR, 255);
        $query->bindParam("phone", $phone, PDO::PARAM_STR, 255);
        $query->bindParam("email", $email, PDO::PARAM_STR, 255);
        $query->bindParam("email_2", $email_2, PDO::PARAM_STR, 255);
        $query->bindParam("email_3", $email_3, PDO::PARAM_STR, 255);
        $query->bindParam("city", $city, PDO::PARAM_STR, 255);
        $query->bindParam("city_index", $city_index, PDO::PARAM_STR, 255);
        $query->bindParam("adress", $adress, PDO::PARAM_STR);
        $query->bindParam("profession", $profession, PDO::PARAM_STR, 255);
        $query->bindParam("metro_id", $metro_id, PDO::PARAM_INT, 11);
        $query->bindParam("icq", $icq, PDO::PARAM_INT, 11);
        $query->bindParam("birth_day", $birth_day, PDO::PARAM_INT, 11);
        $query->bindParam("info", $info, PDO::PARAM_STR);
        $query->bindParam("company_name", $company_name, PDO::PARAM_STR, 255);
        $query->bindParam("company_fax", $company_fax, PDO::PARAM_STR, 255);
        $query->bindParam("company_inn", $company_inn, PDO::PARAM_STR, 255);
        $query->bindParam("company_ur_adress", $company_ur_adress, PDO::PARAM_STR, 255);
        $query->bindParam("company_bank", $company_bank, PDO::PARAM_STR, 255);
        $query->bindParam("company_bik", $company_bik, PDO::PARAM_STR, 255);
        $query->bindParam("company_rs", $company_rs, PDO::PARAM_STR, 255);
        $query->bindParam("company_ks", $company_ks, PDO::PARAM_STR, 255);
        $query->bindParam("company_kpp", $company_kpp, PDO::PARAM_STR, 255);
        $query->bindParam("company_okpo", $company_okpo, PDO::PARAM_STR, 255);
        $query->bindParam("company_oknx", $company_oknx, PDO::PARAM_STR, 255);
        $query->bindParam("company_fio_director", $company_fio_director, PDO::PARAM_STR, 255);
        $query->bindParam("company_fio_accountant", $company_fio_accountant, PDO::PARAM_STR, 255);
        $query->bindParam("param_str_1", $param_str_1, PDO::PARAM_STR, 255);
        $query->bindParam("param_str_2", $param_str_2, PDO::PARAM_STR, 255);
        $query->bindParam("param_str_3", $param_str_3, PDO::PARAM_STR, 255);
        $query->bindParam("b2b_price", $b2b_price, PDO::PARAM_INT, 11);
        $query->bindParam("default_currency_id", $default_currency_id, PDO::PARAM_INT, 5);
        $query->bindParam("is_jur_person", $is_jur_person, PDO::PARAM_INT, 5);
        $query->bindParam("is_mailer", $is_mailer, PDO::PARAM_INT, 5);
        $query->bindParam("is_mailer_2", $is_mailer_2, PDO::PARAM_INT, 5);
        $query->bindParam("user_type", $user_type, PDO::PARAM_INT, 5);
        $query->execute();
    }

    /**
     * Если 0 если логин свободен, если занят - возвращает 1
     * @param <type> $login
     * @param $user_id - при редактировании указать user_id
     * @return <type>
     */
    public function isLogin($login, $user_id = 0) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Routes-isLogin-' . $login . $user_id, 'Users');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT COUNT(*) as count FROM users WHERE is_delete = 0 && login = :login && (id != :id || :id = 0) LIMIT 1 OFFSET 0");
            $query->bindParam("login", $login, PDO::PARAM_STR, 255);
            $query->bindParam("id", $user_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ)->count;
            $cache->setTags('Routes-isLogin-' . $login . $user_id, $return, 'Users');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Проверяет зарегистрирован ли человек в соц. сети или нет
     * @param type $login
     * @param type $password
     * @return type
     */
    public function getSocialUser($social_type, $social_uid) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM users WHERE is_delete = 0 && is_blocked = 0 && social_type=:social_type && social_uid = :social_uid LIMIT 1 OFFSET 0");
        $query->bindParam("social_type", $social_type, PDO::PARAM_STR, 255);
        $query->bindParam("social_uid", $social_uid, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Возвращает стоимость всех заказов пользователя
     * @param type $user_id
     * @return type
     */
    public function getUsersOrderSum($user_id) {
        $registry = Registry::getInstance();
        //Если только сумму выполненных заказов надо начислять то  && status_id = 3
        $query = $registry->db->prepare("SELECT SUM(sum_order) as `sum` FROM `order` WHERE user_id = :user_id && is_delete = 0");
        $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 1);
        $query->execute();
        $return = (int)$query->fetch(PDO::FETCH_OBJ)->sum;
        return $return;
    }

    /**
     * Возвращает всех пользователей
     * @return type 
     */
    public function getUsers($user_type = -1) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Routes-getUsers-' . $user_type, 'Users');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM users WHERE is_delete = 0 && (user_type = :user_type || :user_type = -1) ORDER BY created DESC, login ASC");
            $query->bindParam("user_type", $user_type, PDO::PARAM_INT, 1);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $cache->setTags('Routes-getUsers-' . $user_type, $return, 'Users');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     *  Поиск пользователей
     * @param type $user_type
     * @return type
     */
    public function getSearchUsers($find, $manager_id) {
        $registry = Registry::getInstance();

        $find = mb_strtoupper($find);
        $find = "%$find%";

        $cache = Cache::getInstance();
        $get_cache = $cache->get('Routes-getSearchUsers-' . $find . $manager_id, 'Users');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM users WHERE 
            (UPPER(login) LIKE :find || UPPER(name) LIKE :find || UPPER(last_name) LIKE :find || UPPER(middle_name) LIKE :find || UPPER(phone) LIKE :find || UPPER(company_name) LIKE :find || UPPER(company_inn) LIKE :find) && 
            is_delete = 0 && (user_type = 0) && (manager_id=:manager_id || :manager_id=-1) ORDER BY login ASC");

            $query->bindParam("find", $find, PDO::PARAM_STR, 255);
            $query->bindParam("manager_id", $manager_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $cache->setTags('Routes-getSearchUsers-' . $find . $manager_id, $return, 'Users');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает админов и манагеров
     * @return type
     */
    public function getAdmins() {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Routes-getAdmins-', 'Users');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM users WHERE is_delete = 0 && (user_type = 1 || user_type = 2) ORDER BY login ASC");
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $cache->setTags('Routes-getAdmins-', $return, 'Users');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Возвращает всех пользователей, ключ - id пользователя
     * @return type 
     */
    public function getUsersKeyId() {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Routes-getUsersKeyId-', 'Users');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM users WHERE is_delete = 0  ORDER BY login ASC");
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);
            $result = array();
            foreach ($return as $value) {
                $result[$value->id] = $value;
            }
            $cache->setTags('Routes-getUsersKeyId-', $result, 'Users');
            return $result;
        } else {
            return $get_cache;
        }
    }

    /**
     * Вовзращает пользователей, которые подписанны на участие в тендере
     * Возвращает массив ключ - id пользователя, 
     * @return type 
     */
    public function getUsersMailTender() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM users WHERE is_delete = 0 && is_email_tender = 1");
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $value) {
            $result[$value->id] = $value;
        }
        return $result;
    }

    /**
     * Возвращает пользователя по e-mail
     * @param type $user_id
     * @return type 
     */
    public function getUserEmail($email) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Routes-getUserEmail-' . $email, 'Users');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM users WHERE TRIM(email) = TRIM(:email) LIMIT 1 OFFSET 0");
            $query->bindParam("email", $email, PDO::PARAM_STR, 255);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Routes-getUserEmail-' . $email, $return, 'Users');
            return $return;
        } else {
            return $get_cache;
        }
    }

    /**
     * Смотри, есть ли хоть один пользователь с таким email-ом 
     */
    public function isEmailUser($email) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count` FROM users WHERE email = :email && is_delete=0");
        $query->bindParam("email", $email, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->count;
    }

    public function isAuth($login, $password) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM users WHERE is_delete = 0 && is_blocked = 0 && UPPER(login) = :login && password = :password LIMIT 1 OFFSET 0");
        $query->bindParam("login", $login, PDO::PARAM_STR, 255);
        $query->bindParam("password", $password, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getUserId($user_id) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();
        $get_cache = $cache->get('Routes-getUserId-' . $user_id, 'Users');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM users WHERE id = :user_id LIMIT 1 OFFSET 0");
            $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);

            $cache->setTags('Routes-getUserId-' . $user_id, $return, 'Users');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function delUser($user_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users SET is_delete = 1 WHERE is_delete = 0 && id = :user_id LIMIT 1");
        $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setUser($user_id, $password, $name, $phone, $email, $adress, $metro_id, $icq, $info) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users 
            SET password=:password, name=:name, phone=:phone, email=:email, adress=:adress, metro_id = :metro_id, 
                icq = :icq, info = :info
            WHERE is_delete = 0 && id = :user_id LIMIT 1 OFFSET 0");
        $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam("metro_id", $metro_id, PDO::PARAM_INT, 11);
        $query->bindParam("password", $password, PDO::PARAM_STR, 255);
        $query->bindParam("name", $name, PDO::PARAM_STR, 255);
        $query->bindParam("phone", $phone, PDO::PARAM_STR, 255);
        $query->bindParam("email", $email, PDO::PARAM_STR, 255);
        $query->bindParam("adress", $adress, PDO::PARAM_STR, 255);
        $query->bindParam("icq", $icq, PDO::PARAM_STR, 255);
        $query->bindParam("info", $info, PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * При входе в админку будет открываться эта страничка
     * @param type $user_id
     * @param type $start_access_link
     */
    public function setStartAccessLink($user_id, $start_access_link) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users SET start_access_link=:start_access_link WHERE is_delete = 0 && id = :user_id LIMIT 1");
        $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam("start_access_link", $start_access_link, PDO::PARAM_INT, 11);
        $query->execute();
    }
    /**
     * Установка рассылки
     * @param type $user_id
     * @param type $b2b_price 
     */
    public function setIsMailer($user_id, $is_mailer) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users SET is_mailer=:is_mailer WHERE is_delete = 0 && id = :user_id LIMIT 1");
        $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam("is_mailer", $is_mailer, PDO::PARAM_INT, 11);
        $query->execute();
    }
    
    
    public function setIcon($user_id, $icon) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users SET icon=:icon WHERE is_delete = 0 && id = :user_id LIMIT 1");
        $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam("icon", $icon, PDO::PARAM_INT, 11);
        $query->execute();
    }
    
    
    public function setUserForum($user_id, $forum_name, $forum_email, $forum_is_email) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users SET forum_name=:forum_name, forum_email=:forum_email,forum_is_email=:forum_is_email WHERE is_delete = 0 && id = :user_id LIMIT 1");
        $query->bindParam("forum_name", $forum_name, PDO::PARAM_STR, 255);
        $query->bindParam("forum_email", $forum_email, PDO::PARAM_STR, 255);
        $query->bindParam("forum_is_email", $forum_is_email, PDO::PARAM_INT, 11);
        $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
    }
    
    public function setLastVisit($user_id) {
        $registry = Registry::getInstance();

        $query = $registry->db->prepare("UPDATE users SET last_visit=NOW() WHERE is_delete = 0 && id = :user_id LIMIT 1");
        $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setAccess($user_id, $access) {
        $registry = Registry::getInstance();
        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users SET access=:access WHERE is_delete = 0 && id = :user_id LIMIT 1");
        $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam("access", $access, PDO::PARAM_STR);
        $query->execute();
    }

    public function setB2B($user_id, $b2b_price) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users SET b2b_price=:b2b_price WHERE is_delete = 0 && id = :user_id LIMIT 1");
        $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam("b2b_price", $b2b_price, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Возвращает  главных менеджеров
     * @param type $manager_id
     * @param type $is_visible_unassigned_order
     */
    public function getMainManager() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM users WHERE is_delete = 0 && is_visible_unassigned_order = 1");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Если 1 то менеджер видит не назначенные заказы
     * @param type $user_id
     * @param type $manager_id
     */
    public function setVisibleUnassignedOrder($manager_id, $is_visible_unassigned_order) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users SET is_visible_unassigned_order=:is_visible_unassigned_order WHERE is_delete = 0 && id = :manager_id LIMIT 1");
        $query->bindParam("is_visible_unassigned_order", $is_visible_unassigned_order, PDO::PARAM_INT, 11);
        $query->bindParam("manager_id", $manager_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setManager($user_id, $manager_id) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users SET manager_id=:manager_id WHERE is_delete = 0 && id = :user_id LIMIT 1");
        $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam("manager_id", $manager_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setPassword($user_id, $password) {
        $registry = Registry::getInstance();
        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users SET password = :password WHERE id = :user_id");
        $query->bindParam("password", $password, PDO::PARAM_STR, 255);
        $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Включение/Отключение уведомлений о тендерах
     * @param type $user_id
     * @param type $is_email_tender 
     */
    public function setUserEmailTender($user_id, $is_email_tender) {
        $registry = Registry::getInstance();

        //Очищаем кеш 
        $cac = Cache::getInstance();
        $cac->deleteTag('Users');

        $query = $registry->db->prepare("UPDATE users SET is_email_tender=:is_email_tender WHERE is_delete = 0 && id = :user_id LIMIT 1");
        $query->bindParam("user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam("is_email_tender", $is_email_tender, PDO::PARAM_INT, 11);
        $query->execute();
    }
    
    

    public function getEmailUser($email) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM users WHERE TRIM(email) = TRIM(:email) && is_delete=0");
        $query->bindParam("email", $email, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
