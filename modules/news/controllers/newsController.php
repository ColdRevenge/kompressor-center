<?php

class newsController extends Controller {

    private function _icon() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Uploader");
        Lavra_Loader::LoadClass("Images");
        if (isset($_FILES['icon']['name']) && !empty($_FILES['icon']['name'])) { //Если пошел запрос на загрузку
            $upload = new Uploader($registry->news_image_dir);

            $upload->setPrefix("icon_" . time() . "_" . rand(0, 100) . "_");
            $upload->isConvertLatinName(true);
            $upload->setMaxSize(1500);

            $upload->addAllowMimeType("image/jpeg");
            $upload->addAllowMimeType("image/gif");
            $upload->addAllowMimeType("image/png");
            $file_name = $upload->upload();

            //Изменение размера иконки, и масштабирование
            $images = new Images();
            $resourse = $images->open($registry->news_image_dir . $file_name);
            $images->setIsConvas(true);
            $file_s = $this->_setFileNameText($file_name, '_s');
            $images->save($images->ReSize($resourse, 340, 278), $registry->news_image_dir . $file_s, 100);

            $images->setIsConvas(false);
            $images->save($images->ReSize($resourse, 320, 0), $registry->news_image_dir . $file_name, 100);

            $this->uploaded_image = $file_name;
            return $this->uploaded_image;
        } elseif (isset($_POST['uploaded_image']) && $_POST['uploaded_image'] && !empty($_POST['uploaded_image'])) {
            $this->uploaded_image = $_POST['uploaded_image'];
            return $this->uploaded_image;
        }
        return false;
    }

    private function _setFileNameText($file_name, $end_string) {
        Lavra_Loader::LoadClass("Images");
        $images = new Images();
        $file = $images->getType($file_name);
        return $file['file'] . $end_string . $file['type'];
    }

    public function addAction() {
        Lavra_Loader::LoadModels("NewsProduct", "news");
        $news_product = new NewsProduct();
        if (!isset($this->param['type']))
            $this->param['type'] = 1;

        $registry = Registry::getInstance();

        Lavra_Loader::LoadModels("News", "news");
        $news = new News();

        if (isset($this->param['news_id'])) { //Если редактирование определение типа
            $news_edit = $news->getNewsId($this->param['news_id'], $registry->user_id);
            $this->param['type'] = $news_edit[0]->type;
            $this->getNewsProductAction();
        } elseif (isset($this->param['news_tmp_id'])) {
            $news_id = $this->param['news_tmp_id'];
        }



        try {
            if (isset($_POST['name'])) { //Если данные были отправленны
                if (!isset($_POST['desc']))
                    $_POST['desc'] = null;
                if (!isset($_POST['order']))
                    $_POST['order'] = 0;
                $icon = $this->_icon();
                if (!isset($this->param['news_id'])) { //Если добавление
                    $news_add_id = $news->add($this->param['type'], mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']), $_POST['name'], $_POST['desc'], $_POST['text'], $icon, $_POST['order'], $registry->user_id, $registry->user_region_id);
                    $news->setShopType($news_add_id, $registry->shop_type);
                    $news->setNewsIdFiles($news_add_id, $this->param['news_tmp_id']);
                    $news_product->setNewsIdProducts($news_add_id, $this->param['news_tmp_id']);
                    $this->redirect($this->MyURL . "list/" . $this->param['type'] . "/1/");
                } else { //Если редактирование
                    $news->edit($this->param['news_id'], mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']), $_POST['name'], $_POST['desc'], $_POST['text'], $icon, $_POST['order']);
                    $this->redirect($this->MyURL . "list/" . $this->param['type'] . "/2/");
                }
            }
        } catch (Exception $e) {
            $this->setError($e->getMessage());
        }

        if (isset($this->param['news_id'])) { //Если редактирование
            $news_edit = $news->getNewsId($this->param['news_id'], $registry->user_id);
            if (!isset($news_edit[0]->id)) { //Если новость не найдена
                //    $this->redirect($this->MyURL . "list/" . $this->param['type'] . "/5/");
            }
            $date = getdate($news_edit[0]->date);
            $_POST['day'] = $date['mday'];

            $_POST['month'] = $date['mon'];
            $_POST['year'] = $date['year'];
            $_POST['order'] = $news_edit[0]->order;
            $_POST['preview'] = stripslashes($news_edit[0]->icon);
            $this->uploaded_image = $_POST['preview'];

            $_POST['text'] = $news_edit[0]->text;
            $_POST['desc'] = $news_edit[0]->desc;
            $this->param['type'] = $news_edit[0]->type;
            $_POST['name'] = $news_edit[0]->name;
            $this->news_id = $this->param['news_id'];

            $this->tmp_news_id = $news_id = $this->news_id;
        } else {
            $_POST['order'] = $news->getLastOrder();
            $this->caption = "Добавить";
            $this->submit = "Добавить";
            if (isset($this->param['news_tmp_id'])) {
                //      $this->tmp_news_id = $news_id = $this->param['news_tmp_id'];
            }
        }

        if (!isset($_POST['day'])) {
            $date = getdate();
            $_POST['day'] = $date['mday'];
            $_POST['month'] = $date['mon'];
            $_POST['year'] = $date['year'];
        }
        $this->is_menu_add = 1;
        $this->type = $this->param['type'];
        //Подгрузка даты
        $this->date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['year'] . "/" . $_POST['month'] . "/" . $_POST['day'] . "/");



        $registry->up_category_id = 10; // $this->param['category_id']; //id-категории
        $this->up_page_id = $news_id;

        $registry->up_page_id = $news_id;
        $registry->up_action_id = 7; //id - акшена, сам экшен прописан в модуле upload: getFilesAction, и uploaderAction
        $registry->up_action_width = '320'; //
        $registry->up_action_height = '50';

        $registry->up_width = 0; //Размеры главной картинки
        $registry->up_height = 0;
        $registry->up_type = 1200;
        $registry->up_formats = ''; //Разрешенные форматы
        $registry->up_upload_dir_type = 4; //Тип папки
        //Настройки нарезки 1
        $registry->up_resize_width[1] = 750;
        $registry->up_resize_heigth[1] = 0;
        $registry->up_resize_right_prefix[1] = '_b';
//            $registry->up_resize_scallign[1] = 0.05;
        $registry->up_resize_is_convas[1] = 0;
//            //Настройка водяных знаков
        $registry->up_water_file[1] = '';
        $registry->up_pos_top[1] = '';
        $registry->up_pos_bottom[1] = '';
        $registry->up_pos_left[1] = '';
        $registry->up_pos_right[1] = '';


        //Настройки нарезки 1
//        $registry->up_resize_width[2] = 180;
//        $registry->up_resize_heigth[2] = 0;
//        $registry->up_resize_right_prefix[2] = '_m';
////            $registry->up_resize_scallign[1] = 0.05;
//        $registry->up_resize_is_convas[2] = 0;
////            //Настройка водяных знаков
//        $registry->up_water_file[2] = '';
//        $registry->up_pos_top[2] = '';
//        $registry->up_pos_bottom[2] = '';
//        $registry->up_pos_left[2] = '';
//        $registry->up_pos_right[2] = '';

        $this->upload_photo = Lavra_Loader::getLoadModule('uploader_article', '/uploader_article/list/');
    }

    public function setFile($params) {
        return $this->_setFileNameText($params['file'], "_s");
    }

    public function listAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("News", "news");
        $news = new News();

        if (isset($this->param['message'])) {
            switch ($this->param['message']) {
                case 1:
                    $this->setMessage("Страница успешно добавленна!");
                    break;
                case 2:
                    $this->setMessage("Успешно сохранено!");
                    break;
                case 3:
                    if ($this->param['del_id']) { // Удаление страницы
                        $this->setMessage("Новость успешно удалена");
                        $news->del($this->param['del_id']);
                    }
                    break;
                case 5:
                    $this->setMessage("Новость не найдена");
                    break;
            }
        }

        if (!isset($this->param['type'])) {
            $this->param['type'] = 0;
        }

        $get_news = $news->getNews($this->param['type'], 10000, 0, $registry->shop_type);
        $this->news = $get_news['result'];

        if (isset($_POST['order'])) {

            $news->clearOrder($this->param['type']);

            foreach ($_POST['order'] as $value => $key) {
                $news->setOrder($value, $key);
            }

            header("location: /xadmin/news/list/" . $this->param['type'] . "/");
        }

        $news = $this->news;

        foreach ($news as $key => $value) {
            $news[$key]->text = stripcslashes($value->text);
        }
        $this->type = $this->param['type'];
        $this->news = $news;
    }

    private function _replace($string) {
        return stripslashes(str_replace('&', '&amp;', str_replace('>', '&gt;', str_replace('<', '&lt;', str_replace("'", '&apos;', $string)))));
    }

    public function rssAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels('Setting', 'setting');
        $setting = new Setting();
        $set = $setting->getGeneral();
        Lavra_Loader::LoadModels("News", "news");
        $news = new News();
//        header('Content-Type: text/xml');
        header("Content-type: application/rss+xml; charset=utf-8");
        if (!isset($this->param['type']))
            $this->param['type'] = 1;
        $get_news = $news->getNews($this->param['type'], 100000, 0, $registry->shop_type);
        echo Application::cp1251_to_uft8('<?xml version="1.0" encoding="utf-8"?>
          <rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
          <channel>
          <title>' . $set->name . '</title>
          <link>' . $registry->base_url . '</link>
          <atom:link href="' . $registry->base_url . 'news/rss/" rel="self" type="application/rss+xml" />    
          <description>Новости интернет магазина ' . $set->name . '</description>');
        foreach ($get_news['result'] as $key => $value) {
            $date = date("D, j M Y H:i:s", $value->date) . " GMT";
            echo Application::cp1251_to_uft8('<item>
            <title>' . $this->_replace($value->name) . '</title>
            <link>' . $registry->base_url . 'news/look/' . $value->id . '/</link>
            <description>' . str_replace("\n", null, $this->_replace(strip_tags($value->desc))) . '</description>
            <author>' . $set->email . ' (' . $set->name . ')</author>
            <pubDate>' . $date . '</pubDate>
            <guid>' . $registry->base_url . 'news/look/' . $value->id . '/</guid>
         </item>
         ');
        }


        echo Application::cp1251_to_uft8('</channel>
   </rss>');
        exit();
    }

    public function getNewsAction() {
        Lavra_Loader::LoadClass("Application");
        $this->months = Application::getMonths();
        Lavra_Loader::LoadModels("News", "news");
        $news = new News();

        if (isset($_POST['new_mail'])) {
            if ($news->isMail($_POST['new_mail'])) {
                $news->addMail($_POST['new_mail']);
            }
        }
        if (!isset($this->param['type']))
            $this->param['type'] = 1;
        $this->register_object('setFile', $this);
        if (isset($this->param['page'])) { //Если необходим постраничный вывод
            $registry = Registry::getInstance();
            $registry->pseudo_dir = 'news';

            $get_news = $news->getNews($this->param['type'], 10, (int) $this->param['page'] * 10 - 10, $registry->shop_type);
            $news_arr = $get_news['result'];


            $count_publ = $get_news['count']; //Всего публикаций
//                echo $count_publ;
            Lavra_Loader::LoadClass("PageBar");
            $pagebar = new PageBar($this->param['page'], $count_publ + 10, 10, 10);
            $start = $pagebar->getStartPageBar();
            $end = $pagebar->getEndPageBar();

            $this->start = $start;
            $this->end = $end;
            $this->current_page = $pagebar->getCurrentPage();
            $this->count_all_pages = $pagebar->getCountPage();

            $this->param['is_strip'] = 0;
        } else {
            $registry = Registry::getInstance();
            if (!isset($this->param['type']))
                $this->param['type'] = 0;
            if (!isset($this->param['limit']))
                $this->param['limit'] = 10000;
            if (!isset($this->param['offset']))
                $this->param['offset'] = 0;
            if (!isset($this->param['is_strip']))
                $this->param['is_strip'] = 0;
            $get_news_news = $news->getNews((int) $this->param['type'], (int) $this->param['limit'], (int) $this->param['offset'], $registry->shop_type);
            $news_arr = $get_news_news['result'];
        }

        foreach ($news_arr as $key => $value) {
            if ($this->param['is_strip'] == 0) {
                $news_arr[$key]->text = stripslashes($value->text);
                $news_arr[$key]->name = stripslashes($value->name);
            } else {
                $news_arr[$key]->text = trim(mb_substr(strip_tags(stripslashes($value->text), "<a>"), 0, 120)) . (mb_strlen(strip_tags(stripslashes($value->text))) > 120 ? '..' : null);
                $news_arr[$key]->name = strip_tags(stripslashes($value->name));
            }
        }
        $this->news = $news_arr;
    }

    public function getLookAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Application");
        $this->months = Application::getMonths();

        Lavra_Loader::LoadModels("News", "news");
        $news = new News();
        if (isset($this->param['news_id'])) {
            $news_arr = $news->getNewsId($this->param['news_id'], $registry->user_id);
            foreach ($news_arr as $key => $value) {
                $news_arr[$key]->text = stripslashes($value->text);
                $news_arr[$key]->name = stripslashes($value->name);
                if ($registry->shop_type != $value->shop_id) {
                    $this->log404();
                    header("HTTP/1.0 404 Not Found");
                    header("Location: " . $registry->base_url . '404/');
                    exit();
                }
                $registry->head_title = $value->name;
                $registry->head_key = $value->name;
                $registry->head_desc = $value->desc;
            }
            $this->news = $news_arr;
            $registry->open_news_id = $this->param['news_id'];


            Lavra_Loader::LoadModels("NewsProduct", "news");
            $news_product = new NewsProduct();
            Lavra_Loader::LoadModels("Products", "products");
            $products = new Products();
            $this->products = $news_product->getNewsProducts($this->param['news_id']);


            $images_products = array();
            foreach ($this->products as $key => $value) {
                $get_price = $products->getPrpductId($value->id);
                $value->price = $get_price->price;
                $value->article = $get_price->article;
                $value->mod_id = $get_price->mod_id;

                $value->old_price = $get_price->old_price;
                $images_products[$key] = $products->getImages($value->id);
            }
            $this->product_images = $images_products;


            Lavra_Loader::LoadModels("Forum", "forum");
            $forum = new Forum();
            $this->get_forum_topic = $forum->getNewsidTopic($this->param['news_id']);
        }
    }

    public function getNewsProductAction() {
        if (isset($this->param['news_id'])) {
            Lavra_Loader::LoadModels("NewsProduct", "news");
            $news_product = new NewsProduct();

            $this->news_product = $news_product->getNewsProducts($this->param['news_id']);
        }
    }

}
