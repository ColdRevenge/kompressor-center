<div class="podbor-list__cell podbor-item">
    <div class="podbor-item__data">
        <div class="podbor-item__title">{$name}:</div>
        <div class="podbor-item__value">
            <select class="podbor-item__select" name="char_value[{$id}]">
                <option value="0">Выбрать</option>
                {foreach from=$chars_id item="char"}
                    {assign var="_char_id" value=$char->id}
                    <option value="{$char->id}" {if $smarty.post.char_value.$_char_id == 1}selected="selected"{/if}>{$char->name|replace:"?":""|stripslashes}{* <em>({$char->count})</em>*}</option>
                {/foreach}  
            </select>
        </div>
    </div>
</div>