<?php

class reportsController extends Controller {

    public function productsAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Reports", "reports");
        $reports = new Reports();

        $this->_reportInit();

        $this->start_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['start_year'] . "/" . $_POST['start_month'] . "/" . $_POST['start_day'] . "/start_");
        $this->end_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['end_year'] . "/" . $_POST['end_month'] . "/" . $_POST['end_day'] . "/end_");

        $this->start_date = $start_date = mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']);
        $this->end_date = $end_date = mktime(23, 59, 59, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']);

        $this->reports = $reports->getReportProducts($start_date, $end_date);
        $this->menu = $registry->menu;
    }

    public function productsDetailedAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Reports", "reports");

        if (isset($this->param['start_date'])) {
            $reports = new Reports();
            $this->reports = $reports->getReportProductsDetailed($this->param['manager_id'], $this->param['start_date'], $this->param['end_date']);
        }
    }

    public function managerAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Reports", "reports");
        $reports = new Reports();

        $this->_reportInit();

        $this->start_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['start_year'] . "/" . $_POST['start_month'] . "/" . $_POST['start_day'] . "/start_");
        $this->end_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['end_year'] . "/" . $_POST['end_month'] . "/" . $_POST['end_day'] . "/end_");

        $start_date = mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']);
        $end_date = mktime(23, 59, 59, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']);

        $this->managers = $reports->getReportManager($start_date, $end_date);
        $this->menu = $registry->menu;
    }

    private function _reportInit() {
        Lavra_Loader::LoadModels("Reports", "reports");
        Lavra_Loader::LoadClass('Application');
        $app = new Application();
        $this->months = $app->getMonths(1);
        $this->months_format = $app->getMonths(0);

        $start_time = 0; //дата начала на 90 дней меньше текущей
        $date = getdate(time() - $start_time);
        if (!isset($_POST['start_day'])) {
            $_POST['start_day'] = (isset($_SESSION['report_complected_day']) ? $_SESSION['report_complected_day'] : 1);
            $_POST['start_month'] = (isset($_SESSION['report_complected_month']) ? $_SESSION['report_complected_month'] : 1);
            $_POST['start_year'] = (isset($_SESSION['report_complected_year']) ? $_SESSION['report_complected_year'] : 1);
        } else {
            $_SESSION['report_complected_day'] = $_POST['start_day'];
            $_SESSION['report_complected_month'] = $_POST['start_month'];
            $_SESSION['report_complected_year'] = $_POST['start_year'];
        }

        $end_date = getdate();
        if (!isset($_POST['end_day'])) {
            $_POST['end_day'] = $end_date['mday'];
            $_POST['end_month'] = $end_date['mon'];
            $_POST['end_year'] = $end_date['year'];
        }

        $this->start_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['start_year'] . "/" . $_POST['start_month'] . "/" . $_POST['start_day'] . "/start_");
        $this->end_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['end_year'] . "/" . $_POST['end_month'] . "/" . $_POST['end_day'] . "/end_");
    }

    public function completedBrandAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Brand", "brand");
        $brand = new Brand();
        $get_brands = $brand->getBrands(-1);
        $brand_names = array();
        foreach ($get_brands as $key => $value) {
            $brand_names[$value->id] = $value->name;
        }
        $this->brand_names = $brand_names;

        $this->_reportInit();
        $reports = new Reports();
        $this->start_date = $start_date = mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']);
        $this->end_date = $end_date = mktime(23, 59, 59, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']);
        $this->reports = $reports->getOrderCompletedBrandGroup($start_date, $end_date);
        $this->is_brand = 1;
        $this->colors = array('', '#0072ff', '#caffb8', '#FB2B32', '#FDC678', '#7B4CA5', '#36a500', '#e57e7e', '#00ccff', '#e57ece', '#8400b5', '#f6ff00', '#0a5800', '#ff00a2', '#30ff00', '#989898',
            '#b8e7ff', '#ffba00', '#72ffc5', '#370093', '#930000', '#ffdcdc', '#5eb7ae', '#b79b5e', '#00aec3');
    }

    public function completedCategoryAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadClass("Category");
        $category = new Category();
        $get_category = $category->getCategoryAll(0, -1);

        $category_names = array();
        foreach ($get_category as $key => $value) {
            $category_names[$value->id] = $value->name;
        }
        $this->category_names = $category_names;

        $this->_reportInit();
        $reports = new Reports();
        $this->start_date = $start_date = mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']);
        $this->end_date = $end_date = mktime(23, 59, 59, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']);
        $this->reports = $reports->getOrderCompletedCategoryGroup($start_date, $end_date);
        $this->is_category = 1;
        $this->colors = array('', '#0072ff', '#caffb8', '#FB2B32', '#FDC678', '#7B4CA5', '#36a500', '#e57e7e', '#00ccff', '#e57ece', '#8400b5', '#f6ff00', '#0a5800', '#ff00a2', '#30ff00', '#989898',
            '#b8e7ff', '#ffba00', '#72ffc5', '#370093', '#930000', '#ffdcdc', '#5eb7ae', '#b79b5e', '#00aec3');
    }

    public function completedCategoryDetailedAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Reports", "reports");

        if (isset($this->param['start_date'])) {
            $reports = new Reports();
            $this->orders = $reports->getOrderCompletedCategory($this->param['category_id'], $this->param['start_date'], $this->param['end_date']);
        }
    }

    public function completedAction() {
        $registry = Registry::getInstance();
        $this->_reportInit();
        $reports = new Reports();

        $start_date = mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']);
        $end_date = mktime(23, 59, 59, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']);

        $count_day = floor(($end_date - $start_date) / 60 / 60 / 24);
        $date_type = 1; //По месяцам

        if ($count_day <= date('t', $start_date)) { //По дням
            $date_type = 0;
        } elseif ($count_day > 365) { //По годам
            $date_type = 1;
        }

        $this->date_type = $date_type;
        $this->reports = $reports->getOrderCompletedGroup($date_type, $start_date, $end_date);

        $this->is_complected = 1;
    }

    public function completedBrandDetailedAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Reports", "reports");

        if (isset($this->param['start_date'])) {
            $reports = new Reports();
            $this->orders = $reports->getOrderCompletedBrand($this->param['brand_id'], $this->param['start_date'], $this->param['end_date']);
        }
    }

    public function completedDetailedAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Reports", "reports");

        if (isset($this->param['day'])) {
            $reports = new Reports();

            if ($this->param['month'] == 0) { //По годам
                $start_date = mktime(0, 0, 0, 1, 1, $this->param['year']);
                $end_date = mktime(23, 59, 59, 12, 31, $this->param['year']);
            } elseif ($this->param['day'] == 0) { //По месяцам
                $start_date = mktime(0, 0, 0, ($this->param['month'] + 1), 1, $this->param['year']);
                $_last_day = date('t', mktime(0, 0, 0, ($this->param['month'] + 1), 1, $this->param['year']));
                $end_date = mktime(23, 59, 59, ($this->param['month'] + 1), $_last_day, $this->param['year']);
            } else { //По дням
                $start_date = mktime(0, 0, 0, ($this->param['month'] + 1), $this->param['day'], $this->param['year']);
                $end_date = mktime(23, 59, 59, ($this->param['month'] + 1), $this->param['day'], $this->param['year']);
            }
            $this->orders = $reports->getHistoryOrders($start_date, $end_date, 0, 3);
        }
    }

    public function history_ordersAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Order", "order");
        Lavra_Loader::LoadModels("Basket", "basket");
        Lavra_Loader::LoadModels("Reports", "reports");

        $order = new Order();
        $reports = new Reports();

        $start_time = 0; //дата начала на 90 дней меньше текущей
        $date = getdate(time() - $start_time);
        if (!isset($_POST['start_day'])) {
            $_POST['start_day'] = 1;
            $_POST['start_month'] = $date['mon'];
            $_POST['start_year'] = $date['year'];
        }

        $end_date = getdate();
        if (!isset($_POST['end_day'])) {
            $_POST['end_day'] = $end_date['mday'];
            $_POST['end_month'] = $end_date['mon'];
            $_POST['end_year'] = $end_date['year'];
        }

        $this->start_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['start_year'] . "/" . $_POST['start_month'] . "/" . $_POST['start_day'] . "/start_");
        $this->end_date_form = Lavra_Loader::getLoadModule("application", "/application/date/1/" . $_POST['end_year'] . "/" . $_POST['end_month'] . "/" . $_POST['end_day'] . "/end_");

        $start_date = mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']);
        $end_date = mktime(23, 59, 59, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']);

        if (!isset($_POST['find']))
            $_POST['find'] = '';
        if (isset($this->param['type'])) {
            $this->type = $this->param['type'];
            switch ($this->param['type']) {
                case 1:
                    $this->orders = $order->getHistoryOrders($start_date, $end_date, 0, 3);
                    $this->products = $order->getHistoryOrderProducts($_POST['find']);
                    $this->menu_type = 1;
                    break;
                case 2:
                    $this->orders = $order->getHistoryOrders($start_date, $end_date, 1, -1);
//                    print_r($this->orders);
                    $this->products = $order->getHistoryOrderProducts($_POST['find']);
                    $this->menu_type = 2;
                    $this->is_cancel = 1;
                    break;
                case 3: //Нет на складе
                    $this->products = $reports->getTopPrpducts($start_date, $end_date);
                    $this->menu_type = 3;
                    $this->is_top = 1;
                    break;
                case 4: //Нет на складе
                    $this->products = $reports->getPrpducts();
                    $this->menu_type = 4;
                    break;
            }
        }
        $this->menu = $registry->menu;
    }

    /**
     * Статистика характеристик 
     */
    public function getOrderCharAction() {
        if (isset($this->param['char_id'])) {
            $registry = Registry::getInstance();

            $this->_reportInit();
            $reports = new Reports();
            $this->start_date = $start_date = mktime(0, 0, 0, $_POST['start_month'], $_POST['start_day'], $_POST['start_year']);
            $this->end_date = $end_date = mktime(23, 59, 59, $_POST['end_month'], $_POST['end_day'], $_POST['end_year']);

            $this->is_chars = 1;
            $this->colors = array('', '#0072ff', '#caffb8', '#FB2B32', '#FDC678', '#7B4CA5', '#36a500', '#e57e7e', '#00ccff', '#e57ece', '#8400b5', '#f6ff00', '#0a5800', '#ff00a2', '#30ff00', '#989898',
                '#b8e7ff', '#ffba00', '#72ffc5', '#370093', '#930000', '#ffdcdc', '#5eb7ae', '#b79b5e', '#00aec3');


            Lavra_Loader::LoadModels("Characteristics", "characteristics");
            $char = new Characteristics();

            $get_char = $char->getCharacteristicId($this->param['char_id']);

            if (isset($get_char->id)) {
                $this->char = $get_char;

                Lavra_Loader::LoadModels("Reports", "reports");
                $reports = new Reports();
                $this->reports = $reports->getHistoryOrdersChar($this->start_date, $this->end_date, $get_char->id, 3);
            } else
                $this->setError("Характеристика не найдена");
        }
        $this->menu_type = 6;
        $this->menu = $registry->menu;
    }

    public function getOrderCharDetailedAction() {
        $registry = Registry::getInstance();
        Lavra_Loader::LoadModels("Reports", "reports");

        if (isset($this->param['start_date'])) {
            $reports = new Reports();
            $this->orders = $reports->getHistoryOrdersCharDetailed($this->param['char_id'], $this->param['start_date'], $this->param['end_date']);
        }
    }

}
