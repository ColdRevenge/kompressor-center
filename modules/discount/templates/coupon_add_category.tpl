{* Подгрузка списка категорий, например для раздела страницы, или др. разделов *}
{if $tree[$id][0] != ""}
    <div{if !$smarty.post.category_id.$id && $level > 0} style="display: none; "{/if}  id="parent_{$id}" class="parent_{$id}">
        {foreach from=$tree[$id] key="key" item="subtree"}
            {assign var="parent_id" value=$subtree->id}
            {if $subtree->is_visible == 1}

                <div style="padding: 2px 0px; margin-left: {$level*25}px">
                    <label class="p-check" style="padding-right: 3px;"><input type='checkbox' value="{$subtree->id}" id="input_{$subtree->id}" onchange="{if $tree[$parent_id]|@count != 0}jQuery('#parent_{$parent_id} input').attr('checked', this.checked);{/if};
                        jQuery('#products_{$parent_id} input').attr('checked', this.checked);" name="category_id[{$subtree->id}]" {if $smarty.post.category_id.$parent_id} checked="checked"{/if} /><em>&nbsp;</em></label><a href="javascript:void(0)" onclick="{if $tree[$parent_id]|@count != 0}Show('parent_{$parent_id}'){/if};
                                    Show('products_{$parent_id}');" {if $open_category_id == $parent_id}class="selected_catalog"{/if}>{$subtree->name}</a>

                    {include file="coupon_add_category.tpl" id=$tree[$id][$key]->id tree=$tree inc=$inc level=$level+1 offset=$offset}

                </div>
            {/if}
        {/foreach}
    </div>
{/if}