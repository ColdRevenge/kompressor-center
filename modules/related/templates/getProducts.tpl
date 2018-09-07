{foreach from = $products item = 'product' key="key"}
    {assign var="product_id" value=$product->id}
    <div style="text-align: left; margin: 3px 0px 0px 0px;padding-bottom: 3px;; border-bottom: 1px solid #CCCCCC;font-size: 12px;vertical-align: top;">
        <div style="width: 190px; float: left; color: gray"><a href="javascript:void(0)" onclick="window.open('{$admin_url}products/edit/0/{$category_id}/{$product->id}/{$product->id}/'); return false;">{$product->name|stripslashes}</a>  &nbsp; [{$product->article|stripslashes}] </div>
        <div style="width: 20px; float: left"><a href="javascript:void(0)" onclick="AjaxRequest('related_list_menu_{$type}', '{$admin_url}related/del/product/{$type}/{$product->related_id}/{$product->product_id}/'); return false;"><img src="/images/sys/admin/del.png" align="middle" hspace="1" alt="Удалить раздел"></a></div>
        <div class="clear">&nbsp;</div>
    </div>
{/foreach}