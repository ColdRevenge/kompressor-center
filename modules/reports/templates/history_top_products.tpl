<div class="block">
    {include file="_menu_reports.tpl"}
    <div class="page">
        <h1>{if $type == 4}Отсутствуют на складе{elseif $type == 3}Самые продоваемые{/if}</h1>
        <form method="post" action="">

            <table cellpadding="4" cellspacing="1" border="0" class="table" width="710" style="margin: auto">
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">
                            Дата заказа:
                        </td>
                        <td valign="middle" align="left">
                            с {$start_date_form} до {$end_date_form}
                        </td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="2">
                            <input type="hidden" src="{$sys_images_url}sform.png" name="send" value="Сформировать"/>
                            <button>Сформировать</button>
                        </td>
                    </tr>
                </tbody>
            </table>


        </form>
        <br/>
        {if $products|@count}
            <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Товар</td>
                        <td valign="middle" align="center">Артикул</td>
                        <td valign="middle" align="center">Проданых</td>
                        <td valign="middle" align="center">Общая стоимость</td>
                    </tr>
                </thead>
                {foreach from=$products item="product" name="product"}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left"><a href="{$url}products/{$product->pseudo_dir}/" target="__blank">{$product->name|stripslashes} {if $product->mod_name}({$product->mod_name|stripslashes}){/if}</a></td>
                            <td valign="middle" align="center">{$product->article}</td>
                            <td valign="middle" align="center">{$product->product_count|default:0}</td>

                            <td valign="middle" align="center">{$product->product_sum|number_format|replace:",":"&nbsp;"|default:0} руб.</td>
                        </tr>
                    </tbody>
                {/foreach}
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="8">
                            Всего: <b>{$smarty.foreach.product.iteration}</b>
                        </td>
                    </tr>
                </tbody>
            </table>
        {else}
            <h2>Нет &laquo;Самых продоваемых&raquo; товаров</h2>
        {/if}
    </div>
</div>