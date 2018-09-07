{if $products|@count}
<h1 style="text-align: center;margin-top: 35px;">Является сопутствующим товаром для</h1>
{foreach from = $products item = 'product' key="key"}
        {if $product->old_price}
        {assign var="discaunt" value=$product->price*100/$product->old_price}
        {assign var="discaunt" value=$discaunt-100}
        {else}
        {assign var="discaunt" value=0}
        {/if}
        {assign var="product_id" value=$product->id}


<div style="text-align: center; margin: 15px 0px 0px 0px;padding-bottom: 15px;; border-bottom: 1px solid #CCCCCC;cursor: pointer;">
    {if $product_images.$key.1.0->file}<img src="{$gallery_url}{$product_images.$key.1.0->file}" alt="" style="border: 1px solid #CCCCCC;" onclick="window.open('{$admin_url}products/edit/0/{$category_id}/{$product->id}/{$product->id}/')" />{/if}
    <div onclick="window.open('{$admin_url}products/edit/0/{$category_id}/{$product->id}/{$product->id}/')">{$product->name|stripslashes}</div>
    <div onclick="window.open('{$admin_url}products/edit/0/{$category_id}/{$product->id}/{$product->id}/')">{$product->price} руб.</div>
    <div style="margin-top: 3px;"><a href="javascript:void(0)" onclick="AjaxRequest('related_list_menu','{$admin_url}related/del/product/{$product->related_id}/{$product->product_id}/');return false;">Удалить</a></div>
</div>
        {/foreach}
{/if}