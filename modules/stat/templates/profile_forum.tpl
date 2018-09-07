<div id="stat-left-menu">
    {include file="stat_menu.tpl"}
</div>
<div id="stat_content">
    <div class="breadcrumbs-block">

        <ul class="clearfix">
            <li><a href="{$url}">Женский форум Lalipop</a><span>/</span></li>
            <li>Мой профиль</li>
        </ul>
    </div>
    <h1>Мой профиль</h1>

    <div class="text">
        {include file=$template_message message=$message error=$error mclass="message"}
        <form method="post" action="" enctype="multipart/form-data">

            <table cellpadding="0" cellspacing="2" border="0" id="register" style="margin: auto; width: 485px;" class="table_fields">

                <tr> 
                    <td valign="middle" align="right" style="text-align: right">Ваше имя:<span class="asterix">*</span></td>
                    <td valign="middle" align="left">

                        <input type="text" name="forum_name" value="{$get_user->forum_name|stripslashes|default:$get_user->name|stripslashes}" maxlength="255" class="text"   style="width: 330px"  />

                        <input type="hidden" name="name" value="{$smarty.post.name|default:$get_user->name|stripslashes}" maxlength="255" class="text"   style="width: 330px"  />
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">Телефон:<span class="asterix">*</span></td>
                    <td valign="middle" align="left"><input type="text" name="phone" value="{$smarty.post.phone|default:$get_user->phone|stripslashes}" class="text"  style="width: 330px" maxlength="255"  /></td>
                </tr>
                <tr>
                    <td valign="middle" align="right" style="text-align: right; vertical-align: top; padding-top: 12px;">E-mail:<span class="asterix">*</span></td>
                    <td valign="middle" align="left">

                        <input type="text" name="forum_email" value="{$smarty.post.forum_email|default:$get_user->forum_email|stripslashes|default:$get_user->email|stripslashes}" maxlength="255" class="text"   style="width: 330px"  />
                        <div style="text-align: left; margin-top: 5px;">
                            <label class="check-style">
                                <input type="checkbox" value="1" name="forum_is_email" {if $get_user->forum_is_email == 1} checked="checked"{/if} /><span>&nbsp;</span><span>Показывать e-mail на форуме</span>
                            </label>
                        </div>
                        <input type="hidden" name="email" value="{$smarty.post.email|default:$get_user->email|stripslashes}" class="text"  style="width: 330px" maxlength="255"  />

                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">&nbsp;</td>
                    <td valign="middle" align="left">
                        <div style="text-align: left; margin-top: 5px;">
                            <label class="check-style"><input type="checkbox" value="1"{if $get_user->is_mailer == 1 || $smarty.post.is_mailer == 1} checked="checked"{/if} name="is_mailer" id="is_mailer" /><span>&nbsp;</span><span style="font-size: 13px; color: gray"> Я согласен получать ваши рассылки по e-mail</span> &nbsp; 
                        </div>
                    </td>
                </tr>


                <tr>
                    <td valign="top" align="right" style="text-align: right">Дата рождения:</td>
                    <td valign="middle" align="left" style="text-align: left">
                        {$birth_date}
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="right" style="text-align: right">Аватарка:</td>
                    <td valign="middle" align="left" style="text-align: left">
                        {if $get_user->icon}
                            <img src="/images/forum/avatars/{$get_user->icon}" alt="" />
                            <input type="hidden" value="{$get_user->icon}" name="uploaded_image" />
                        {/if}
                        {if $get_user->icon}<br/><br/>Заменить: {/if}<input type="file" name="icon" />

                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="middle" align="right">&nbsp;</td>
                    <td valign="middle" align="left" style="text-align: left">
                        <label class="check-style"><input type="radio" value="0"{if $get_user->is_jur_person == '0' || $smarty.post.is_jur_person == '0'} checked="checked"{/if} onchange="$('#jur_person_block').fadeOut('slow', function () {ldelim}
                                    $(this).css('display', 'none');{rdelim});" name="is_jur_person" id="is_jur_person_0" /><span>&nbsp;</span><span>Физ. лицо</span></label>

                        <label class="check-style"><input type="radio" value="1"{if $get_user->is_jur_person == '1' || $smarty.post.is_jur_person == '1'} checked="checked"{/if} onchange="$('#jur_person_block').fadeIn('slow', function () {ldelim}
                                    $(this).css('display', 'table-row-group');{rdelim});" name="is_jur_person" id="is_jur_person_1" /><span>&nbsp;</span><span>Юр. лицо</span></label>

                    </td>
                </tr>

                <tbody {if $get_user->is_jur_person != 1 && $smarty.post.is_jur_person != '1'}style="display: none"{/if} id="jur_person_block">
                    <tr>
                        <td valign="middle" align="right" style="text-align: right; width: 230px;">Название:</td>
                        <td valign="middle" align="left">
                            <input type="text" name="company_name" value="{$smarty.post.company_name|stripslashes|replace:"'":'"'|default:$get_user->company_name|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">Факс:</td>
                        <td valign="middle" align="left">
                            <input type="text" name="company_fax" value="{$smarty.post.company_fax|stripslashes|replace:"'":'"'|default:$get_user->company_fax|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">ИНН:</td>
                        <td valign="middle" align="left">
                            <input type="text" name="company_inn" value="{$smarty.post.company_inn|stripslashes|replace:"'":'"'|default:$get_user->company_inn|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">Юридический адрес:</td>
                        <td valign="middle" align="left">
                            <input type="text" name="company_ur_adress" value="{$smarty.post.company_ur_adress|stripslashes|replace:"'":'"'|default:$get_user->company_ur_adress|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">Банк:</td>
                        <td valign="middle" align="left">
                            <input type="text" name="company_bank" value="{$smarty.post.company_bank|stripslashes|replace:"'":'"'|default:$get_user->company_bank|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">БИК:</td>
                        <td valign="middle" align="left">
                            <input type="text" name="company_bik" value="{$smarty.post.company_bik|stripslashes|replace:"'":'"'|default:$get_user->company_bik|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">P/c:</td>
                        <td valign="middle" align="left">
                            <input type="text" name="company_rs" value="{$smarty.post.company_rs|stripslashes|replace:"'":'"'|default:$get_user->company_rs|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">К/c:</td>
                        <td valign="middle" align="left">
                            <input type="text" name="company_ks" value="{$smarty.post.company_ks|stripslashes|replace:"'":'"'|default:$get_user->company_ks|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">КПП:</td>
                        <td valign="middle" align="left">
                            <input type="text" name="company_kpp" value="{$smarty.post.company_kpp|stripslashes|replace:"'":'"'|default:$get_user->company_kpp|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">ОКПО:</td>
                        <td valign="middle" align="left">
                            <input type="text" name="company_okpo" value="{$smarty.post.company_okpo|stripslashes|replace:"'":'"'|default:$get_user->company_okpo|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">ОКНХ:</td>
                        <td valign="middle" align="left">
                            <input type="text" name="company_oknx" value="{$smarty.post.company_oknx|stripslashes|replace:"'":'"'|default:$get_user->company_oknx|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">ФИО Ген. директора:</td>
                        <td valign="middle" align="left">
                            <input type="text" name="company_fio_director" value="{$smarty.post.company_fio_director|stripslashes|replace:"'":'"'|default:$get_user->company_fio_director|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right" style="text-align: right">ФИО Гл. бухгалтера:</td>
                        <td valign="middle" align="left">
                            <input type="text" name="company_fio_accountant" value="{$smarty.post.company_fio_accountant|stripslashes|replace:"'":'"'|default:$get_user->company_fio_accountant|stripslashes|replace:"'":'"'}" class="text"   maxlength="255" style="width: 330px"/>
                        </td>
                    </tr>
                    {*                        {/if}*}
                </tbody>






                <tr>
                    <td valign="top" align="right" style="text-align: right">Город:</td>
                    <td valign="middle" align="left" style="text-align: left">
                        <input type="text"  name="city_index" value="{$smarty.post.city_index|default:$get_user->city_index|stripslashes}" class="text"   maxlength="255" style="display: none;width: 80px" placeholder="Индекс"/> 
                        <input type="text" name="city" value="{$smarty.post.city|default:$get_user->city|stripslashes}" class="text"   maxlength="255" style="width: 227px" placeholder="Город"/> 

                    </td>
                </tr>   
                <tr style="display: none">
                    <td valign="top" align="right" style="text-align: right;">Адрес:</td>
                    <td valign="middle" align="left">
                        <textarea style="width: 330px;height: 80px;" class="text" name="adress"   placeholder="Адрес, по которому будет производиться доставка">{$smarty.post.adress|default:$get_user->adress|stripslashes}</textarea>
                    </td>
                </tr>   

                <tr style="display: none">
                    <td valign="middle" align="right" style="text-align: right">Ближайшее метро:</td>
                    <td valign="middle" align="left" style="text-align: left;">
                        <select class="text" name="metro_id" style="width: 350px;"  >
                            <option value="">Выбрать</option>
                            {foreach from=$metro item="item"}
                                <option value="{$item->id}"{if $smarty.post.metro_id == $item->id || $get_user->metro_id == $item->id} selected="selected"{/if}>{$item->name}</option>
                            {/foreach}
                        </select>
                    </td>
                </tr>

                <tr>
                    <td valign="top" align="right" style="text-align: right;  width: 250px;vertical-align: top;">Информация:</td>
                    <td valign="middle" align="left">
                        <textarea style="width: 330px;height: 100px;" class="text"  name="info">{$smarty.post.info|default:$get_user->info|stripslashes}</textarea>
                    </td>
                </tr>

                {*
                <tr>
                <td valign="top" align="right" style="text-align: right">&nbsp;</td>
                <td valign="middle" align="left" style="font-size: 13px;">
                    
                {*                    <input type="checkbox" value="1"{if $get_user->is_mailer_2 == 1 || $smarty.post.is_mailer_2 == 1} checked="checked"{/if} name="is_mailer_2" id="is_mailer_2" /><label for="is_mailer_2">Новинки каталога</label>
                </td>
                </tr>*}
                <tr>
                    <td valign="middle" align="right" colspan="2" style="text-align: right">
                        <input type="hidden" value="1" name="register" />
                        <button class="save">&nbsp;</button>
                    </td>
                </tr>
            </table>
        </form>

        {**}
    </div>
</div>