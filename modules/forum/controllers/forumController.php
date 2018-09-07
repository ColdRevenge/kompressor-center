<?php

class forumController extends Controller {

    public function linkAction() {
        if (isset($this->param['link'])) {
            Lavra_Loader::LoadModels("Forum", "forum");
            $forum = new Forum();
            header("Location: " . $forum->decodeLink($this->param['link']));
            exit();
        }
    }

    public function get_usersAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Forum", "forum");
        $forum = new Forum();
        $this->get_users = $forum->getUsers();
        $this->register_object('forum_obj', $forum);
    }

    public function indexAction() {
        Lavra_Loader::LoadModels("Pages", "page");
        $page = new Pages();
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Forum", "forum");
        $forum = new Forum();
//        $forum->importNews();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();

        $registry->open_category_id = $open_category_id = 1107; //Женский форум
        $open_parent_cateogry_id = 0;

        if (isset($this->param['pseudo_dir']) && !empty($this->param['pseudo_dir'])) {
            if ($this->param['pseudo_dir'] == 'auth' || $this->param['pseudo_dir'] == 'stat') {
                $this->content = Lavra_Loader::getLoadModule($this->param['pseudo_dir']);
            } else {

                $this->get_category = $get_category = $forum->getCategoryPseudoDir($this->param['pseudo_dir']);
                if (isset($get_category->id)) {
                    $registry->open_category_id = $open_category_id = $get_category->id;
                    $open_parent_cateogry_id = $get_category->parent_id;


                    $registry->head_title = ($get_category->title ? $get_category->title : $get_category->name);
                    $registry->head_key = ($get_category->meta_key ? $get_category->meta_key : $get_category->name);
                    $registry->head_desc = ($get_category->meta_desc ? $get_category->meta_desc : $get_category->desc);
                } else {
                    $page = new Pages();
                    $page_id = CacheModule::getWrapperModule('page-getPageIdAdressValidate-' . md5($registry->isMobile . '-' . $registry->config->getCurrentUrl()) . '-' . $registry->shop_type, $page->getPageIdAdressValidate($registry->config->getCurrentUrl()));
                    ;
                    if ($page_id != false) { //Если страница была найдена
                        $this->content = $this->getFindModule(Lavra_Loader::getLoadModule('page', '/page/id/' . $page_id));

                        $open_category_id = $registry->open_category_id;
                    } else {
                        $this->log404();
                        header("HTTP/1.0 404 Not Found");
                        header("Location: " . $registry->base_url . '404/');
                        header("HTTP/1.0 404 Not Found");
                        exit();
                    }
                }
            }

            /**
             * Добавление тем
             */
            $this->_addTopic($open_category_id);
            $this->topics = $forum->getTopics($open_category_id);
        } else {
            $this->is_main = 1;
            $this->get_topic_not_title = $forum->getTopicsNotTitle();
//            print_r($this->get_topic_not_title);
            
            $this->get_last_topics = $forum->getLastAnswers();
            if ($this->user_id > 0) {
                $this->get_user = $forum->getUserId($this->user_id);
            }

            $this->page = $page->getPageId(94, $registry->shop_type);
            $registry->head_title = ($this->page->title ? $this->page->title : $this->page->header);
            $registry->head_key = ($this->page->meta_keyword ? $this->page->meta_keyword : $this->page->header);
            $registry->head_desc = ($this->page->meta_desc ? $this->page->meta_desc : $this->page->meta_desc);
        }

        $this->menu_forum = $forum->getCategory(100, $registry->shop_type);

        $registry->open_category_id = $this->open_category_id = $open_category_id;
        if ($open_parent_cateogry_id > 0) {
            $this->breadcrumbs = array_reverse($category->getBreadcrumbs($open_category_id, $registry->shop_type));
            $this->get_parent_category = $category->getCategoryId($open_parent_cateogry_id);
        }

        if (isset($this->param['topic_id']) && $this->param['topic_id'] > 0) {

            $this->is_read_topic = 1;
            $this->get_topic = $get_topic = $forum->getTopicId($this->param['topic_id']);
            $this->get_answer_like = $forum->getAnswerLike($this->param['topic_id']);
//            print_r($this->get_answer_like);
            if (isset($get_topic->id)) {

                $registry->head_title = (!empty($get_topic->title)) ? stripslashes($get_topic->title) : $get_topic->name . ' | Женский форум - Forum.Lalipop.Ru ';
                if ($get_topic->import_news_id > 0) { //Если топик это новость 
                    Lavra_Loader::LoadModels("News", "news");
                    $news = new News();
                    $_get_news = $news->getNewsId($get_topic->import_news_id, 0);
                    if (isset($_get_news[0])) {
                        $this->get_topic_news = $_get_news[0];
                    }
                }

                $this->noticeAction($this->param['topic_id'], $this->user_id);

                $get_topic_answers = $forum->getTopicAnswers($this->param['topic_id']);

                $_get_topic_answers = array();
                foreach ($get_topic_answers as $key => $value) {
                    $_link_lalipop_products = array();
                    $value->text = '<div class="answer-text_'.$value->id.'">' . $value->text . '</div>';
                    preg_match_all('/href\=[\"\']+([^\s\'\"]+)[\"\']/', stripslashes($value->text), $math);
                    $value->text = preg_replace('/height\=[\"\']*\d+[\"\']*/', null, stripslashes($value->text));

                    if (isset($math[1]) && isset($math[1][0])) {

                        foreach ($math[1] as $is_lalipop_link) {
                            if (strpos($is_lalipop_link, 'lalipop.ru/products/') !== false) {
                                $_link_lalipop_products[trim(substr($is_lalipop_link, strrpos($is_lalipop_link, 'lalipop.ru/products/') + strlen('lalipop.ru/products/')), '/ ')] = 1;
                            }
                        }

                        if (strpos($value->text, 'lalipop.r') === false) {
                            $value->text = (str_replace('<a', '<a rel="nofollow" target="_blank"', $value->text));
                        } else {
                            $value->text = (str_replace('<a', '<a target="_blank"', $value->text));
                        }
                        foreach ($math[1] as $replace_link) {
                            if (strpos($replace_link, 'lalipop.r') === false) {
                                $value->text = (str_replace("'" . $replace_link . "'", '/forum/link/' . $forum->codeLink($replace_link) . '/', $value->text));
                                $value->text = (str_replace('"' . $replace_link . '"', '/forum/link/' . $forum->codeLink($replace_link) . '/', $value->text));
                                $value->text = (str_replace('\"' . $replace_link . '\"', '/forum/link/' . $forum->codeLink($replace_link) . '/', $value->text));
                                $value->text = (str_replace("\'" . $replace_link . "\'", '/forum/link/' . $forum->codeLink($replace_link) . '/', $value->text));


                                $value->text = (str_replace($replace_link, 'Ссылка', $value->text));
                            }
                        }
                        if (count($_link_lalipop_products)) {
                            $value->text = $value->text . $this->_setProductAnswer($_link_lalipop_products);
                        }
                    }
//                    $_get_topic_answers[$key] = preg_replace($value, $_get_topic_answers, $get_topic_answers);
                }

//                print_r($_link_lalipop_products);

                $forum->setTopicHit($this->param['topic_id']);
                $max_topic_like = 0;
                foreach ($get_topic_answers as $value) {
                    if ($value->count_answer_like > $max_topic_like) {
                        $max_topic_like = $value->count_answer_like;
                        $this->max_topic_like_id = $value->id;
                    }
                }
                $this->topic_answers = $get_topic_answers;
            }
        }
        $this->open_category_id = $registry->open_category_id;

        $this->register_object('forum_obj', $forum);
    }

    /**
     * Добавляет товары в ответ
     */
    private function _setProductAnswer(Array $pseudo_dir) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        $_get_prodcuts = array();
        foreach ($pseudo_dir as $key => $value) {
            $_get_product = $products->getPrpductDir($key);
            if (isset($_get_product->id)) {
//                print_r($_get_product);
                $_get_prodcuts[$_get_product->id] = $products->getPrpductDir($key);
            } else {
//                echo "$key ";
            }
        }
        $this->products = $_get_prodcuts;
//        print_r($this->products);
        $images_products = array();
        foreach ($_get_prodcuts as $key => $value) {
            $images_products[$key] = $products->getImages($value->id);
        }
        $this->product_images = $images_products;
        $result = $this->fetchTemplate($registry->modules_dir . 'catalog/templates/getProductForum.tpl');
//        echo $result;
        return $result;
    }

    public function last_postAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Forum", "forum");
        $forum = new Forum();
        $this->get_last_topics = $forum->getLastAnswers(50);
//        print_r($this->get_last_topics);
        $this->register_object('forum_obj', $forum);
    }

    public function noticeAction($topic_id = 0, $user_id = 0, $action = -1) {
        if ($topic_id > 0 && !isset($this->param['topic_id'])) {
            $this->param['topic_id'] = $topic_id;
        }
        if ($user_id > 0 && !isset($this->param['user_id'])) {
            $this->param['user_id'] = $user_id;
        }
        if (!isset($this->param['action'])) {
            $this->param['action'] = $action;
        }

        if (isset($this->param['topic_id']) && isset($this->param['user_id']) && isset($this->param['action'])) {
            $registry = Registry::getInstance();

            Lavra_Loader::LoadModels("Forum", "forum");
            $forum = new Forum();

            if ($this->is_ajax != 1) {
                $get_topic = $forum->getTopicId($this->param['topic_id']);
                if (isset($get_topic->id)) {
                    $this->topic_name = $get_topic->name;
                }
            }

            $is_notice = $forum->isNotice($this->param['topic_id'], $this->param['user_id']);

            if ($is_notice == 0) {
                $this->action_notice = 1;
            } else {
                $this->action_notice = 2;
            }

            if ($this->param['action'] == '1') {
                $forum->delNotice($this->param['topic_id'], $this->param['user_id']);
                $forum->addNotice($this->param['topic_id'], $this->param['user_id']);
                $this->action_notice = 2;
            } elseif ($this->param['action'] == '0') {
                $forum->delNotice($this->param['topic_id'], $this->param['user_id']);
                $this->action_notice = 1;
            }
        }
    }

    private function _addTopic($category_id) {

        $registry = Registry::getInstance();
        if ($registry->user_id > 0) {
            $forum = new Forum();
            if (isset($_POST['text'])) {
                $parent_id = $topic_id = 0;

                if (!isset($_POST['topic_id'])) { //Добавление новой темы
                    $topic_id = $forum->addTopic(trim($_POST['name']), $registry->user_id, $category_id, 1);
                } elseif (isset($_POST['topic_id'])) { //Если добавление сообщения в тему
                    $topic_id = (int) $_POST['topic_id'];
                }
                if (isset($_POST['parent_id'])) { //Если ответ на сообщение
                    $parent_id = (int) $_POST['parent_id'];
                }


                if ($topic_id > 0) {
                    if (isset($_POST['is_notice']) && $_POST['is_notice'] == 1) {
                        $forum->delNotice($topic_id, $this->user_id);
                        $forum->addNotice($topic_id, $this->user_id);
                    } else {
                        $forum->delNotice($topic_id, $this->user_id);
                    }

                    $_POST['text'] = strip_tags($_POST['text'], '<p><a><div><ul><li><ol><strong><span><em><blockquote><img><video><a><b><big><blink><blockquote><br><canvas><caption><center><cite><code><col><colgroup><comment><dd><details><dfn><dir><div><dl><dt><em><font><h1><h2><h3><h4><h5><h6><hr><i><img><label><legend><li><link><listing><main><map><mark><marquee><nav><ol><optgroup><option><output><p><param><plaintext><q><rp><rt><ruby><s><samp><section><small><source><spacer><span><strike><strong><sub><summary><sup><table><tbody><td><textarea><tfoot><th><thead><time><title><tr><track><tt><u><ul><var><video><wbr><xmp>');

                    $answer_id = $forum->addAnswer(trim($_POST['text']), $registry->user_id, $topic_id, $parent_id, 1);
                    $forum->setTopicChange($topic_id, $answer_id);
                    $this->_sendMessage($topic_id, $answer_id);
                    $this->is_send_success = 1;
                } else {
                    $this->setError('Ошибка при добавлении сообщения');
                }
            }
        }
    }

    private function _sendMessage($topic_id, $answer_id) {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Forum", "forum");
        $forum = new Forum();
        Lavra_Loader::LoadClass("Users");
        $users = new Users();
        Lavra_Loader::LoadClass("SendMail");
        $mail = new SendMail();

        $this->get_topic = $get_topic = $forum->getTopicId($topic_id);

        $this->get_answer = $forum->getAnswerId($answer_id);
        if (isset($this->get_answer->user_id)) {
            $this->get_user = $get_user = $users->getUserId($this->get_answer->user_id);
        }
        $this->get_answer->text = strip_tags($this->get_answer->text, '<p><a><div><li><ol><strong><span><em><a><b><br><center><div><em><font><h1><h2><h3><h4><h5><h6><hr><i><label><ol><p><small><span><strike><strong><sub><table><tbody><td><textarea><tfoot><th><thead><tr><tt><u><ul>');


        $message_mail = preg_replace(array('/\n/i', '/\r/i', '/\t/i', '/>\s+/i', '/\s+</i'), array('', '', '', '>', '<'), $this->fetchTemplate($registry->modules_dir . 'forum/templates/mail_new_message.tpl', 'forum'));
        $get_email_user = $forum->getEmailNotice($topic_id);
//        if (isset($get_user->id) && !empty($get_user->email) && $get_user->id != $this->user_id) {
        if (count($get_email_user) > 0) {
            $mail->send($get_email_user, "Новое сообщение в теме " . stripslashes($get_topic->name), $message_mail);
        }
//        }
        $mail->send(array($this->_setting->email, $this->_setting->email_2, $this->_setting->email_3), "Новое сообщение в теме " . stripslashes($get_topic->name), $message_mail);
    }

    public function forum_userAction() {
        $registry = Registry::getInstance();
        if (isset($this->param['user_id'])) {
            Lavra_Loader::LoadModels("Forum", "forum");
            $forum = new Forum();
            $this->get_user = $get_user = $forum->getUserId($this->param['user_id']);
            if (isset($get_user->id)) {
                $registry->head_title = 'Профиль пользователя ' . stripslashes($get_user->name) . ' (' . $get_user->login . '). Форум магазина Lalipop';
            }

            $this->register_object('forum_obj', $forum);
        }
    }

    public function my_postAction() {
        $registry = Registry::getInstance();
        if ($registry->user_id > 0) {
            Lavra_Loader::LoadModels("Forum", "forum");
            $forum = new Forum();
            $this->get_answer = $forum->getUserTopics($registry->user_id);
        }
        $registry->head_title = 'Мои сообщения';
    }

    public function catalogAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $this->menu_top = $category->getCategory(101, $registry->shop_type);
        $this->menu_forum = $category->getCategory(100, $registry->shop_type);
    }

    public function likeAction() {
        if (isset($this->param['topic_id']) && $this->param['answer_id'] && $this->param['user_id']) {
            if ($this->user_id > 0) {
                $registry = Registry::getInstance();
                Lavra_Loader::LoadModels("Forum", "forum");
                $forum = new Forum();

                if ($this->param['user_id'] != $this->user_id) {
                    if (!$forum->isLike($this->param['user_id'], $this->user_id, $this->param['topic_id'], $this->param['answer_id'])) {
                        $forum->like($this->param['user_id'], $this->user_id, $this->param['topic_id'], $this->param['answer_id']);
                    }
                }
                echo "Поблагодарили: " . $forum->getUserLike($this->param['user_id']);
            }
        }
    }

    public function admin_edit_topicAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Forum", "forum");
        $forum = new Forum();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();

        if (isset($this->param['topic_id'])) {
            Lavra_Loader::LoadClass("Users");
            $get_user = new Users();
            $user = $get_user->getUserId($this->user_id);
            if ($user->user_type == 1) {
                $get_topic = $this->get_topic = $forum->getTopicId((int) $this->param['topic_id']);

                if (isset($_POST['topic_name']) && isset($_POST['topic_category_id'])) {

                    if (isset($_POST['topic_title'])) {
                        $forum->setTitle((int) $this->param['topic_id'], $_POST['topic_title']);
                    }

                    $get_category = $category->getCategoryId((int) $_POST['topic_category_id']);
                    if (isset($get_category->id)) {
                        $forum->setTopic((int) $this->param['topic_id'], trim($_POST['topic_name']), (int) $_POST['topic_category_id']);

                        exit('<script type="text/javascript">parent.location.href="' . $this->https_url . $get_category->pseudo_dir . '/read/' . (int) $this->param['topic_id'] . '/"</script>');
                    }
                } elseif (isset($this->param['is_del']) && $this->param['is_del'] == 1) {
                    $get_category = $category->getCategoryId($get_topic->category_id);
                    $forum->delTopic((int) $this->param['topic_id']);
                    exit('<script type="text/javascript">parent.location.href="' . $this->https_url . $get_category->pseudo_dir . '/"</script>');
                }

                $this->menu_forum = $forum->getCategory(100, $registry->shop_type);
            }
        }
    }

    public function admin_edit_answerAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Forum", "forum");
        $forum = new Forum();
        Lavra_Loader::LoadClass("Users");
        $get_user = new Users();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();

        if (isset($this->param['answer_id'])) {
            $user = $get_user->getUserId($this->user_id);
            if ($user->user_type == 1) {
                $get_answer = $this->get_answer = $forum->getAnswerId((int) $this->param['answer_id']);

                if (isset($get_answer->topic_id)) {

                    if (isset($_POST['answer_text'])) {
                        $_POST['answer_text'] = strip_tags($_POST['answer_text'], '<p><a><div><ul><li><ol><strong><span><em><blockquote><img><video><a><b><big><blink><blockquote><br><canvas><caption><center><cite><code><col><colgroup><comment><dd><details><dfn><dir><div><dl><dt><em><font><h1><h2><h3><h4><h5><h6><hr><i><img><label><legend><li><link><listing><main><map><mark><marquee><nav><ol><optgroup><option><output><p><param><plaintext><q><rp><rt><ruby><s><samp><section><small><source><spacer><span><strike><strong><sub><summary><sup><table><tbody><td><textarea><tfoot><th><thead><time><title><tr><track><tt><u><ul><var><video><wbr><xmp>');

                        $forum->setAnswerId((int) $this->param['answer_id'], $_POST['answer_text']);

                        exit('<script type="text/javascript">parent.location.href=parent.location.href</script>');
                    } elseif (isset($this->param['is_del']) && $this->param['is_del'] == 1) {

                        $get_topic = $forum->getTopicId($get_answer->topic_id);
                        $get_category = $category->getCategoryId($get_topic->category_id);

                        $forum->delAnswer((int) $this->param['answer_id']);
                        exit('<script type="text/javascript">parent.location.href="' . $this->https_url . $get_category->pseudo_dir . '/read/' . $get_answer->topic_id . '/"</script>');
                    }
                }
            }
        }
    }

    public function user_edit_answerAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Forum", "forum");
        $forum = new Forum();
        Lavra_Loader::LoadClass("Users");
        $get_user = new Users();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();

        if (isset($this->param['answer_id'])) {
            $user = $get_user->getUserId($this->user_id);
            $get_answer = $this->get_answer = $forum->getAnswerId((int) $this->param['answer_id']);

            if (isset($get_answer->topic_id)) {
                if ($get_answer->user_id == $user->id) {
                    if (isset($_POST['answer_text'])) {
                        $_POST['answer_text'] = strip_tags($_POST['answer_text'], '<p><a><div><ul><li><ol><strong><span><em><blockquote><img><video><a><b><big><blink><blockquote><br><canvas><caption><center><cite><code><col><colgroup><comment><dd><details><dfn><dir><div><dl><dt><em><font><h1><h2><h3><h4><h5><h6><hr><i><img><label><legend><li><link><listing><main><map><mark><marquee><nav><ol><optgroup><option><output><p><param><plaintext><q><rp><rt><ruby><s><samp><section><small><source><spacer><span><strike><strong><sub><summary><sup><table><tbody><td><textarea><tfoot><th><thead><time><title><tr><track><tt><u><ul><var><video><wbr><xmp>');

                        $forum->setAnswerId((int) $this->param['answer_id'], $_POST['answer_text']);

                        exit('<script type="text/javascript">parent.location.href=parent.location.href</script>');
                    }
                } else {
                    exit('Страница не найдена');
                }
            }
        }
    }
    
    public function like_answer_userAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Forum", "forum");
        $forum = new Forum();
        if (isset($this->param['user_id']) && isset($this->param['answer_id'])) {
            $this->get_users_like = $forum->getLikeUserAnswer($this->param['user_id'], $this->param['answer_id']);
        }
    }

    public function searchAction() {
        $registry = Registry::getInstance();
        $registry->head_title = 'Поиск по форуму - Forum.Lalipop.Ru';
        Lavra_Loader::LoadModels("Forum", "forum");
        $forum = new Forum();
        if (isset($_GET['find']) && isset($_GET['forum_type'])) {
            if ($_GET['forum_type'] == 1) {
                $this->topics = $forum->getTopicsSearch($_GET['find']);
            } elseif ($_GET['forum_type'] == 2) {
                $this->topics = $forum->getTopicsSearchText($_GET['find']);
            }
        }
        $this->register_object('forum_obj', $forum);
    }

}
