{this->getCharsPodbor id=$id assign="chars_id" category_id=$category_id sort=$sort}

{if $chars_id|@count}
    <strong>{$name}</strong>
    <span>
        {foreach from=$chars_id item="char"}
            {assign var="_char_id" value=$char->id}
            <input type="radio" name="char_value[{$id}]" value="{$char->id}" {if $smarty.post.char_value.$_char_id == 1}checked="checked"{/if} id="checkbox_{$char->id}"><label for="checkbox_{$char->id}">{$char->name|stripslashes} <em>({$char->count})</em></label>
        {/foreach}  
    </span>
{/if}