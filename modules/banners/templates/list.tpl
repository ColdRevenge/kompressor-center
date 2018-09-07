<div class="block">
    {include file="_menu_banners.tpl"}
    <div class="page">
{include file=$template_message message=$message error=$error}
    
        <h1>Баннер в разделе{if $category_name->name} - &laquo;{$category_name->name|stripslashes}&raquo;{/if}</h1>

        {$upload}
    
        <br/><br/>
        <br/><br/>
        <br/><br/>
        <br/><br/>
        {if $type == 0}
        <div class="notice">
            <em>Вы можете <a href="http://ox2.ru/banner/" target="_blank">заказать разработку баннера</a>..</em>
        </div>
        {/if}
    </div>
</div>