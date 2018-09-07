{foreach from=$files.100 item="file" name="files" key="item_key"}
    <div class="up-img">
        <img src="{$preview_url}{$file->file}" alt="" />
        <div class="up-del">
            <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить?')) {ldelim} AjaxRequest('uploader_images_{$file->type}', '{$url}uploader_article/get/{$file->type|default:0}/{$file->category_id|default:0}/{$file->page_id|default:0}/1/{$file->file_id}/{$action_id}/', '100'); {rdelim}"><img src="{$sys_images_url}up-del.png" alt="" /></a>
        </div>
        {if $file->type != 1600}
            {if ($smarty.foreach.files.iteration != 1 || $smarty.foreach.files.iteration != $smarty.foreach.files.total) || $act_url}
                <div class="up-nav">
                    {if $act_url}
                        <div class="up-action">
                            <a href="javascript:void(0)" onclick="pasteImage('{if $files.0.$item_key->file}{$url}files/articles/images/{$files.0.$item_key->file}{/if}', '{foreach from=$files.2 item="file_1"}{if $file_1->file_id == $files.0.$item_key->id && $file_1->resize_type == 2}{$url}files/articles/images/{$file_1->file}{/if}{/foreach}')"><img src="{$sys_images_url}add_small.png" alt="" title="Добавить картинку  в текст статьи(с увиличением)" /></a>
                            <a href="javascript:void(0)" style="margin-left: 20px" onclick="pasteImage('{if $files.0.$item_key->file}{$url}files/articles/images/{$files.0.$item_key->file}{/if}', '{foreach from=$files.1 item="file_1"}{if $file_1->file_id == $files.0.$item_key->id && $file_1->resize_type == 1}{$url}files/articles/images/{$file_1->file}{/if}{/foreach}')"><img src="{$sys_images_url}add_icon.png" alt="" title="Добавить картинку в текст статьи" /></a>
                        </div>
                    {/if}
                </div>
            {/if}
        {/if}

    </div>
{/foreach}
<div class="clear">&nbsp;</div>

{foreach from=$files.200 item="file" name="files"}
    <div class="up-img">
        <img src="{$sys_images_url}file.png" alt="" />
        <div class="up-del">
            <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить?')) {ldelim} AjaxRequest('uploader_images_{$file->type}', '{$url}uploader_article/get/{$file->type|default:0}/{$file->category_id|default:0}/{$file->page_id|default:0}/1/{$file->id}/', '100'); {rdelim}"><img src="{$sys_images_url}up-del.png" alt="" /></a>

        </div>
        <div class="up-nav">
            {if $act_url}
                <div class="up-action">
                    <a href="javascript:void(0)" onclick="pasteFile('{$url}files/articles/images/{$file->file}', '{$file->size}')"><img src="{$sys_images_url}add_icon.png" alt="" title="Добавить картинку в текст статьи" /></a>
                </div>
            {/if}
        </div>
        {$file->name|substr:0:16}

    </div>
{/foreach}
<div class="clear">&nbsp;</div>