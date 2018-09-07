<?php

/**
 * Класс для работы с БД, в частности получения дампов
 *
 * В качестве параметра передается массив состоящий из названий таблиц, для которых должен делаться дамп
 *
 * @example
  $sync = new DumpDB(array("action","news","pages","poll_main","poll_topics","service_cat","service_price"));

  //Цикл по всем таблицам для которых нужен дамп
  foreach ($sync->getTables() as $table_name)
  {
  mysql_query("USE site"); //Выбираем таблицу для которой нужно сделать дамп
  $DumpSQL = $sync->getDumpSQL($table_name); //записываем дамп в $DumpSQL
  }
 */
class Backup {

    /**
     * Возвращает таблички
     */
    private function _getTables() {
        $registry = Registry::getInstance();
        $query_tables = $registry->db->query('SHOW TABLES');
        return $query_tables->fetchAll(PDO::FETCH_NUM);
    }

    public function getDampSQL() {
        $registry = Registry::getInstance();
        $result_tables = $this->_getTables(); //Получаем таблички

        $backup_db = null; //Главнай результат
        foreach ($result_tables as $row_table) { //Обходим все таблицы
            $table = $row_table[0]; //Название текущей таблицы

            if ($table != 'counter' && $table != 'counter_hit' && $table != 'backups') { // Статистикой не засоряем ))
                $query = $registry->db->query("SELECT * FROM `$table`");
                $result = $query->fetchAll(PDO::FETCH_OBJ);

                if (count($result)) { //Если табличка не пустая
                    $_keys = array(); //Ключи для постороения шапки запроса
                    $prepare_string = null;
                    foreach ($result as $key => $value) {
                        $query_string = null;
                        $column_string = null;
                        foreach ($value as $key_2 => $value_2) { //Обходим запрос
                            $query_string .= '"' . addslashes($value_2) . '",';
                            $column_string .= "`$key_2`,";
                        }
                        $prepare_string .= "(" . trim($query_string, " ,") . "),";
                    }

                    $backup_db .= "TRUNCATE `$table`;\n\rINSERT INTO `$table` (" . rtrim($column_string, ",") . ") VALUES " . rtrim($prepare_string, ",") . ";\n\r";
                }
            }
        }
        return $backup_db;
    }

    /**
     * Восстановление файлов
     */
    public function recoveryFiles($file) {
//        set_time_limit(0);
        ini_set("display_errors", "off");
        error_reporting(0);
        $registry = Registry::getInstance();
//        include_once($registry->lib_dir . 'pclzip.lib.php'); //Подключаем библиотеку
//        $archive = new PclZip($file); //Указываем файл,который нужно разархивировать
//        if ($archive->extract() == 0) {//Идёт разархивирование
//            die("Error: " . $archive->errorInfo(true)); //Если есть ошибка,то выводим сообщение об ошибке
//        }
        //создаем новый объект ZipArchive
        $zip = new ZipArchive;
//пытаемся открыть архив
//если архив открывается, переменная $res принимает значение TRUE
//если открыть не получится, то переменной передается код ошибки
        $res = $zip->open($file);
        /* проверка на возможность открытия архива:
          обратите внимание, что проверка идет через оператор идентичности '=== TRUE',
          т.е. если переменная будет равна 0 (нулю), тест не будет пройден
         */
        if ($res === TRUE) {
//обозначаем папку, в которую будет производится разархивирование
//если папка несуществует, она будет создана
            $zip->extractTo($registry->base_dir);
//закрываем работу с архивом
            $zip->close();
//если архив НЕ открылся
        } else {
            echo 'Не получилось из-за ошибки #' . $res; // где $res - код ошибки
        }
    }

    /**
     * SQL - Дамп
     * @param <type> $name
     */
    public function backupSQL($name) {
        $registry = Registry::getInstance();
        /**
         * Метод включить там где не работает команда system
         * Он работает нормально на сайтах где товара меньше 5000-1000 штук.
         */
        if ($registry->is_system_backup == false) {
            $fp = fopen($registry->base_dir . "backups/" . $name, 'w');
            fwrite($fp, $this->getDampSQL());
            fclose($fp);
        } else {
            $command = "mysqldump -u" . $registry->db_login . " -p" . $registry->db_password . " -h" . $registry->db_host . " " . $registry->db_name . " > " . $registry->base_dir . "backups/" . $name;
            system($command);
        }
    }

    /**
     * Выполняет SQL-запрос
     * @param <type> $damp 
     */
    public function execSQL($file) {
        $registry = Registry::getInstance();

        if ($registry->is_system_backup == false) {
            $damp = file_get_contents($file);
            $exp = explode("TRUNCATE ", $damp);

            foreach ($exp as $key => $value) {
                if (!empty($value)) { //Разбивка запроса, с целью обхода лимита в 1mb
                    $registry->db->query("TRUNCATE " . $value);
                }
            }
        } else {
            system("mysql -u " . $registry->db_login . " --password=" . $registry->db_password . " " . $registry->db_name . " < '" . $file . "'");
        }
    }

    /**
     * дамп файлов
     * @param <type> $name
     */
    public function backupFiles($name) {
        set_time_limit(0);
        $registry = Registry::getInstance();
        include_once($registry->lib_dir . 'pclzip.lib.php'); //Подключаем библиотеку
        $archive = new PclZip($registry->base_dir . "backups/" . $name); //Указываем название будущего архива (можно использовать любое расширение)
//        $v_list = $archive->create($registry->image_dir . ',' . $registry->base_dir . 'data/,' . $registry->files_dir); //Указываем файлы и папки,которые нужно заархивировать
        $v_list = $archive->create('images/,data/,files/'); //Указываем файлы и папки,которые нужно заархивировать

        /**
         *
         *
         * $registry->image_dir,
          $registry->files_dir,
          $registry->base_dir . 'data/'
         *
         */
        if ($v_list == 0) {
            die("Error : " . $archive->errorInfo(true)); //Если произошла ошибка,выводим сообщение об ошибке
        }
    }

    /**
     * Полная копия сайта
     */
    public function backupFullSite() {
        
    }

    public function addBackup($sql, $file) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO backups (`sql`, `files`)
		VALUES (:sql, :files)");
        $query->bindParam(":sql", $sql, PDO::PARAM_STR, 255);
        $query->bindParam(":files", $file, PDO::PARAM_STR, 255);
        $query->execute();
        return $registry->db->lastInsertId();
    }

    public function getBackups() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `backups` ORDER BY `created` DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getBackupId($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `backups` WHERE id=:id");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
