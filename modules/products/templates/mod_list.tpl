{*
МОДЫ!!!!
ДОРАБОТАТЬ И ОПТИМИЗИРОВАТЬ КОД!!!!!!!!
*}

<tr>
    <td valign="middle" align="right" colspan="2">  
        <div id="mod_add">
            {$mod_add}
        </div>
        <div id="mod_list">
            <table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: 10px 0px;" id="mod_table" >
                <tbody class="table_header">
                    <tr>
                        <td valign="middle" align="center">Размер:</td>
                        <td valign="middle" align="center">Артикул:</td>
                        <td valign="middle" align="center">Цена:</td>
                        <td valign="middle" align="center">Старая цена:</td>
                        <td valign="middle" align="center">Габариты:</td>
                        <td valign="middle" align="center">Опт-1:</td>
                        <td valign="middle" align="center">Опт-2:</td>
                        <td valign="middle" align="center">Опт-3:</td>
                        <td valign="middle" align="center">На складе:</td>
                        <td valign="middle" align="center" style="width: 90px;">&nbsp;</td>
                    </tr>
                </tbody>
                {if $mod_list|@count == 0}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="center"><input type="text" name="mod_name[]" value=""  style="width:155px;"/></td>
                            <td valign="middle" align="center"><input type="text" name="mod_article[]" value=""  style="width: 150px;"/></td>
                            <td valign="middle" align="center"><input type="text" name="mod_price[]" value="0" style="width: 50px;" /></td>
                            <td valign="middle" align="center"><input type="text" name="mod_old_price[]" value="0" style="width: 50px;" />
                                <input type="hidden" name="mod_warehouse[]" value="50000" maxlength="11"  style="width: 50px;" /></td>
                            <td valign="middle" align="center"><input type="text" name="mod_param_1[]" value="" style="width: 50px;" /></td>
                            <td valign="middle" align="center"><input type="text" name="mod_price_1[]" value="0" maxlength="11" style="width: 50px;" /></td>
                            <td valign="middle" align="center"><input type="text" name="mod_price_2[]" value="0" maxlength="11" style="width: 50px;" /></td>
                            <td valign="middle" align="center"><input type="text" name="mod_price_3[]" value="0" maxlength="11" style="width: 50px;" /></td>


                            <td valign="middle" align="center">&nbsp;</td>
                        </tr>
                    </tbody>
                {else}    
                    {foreach from=$mod_list item="product_mod" name="product_mod"}
                        <tbody class="tbody">
                            <tr>
                                <td valign="middle" align="center"><input type="text" name="mod_name[]" value="{$product_mod->name}"  style="width:155px;"/></td>
                                <td valign="middle" align="center"><input type="text" name="mod_article[]" value="{$product_mod->article}"  style="width: 150px;"/></td>
                                <td valign="middle" align="center"><input type="text" name="mod_price[]" value="{$product_mod->price|default:0}" style="width: 50px;" /></td>
                                <td valign="middle" align="center"><input type="text" name="mod_old_price[]" value="{$product_mod->old_price|default:0}" style="width: 50px;" /><input type="hidden" name="mod_warehouse[]" value="{$product_mod->warehouse|default:50000}" maxlength="11"  style="width: 50px;" /></td>
                                <td valign="middle" align="center"><input type="text" name="mod_param_1[]" value="{$product_mod->param_1|default:''}" style="width: 50px;" /></td>

                                <td valign="middle" align="center"><input type="text" name="mod_price_1[]" value="{$product_mod->price_1|default:0}" maxlength="11" style="width: 50px;" /></td>
                                <td valign="middle" align="center"><input type="text" name="mod_price_2[]" value="{$product_mod->price_2|default:0}" maxlength="11" style="width: 50px;" /></td>
                                <td valign="middle" align="center"><input type="text" name="mod_price_3[]" value="{$product_mod->price_3|default:0}" maxlength="11" style="width: 50px;" /></td>

                                <td valign="middle" align="center">
                                    {if $smarty.foreach.product_mod.iteration == 1}&nbsp;{else}
                                        <button onclick="delMod(this)" >Удалить</button>
                                    {/if}
                                </td>
                            </tr>
                        </tbody>
                    {/foreach}
                {/if}
            </table>
            <table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: 10px 0px;" id="mod_table" >
                <tbody class="tbody">

                <td style="text-align: left;vertical-align: middle" >
                    <a href="javascript:void(0)" onclick="setSizes()">Добавить основные размеры</a><br/>
                    <a href="javascript:void(0)" onclick="setSizes2()">Добавить основные размеры 2 </a>
                </td>

                <td style="text-align: left;vertical-align: middle" >
                    Артикул: <input type="text" value="" onchange="setArticle(this.value)" style="width: 70px" maxlength="250"/>
                </td>
                <td style="text-align: left;vertical-align: middle" >
                    Скидка: <input type="text" value="0" onchange="setDiscount(this.value)" style="width: 50px" maxlength="3"/>
                </td>
                <td valign="middle" align="right"> 
                    <a href="javascript:void(0)" onclick="AjaxRequestTable('mod_table', '{$admin_url}products/mod/add/')"><img src="{$sys_images_url}admin/add.png" alt="" style="vertical-align: middle" /> Добавить размер</a>
                </td>
                </tbody>
            </table>
        </div>


    </td>
</tr>
