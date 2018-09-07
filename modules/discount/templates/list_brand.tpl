<h1>Выберите производителя</h1>
<form method="post" action="">
    {foreach from=$get_brands item="brands"}
        {assign var="sub_id" value=$brands->id}
        <div style="margin-left:{$level*$offset}px;"><label class="p-check"><input type="checkbox" value="1" {if $get_checked_arr.$sub_id == 1} checked="checked"{/if} name="brand_id[{$brands->id}]" /><em>&nbsp;</em><span>{$brands->name|stripslashes}</span></label></div>
    {/foreach}
    <br/>
    <button name="is_send" value="1">Сохранить</button>
</form>