<div class="block">
    
    {include file="_menu_import.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <h1>Импорт товаров</h1>

        <h2>Загрузка csv-файла</h2>

        <form action="" method="post" enctype="multipart/form-data">
            <table cellpadding="4" cellspacing="1" border="0" class="table" style="margin: 10px 0px 20px 30px;">
                <tbody class="table_header">
                    <tr>
                        <td valign="middle" align="center">Выберите файл</td>
                    </tr>
                </tbody>
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="right">
                            <input type="file" name="file_price" />
                            <div style="margin-top: 7px;">
                                <button>Загрузить</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        {if $files|@count != 0}
            <h2>Импорт</h2>
            <form action="{$admin_url}import/import/{$param_tpl.category_id}/" method="post" >
                <table cellpadding="6" cellspacing="1" border="0" class="table" style="margin: 10px 0px 20px 30px;">

                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="right">
                                Выберите .csv-файл: 
                            </td>
                            <td valign="middle" align="left">
                                <select name="file_csv" style="width: 300px;" id="file_csv">
                                    {foreach from=$files item='file'}
                                        <option value="{$file->id}">{$file->file}</option>
                                    {/foreach}
                                </select>

                                    <button  value="Удалить файл" onclick="location.href='{$admin_url}import/{$param_tpl.category_id}/?del_file='+document.getElementById('file_csv').options[document.getElementById('file_csv').selectedIndex].value; return false;" >Удалить файл</button>
                            </td>
                        </tr>


                       {* <tr>
                            <td valign="middle" align="right">
                                Разделитель:
                            </td>
                            <td valign="middle" align="left">
                                <input type="text" value=";" name="delimiter" style="width: 10px;text-align: center;" maxlength="1" />
                            </td>

                        </tr>*}
                   {*     <tr>
                            <td valign="middle" align="right">
                                Валюта:
                            </td>
                            <td valign="middle" align="left">

                                <select name="currency_id" style="width: 50px;">
                                    {foreach from=$currency item="curr"}
                                        <option value="{$curr->id}">{$curr->name}</option>
                                    {/foreach}    
                                </select>

                            </td>

                        </tr>*}
                        <tr>
                            <td valign="middle" align="right" colspan="2">
                                
                                
                                <select name="currency_id" style="width: 50px;display: none;">
                                    {foreach from=$currency item="curr"}
                                        <option value="{$curr->id}">{$curr->name}</option>
                                    {/foreach}    
                                </select>
                                <input type="hidden" value=";" name="delimiter" style="width: 10px;text-align: center;" maxlength="1" />
                                
                                <button value="Следующий шаг" name="import" onclick="location.href='{$admin_url}import/import/{$param_tpl.category_id}/' + $('#file_csv option:selected').val(); return false;" >Следующий шаг</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        {/if}
    </div>
</div>