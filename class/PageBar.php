<?php
/**
 *@example
 * Controller:
 if (!isset ($this->param['page'])) $this->param['page'] = 0;
 else $this->param['page'] = (int)$this->param['page'];

 //Поиск публикаций
 $find_publ = new FindPubl();
 $find_publ->setLimit($this->_count_publ_in_page, $this->param['page']*10);
 if (isset ($this->param['year'])) { //если поиск идет по году
 $this->find_publ = $find_publ->getPublYear(2004, 1); //Поиск по годам
 }
 elseif(isset ($this->param['category']) && !isset ($this->param['child_category'])) { //Все фильмы в заданой категории
 $this->find_publ = $find_publ->getPublAll($this->_category_id);
 }
 elseif (isset ($this->param['child_category'])) { //если поиск по жанру
 $this->find_publ = $find_publ->getPublCategory($this->_category_id); //Все фильмы в заданой под категории
 $this->base_url = $registry->base_url."/".$this->param['category']."/".$this->param['child_category'].'/';
 }

 $count_publ = $find_publ->getLastCountQuery(); //Всего публикаций

 Lavra_Loader::LoadClass("PageBar");
 $pagebar = new PageBar($this->param['page'], $count_publ, 10, $this->_count_publ_in_page);
 $start = $pagebar->getStartPageBar();
 $end = $pagebar->getEndPageBar();

 $this->start = $start;
 $this->end = $end;
 $this->current_page = $pagebar->getCurrentPage();
 * Template
 * {*}Вывод страниц current_page{*}
 {section start=$start loop=$end name="num_page"}
 {if $smarty.section.num_page.index == $current_page}
 <a href="{$base_url}{$smarty.section.num_page.index}/" style="color:red;"><b>{$smarty.section.num_page.index}</b></a>
 {else}
 <a href="{$base_url}{$smarty.section.num_page.index}/" style="color: black">{$smarty.section.num_page.index}</a>
 {/if}
 {/section}
 */
class PageBar {
    private $_current_page, $_count_page, $_cols_on_bar;

    /**
     *
     * @param <type> $current_page - текущая страница
     * @param <type> $count_publ - кол-во публикаций
     * @param <type> $cols_on_bar - страниц на баре
     * @param <type> $rows_on_page  - записей на странице
     */
    public function  __construct($current_page, $count_publ, $cols_on_bar = 5, $rows_on_page = 10) {
        $this->_current_page = $current_page;
        $this->_count_page = ceil($count_publ/$rows_on_page); //Считаем кол-во страниц из публикаций
        $this->_cols_on_bar = $cols_on_bar;
    }

    public function getStartPageBar() {

        $left_page_on_bar = ceil($this->_cols_on_bar / 2); //Кол-во страниц с левой стороны
        //echo ($this->_current_page - ($this->_cols_on_bar - ($this->_count_page - $this->_current_page)));
        if ($this->_count_page <= $this->_cols_on_bar) { //Если общее число страниц меньше чем должно быть на баре
            return 1;
        }
        elseif ($this->_current_page + $left_page_on_bar > $this->_count_page) { //Если текущая страница упирается в кол-во страниц, немного меняем отступ с лева
            return ($this->_current_page - ($this->_cols_on_bar - ($this->_count_page - $this->_current_page))-1);
        }
        elseif ($this->_current_page - $left_page_on_bar < 1) { //Если текущая страница упирается в начало, немного меняем отступ с лева
            return 1;
        }
        elseif ($this->_current_page + $left_page_on_bar == $this->_count_page) {
            return ($this->_current_page - ($this->_cols_on_bar - ($this->_count_page - $this->_current_page)))-1;
        }
        else {
            return $this->_current_page - $left_page_on_bar;
        }
    }

    public function getEndPageBar() {
        $right_page_on_bar = ceil($this->_cols_on_bar / 2); //Кол-во страниц с правой стороны
        if ($this->_count_page <= $this->_cols_on_bar) { //Если общее число страниц меньше чем должно быть на баре
            return $this->_count_page;
        }
        elseif ($this->_current_page + $right_page_on_bar >= $this->_count_page) { //Если текущая страница упирается в кол-во страниц, немного меняем отступ с права
            return $this->_current_page + ($this->_count_page - $this->_current_page);
        }
        elseif ($this->_current_page - $right_page_on_bar < 1) { //Если текущая страница упирается в начало, немного меняем отступ с права
            return (($this->_current_page - $right_page_on_bar)*-1)+$right_page_on_bar + $this->_current_page+1;
        }
        else {
            return $this->_current_page + $right_page_on_bar+1;
        }

    }
    /**
     * Всего страниц 
     * @return <integer>
     */
    public function getCountPage() {
        return $this->_count_page;
    }

    public function getCurrentPage() {
        return $this->_current_page;
    }

    public function getLastPage() {
        return $this->_count_page;
    }
}

?>
