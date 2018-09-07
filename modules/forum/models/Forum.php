<?php

class Forum {

    public function getUserStatus($param) {

        if (isset($param['count_post']) && isset($param['count_like'])) {
            $count_post = (int) $param['count_post'];
            $count_like = (int) $param['count_like'];

            $arr = array('40' => 'Новичок',
                '110' => 'Увлеченный',
                '220' => 'Свой',
                '350' => 'Заслуженный',
                '520' => 'Старожил',
                '750' => 'Просвещенный',
                '1500' => 'Эксперт',
                '3000' => 'Гуру',
            );
            $count = ceil($count_post + ($count_post * ($count_like * 3)) / 100);
            $arr = array_reverse($arr, true);

            foreach ($arr as $key => $value) {
                if ($count > $key) {
                    return $value;
                }
            }
            return $arr[40];
        }
    }

    public function addTopic($name, $user_id, $category_id, $is_active) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO forum_topic (`created`, `name`, is_active, category_id, user_id) VALUES (NOW(), :name, :is_active, :category_id, :user_id)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":is_active", $is_active, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function addAnswer($text, $user_id, $topic_id, $parent_id, $is_active) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO forum_answer (`created`, `text`, user_id, topic_id, parent_id, is_active) VALUES (NOW(), :text, :user_id, :topic_id, :parent_id, :is_active)");
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_active", $is_active, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function getTopics($category_id = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT forum_topic.*, users.forum_name as user_name, "
                . "(SELECT COUNT(*) FROM forum_answer WHERE forum_answer.topic_id = forum_topic.id && forum_answer.is_delete=0 && is_active=1) as count_answer FROM forum_topic  INNER JOIN users "
                . " ON (forum_topic.is_active=1 && forum_topic.is_delete=0 && (forum_topic.category_id = :category_id || :category_id = 0) && forum_topic.user_id = users.id) ORDER BY `created` DESC");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getTopicsNotTitle($category_id = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT forum_topic.*, (SELECT pseudo_dir FROM category WHERE id=forum_topic.category_id) as pseudo_dir"
                . " FROM forum_topic "
                . " WHERE (forum_topic.is_active=1 && forum_topic.is_delete=0 && title='')");
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getTopicsSearch($find) {
        $registry = Registry::getInstance();
        $find = trim($find);
        $find = "%$find%";
        $query = $registry->db->prepare("SELECT forum_topic.*, users.forum_name as user_name, (SELECT pseudo_dir FROM category WHERE id=forum_topic.category_id) as pseudo_dir, "
                . "(SELECT COUNT(*) FROM forum_answer WHERE forum_answer.topic_id = forum_topic.id && forum_answer.is_delete=0 && is_active=1) as count_answer FROM forum_topic  INNER JOIN users "
                . " ON (forum_topic.is_active=1 && forum_topic.is_delete=0 && (forum_topic.name LIKE :find) && forum_topic.user_id = users.id) ORDER BY `created` DESC");
        $query->bindParam(":find", $find, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getTopicsSearchText($find) {
        $registry = Registry::getInstance();
        $find = trim($find);
        $find = "%$find%";
        $query = $registry->db->prepare("SELECT forum_topic.*, users.forum_name as user_name, (SELECT pseudo_dir FROM category WHERE id=forum_topic.category_id) as pseudo_dir, "
                . "(SELECT COUNT(*) FROM forum_answer WHERE forum_answer.topic_id = forum_topic.id && forum_answer.is_delete=0 && is_active=1) as count_answer FROM forum_topic  INNER JOIN users "
                . " ON (forum_topic.is_active=1 && forum_topic.is_delete=0 && (forum_topic.name LIKE :find || forum_topic.id IN "
                . "(SELECT topic_id FROM forum_answer WHERE forum_answer.is_active=1 && forum_answer.is_delete=0 && `text` LIKE :find)"
                . ") && forum_topic.user_id = users.id) ORDER BY `created` DESC");
        $query->bindParam(":find", $find, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getTopicTemplate($param) {
        if (isset($param['topic_id'])) {
            $registry = Registry::getInstance();
            $query = $registry->db->prepare("SELECT forum_topic.*, (SELECT pseudo_dir FROM category WHERE id=forum_topic.category_id) as pseudo_dir FROM forum_topic  "
                    . " WHERE (forum_topic.id=:topic_id && forum_topic.is_delete=0)");
            $query->bindParam(":topic_id", $param['topic_id'], PDO::PARAM_INT, 11);
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        }
    }

    public function getTopicId($topic_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT forum_topic.*, (SELECT pseudo_dir FROM category WHERE id=forum_topic.category_id) as pseudo_dir FROM forum_topic  "
                . " WHERE (forum_topic.id=:topic_id && forum_topic.is_delete=0)");
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getAnswerId($answer_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT forum_answer.* FROM forum_answer  "
                . " WHERE (forum_answer.id=:answer_id && forum_answer.is_delete=0)");
        $query->bindParam(":answer_id", $answer_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function setAnswerId($answer_id, $text) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `forum_answer` SET `text`=:text WHERE id=:answer_id LIMIT 1");
        $query->bindParam(":text", $text, PDO::PARAM_STR);
        $query->bindParam(":answer_id", $answer_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delAnswer($answer_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `forum_answer` SET `is_delete`=1 WHERE id=:answer_id LIMIT 1");
        $query->bindParam(":answer_id", $answer_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function getTopicAnswers($topic_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT forum_answer.*, birth_day, users.icon as user_icon, users.forum_name as user_name, users.created as user_created, users.city as user_city,"
                . "(SELECT COUNT(*) FROM forum_answer WHERE user_id=users.id && is_delete=0 && is_active=1) as count_message, "
                . "(SELECT COUNT(*) FROM forum_like WHERE answer_id=forum_answer.id) as count_answer_like, "
                . "(SELECT COUNT(*) FROM forum_like WHERE user_id=users.id) as count_like  FROM forum_answer INNER JOIN users "
                . " ON (forum_answer.is_active=1 && forum_answer.is_delete=0 && (forum_answer.topic_id = :topic_id) && forum_answer.user_id = users.id) ORDER BY `created` ASC");
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getUserTopics($user_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT forum_topic.*,"
                . "(SELECT COUNT(*) FROM forum_answer WHERE topic_id=forum_topic.id && is_delete=0 && is_active=1) as count_answer, "
                . "(SELECT pseudo_dir FROM category WHERE id=forum_topic.category_id) as pseudo_dir " .
                " FROM forum_topic WHERE "
                . " forum_topic.is_active=1 && forum_topic.is_delete=0 && forum_topic.id IN "
                . "(SELECT topic_id FROM forum_answer WHERE forum_answer.is_active=1 && forum_answer.is_delete=0 &&  forum_answer.user_id = :user_id) ORDER BY `change` DESC");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Пользователи оставившие хотя бы 1 сообщение
     * @param type $user_id
     * @return type
     */
    public function getUsers() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *,"
                . "(SELECT COUNT(*) FROM forum_answer WHERE user_id=users.id && is_delete=0 && is_active=1) as count_message, "
                . "(SELECT COUNT(*) FROM forum_like WHERE user_id=users.id) as count_like FROM users WHERE is_delete = 0 &&  (SELECT COUNT(*) FROM forum_answer WHERE is_delete=0 && is_active=1 && users.id=user_id)");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getLastAnswers($limit = 13) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT  forum_answer.*, "
                . "(SELECT forum_name FROM users WHERE forum_answer.user_id=users.id) as user_name, "
                . "(SELECT icon FROM users WHERE forum_answer.user_id=users.id) as user_icon "
                . " FROM (SELECT * FROM forum_answer WHERE forum_answer.is_active=1 && forum_answer.is_delete=0 ORDER BY forum_answer.`created` DESC) as forum_answer "
                . " WHERE (SELECT COUNT(*) FROM forum_topic WHERE forum_answer.topic_id = id && is_delete=0)  GROUP BY forum_answer.topic_id ORDER BY forum_answer.`created` DESC"
                . " LIMIT $limit");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Показывает кто поблагодарил из пользователей
     */
    public function getLikeUserAnswerTemplate($param) {
        if (isset($param['user_id']) && isset($param['answer_id'])) {
            return $this->getLikeUserAnswer($param['user_id'], $param['answer_id']);
        } else {
            return false;
        }
    }

    public function getLikeUserAnswer($user_id, $answer_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT forum_like.*, users.icon as user_icon, "
                . "users.forum_name as user_name "
                . " FROM forum_like INNER JOIN users "
                . "ON (user_id = :user_id && from_user_id=users.id && users.is_delete=0 &&  answer_id = :answer_id) ORDER BY forum_like.created ASC");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":answer_id", $answer_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    private $_count_answer = 0;
    private $_count_topic = 0;

    public function getCountAnswers($param) {
        $registry = Registry::getInstance();

        if (isset($param['category_id']) && $param['category_id'] > 0) {
            $category_id = (int) $param['category_id'];
            $where = "forum_topic.category_id= $category_id";
            Lavra_Loader::LoadClass('ApplicationDB');
            $app = new ApplicationDB();
            $cat_arr = ($app->getChildsCategory(100, $category_id));

            if (count($cat_arr) && !isset($cat_arr['empty'])) {
                foreach ($cat_arr as $key => $value) {
                    $where .= ' || forum_topic.category_id=' . $key;
                }
                $where = trim($where, ' |');
            }
            $query = $registry->db->prepare("SELECT COUNT(*) as topic_count, SUM((SELECT COUNT(*) FROM forum_answer WHERE forum_answer.is_active=1 && forum_answer.is_delete=0 && (forum_answer.topic_id = forum_topic.id ))) as answer_count FROM forum_topic WHERE "
                    . "( forum_topic.is_active=1 && forum_topic.is_delete=0 && ($where))");
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ);
        }
    }

    public function getCategoryPseudoDir($pseudo_dir) {
        $registry = Registry::getInstance();
        $cache = Cache::getInstance();

        $get_cache = $cache->get('Category-getCategoryIdPseudoDir-' . $pseudo_dir, 'Category');

        if (empty($get_cache)) {
            $query = $registry->db->prepare("SELECT * FROM category WHERE is_delete = 0 && pseudo_dir=:pseudo_dir");
            $query->bindParam(":pseudo_dir", $pseudo_dir, PDO::PARAM_STR, 255);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
// print_r($return);
            $cache->setTags('Category-getCategoryIdPseudoDir-' . $pseudo_dir, $return, 'Category');
            return $return;
        } else {
            return $get_cache;
        }
    }

    public function getCategory($type, $shop_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT category.*, category.pseudo_dir as category_pseudo_dir
FROM `category` WHERE category.is_delete = 0  && `type`=:type && (shop_id = :shop_id || shop_id = 0|| :shop_id = -1)
ORDER BY category.parent_id,category.`order` ASC");
        $query->bindParam(":type", $type, PDO::PARAM_INT, 11);
        $query->bindParam(":shop_id", $shop_id, PDO::PARAM_INT, 11);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        $category_arr = array();
        foreach ($result as $category) { //Сортируем под вывод меню в шаблонизатор
            if (!isset($category_arr[$category->parent_id])) {
                $category_arr[$category->parent_id] = array();
            }
            $category_arr[$category->parent_id][] = $category;
        }

        return $category_arr;
    }

    public function getChildCategory($param) {
        if (isset($param['category_id'])) {
            $category_id = $param['category_id'];
        }
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT category.* FROM `category` WHERE category.is_delete = 0  && `parent_id`=:category_id ORDER BY category.`order` ASC, id ASC");
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function isLike($user_id, $from_user_id, $topic_id, $answer_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count` FROM `forum_like` WHERE user_id=:user_id && from_user_id=:from_user_id && topic_id=:topic_id && answer_id=:answer_id");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":from_user_id", $from_user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->bindParam(":answer_id", $answer_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        return $return->count;
    }

    public function getAnswerLike($topic_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `forum_like` WHERE topic_id=:topic_id");
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $value) {
            $result[$value->answer_id][$value->from_user_id] = 1;
        }
        return $result;
    }

    public function like($user_id, $from_user_id, $topic_id, $answer_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO forum_like (`created`, user_id, from_user_id, topic_id, answer_id) VALUES (NOW(), :user_id, :from_user_id, :topic_id, :answer_id)");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":from_user_id", $from_user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->bindParam(":answer_id", $answer_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function getUserLike($user_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count` FROM `forum_like` WHERE user_id=:user_id");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        return $return->count;
    }

    public function getUserIdTemplate($param) {
        if (isset($param['user_id']) && $param['user_id'] > 0) {
            return $this->getUserId($param['user_id']);
        }
    }

    public function getUserId($user_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, "
                . "(SELECT COUNT(*) FROM forum_answer WHERE user_id=users.id && is_delete=0 && is_active=1) as count_message, "
                . "(SELECT COUNT(*) FROM forum_like WHERE user_id=users.id) as count_like"
                . " FROM `users` WHERE id=:user_id");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        return $return;
    }

    public function setTopicHit($topic_id) {
        if (!isset($_SESSION['topic_hit'][$topic_id])) {
            $registry = Registry::getInstance();
            $query = $registry->db->prepare("UPDATE `forum_topic` SET hit=hit+1 WHERE id=:topic_id");
            $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
            $query->execute();
            $_SESSION['topic_hit'][$topic_id] = 1;
        }
    }

    public function setTopic($topic_id, $name, $category_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `forum_topic` SET name=:name, category_id=:category_id WHERE id=:topic_id LIMIT 1");
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":category_id", $category_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function setTitle($topic_id, $title) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `forum_topic` SET title=:title WHERE id=:topic_id LIMIT 1");
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->bindParam(":title", $title, PDO::PARAM_STR, 255);
        $query->execute();
    }

    public function setTopicChange($topic_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `forum_topic` SET `change`=NOW() WHERE id=:topic_id LIMIT 1");
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function delTopic($topic_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `forum_topic` SET `is_delete`=1 WHERE id=:topic_id LIMIT 1");
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function importNews() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("News", "news");
        $news = new News();
        $get_news = $news->getNews(1, 10000, 0, -1);
        foreach ($get_news['result'] as $news_value) {
            if (!$this->_isNews($news_value->id)) { //Если новость не добавлена, то добавляем
                if ($news_value->name != '') {
                    $query = $registry->db->prepare("INSERT INTO forum_topic (`created`, `change`, `name`, is_active, category_id, user_id, import_news_id) "
                            . "VALUES (FROM_UNIXTIME(:created), FROM_UNIXTIME(:created), :name, 1, 1113, 446, :id)");
                    $query->bindParam(":name", $news_value->name, PDO::PARAM_STR, 255);
                    $query->bindParam(":created", $news_value->date, PDO::PARAM_INT, 11);
                    $query->bindParam(":id", $news_value->id, PDO::PARAM_INT, 11);
                    $query->execute();
                    $topic_id = $registry->db->lastInsertId();

                    $query1 = $registry->db->prepare("INSERT INTO forum_answer (`created`, `text`, user_id, topic_id, parent_id, is_active) "
                            . "VALUES (FROM_UNIXTIME(:created), :text, 446, :topic_id, 0, 1)");
                    $query1->bindParam(":created", $news_value->date, PDO::PARAM_INT, 11);
                    $query1->bindParam(":text", $news_value->text, PDO::PARAM_STR);
                    $query1->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
                    $query1->execute();
                }
            }
        }
    }

    private function _isNews($news_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as cc FROM forum_topic WHERE import_news_id = :news_id ");
        $query->bindParam("news_id", $news_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        return $return->cc;
    }

    public function getNewsidTopic($news_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, (SELECT pseudo_dir FROM category WHERE id=forum_topic.category_id) as pseudo_dir"
                . " FROM forum_topic WHERE import_news_id = :news_id ");
        $query->bindParam("news_id", $news_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function codeLink($link) {
        $link = str_replace('.', 'aaaaaaaaa', $link);
        $link = str_replace(':', 'bbbbbbbbb', $link);
        $link = str_replace('/', 'ccccccccc', $link);

        return base64_encode($link);
    }

    public function decodeLink($link) {
        $link = base64_decode($link);
        $link = str_replace('aaaaaaaaa', '.', $link);
        $link = str_replace('bbbbbbbbb', ':', $link);
        $link = str_replace('ccccccccc', '/', $link);
        return $link;
    }

    public function delNotice($topic_id, $user_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("DELETE FROM forum_notification WHERE user_id=:user_id && topic_id=:topic_id");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

    public function addNotice($topic_id, $user_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO forum_notification (`user_id`, `topic_id`) VALUES (:user_id, :topic_id)");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function isNotice($topic_id, $user_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as count FROM forum_notification WHERE user_id=:user_id && topic_id=:topic_id ");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        return $return->count;
    }

    public function getEmailNotice($topic_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT (SELECT forum_email FROM users WHERE users.id = forum_notification.user_id && users.is_delete = 0) as email FROM forum_notification WHERE topic_id=:topic_id ");
        $query->bindParam(":topic_id", $topic_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetchAll(PDO::FETCH_OBJ);
        $result = array();
        foreach ($return as $value) {
            if (!empty($value->email)) {
                $result[$value->email] = $value->email;
            }
        }
        return $result;
    }

    public function addMessageUser($name, $message, $user_id, $from_user_id, $parent_id, $is_ready) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO forum_message (created, name, message, user_id, from_user_id, is_ready, parent_id) VALUES (NOW(), :name, :message, :user_id, :from_user_id, :is_ready, :parent_id)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":message", $message, PDO::PARAM_STR);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":from_user_id", $from_user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->bindParam(":is_ready", $is_ready, PDO::PARAM_INT, 11);
        $query->execute();

        return $registry->db->lastInsertId();
    }

    public function getMessageRoot($user_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT *, "
                . "(SELECT COUNT(*) FROM forum_message as fm WHERE fm.parent_id = forum_message.id || fm.id = forum_message.id) as `count`, "
                . "(SELECT message FROM forum_message as fm2 WHERE fm2.parent_id = forum_message.id || fm2.id = forum_message.id ORDER BY created DESC LIMIT 1) as `message`, "
                . "(SELECT from_user_id FROM forum_message as fm4 WHERE fm4.parent_id = forum_message.id || fm4.id = forum_message.id ORDER BY created DESC LIMIT 1) as `from_user_id`, "
                . "(SELECT created FROM forum_message as fm3 WHERE fm3.parent_id = forum_message.id || fm3.id = forum_message.id ORDER BY created DESC LIMIT 1) as `created` "
                . " FROM forum_message WHERE parent_id = 0 && (user_id=:user_id || from_user_id=:user_id) ORDER BY created DESC");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getMessage($user_id, $parent_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM forum_message WHERE (user_id=:user_id || from_user_id=:user_id) && (parent_id=:parent_id || :parent_id = id) ORDER BY created ASC");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->bindParam(":parent_id", $parent_id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCountDaysTemplate($param) {
        if (isset($param['date'])) {
            $day = floor((time() - strtotime(substr($param['date'], 0, strpos($param['date'], ' ')) . ' 00:00:00')) / 86400);
            if ($day == 0) {
                return (isset($param['is_first']) && $param['is_first'] == '1' ? 'С' : 'с') . "егодня в " . date('H:i', strtotime($param['date']));
                ;
            } elseif ($day == 1) {
                return (isset($param['is_first']) && $param['is_first'] == '1' ? 'В' : 'в') . "чера в " . date('H:i', strtotime($param['date']));
                ;
            }
            $day_str = null;

            $y = $day % 10;
            $x = $day / 10 % 10;
            if ($day > 1 && $day < 5) {
                $day_str = "дня";
            } else {
                if ($x && $x == 1)
                    $day_str = "дней";
                if ($y == 1)
                    $day_str = "день";
                if (in_array($y, "2,3,4"))
                    $day_str = "дня";
                $day_str = "дней";
            }
            return "$day $day_str в " . date('H:i', $param['date']);
        }
    }

    public function getDateTemplate($param) {
        if (isset($param['date'])) {
            $day = floor((time() - strtotime(substr($param['date'], 0, strpos($param['date'], ' ')) . ' 00:00:00')) / 86400);
            if ($day < 8) {
                return $this->getCountDaysTemplate(array('date' => $param['date'], 'is_first' => '1'));
                ;
            } else {
                return date('d.m.Y H:i:s', strtotime($param['date']));
            }
        }
    }

    public function getCountYearTemplate($param) {
        if (isset($param['year'])) {
            $year_str = date('Y') - $param['year'];
            $year = abs($year_str);
            $t1 = $year % 10;
            $t2 = $year % 100;
            return $year_str . ' ' . ($t1 == 1 && $t2 != 11 ? "год" : ($t1 >= 2 && $t1 <= 4 && ($t2 < 10 || $t2 >= 20) ? "года" : "лет"));
        }
    }

    public function getCountPostTemplate($param) {
        if (isset($param['count'])) {
            $year_str = $param['count'];
            $year = abs($year_str);
            $t1 = $year % 10;
            $t2 = $year % 100;
            return ($t1 == 1 && $t2 != 11 ? "Тема" : ($t1 >= 2 && $t1 <= 4 && ($t2 < 10 || $t2 >= 20) ? "Темы" : "Тем"));
        }
    }
    public function getCountUserTemplate($param) {
        if (isset($param['count'])) {
            $year_str = $param['count'];
            $year = abs($year_str);
            $t1 = $year % 10;
            $t2 = $year % 100;
            return ($t1 == 1 && $t2 != 11 ? "ой" : ($t1 >= 2 && $t1 <= 4 && ($t2 < 10 || $t2 >= 20) ? "ём" : "ум"));
        }
    }

    public function getCountAnswerTemplate($param) {
        if (isset($param['count'])) {
            $year_str = $param['count'];
            $year = abs($year_str);
            $t1 = $year % 10;
            $t2 = $year % 100;
            return ($t1 == 1 && $t2 != 11 ? "Ответ" : ($t1 >= 2 && $t1 <= 4 && ($t2 < 10 || $t2 >= 20) ? "Ответа" : "Ответов"));
        }
    }

    public function getCountNewMessage($user_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT COUNT(*) as `count` FROM forum_message WHERE user_id=:user_id && is_ready = 0");
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
        $return = $query->fetch(PDO::FETCH_OBJ);
        return $return->count;
    }

    public function getCountNewTemplateMessageId($param) {
        if (isset($param['message_id'])) {
            $registry = Registry::getInstance();
            $query = $registry->db->prepare("SELECT COUNT(*) as `count` FROM forum_message WHERE (id=:message_id || parent_id=:message_id) && user_id=:user_id && is_ready = 0");
            $query->bindParam(":message_id", $param['message_id'], PDO::PARAM_INT, 11);
            $query->bindParam(":user_id", $param['user_id'], PDO::PARAM_INT, 11);
            $query->execute();
            $return = $query->fetch(PDO::FETCH_OBJ);
            return $return->count;
        } else {
            return 0;
        }
    }

    public function setMessageReady($message_id, $user_id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `forum_message` SET is_ready=1 WHERE user_id = :user_id && (id=:message_id || parent_id=:message_id)");
        $query->bindParam(":message_id", $message_id, PDO::PARAM_INT, 11);
        $query->bindParam(":user_id", $user_id, PDO::PARAM_INT, 11);
        $query->execute();
    }

}
