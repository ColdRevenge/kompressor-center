<?php

class availableController extends Controller {

    private function _getProductArticle($is_active = -1) {
        Lavra_Loader::LoadModels("Available", "_clear_category");
        $avi = new Aviable();
        $get_product = $avi->getPrpductsBrand(13, $is_active);

        $return = array();
        $i = 0;
        foreach ($get_product as $key => $value) {
            $return['article'][$i] = trim($value->article);
            $return['id'][$i] = ($value->id);
            $i++;
        }
        return $return;
    }

    public function availableAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        Lavra_Loader::LoadModels("Mod", "products");
        Lavra_Loader::LoadClass('Application');
        $mod = new Mod();

        if (isset($_POST['aviable'])) {
            foreach ($_POST['aviable'] as $product_id => $value) {
                $products->setActive($product_id, 0);
            }
            CacheModule::delCacheModule('products');
            CacheModule::delCacheModule('Controller');
            $cac = Cache::getInstance();
            $cac->deleteTag('Products');
            $cac->deleteTag('Characteristics');
            $cac->deleteTag('Files');
        }
        if (isset($_POST['active'])) {
            foreach ($_POST['active'] as $article) {
                $get_product = $products->getProductArticle($article);
                if (isset($get_product->id)) {
                    $products->setActive($get_product->id, 1);
                }
            }
            CacheModule::delCacheModule('products');
            CacheModule::delCacheModule('Controller');
            $cac = Cache::getInstance();
            $cac->deleteTag('Products');
            $cac->deleteTag('Characteristics');
            $cac->deleteTag('Files');
        }

        if (isset($_POST['new'])) {
            foreach ($_POST['new'] as $article => $value) {
                if ($this->param['type'] == 'vita') {
                    $brand_id = 13;
                }
                $app = new Application();
                $pseudo_dir = Application::getPseudoDir($app->convertToLatin("Сумка женская $article"));
                $is_product = $products->getProductArticle($article);
                if (!isset($is_product->id)) {
                    $product_id = $products->add("Сумка женская $article", '', '', '', '', '', '', '', 0, 0, 0, 0, 0, $pseudo_dir, $brand_id, 0, 1, '', '', '', '', '', '', '', '');
                    $mod->addMod($product_id, 0, '', $article, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 100, $registry->shop_default_currency, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                    $products->setShopType($product_id, 4);
                }
            }
            CacheModule::delCacheModule('products');
            CacheModule::delCacheModule('Controller');
            $cac = Cache::getInstance();
            $cac->deleteTag('Products');
            $cac->deleteTag('Characteristics');
            $cac->deleteTag('Files');
        }

        if (isset($this->param['type'])) {
            $not_warehouse = array();
            $new_product = array();

            if ($this->param['type'] == 'vita') {
                Lavra_Loader::LoadModels("VitaParser", "_clear_category");
                $_vita = new VitaParser();
//                $get_parser_article = $_vita->getAllProducts('http://www.vita-bags.ru/price/CAT_ALL.html');
                $get_parser_article_all = $_vita->getAllProducts('http://trugor.ru/files/vita.php');


                foreach ($get_parser_article_all[2] as $key => $value) {
                    $get_parser_article['article'][$key] = trim($value);
                    $get_parser_article['link'][$key] = $get_parser_article_all[1][$key];
                }
            } elseif ($this->param['type'] == 'tosoco') { //Почти ни чего 
//                Lavra_Loader::LoadModels("TosocoParser", "_clear_category");
//                $_tosoco = new TosocoParser();
//                $get_parser_article_all = $_tosoco->getAllProducts('http://tosoco.su/ishop/3_0');
//
//
//                foreach ($get_parser_article_all[2] as $key => $value) {
//                    $get_parser_article['article'][$key] = trim($value);
//                    $get_parser_article['link'][$key] = $get_parser_article_all[1][$key];
//                }
            }


            $get_sumka_product = $this->_getProductArticle(1);

            /**
             * Нет на складе
             */
            foreach ($get_sumka_product['article'] as $key => $article) {
                if (!in_array($article, $get_parser_article['article'])) {
                    $not_warehouse[] = array('article' => $article, 'id' => $get_sumka_product['id'][$key]);
                }
            }

            $get_sumka_product = $this->_getProductArticle(-1);
            /**
             * Новые товары
             */
            foreach ($get_parser_article['article'] as $key => $article) {
                if (!in_array($article, $get_sumka_product['article'])) {
                    $new_product[] = array('article' => $article, 'link' => $get_parser_article['link'][$key]);
                }
            }
            $this->not_warehouse = $not_warehouse;
            $this->new_product = $new_product;


            $no_active_product = array();
            /**
             * Добавленые но не активные товары
             */
            $get_sumka_product = $this->_getProductArticle(0);
            /**
             * Новые товары
             */
            foreach ($get_parser_article['article'] as $key => $article) {
                if (in_array($article, $get_sumka_product['article'])) {
                    $no_active_product[] = array('article' => $article, 'link' => $get_parser_article['link'][$key]);
                }
            }
            $this->no_active_product = $no_active_product;
        }


        $this->menu = $registry->menu;
    }

    private function _vita() {
        
    }

}
