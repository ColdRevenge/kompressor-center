{include file=$template_message message=$message error=$error}
<div class="block">
    <a href="{$MyURL}list/">Производители</a> &raquo; {if $edit_id > 0}Редактировать{else}Добавить{/if} производителя
    <h1>{if $edit_id > 0}Редактировать{else}Добавить{/if} брэнд</h1>

    <form method="post" enctype="multipart/form-data" action="">
        <table cellpadding="2" cellspacing="0" border="0" width="430">
            <tr>
                <td valign="middle" align="right" width="170">Видимость брэнда:</td>
                <td valign="middle" align="left">
                    <select name="category_id" id="category_id" style="width: 250px;">
                        <option value="0">Во всех разделах</option>
                        {include file="$select_tree_file" id=0 tree=$category inc=$select_tree_file level=0 current_id=$edit_id selected_id=$smarty.post.category_id}
                    </select>

                </td>
            </tr>
            <tr>
                <td valign="middle" align="right">Название:</td>
                <td valign="middle" align="left"><input type="text" name="name" value="{$smarty.post.name}" maxlength="255" style="width: 246px;"/></td>
            </tr>
            <tr>
                <td valign="middle" align="right">Логотип:</td>
                <td valign="middle" align="left">
                    {if $uploaded_image}
                        <a href="{$icons_url}{$uploaded_image}" target="__blank"><img src="{$icons_url}{$uploaded_image}" alt="" style="max-width: 128px;" /></a>
                        <input type="hidden" value="{$uploaded_image}" name="uploaded_image" />
                    {/if}
                    {if $uploaded_image}Заменить: {/if}<input type="file" name="icon" />
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right">Порядок сортировки:</td>
                <td valign="middle" align="left"><input type="text" name="order" value="{$smarty.post.order}" maxlength="255" style="width: 246px;"/></td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2">
                    <input type="hidden" value="1" name="submit" />
                    <input type="image" src="{$sys_images_url}{if $edit_id}save{else}add{/if}.png" name="submit"/>
                </td>
            </tr>
        </table>
    </form>
</div>
{if $edit_id > 0}
    <script type="text/javascript">
        AjaxQuery('is_dir', '{$admin_url}category/is_pseudo_dir/' + $('pseudo_dir').value + '/0/0/{$edit_id}/');
    </script>
{/if}