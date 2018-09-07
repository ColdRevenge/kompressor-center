<div class="block">
    {include file="_menu_setting.tpl"}
    <div class="page">
        <h1>Пользователи</h1>
        {include file=$template_message message=$message error=$error}

        <form method="post" action="">
            <table cellpadding="6" cellspacing="1" border="0" class="table">
                <tbody class="table_header">
                    <tr>
                        <td valign="middle" align="center">ФИО</td>
                        <td valign="middle" align="center">Логин: </td>

                        <td valign="middle" align="center">Телефон</td>
                        <td valign="middle" align="center">E-Mail</td>
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
                        <td valign="middle" align="center">Рассылка</td>
                        <td valign="middle" align="center">&nbsp;</td>
                    </tr>
                </tbody>
                {foreach from=$users item="user"}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="center"><a href="{$admin_url}setting/users/get/{$user->id}/?not_menu=1" class="fancy fancybox.ajax">{$user->name} {$user->last_name} {$user->middle_name}</a></td>
                            <td valign="middle" align="center">{$user->login}</td>

                            <td valign="middle" align="center">{$user->phone}</td>
                            <td valign="middle" align="center">{$user->email}</td>

                            <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 0}checked="checked"{/if} name="price[{$user->id}]" value="0" /></td>
                            <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 1}checked="checked"{/if} name="price[{$user->id}]" value="1" /></td>
                            <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 2}checked="checked"{/if} name="price[{$user->id}]" value="2" /></td>
                            <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 3}checked="checked"{/if} name="price[{$user->id}]" value="3" /></td>
                            <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 4}checked="checked"{/if} name="price[{$user->id}]" value="4" /></td>
                            <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 5}checked="checked"{/if} name="price[{$user->id}]" value="5" /></td>
                            <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 6}checked="checked"{/if} name="price[{$user->id}]" value="6" /></td>
                            <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 7}checked="checked"{/if} name="price[{$user->id}]" value="7" /></td>
                            <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 8}checked="checked"{/if} name="price[{$user->id}]" value="8" /></td>
                            <td valign="middle" align="center"><input type="radio" {if $user->b2b_price == 9}checked="checked"{/if} name="price[{$user->id}]" value="9" /></td>
                            <td valign="middle" align="center"><input type="checkbox" {if $user->is_mailer == 1}checked="checked"{/if} name="is_mailer[{$user->id}]" value="1" /></td>


                            <td valign="middle" align="center"><a href="{$admin_url}setting/users/del/{$user->id}/" onclick="if (!confirm('Вы действительно хотите удалить пользователя &laquo;{$user->name}&raquo; ? ')) return false" title="Удалить"><img src="{$sys_images_url}admin/del.png" alt="" title="Удалить" /></a></td>
                        </tr>
                    </tbody>
                {/foreach}
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right" colspan="16">
                            <input type="hidden" name="is_save" value="1" />
                            <button>Сохранить</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>