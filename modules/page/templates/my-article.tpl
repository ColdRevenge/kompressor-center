{if $param_tpl.type == 'mod'}
    <h1>Статьи на модерации</h1>
{elseif $param_tpl.type == 'publ'}
    <h1>Мои статьи</h1>
{elseif $param_tpl.type == 'save'}    
    <h1>Сохраненные статьи</h1>
{/if}

{include file=$template_message message=$message error=$error}
{if !$user_id && $param_tpl.type != 'mod'}
    <p>Для добавления статей необходимо <a href="{$url}auth/auth/"><b>авторизоваться</b></a>.</p>
    <p>Если вы не зарегистрированны на сайте, пройдите простую <a href="{$url}auth/register/"><b>регистрацию</b></a></p>

{else}    
    <br/>
    {foreach from=$content_pages item="page"}
        <div class="page-name">{if $page->lesson}<span class="bold">Урок {$page->lesson|stripslashes}</span> - {/if}<a href="{$url}{$page->pseudo_dir}/" target="_blank">{$page->header|stripslashes} <span class="page-content-author" style="color: gray">[{$page->created|date_format:"%d.%m.%Y"}]</span></a>{if $page->author}<span class="page-content-author"> ({$page->author|stripslashes|strip_tags})</span>{/if} {if $param_tpl.type == 'save'}<a href="{$url}page/edit/{$page->id}/" class="page-content-author">[Редактировать]</a>{/if} {if $is_auth == 2}<a href="{$url}page/edit/{$page->id}/" style="color: red;font-size: 12px;">Модерировать</a>{/if}</div>
        <div class="page-date"></div>

        <div class="page-border" style="width: 90%; margin-top: 11px;"></div>
    {/foreach}
{/if}