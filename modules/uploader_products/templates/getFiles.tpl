{foreach from=$files.100 item="file" name="files" key="item_key"}
    <div class="up-img">
        <img src="{$preview_url}{$file->file}" alt="" />
        <div class="up-del">
            <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить?')) {ldelim} AjaxRequest('uploader_images_{$type}', '{$url}uploader_products/get/{$file->type|default:0}/{$product_id|default:0}/1/{$file->file_id}/', '100'); {rdelim}"><img src="{$sys_images_url}up-del.png" alt="" /></a>
        </div>
      {if ($smarty.foreach.files.iteration != 1 || $smarty.foreach.files.iteration != $smarty.foreach.files.total) || $act_url}
            <div class="up-nav">
                {if $act_url}
                    <div class="up-action">
                        <a href="{$act_url|replace:"#img_id#":$file->file_id}?not_menu=1" class="fancy_up_{$type}"><img src="{$sys_images_url}action.png" alt="" /></a>
                    </div>
                {/if}
            {if $smarty.foreach.files.iteration != 1}<div class="up-back"><a href="javascript:void(0)" onclick="AjaxRequest('uploader_images_{$file->type}', '{$url}uploader_products/get/{$file->type|default:0}/{$product_id|default:0}/2/{$file->file_id}/', '100');"><img src="{$sys_images_url}arrow_left.png" alt="" /></a></div>{/if}
        {if $smarty.foreach.files.iteration != $smarty.foreach.files.total}<div class="up-next"><a href="javascript:void(0)" onclick="AjaxRequest('uploader_images_{$file->type}', '{$url}uploader_products/get/{$file->type|default:0}/{$product_id|default:0}/3/{$file->file_id}/', '100');"><img src="{$sys_images_url}arrow_right.png" alt="" /></a></div>{/if}
    </div>
{/if}
    </div>
{/foreach}
<div class="clear">&nbsp;</div>

{foreach from=$tech_files.0 item="file" name="files"}
    <div class="up-img">
        <img src="{$sys_images_url}file.png" alt="" />
        <div class="up-del">
            <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить?')) {ldelim} AjaxRequest('uploader_images_{$type}', '{$url}uploader_products/get/{$file->type|default:0}/{$product_id|default:0}/5/{$file->id}/', '100'); {rdelim}"><img src="{$sys_images_url}up-del.png" alt="" /></a>
        </div>
            <a href="{$files_products_url}{$file->file}" target="_blank">{if $file->name|substr:0:14}{$file->name|substr:0:16}{else}{$file->file|substr:0:14}{/if}</a>

    </div>
{/foreach}
<div class="clear">&nbsp;</div>