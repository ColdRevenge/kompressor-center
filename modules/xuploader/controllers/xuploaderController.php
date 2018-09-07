<?php

class xuploaderController extends Controller {

    public function xuploaderAction() {
        Lavra_Loader::LoadModels("FileUploader", "xuploader");
        $file = new FileUploader();

        $registry = Registry::getInstance();
        if (isset($this->param['del_id'])) {
            $del_file = $file->getFileId($this->param['del_id']);
            unlink($registry->dinst_dir . $del_file->file);

            $file->del($this->param['del_id']);
        }

        //Настройки вывода текстовых полей/форм
        if (isset($registry->is_name) && $registry->is_name == 1)
            $this->is_name = 1;
        else
            $this->is_name = 0;
        if (isset($registry->is_desc) && $registry->is_desc == 1)
            $this->is_desc = 1;
        else
            $this->is_desc = 0;


        $this->files = $file->getFiles($registry->type);
        $this->dinst_dir = $registry->files_dir;
        $this->dinst_url = $registry->files_url;
        $this->template = $registry->template . '.tpl';
    }

    /**
     * Заливка файлов
     */
    public function uploadAction() {
        $registry = Registry::getInstance();
        try {
            Lavra_Loader::LoadClass("Uploader");
            Lavra_Loader::LoadClass("Images");
            Lavra_Loader::LoadModels("FileUploader", "xuploader");
            $file = new FileUploader();
            $images = new Images();

            $all_files = $file->getFiles($registry->type);
            foreach ($all_files as $key => $value) {
                $file->del($value->id);
                unlink($registry->dinst_dir . $value->file);
            }

            $upload = new Uploader($registry->dinst_dir);
            $upload->setPrefix($registry->prefix);
            $upload->setMaxSize($registry->max_size);
            $upload->isConvertLatinName(true);
            $file_name = $upload->upload();

            if (!isset($_POST['name']))
                $_POST['name'] = null;
            if (!isset($_POST['desc']))
                $_POST['desc'] = null;

            if ($images->isImage($registry->dinst_dir . $file_name)) {
                $is_image = 1;
            } else {
                $is_image = 0;
            }

            $file->add($file_name, $upload->getSize(), $_POST['name'], $_POST['desc'], $is_image, 0, $registry->type);

            if (isset($registry->resizes) && isset($registry->resizes[0])) { //Если необходимо изменение размеров фотографии
                $this->_ReSize();
            }

            $this->out = "<script type='text/javascript'>window.parent.document.getElementById('load_file').innerHTML=''; AjaxQueryParentFrame('file_list', '" . $this->MyURL . "list/');</script>";
        } catch (Exception $e) {
            $this->out = "<script type='text/javascript'>window.parent.document.getElementById('load_file').innerHTML='Произошла ошибка: " . $e->getMessage() . "';</script>";
        }
    }

    private function _ReSize() {
        
    }

}
