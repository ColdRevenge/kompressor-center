<?php

class modController extends Controller {

    public function listModAction() {
            echo 'ok!';
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Mod", "products");
        $mod = new Mod();
        if (isset($this->param['product_id'])) {
//            if (isset($_POST['name'])) {
//                if (!isset($_POST['name'])) $_POST['name'] = null;
//                if (!isset($_POST['article'])) $_POST['article'] = null;
//                if (!isset($_POST['price'])) $_POST['price'] = 0;
//                if (!isset($_POST['price_1'])) $_POST['price_1'] = 0;
//                if (!isset($_POST['price_2'])) $_POST['price_2'] = 0;
//                if (!isset($_POST['price_3'])) $_POST['price_3'] = 0;
//                if (!isset($_POST['price_4'])) $_POST['price_4'] = 0;
//                if (!isset($_POST['price_5'])) $_POST['price_5'] = 0;
//                if (!isset($_POST['old_price'])) $_POST['old_price'] = 0;
//                if (!isset($_POST['warehouse'])) $_POST['warehouse'] = 0;
//                
//                $mod->addMod($this->param['product_id'], $this->param['type'], $_POST['name'], $_POST['article'], $_POST['price'],  $_POST['price_1'], $_POST['price_2'], $_POST['price_3'], $_POST['price_4'], $_POST['price_5'], $_POST['old_price'], $_POST['warehouse']);
//            }
        }
    }

    public function addModAction() {
            echo 'ok!';
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Mod", "products");
        $mod = new Mod();
        if (isset($this->param['product_id'])) {
//            if (isset($_POST['name'])) {
//                if (!isset($_POST['name'])) $_POST['name'] = null;
//                if (!isset($_POST['article'])) $_POST['article'] = null;
//                if (!isset($_POST['price'])) $_POST['price'] = 0;
//                if (!isset($_POST['price_1'])) $_POST['price_1'] = 0;
//                if (!isset($_POST['price_2'])) $_POST['price_2'] = 0;
//                if (!isset($_POST['price_3'])) $_POST['price_3'] = 0;
//                if (!isset($_POST['price_4'])) $_POST['price_4'] = 0;
//                if (!isset($_POST['price_5'])) $_POST['price_5'] = 0;
//                if (!isset($_POST['old_price'])) $_POST['old_price'] = 0;
//                if (!isset($_POST['warehouse'])) $_POST['warehouse'] = 0;
//                
//                $mod->addMod($this->param['product_id'], $this->param['type'], $_POST['name'], $_POST['article'], $_POST['price'],  $_POST['price_1'], $_POST['price_2'], $_POST['price_3'], $_POST['price_4'], $_POST['price_5'], $_POST['old_price'], $_POST['warehouse']);
//            }
        }
    }
    
    /**
     * Ajax-добавление модов 
     */
    public function mod_addAction() {
        
        Lavra_Loader::LoadClass("Currency");
        $currency = new Currency();
        $this->currency = $currency->getCurrencies();
    }

}

