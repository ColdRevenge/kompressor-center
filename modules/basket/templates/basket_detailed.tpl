<div id="basket_detailed">
    {if $not_detailed != 1}
        <div class="breadcrumbs">
            <div class="container">
                <ul class="breadcrumbs__cont">
                    <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="{$url}">Главная</a></li>
                    <li class="breadcrumbs__item">Корзина</li>
                </ul>
            </div>
        </div>
    {/if}
    <div class="container text">
        {if $not_detailed != 1}<h1 class="headline">Корзина</h1>{/if}
        {if $basket}

            {if $is_coupon == 1}
                <div style="float: right; font-size: 15px;">
                    Введите № Вашей дисконтной карты &nbsp; 
                    <input type="text"
                           value="{if $smarty.session.coupon_code != ''}{$smarty.session.coupon_code}{else}{$user_coupon_code}{/if}"
                           name="coupon_code" id="coupon_code_text"
                           style="width: 95px;text-align: center" maxlength="9"
                           onchange="AjaxRequest('coupon_result', '{$host_url}discount/coupons/?is_html=1&number=' + $(this).val());
                                   $('#coupon_code').val(this.value);"
                           onkeyup="AjaxRequest('coupon_result', '{$host_url}discount/coupons/?is_html=1&number=' + this.value);
                                   $('#coupon_code').val(this.value)"/>
                </div>
            {/if}
            <style type="text/css">
                #content .is_basket_size_model_repeat td {
                    background-color: #f5f5f5;
                }

                #content .is_basket_size_model_repeat td .price {
                    color: gray;
                }

                #content .is_basket_size_model_repeat td img, #content .is_basket_size_model_repeat td button, #content .is_basket_size_model_repeat td .count a {
                    -webkit-filter: grayscale(1); /* Webkit браузеры */
                    filter: gray; /* для IE6-9 */
                    filter: grayscale(1); /* W3C */
                }

                #content .is_basket_size_model_repeat td a {
                    color: gray;
                }
            </style>
            <table cellpadding="4" cellspacing="0" width="100%" class="cart-table">
                <tbody>
                <tr>
                    <td class="cart-table__th">&nbsp;</td>
                    <!--                <td valign="middle" align="center">&nbsp;</td>-->
                    <td class="cart-table__th">Название</td>
                    <td class="cart-table__th">Количество</td>
                    <td class="cart-table__th" {if $setting->hide_prices}style="display: none;"{/if}>Стоимость
                    </td>
                    <td class="cart-table__th">&nbsp;</td>
                </tr>
                </tbody>
                {assign var="all_sum" value=0}

                {foreach from=$basket item="basket_item" name="basket"}
                    {assign var="product_id" value=$basket_item->product_id}
                    <tbody{if $is_size_model_repeat.$product_id|@count > 1} class="is_basket_size_model_repeat"{/if}>
                        <tr class="cart-table__tr">
                            <!--            <td valign="middle" align="center">&nbsp;</td>-->
                            <td class="cart-table__td">
                                {if $basket_item->image}<a href="{$gallery_url}{$basket_item->big_image}"
                                                           rel="prettyPhoto[gallery8]" title=""><img
                                            src="{$gallery_url}{$basket_item->image}" alt=""/></a>{/if}

                            </td>
                            <td class="cart-table__td">
                                    {assign var="_shop_url" value=$url}


                                    <a href="{$shop_url}products/{$basket_item->pseudo_dir}/"
                                       style="font-size: 15px;">{$basket_item->name|stripslashes} {*if $basket_item->mod_name}({$basket_item->mod_name|stripslashes}){/if*}</a>
                                    {if $basket_item->shop_id == '2'}
                                        <div class="notice" style="padding-top: 5px;">Размер:
                                            {foreach from=$sizes.$product_id.2 item="size" name="size"}
                                                {$size->name}{if $smarty.foreach.size.iteration != $smarty.foreach.size.total}, {/if}
                                            {/foreach}
                                            {$basket_item->char_name_1}
                                        </div>
                                    {/if}
                                    <div class="notice">
                                        {if $basket_item->warehouse <= 0}
                                            <span style="font-size: 13px;color: red">под заказ</span>
                                            {if $basket_item->is_credit == 1}, {/if}
                                        {/if}

                                        {if $basket_item->is_credit == 1}
                                            <span style="font-size: 13px;color: green">в кредит</span>
                                        {/if}
                                    </div>
                                    {*<div class="notice" style="padding-top: 5px;">Размер: {$basket_item->mod_name}
                                    {if $sizes.$product_id|@count}
                                    {foreach from=$sizes.$product_id item="size" name="size"}
                                    <span>{$size->name}</span>
                                    {/foreach}
                                    {/if}
                                    {if $basket_item->char_name_1 || $basket_item->char_name_2 || $basket_item->char_name_3 || $basket_item->char_name_4 || $basket_item->char_name_5}<span class="span_zap">({if $basket_item->char_name_1}<span>{$basket_item->char_name_1}</span>{/if}{if $basket_item->char_name_2}<span>{$basket_item->char_name_2}</span>{/if}{if $basket_item->char_name_3}<span>{$basket_item->char_name_3}</span>{/if}{if $basket_item->char_name_4}<span>{$basket_item->char_name_4}</span>{/if}{if $basket_item->char_name_5}<span>{$basket_item->char_name_5}</span>{/if})</span>{/if}*}
                                </div>
                            </td>
                            <td class="cart-table__td">
                                <div class="cart-counter">
                                    <a href="javascript: void(0);" 
                                       class="cart-counter__btn btn -small" 
                                       onclick="if ($(this).next('input').val() <= 1)
                                                               if (!confirm('Удалить товар?'))
                                                               return false;
                                                               basket(4, {$basket_item->product_id}, {$basket_item->mod_id}, 0, {$basket_item->image_id|default:0}, {$basket_item->char_id_1|default:0}, {$basket_item->char_id_2|default:0}, 0, 0, 0, parseInt($(this).next().val()), {$basket_item->type});">
                                       -
                                   </a>
                                   <input type="text" 
                                          maxlength="3" 
                                          class="cart-counter__input" 
                                          value="{$basket_item->count}" 
                                          style="border-left: 0; border-right: 0"
                                          onchange="basket(3, {$basket_item->product_id}, {$basket_item->mod_id}, 0, {$basket_item->image_id|default:0}, {$basket_item->char_id_1|default:0}, {$basket_item->char_id_2|default:0}, 0, 0, 0, parseInt(this.value), {$basket_item->type});"/>

                                    <a href="javascript: void(0);" 
                                       class="cart-counter__btn btn -small"
                                       onclick="basket(3, {$basket_item->product_id}, {$basket_item->mod_id}, 0, {$basket_item->image_id|default:0}, {$basket_item->char_id_1|default:0}, {$basket_item->char_id_2|default:0}, 0, 0, 0, parseInt($(this).prev().val()) + 1, {$basket_item->type});">
                                       +
                                   </a>
                                </div>
                            </td>

                    
                            <td class="cart-table__td" {if $setting->hide_prices}style="display: none;"{/if}>
                                <span class="price" style="font-size: 17px">
                                    {$basket_item->sum_price|number_format:0|replace:",":"&nbsp;"} руб.
                                </span>
                            </td>
                            <td class="cart-table__td">
                                <button alt="Удалить" 
                                        title="Удалить" 
                                        class="cart-table__remove btn -small -size18 -orange -rounded5"
                                        onclick="basket(2, {$basket_item->id}, {$basket_item->mod_id}, {$not_detailed}, {$basket_item->image_id|default:0}, {$basket_item->char_id_1|default:0}, {$basket_item->char_id_2|default:0})">
                                    ×
                                </button>
                            </td>
                        </tr>
                        {assign var="all_sum" value=$all_sum+$basket_item->sum_price}


                    </tbody>
                {/foreach}
                <tfoot {if $setting->hide_prices}style="display: none;"{/if}>
                    <tr>
                        <td valign="middle" align="right" colspan="6" style="text-align: right;font-size: 18px;padding-top: 5px;"
                            id="coupon_result">


                            Итого:
                            <b style="font-size: 24px;font-weight: normal">
                                {$all_sum|number_format:0|replace:",":"&nbsp;"}
                            </b> руб.
                            {if $discount}
                                <b style="font-size: 20px; color: #e41b1f">
                                    - {$discount}%
                                </b>
                                =
                                <b style="font-size: 18px; font-weight: normal">
                                    {$discount_sum|number_format:0|replace:",":"&nbsp;"} руб.
                                </b>
                            {/if}


                        </td>
                    </tr>
                </tfoot>
            </table>


            {if $not_detailed != 1}

                {if $setting->min_price <= $all_sum}
                    {if ! $smarty.post.fio}
                        <div id="order_button">
                            <button class="btn -bordered js-btn-preorder">Оформить заказ</button>
                        </div>
                        <div style="display: none" id="min_order_price_block">
                            <h2 style="color: red; text-align: center">Минимальная сумма заказа {$setting->min_price|stripslashes}
                                руб.</h2>
                        </div>
                    {/if}

                    <div class="order-form-container" id="order_form"{if $smarty.post.fio} style="display: block"{/if}>
                        {$order_form}
                    </div>
                {else}
                    <h2 style="color: red; text-align: center">Минимальная сумма заказа {$setting->min_price|stripslashes} руб.</h2>
                {/if}
            {/if}

            {if $is_coupon == 1}
                <script type="text/javascript">
                    AjaxRequestAsync('coupon_result', base_url + 'discount/coupons/?is_html=1&number=' + $('#coupon_code_text').val());
                    $('#coupon_code').val($('#coupon_code_text').val());
                </script>
            {/if}
            {if $lacking >= $sum_basket || $lacking_discount->discount > 0}<br/>
                <div class="basket-notice">
                    {if $lacking >= $sum_basket}
                        <div class="free_delivery">* При заказе от {$lacking} рублей - <a href="/dostavka/" target="_blank">доставка</a>
                            по городу бесплатно
                        </div>
                    {/if}
                    {* if $lacking >= $sum_basket}<div class="free_delivery">* Добавьте товаров на <b>{($lacking - $sum_basket)|number_format:0|replace:",":"&nbsp;"} руб.</b>, доставка заказа станет <b>БЕСПЛАТНОЙ</b>!</div>{/if *}
                    {if $lacking_discount->discount > 0}
                        <div class="free_delivery">* Добавьте товаров на сумму
                            <b>{($lacking_discount->sum_start - $sum_basket)|number_format:0|replace:",":"&nbsp;"} руб.</b> и
                            получите скидку <b>{$lacking_discount->discount}%</b>!
                            <br/>
                        </div>
                    {/if}
                </div>
            {/if}
        {else}
            <div class="text-page">
                <h2>В корзине нет товаров</h2>
            </div>
        {/if}
        </div>
    </div>
</div>
