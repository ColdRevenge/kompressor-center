{this->getCharsPodbor id=$id assign="chars_id" sort=$sort  is_desc_char=$is_desc_char}

{if $chars_id|@count}
    <div class="p-sel">{$name}</div>
    <span>
        <select name="char_value[{$id}]" onfocus="this.className = 'selInput'" onblur = "this.className = 'text'">
            <option value="0">Выбрать</option>
            {foreach from=$chars_id item="char"}
                {assign var="_char_id" value=$char->id}
                <option value="{$char->id}" {if $smarty.post.char_value.$_char_id == 1}selected="selected"{/if}>{$char->name|replace:"?":""|stripslashes}{* <em>({$char->count})</em>*}</option>
            {/foreach}  
        </select>
    </span>
{/if}