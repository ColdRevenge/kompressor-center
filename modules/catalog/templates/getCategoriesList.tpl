<div>
    <div class="categories">
        {foreach from=$categoriesList item="icategory" name="icategory"}
            {assign var="icategory_id" value=$icategory->id}
            {if $icategory->is_visible == 1}
                <div class="categories__item categories__item--{$modificator}">
                    <a class="categories__link" href="{if $subtree->link}{$subtree->link}{else}{$url}{category_obj->getFullAdressCategoryIdRoutes category_id=$icategory->id}{/if}" title="{$icategory->name|stripslashes}">
                        <span class="categories__item-image">
                            <img src="/images/icons/{if $icategory->icon}{$icategory->icon}{else}no-image.png{/if}" alt="{$icategory->name|stripslashes}" />
                        </span>
                        <span class="categories__item-text">{$icategory->name|stripslashes}</span>
                    </a>
                </div>
            {/if}
        {/foreach}
    </div>
</div>