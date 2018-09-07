{foreach from=$products item="product"}
    {assign var="product_id" value=$product->id}
    <div style="display: inline-block; border: 1px solid red; margin: 10px;"><a href="{$url}products/{$product->pseudo_dir}/"><img src="{$gallery_url}{$product_images.$product_id.3.0->file}" alt="" /></a><br/>{$product->name}</div>
{/foreach}