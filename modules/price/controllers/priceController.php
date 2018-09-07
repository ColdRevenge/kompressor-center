<?php


class priceController extends Controller {
    public function priceAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Price", "price");
        Lavra_Loader::LoadClass("Category");
        $price = new Price();
        $category = new Category();

        $this->root_categoryes = $category->getCategory(0, $registry->shop_type);
        $this->products = $price->getPrpducts();
        $this->root_category_id = 0;
        
        
        
        /**
         * Настройки по-умолчанию
         */
        Lavra_Loader::LoadModels('Setting', 'setting');
        $setting = new Setting();
        $set = $setting->getGeneral();
        $this->setting = $set;
        $this->footer_left = $set->footer_left;
        $this->footer_right = $set->footer_right;
    }

  
}