{*Модуль вывода различных сообщений*}
{if $message != ""}
    <div class="{$mclass|default:'message'}">{$message}</div>
{elseif $error != "" && $is_stick == 1}
    <script type='text/javascript'>$.stickr({ldelim}note: '$error', className: 'classic error', sticked: true{rdelim});</script>
{elseif $error != ""}
    <div class="{$eclass|default:'error'}">{$error}</div>
{/if}  