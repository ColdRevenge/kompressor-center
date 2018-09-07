<option value="0">Выбрать</option>
{foreach from=$get_values item="value"}
    {assign var="char_value_id" value=$value->id}
    <option value="{$value->id}" {if $selected_id == $value->id}selected="selected"{/if}>{$value->name|stripslashes} {$value->unit|stripslashes}</option>
{/foreach}