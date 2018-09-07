<div class="small_desc_content">
    {if $characteristics_tech|@count}
        {foreach from=$characteristics_tech item="characteristic" key="char_id"}
            {if $characteristic->is_catalog == 1}
                <strong>{$characteristic->name}</strong><br/>
                {foreach from=$characteristics_tech_type.$char_id item="char_type" key="type_id" name="char_type"}
                    {if $characteristics_tech_product.$type_id|@count}
                        {if $char_type->is_catalog == 1}
                {$char_type->name|stripslashes}:{foreach from=$characteristics_tech_product.$type_id item='char_values' name='char_values'}{$char_values->name|stripslashes}{$char_values->unit|stripslashes}{if $smarty.foreach.char_values.iteration < $smarty.foreach.char_values.total}/{/if}{/foreach}{if $smarty.foreach.char_type.iteration < $smarty.foreach.char_type.total}<br/> {/if}

            {/if}
        {/if}
    {/foreach}
    <div style="width: 1px;height: 4px">&nbsp;</div>
{/if} 
{/foreach}
{/if}
</div><div class="small_desc_footer"></div>