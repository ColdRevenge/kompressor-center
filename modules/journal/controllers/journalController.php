<?php

class journalController extends Controller {

    public function journalAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Journal", "journal");
        $this->model = new Journal();
        Lavra_Loader::LoadClass("Application");
        $app = new Application();
        $this->months = $app->getMonths();

        $this->list = $this->model->getList();
    }

    public function lookAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Journal", "journal");
        $this->model = new Journal();
        Lavra_Loader::LoadClass("Application");
        $app = new Application();
        $this->months = $app->getMonths();

        $this->journal = $this->model->findByPk($this->param['id']);
        $registry->head_title = $this->journal->meta_title ?: $this->journal->title;
        $registry->head_desc = $this->journal->meta_description ?: $registry->head_title;
        $registry->head_key = $this->journal->meta_keywords ?: $registry->head_title;
    }

    public function addAction() {
        Lavra_Loader::LoadModels("Journal", "journal");
        $this->model = new Journal();
        $this->is_menu_add = 1;
        $this->data = new stdClass();
        
        if ($_POST) {
            $this->model->add($_POST);
            return $this->redirect($this->MyURL . "list/1/");
        }

        $registry = Registry::getInstance();
    }

    public function editAction() {
        Lavra_Loader::LoadModels("Journal", "journal");
        $this->model = new Journal();
        $this->is_menu_add = 1;
        
        if ( ! $this->data = $this->model->findByPk($this->param['id'])) {
            return $this->redirect($this->MyURL . "list/5/");
        }

        if ($_POST) {
            $this->model->edit($_POST, $this->param['id']);
            return $this->redirect($this->MyURL . "list/1/");
        }

        foreach ($this->data as $key => $value) {
            $_POST[$key] = $value;
        }
    }

    public function deleteAction() {
        Lavra_Loader::LoadModels("Journal", "journal");
        $this->model = new Journal();

        if ( ! $this->data = $this->model->findByPk($this->param['id'])) {
            return $this->redirect($this->MyURL . "list/5/");
        }

        $this->model->delete($this->param['id']);
        return $this->redirect($this->MyURL . "list/3/");
    }

    public function listAction() {
        $registry = Registry::getInstance();
        $this->_message();
        Lavra_Loader::LoadModels("Journal", "journal");
        $this->model = new Journal();

        $this->list = $this->model->getList();
    }

    private function _message() {
        if (isset($this->param['message'])) {
            switch ($this->param['message']) {
                case 1: $this->setMessage("Журнал успешно добавлен!"); break;
                case 2: $this->setMessage("Успешно сохранено!"); break;
                case 3: $this->setMessage("Журнал успешно удален"); break;
                case 5: $this->setMessage("Журнал не найден"); break;
            }
        }
    }

}
