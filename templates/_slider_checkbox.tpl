{this->getCharsPodbor id=$id assign="chars_id" sort=$sort  is_desc_char=$is_desc_char}
{if $chars_id|@count}
    <div class="{if $id == 2 || $id == 63}podbor-param-color{/if}">
        <div class="p-sel">{$name}{if $id == 2 || $id == 63}<span id="color-title">&nbsp;</span>{/if}</div>
        <div class="p-check">
            <div style="text-align: center">
                {foreach from=$chars_id item="char"}
                    {if ($id == 2 || $id == 63) && $char->icon}
                        {assign var="_char_id" value=$char->id}
                        <div{if $char->characteristic_id == 2 || $char->characteristic_id == 63} class="set-color-filtr{if $smarty.post.char_value.$id.$_char_id == 1} color-active-filtr{/if}"{/if}>{if $char->characteristic_id == 2 || $char->characteristic_id == 63}<label for="checkbox_{$char->id}" style="background-image: url(/images/icons/{$char->icon})" title="{$char->name|replace:"?":""|stripslashes}"><input style="display: none;"{if $id == 2 || $id == 63}  title="{$char->name|replace:"?":""|stripslashes}"{/if} id="checkbox_{$char->id}" type="checkbox" name="char_value[{$id}][{$char->id}]" value="1" {if $smarty.post.char_value.$id.$_char_id == 1}checked="checked"{/if} id="checkbox_{$char->id}" /><div>&nbsp;</div></label>{else}<input id="checkbox_{$char->id}" type="checkbox" name="char_value[{$id}][{$char->id}]" value="1" {if $smarty.post.char_value.$id.$_char_id == 1}checked="checked"{/if} id="checkbox_{$char->id}" /><label for="checkbox_{$char->id}">{$char->name|replace:"?":""|stripslashes}</label><label for="checkbox_{$char->id}">&nbsp;</label>{/if}</div>
                            {/if}
                        {/foreach}  
            </div>
            {foreach from=$chars_id item="char"}
                {assign var="_char_id" value=$char->id}
                {if  $id != 63 && $id != 2 && $_char_id != 170}
                    <div{if $char->characteristic_id == 2 || $char->characteristic_id == 63} class="set-color-filtr{if $smarty.post.char_value.$id.$_char_id == 1} color-active-filtr{/if}"{/if}>{if $char->characteristic_id == 2 || $char->characteristic_id == 63}<label for="checkbox_{$char->id}" style="background-image: url(/images/icons/{$char->icon})"><input style="display: none;" id="checkbox_c" type="checkbox" name="char_value[{$id}][{$char->id}]" value="1" {if $smarty.post.char_value.$id.$_char_id == 1}checked="checked"{/if} id="checkbox_{$char->id}" /><div>&nbsp;</div></label>{else}<input id="checkbox_{$char->id}" type="checkbox" name="char_value[{$id}][{$char->id}]" value="1" {if $smarty.post.char_value.$id.$_char_id == 1}checked="checked"{/if} id="checkbox_{$char->id}" /><label for="checkbox_{$char->id}">{$char->name|replace:"?":""|stripslashes}</label><label for="checkbox_{$char->id}">&nbsp;</label>{/if}</div>
                        {/if}
                    {/foreach} 
        </div>
    </div>
{/if}
