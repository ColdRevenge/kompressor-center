{include file=$template_message message=$message error=$error}
<h1><a href="{$MyURL}list/">Характеристики</a> / {if $param_tpl.edit_id > 0}Редактировать{else}Добавить{/if} характиристику</h1>
<div class="block" style="width: 550px;">
    <form method="post" enctype="multipart/form-data" action="{$MyURL}{if $param_tpl.edit_id > 0}edit/{$param_tpl.edit_id}/{else}add/{/if}">
        <table cellpadding="5" cellspacing="1" border="0" class="table_list">
            <tbody class="table_header_list">
                <tr>
                    <td valign="middle" align="center"><b>Название: </b></td>
                    <td valign="middle" align="center"><b>Порядок сортировки: </b></td>
                    <td valign="middle" align="center">&nbsp;</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <td valign="middle" align="center"><input type="text" value="{$smarty.post.name|stripslashes|default:""}"  name="name" style="width: 300px;" maxlength="255"/></td>
                    <td valign="middle" align="center"><input type="text" value="{$smarty.post.order|default:0}" name="order" style="width: 50px; text-align: center" maxlength="11" /></td>
                    <td valign="middle" align="center">
                        
                    <input type="hidden" value="1" name="submit" />
                    <input type="image" src="{$sys_images_url}{if $param_tpl.edit_id}save{else}add{/if}.png" name="submit"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>