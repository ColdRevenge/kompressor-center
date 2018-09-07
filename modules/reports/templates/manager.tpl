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
        {if $managers|@count}
            <table cellpadding="4" cellspacing="1" border="0" class="table" width="100%" style="margin-top: 10px;">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Менеджер</td>
                        <td valign="middle" align="center">Общая стоимость заказов</td>
                        <td valign="middle" align="center">Кол-во</td>
                    </tr>
                </thead>
                {foreach from=$managers item="manager" name="manager"}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left">{$manager->manager_name}</td>
                            <td valign="middle" align="center">{$manager->sum|number_format:2|replace:",":"&nbsp;"|default:0} руб.</td>
                            <td valign="middle" align="center">{$manager->count}</td>

                        </tr>
                    </tbody>
                {/foreach}
            </table>
        {else}
            <h2>Статистика недоступна</h2>
        {/if}
    </div>
</div>