<div class="block">

    {include file="_menu_import.tpl"}
    <div class="page">
        <div id="breadcrumbs">
            <a href="{$admin_url}import/">Импорт</a>  &raquo; Импорт товаров</span>
        </div>
        <h1>Импорт товаров</h1>
        {include file=$template_message message=$message error=$error}


        {if $array_line|@count != 0}
            {*            <h2>Импорт</h2>*}
            <form action="{$admin_url}import/import/{$param_tpl.category_id}/{$param_tpl.file_id}/" method="post" >
                {*                <input type="text" value="{$smarty.post.curs_dollar|default:$setting_general->param_str_1|default:"1.00"}" name="curs_dollar" style="width: 50px;" /> $<Br/>
                <input type="text" value="{$smarty.post.curs_euro|default:$setting_general->param_str_2|default:"1.00"}" name="curs_euro" style="width: 50px;" /> Euro*}
                <button type="submit" value="Сохранить" name="save_config" >Сохранить расположение столбцов</button>
                {*                <input type="checkbox" value="1" name="is_import_images" id="is_import_images" /><label for="is_import_images">Обновить картинки</label>*}

                <div class="clear" style="border-bottom: 1px solid #CCCCCC">&nbsp;</div>
                <div  style="border-bottom: 1px solid #CCCCCC">&nbsp;</div>    <br/>


                <div style="float: left; margin-top: 10px;"><button value="<<" alt="" onclick="document.getElementById('scrool_block').scrollLeft -= 895;
                        return false" ><<</button></div>
                <div id="scrool_block" style="overflow: hidden;width: 900px;  border: 1px solid #CCCCC;float: left;">
                    <table cellpadding="0" cellspacing="0" border="0" class="table" style="width: 100%;border: 1px solid #CCCCC;">

                        <tbody class="tbody" style="background-color: white;">
                            <tr> 
                                {foreach from=$array_line.0 item="line" key="num"}
                                    <td valign="top" width="155" style="text-align: justify; font-size: 12px;border-bottom: 1px solid #CCCCCC;">
                                        <div style="width: 155px;padding: 2px 5px">
                                            <select name="field[{$num}]" style="width: 145px;font-size: 12px;">
                                                <option value="">Пропустить столбец</option>
                                                {foreach from=$fields item="field" key="name"}
                                                    <option value="{$name}" {if $setting.$num == $name}selected="selected"{/if}>{$field}</option>
                                                {/foreach}
                                                {* Характеристики в столбцах *}

                                                {if $characteristics|@count}
                                                    <optgroup value='' label='&nbsp;&nbsp; &nbsp; Характеристики'>

                                                        {foreach from=$characteristics item="characteristic" key="name"}
                                                            <option value="{$characteristic->id}" {if $setting.$num == $characteristic->id}selected="selected"{/if}>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$characteristic->name|stripslashes}</option>
                                                        {/foreach}

                                                    </optgroup>
                                                {/if}

                                            </select>
                                        </div>
                                    </td>
                                {/foreach}
                            </tr>
                        </tbody>

                        {foreach from=$array_line item="lines"}
                            <tbody class="tbody">
                                <tr>
                                    {foreach from=$lines item="line" key="t"}
                                        <td valign="top" width="155" style="text-align: justify; font-size: 12px;border-bottom: 1px solid #CCCCCC;">
                                            <div style="width: 155px;padding: 2px 5px">{$line|truncate:110:"..."}</div>
                                        </td>
                                    {/foreach}
                                </tr>
                            </tbody>
                        {/foreach}
                    </table>
                </div>
                <div style="float: left; margin-top: 10px;"><button value="" alt="" onclick="document.getElementById('scrool_block').scrollLeft += 895;
                        return false" >>></button></div>
                <div class="clear">&nbsp;</div><br/>
                <input type="hidden" name="file_csv" value="{$smarty.post.file_csv}" />
                <input type="hidden" name="delimiter" value="{$smarty.post.delimiter}" />
                <input type="hidden" name="currency_id" value="{$smarty.post.currency_id}" />
                <button type="submit" value="Импортировать!" name="import_go" >Импортировать!</button>
            </form>
        {/if}
    </div>
</div>