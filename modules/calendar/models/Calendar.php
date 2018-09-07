<?php

class Calendar {
    private $_year = 0, $_month = 0, $_day = 0, $_unix_time = 0;

    public function  __construct($year, $month, $day) {
        if ($month > 12) {
            $month = 1;
            $year++;
        }
        elseif ($month < 1) {
            $month = 12;
            $year--;
        }

        $this->_year = $year;
        $this->_month = $month;
        $this->_day = $day;
        $this->_unix_time = mktime(0, 0, 0, $this->_month, $this->_day, $this->_year);
    }

    /**
     * Возвращает массив дней в месяце, если = 1 то есть публикации, если 0, то нету
     */
    public function isPublDays() {
        $start_date = mktime(0, 0, 0, $this->_month, 1, $this->_year);
        $end_date = mktime(23, 59, 59, $this->_month, 31, $this->_year);
        $registry = Registry::getInstance();
        $query = $registry->db->prepare("SELECT DATE_FORMAT(FROM_UNIXTIME(date),'%d')*1 as days FROM
            publ WHERE (publ.date BETWEEN :start_date AND :end_date) && (publ.date <= UNIX_TIMESTAMP(NOW())) &&
            publ.is_visible = 1 && publ.is_active = 1 && publ.is_delete = 0");
        $query->bindParam("start_date", $start_date, PDO::PARAM_INT, 11);
        $query->bindParam("end_date", $end_date, PDO::PARAM_INT, 11);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        $return = array();
        foreach ($result as $key => $value) {
            $return[$value->days] = 1;
        }
        return $return;
    }

    /**
     * Текущий месяц
     */
    public function getCurrentMonth() {
        return $this->_month;
    }
    /**
     * Текущий день
     */
    public function getCurrentDay() {
        return $this->_day;
    }
    /**
     * Текущий год
     */
    public function getCurrentYear() {
        return $this->_year;
    }

    /**
     * Возвращет кол-во дней в месяце
     */
    public function getCountDay() {
        return date("t", $this->_unix_time);
    }

    /**
     * Возвращает порядковый номер (пн, сб..) первого дня в недели
     * 1 - пн
     * 7 - вс
     */
    public function getFirstDayWeek() {
        $day =  date("w", $this->_unix_time);
        if ($day == 0) return 7;
        else return $day;
    }


}