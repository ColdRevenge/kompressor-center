{this->getCategoryAdress category_id=$open_category_id assign="category_adress"}

{if $shop == 'woman'}
    {assign var="size_char_id" value = "118"}
{elseif  $shop == 'lady'}
    {assign var="size_char_id" value = "51"}
{/if}

{this->getCharsPodbor id=$size_char_id assign="chars_menu" sort='1'}
{this->getCharacteristicPseudoDir char_id=$size_char_id assign="char_pseudo_dir"}

<ul>
    <li{if  !($selected_char_value_id|@count)} class="active"{/if}><a href="{$url}{$category_adress}">Все размеры</a></li>

    {foreach from=$chars_menu item="char_menu"}
        {assign var="char_valur_id" value=$char_menu->id}

        {this->getCheckerCharDesc assign="desc_checker" category_id=$open_category_id char_value_id = $char_valur_id char_value_2_id=0 char_value_3_id=0 char_value_4_id=0}

        <li{if  $selected_char_value_id.$char_valur_id == '1'} class="active"{/if}><a href="{$url}{$category_adress}char/{$char_pseudo_dir}/{$char_menu->pseudo_dir}/">Размер {$char_menu->name|stripslashes}</a></li>
    {/foreach}</ul>
