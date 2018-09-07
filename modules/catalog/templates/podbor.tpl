<div class="filters">
    <div class="filters__tabs">
        <ul class="filters-tabs">
            <li class="filters-tabs__item {if $open_category_id == 8 || ! in_array($open_category_id, array(9, 43, 10, 21, 16))}_active{/if}">
                <a href="#filter-8" class="filters-tabs__link js-filters-tabs-link">
                    <img class="filters-tabs__img" src="/assets/img/tmp/filters/1.png" alt="" />
                    Компрессоры
                </a>
            </li>
            <li class="filters-tabs__item {if $open_category_id == 9}_active{/if}">
                <a href="#filter-9" class="filters-tabs__link js-filters-tabs-link">
                    <img class="filters-tabs__img" src="/assets/img/tmp/filters/2.png" alt="" />
                    Пневмоинструмент
                </a>
            </li>
            <li class="filters-tabs__item {if $open_category_id == 43}_active{/if}">
                <a href="#filter-43" class="filters-tabs__link js-filters-tabs-link">
                    <img class="filters-tabs__img" src="/assets/img/tmp/filters/3.png" alt="" />
                    Осушители
                </a>
            </li>
            <li class="filters-tabs__item {if $open_category_id == 10}_active{/if}">
                <a href="#filter-10" class="filters-tabs__link js-filters-tabs-link">
                    <img class="filters-tabs__img" src="/assets/img/tmp/filters/4.png" alt="" />
                    Ресивер
                </a>
            </li>
            <li class="filters-tabs__item {if $open_category_id == 21}_active{/if}">
                <a href="#filter-21" class="filters-tabs__link js-filters-tabs-link">
                    <img class="filters-tabs__img" src="/assets/img/tmp/filters/5.png" alt="" />
                    Фильтры
                </a>
            </li>
            <li class="filters-tabs__item {if $open_category_id == 16}_active{/if}">
                <a href="#filter-16" class="filters-tabs__link js-filters-tabs-link">
                    <img class="filters-tabs__img" src="/assets/img/tmp/filters/6.png" alt="" />
                    Шланги
                </a>
            </li>
        </ul><!-- /.filters-tabs -->
        <div class="filters-tabs__mobile">
            <a class="filters-tabs__mobile-menu" href="#"><span class="sprite -arrow-down"></span></a>
            <ul class="filters-tabs__mobile-content"></ul>
        </div>
    </div><!-- /.filters__tabs -->
    <div class="filters__content filters-content">
        <div id="filter-8" class="filters-content__block {if $open_category_id == 8 || ! in_array($open_category_id, array(9, 43, 10, 21, 16))}_active{/if}">
            {include file=$base_dir|cat:"modules/catalog/templates/podbor_detailed.tpl" category_id=8}
        </div>
        <div id="filter-9" class="filters-content__block {if $open_category_id == 9}_active{/if}">
            {include file=$base_dir|cat:"modules/catalog/templates/podbor_detailed.tpl" category_id=9}
        </div>
        <div id="filter-43" class="filters-content__block {if $open_category_id == 43}_active{/if}">
            {include file=$base_dir|cat:"modules/catalog/templates/podbor_detailed.tpl" category_id=43}
        </div>
        <div id="filter-10" class="filters-content__block {if $open_category_id == 10}_active{/if}">
            {include file=$base_dir|cat:"modules/catalog/templates/podbor_detailed.tpl" category_id=10}
        </div>
        <div id="filter-21" class="filters-content__block {if $open_category_id == 21}_active{/if}">
            {include file=$base_dir|cat:"modules/catalog/templates/podbor_detailed.tpl" category_id=21}
        </div>
        <div id="filter-16" class="filters-content__block {if $open_category_id == 16}_active{/if}">
            {include file=$base_dir|cat:"modules/catalog/templates/podbor_detailed.tpl" category_id=16}
        </div>
    </div><!-- /.filters__content -->
</div><!-- /.filters -->