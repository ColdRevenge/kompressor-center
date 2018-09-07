{this->getCharsPodbor id=$id assign="chars_id" sort=$sort  is_desc_char=$is_desc_char}
{if $chars_id|@count}
    <div class="p-sel">{$name}</div>
    {if $id == 55} {* Цвета *}
            <div class="p-check">
                <div style="text-align: center">
                    {foreach from=$chars_id item="char"}
                        {if $id == 55 && $char->icon}
                            {assign var="_char_id" value=$char->id}
                            <div{if $char->characteristic_id == 55} class="set-color-filtr{if $smarty.post.char_value.$id.$_char_id == 1} color-active-filtr{/if}"{/if}>{if $char->characteristic_id == 55}<label for="checkbox_{$char->id}" style="background-image: url(/images/icons/{$char->icon})" title="{$char->name|replace:"?":""|stripslashes}"><input style="display: none;" id="checkbox_{$char->id}" type="checkbox" name="char_value[{$id}][{$char->id}]" value="1" {if $smarty.post.char_value.$id.$_char_id == 1}checked="checked"{/if} id="checkbox_{$char->id}" /><div>&nbsp;</div></label>{else}<input id="checkbox_{$char->id}" type="checkbox" name="char_value[{$id}][{$char->id}]" value="1" {if $smarty.post.char_value.$id.$_char_id == 1}checked="checked"{/if} id="checkbox_{$char->id}" /><label for="checkbox_{$char->id}">{$char->name|replace:"?":""|stripslashes}</label><label for="checkbox_{$char->id}">&nbsp;</label>{/if}</div>
                                {/if}
                            {/foreach}  
                </div>
            </div>
        {elseif $id == 51} {* Размеры *}

            <div class="p-check p-check-{$id}">
                {foreach from=$chars_id item="char" name="char"}
                    {assign var="_char_id" value=$char->id}
                    {assign var="mod" value=ceil($chars_id|@count/4)}
                    {if $smarty.foreach.char.index%$mod == 0 && $smarty.foreach.char.index != 0}</div><div class="p-check p-check-{$id}">{/if}
                    <div><input id="checkbox_{$char->id}" type="checkbox" name="char_value[{$id}][{$char->id}]" value="1" {if $smarty.post.char_value.$id.$_char_id == 1}checked="checked"{/if} id="checkbox_{$char->id}" /><label for="checkbox_{$char->id}">{$char->name|replace:"?":""|stripslashes}</label><label for="checkbox_{$char->id}">&nbsp;</label></div>

                {/foreach}
            </div>

        {else} {* Все остальное *}
            <div class="p-check">
                {foreach from=$chars_id item="char"}
                    {assign var="_char_id" value=$char->id}
                    <div><input id="checkbox_{$char->id}" type="checkbox" name="char_value[{$id}][{$char->id}]" value="1" {if $smarty.post.char_value.$id.$_char_id == 1}checked="checked"{/if} id="checkbox_{$char->id}" /><label for="checkbox_{$char->id}">{$char->name|replace:"?":""|stripslashes}</label><label for="checkbox_{$char->id}">&nbsp;</label></div>
                        {/foreach}

            </div>
        {/if}
    {/if}
