<div class="block">
    {include file="_menu_sync.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <h1>Яндекс-Маркет - YML</h1>
        <div style="margin: 20px; padding: 20px; background-color: white;border: 1px solid #CCCCCC;">
            Файл для Яндекс.Маркета обновлен {$is_change|date_format:"%d.%m.%Y %H:%M"}<br/><br/>
            Скачать YML файл - <a href="{$url}market/yandex.xml" target="_blank">{$url}market/yandex.xml</a> - <b>{$products_in_xml.url|@count} продуктов</b> (<a href="javascript:void(0)" onclick="Show('xml_in_products')">посмотреть</a>)

            <div id="xml_in_products" style="display: none;">
                <ol>
                    {foreach from=$products_in_xml.url key="key" item="item"}
                        <li><a href="{$item}" target="_blank">{$products_in_xml.name.$key|stripslashes}</a></li>
                    {/foreach}
                </ol>
            </div>

        </div>
        <form method="post" action="">
            <h1>1. Выберите категории и товары</h1>
            <div style="margin-left: 30px;">
                {include file='yandex_market_category.tpl' id=0 tree=$category inc='yandex_market_category.tpl' level=0}
            </div>
            <h2>Настройки</h2>
            <div style="margin-left: 30px;">
                Стоимость доставки<span class="asterix">*</span>: <input type="text" name="delivery_yandex_market" maxlength="11" value="{$set->delivery_yandex_market|default:0}" style="width: 70px;" /> руб. <br/>
                <input type="checkbox" value="1" name="is_warehouse" id="is_warehouse_label" style="vertical-align: middle;" /> <label for="is_warehouse_label">Не экспортировать товары с нулевым остатком на складе</label>
            </div>
            
            <br/>
            <button>Экспортировать товары</button>
        </form>
        <div class="notice"><br/>
            <b>На сайте необходимо указать: </b>
            <ol>
                <li>ОГРН, наименование и юридический адрес на сайте магазина</li>
                <li>Информацию о юридическом лице</li>
                <li>Стоимость доставки в регионе</li>
            </ol>
            <p>Все данные должны совпадать с данными в партнерском кабинете яндекс маркета</p>
            <p><strong>ВНИМАНИЕ!!</strong> Требования к содержимому сайта на Яндекс маркете постоянно меняются. 
                Точную информацию смотрите в <a href="http://help.yandex.ru/partnermarket/?id=1111373#order1" target="__blank">требованиям к интернет-магазинам</a><br/>
                <br/><strong>Информация должна быть точной. Она проверяется.</strong>
                
            </p>
        </div>
    </div>
</div>