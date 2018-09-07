{if $smarty.get.is_modal != 1}
    <div class="block">
        {include file="_menu_user.tpl"}
        <div class="page">

            {include file=$template_message message=$message error=$error}

            {include file="admin_add.tpl"}

            <div class="quick_actions"><a href="{$admin_url}users/admin/{$user_type}/add/1/" title="Добавить пользователя" style="font-size: 17px;">Добавить пользователя</a></div>

            {*            <div style="font-size: 15px; color: #CCCCCC">*}
            {*                <a href="{$admin_url}users/admin/1/" style="vertical-align: bottom;{if $user_type == 1}font-weight: bold;{/if}">Администраторы</a> &nbsp;|&nbsp; *}
            {*                <a href="{$admin_url}users/admin/2/" style="vertical-align: bottom;{if $user_type == 2}font-weight: bold;{/if}">Менеджеры</a> &nbsp;|&nbsp; <a href="{$admin_url}users/admin/0/" style="vertical-align: middle;{if $user_type == 0}font-weight: bold;{/if}">Пользователи</a></div>*}
            {if $user_type == 0}
                <form method="post" action="">

                    <table cellpadding="4" cellspacing="1" border="0" class="table" width="870" style="margin: auto; margin-bottom: 10px;">

                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="right">
                                    Логин (или ФИО):&nbsp;
                                </td>
                                <td valign="middle" align="left" style="display: none">
                                    <input type="text" value="{$smarty.post.find}" name="find" style="width: 307px;"/> &nbsp;&nbsp;&nbsp;&nbsp;Менеджер: 
                                    <select name="manager_id" style="width: 280px;">
                                        <option value="-1">Все менеджеры</option>
                                        <option value="0"{if $smarty.post.manager_id == 0}selected="selected"{/if}>Не выбран</option>
                                        {foreach from=$managers item="manager"}
                                            <option value="{$manager->id}" {if $smarty.post.manager_id == $manager->id}selected="selected"{/if}>{$manager->name|stripslashes}</option>
                                        {/foreach}
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="right" colspan="2">
                                    <button name="send">Сформировать</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            {/if}
            <form method="post" action="">
                <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
                    <thead>
                        <tr>
                            <td valign="middle" align="center">Логин:</td>
                            <td valign="middle" align="center">ФИО:</td>
                            {*                        <td valign="middle" align="center">Должность: </td>*}
                            <td valign="middle" align="center">Телефон:</td>
                            {*             {if $user_type == 0}
                            <td valign="middle" align="center">Цена 1</td>
                            <td valign="middle" align="center">Цена 2</td>
                            <td valign="middle" align="center">Цена 3</td>
                            <td valign="middle" align="center">Цена 4</td>
                            <td valign="middle" align="center">Цена 5</td>
                            <td valign="middle" align="center">Цена 6</td>
                            <td valign="middle" align="center">Цена 7</td>
                            <td valign="middle" align="center">Цена 8</td>
                            <td valign="middle" align="center">Цена 9</td>
                            <td valign="middle" align="center">Цена 10</td>
                            {/if}*}
                            {if $user_type == 0}      <td valign="middle" align="center">Менеджер</td> {/if}
                            <td valign="middle" align="center">Добавлен:</td>
                            <td valign="middle" align="center" width="70">&nbsp;</td>
                        </tr>
                    </thead>

                    {foreach from = $users item = 'user'}
                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="center"><a href="{$admin_url}users/admin/0/edit/{$user->id}/?is_modal=1" rel="admin_fancy">{$user->login}</a></td>
                                <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '{$admin_url}users/admin/{$user_type}/edit/{$user->id}/'">{$user->name|stripslashes}</td>

                                {*                            <td valign="middle" align="center" style="cursor: pointer;" onclick="location.href = '{$admin_url}users/admin/{$user_type}/edit/{$user->id}/'">{$user->profession}</td>*}
                                <td valign="middle" align="center" style="cursor: pointer;" onclick="location.href = '{$admin_url}users/admin/{$user_type}/edit/{$user->id}/'">
                                    {$user->phone}
                                    <div style="height: 5px;font-size: 0">&nbsp;</div>

                                    {if $user->email}<a href="mailto:{$user->email}">{$user->email}</a>{/if}
                                </td>


                                {if $user_type == 0}
                                    {*                       <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 0}checked="checked"{/if} name="price[{$user->id}]" value="0" /></td>
                                    <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 1}checked="checked"{/if} name="price[{$user->id}]" value="1" /></td>
                                    <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 2}checked="checked"{/if} name="price[{$user->id}]" value="2" /></td>
                                    <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 3}checked="checked"{/if} name="price[{$user->id}]" value="3" /></td>
                                    <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 4}checked="checked"{/if} name="price[{$user->id}]" value="4" /></td>
                                    <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 5}checked="checked"{/if} name="price[{$user->id}]" value="5" /></td>
                                    <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 6}checked="checked"{/if} name="price[{$user->id}]" value="6" /></td>
                                    <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 7}checked="checked"{/if} name="price[{$user->id}]" value="7" /></td>
                                    <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 8}checked="checked"{/if} name="price[{$user->id}]" value="8" /></td>
                                    <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 9}checked="checked"{/if} name="price[{$user->id}]" value="9" /></td>*}
                                    <td valign="middle" align="center" style="display: none">
                                        <select name="manager_id[{$user->id}]" style="width: 150px;">
                                            <option value="0">Не выбран</option>
                                            {foreach from=$managers item="manager"}
                                                <option value="{$manager->id}" {if $user->manager_id == $manager->id}selected="selected"{/if}>{$manager->name|stripslashes}</option>
                                            {/foreach}
                                        </select>
                                    </td>
                                {/if}
                                <td valign="middle" align="center" style="cursor: pointer;" onclick="location.href = '{$admin_url}users/admin/{$user_type}/edit/{$user->id}/'">{$user->created|date_format:"%d:%m:%Y"} {*%H:%M*}</td>
                                <td valign="middle" align="center">
                                    <a href="{$admin_url}users/admin/0/history/{$user->id}/?is_modal=1" class="fancy" title="История заказов пользователя {$user->login}"><img src="{$sys_images_url}orders.png" alt="" style="vertical-align: middle"/></a>
                                    <a href="{$admin_url}users/admin/{$user_type}/edit/{$user->id}/"><img src="{$sys_images_url}admin/edit.png" align="middle" hspace="1" alt="Редактировать" /></a>
                                    <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить страницу??')) {ldelim}
                                                location.href = '{$admin_url}users/admin/{$user_type}/del/{$user->id}/';{rdelim}"><img src="{$sys_images_url}admin/del.png" align="middle" hspace="1" alt="Удалить раздел" /></a>
                                </td>
                            </tr>

                        </tbody>
                    {/foreach}
                    {if $user_type == 0}
                        <tfoot>
                            <tr>
                                <td valign="middle" align="right" colspan="16">
                                    <input type="hidden" name="is_save" value="1" />
                                    <button>Сохранить</button>
                                </td>
                            </tr>
                        </tfoot>
                    {/if}
                </table>
            </form>
        </div>
    </div>
{else}
    {include file=$template_message message=$message error=$error}
    {include file="admin_add.tpl"}
{/if}

<script type="text/javascript">

    $("a[rel^='admin_fancy']").fancybox({
        width: 855,
        height: 655,
        modal: true,
        type: 'iframe',
        cyclic: false,
        fitToView: false,
        autoSize: false,
        closeClick: true,
        openEffect: 'none',
        closeEffect: 'none',
        hideOnOverlayClick: true,
        hideOnContentClick: true,
        enableEscapeButton: true,
        showCloseButton: true
    });
</script>