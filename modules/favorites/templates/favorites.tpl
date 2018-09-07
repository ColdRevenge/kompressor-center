{if $is_active == 1}
    <a href="" class="active" onclick="favorites({$param_tpl.type}, {$param_tpl.object_id}, 0);
            return false;">Удалить<br/> из избранного</a>
    {else}
    <a href="" onclick="favorites({$param_tpl.type}, {$param_tpl.object_id}, 1);
            return false;">Добавить<br/> в избранное</a>
{/if}