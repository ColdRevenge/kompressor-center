<div class="block">
    {include file="_menu_setting.tpl"}
    <div class="page">
        <h1>Управление доставкой</h1>
        {include file=$template_message message=$message error=$error}

        <form method="post" action="{$admin_url}delivery/list/" enctype="multipart/form-data">
            <table cellpadding="6" cellspacing="1" border="0" class="table_blue" style="width: 980px">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Название</td>
                        <td valign="middle" align="center">Описание</td>
                        <td valign="middle" align="center">Цена</td>
                        <td valign="middle" align="center" width="110">Сроки <span>(дней)</span></td>
                        <td valign="middle" align="center">Бесплатно<br/>
                            <span>при сумме</span></td>
                        <td valign="middle" align="center">Иконка</td> 
                        <td valign="middle" align="center">Сорт.</td>
                        <td valign="middle" align="center" width="33">&nbsp;</td>
                    </tr>
                </thead>
                {foreach from=$delivery.0 item="deliv"}
                    {assign var="deliv_id" value=$deliv->id}
                    <tbody>
                        <tr>
                            <td valign="middle" align="center">
                                <input type="text" name="name[{$deliv->id}]" value="{$deliv->name}" style="width: 170px; font-size: 13px;" />
                                <input type="hidden" name="parent_id[{$deliv->id}]" value="{$deliv->parent_id}" />
                            </td>
                            <td valign="middle" align="center">
                                <textarea name="info[{$deliv->id}]" style="width: 180px;height: 80px; font-size: 13px;">{$deliv->info}</textarea>
                            </td>
                            <td valign="middle" align="center">
                                <input type="text" name="price[{$deliv->id}]" value="{$deliv->price}" style="width: 40px;text-align: center" />
                            </td>
                            <td valign="middle" align="center" class="notice"> от 
                                <input type="text" name="from_day[{$deliv->id}]" value="{$deliv->from_day}" style="width: 22px;text-align: center; font-size: 13px;" maxlength="3" />
                                до
                                <input type="text" name="to_day[{$deliv->id}]" value="{$deliv->to_day}" style="width: 22px;text-align: center; font-size: 13px;" maxlength="3" />
                            </td>
                            <td valign="middle" align="center">
                                <input type="text" name="free_sum[{$deliv->id}]" value="{$deliv->free_sum}" style="width: 40px;text-align: center" />
                            </td>
                            <td valign="middle" align="center">
                                {if $deliv->icon}
                                    <img src="/images/icons/{$deliv->icon}" alt="" style="border: 1px solid #cccccc; max-width: 100px" /><br/>
                                    <a href="?del_icon={$deliv->id}" style="font-size: 13px">Удалить логотип</a>
                                {else}
                                    <input type="file" value="" name="icon_{$deliv->id}" />
                                    {*                                    <button value="{$characteristic->id}" name="icon_load[{$deliv->id}]">Загрузить</button>*}
                                {/if}
                            </td>
                            <td valign="middle" align="center">
                                <input type="text" name="order[{$deliv->id}]" value="{$deliv->order}" style="width: 25px;text-align: center;" maxlength="11" />
                            </td>
                            <td valign="middle" align="center">
                                <a href="{$admin_url}delivery/list/add/child/{$deliv->id}/?is_modal=1" title="Добавить условие доставки" rel="windows_400"><img src="{$sys_images_url}admin/add.png" align="middle"  hspace="1" alt="Добавить условие доставки" style="vertical-align: middle" /></a>
                                <a href="{$admin_url}delivery/list/del/{$deliv->id}/" onclick="if (!confirm('Вы действительно хотите удалить метод доставки &laquo;{$deliv->name}&raquo; ? '))
                                            return false" title="Удалить"><img src="{$sys_images_url}admin/del.png" alt="" title="Удалить"  style="vertical-align: middle"/></a>
                            </td>
                        </tr>

                        {if isset($delivery.$deliv_id) && $delivery.$deliv_id|@count}
                            <tr>
                                <td valign="middle" align="right" colspan="7" style="background-color: white;">
                                    <div  style="width: 800px; text-align: left">
                                        <h3>Варианты доставки "{$deliv->name}":</h3>
                                        <table cellpadding="6" cellspacing="1" border="0" class="table_blue">

                                            <thead>
                                                <tr>
                                                    <td valign="middle" align="center">Название</td>
                                                    <td valign="middle" align="center">Описание</td>
                                                    <td valign="middle" align="center">Цена</td>
                                                    <td valign="middle" align="center" width="130">Сроки <span>(дней)</span></td>
                                                    <td valign="middle" align="center">Сорт.</td>
                                                    <td valign="middle" align="center">&nbsp;</td>
                                                </tr>
                                            </thead>
                                            {foreach from=$delivery.$deliv_id item="child"}
                                                <tbody>
                                                    <tr>
                                                    <tr>
                                                        <td valign="middle" align="center">
                                                            <input type="text" name="name[{$child->id}]" value="{$child->name|stripslashes|replace:'"':"&quot;"}" style="width: 200px;" />
                                                            <input type="hidden" name="parent_id[{$child->id}]" value="{$child->parent_id}" />
                                                        </td>
                                                        <td valign="middle" align="center">
                                                            <textarea name="info[{$child->id}]" style="width: 210px;height: 50px">{$child->info|stripslashes}</textarea>
                                                        </td>
                                                        <td valign="middle" align="center">
                                                            <input type="text" name="price[{$child->id}]" value="{$child->price}" style="width: 40px;text-align: center" />
                                                        </td>
                                                        <td valign="middle" align="center"> от 
                                                            <input type="text" name="from_day[{$child->id}]" value="{$child->from_day}" style="width: 25px;text-align: center;" maxlength="3" />
                                                            до
                                                            <input type="text" name="to_day[{$child->id}]" value="{$child->to_day}" style="width: 25px;text-align: center;" maxlength="3" />
                                                        </td>

                                                        <td valign="middle" align="center">
                                                            <input type="text" name="order[{$child->id}]" value="{$child->order}" style="width: 30px;text-align: center;" maxlength="11" />
                                                        </td>
                                                        <td valign="middle" align="center">
                                                            <a href="{$admin_url}delivery/list/del/{$child->id}/" onclick="if (!confirm('Вы действительно хотите удалить метод доставки &laquo;{$child->name}&raquo; ? '))
                                                                        return false" title="Удалить"><img src="{$sys_images_url}admin/del.png" alt="" title="Удалить"  style="vertical-align: middle"/></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            {/foreach}

                                            <tfoot>
                                                <tr>
                                                    <td valign="middle" align="right" colspan="6">
                                                        <button>Сохранить</button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        {/if}
                    </tbody>
                {/foreach}
                <tbody>
                    <tr>
                        <td valign="middle" align="right" colspan="7">
                            <input type="hidden" name="is_save" value="1" />
                            <button>Сохранить</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <br/>
        <h1>Добавить метод доставки</h1>
        <form method="post"  action="{$admin_url}delivery/list/" enctype="multipart/form-data">
            <table cellpadding="6" cellspacing="1" border="0" class="table_blue">
                <thead>
                    <tr>
                        <td valign="middle" align="center">Название</td>
                        <td valign="middle" align="center">Стоимость</td>
                        <td valign="middle" align="center">От (дней)</td>
                        <td valign="middle" align="center">До (дней)</td>
                        <td valign="middle" align="center">Иконка</td>
                        <td valign="middle" align="center">Сортировка</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td valign="middle" align="center"><input type="text" name="name" value="" style="width: 250px;" /></td>
                        <td valign="middle" align="center">
                            <input type="text" name="price" value="" style="width: 80px;" />
                            <input type="hidden" name="parent_id" value="0"/>
                        </td>
                        <td valign="middle" align="center">
                            <input type="text" name="from_day" value="" style="width: 40px;text-align: center;" maxlength="3" />
                        </td>
                        <td valign="middle" align="center">
                            <input type="text" name="to_day" value="" style="width: 40px;text-align: center;" maxlength="3" />
                        </td>
                        <td valign="middle" align="center">
                            <input type="file" value="" name="icon" />
                        </td>
                        <td valign="middle" align="center">
                            <input type="text" name="order" value="" style="width: 40px;" maxlength="11" />
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td valign="middle" align="right" colspan="6">
                            <input type="hidden" name="is_add" value="1" />
                            <button>Добавить</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>