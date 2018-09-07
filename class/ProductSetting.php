<?php
class ProductSetting {
    public function setImageSetting($id, $width, $height, $pos_top = 0, $pos_bottom = 0, $pos_left = 0, $pos_right = 0) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `setting_product_images` SET `width`=:width, `height`=:height, 
           pos_top=:pos_top, pos_bottom=:pos_bottom, pos_left=:pos_left, pos_right=:pos_right
	WHERE is_delete=0 && id=:id");
        $query->bindParam(":width", $width, PDO::PARAM_INT, 11);
        $query->bindParam(":height", $height, PDO::PARAM_INT, 11);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->bindParam(":pos_top", $pos_top, PDO::PARAM_INT, 11);
        $query->bindParam(":pos_bottom", $pos_bottom, PDO::PARAM_INT, 11);
        $query->bindParam(":pos_left", $pos_left, PDO::PARAM_INT, 11);
        $query->bindParam(":pos_right", $pos_right, PDO::PARAM_INT, 11);
        return $query->execute();
    }

    public function setWaterImageSetting($id, $water_file) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("UPDATE `setting_product_images` SET
            water_file=:water_file WHERE is_delete=0 && id=:id LIMIT 1");
        $query->bindParam(":water_file", $water_file, PDO::PARAM_STR, 255);
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        return $query->execute();
    }

    public function getImageSettingId($id) {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `setting_product_images` WHERE (is_delete = 0 && id=:id)");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getImageSettings() {
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT * FROM `setting_product_images` WHERE (is_delete = 0)");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function delWaterImage($id, $path_water_file) {
        $registry = Registry::getInstance();

        $del_image = $this->getImageSettingId($id);
        $query = $registry->db->prepare("UPDATE `setting_product_images` SET water_file='' WHERE is_delete=0 && id=:id LIMIT 1");
        $query->bindParam(":id", $id, PDO::PARAM_INT, 11);
        $query->execute();
        
        if (file_exists($path_water_file.$del_image->water_file)) {
            unlink($path_water_file.$del_image->water_file);
        }
    }
}