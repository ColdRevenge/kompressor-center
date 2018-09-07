{* Подгрузка списка категорий, например для раздела страницы, или др. разделов *}
{if $tree[$id][0] != ""}
<div{if !$parents_category_arr.$parent_id && $level > 0} style="display: none; "{/if}  id="parent_{$id}" class="parent_{$id}">
{foreach from=$tree[$id] key="key" item="subtree"}
{assign var="parent_id" value=$subtree->id}
{if $subtree->is_visible == 1 && $subtree->id != 793  && $subtree->id != 787 }

    <div style="padding: 2px 0px; margin-left: {$level*35}px">
        <label class="p-check" style="padding-right: 2px;vertical-align: middle"><input type='checkbox' value="{$subtree->id}" id="input_{$subtree->id}" onchange="{if $tree[$parent_id]|@count != 0}jQuery('#parent_{$parent_id} input').attr('checked', this.checked);{/if};jQuery('#products_{$parent_id} input').attr('checked', this.checked); " name="category_id[]" /><em>&nbsp;</em></label><a href="javascript:void(0)" onclick="{if $tree[$parent_id]|@count != 0}Show('parent_{$parent_id}'){/if};Show('products_{$parent_id}');" {if $open_category_id == $parent_id}class="selected_catalog"{/if}>{$subtree->name}</a>

{include file="tree_category_product.tpl" id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1 offset=$offset}
 

                {if $products.$parent_id|@count}
        <div  id="products_{$tree[$id][$key]->id}" style="display: none;" >
            <div style="background-color: white; border: 1px solid #CCCCCC;padding: 20px;margin: 10px 50px;" id="get_product_{$category_id}">
    {foreach from=$products.$parent_id item="product" key="key"}
                <div class="product">
                    {* Вывод изображений *}
   {* {if $product_images.$parent_id.$key.1} 
                    <a  target="_blank" href="{$shop_url}products/{$product->pseudo_dir}/" title="{$product->name} ({$product->price} руб.)" style="text-decoration: none;"><img src="{$gallery_url}{$product_images.$parent_id.$key.2.0->file}" alt="{$product_images.$parent_id.$key.1.0->name|default:$product->name}" title="{$product_images.$parent_id.$key.1.0->name|default:$product->name}" /></a><br/>
    {/if}*}
                    <a target="_blank" href="{$shop_url}products/{$product->pseudo_dir}/">{$product->name|stripslashes}</a>
                    <div style="margin-top: 5px;">
                        <label class="p-check"><input type="checkbox"  title="Добавить в Яндекс Маркет" name="products_id[{$parent_id}][]" value="{$product->id}" style="vertical-align: middle; margin-right: 5px;" id="add_{$product->id}" /><em>&nbsp;</em><span>В Яндекс Маркет</span></label>
                    </div>
                </div>
{/foreach}
            </div>
        </div>
{/if}

   </div>
{/if}
{/foreach}
</div>
{/if}