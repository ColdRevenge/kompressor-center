<?php

class counterController extends Controller {

    private function _date_form($start_time = 7776000) {
        $date = getdate(time() - $start_time); //дата начала на 90 дней меньше текущей
        if (!isset($_POST['start_day'])) $_POST['start_day'] = $date['mday'];
        if (!isset($_POST['start_month'])) $_POST['start_month'] = $date['mon'];
        if (!isset($_POST['start_year'])) $_POST['start_year'] = $date['year'];

        $end_date = getdate();
        if (!isset($_POST['end_day'])) $_POST['end_day'] = $end_date['mday'];
        if (!isset($_POST['end_month'])) $_POST['end_month'] = $end_date['mon'];
        if (!isset($_POST['end_year'])) $_POST['end_year'] = $end_date['year'];

        $this->start_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['start_year'] . "/" . $_POST['start_month'] . "/" . $_POST['start_day'] . "/start_");
        $this->end_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['end_year'] . "/" . $_POST['end_month'] . "/" . $_POST['end_day'] . "/end_");
    }

    public function user_browser($string) {
        $agent = $string['param'];
        preg_match("/(MSIE|Opera|Firefox|Chrome|Version|Opera Mini|Netscape|Konqueror|SeaMonkey|Camino|Minefield|Iceweasel|K-Meleon|Maxthon)(?:\/| )([0-9.]+)/", $agent, $browser_info); // регулярное выражение, которое позволяет отпределить 90% браузеров
        list(, $browser, $version) = $browser_info; // получаем данные из массива в переменную
        if (preg_match("/Opera ([0-9.]+)/i", $agent, $opera)) return 'Opera ' . $opera[1]; // определение _очень_старых_ версий Оперы (до 8.50), при желании можно убрать
 if ($browser == 'MSIE') { // если браузер определён как IE
            preg_match("/(Maxthon|Avant Browser|MyIE2)/i", $agent, $ie); // проверяем, не разработка ли это на основе IE
            if ($ie) return $ie[1] . ' based on IE ' . $version; // если да, то возвращаем сообщение об этом
 return 'IE ' . $version; // иначе просто возвращаем IE и номер версии
        }
        if ($browser == 'Firefox') { // если браузер определён как Firefox
            preg_match("/(Flock|Navigator|Epiphany)\/([0-9.]+)/", $agent, $ff); // проверяем, не разработка ли это на основе Firefox
            if ($ff) return $ff[1] . ' ' . $ff[2]; // если да, то выводим номер и версию









        }
        if ($browser == 'Opera' && $version == '9.80') return 'Opera ' . mb_substr($agent, -5); // если браузер определён как Opera 9.80, берём версию Оперы из конца строки
 if ($browser == 'Version') return 'Safari ' . $version; // определяем Сафари
 if (!$browser && mb_strpos($agent, 'Gecko')) return 'Browser based on Gecko'; // для неопознанных браузеров проверяем, если они на движке Gecko, и возращаем сообщение об этом
 return $browser . ' ' . $version; // для всех остальных возвращаем браузер и версию
    }

    public function counterAction() {
        Lavra_Loader::LoadModels("Counter", "counter");
        $counter = new Counter();
        $counter->countOnLine(); //Считаем кол-во он-лайн
        $this->online = $counter->getOnLine(); //Вывод кол-во он-лайн
        $this->count_users = $counter->getCountUsers();

        $counter->count();

        $current_date = getdate();

        $this->count_day = $counter->getCountDate(mktime(0, 0, 0, $current_date['mon'], $current_date['mday'], $current_date['year']), mktime(0, 0, 0, $current_date['mon'], $current_date['mday'], $current_date['year']));
        $this->count_month = $counter->getCountDate(mktime(0, 0, 0, $current_date['mon'], 1, $current_date['year']), mktime(0, 0, 0, $current_date['mon'], date("t"), $current_date['year']));
        $this->count_all = $counter->getCountAll();
    }

    public function statAction() {
        $registry = Registry::getInstance();
        $this->_date_form();
        Lavra_Loader::LoadClass("Counter");
        $counter = new Counter();

        if (isset($this->param['date'])) {
            $this->stats = $counter->getFullStat($this->param['date']);
            $this->date = $this->param['date'];
            $this->register_object("covert", $this);
        } else {
            $this->stats = $counter->getShortStat(mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']), mktime(0, 0, 0, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']));
        }
        $this->menu = $registry->menu;
    }

    /**
     * Вывод инфы о кликах, которые совершал пользователь
     */
    public function counter_hitsAction() {

        Lavra_Loader::LoadClass("Counter");
        $counter = new Counter();
        if (isset ($this->param['counter_id'])) {
            $this->hits = $counter->getHits($this->param['counter_id']);
        }
    }

    public function otherAction() {
        $this->_date_form(31536000);
        Lavra_Loader::LoadClass("Counter");
        $counter = new Counter();
        $this->referer_stat = $counter->getRefererStat(mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']), mktime(0, 0, 0, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']));
        $this->page_stat = $counter->getPageStat(mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']), mktime(0, 0, 0, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']));
    }

    

    public function other_refererAction() {
        $this->_date_form(31536000);
        Lavra_Loader::LoadClass("Counter");
        $counter = new Counter();
        if (isset($this->param['domain'])) {
            $this->referer_stat = $counter->getReferer($this->param['domain'], mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']), mktime(0, 0, 0, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']));
            $this->domain = $this->param['domain'];
        }
        $this->register_object("covert", $this);
    }

    public function other_selfAction() {
        $this->_date_form(31536000);
        Lavra_Loader::LoadClass("Counter");
        $counter = new Counter();
        if (isset($_GET['self'])) {
            $this->referer_stat = $counter->getPage($_GET['self'], mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']), mktime(0, 0, 0, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']));
            $this->self = $_GET['self'];
        }
        $this->register_object("covert", $this);
    }

    public function queryAction() {
        $registry = Registry::getInstance();
        $this->_date_form(31536000);
        Lavra_Loader::LoadClass("Counter");
        $counter = new Counter();
        $this->yandex = $this->_joinQuery($counter->getQueryStat(mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']), mktime(0, 0, 0, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']), 'yandex', '[\?\&]text\='));
        $this->google = $this->_joinQuery($counter->getQueryStat(mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']), mktime(0, 0, 0, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']), 'google', '[\?\&]q\='));
        $this->rambler = $this->_joinQuery($counter->getQueryStat(mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']), mktime(0, 0, 0, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']), 'rambler', '[\?\&]query\='));
        $this->mail = $this->_joinQuery($counter->getQueryStat(mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']), mktime(0, 0, 0, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']), 'mail.ru', '[\?\&]q\='));
        //$this->qip = $counter->getQueryStat(mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']), mktime(0, 0, 0, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']), 'qip.ru', '[\?\&]query\=');

        $this->all_query_sum = $this->yandex['all_sum'] + $this->google['all_sum'] + $this->rambler['all_sum'] + $this->mail['all_sum'] + $this->qip['all_sum'];
        $this->menu = $registry->menu;
    }

    private function _joinQuery(Array $query) {
        $new_google = array();
        $query_arr = array();
        $new_google['all_sum'] = 0;
        if (isset($query['query'])) {
            foreach ($query['query'] as $key => $value) { //Проходим первый
                $array_pos = array_search(trim($query['query'][$key]), $query_arr);
                if ($array_pos === false) {
                    $new_google['query'][$key] = trim($query['query'][$key]);
                    $new_google['count'][$key] = $query['count'][$key];
                    $new_google['base_query'][$key] = $query['base_query'][$key];
                    $new_google['all_sum'] += $new_google['count'][$key];
                    $query_arr[$key] = $query['query'][$key];
                } else {
                    $new_google['count'][$array_pos] += $query['count'][$key];
                    $new_google['all_sum'] += $query['count'][$key];
                }
            }
            return $new_google;
        }
    }

    public function drawStatAction() {
        echo get_include_path();
        echo "<pre>";
        print_r($_SERVER);
        echo "</pre>";
    }

}

