<div id="podbor_{$category_id}">
    <form action="{$url}{$catalog_dir}/find-selection/" id="podbor_form_id_{$category_id}" method="get" class="podbor">

        {assign var="podborI" value=0}

        <div class="podbor-list">
            <div class="podbor-list__row">
                {if $get_section.$category_id->is_brand == 1}
                    <div class="podbor-list__cell podbor-item">
                        <div class="podbor-item__data">
                            <div class="podbor-item__title">Производитель:</div>
                            <div class="podbor-item__value">
                                <select class="podbor-item__select" name="brand_id[{$category_id}]">
                                    <option value="0">Выбрать</option>
                                    {foreach from=$selection_brands.$category_id item="ctype"}
                                        {assign var="list_brand_id" value=$ctype->id}
                                        <option value="{$list_brand_id}" {if $smarty.post.brand_id == $list_brand_id} selected="selected"{/if}>{$ctype->name}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>
                    {assign var=podborI value=$podborI + 1}
                {/if}

                {foreach from=$get_chars_podbor.$category_id item="get_chars" key="key"}
                    {if $get_chars->type == '0'}

                        {this->getCharsPodbor id=$get_chars->char_id assign="chars_id" open_category_id=$open_category_id|default:null sort=$get_chars->sort  is_desc_char=1 showParam=1}
                        {if $chars_id|@count}
                            {include file=$base_dir|cat:"modules/catalog/templates/_slider_checkbox.tpl" id=$get_chars->char_id name=$get_chars->name chars_id=$chars_id}
                            {assign var=podborI value=$podborI + 1}
                        {/if}

                    {elseif $get_chars->type == '1'}

                        {this->getCharsPodbor id=$get_chars->char_id assign="chars_id" sort=$get_chars->sort open_category_id=$open_category_id|default:null  is_desc_char=1}
                        {if $chars_id|@count}
                            {include file=$base_dir|cat:"modules/catalog/templates/_slider_select.tpl" id=$get_chars->char_id name=$get_chars->name chars_id=$chars_id}
                            {assign var=podborI value=$podborI + 1}
                        {/if}

                    {elseif $get_chars->type == '3'}

                        {this->getCharsPodbor id=$get_chars->char_id assign="chars_id" open_category_id=$open_category_id|default:null category_id=$get_chars->category_id sort=$get_chars->sort is_range=1}
                        {include file=$base_dir|cat:"modules/catalog/templates/_slider_slide.tpl" id=$get_chars->char_id name=$get_chars->name chars_id=$chars_id}
                        {assign var=podborI value=$podborI + 1}

                    {/if}
                    {if ($podborI) % 3 == 0}
                        </div><div class="podbor-list__row">
                    {/if}
                {/foreach}

                {if $get_section.$category_id->is_price == 1 && ! $setting->hide_prices}
                    <div class="podbor-list__cell podbor-item">
                        <div class="podbor-item__data">
                            <div class="podbor-item__title">Цена:</div>
                            <div class="podbor-item__value _range">
                                <span class="podbor-item__from">от</span>
                                
                                <input type="text" 
                                       class="podbor-item__range" 
                                       name="min_price[{$category_id}]" 
                                       value="{$smarty.post.min_price.$category_id|default:$category_price.$category_id->min_price|number_format|default:0}" />

                                <span class="podbor-item__from">до</span>

                                <input type="text" 
                                       class="podbor-item__range" 
                                       name="max_price[{$category_id}]" 
                                       value="{$smarty.post.max_price.$category_id|default:$category_price.$category_id->max_price|number_format:0:"":""|default:1000}"/> 
                            </div>
                        </div>
                    </div>
                {/if}
            </div>
        </div>


        

        {if $get_section->is_param_1 == 1}
            <span>        
                <input type="checkbox" name="is_param_1[{$category_id}]" value="1" {if $smarty.post.is_param_1 == 1}checked="checked"{/if} id="checkbox_is_param_1"><label for="checkbox_is_param_1">Распродажа</label>
            </span>
        {/if}
        {if $get_section->is_param_2 == 1}
            <span>        
                <input type="checkbox" name="is_param_2[{$category_id}]" value="1" {if $smarty.post.is_param_2 == 1}checked="checked"{/if} id="checkbox_is_param_2"><label for="checkbox_is_param_2">Новинки</label>
            </span>
        {/if}
        {if $get_section->is_param_3 == 1}
            <span>        
                <input type="checkbox" name="is_param_3[{$category_id}]" value="1" {if $smarty.post.is_param_3 == 1}checked="checked"{/if} id="checkbox_is_param_3"><label for="checkbox_is_param_3">Распродажа</label>
            </span>
        {/if}
        {if $get_section->is_param_4 == 1}
            <span>        
                <input type="checkbox" name="is_param_4[{$category_id}]" value="1" {if $smarty.post.is_param_4 == 1}checked="checked"{/if} id="checkbox_is_param_4"><label for="checkbox_is_param_4">Распродажа</label>
            </span>
        {/if}
        {if $get_section->is_param_5 == 1}
            <span>        
                <input type="checkbox" name="is_param_5[{$category_id}]" value="1" {if $smarty.post.is_param_5 == 1}checked="checked"{/if} id="checkbox_is_param_5"><label for="checkbox_is_param_5">Распродажа</label>
            </span>
        {/if}

        <input type="hidden" name="category_id" value="{$category_id}" />
        <input type="hidden" name="find-selection" value="1" />
        <div style="clear: both; display: block;"></div>
        <div></div>
        <div class="podbor__button">
            <button class="btn -orange -size18" onclick="AjaxRequestInd('podbor-result', '{$url}{$catalog_dir}/find-selection/', '#indicator_catalog', null, null, 'podbor_form_id_{$category_id}');
                return false;">Подобрать</button>
        </div>
    </form>

    <div class="clear"></div>
</div>
<script type="text/javascript">
    $('#count_podbor_result_{$category_id}').attr('onclick', $('#podbor button').attr('onclick'));
    $('#count_podbor_result_{$category_id}').css({
        'top': $('#podbor_{$category_id}').offset().top
    });
    $('#podbor_{$category_id} input, #podbor_{$category_id} select').change(function () {
        /* Ползунок как на яндексе с кнопкой показать: */
        {*   AjaxFormRequest('count_podbor_result', 'podbor_form_id', '{$url}{$catalog_dir}/find-selection/1/');
        $('#count_podbor_result').animate({
        'top': $(this).offset().top
        }, 700);
        $('#count_podbor_result').fadeIn('fast');*}
        $('#podbor_{$category_id} button').click();
    });
    $('#podbor_{$category_id} a.ui-slider-handle').mouseup(function () {
        $('#podbor_{$category_id} input[type="text"]').eq(0).change();
    });
</script>
