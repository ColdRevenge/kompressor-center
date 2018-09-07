в lib.js
и в routes прописать маршрут для аякса
function favorites(type, object_id, action) {
    if (action === 1) {
        AjaxRequestAsync('favorites_block', base_url + 'favorites/add/' + type + '/' + object_id + '/');
    }
    else {
        AjaxRequestAsync('favorites_block', base_url + 'favorites/del/' + type + '/' + object_id + '/');


    }
    AjaxRequestAsync('count_favorites', base_url + 'favorites/count/1/');
}<?php

class favoritesController extends Controller {

    public function addAction() {
        Lavra_Loader::LoadModels("Favorites", "favorites");
        if (isset($this->param['object_id']) && isset($this->param['type'])) {
            $fav = new Favorites();
            $fav->add($this->param['object_id'], $this->param['type']);
            $this->is_active = 1;
        }
    }

    public function delAction() {
        Lavra_Loader::LoadModels("Favorites", "favorites");
        if (isset($this->param['object_id']) && isset($this->param['type'])) {
            $fav = new Favorites();
            $fav->delFavorite($this->param['object_id'], $this->param['type']);
            $this->is_active = 0;
        }
    }

    public function getAction() {
        Lavra_Loader::LoadModels("Favorites", "favorites");
        if (isset($this->param['object_id']) && isset($this->param['type'])) {
            $fav = new Favorites();
            if ($fav->isFavorite($this->param['object_id'], $this->param['type'])) {
                $this->is_active = 1;
            } else {
                $this->is_active = 0;
            }
        }
    }

    public function getCountAction() {
        Lavra_Loader::LoadModels("Favorites", "favorites");
        if (isset($this->param['type'])) {
            $fav = new Favorites();
            echo "(".$fav->isFavorites($this->param['type']).")";
        }
    }

    public function listAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Favorites", "favorites");
        $fav = new Favorites();
        Lavra_Loader::LoadModels("Products", "products");
        $products = new Products();
        if (!isset($this->param['type'])) {
            $this->param['type'] = 1;
        }
        $this->products = ($fav->getFavoritesProducts($this->param['type']));

        $images_products = array();
        foreach ($this->products as $key => $value) {
            $images_products[$key] = $products->getImages($value->id);
        }
        $this->product_images = $images_products;
        $this->views->template_dir = $registry->modules_dir . 'catalog/templates/';
        $this->is_favorite = 1;
        $this->content = $this->views->fetch($registry->modules_dir . 'catalog/templates/catalog.tpl');
    }

}
