<?php



class Counter {

    /**
     * Считает пользователей on-line
     */
    public function countOnLine() {
        $registry = Registry::getInstance();
        $ip = ip2long($_SERVER['REMOTE_ADDR']);
        $query = $registry->db->prepare("INSERT INTO `counter_online`(created, ip) VALUES (UNIX_TIMESTAMP(NOW()), :ip)");
        $query->bindParam(":ip", $ip, PDO::PARAM_INT, 12);
        $query->execute();
    }

    /**
     * Считает поситителей
     *
     */
    public function count() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) FROM counter WHERE ip=INET_ATON(:ip) && `date`=:date");
        $query->bindParam(":ip", $_SERVER['REMOTE_ADDR'], PDO::PARAM_INT, 12);
        $date = getdate();
        $pdate = mktime(0, 0, 0, $date['mon'], $date['mday'], $date['year']);
        $query->bindParam(":date", $pdate, PDO::PARAM_INT, 11);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_NUM);

        if ($result[0] == 0) $this->_countHost();
        else $this->_countHit();
    }

    public function getHits($counter_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM counter_hit WHERE counter_id = :counter_id ORDER BY created DESC");
        $query->bindParam(":counter_id", $counter_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);

    }
        /**
     * При вызове делает +1 к хиту
     *
     */
    private function _countHit() {
        $registry = Registry::getInstance();
        //Читаем id-счетчика
        $date = getdate();
        $get_query = $registry->db->prepare("SELECT id FROM counter WHERE ip=INET_ATON(:ip) && `date`=:date");
        $ip = $_SERVER['REMOTE_ADDR'];
        $pdate = mktime(0, 0, 0, $date['mon'], $date['mday'], $date['year']);
        $get_query->bindParam(":ip", $ip, PDO::PARAM_INT, 12);
        $get_query->bindParam(":date", $pdate, PDO::PARAM_INT, 11);
        $get_query->execute();
        $result = $get_query->fetch(PDO::FETCH_OBJ);
        if (isset($result->id)) {
            $counter_id = $result->id;

            $query = $registry->db->prepare("UPDATE counter SET last_time=UNIX_TIMESTAMP(NOW()),`hit`=`hit`+1 WHERE id=:id");
            $query->bindParam(":id", $counter_id, PDO::PARAM_INT, 11);
            $query->execute();
            
            //Инфа о кликах
            $query_hit = $registry->db->prepare("INSERT INTO counter_hit (`counter_id`, `self`) VALUES (:counter_id, :self)");
            $query_hit->bindParam(":counter_id", $counter_id, PDO::PARAM_INT, 11);
            $query_hit->bindParam(":self", $_SERVER['PHP_SELF'], PDO::PARAM_STR, 254);
            $query_hit->execute();
          //  print_r($query_hit->errorInfo());
        }
    }

    /**
     * +1 к хосту
     *
     */
    private function _countHost() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO counter (date,last_time,browser,referer,`self`,ip,hit)
		VALUES (:date,UNIX_TIMESTAMP(NOW()),:browser,:referer,:self,INET_ATON(:ip),0)");
        $query->bindParam(":browser", $_SERVER['HTTP_USER_AGENT'], PDO::PARAM_STR, 254);
        $query->bindParam(":referer", $_SERVER['HTTP_REFERER'], PDO::PARAM_STR, 254);
        $query->bindParam(":self", $_SERVER['PHP_SELF'], PDO::PARAM_STR, 254);
        $query->bindParam(":ip", $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR, 20);
        $date = getdate();
        $query->bindParam(":date", mktime(0, 0, 0, $date['mon'], $date['mday'], $date['year']), PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Выводит пользователей on-line
     * @return <type>
     */
    public function getOnLine() {
        $registry = Registry::getInstance();
        //Удаляем старые записи
        $time = time() - 60;

        $query = $registry->db->prepare("DELETE FROM `counter_online` WHERE created<:time");
        $query->bindParam(":time", $time, PDO::PARAM_INT, 11);
        $query->execute();

        $get_query = $registry->db->prepare("SELECT COUNT(DISTINCT ip) as count FROM counter_online");
        $get_query->execute();
        return $get_query->fetch(PDO::FETCH_OBJ)->count;
    }

    /**
     * Выводит кол-во пользовтелей
     * @return <type>
     */
    public function getCountUsers() {
        $registry = Registry::getInstance();
        $get_query = $registry->db->prepare("SELECT COUNT(*) as count FROM users WHERE is_delete=0");
        $get_query->execute();
        return $get_query->fetch(PDO::FETCH_OBJ)->count;
    }

    /**
     * Возвращает короткую статистику по дням
     *
     * @param integer $start_date
     * @param integer $end_date
     */
    public function getShortStat($start_date = 0, $end_date = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT date,COUNT(*) as host,SUM(hit) as hit FROM counter WHERE (date BETWEEN :start_date AND :end_date || :start_date = 0) GROUP BY date ORDER BY date DESC");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Выводит подробную статистику за день
     *
     * @param integer $date
     */
    public function getFullStat($date) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT id,last_time,browser, referer, SUBSTRING(self,12) as self,INET_NTOA(ip) as ip,hit FROM counter WHERE date = :date ORDER BY id DESC");
        $query->bindParam(":date", $date, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Возвращает короткую статистику по дням
     *
     * @param integer $start_date
     * @param integer $end_date
     */
    public function getCountDate($start_date = 0, $end_date = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(DISTINCT ip) as host FROM counter WHERE (date BETWEEN :start_date AND :end_date) GROUP BY date");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->host;
    }

    /**
     * Статистика, со скольких ресурсов заходили на сайт
     */
    public function getRefererStat($start_date = 0, $end_date = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT SUBSTRING_INDEX( REPLACE( REPLACE( referer, 'http://', '' ) , 'www.', '' ) , '/', 1 ) as domain, COUNT(*) as count FROM `counter` WHERE referer != '' && (date BETWEEN :start_date AND :end_date) GROUP by domain ORDER BY `count` DESC, `referer` ASC");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);

        $all_sum = 0;
        foreach ($return as $value) {
            $all_sum += $value->count;
        }
        return array('stat' => $return, 'all_sum' => $all_sum);
    }

    /**
     * Статистика, со скольких ресурсов заходили на сайт
     */
    public function getReferer($domain, $start_date = 0, $end_date = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT referer, COUNT(*) as count FROM `counter` WHERE SUBSTRING_INDEX( REPLACE( REPLACE( referer, 'http://', '' ) , 'www.', '' ) , '/', 1 ) = :domain && (date BETWEEN :start_date AND :end_date) GROUP by referer ORDER BY `count` DESC, `referer` ASC");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->bindParam(":domain", $domain, PDO::PARAM_STR, 255);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);

        $all_sum = 0;
        foreach ($return as $value) {
            $all_sum += $value->count;
        }
        return array('stat' => $return, 'all_sum' => $all_sum);
    }

    /**
     * Поиск по поисковым системам
     */
    public function getQueryStat($start_date = 0, $end_date = 0, $query_find = null, $query_regexp = null) {
        $registry = Registry::getInstance();
        
        

        $query_find = "%$query_find%";
        $query = $registry->db->prepare("SELECT referer, COUNT(*) as count FROM `counter` WHERE referer LIKE :query  && (date BETWEEN :start_date AND :end_date) GROUP BY referer ORDER BY `count` DESC");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->bindParam(":query", $query_find, PDO::PARAM_STR, 255);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        $return_arr = array();
        $all_count = 0;

        foreach ($result as $value) {
            preg_match("/$query_regexp([^\&]+)/", $value->referer, $matches);

            if (isset($matches[1])) {
                $is_utf8 = (preg_match("/^([\x09\x0A\x0D\x20-\x7E]|[\xC2-\xDF][\x80-\xBF]|\xE0[\xA0-\xBF][\x80-\xBF]|[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}|\xED[\x80-\x9F][\x80-\xBF]|\xF0[\x90-\xBF][\x80-\xBF]{2}|[\xF1-\xF3][\x80-\xBF]{3}|\xF4[\x80-\x8F][\x80-\xBF]{2})*$/", urldecode($matches[1]))) ? true : false;
                $all_count += $value->count;
                $return_arr['count'][] = $value->count;
                $return_arr['base_query'][] = $value->referer;

                if ($is_utf8) {
                    $return_arr['query'][] = urldecode($matches[1]);
                } else {
                    $return_arr['query'][] = urldecode($matches[1]);
                }
            }
        }
        $return_arr['all_sum'] = $all_count;
        return $return_arr;
    }

    /**
     * Статистика, на какие странички поподают люди
     */
    public function getPageStat($start_date = 0, $end_date = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT SUBSTRING(self,12) as self, COUNT(*) as `count` FROM `counter` WHERE referer != '' && (date BETWEEN :start_date AND :end_date) GROUP by self  ORDER BY `count` DESC");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);

        $all_sum = 0;
        foreach ($return as $value) {
            $all_sum += $value->count;
        }
        return array('stat' => $return, 'all_sum' => $all_sum);
    }

    public function getPage($self, $start_date = 0, $end_date = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT referer, COUNT(*) as count FROM `counter` WHERE referer != '' && self LIKE :self && (date BETWEEN :start_date AND :end_date) GROUP BY referer ORDER BY count DESC");
        $query->bindParam(":start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam(":end_date", $end_date, PDO::PARAM_INT, 11);
        $query->bindParam(":self", $self, PDO::PARAM_STR, 255);
        $query->execute();

        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $all_sum = 0;
        foreach ($return as $value) {
            $all_sum += $value->count;
        }
        return array('stat' => $return, 'all_sum' => $all_sum);
    }

    /**
     * С каких браузеров
     */
    public function getBrowserStat() {

    }

    /**
     * С каких разрешений
     */
    public function getScreenStat() {

    }

    public function getCountAll() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(DISTINCT ip) as host FROM counter");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ)->host;
    }

}