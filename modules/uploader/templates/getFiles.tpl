{foreach from=$files.100 item="file" name="files" key="item_key"}
    <div class="up-img">
        <img src="{$preview_url}{$file->file}" alt="" />
        <div class="up-del">
            <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить?')) {ldelim} AjaxRequest('uploader_images_{$file->type}', '{$admin_url}uploader/get/{$file->type|default:0}/{$file->category_id|default:0}/{$file->page_id|default:0}/1/{$file->file_id}/{$action_id}/', '100'); {rdelim}"><img src="{$sys_images_url}up-del.png" alt="" /></a>
        </div>
        {if ($smarty.foreach.files.iteration != 1 || $smarty.foreach.files.iteration != $smarty.foreach.files.total) || ($act_url || $type == 2200)}
            <div class="up-nav">
                {if $type == 2200} {* Почтовая рассылка *}
                    <div class="up-action">
                        <a href="javascript:void(0)" style="margin-left: 20px" onclick="pasteImage('{if $files.0.$item_key->file}{$url}files/mail/{$files.0.$item_key->file}{else}{foreach from=$files.0 item="file_1"}{if $file_1->file_id == $files.0.$item_key->id && $file_1->resize_type == 0}{$url}files/articles/images/{$file_1->file}{/if}{/foreach}{/if}', '')"><img src="{$sys_images_url}add_icon.png" alt="" title="Добавить картинку в текст статьи" /></a>
                    </div>
                {elseif $act_url}
                    <div class="up-action">
                        <a href="{$act_url|replace:"#img_id#":$file->file_id}?not_menu=1" class="fancy_up_{$type}"><img src="{$sys_images_url}action.png" alt="" /></a>
                    </div>
                {/if}
            {if $smarty.foreach.files.iteration != 1}<div class="up-back"><a href="javascript:void(0)" onclick="AjaxRequest('uploader_images_{$file->type}', '{$admin_url}uploader/get/{$file->type|default:0}/{$file->category_id|default:0}/{$file->page_id|default:0}/2/{$file->file_id}/{$action_id}/', '100');"><img src="{$sys_images_url}arrow_left.png" alt="" /></a></div>{/if}
        {if $smarty.foreach.files.iteration != $smarty.foreach.files.total}<div class="up-next"><a href="javascript:void(0)" onclick="AjaxRequest('uploader_images_{$file->type}', '{$admin_url}uploader/get/{$file->type|default:0}/{$file->category_id|default:0}/{$file->page_id|default:0}/3/{$file->file_id}/{$action_id}/', '100');"><img src="{$sys_images_url}arrow_right.png" alt="" /></a></div>{/if}
    </div>
{/if}

</div>
{/foreach}
<div class="clear">&nbsp;</div>
{foreach from=$files.200 item="file" name="files"}
    <div class="up-img">
        <img src="{$sys_images_url}file.png" alt="" />
        <div class="up-del">
            <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить?')) {ldelim} AjaxRequest('uploader_images_{$file->type}', '{$admin_url}uploader/get/{$file->type|default:0}/{$file->category_id|default:0}/{$file->page_id|default:0}/1/{$file->id}/', '100'); {rdelim}"><img src="{$sys_images_url}up-del.png" alt="" /></a>
        </div>
        {$file->name|substr:0:16}

    </div>
{/foreach}
<div class="clear">&nbsp;</div>
