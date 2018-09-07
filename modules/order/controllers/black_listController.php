<?php

class black_listController extends Controller {

    public function BlackListAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("BlackList", "order");
        $black_list = new BlackList();
        $this->black_list = $black_list->getBlackListAll(0);
        if (isset($_GET['edit_id'])) {
            $this->get_black_list = $black_list->getBlackListId($_GET['edit_id']);
            if (isset($_POST['fio'])) {
                $black_list->setBlackList($_GET['edit_id'], $_POST['fio'], $_POST['email'], $_POST['phone'], $_POST['comment']);
                $this->redirect($registry->admin_url . 'order/black-list/list/?success=1');
            }
        }
        if (isset($_GET['is_add'])) {
            if (isset($_POST['fio'])) {
                $black_list->addBlackList(0, $_POST['fio'], $_POST['email'], $_POST['phone'], $_POST['comment']);
                $this->redirect($registry->admin_url . 'order/black-list/list/?success=1');
            }
        }
        if (isset($_GET['del_id'])) {
            $black_list->delBlackListId($_GET['del_id']);
            $this->redirect($registry->admin_url . 'order/black-list/list/?success=2');
        }
        if (isset($_GET['success'])) {
            switch ($_GET['success']) {
                case 1:
                    $this->setMessage('Успешно сохранено');
                    break;
                case 2:
                    $this->setMessage('Успешно удалено');
                    break;
                case 3:
                    $this->setMessage('Успешно заблокирован');
                    break;
            }
        }
    }

    public function addBlackListAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Order", "order");
        $order = new Order();
        Lavra_Loader::LoadModels("BlackList", "order");
        $black_list = new BlackList();
        if (isset($this->param['order_id'])) {
            $get_order = $order->getOrderId($this->param['order_id']);
            if (isset($get_order->id)) {
                $_phone = $get_order->phone = trim(ltrim($get_order->phone, ' 8'));
                $_email = trim($get_order->email);
                $get_black_list = $black_list->getBlackList($_email, $_phone);
                if (!isset($get_black_list->id)) { //Если пользователя нет в черном списке
                    if (isset($_POST['is_block'])) {
                        if ($_POST['is_block'] == '1') {
                            $black_list->addBlackList($get_order->user_id, $get_order->fio, $_email, $_phone, $_POST['comment']);
                            $this->redirect($registry->admin_url . 'order/black-list/' . $get_order->id . '/?is_modal=1&success=1');
                        }
                    }
                } else {
                    $this->is_black_list = 1;
                    if (isset($_POST['is_block'])) {
                        if ($_POST['is_block'] == '0') {
                            $black_list->delBlackList($_email, $_phone);
                            $this->redirect($registry->admin_url . 'order/black-list/' . $get_order->id . '/?is_modal=1&success=2');
                        }
                    }
                }
                $this->get_black_list = $get_black_list;
                $this->get_order = $get_order;
            }
            if (isset($_GET['success']) && $_GET['success'] == '1') {
                $this->setMessage('Пользователь успешно добавлен в черный список!');
                echo "
    <script type=\"text/javascript\">
        window.parent.document.getElementById('tbody_order_" . $this->param['order_id'] . "').style.color  = 'red'
    </script>";
            }
            if (isset($_GET['success']) && $_GET['success'] == '2') {
                $this->setMessage('Пользователь успешно удален из черного списка!');
                echo "
    <script type=\"text/javascript\">
        window.parent.document.getElementById('tbody_order_" . $this->param['order_id'] . "').style.color  = 'black'
    </script>";
            }
        }
    }

}
