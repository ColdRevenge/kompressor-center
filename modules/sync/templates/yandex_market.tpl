<div class="block">
    {include file="_menu_sync.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <h1>Яндекс-Маркет - YML</h1>
        <div style="margin: 20px; padding: 20px; background-color: white;border: 1px solid #CCCCCC;">
            Файл для Яндекс.Маркета обновлен {$is_change|date_format:"%d.%m.%Y %H:%M"}<br/><br/>
            Скачать YML файл  - <a href="{$url}market/yandex{if $shop == 'lady'}_lady{elseif $shop == 'sumka'}_sumka{elseif $shop == 'platok'}_platok{/if}.xml" target="_blank">{$url}market/yandex{if $shop == 'lady'}_lady{elseif $shop == 'sumka'}_sumka{elseif $shop == 'platok'}_platok{/if}.xml</a> - <b>{$products_in_xml.url|@count} продуктов</b> (<a href="javascript:void(0)" onclick="Show('xml_in_products')">посмотреть</a>)

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
                <div style="padding: 2px 0px; margin-left: 0px">
                    <label class="p-check"><input type="checkbox" onchange="jQuery(this).parent().parent().parent().find('input[type=checkbox]').attr('checked', this.checked);" ><em>&nbsp;</em><span>Выделить все</span></label>
                </div>
                {include file='tree_category_product.tpl' id=0 tree=$category inc='tree_category_product.tpl' level=0}
            </div>
            <h2>Настройки</h2>
            <div style="margin-left: 30px;">
                Стоимость доставки<span class="asterix">*</span>: <input type="text" name="delivery_yandex_market" maxlength="11" value="{$set->delivery_yandex_market|default:0}" style="width: 70px;" /> руб. <br/>
                <label class="p-check"><input type="checkbox" value="1" name="is_warehouse"  checked="checked" id="is_warehouse_label" style="vertical-align: middle;" /><em>&nbsp;</em><span>Не экспортировать товары с нулевым остатком на складе</span></label>
            </div>

            <br/>
            <button>Экспортировать товары</button>
        </form>
    </div>
</div>