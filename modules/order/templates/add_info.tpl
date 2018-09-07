{if $is_mobile == 1}{include file="add_info_mobile.tpl"}{else}
    <div class="text">
        <div class="text-page" style="min-height: 100px;">
            <h1 style="margin: 10px 0; display: block; font-size: 26px;">Спасибо за Ваш заказ!</h1>
            {if $is_payment == 1}
                <div style="font-size: 18px">
                    {if $order->payment_method_id == 1}
                        <p>Ваш заказ принят. Наш менеджер свяжется с вами в ближайшее время</p><br />
                    {elseif $order->payment_method_id == 2}
                        <p>Ваш заказ принят. На указанный Вами электронный адрес в ближайшее время будет выставлен счёт на оплату</p>
                    {else}
                        <p>Для завершения оформления заказа  его необходимо оплатить: </p>
                    {/if}
                </div>

                <p style="line-height: 1.6em;">
                    Заказ №: <b>{$order->id}</b><br/>
                    Сумма к оплате: <b>{$order->sum_total|number_format:"0":".":" "} руб.</b><br/>

                    {if $smarty.get.pay_success == 1}
                        <br/><br/><br/>
                    <h2 style="text-align: center">Ваш заказ успешно оплачен!!</h2>
                    <h3 style="text-align: center">В ближайшее время с Вами свяжется наш менеджер, для уточнения деталей</h3>
                    <br/><br/>
                {elseif $smarty.get.pay_error == 1}
                    <br/>
                    {$payment_form}
                    <h2 style="text-align: center;color: #f94208;">Ваш заказ не оплачен</h2>

                {else}
                    {$payment_form}
                {/if}
                </p>

                {assign var="all_price" value=$order->delivery_price}
                {assign var="all_price_not_delivery" value=0}


                {*        <p>Рекоммендуем вам оплачить товар после уточнения наличия на складе. Для этого нажмите на кнопку "Отложенный платеж", и ждите звонка наших менеджеров. </p> 
                <button id="payment_after" onclick="location.href = '{$url}order/after/'"></button>*}


            {else}  <br/>  
                <h3 style="text-align: center;">Заказ успешно оформлен! <br/>В ближайшее время с вами свяжутся наши менеджеры<br/><br/>Ваш номер заказа: <b>{$order->id}</b></h3>
                {/if}
                {if $sig}
                    {*        <script src="https://www.kupivkredit.ru/widget/vkredit.js">
                    </script> 
                    <script>
                    $(document).ready(function() {
                    vkredit = new VkreditWidget(1, /*цвет кнопки*/ {$all_sum_credit}, /*цена в 
                    месяц*/ {
                    order: "{$base64}",
                    sig: "{$sig}"
                    });
                    vkredit.insertButton('fieldset'); // вставка кнопки с указанием 
                    });
                    </script>*}
                <div style="text-align: center; padding-top: 21px;">
                    <div id="fieldset">&nbsp;</div>
                </div>
            {/if}
        </div>
        <br/>
        <script type="text/javascript">
            var yaParams = {$metrika_order}
        </script> 
        <h1 style="margin-bottom: 15px;">Ваш заказ</h1>
        <table cellpadding="4" cellspacing="0" border="3" width="100%"  style="width: 90%; margin: 10px auto;">
            <tbody>
                <tr>
                    <td valign="middle" align="center" class="table_header">&nbsp;</td>
                    <!--                <td valign="middle" align="center">&nbsp;</td>-->
                    <td valign="middle" align="center" class="table_header" style="width: 200px;">Название</td>
                    <td valign="middle" align="center" class="table_header">Кол-во</td>
                    <td valign="middle" align="center" class="table_header">Стоимость</td>
                </tr>
            </tbody>
            {assign var="all_price" value=$order->delivery_price}
            {assign var="all_price_not_delivery" value=0}
            {foreach from=$products item="product"}
                {assign var="product_id" value=$product->product_id}
                {assign var="_shop_url" value=$url}
                <tbody>
                    <tr>
                        <!--            <td valign="middle" align="center">&nbsp;</td>-->
                        <td valign="middle" align="center" style="text-align: center;">
                            {if $product->file}<img src="{$gallery_url}{$product->file}" alt="" />{/if}

                        </td>
                        <td valign="middle" align="center">
                            <a href="{$shop_url}products/{$product->pseudo_dir}/" style="font-size: 16px;" target="_blank">{$product->name|stripslashes} {*if $product->mod_name}({$product->mod_name|stripslashes}){/if*}</a>
                            {*<div class="notice" style="padding-top: 5px;">Размер:
                            {foreach from=$sizes.$product_id.2 item="size" name="size"}
                            {$size->name}{if $smarty.foreach.size.iteration != $smarty.foreach.size.total}, {/if}
                            {/foreach}
                            {$product->char_name_1}
                            </div>   *}   {*                    <div class="notice" style="padding-top: 5px;">Размер: {$product->mod_name}*}


                            {*if $product->char_name_1 || $product->char_name_2 || $product->char_name_3 || $product->char_name_4 || $product->char_name_5}<span class="span_zap">({if $product->char_name_1}<span>{$product->char_name_1}</span>{/if}{if $product->char_name_2}<span>{$product->char_name_2}</span>{/if}{if $product->char_name_3}<span>{$product->char_name_3}</span>{/if}{if $product->char_name_4}<span>{$product->char_name_4}</span>{/if}{if $product->char_name_5}<span>{$product->char_name_5}</span>{/if})</span>{/if*}
                            {*                    </div>*}
                        </td>
                        <td valign="middle" align="center"> {*                         basket(this, 1, {$mod->product_id}, {$mod->id}, 0, {$product_images.1.0->id|default:0}, document.getElementById('count_add_product_{$mod->id}').value); *}
                            {*<input type="text" readonly="readonly" value="{$product->count}" onfocus="this.className='selInput'" onblur = "this.className = 'text'" onchange="basket(3, {$product->product_id}, {$product->mod_id}, 0, {$product->image_id|default:0}, 0, 0, 0, parseInt(this.value));" class="text" style="width: 24px;text-align: center;" maxlength="2" />*}{$product->count} шт.</td>
                        <td valign="middle" align="center"><span class="price" style="font-size: 17px">{$product->sum|number_format:0|replace:",":"&nbsp;"} руб.</span></td>
                    </tr>
                </tbody>
            {/foreach}
            </tbody>
            <tr>
                <td valign="middle" align="right" colspan="6" style="font-size: 17px;background: none;text-align: right; padding-top: 10px;">
                    Итого: <b  style="font-size: 18px;font-weight: normal">{($order->sum_order + $order->sum_delivery)|number_format:0|replace:",":"&nbsp;"} руб. </b> {if $order->discount_procent && !$order->coupon_discount_sum}<b style="font-size: 20px; color: #e41b1f">-{$order->discount_procent}%</b> = <b style="font-size: 18px; font-weight: normal">{$order->sum_total|number_format:0|replace:",":"&nbsp;"} руб.</b>{/if}{* <b>{$default_currency->name}</b>*}
                </td>
            </tr>



            {if $order->discount_sum != 0 } {* ИСПОЛЬЗУЕТСЯ В ТИНЬКО ДЛЯ ПЕРКЛЮЧЕНИЯ КОЛОНОК *}
                    <tbody>
                        <tr>
                            <td valign="middle" align="right" colspan="6" style="font-size: 17px;text-align: right; background-color: transparent; color: red;">
                                Стоимость с учетом скидки: {$order->sum_total|number_format:0|replace:",":"&nbsp;"} руб.</td>
                        </tr>
                    </tbody>
                {/if}
            </table>

            <h1 style="margin-top: 0; padding-top: 0">Информация о заказе</h1>
            <div style="padding: 10px 20px; width: 85%;margin: auto">
                <table cellpadding="4" cellspacing="0" border="0" class="table_fields" style="margin: auto; ">
                    <tbody style="">
                        <tr>
                            <td valign="middle" align="right" style="text-align: right"><b>ФИО:</b></td>
                            <td valign="middle" align="center"style="text-align: left"><i>{$order->fio|default:"-"}</i></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right"><b>Телефон:</b></td>
                            <td valign="middle" align="center"style="text-align: left"><i>{$order->phone|default:"-"}</i></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right"><b>E-Mail:</b></td>
                            <td valign="middle" align="center"style="text-align: left"><i>{$order->email|default:"-"}</i></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right"><b>Доставка:</b></td>
                            <td valign="middle" align="center"style="text-align: left"><i>{if $order->delivery_name}{$order->delivery_name} ({$order->delivery_price}){else}-{/if}</i></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right"><b>Адрес:</b></td>
                            <td valign="middle" align="center"style="text-align: left"><i>{$order->adress|default:"-"}</i></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" style="text-align: right"><b>Комментарий:</b></td>
                            <td valign="middle" align="center"style="text-align: left"><i>{$order->comment|default:"-"}</i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br/><br/><br/><br/>
    {/if}