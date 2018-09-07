<?php

/*
 * Класс содержащий смешанные функции для группы сайтов
 */

class MultiLalipop {
    /**
     * Настройки картинок
     * @param type $id
     * @return type
     */
    public function getImageLadySettingId($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `setting_product_images_lady` WHERE (is_delete = 0 && id=:id)");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
