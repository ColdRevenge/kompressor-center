
<div class="block">

    {include file="_menu_discount.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <div class="quick_actions">
            <img src="{$sys_images_url}added.png" alt="Добавить" /><a href="{$admin_url}discount/coupons/add/?is_modal=1" rel="fancy" >Добавить купон </a>
        </div>
        <h1>Купоны</h1>

        <form method="post" enctype="multipart/form-data" action="{$MyURL}">
            <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%" >
                <thead>
                    <tr>
                        <td valign="middle" align="center">Название: </td>
                        <td valign="middle" align="center">Скидка: </td>
                        <td valign="middle" align="center">Минимальная стоимость товара: </td>
                        <td valign="middle" align="center">Дата создания: </td>
                        <td valign="middle" align="center">Дата завершения: </td>
                        <td valign="middle" align="center">Переход на след. купон: </td>
                        <td valign="middle" align="center">&nbsp;</td>
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </thead>

                {foreach from = $coupons item = 'coupon'}
                    <tbody class="tbody">
                        <tr{if $coupon->is_active != 1} style="color: gray;"{/if}>
                            <td valign="middle" align="center">{$coupon->name|stripslashes}</td>
                            <td valign="middle" align="center">{if $coupon->discount_sum > 0}{$coupon->discount_sum} руб.{else}{$coupon->discount_procent}%{/if}</td>
                            <td valign="middle" align="center">{$coupon->min_sum} руб.</td>
                            <td valign="middle" align="center">{$coupon->created|date_format:"%d.%m.%Y"}</td>
                            <td valign="middle" align="center">{$coupon->end_date|date_format:"%d.%m.%Y"}</td>


                            <td valign="middle" align="center">
                                {if $coupon->code_next_coupon_id > 0}при {$coupon->code_next_sum} р.

                                    {foreach from=$coupons item="next_coupon"}
                                        {if $next_coupon->id == $coupon->code_next_coupon_id}
                                            - &laquo;{$next_coupon->name}&raquo;
                                        {/if}
                                    {/foreach}
                                {/if}
                            </td>

                            <td valign="middle" align="center">{if $coupon->is_active == 1}<a href="{$admin_url}discount/coupons/active/4/{$coupon->id}/0/">Активный</a>{else}<a href="{$admin_url}discount/coupons/active/4/{$coupon->id}/1/">Не активный</a>{/if}</td>
                            <td valign="middle" align="center">

                                <a href="{$MyURL}coupons/id/{$coupon->id}/" title="Просмотрт кодов "><img src="{$sys_images_url}admin/look.png" alt=""  style="vertical-align: middle" /></a>
                                <a href="{$MyURL}coupons/add/{$coupon->id}/?is_modal=1" rel="fancy" title="Редактировать "><img src="{$sys_images_url}admin/edit.png" alt=""  style="vertical-align: middle" /></a>
                                <a href="javascript:void(0)" onclick="setConfirm('Вы действительно хотите удалить купон в `{$coupon->name}%`?', '{$admin_url}discount/coupons/del/3/{$coupon->id}/');"><img src="{$sys_images_url}admin/del.png" align="middle" style="vertical-align: middle" hspace="1" title="Удалить купон" alt="Удалить" /></a>
                            </td>
                        </tr>
                    </tbody>
                {/foreach}
            </table>

        </form>
    </div>
</div>