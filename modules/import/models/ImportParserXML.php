<?php

class ImportParserXML {

    public function standartType($dom_obj, $category_arr) {
        $registry = Registry::getInstance();
        $i = 0;
        $products = array();
        $products_size_warehouse = array();

        foreach ($dom_obj->documentElement->childNodes as $dom) {
            if ($dom->nodeType == 1 && $dom->nodeName == "shop") {
                foreach ($dom->childNodes as $offers) {
                    if ($offers->nodeType == 1 && ($offers->nodeName) == "offers") {
                        foreach ($offers->childNodes as $key => $offer) {
                            if ($offer->nodeType == 1 && ($offer->nodeName) == "offer") {
                                $i++;

                                $products[$i]['available'] = $offer->getAttribute('available');
                                foreach ($offer->childNodes as $get_offer) {
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "price") {
                                        $products[$i]['price'] = $get_offer->textContent;
                                    }
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "categoryId") {
                                        $products[$i]['categoryId'] = $get_offer->textContent;
                                        if (count($category_arr) > 0) {
                                            if (!in_array($products[$i]['categoryId'], $category_arr)) {
                                                unset($products[$i]);
                                                continue(2);
                                            }
                                        }
                                    }
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "picture") {
                                        $products[$i]['picture'][] = $get_offer->textContent;
                                    }
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "vendor") {
                                        $products[$i]['vendor'] = $get_offer->textContent;
                                    }
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "model") {
                                        $products[$i]['article'] = $get_offer->textContent;
                                    }
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "description") {
                                        $products[$i]['description'] = $get_offer->textContent;
                                    }
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "country_of_origin") {
                                        $products[$i]['param']['Страна производства'] = $get_offer->textContent;
                                    }
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "typePrefix") {
                                        $products[$i]['typePrefix'] = $get_offer->textContent;
                                    }
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "param") {
                                        //Записываем х-ки
                                        $products[$i]['param'][$get_offer->getAttribute('name')] = $get_offer->textContent;

                                        //Для Leo Ventony
                                        //Добавляем цвет для подбора, и убираем запятые
                                        if ($get_offer->getAttribute('name') == 'Цвет' || $get_offer->getAttribute('name') == 'color') {
                                            $colors = explode(',', $get_offer->textContent);
                                            $products[$i]['param']['Цвета для подбора'] = $colors;
                                            $products[$i]['param']['Цвет'] = $colors;
                                            unset($products[$i]['param']['color']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'Материал' || $get_offer->getAttribute('name') == 'material') { //Состав
                                            $products[$i]['mod_name'] = trim($get_offer->textContent);
                                            unset($products[$i]['param']['Материал']);
                                            unset($products[$i]['param']['material']);
                                        }


                                        if ($get_offer->getAttribute('name') == 'Размер' && $registry->shop_type == 2) { //Для лади лалипоп правим размеры
                                            $products[$i]['param']['Размеры'] = $get_offer->textContent;
                                            if ($products[$i]['available'] != 'false') {
                                                $products_size_warehouse[$products[$i]['article']][] = $get_offer->textContent;
                                            }
                                            unset($products[$i]['param']['Размер']);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return array('products' => $products, 'products_size_warehouse' => $products_size_warehouse);
    }

    public function leoVentoniType($dom_obj, $category_arr) {
        $registry = Registry::getInstance();
        $i = 0;
        $products = array();
        $products_size_warehouse = array();
        foreach ($dom_obj->documentElement->childNodes as $dom) {
            if ($dom->nodeType == 1 && $dom->nodeName == "shop") {
                foreach ($dom->childNodes as $offers) {
                    if ($offers->nodeType == 1 && ($offers->nodeName) == "offers") {
                        foreach ($offers->childNodes as $key => $offer) {
                            if ($offer->nodeType == 1 && ($offer->nodeName) == "offer") {
                                $i++;

                                $products[$i]['available'] = $offer->getAttribute('available');
                                foreach ($offer->childNodes as $get_offer) {
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "price") {
                                        $products[$i]['price'] = $get_offer->textContent;
                                    }
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "categoryId") {
                                        $products[$i]['categoryId'] = $get_offer->textContent;
                                        if (count($category_arr) > 0) { //Если требуется только определенные категории
                                            if (!in_array($products[$i]['categoryId'], $category_arr)) {
                                                unset($products[$i]);
                                                continue(2);
                                            }
                                        }
                                    }
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "photos") {
                                        foreach ($get_offer->childNodes as $get_offer_photo) {
                                            if ($get_offer_photo->nodeType == 1 && ($get_offer_photo->nodeName) == "photo") {
                                                $products[$i]['picture'][] = $get_offer_photo->textContent;
                                            }
                                        }
                                    }
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "name") {
                                        $products[$i]['name'] = $get_offer->textContent;
                                    }
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "html_description") {
                                        $products[$i]['description'] = $get_offer->textContent;
                                    }
                                    if ($get_offer->nodeType == 1 && ($get_offer->nodeName) == "param") {

                                        //Записываем х-ки
                                        $products[$i]['param'][$get_offer->getAttribute('name')] = $get_offer->textContent;
                                        //Для Leo Ventony
                                        //Добавляем цвет для подбора, и убираем запятые
                                        if ($get_offer->getAttribute('name') == 'color') {
                                            if (!empty($get_offer->textContent)) {
                                                $colors = explode(',', $get_offer->textContent);
                                                $products[$i]['param']['Цвет для подбора'] = $colors;
                                                $products[$i]['param']['Цвет'] = $colors;
                                            }
                                            unset($products[$i]['param']['color']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'material') { //Состав
                                            if (!empty($get_offer->textContent)) {
                                                $materials = explode(',', $get_offer->textContent);
                                                $products[$i]['param']['Материал для подбора'] = $materials;
                                                $products[$i]['param']['Материал'] = $materials;
                                            }
                                            unset($products[$i]['param']['material']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'brand') { //Производитель
                                            if (!isset($products[$i]['vendor'])) {
                                                if (!empty($get_offer->textContent)) {
                                                    $products[$i]['vendor'] = trim($get_offer->textContent);
                                                }
                                                unset($products[$i]['param']['brand']);
                                            }
                                        }
                                        if ($get_offer->getAttribute('name') == 'shirina') { //Ширина
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Ширина'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['shirina']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'vysota') { //Высота
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Высота'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['vysota']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'tolshina_glubina') { //Толищина/глубина
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Толщина/глубина'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['tolshina_glubina']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'ves') { //Вес
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Вес'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['ves']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'visota_s_ruchkami') { //Высота с ручками
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Высота с ручками'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['visota_s_ruchkami']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'razmer') { //Размер
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Размер'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['razmer']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'dlina_manjeti') { //Длина манжеты
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Длина манжеты'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['dlina_manjeti']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'obshiy_diametr') { //Общий диаметр
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Общий диаметр'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['obshiy_diametr']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'diametr_kupola') { //Длина купола
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Длина купола'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['diametr_kupola']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'mehanizm') { //Механизм
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Механизм'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['mehanizm']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'dlina_sljjennogo_zonta') { //Длина сложенного зонта
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Длина сложенного зонта'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['dlina_sljjennogo_zonta']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'kolichestvo_spitz') { //Количество спиц
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Количество спиц'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['kolichestvo_spitz']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'kolichestvo_spitz') { //Количество спиц
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Количество спиц'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['kolichestvo_spitz']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'Страна-производитель') { //Страна-производитель
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['param']['Страна производитель'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['Страна-производитель']);
                                        }
                                        if ($get_offer->getAttribute('name') == 'С 23 Артикул') { //Страна-производитель
                                            if (!empty($get_offer->textContent)) {
                                                $products[$i]['article'] = trim($get_offer->textContent);
                                            }
                                            unset($products[$i]['param']['С 23 Артикул']);
                                        }


//  +  [color] => 1
//  +  [material] => 1
//  +  [brand] => 1
//  +  [shirina] => 1
//  +  [vysota] => 1
//  +  [tolshina_glubina] => 1
//  +  [ves] => 1
//  +  [visota_s_ruchkami] => 1
//  +  [razmer] => 1
//  +  [dlina_manjeti] => 1
//  +  [obshiy_diametr] => 1
//  +  [diametr_kupola] => 1
//  +  [mehanizm] => 1
//  +  [dlina_sljjennogo_zonta] => 1
//  +  [kolichestvo_spitz] => 1
//  +  [Страна-производитель] => 1
//    [С 23 Артикул] => 1
                                    }
                                }
                                $products[$i]['picture'] = array_reverse($products[$i]['picture']);
                            }
                        }
                    }
                }
            }
        }
//        exit();
        return array('products' => $products, 'products_size_warehouse' => $products_size_warehouse);
    }

}
