<?php

/**
 * Контроллер отвечает за работу со временем
 */
class timeController extends Controller {

    public function get_dateAction() {
        if (isset($this->param['is_profile']) && $this->param['is_profile'] == '1') {
            $this->year = date("Y") - 2; //Максимальный год
            $this->start_year = 1930;
        } else {
            $this->year = date("Y") + 3; //Максимальный год
            $this->start_year = 1990;
        }
        Lavra_Loader::LoadClass('Application');
        $this->months = Application::getMonths();

        if (isset($this->param['day']) && isset($this->param['month']) && isset($this->param['year'])) {
            $current_date = getdate(mktime(0, 0, 0, $this->param['month'], $this->param['day'], $this->param['year']));
        } else {
            $current_date = getdate();
        }

        if (!isset($this->param['month']))
            $this->param['month'] = $current_date['mon'];
        if (!isset($this->param['day']))
            $this->param['day'] = $current_date['mday'];
        if (!isset($this->param['year']))
            $this->param['year'] = $current_date['year'];
        $this->count_days = date("t", $current_date[0]) + 1;

        $this->current_day = $this->param['day'];
        $this->current_month = $this->param['month'] - 1;
        $this->current_year = $this->param['year'];

        if (isset($this->param['name_prefix']))
            $this->prefix = $this->param['name_prefix']; //Префикс к имени
    }

}
