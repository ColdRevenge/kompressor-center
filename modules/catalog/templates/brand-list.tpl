{if $all_brands|@count}
    <div class="category-brand">
        {foreach from=$all_brands item="icategory" name="icategory"}
            <div class="category-list">
                <a href="{$url}{$catalog_dir}/brand/{$icategory->pseudo_dir}/">
                    <div><img src="/images/icons/{if $icategory->icon}{$icategory->icon}{else}no-image.png{/if}" alt=""  style="width: auto; height: auto;" /></div>
                    <span>{$icategory->name|stripslashes}</span>
                </a>
            </div>
        {/foreach}
    </div>
{/if}