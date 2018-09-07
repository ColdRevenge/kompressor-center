
<script type="text/javascript">
    function getUpUrl() {

        adress = document.location.href.replace('products/list/', 'products/list/up-product/');
        adress = adress.replace('/sort/', '/');
        adress = adress.replace('/set-page/', '/');
        if (adress.indexOf('?') !== -1) {
            ret = adress + '&';
        }
        else {
            ret = adress + '?';
        }
        return ret;

    }
</script>



<div class="navigation">
    <div class="right-line" style="padding-top: 12px;">
        <form method="get" action="">
            <input type="text"  value="{$smarty.get.search}" name="search" placeholder="Поиск товара.." style="width: 150px;"> 
            <button value="Искать" class="search">Поиск</button> 
            <label class="p-check" style="padding-top: 5px;"><input type="checkbox" value="1" name="is_all" {if $smarty.session.search_is_all == 1}checked="checked" {/if}/><em>&nbsp;</em><span>Все категории</span></label>
        </form>
    </div>

    <div class="right-line">
        {*        <span>Состояние:</span>*}
        <select onchange="AjaxRequestInd('product_list', getUpUrl() + 'product_is_active=' + $(this).val(), '#product_list');" style="width: 100px;" title="Состояние">
            <option value="-1"{if $smarty.session.product_is_active == -1} selected="selected"{/if}>Все</option>
            <option value="1"{if $smarty.session.product_is_active == 1} selected="selected"{/if}>Активные</option>
            <option value="0"{if $smarty.session.product_is_active == 0} selected="selected"{/if}>Не активные</option>
        </select>
    </div>
    <div class="right-line">
        {*        <span>На складе: </span>*}
        <select onchange="AjaxRequestInd('product_list', getUpUrl() + 'product_is_warehouse=' + $(this).val(), '#product_list');" style="width: 100px;" title="На складе">
            <option value="-1"{if $smarty.session.product_is_warehouse == -1} selected="selected"{/if}>Все</option>
            <option value="1"{if $smarty.session.product_is_warehouse == 1} selected="selected"{/if}>В наличии</option>
            <option value="0"{if $smarty.session.product_is_warehouse == 0} selected="selected"{/if}>Отсутствуют</option>
        </select>
    </div>
    <div class="right-line">
        <select style="width: 70px" onchange="AjaxRequestInd('product_list', getUpUrl() + 'count_page=' + $(this).find('option:selected').val(), '#product_list');" title="Показать по">
            <option value="50" {if $smarty.session.admin_count_product == 50}selected="selected"{/if}>50</option>
            <option value="100" {if $smarty.session.admin_count_product == 100}selected="selected"{/if}>100</option>
            <option value="250" {if $smarty.session.admin_count_product == 250}selected="selected"{/if}>250</option>
            <option value="500" {if $smarty.session.admin_count_product == 500}selected="selected"{/if}>500</option>
            <option value="1000" {if $smarty.session.admin_count_product == 1000}selected="selected"{/if}>1000</option>
            <option value="1000000" {if $smarty.session.admin_count_product == 1000000}selected="selected"{/if}>Все</option>
        </select>
    </div>

    <div class="right-line" style="float: right; border: 0; margin-top: 7px;height: auto">
        {if $count_products > 1 || $smarty.session.count_product == 0}
            Страница:
            {section loop=$count_products name="page"}
                <a href="{$admin_url}products/list/set-page/0/{$category_id}/{$smarty.section.page.index}/{if $smarty.get.search}?search={$smarty.get.search}{/if}&is_all={$smarty.get.is_all|default:0}" {if $select_page == $smarty.section.page.index}class="selected_list_page"{/if}>{$smarty.section.page.iteration}</a>
            {/section}
        {/if}
    </div>
    <div class="clear">&nbsp;</div>        
</div>
<div class="clear">&nbsp;</div>

<form method="post" action="">
    <div class="small-navigation">
        {if $category_id > 0}
            <div>
                <img src="{$sys_images_url}admin/add.png" /><a href="{$MyURL}add/0/{$category_id}/{$smarty.now}/" {if !$category_id}onclick='alert("В левом меню выберите раздел")'{/if}>Добавить товар</a>
            </div>
        {/if}
        <div>
            <img src="{$sys_images_url}admin/vydel.png" />
            <span>
                С выделенными товарами: <select style="width: 250px;" name="action_product">
                    <option value="-1">Не выбрано</option>
                    <option value="-2">Удалить</option>
                    <option value="-3">Сделать активными</option>
                    <option value="-4">Сделать не активными</option>

                    <optgroup label="Перенести в раздел:">
                        {include file=$select_tree_file inc=$select_tree_file tree=$tree  id=0 current_id=0 selected_id=0}
                    </optgroup>

                    {if $shop == 'lady'}
                        <option value="-5">Перенести товары в Woman Lalipop</option>
                    {/if}
                </select>
            </span>

            <button>Сохранить</button>
        </div>
    </div>

    {if $products|@count}
        <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
            <thead>
                <tr>
                    <td valign="middle" align="center"><label class="p-check"><input type="checkbox" onclick="$('input[name^=selected_products]').attr('checked', this.checked);" /><em>&nbsp;</em></label></td>
                    <td valign="middle" align="center">№</td>
                    <td valign="middle" align="center">&nbsp;</td>
                    <td valign="middle" align="center"><a href='{$MyURL}list/sort/0/{$category_id}/name/{if $sort_order == 'asc'}desc{else}asc{/if}/'>Название</a>{if $sort_field == 'name'}<img src="{$sys_images_url}admin/arrow-{$sort_order}.png" alt="" title="" />{/if}</td>
                        {*<td valign="middle" align="center"><b>Цена: </b></td>*}
                        {*<td valign="middle" align="center" width="200"><b>Описание: </b></td>*}
                        {* <td valign="middle" align="center">В поставщики</td>
                        <td valign="middle" align="center">Новые поступ.: </td>*}
                    <td valign="middle" align="center"><a href='{$MyURL}list/sort/0/{$category_id}/price/{if $sort_order == 'asc'}desc{else}asc{/if}/'>Стоимость</a>{if $sort_field == 'price'}<img src="{$sys_images_url}admin/arrow-{$sort_order}.png" alt="" title="" />{/if} </td>
                    <td valign="middle" align="center"><a href='{$MyURL}list/sort/0/{$category_id}/is_active/{if $sort_order == 'asc'}desc{else}asc{/if}/'>Состояние</a>{if $sort_field == 'is_active'}<img src="{$sys_images_url}admin/arrow-{$sort_order}.png" alt="" title="" />{/if} </td>
                    <td valign="middle" align="center"><a href='{$MyURL}list/sort/0/{$category_id}/order/{if $sort_order == 'asc'}desc{else}asc{/if}/'>Сорт</a>{if $sort_field == 'order'}<img src="{$sys_images_url}admin/arrow-{$sort_order}.png" alt="" title="" />{/if} </td>
                    <td valign="middle" align="center" style="width: 70px;">&nbsp;</td>

                </tr>
            </thead>
            {foreach from = $products item = 'product'}
                {assign var="product_id" value=$product->id}
                {if $product->old_price}
                    {assign var="discaunt" value=$product->price*100/$product->old_price}
                    {assign var="discaunt" value=$discaunt-100}
                {else}
                    {assign var="discaunt" value=0}
                {/if}
                <tbody class="tbody"{* {if $product->is_related && $product->is_related_product}style="background-color: #feeaea"{elseif $product->is_related}style="background-color: #fcfdec"{elseif $product->is_related_product}style="background-color: #ecf4fb"{/if}*}>
                    <tr> 
                        <td valign="middle" align="center">
                            <label class="p-check"><input type="checkbox" value="1" name="selected_products[{$product->id}]" /><em>&nbsp;</em></label>
                        </td>
                        <td valign="middle" align="center">
                            {*                            {$product->id}*}
                            {counter}
                        </td>
                        <td valign="middle" align="center"><a href="{$MyURL}edit/0/{$category_id}/{$product->id}/{$product->id}/?is_modal=1{if !$product->file}#photo{/if}" rel="related" title="Быстрое редактирование товара">{if $product->file}<img src="{$gallery_url}{$product->file}" alt="" style="border: 1px solid #CCCCCC;background-color: white;">{else}Нет изображения{/if}</a>
                            {if $product->count_file}<div class="notice">({$product->count_file|default:0} фото)</div>{/if}
                        </td>
                        <td valign="middle" align="center"{* style="cursor: pointer" onclick="location.href = '{$MyURL}edit/0/{$category_id}/{$product->id}/{$product->id}/'" title="Редактировать товар"*}>
                            <a href="{$url}products/{$product->pseudo_dir}/" target="_blank" title="Показать товар на сайте">{$product->name|stripslashes}</a>
                            <div class="notice">Артикул {$product->article|stripslashes}</div>
                            {*	<div>
                            <select name="product_action[{$product->id}]">
                            <option value="0">===</option>
                            {foreach from=$content item="page" name="page"}
                            {if $smarty.foreach.page.iteration != 1}
                            <option value="{$page->id}" {if $page->id == $product->is_page_action}selected="selected"{/if}>{$page->header|stripslashes}</option>
                            {/if}
                            {/foreach}
                            </select>
                            </div>*}
                            {*  <div class="notice">Размеры: 
                            {foreach from=$product_characteristic.$product_id.2 item="size" name="size"}
                            {$size->name}{if $smarty.foreach.size.iteration != $smarty.foreach.size.total}, {/if}
                            {/foreach}</div>*}
                        </td>
                        {*           <td valign="middle" align="center">
                        {if $product->old_price}<span style="text-decoration: line-through">{$product->old_price}</span><br/><span><b style="font-size: 14px;">{$product->price}</b></span><br/><span style="font-size: 12px;" class="asterix">{$discaunt|number_format:"2"}%</span>{else}<span>{$product->price}</span>{/if}</td>*}
                        {*<td valign="middle" align="center">{$product->desc}</td>*}
                        {*    Тендеры    <td valign="middle" align="center" style="width: 100px;">
                        {assign var="product_id" value=$product->id}
                        <div id="in_tender_{$product->id}">
                        {if !$products_tender.$product_id} 
                        {if $tenders|@count}
                        <form method="post" id="tender_form_{$product->id}">
                        <select name="in_suppliers" id="in_suppliers_{$product->id}"  style="width: 80px;font-size: 12px;vertical-align: middle">
                        <option value="0">Выбрать</option>
                        {foreach from=$tenders item="tender" name="tender"}
                        <option value="{$tender->id}">{$tender->name|stripslashes}</option>
                        {/foreach}    
                        </select>
                        <a href="javascript:void(0)" onclick="AjaxFormRequest('in_tender_{$product->id}', 'tender_form_{$product->id}', '{$admin_url}tenders/add/'+document.getElementById('in_suppliers_{$product->id}').options[document.getElementById('in_suppliers_{$product->id}').selectedIndex].value+'/{$product->id}/')"><img src="{$sys_images_url}save_small.png" alt="" style="vertical-align: middle" /></a>

                        </form>
                        {else}
                        <div class="notice">
                        Нет ни одного тендера. <a href="{$admin_url}tenders/">Создать тендер</a>
                        </div>
                        {/if}
                        </div>
                        {else}
                        <div class="notice">Продукт участвет в тендере <strong>&laquo;{$products_tender.$product_id->name|stripslashes}&raquo;</strong>
                        <p><a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить продукт &laquo;{$product->name|stripslashes}&raquo; из тендера &laquo;{$products_tender.$product_id->name|stripslashes}&raquo;?')) AjaxRequest('in_tender_{$product->id}',  '{$admin_url}tenders/del/{$product->id}/{$products_tender.$product_id->id}/')"><img src="{$sys_images_url}admin/del.png" alt="" style="vertical-align: middle" /></a></p>

                        {/if}
                        </div>

                        </td>*}
                        {*  <td valign="middle" align="center">{if $product->is_offer > 0}<a href="{$admin_url}offer/add/0/{$product->id}/?not_menu=1" onclick="return open_window(this.href, 600, 580, true);"><img src="{$sys_images_url}admin/edit.png" alt="Добавить" /></a>{else}<a href="{$admin_url}offer/add/0/{$product->id}/?not_menu=1" onclick="return open_window(this.href, 600, 580, true);"><img src="{$sys_images_url}admin/add.png" alt="Добавить" /></a>{/if}</td>*}
                        <td valign="middle" align="center">
                            <input type="text" name="price[{$product->id}]" value="{$product->price}" maxlength="11" style="width: 55px;text-align: center;" />
                            {if $product->max_price != $product->price && $product->max_price > 0} - {$product->max_price|number_format|replace:",":"&nbsp;"}{/if}  р. 
                            {if $product->old_price}<div style="color: red;margin-top: 4px;">{$product->old_price} руб.</div>{/if}
                            <div class="notice">{if $product->warehouse <= 5}<span style="color:red;">осталось {$product->warehouse} шт.</span>{else}осталось {$product->warehouse} шт.{/if}</div> 
                        </td>
                        <td valign="middle" align="center">{if $product->is_active == 1}<a href="{$MyURL}list/set-status/0/{$category_id}/{$product->id}/0/" title="Сделать неактивным">Активен</a>{else}<a href="{$MyURL}list/set-status/0/{$category_id}/{$product->id}/1/" title="Сделать активным">Не активен</a>{/if}
                            <div class="notice" style="cursor: default" title="Дата изменения: {$product->change|date_format:"%d.%m.%Y"}">Добавлен: {$product->created|date_format:"%d.%m.%Y"}</div>
                            <div class="notice" style="margin-top: 10px;">
                                <label class="p-check"><input type="checkbox" name="is_param_1[{$product->id}]" value="1" {if $product->is_param_1 == 1}checked="checked"{/if} id="product_param_1_{$product->id}" /><em>&nbsp;</em><span>Скидка</span></label>
                                <label class="p-check"><input type="checkbox" name="is_param_2[{$product->id}]" value="1" {if $product->is_param_2 == 1}checked="checked"{/if} id="product_param_2_{$product->id}" /><em>&nbsp;</em><span>Акция</span></label>
                                <label class="p-check"><input type="checkbox" name="is_param_3[{$product->id}]" value="1" {if $product->is_param_3 == 1}checked="checked"{/if} id="product_param_3_{$product->id}" /><em>&nbsp;</em><span>Новинка</span></label>
                                    {*                                            <input type="checkbox" name="is_param_3[{$product->id}]" value="1" {if $product->is_param_3 == 1}checked="checked"{/if} id="product_param_3_{$product->id}" /><label for="product_param_3_{$product->id}">Новинки</label>*}
                                    {*                                <label class="p-check"><input type="checkbox" name="is_param_4[{$product->id}]" value="1" {if $product->is_param_4 == 1}checked="checked"{/if} id="product_param_4_{$product->id}" /><em>&nbsp;</em><span>Лидер продаж</span></label>*}

                                <label class="p-check"><input type="checkbox" name="is_param_5[{$product->id}]" value="1" {if $product->is_param_5 == 1}checked="checked"{/if} id="product_param_5_{$product->id}" /><em>&nbsp;</em><span>Распродажа</span></label>

                                <input type="hidden" value="1" name="is_param_send[{$product->id}]" />
                            </div>
                        </td>
                        <td valign="middle" align="center"><input type="text" name="order[{$product->id}]" value="{$product->order}" maxlength="4" style="width: 30px;text-align: center;" /></td>

                        <td valign="middle" align="center">        
                            <a href="{$MyURL}edit/0/{$category_id}/{$product->id}/{$product->id}/" title="Редактировать товар"><img src="{$sys_images_url}admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                            <a href="{$admin_url}products/list/0/{$category_id}/7/?copy={$product->id}" title="Копировать товар" onclick="return (confirm('Копировать товар {$product->article|stripslashes}?') ? true : false)"><img src="{$sys_images_url}admin/copy.png" align="middle" hspace="1" alt="Редактировать" /></a>
                            <a href="javascript:void(0)" title="Удалить товар" onclick="setConfirm('Вы действительно хотите удалить товар??', '{$MyURL}list/0/{$category_id}/4/{$product->id}/');">
                                <img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" alt="Удалить товар" /></a>

                        </td>
                    </tr>
                </tbody>
            {/foreach}
            <tfoot>
                <tr>
                    <td colspan="4">

                    </td>
                    <td colspan="4" align="right" valign="middle">
                        <button>Сохранить</button>
                    </td>
                </tr>
            </tfoot>
        </table>
        {*
        <div style="clear: both; margin-top: 10px;"><div style="border: 1px solid #CCCCCC; width: 16px; height: 16px;vertical-align: middle; background-color: #e4eff9; float: left; margin-right: 4px;"></div> - Содержит сопутствующие товары</div>
        <div style="clear: both; margin-top: 10px;"><div style="border: 1px solid #CCCCCC; width: 16px; height: 16px;vertical-align: middle; background-color: #fcfdec; float: left; margin-right: 4px;"></div> - Является сопутствующим товаром</div>
        <div style="clear: both; margin-top: 10px;"><div style="border: 1px solid #CCCCCC; width: 16px; height: 16px;vertical-align: middle; background-color: #feeaea; float: left; margin-right: 4px;"></div> - Содержит и является сопутствующим товаром</div>
        *}

    {else}
        <h2>В разделе {if $category_name} - &laquo;{$category_name|stripslashes}&raquo;{/if} нет ни одного продукта. <a  href="{if $category_id > 0}{$MyURL}add/0/{$category_id}/{$smarty.now}/{else}javascript:void(0){/if}" {if !$category_id}onclick='alert("В левом меню выберите раздел")'{/if}><b>Добавить?</b></a></h2>
    {/if}
</form>