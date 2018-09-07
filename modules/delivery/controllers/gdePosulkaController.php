<?php

class gdePosulkaController extends Controller {

    public function getAction() {
        if (isset($this->param['post_code']) && $this->param['order_id']) {
            Lavra_Loader::LoadModels('gdePosulka', 'delivery');
            $gdePosulka = new gdePosulka();
            $result = $gdePosulka->getPosulka($this->param['post_code'], $this->param['order_id']);
            $this->list = $result;
        }
    }



    public function archiveAction() {
        if (isset($this->param['post_code']) && $this->param['order_id']) {
            Lavra_Loader::LoadModels('gdePosulka', 'delivery');
            $gdePosulka = new gdePosulka();
            $gdePosulka->call('archiveTracking', array('tracking' => array(
                    "tracking_number" => $this->param['post_code'],
                    "courier_slug" => "russian-post",
                )), 1);
        }
    }

}
