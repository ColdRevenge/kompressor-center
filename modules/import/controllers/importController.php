<?php

class importController extends Controller {

    public function fullAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels("Import", "import");
        Lavra_Loader::LoadClass("Uploader");
        $import = new Import();
        $upload = new Uploader($registry->import_dir);

        try {
            if ($upload->isUpload()) {
                $upload->addAllowType('csv');
                $upload->setPrefix(date('Y.m.d_' . rand(0, 100) . '_'));
                $upload->isConvertLatinName(true);
                $file = $upload->upload();
                /**
                 * Перекодировка файла из UTF-8 в  cp-1251 
                 */
                $string = file_get_contents($registry->import_dir . $file);
                if (Application::isUtf8($string)) { //Если UTF-8, то конвертим
                    $fp = fopen($registry->import_dir . $file, 'w');
                    fwrite($fp, ($string));
                    fclose($fp);
                }

                $import->fullImport($registry->import_dir . $file);
                $this->setMessage("Прайс успешно загружен!");
            }
        } catch (Exception $ex) {
            $this->setError($ex->getMessage());
        }
    }

    /**
     * Добавление прайс листов 
     */
    public function listAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Uploader");
        Lavra_Loader::LoadClass("Application");
        Lavra_Loader::LoadModels("Import", "import");
        $import = new Import();
        if (isset($_GET['del_file'])) {
            $file = $import->getFilesId($_GET['del_file']);
            if (isset($file->id)) {
                $import->delFileId($file->id);
                if (file_exists($registry->import_dir . $file->file)) {
                    unlink($registry->import_dir . $file->file);
                }
                $this->setMessage("Прайс успешно удален!");
            }
        }

        if (!isset($this->param['category_id'])) {
            $this->param['category_id'] = 0;
        }
        $registry->category_id = $this->param['category_id'];
        $this->category_tree_list_0 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/tree_list/0/3/");


        if (isset($this->param['message_id']) && $this->param['message_id'] == 1) {
            $this->setMessage('Импорт успешно зевершен!');
        }
        try {
            $upload = new Uploader($registry->import_dir);
            if ($upload->isUpload()) {
                $upload->addAllowType('csv');
                $upload->setPrefix(date('Y.m.d_' . rand(0, 100) . '_'));
                $upload->isConvertLatinName(true);
                $file = $upload->upload();

                $import->addImportFile($file, $this->param['category_id']);
                /**
                 * Перекодировка файла из UTF-8 в  cp-1251 
                 */
                $string = Application::cp1251_to_uft8(file_get_contents($registry->import_dir . $file));
                if (Application::isUtf8($string)) { //Если UTF-8, то конвертим
                    $fp = fopen($registry->import_dir . $file, 'w');
                    fwrite($fp, ($string));
                    fclose($fp);
                }
                $this->setMessage("Прайс успешно загружен!");
            }
        } catch (Exception $e) {
            $this->setError($e->getMessage());
        }

        $this->files = $import->getFiles($this->param['category_id']);
//        $files_scan = scandir($registry->import_dir);
//
//        $files = array();
//        foreach ($files_scan as $key => $value) {
//            if (is_file($registry->import_dir . $value)) {
//                $files[] = $value;
//            }
//        }
        Lavra_Loader::LoadClass("Currency");
        $currency = new Currency();
        $this->currency = $currency->getCurrencies();
        $this->menu = $registry->menu;
    }

    /**
     * Удалить функцию, только для Тинко
     */
    public function setCharParam() {
        $registry = Registry::getInstance();
        $db = $registry->db;
        $query = $db->prepare('SELECT * FROM `characteristic_value` WHERE  `characteristic_id` = 135');
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_OBJ);
        foreach ($result as $key => $value) {

            $value->name = str_replace('…', '...', $value->name);
            if (mb_strpos($value->name, '..') !== false) {
                $name_arr = explode('..', $value->name);
//                echo $value->id . '<br/>';
//                print_r($name_arr);
//                ;
//                echo '<br/><br/>';
                if (isset($name_arr[0]) && isset($name_arr[1])) {
                    $start = trim($name_arr[0], ' .+°');
                    $end = trim($name_arr[1], ' .+°');
                    $query = $db->prepare('UPDATE characteristic_value SET is_param_1=:is_param_1, is_param_2=:is_param_2 WHERE id=:id');
                    $query->bindParam('is_param_1', $start, PDO::PARAM_INT, 11);
                    $query->bindParam('is_param_2', $end, PDO::PARAM_INT, 11);
                    $query->bindParam('id', $value->id, PDO::PARAM_INT, 11);
                    $query->execute();
                }
            }
        }
    }

    /**
     * Импорт 
     */
    public function importAction() {
        $registry = Registry::getInstance();
        $this->setting_general = $registry->setting;
        setlocale(LC_ALL, 'ru_RU.CP1251');
        Lavra_Loader::LoadModels("Import", "import");

        $registry->category_id = $this->param['category_id'];
        if (isset($this->param['file_id'])) {
            Lavra_Loader::LoadClass("Currency");
            $currency = new Currency();
            if (!isset($_POST['currency_id'])) { //Если валюты нет, берем ту, что по-умолчанию
                $curr = $currency->getDefaultCurrency();
                if (isset($curr->id)) {
                    $_POST['currency_id'] = $curr->id;
                } else
                    $_POST['currency_id'] = 1;
            }
            $this->category_tree_list_0 = Lavra_Loader::getLoadModule("category", $registry->admin_pseudo_dir . "category/tree_list/0/3/");

            $import = new Import();
            if (isset($this->param['file_id'])) {

                Lavra_Loader::LoadModels("Characteristics", "characteristics");
                $characteristic = new Characteristics();
                $this->characteristics = $characteristic->getCharacteristics($this->param['category_id'], 1, 'name ASC', $registry->shop_type);

                $file = $import->getFilesId($this->param['file_id']);
                if (isset($file->id)) {

                    if (file_exists($registry->import_dir . $file->file)) {
                        $handle = fopen($registry->import_dir . $file->file, "r");

                        $array_line = array();
                        $array_line_full = array();
                        $count = 0;
                        //(isset($_POST['delimiter']) ? trim($_POST['delimiter']) : ";")
                        while (($line = fgetcsv($handle, 0, ';')) !== FALSE) {
                            if ($count < $registry->count_show_line) {
                                $array_line[] = $line; //Для вывода в шаблон
                            }
                            $array_line_full[] = $line; //Для обновления

                            $count++;
                        }

                        if (!count($array_line))
                            $array_line = $array_line_full; //Если маленький прайс, меньше $count, то выводим все
                        fclose($handle);
                        $this->fields = $registry->fields;
                        $this->array_line = $array_line;


                        $import = new Import();

                        if (isset($_POST['import_go'])) { //Непосредственное импортирование
                            $_POST['is_import_images'] = (isset($_POST['is_import_images']) ? $_POST['is_import_images'] : 0); //Если стоит галка обновляем картинки
                            if ($import->setProducts($_POST['field'], $array_line_full, $this->param['category_id'], $_POST['is_import_images'])) {
                                $this->setMessage('Импорт успешно зевершен!');
                                $this->setCharParam();
                                $this->_setBasketPrice();
                            } else {
//                        $this->setError("Ошибки при импорте");
                            }
//                            $this->redirect($this->admin_url . 'import/1/');
                        } elseif (isset($_POST['save_config'])) { //Сохранение настроек
                            $import->updateSetting($_POST['field'], $this->param['category_id']);
                            $this->setMessage('Успешно сохранено!!');
                        }
                        $this->setting = $import->getSetting($this->param['category_id']);
                    } else
                        $this->setError("Не найден csv-файл");
                }
            }
        } else
            $this->setError("Не выбран csv-файл");

        $this->menu = $registry->menu;
    }

    /**
     * Функция обновляет цены в корзинах
     */
    private function _setBasketPrice() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `basket` SET price = (SELECT price FROM product_mod WHERE product_mod.is_delete=0 && product_mod.product_id=basket.product_id ) WHERE 1 ");
        $query->execute();
    }

    public function priceAction() {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadClass("Uploader");
        $upload = new Uploader($registry->import_dir);

        try {
            if ($upload->isUpload()) {
                $upload->addAllowType('xlsx');
                $upload->addAllowType('xls');
                $upload->setPrefix(date('Y.m.d_' . rand(0, 100) . '_'));
                $upload->isConvertLatinName(true);
                $file = $upload->upload();
                require_once $registry->base_dir . 'lib/PHPExcel/PHPExcel/IOFactory.php';
                $objPHPExcel = PHPExcel_IOFactory::load($registry->import_dir . $file);

                foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
                    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
                    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
                    for ($row = 1; $row <= $highestRow; ++ $row) {
                        $article = $worksheet->getCellByColumnAndRow(0, $row);
                        $price = (float) $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        if ($price > 0) {
                            $query = $registry->db->prepare('UPDATE product_mod SET `price` = ? WHERE `article` = ?');
                            $query->execute(array($price, $article));
                        }
                    }
                }

                unlink($registry->import_dir . $file);
                $this->setMessage("Цены успешно обновлены!");
            }
        } catch (Exception $ex) {
            $this->setError($ex->getMessage());
        }
    }

}
