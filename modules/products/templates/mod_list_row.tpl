{foreach from=$mod_list item="product_mod" name="product_mod"}
    {include file="mod_list_row_td.tpl"}
{foreachelse}
    {include file="mod_list_row_td.tpl"}
{/foreach}

