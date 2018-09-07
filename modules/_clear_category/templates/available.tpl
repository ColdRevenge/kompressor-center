<div class="block">
    {include file="_menu_clear.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <form method="post" action="">
            <div style="margin: 5px 0 5px 0;float: left">
                <button>Обновить остатки</button>
                <input type="hidden" name="up" value="1" />
            </div>
            <div class="nav_buttons">
                <a href="{$admin_url}products/param/sort/1/"{if $param_tpl.type == 1} class="active"{/if}>Vita</a>
                <a href="{$admin_url}products/param/sort/5/"{if $param_tpl.type == 5} class="active"{/if}>Tosoco</a>
            </div>

            <div id="products_sort">
                {foreach from=$get_products.result item="product" name="sort"}
                    <div class="product_block" rel="{$smarty.foreach.sort.total-$smarty.foreach.sort.iteration}">
                        <div>
                            <div class="product_img"><img src="/images/gallery/{$product->file}" alt="" title="" /></div>
                            <div class="product_name"><a href="https://lalipop.ru/xadmin/products/edit/0/{$product->category_1_id}/{$product->id}/{$product->id}/?is_modal=1" rel="related" title="Быстрое редактирование товара">{$product->name|stripslashes}</a></div>
                            <div class="product_article">{$product->article}</div>
                        </div>
                    </div>
                {/foreach}
                <div class="clear">&nbsp;</div>
            </div>
        </form>


        <h1>Наличие товаров Vita</h1>
        {if $not_warehouse|@count}
            <div style="float: left">
                <h2>Нет на складе</h2>
                <form method="post" action="">
                    <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
                        <thead>
                            <tr>
                                <td style="text-align: center; width: 40px;">
                                    <label class="p-check">
                                        <input type="checkbox" onchange="if ($(this).attr('checked') != undefined) {
                                                    $(this).parent().parent().parent().parent().parent().find('input').attr('checked', $(this).attr('checked', 'checked'))
                                                }
                                                else {
                                                    $(this).parent().parent().parent().parent().parent().find('input').removeAttr('checked')
                                                }" /><em>&nbsp;</em>
                                    </label>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </thead>
                        {foreach from=$not_warehouse item="aviable" name="aviable"}
                            <tbody class="tbody">
                                <tr>
                                    <td style="text-align: center; width: 40px;">
                                        <label class="p-check">
                                            <input type="checkbox" name="aviable[{$aviable.id|stripslashes}]" value="{$aviable.id|stripslashes}" /><em>&nbsp;</em>
                                        </label>
                                    </td>
                                    <td><a href="http://sumka.lalipop.ru/xadmin/products/edit/0/0/{$aviable.id|stripslashes}/{$aviable.id|stripslashes}/" target="_blank">{$aviable.article|stripslashes}</a></td>
                                </tr>
                            </tbody>
                        {/foreach}
                        <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: right;"> Всего <b>{$smarty.foreach.aviable.total}</b></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;"><button>Сделать не активными</button></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        {/if}
        {if $new_product|@count}
            <div style="float: left; margin-left: 10px;">
                <form method="post">
                    <h2>Новые товары</h2>
                    <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 250px;">
                        <thead>
                            <tr>
                                <td style="text-align: center; width: 40px;">
                                    <label class="p-check">
                                        <input type="checkbox" onchange="if ($(this).attr('checked') != undefined) {
                                                    $(this).parent().parent().parent().parent().parent().find('input').attr('checked', $(this).attr('checked', 'checked'))
                                                }
                                                else {
                                                    $(this).parent().parent().parent().parent().parent().find('input').removeAttr('checked')
                                                }" /><em>&nbsp;</em>
                                    </label>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </thead>
                        {foreach from=$new_product item="new" name="new"}
                            <tbody class="tbody">
                                <tr>
                                    <td style="text-align: center; width: 40px;">
                                        <label class="p-check">
                                            <input type="checkbox" name="new[{$new.article}]" value="1" /><em>&nbsp;</em>
                                        </label>
                                    </td>
                                    <td><a href="http://vita-bags.ru{$new.link|stripslashes}" target="_blank">{$new.article|stripslashes}</a></td>
                                </tr>
                            </tbody>
                        {/foreach}
                        <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: right;"> Всего <b>{$smarty.foreach.new.total}</b></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;"><button>Добавить товары</button></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        {/if}
        {if $no_active_product|@count}
            <div style="float: left; margin-left: 10px;">
                <form method="post">
                    <h2>Не активные товары, которые есть в наличии</h2>
                    <table cellpadding="5" cellspacing="1" border="0" class="table" style="width: 450px;">
                        <thead>
                            <tr>
                                <td style="text-align: center; width: 40px;">
                                    <label class="p-check">
                                        <input type="checkbox" onchange="if ($(this).attr('checked') != undefined) {
                                                    $(this).parent().parent().parent().parent().parent().find('input').attr('checked', $(this).attr('checked', 'checked'))
                                                }
                                                else {
                                                    $(this).parent().parent().parent().parent().parent().find('input').removeAttr('checked')
                                                }" /><em>&nbsp;</em>
                                    </label>
                                </td>
                                <td>

                                </td>
                            </tr>
                        </thead>
                        {foreach from=$no_active_product item="active" name="active"}
                            <tbody class="tbody">
                                <tr>
                                    <td style="text-align: center; width: 40px;">
                                        <label class="p-check">
                                            <input type="checkbox" name="active[]" value="{$active.article}" /><em>&nbsp;</em>
                                        </label>
                                    </td>
                                    <td><a href="http://vita-bags.ru{$active.link|stripslashes}" target="_blank">{$active.article|stripslashes}</a></td>
                                </tr>
                            </tbody>
                        {/foreach}
                        <tfoot>
                            <tr>
                                <td colspan="2" style="text-align: right;"> Всего <b>{$smarty.foreach.active.total}</b></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;"><button>Сделать активными</button></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        {/if}
    </div>
</div>