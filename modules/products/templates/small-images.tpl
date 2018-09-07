{*{if $product_images.1|@count > 1}*}
<div class="sm-photos" id="gallery_01">
    {assign var="image_count" value=$product_images.2|@count}
    {foreach from=$product_images.2 key="key" item="item_img" name="img"}<a {*href="javascript:void(0)"*}
       
                href="{$gallery_url}{$product_images.6.$key->file}"  rel="prettyPhoto">
    <img src="{$gallery_url}{$product_images.1.$key->file}" alt="{$product_images.1.$key->name|default:$product->name}"  /></a>{/foreach}

    </div>
    {*{/if}*}