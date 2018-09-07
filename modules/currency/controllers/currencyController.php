<?php




class currencyController extends Controller {

    public function listAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Currency");
        $currency = new Currency();

        if (isset($this->param['message_id'])) { //Вывод сообщений
            switch ($this->param['message_id']) {
                case 3:
                    if (isset($this->param['del_id'])) {
                        $currency->delCurrency($this->param['del_id']);
                        $this->setMessage("Успешно удалено!");
                    }
                    break;
                default :
                    break;
            }
        }

        if (isset($_POST['save'])) {
            if (isset($_POST['name'])) {
                if (!isset($_POST['is_default'])) $_POST['is_default'] = 0;
                foreach ($_POST['name'] as $id => $value) {
                    $_POST['name'][$id] = str_replace('"', "&quot;", $_POST['name'][$id]);
                    if (isset($_POST['exchange'][$id])) $_POST['exchange'][$id] = str_replace(",", '.', $_POST['exchange'][$id]);

                    $is_default = ($_POST['is_default'] == $id) ? 1 : 0;

                    $currency->setCurrency($id, $_POST['name'][$id], $_POST['code'][$id], $_POST['exchange'][$id], $_POST['order'][$id], $is_default);
                }
                $this->setMessage("Успешно сохраненно");
            }
        }
        $_POST['order'] = $currency->getMaxOrder();

        if (isset($_POST['add'])) {
            if (!isset($_POST['is_default'])) $_POST['is_default'] = 0;
            if (isset($_POST['exchange'])) $_POST['exchange'] = str_replace(",", '.', $_POST['exchange']);

            $currency->addCurrency($_POST['name'], $_POST['code'], $_POST['exchange'], $_POST['order'], $_POST['is_default']);
            $this->setMessage("Успешно добавленно!");
        }
        $this->currencies = $currency->getCurrencies();
    }

}

