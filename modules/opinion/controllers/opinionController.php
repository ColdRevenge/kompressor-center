<?php



class opinionController extends Controller {

    public function addAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Opinion", "opinion");
        $opinion = new Opinion();

        if (isset($_POST['submit'])) {
            if (!isset($_POST['is_active'])) $_POST['is_active'] = 0;
            if (!isset($this->param['edit_id'])) { //Если добавление
                $opinion->add(mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']), $_POST['name'], $_POST['profession'], $_POST['text'], 0, 0, $_POST['is_active']);
                $this->redirect($registry->admin_url . "opinion/1/");
            } else { //Если редактирование
                $opinion->edit($this->param['edit_id'], mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']), $_POST['name'], $_POST['profession'], $_POST['text'], 0, 0, $_POST['is_active']);
                $this->redirect($registry->admin_url . "opinion/2/");
            }
        }
        if (isset($this->param['edit_id'])) { //Если редактирование
            $edit = $opinion->getQuestion($this->param['edit_id']);
            $_POST['name'] = $edit->name;
            $_POST['profession'] = $edit->profession;
            $_POST['text'] = $edit->text;
            $_POST['is_active'] = $edit->is_active;
            $this->edit_id = $this->param['edit_id'];


            $date = getdate($edit->date);
            $_POST['day'] = $date['mday'];

            $_POST['month'] = $date['mon'];
            $_POST['year'] = $date['year'];
        } else {
            $date = getdate();
            $_POST['day'] = $date['mday'];
            $_POST['month'] = $date['mon'];
            $_POST['year'] = $date['year'];
        }
        //Подгрузка даты
        $this->date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['year'] . "/" . $_POST['month'] . "/" . $_POST['day'] . "/");
    }

    public function setIsActiveAction () {
        $registry = Registry::getInstance();
        if (isset($this->param['is_active'])) {
            Lavra_Loader::LoadModels("Opinion", "opinion");
            $opinion = new Opinion();
            $opinion->setActive($this->param['id'], $this->param['is_active']);
        }
        $this->redirect($registry->admin_url . "opinion/2/");
    }

    public function admin_opinionAction() {
        $registry = Registry::getInstance();

        Lavra_Loader::LoadModels("Opinion", "opinion");
        $opinion = new Opinion();

        if (isset($this->param['message_id'])) {
            switch ($this->param['message_id']) {
                case 1:
                    $this->setMessage("Страница успешно добавленна!");
                    break;
                case 2:
                    $this->setMessage("Успешно сохранено");
                    break;
                case 3:
                    if ($this->param['del_id']) { // Удаление страницы
                        $this->setMessage("Страница успешно удалена");
                        $opinion->del($this->param['del_id']);
                    }
                    break;
            }
        }
        $this->questions = $opinion->getQuestions();
    }

    public function site_opinionAction() {
        Lavra_Loader::LoadClass("Defence");
        Lavra_Loader::LoadModels("Opinion", "opinion");
        $opinion = new Opinion();
        if (isset($_POST['send']) && isset($_POST['name'])) {
            $_POST['name'] = iconv("utf8", "cp1251", $_POST['name']);
            $_POST['text'] = iconv("utf8", "cp1251", $_POST['text']);
            if (!isset($_POST['profession'])) $_POST['profession'] = null;
            $_POST['profession'] = iconv("utf8", "cp1251", $_POST['profession']);

            if ($opinion->add(time(), $_POST['name'], $_POST['profession'], $_POST['text'], 0, 0, 0)) {
                $this->setMessage('Сообщение успешно отправленно!');
            } else {
                $this->setError('При отправке сообщения возникли ошибки. Попробуйте отправить сообщение чуть позже. Если ошибка будет повторяться, сообщите пожалуйста на <a href="info@ox2.ru">info@ox2.ru</a>');
            }
        }


        $this->opinions = $opinion->getActiveOpinion();
    }

}

