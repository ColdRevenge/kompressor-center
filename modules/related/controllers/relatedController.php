<?php


error_reporting(E_ALL);

class relatedController extends Controller {

    public function listAction() {
        $registry = Registry::getInstance();
        if (isset($this->param['product_id'])) {
            $this->type = $this->param['type'];
            $this->product_id = $this->param['product_id'];

            Lavra_Loader::LoadModels("Related", "related");
            $related = new Related();
            if (isset($_POST['related_send']) && $_POST['related_send'] == 1) { //Сохранение
                $related = new Related();
                $related->delRelated($this->param['product_id'], $this->param['category_id'], $this->param['type']);

                if (isset($_POST['related_product_id'])) {
                    foreach ($_POST['related_product_id'] as $key => $related_id) {
                        $related->addRelatedProduct($this->param['product_id'], $related_id, $this->param['type']);
                    }
                }
            }
            Lavra_Loader::LoadClass("Category");
            $category = new Category();

            if (isset($this->param['category_id'])) {
                if ($this->param['category_id'] == 0) {
                    $get_category = $category->getCategory(0, $registry->shop_type);
                    if (isset($get_category[0]) && isset($get_category[0][0])) {
                        $this->param['category_id'] = $get_category[0][0]->id;
                    }
                }
                $category_list = $category->getCategoryId($this->param['category_id']);

                if (isset($category_list->id)) {
                    $this->category_name = $category_list->name;
                    $this->root_category_id = $category_list->parent_id;
                    $this->category_id = $category_list->id;

                    $registry->root_category_id = $this->root_category_id; //Выделяем разделы меню
                    $registry->category_id = $this->category_id; //Выделяем разделы меню
                }
            }

            if (isset($this->param['category_id'])) {
                $registry->category_id = $this->param['category_id'];

                Lavra_Loader::LoadClass("Category");
                $category = new Category();
                $cat = $category->getCategoryId($this->param['category_id']);
                if (isset($cat->id)) {
                    $registry->open_category_id = $cat->id;
                    $registry->open_category_parent_id = $cat->parent_id;
                }
            }

            if (isset($this->param['category_id'])) {
                Lavra_Loader::LoadModels("Products", "products");
                $products = new Products();
                $get_products = $products->getAdminProducts($this->param['category_id'], 1, 1, 0, 50000, $registry->shop_type);
                $this->products = $get_products['result'];
                $images_products = array();
                foreach ($this->products as $key => $value) {
                    $images_products[$key] = $products->getImages($value->id);
                }
                $this->product_images = $images_products;


                $registry->root_category_id = $this->param['category_id'];
                $registry->category_id = $this->param['category_id'];
                //Выбираем выбраное
                Lavra_Loader::LoadModels("Related", "related");
                $related = new Related();
                $product_category = ($related->getRelatedCategory($this->param['category_id'], $this->param['product_id'], $this->param['type']));
                $selected_product = array();
                foreach ($product_category as $key => $value) {
                    $selected_product[$value->related_id] = 1;
                }
                $this->selected_product = $selected_product;
            }

            if (isset($this->param['product_id'])) {
                $this->catalog = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/admin_related_list/" . $this->param['type'] . "/" . $this->param['product_id'] . '/');
            }
        }
    }

    public function getProductAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        Lavra_Loader::LoadModels("Related", "related");
        $related = new Related();
        if (isset($this->param['product_id'])) {
            $this->product_id = $this->param['product_id'];
            if (isset($this->param['category_id'])) {
                $this->category_id = $this->param['category_id'];
            }
            if (isset($this->param['type'])) {
                $this->type = $this->param['type'];
            }
            if (isset($this->param['related_id'])) { //Удаление
                $related->delRelatedId($this->param['product_id'], $this->param['related_id']);
            }

            $this->products = $related->getRelatedProducts($this->param['product_id'], $this->param['type']);
            $images_products = array();
            foreach ($this->products as $key => $value) {
                $images_products[$key] = $products->getImages($value->id);
            }
            $this->product_images = $images_products;
        }
    }

    public function getRelatedProductAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        Lavra_Loader::LoadModels("Related", "related");
        $related = new Related();
        if (isset($this->param['product_id'])) {
            $this->product_id = $this->param['product_id'];
            $this->category_id = $this->param['category_id'];
            if (isset($this->param['related_id'])) { //Удаление
                $related->delRelatedId($this->param['product_id'], $this->param['related_id']);
            }

            $this->products = $related->getProductRelated($this->param['product_id']);
            $images_products = array();
            foreach ($this->products as $key => $value) {
                $images_products[$key] = $products->getImages($value->id);
            }
            $this->product_images = $images_products;
        }
    }

}
