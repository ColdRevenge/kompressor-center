<?php

class metroController extends Controller {

    public function listAction() {



        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Metro", "metro");
        $metro = new Metro();


        if (isset($this->param['add'])) {
            $this->list_edit = 1;
            if (isset($this->param['edit_stantion_id'])) {

                if (isset($_POST['name'])) {
                    $metro->updateStantion($_POST['name'], $this->param['edit_stantion_id']);
                    header("location: /xadmin/metro/4/");
                }

                $edit = $metro->getStantionId($this->param['edit_stantion_id']);
                if (isset($edit)) {
                    $_POST['name'] = $edit->name;
                }
            } else {

                if (isset($_POST['name'])) {

                    if ($metro->isStantions($_POST['name']) == false) {
                        $metro->addStantion($_POST['name']);
                        header("location: /xadmin/metro/1/");
                    } else {
                        header("location: /xadmin/metro/2/");
                    }
                }
            }
        }


        $this->metro = $metro->getStantions();

        if (isset($this->param['del_stantion_id'])) {
            $metro->delStantion($this->param['del_stantion_id']);
            header("location: /xadmin/metro/3/");
        }

        if (isset($this->param['message'])) {
            switch ($this->param['message']) {
                case 1:
                    $this->setMessage("Станция успешно добавленна!");
                    break;
                case 2:
                    $this->setMessage("Станция существует!");
                    break;
                case 3:
                    $this->setMessage("Станция удалена!");
                    break;
                case 4:
                    $this->setMessage("Станция обновлена!");
                    break;
            }
        }
    }

}
