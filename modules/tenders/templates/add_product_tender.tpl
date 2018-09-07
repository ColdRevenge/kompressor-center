{if $error}<div class="notice" style="color: red">
        {$error}
    </div><br/>{/if}

    <div id="in_tender_{$product_id}">
        {if $is_product_tender == 0} {*Если продукт не участвует в тендере*}
            <form method="post" id="tender_form_{$product_id}">
                <select name="in_suppliers" id="in_suppliers_{$product_id}"  style="width: 80px;font-size: 12px;vertical-align: middle">
                    <option value="0">Выбрать</option>
                    {foreach from=$tenders item="tender" name="tender"}
                        <option value="{$tender->id}">{$tender->name|stripslashes}</option>
                    {/foreach}    
                </select>
                <a href="javascript:void(0)" onclick="AjaxFormRequest('in_tender_{$product_id}', 'tender_form_{$product_id}', '{$admin_url}tenders/add/'+document.getElementById('in_suppliers_{$product_id}').options[document.getElementById('in_suppliers_{$product_id}').selectedIndex].value+'/{$product_id}/')"><img src="{$sys_images_url}save_small.png" alt="" style="vertical-align: middle" /></a>

            </form>
        {else}
            <div class="notice">Продукт участвет в тендере 
                {foreach from=$tenders item="tender" name="tender"}
                {if $tender->id == $is_product_tender}<strong>&laquo;{$tender->name|stripslashes}&raquo;</strong>{/if}
            {/foreach} 
            <p><a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить продукт  из тендера &laquo;{$tender->name|stripslashes}&raquo;?')) AjaxRequest('in_tender_{$product_id}',  '{$admin_url}tenders/del/{$product_id}/{$is_product_tender}/')"><img src="{$sys_images_url}admin/del.png" alt="" style="vertical-align: middle" /></a></p>

        </div>
    {/if}
</div>