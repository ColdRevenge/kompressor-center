<?php
/**
 * Класс для установки/чтение настроек
 */ 
class Settings {
    /**
     * Метод для изменения настройки
     * @param <type> $name - имя настройки
     * @param <type> $value - значение vachar 255
     * @param <type> $number - числовое значение
     * @param <type> $template - текст
     */
    public function set($name, $value = null, $number = null, $template = null) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE settings SET `value` = :value, `number`=:number, `template` = :template WHERE name=:name LIMIT 1");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":value", $value, PDO::PARAM_STR, 255);
        $query->bindParam(":number", $number, PDO::PARAM_INT, 11);
        $query->bindParam(":template", $template, PDO::PARAM_STR);
         $query->execute();
    }

    /**
     * Метод добавления настроек
     * @param <type> $name - имя настройки
     * @param <type> $value - значение vachar 255
     * @param <type> $number - числовое значение
     * @param <type> $template - текст
     */
    public function add($name, $value = null, $number = null, $template = null) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("INSERT INTO settings SET (name, value, number, template) VALUE (:name, :value, :number, :template)");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->bindParam(":value", $value, PDO::PARAM_STR, 255);
        $query->bindParam(":number", $number, PDO::PARAM_INT, 11);
        $query->bindParam(":template", $template, PDO::PARAM_STR);
        return $query->execute();
    }

    public function get($name) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT `value`, `number`, `template` FROM settings WHERE name=:name LIMIT 1");
        $query->bindParam(":name", $name, PDO::PARAM_STR, 255);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
}