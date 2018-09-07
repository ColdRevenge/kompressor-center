<script type="text/javascript" src="{$url}js/niceCheckbox.js"></script>
<script type="text/javascript" src="{$url}js/jqueryui.js"></script>
<style type="text/css">{literal}
    .niceCheck {
        width: 21px;
        height: 21px;
        overflow: hidden;
        display: inline-block;
        cursor: pointer;
        vertical-align: middle;
        background: url(/js/nc/check-bg.png) left top no-repeat;	
    }
    .niceChecked {
        background-position: left bottom;
    }
    .niceCheck input {
        margin-left: -30px;/* Смещаем чекбокс в лево, чтобы его не было видно */
    }



    #slider {
        width: 200px;
    }
    .ui-slider {
        position: relative;
    }
    .ui-slider .ui-slider-handle {
        position: absolute;
        z-index: 2;
        width: 13px;  
        height: 21px;  
        outline: none;
        background: url(/images/slider/polz.png) no-repeat;
        cursor: pointer
    }
    .ui-slider .ui-slider-range {
        position: absolute;
        z-index: 1;
        font-size: .7em;
        display: block;
        border: 0;
        overflow: hidden;
    }
    .ui-slider-horizontal {
        height: 3px; 
    }
    .ui-slider-horizontal .ui-slider-handle { 
        top: -5px;
        margin-left: -6px;
    }
    .ui-slider-horizontal .ui-slider-range {
        top: 0;
        height: 100%;
    }
    .ui-slider-horizontal .ui-slider-range-min { 
        left: 0;
    }
    .ui-slider-horizontal .ui-slider-range-max {
        right: 0;
    }
    .ui-widget-content { 
        height: 6px;
        background: url(/images/slider/slider-bg.png) left center no-repeat;
    }
    .ui-widget-header { 
        background: url(/images/slider/bg.png) center top repeat-x #35b136;
    }
    #slider .slider-r {
        height: 6px;
        background: url(/images/slider/slider-bg-right.png) right center no-repeat transparent;
    }

    {/literal}
    </style>
    <script type="text/javascript">{literal}
    jQuery("#slider").slider({
            min: 0,
            max: 1000,
            values: [0,1000],
            range: true
    });{/literal}
    </script>



    <div id="breadcrumbs"><a href="{$url}">Главная</a>  &raquo;  <span>Подбор товаров</span></div>
    {if isset($smarty.post.selection_submit)}
        {include file="catalog.tpl" is_selection_post=isset($smarty.post.selection_submit) is_selection=1}
    {/if}
    <div class="clear">&nbsp;</div>


    <form method="post" action="">
        <table style="width: 900px;margin-left: 50px;" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td valign="top" align="left" style="width: 250px;"> 
                    <div>
                        <div class="h2" style="margin-bottom: 10px;">Тип</div>
                        <input type="checkbox" class="niceCheck" name="category[684]" {if $smarty.post.category.684 == 1}checked="checked"{/if }value="1" id="category_684" /><label for="category_684" style="margin-right: 20px;"> Ноутбук</label>
                        <input type="checkbox" class="niceCheck" name="category[685]" {if $smarty.post.category.685 == 1}checked="checked"{/if }value="1" id="category_685" /><label for="category_685"> Нетбук</label>
                    </div>
                </td>
                <td valign="top" align="left">

                    <div class="h2" style="margin-top: 15px; margin-bottom: 10px;">Стоимость</div>
                    <div class="ui-slider ui-slider-horizontal ui-widget ui-widget-content" id="slider">

                        <div class="slider-r"></div>
                    </div>
                    {if ! $setting->hide_prices}
                        <div id="price_field">
                            от <input type="text" name="min_price" id="minCost" value="{$smarty.post.min_price|default:5000}"/>
                            до <input type="text" name="max_price" id="maxCost" value="{$smarty.post.max_price|default:100000}"/> руб.
                        </div>
                    {/if}
                </td>
                <td valign="middle" align="left" style="width: 200px;">
                    <input type="image" src="{$fronted_images_url}podbor_small.png" id="podbor_img_button" alt="" />
                    <input type="image" src="{$fronted_images_url}reset.png" onclick="location.href=''; return false;" id="podbor_reset_button" alt="" />

                </td>

            </tr>
        </table>
        <input type="hidden" name="selection_submit" value="Подбор" />
        {if $characteristics_tech|@count}
            {foreach from=$characteristics_tech item="characteristic" key="char_id"}
                {if $characteristic->is_selection == 1}
                    <div class="selection_h" onclick="showSelection('selection_id_{$characteristic->id}')"><div id="img_selection_id_{$characteristic->id}" class="plus">{$characteristic->name}</div></div>
                    <div id="selection_id_{$characteristic->id}" class="selection_desc" >
                        {assign var="c_id" value=$characteristic->id}
                        {* Характиристики *}
                        {foreach from=$characteristics_tech_type.$c_id.0 item="char_type" key="type_id" name="char_type"}
                            {if $char_type->is_selection == 1}
                                <div class="selection_box"> 
                                    <div class="strong">{$char_type->name}</div>
                                    {assign var="c_type_id" value=$char_type->id}
                                    {*значения*}
                                    {foreach from=$characteristics_tech_type.$c_id.$c_type_id item="char_value" key="value_id" name="char_value"}
                                        {assign var="current_char_value_id" value=$char_value->id}
                                        <div class="checkbox_box"><input type="checkbox" class="niceCheck" name="char_value[{$char_value->id}]" {if $smarty.post.char_value.$current_char_value_id}checked="checked"{/if} value="{$char_type->id}" id="checkbox_{$char_value->id}" /> <label for="checkbox_{$char_value->id}">{$char_value->name}</label></div>
                                        {/foreach}
                                </div>
                            {/if}
                        {/foreach} 
                        <div class="clear">&nbsp;</div>
                    </div>                
                {/if}
            {/foreach}
        {/if}
    </form>






    <script type="text/javascript">
        var min_price = 5000;
        var max_price = 100000;
     
        jQuery("#slider").slider({
        min: min_price,
        max: max_price,
        values: [{$smarty.post.min_price|default:5000},{$smarty.post.max_price|default:100000}],
        step: 10,
        range: true,
        stop: function(event, ui) {
        jQuery("input#minCost").val(jQuery("#slider").slider("values",0));
        jQuery("input#maxCost").val(jQuery("#slider").slider("values",1));
    },
    slide: function(event, ui){
    jQuery("input#minCost").val(jQuery("#slider").slider("values",0));
    jQuery("input#maxCost").val(jQuery("#slider").slider("values",1));
}
});

function validateField() {
var value1=parseInt(jQuery("input#minCost").val());
var value2=parseInt(jQuery("input#maxCost").val());

if (isNaN(value1)) {
value1 = min_price;
jQuery("input#minCost").val(value1);
}
else jQuery("input#minCost").val(value1)

if (isNaN(value2)) {
value2 = max_price;
jQuery("input#maxCost").val(value2);
}
else jQuery("input#maxCost").val(value2)
}

    
jQuery("input#minCost").change(function(){
validateField()
var value1=parseInt(jQuery("input#minCost").val());
var value2=parseInt(jQuery("input#maxCost").val());

if (value1 < min_price) { value1 = min_price; jQuery("input#minCost").val(value1)}
if(parseInt(value1) > parseInt(value2)){
value1 = value2;
jQuery("input#minCost").val(value1);
}
jQuery("#slider").slider("values",0,value1);	
});

	
jQuery("input#maxCost").change(function(){
validateField();
var value1=parseInt(jQuery("input#minCost").val());
var value2=parseInt(jQuery("input#maxCost").val());

if (value2 > max_price) { value2 = max_price; jQuery("input#maxCost").val(value2)}

if(parseInt(value1) > parseInt(value2)){
value2 = value1;
jQuery("input#maxCost").val(value2);
}
jQuery("#slider").slider("values",1,value2);
});

    </script>

