<?php

class import_paramController extends Controller {

    public function import_paramAction() {
        $registry = Registry::getInstance();
        $this->menu = $registry->menu;
        Lavra_Loader::LoadModels("ImportParam", "import_param");
        $ImportParam = new ImportParam();

        if (isset($_POST['is_param'])) {
            $ImportParam->clearProductsParam($_POST['is_param']);
            $articles = explode("\n", trim($_POST['list_param']));
            $error = null;
            $i = 0;
            foreach ($articles as $key => $article) {
                $get_product = $ImportParam->getProductArticle(trim($article));
//                echo "$article<br/>";
                if (isset($get_product->id)) {
                    $ImportParam->setProductsParam($_POST['is_param'], $get_product->id);

                    Lavra_Loader::LoadModels("Products", "products");
                    $products = new Products();
                    $products->setDesc8($get_product->id, $i);
                    $i++;
                } else {
                    $error .= "<b>" . $article . '</b>, ';
                }
            }
            if (!empty($error)) {
                $error = 'Успешно обновлено! При обвновлении не обновлены товары (артикул не найден): ' . $error;
                $this->setError($error);
            } else {
                $this->setMessage('Успешно обновлено!');
            }
        }

        $recommend = $ImportParam->getProductsParam(5);
        $out = null;
        foreach ($recommend as $value) {
            $out .= trim($value->article) . "\n";
        }
        $this->recommend = $out;


        $news = $ImportParam->getProductsParam(2);
        $out = null;
        foreach ($news as $value) {
            $out .= trim($value->article) . "\n";
        }
        $this->news = $out;


        $discount = $ImportParam->getProductsParam(3);
        $out = null;
        foreach ($discount as $value) {
            $out .= trim($value->article) . "\n";
        }
        $this->discount = $out;
    }

}
