<?php
class setting_productsController extends Controller {
    private $_count_image_setting = 2;

    public function productsAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Uploader");
        Lavra_Loader::LoadClass("ProductSetting");
        $setting = new ProductSetting();

        if (isset ($this->param['message_id'])) {
            switch ($this->param['message_id']) {
                case 3:
                    $setting->delWaterImage($this->param['del_id'], $registry->dinst_dir);
                    $this->setError("Водяной знак успешно удален");
                    break;
            }
        }



        if (isset ($_POST['submit'])) {
            for ($i = 1; $i <= $this->_count_image_setting; $i++) {
                try {
                    $upload = new Uploader($registry->dinst_dir, 'water_file_'.$i);
                    $upload->isConvertLatinName(true);
                    $water_file = $upload->upload();
                    if (!empty ($water_file)) {
                        $setting->setWaterImageSetting($i, $water_file);
                        $this->{"water_file_$i"} = $water_file;
                    }
                }
                catch (Exception $e) {
                    $getSetting = $setting->getImageSettingId($i);
                    $this->{"water_file_$i"} = $getSetting->water_file;
                }

                $setting->setImageSetting($i, $_POST['width_'.$i], $_POST['height_'.$i], $_POST['pos_top_'.$i], $_POST['pos_bottom_'.$i], $_POST['pos_left_'.$i], $_POST['pos_right_'.$i]);
                $water_file = null;
            }
            $this->setMessage("Успешно сохранено");
        }
        else {
            for ($i = 1; $i <= $this->_count_image_setting; $i++) {
                $getSetting = $setting->getImageSettingId($i);
                $_POST['width_'.$i] = $getSetting->width;
                $_POST['height_'.$i] = $getSetting->height;
                $_POST['text_'.$i] = $getSetting->text;
                $this->{"water_file_$i"} = $getSetting->water_file;
                $_POST['pos_top_'.$i] = $getSetting->pos_top;
                $_POST['pos_bottom_'.$i] = $getSetting->pos_bottom;
                $_POST['pos_left_'.$i] = $getSetting->pos_left;
                $_POST['pos_right_'.$i] = $getSetting->pos_right;
            }
        }
    }
}