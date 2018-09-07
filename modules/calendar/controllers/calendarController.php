<?php

class calendarController extends Controller {
    public function calendarAction() {
        Lavra_Loader::LoadModels("Calendar","calendar");
        Lavra_Loader::LoadClass("Application");

        //Если данные календаря не забиты, делаем сегодняшнее число
        if (!isset ($this->param['year'])) $this->param['year'] = date("Y");
        if (!isset ($this->param['month'])) $this->param['month'] = date("m");
        if (!isset ($this->param['day'])) $this->param['day'] = date("d");

        $calendar = new Calendar($this->param['year'], $this->param['month'], $this->param['day']);

        $this->year = $calendar->getCurrentYear();
        $this->month = $calendar->getCurrentMonth();
        $this->day = $calendar->getCurrentDay();

        //Месяц строкой
        $months = Application::getMonths();
        $this->month_str = $months[(int)$this->month-1];

        
        $this->week_first_day = $calendar->getFirstDayWeek(); //Номер первого дня в недели
        $this->count_days = $calendar->getCountDay() + $this->week_first_day ; //Кол-во дней в месяце

        $this->is_calendar_publ = $calendar->isPublDays();

        //Узнаем кол-во строк, чтобы автоматом уменьшить высоту ячеек
        $this->count_rows = ceil(($calendar->getCountDay() + $calendar->getFirstDayWeek())/7);
    }
}

