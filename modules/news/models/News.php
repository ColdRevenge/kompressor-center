<?php

class News {

    public function add($type, $date, $name, $desc, $text, $icon, $order, $user_id, $region_id) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('News');
        CacheModule::delCacheModule('news');
        CacheModule::delCacheModule('page');
        

        $query = $registry->db->prepare("INSERT INTO news (`name`, `desc` ,`text`,`date`, `type`, `icon`, created, `is_delete`, `order`, `user_id`, `region_id`)
            VALUES (:name, :desc, :text, :date, :type, :icon, NOW(), 0, :order, :user_id, :region_id)");
        $query->bindParam(":date", $date, PDO::PARAM_INT, 11);
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":icon", $icon, PDO::PARAM_STR, 255);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":region_id", $region_id, PDO::PARAM_INT, 11);
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->execute();

        return $registry->db->lastInsertId();
        ;
    }

    public function addMail($mail) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO news_mail (email) VALUES (:email)");
        $query->bindParam(":email", $mail, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setNewsIdFiles($new_news_id, $old_news_id) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('Files');
        CacheModule::delCacheModule('page');
        CacheModule::delCacheModule('news');
        

        $query = $registry->db->prepare("UPDATE `files` SET page_id=:new_page_id WHERE `files`.`page_id` = :old_page_id");
        $query->bindParam(":old_page_id", $old_news_id, PDO::PARAM_INT, 11);
        $query->bindParam(":new_page_id", $new_news_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function isMail($mail) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as counta FROM news_mail WHERE email = :mail");
        $query->bindParam(":mail", $mail, PDO::PARAM_STR, 255);
        $query->execute();
        return !$query->fetch(PDO::FETCH_OBJ)->counta;
    }

    public function edit($news_id, $date, $name, $desc, $text, $icon, $order) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('News');
        CacheModule::delCacheModule('page');
        CacheModule::delCacheModule('news');
        
        
        $query = $registry->db->prepare("UPDATE `news` SET `desc` = :desc, `name`=:name ,`text` = :text, `date`=:date, `icon`=:icon, `order` = :order WHERE is_delete=0 && id=:news_id");
        $query->bindParam(":date", $date, PDO::PARAM_INT, 11);
        $query->bindParam(":order", $order, PDO::PARAM_INT, 11);
        $query->bindParam(":news_id", $news_id, PDO::PARAM_INT, 11);
        $query->bindParam(":icon", $icon, PDO::PARAM_STR, 255);
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":desc", $desc, PDO::PARAM_STR);
        $query->execute();
    }

    public function getNews($type, $limit = 10, $offset = 0, $shop_id = 0) {
        $registry = Registry::getInstance();
        $cacheModule = unserialize(CacheModule::getCacheModule('!news-getNews-' . $type . '-' . $limit . '-' . $offset . '-' . $shop_id, false)); //Из-за ограничения мемкеша в 1мб
        if ($cacheModule !== false) {
            return ($cacheModule);
        } else {
            $query = $registry->db->prepare("SELECT SQL_CALC_FOUND_ROWS news.*,
            DATE_FORMAT(created, '%d.%m.%Y %H:%i') as `format_created`,
            DATE_FORMAT(FROM_UNIXTIME(`date`), '%d.%m.%Y') as `format_date`
            FROM news 
            WHERE (news.is_delete=0 && news.`type` = :type && (shop_id=:shop_id || shop_id=0 || :shop_id=-1))
            ORDER BY news.`date` DESC, news.`order`, news.`created` DESC  LIMIT :limit OFFSET :offset");
            $query->bindParam(":limit", $limit, PDO::PARAM_INT, 11);
            $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
            $query->bindParam(":offset", $offset, PDO::PARAM_INT, 11);
            $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
            $query->execute();

            $return = array('result' => $query->fetchAll(PDO::FETCH_OBJ), 'count' => $this->getLastCountQuery());


            CacheModule::setCacheModule('news-getNews-' . $type . '-' . $limit . '-' . $offset . '-' . $shop_id, serialize($return), false);
            return $return;
        }
    }

    public function getNewsId($news_id, $user_id) {
        $registry = Registry::getInstance();
        $user_id = 0;
        $cache = Cache::getInstance();
        $get_cache = $cache->get('News-getNewsId-' . $news_id . '-' . $user_id, 'News');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT *,DATE_FORMAT(created, '%d.%m.%Y %H:%i') as `format_created`,DATE_FORMAT(FROM_UNIXTIME(`date`), '%d.%m.%Y') as `format_date` FROM news WHERE is_delete=0 && id = :news_id  && (user_id = :user_id || :user_id = 0) ORDER BY `order` DESC,`date` DESC");
            $query->bindParam("news_id", $news_id, PDO::PARAM_INT, 11);
            $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetchAll(PDO::FETCH_OBJ);

            $cache->setTags('News-getNewsId-' . $news_id . '-' . $user_id, $return, 'News');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function del($news_id) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('News');
        CacheModule::delCacheModule('page');
        CacheModule::delCacheModule('news');
        

        $query = $registry->db->prepare("UPDATE `news` SET is_delete=1 WHERE `id` = :news_id LIMIT 1");
        $query->bindParam(":news_id", $news_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /* Сортировка */

    public function clearOrder($type) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('News');

        $query = $registry->db->prepare(" UPDATE `news` SET `order` = 0 WHERE `type` = :type ");
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setOrder($news_id, $value) {
        $registry = Registry::getInstance();

        $cac = Cache::getInstance();
        $cac->deleteTag('News');
        CacheModule::delCacheModule('page');
        CacheModule::delCacheModule('news');
        

        $query = $registry->db->prepare(" UPDATE `news` SET `order` = :value WHERE `id` = :news_id ");
        $query->bindParam(":news_id", $news_id, PDO::PARAM_INT, 11);
        $query->bindParam(":value", $value, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setShopType($news_id, $shop_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `news` SET `shop_id` = :shop_id WHERE `id` = :news_id ");
        $query->bindParam(":news_id", $news_id, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    /**
     * Возвращает кол-во выбраныз строк из последнего запроса
     */
    private function getLastCountQuery() {
        $registry = Registry::getInstance();
        $count = $registry->db->query("SELECT FOUND_ROWS() as count");
        $return = $count->fetch(PDO::FETCH_OBJ);
        return $return->count;
    }

    public function getLastOrder($region_id = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT (MAX(news.order)+1) as max FROM news WHERE region_id = :region_id && news.is_delete = 0 && date = UNIX_TIMESTAMP(DATE_FORMAT(NOW(), '%Y-%m-%d 00:00:00'))");
        $query->bindParam(":region_id", $region_id, PDO::PARAM_INT, 11);
        $query->execute();
        return (int) $query->fetch(PDO::FETCH_OBJ)->max;
    }

}
