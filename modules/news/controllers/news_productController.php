<?php

class news_productController extends Controller {

    public function listAction() {
        $registry = Registry::getInstance();
        if (isset($this->param['news_id'])) {
            Lavra_Loader::LoadModels("NewsProduct", "news");
            $news_product = new NewsProduct();
            if (isset($_POST['product_id'])) {
                if (isset($_POST['is_product_id']) && $_POST['is_product_id'] == 1) {
                    $news_product->add($this->param['news_id'], $_POST['product_id']);
                } else {
                    $news_product->del($this->param['news_id'], $_POST['product_id']);
                }
            }
            $this->selected_news = $news_product->getSelectedCheckbox($this->param['news_id']);

            $this->news_id = $this->param['news_id'];
            Lavra_Loader::LoadClass("Category");
            $category = new Category();

            if (!isset($this->param['category_id']) || $this->param['category_id'] == 0) {
                $get_category = $category->getCategory(0, $registry->shop_type);
                if (isset($get_category[0]) && isset($get_category[0][0])) {
                    $this->param['category_id'] = $get_category[0][0]->id;
                }
            }

            if (isset($this->param['category_id'])) {

                $category_list = $category->getCategoryId($this->param['category_id']);

                if (isset($category_list->id)) {
                    $this->category_name = $category_list->name;
                    $this->root_category_id = $category_list->parent_id;
                    $registry->category_id = $this->category_id = $category_list->id;
                    $registry->root_category_id = $this->root_category_id; //Выделяем разделы меню
                }


                $registry->category_id = $this->category_id = $this->param['category_id']; //Выделяем разделы меню

                Lavra_Loader::LoadModels("Products", "products");
                $products = new Products();
                $get_product = $products->getAdminProducts($this->param['category_id'], 1, 1, 0, 5000, $registry->shop_type);

                $images_products = array();
                foreach ($get_product['result'] as $key => $value) {
                    $images_products[$key] = $products->getImages($value->id);
                }
                $this->products = $get_product['result'];
                $this->product_images = $images_products;
            }
            $this->catalog = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/tree_list/0/5/" . $this->param['news_id'] . '/');
        }
    }

}
