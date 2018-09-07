
<div id="podbor">
    <div id="count_podbor_result">&nbsp;</div>
    <div id="mini-indicator">&nbsp;</div>
    <form method="post" action="" id="podbor_form_id">

        <input type="hidden" name="find-selection" value="1" />
        <script type="text/javascript" src="{$url}js/jqueryui.js"></script>
        {if $selected_char_value_id|@count} {* Если подбор работает в описании характеристик *}
            {foreach from=$selected_char_value_id item="item" key="key"}
                <input type="hidden" value="{$key}" name="desc_char[]" />
            {/foreach}
        {/if}
        {if $get_section->is_price == 1}
            <strong>Цена:</strong>
            <div id="slider_ui_block">
                <div class="ui-slider ui-slider-horizontal ui-widget ui-widget-content" id="slider_ui">
                    <div class="slider-r"></div>
                </div>
                <span class="input-center">
                    <div class="label-slide">
                        <label id="maxCostLabel">{$smarty.post.max_price|default:$category_price->max_price|number_format:0:"":""|default:0} р.</label>
                        <label id="minCostLabel">{$smarty.post.min_price|default:$category_price->min_price|number_format:0:"":""|default:0} р.</label>
                    </div>

                    <input type="hidden" name="min_price" id="minCost" value="{$smarty.post.min_price|default:$category_price->min_price|number_format|default:0}"  onfocus="this.className = 'selInput'" onblur = "this.className = ''" style="width: 55px;margin: 0 3px;text-align: center"/>
                    <input type="hidden" name="max_price" id="maxCost" value="{$smarty.post.max_price|default:$category_price->max_price|number_format:0:"":""|default:1000}" onfocus="this.className = 'selInput'" onblur = "this.className = ''" style="width: 55px;margin: 0 3px;text-align: center"/> 

                </span>
                {* Подгрузка слайдеров (js-часть) *}
                {include file="_slider_script.tpl" slider_id="#slider_ui" min_id="#minCost" max_id="#maxCost" min=$category_price->min_price|default:0 max=$category_price->max_price|default:1000}
            </div>
        {/if}

        {foreach from=$get_chars_podbor item="get_chars"}
            {if $get_chars->type == '0'}
                {include file="_slider_checkbox.tpl" id=$get_chars->char_id name=$get_chars->name category_id=$get_chars->category_id sort=$get_chars->sort is_desc_char=1}
            {elseif $get_chars->type == '1'}
                {include file="_slider_select.tpl" id=$get_chars->char_id name=$get_chars->name category_id=$get_chars->category_id sort=$get_chars->sort is_desc_char=1}
            {elseif $get_chars->type == '2'}
                {include file="_slider_radio.tpl" id=$get_chars->char_id name=$get_chars->name category_id=$get_chars->category_id sort=$get_chars->sort is_desc_char=1}
            {/if}
        {/foreach}
        {*        {include file="_slider_checkbox.tpl" id='640' name="Тип изделия"}
        {include file="_slider_checkbox.tpl" id='486' name="Состояние контактов"}
        {include file="_slider_checkbox.tpl" id='347' name="Напряжение в ШС, В"}*}



        {*{if $get_section->is_brand == 1 && $shop != 'platok'}
            <strong>Производитель:</strong>
            <span>
                <select name="brand_id">
                    <option value="0">Выбрать</option>
                    {foreach from=$selection_brands item="ctype"}
                        {assign var="list_brand_id" value=$ctype->id}
                        <option value="{$list_brand_id}" {if $smarty.post.brand_id == $list_brand_id} selected="selected"{/if}>{$ctype->name}</option>
                    {/foreach}
                </select>
            </span>
        {/if}*}

        {if $get_section->is_param_1 == 1}
            <span>        
                <input type="checkbox" name="is_param_1" value="1" {if $smarty.post.is_param_1 == 1}checked="checked"{/if} id="checkbox_is_param_1"><label for="checkbox_is_param_1">Распродажа</label>
            </span>
        {/if}
        {if $get_section->is_param_2 == 1}
            <span>        
                <input type="checkbox" name="is_param_2" value="1" {if $smarty.post.is_param_2 == 1}checked="checked"{/if} id="checkbox_is_param_2"><label for="checkbox_is_param_2">Новинки</label>
            </span>
        {/if}
        {if $get_section->is_param_3 == 1}
            <span>        
                <input type="checkbox" name="is_param_3" value="1" {if $smarty.post.is_param_3 == 1}checked="checked"{/if} id="checkbox_is_param_3"><label for="checkbox_is_param_3">Распродажа</label>
            </span>
        {/if}
        {if $get_section->is_param_4 == 1}
            <span>        
                <input type="checkbox" name="is_param_4" value="1" {if $smarty.post.is_param_4 == 1}checked="checked"{/if} id="checkbox_is_param_4"><label for="checkbox_is_param_4">Распродажа</label>
            </span>
        {/if}
        {if $get_section->is_param_5 == 1}
            <span>        
                <input type="checkbox" name="is_param_5" value="1" {if $smarty.post.is_param_5 == 1}checked="checked"{/if} id="checkbox_is_param_5"><label for="checkbox_is_param_5">Распродажа</label>
            </span>
        {/if}

        <input type="hidden" name="category_id" value="{$open_category_id}" />
        <button onclick="$('#podbor_top_form_id').trigger('reset');
                AjaxRequestInd('left_box', '{$url}{$catalog_dir}/find-selection/', '#indicator_catalog', null, null, 'podbor_form_id');
                return false;"></button>
    </form>

    <div class="clear"></div>
</div>
<script type="text/javascript">
    $('#count_podbor_result').attr('onclick', $('#podbor button').attr('onclick'));
    $('#count_podbor_result').css({
        'top': $('#podbor').offset().top
    });
    $('#podbor input, #podbor select').change(function () {
        /* Ползунок как на яндексе с кнопкой показать: */
    {*   AjaxFormRequest('count_podbor_result', 'podbor_form_id', '{$url}{$catalog_dir}/find-selection/1/');
    $('#count_podbor_result').animate({
    'top': $(this).offset().top
    }, 700);
    $('#count_podbor_result').fadeIn('fast');*}
        $('#podbor button').click();
    });
    $('#podbor a.ui-slider-handle').mouseup(function () {
        $('#podbor input[type="text"]').eq(0).change();
    });
</script>