<script type="text/javascript">
    function str_rand() {
        var result = '';
        var words = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
        var max_position = words.length - 1;
        for (i = 0; i < 10; ++i) {
            position = Math.floor(Math.random() * max_position);
            result = result + words.substring(position, position + 1);
        }
        return result;
    }
</script>

{if $list_edit == 1}
    {*            <h1>Добавить</h1>*}

    <form method="post" action="{if $smarty.get.is_modal == 1}?is_modal=1{/if}">
        <div {if $smarty.get.is_modal != 1}class="quick_add"{/if}>
            <div style="float: right;padding: 0 25px;vertical-align: top;{if $get_user->user_type != 1 && $get_user->user_type != 2 && $smarty.post.user_type != 1 && $smarty.post.user_type != 2 && $user_type != 1 && $user_type != 2}display: none{/if}" id="access_form_block">
                <h2 style="margin-top: 0; padding-top: 0">Права доступа</h2>
                <input type="text" value="{$smarty.post.start_access_link|stripslashes|replace:"'":'"'|default:$get_user->start_access_link|stripslashes|replace:"'":'"'}" placeholder="Стартовая страница" name="start_access_link" style="width: 230px;" />
                {foreach from=$access item="item" key="order"}
                    {if $order != 'accesses'}
                        {foreach from=$item key="key_2" item="item_2"}
                            <div style="font-size: 13px;">
                                {if $item_2.title}<div><label class="p-check"><input type="checkbox" {if $my_access.$order.$key_2.title == $item_2.title} checked="checked"{/if} value="{$item_2.title}" name="access[name][{$key_2}]" onchange="$(this).parent().parent().find('input').attr('checked', this.checked)" id="menu_title_{$key_2}"  /><em>&nbsp;</em><span>{$item_2.title}</span></label></div>{/if}
                                    {foreach from=$item_2.access item="access_item" key="key_3"}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="p-check"><input type="checkbox" 
                        {foreach from=$my_access item="my_item" key="my_order"}{foreach from=$my_item item="my_item_2" key="my_key_2"}{if $key_2 == $my_key_2}{foreach from=$my_item_2.access item="my_access_item"}{if $my_access_item.title == $access_item.title}checked="checked"{/if}{/foreach}{/if}{/foreach}{/foreach}
                        value="{$access_item.title}" name="access[access][{$key_2}][]" id="{$order}_{$key_2}_{$key_3}"><em>&nbsp;</em><span>{$access_item.title}</span></label><Br/>
                {/foreach}
            </div>
        {/foreach}
    {/if}
{/foreach}
</div>
<table cellpadding="2" cellspacing="0" border="0" style="float: left">
    <tr>
        <td colspan="2">
            <h2 style="margin-top: 0; padding-top: 0">Основные параметры</h2>
        </td>
    </tr>
    <tr style="display: none">
        <td valign="middle" align="right" style="width: 180px;">Менеджер:</td>
        <td valign="middle" align="left">
            <select name="manager_id" style="width: 250px;">
                <option value="0">Не выбран</option>
                {foreach from=$managers item="manager"}
                    <option value="{$manager->id}" {if $get_user->manager_id == $manager->id}selected="selected"{/if}>{$manager->name|stripslashes}</option>
                {/foreach}
            </select>
        </td>
    </tr>
    <tr>
        <td valign="middle" align="right" style="width: 180px;">Логин:</td>
        <td valign="middle" align="left"><input type="text" name="login" value='{$smarty.post.login|stripslashes|replace:"'":'"'|default:$get_user->login|stripslashes|replace:"'":'"'}' maxlength="255" style="width: 280px;"/></td>
    </tr>
    <tr>
        <td valign="middle" align="right">Пароль:</td>
        <td valign="middle" align="left">
            <input type="text" name="password" value='{$smarty.post.password|stripslashes|replace:"'":'"'|default:$get_user->password|stripslashes|replace:"'":'"'}' maxlength="255" style="width: 222px;"/>
            <button onclick="$(this).prev('input').val(str_rand());
                    return false;">UP</button>
        </td>
    </tr>
    <tr style="display: none">
        <td valign="middle" align="right">Тип:</td>
        <td valign="middle" align="left" style="font-size: 13px;">
            <label class="p-check"><input type="radio" value="1"{if $get_user->user_type == 1 || $smarty.post.user_type == 1 || $user_type == 1} checked="checked"{/if}  onchange="$('#access_form_block').fadeIn('slow', function () {ldelim}
                $(this).css('display', 'table-cell');{rdelim});" name="user_type" id="user_type_1" /><em>&nbsp;</em><span>Администратор</span></label> &nbsp; 
                            <label class="p-check"><input type="radio" value="2"{if $get_user->user_type == 2 || $smarty.post.user_type == 2 || $user_type == 2} checked="checked"{/if} onchange="$('#access_form_block').fadeIn('slow', function () {ldelim}
                                $(this).css('display', 'table-cell');{rdelim});" name="user_type" id="user_type_2" /><em>&nbsp;</em><span>Менеджер</span></label><br/>
                                                    <label class="p-check"><input type="radio" value="0"{if $get_user->user_type == '0' || $smarty.post.user_type =='0'} checked="checked"{/if} onchange="$('#access_form_block').fadeOut('slow', function () {ldelim}
                                                        $(this).css('display', 'none');{rdelim});" name="user_type" id="user_type_0" /><em>&nbsp;</em><span>Пользователь</span></label><br/>
        </td>
    </tr>
    <tr>
        <td valign="middle" align="right">ФИО:</td>
        <td valign="middle" align="left"><input type="text" name="name" value='{$smarty.post.name|stripslashes|replace:"'":'"'|default:$get_user->name|stripslashes|replace:"'":'"'}' maxlength="255" style="width: 280px;"/></td>
    </tr>
    <tr style="display: none">
        <td valign="middle" align="right">&nbsp;</td>
        <td valign="middle" align="left"><input type="checkbox" checked="checked" name="is_visible_unassigned_order" value='1' id="is_visible_unassigned_order" {if $smarty.post.is_visible_unassigned_order == 1 || $get_user->is_visible_unassigned_order == 1} checked="checked"{/if} /> <label for="is_visible_unassigned_order">Видит неназначенные заказы</label></td>
    </tr>
    {*<tr>
    <td valign="middle" align="right">Должность:</td>
    <td valign="middle" align="left"><input type="text" name="profession" value='{$smarty.post.profession|stripslashes|replace:"'":'"'|default:$get_user->profession|stripslashes|replace:"'":'"'}' maxlength="255" style="width: 280px;"/></td>
    </tr>*}
    <tr>
        <td valign="middle" align="right">E-mail:</td>
        <td valign="middle" align="left"><input type="text" name="email" value='{$smarty.post.email|stripslashes|replace:"'":'"'|default:$get_user->email|stripslashes|replace:"'":'"'}' maxlength="255" style="width: 280px;"/></td>
    </tr>
    <tr>
        <td valign="middle" align="right">Телефон:</td>
        <td valign="middle" align="left"><input type="text" name="phone" value='{$smarty.post.phone|stripslashes|replace:"'":'"'|default:$get_user->phone|stripslashes|replace:"'":'"'}' maxlength="255" style="width: 280px;"/></td>
    </tr>
    {if $is_coupon == 1}
        <tbody id="coupon_tbody">
            {include file="user_coupon.tpl"}
        </tbody>
    {/if}
    <tr style="display: none">
        <td valign="middle" align="right">&nbsp;</td>
        <td valign="middle" align="left">
            <input type="radio" value="1"{if $get_user->is_jur_person == '1' || $smarty.post.is_jur_person == '1'} checked="checked"{/if} onchange="$('#jur_person_block').fadeIn('slow', function () {ldelim}
                        $(this).css('display', 'table-row-group');{rdelim});" name="is_jur_person" id="is_jur_person_1" /><label for="is_jur_person_1">Юр. лицо</label> &nbsp; 
            <input type="radio" value="0"{if $get_user->is_jur_person == '0' || $smarty.post.is_jur_person == '0'} checked="checked"{/if} onchange="$('#jur_person_block').fadeOut('slow', function () {ldelim}
                        $(this).css('display', 'none');{rdelim});" name="is_jur_person" id="is_jur_person_0" /><label for="is_jur_person_0">Физ. лицо</label> 
        </td>
    </tr>
    <tr>
        <td valign="top" align="right" style="text-align: right; vertical-align: middle">Город:</td>
        <td valign="middle" align="left" style="text-align: left">
            <input type="text" size="30" name="city_index" value="{$smarty.post.city_index|stripslashes|replace:"'":'"'|default:$get_user->city_index|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 80px" placeholder="Индекс"/>&nbsp;<input type="text" size="30" name="city" value="{$smarty.post.city|stripslashes|replace:"'":'"'|default:$get_user->city|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 181px" placeholder="Город"/> 

        </td>
    </tr>   
    <tr>
        <td valign="top" align="right">Адрес:</td>
        <td valign="middle" align="left"><textarea name="adress" style="width: 280px; height: 70px;">{$smarty.post.adress|stripslashes|replace:"'":'"'|default:$get_user->adress|stripslashes|replace:"'":'"'}</textarea></td>
    </tr>
    {*     <tr>
    <td valign="middle" align="right">День рождения:</td>
    <td valign="middle" align="left">
    {$date_form}
    </td>
    </tr>*}
    <tr>
        <td valign="top" align="right">Информация:</td>
        <td valign="middle" align="left"><textarea name="info" style="width: 280px; height: 70px;">{$smarty.post.info|stripslashes|replace:"'":'"'|default:$get_user->info|stripslashes|replace:"'":'"'}</textarea></td>
    </tr>
    <tr style="display: none">
        <td valign="middle" align="right">Метро:</td>
        <td valign="middle" align="left">
            <select class="text" name="metro_id" style="width: 259px;" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
                <option value="">Выбрать</option>
                {foreach from=$metro item="item"}
                    <option value="{$item->id}"{if $get_user->metro_id == $item->id} selected="selected"{/if}>{$item->name}</option>
                {/foreach}
            </select>
        </td>
    </tr>
    <tr style="display: none">
        <td valign="top" align="right">Рассылка:</td>
        <td valign="middle" align="left">
            <input type="checkbox" value="1"{if $get_user->is_mailer == 1 || $smarty.post.is_mailer == 1} checked="checked"{/if} name="is_mailer" id="is_mailer" /><label for="is_mailer">Новости</label> &nbsp; 
            <input type="checkbox" value="1"{if $get_user->is_mailer_2 == 1 || $smarty.post.is_mailer_2 == 1} checked="checked"{/if} name="is_mailer_2" id="is_mailer_2" /><label for="is_mailer_2">Новинки</label>
        </td>
    </tr>

    {*                        {if $smarty.post.usertype >= 1}*}
    <tbody {if $get_user->is_jur_person != 1 && $smarty.post.is_jur_person != '1'}style="display: none"{/if} id="jur_person_block">
        <tr>
            <td valign="middle" align="right" style="text-align: right; ">Название:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_name" value="{$smarty.post.company_name|stripslashes|replace:"'":'"'|default:$get_user->company_name|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">Факс:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_fax" value="{$smarty.post.company_fax|stripslashes|replace:"'":'"'|default:$get_user->company_fax|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">ИНН:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_inn" value="{$smarty.post.company_inn|stripslashes|replace:"'":'"'|default:$get_user->company_inn|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">Юридический адрес:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_ur_adress" value="{$smarty.post.company_ur_adress|stripslashes|replace:"'":'"'|default:$get_user->company_ur_adress|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">Банк:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_bank" value="{$smarty.post.company_bank|stripslashes|replace:"'":'"'|default:$get_user->company_bank|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">БИК:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_bik" value="{$smarty.post.company_bik|stripslashes|replace:"'":'"'|default:$get_user->company_bik|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">P/c:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_rs" value="{$smarty.post.company_rs|stripslashes|replace:"'":'"'|default:$get_user->company_rs|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">К/c:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_ks" value="{$smarty.post.company_ks|stripslashes|replace:"'":'"'|default:$get_user->company_ks|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">КПП:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_kpp" value="{$smarty.post.company_kpp|stripslashes|replace:"'":'"'|default:$get_user->company_kpp|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">ОКПО:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_okpo" value="{$smarty.post.company_okpo|stripslashes|replace:"'":'"'|default:$get_user->company_okpo|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">ОКНХ:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_oknx" value="{$smarty.post.company_oknx|stripslashes|replace:"'":'"'|default:$get_user->company_oknx|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">ФИО Ген. директора:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_fio_director" value="{$smarty.post.company_fio_director|stripslashes|replace:"'":'"'|default:$get_user->company_fio_director|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        <tr>
            <td valign="middle" align="right" style="text-align: right">ФИО Гл. бухгалтера:</td>
            <td valign="middle" align="left">
                <input type="text" size="30" name="company_fio_accountant" value="{$smarty.post.company_fio_accountant|stripslashes|replace:"'":'"'|default:$get_user->company_fio_accountant|stripslashes|replace:"'":'"'}" class="text"   onfocus="this.className = 'selInput'" onblur = "this.className = 'text'" maxlength="255" style="width: 280px"/>
            </td>
        </tr>
        {*                        {/if}*}
    </tbody>
    <tr>
        <td valign="middle" align="right" colspan="2" style="padding-right: 20px;">
            {if $param_tpl.user_id > 0}<button>Сохранить</button>{else}<button>Добавить</button>{/if}
    </tr>
</table>
</div>
</form>
{/if}