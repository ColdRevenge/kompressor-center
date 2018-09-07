{if $get_products|@count}
    <div class="h1"><a href="{$url}{$catalog_dir}/">Сравнение товаров</a></div>
    <div class="block-wrapper">
        <div class="content-block" id="vs_porduct_links">       
            {foreach from=$get_products item="product"}
                <div><a href="{$url}products/{$product->pseudo_dir}/">{$product->name}</a></div>
            {/foreach}
        </div>
    </div>
{/if}