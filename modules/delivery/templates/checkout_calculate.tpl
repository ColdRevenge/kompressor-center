{if isset($response.postamat) && isset($response.postamat.cost) && $response.postamat.cost > 0}

    <div id="check_out_hidden">
        <input type="hidden" value="" id="delivery_cost" name="delivery_cost" />
        <input type="hidden" value="" id="delivery_minTerm" name="delivery_minTerm" />
        <input type="hidden" value="" id="delivery_maxTerm" name="delivery_maxTerm" />
        <input type="hidden" value="" id="delivery_addressPvz" name="delivery_addressPvz" />
        <input type="hidden" value="" id="delivery_type" name="delivery_type" />
    </div>

    {if $response.express.deliveryId|@count} {* Постоматы *}
            <div style="padding: 4px 0">
                <a href="javascript:void(0)" onclick="if ($(this).next().next().css('display') != 'block') {
                            $(this).next().next().fadeIn();
                        } else {
                            $(this).next().next().fadeOut();
                        }" class="h3">Курьерская доставка</a><span class="check-price"> - от <b>{$response.express.cost} </b>руб. <span class="notice">от {$response.express.minDeliveryTerm} до {$response.express.maxDeliveryTerm} дней </span></span>
                <div style="padding-top: 5px;display: none">
                    {obj->utf8Convert convert=$adress assign="adress_str"}
                    <label><input type="radio" onchange="
                            $('#delivery_cost').val('{$response.express.cost}');
                            $('#delivery_minTerm').val('{$response.express.minDeliveryTerm}');
                            $('#delivery_maxTerm').val('{$response.express.maxDeliveryTerm}');
                            $('#delivery_addressPvz').val('');
                            $('#delivery_type').val('express');" {if $response.express.deliveryId  == $smarty.post.delivery_id} checked="checked"{/if} name="delivery_id" value="{$response.express.deliveryId}">Курьерская доставка - <b>{$response.express.cost} руб.</b> 
                        <span class="notice">от {$response.express.minDeliveryTerm} до {$response.express.maxDeliveryTerm} дней</span><br/>
                        <span class="notice">{obj->utf8Convert convert=$response.express.additionalInfo.0}</span>
                    </label>

                </div>
            </div>
        {/if}

        {if $response.postamat.addresses|@count} {* Постоматы *}
                <div style="padding: 4px 0">
                    <a href="javascript:void(0)" onclick="if ($(this).next().next().css('display') != 'block') {
                                $(this).next().next().fadeIn();
                            } else {
                                $(this).next().next().fadeOut();
                            }" class="h3">Доставка в постамат</a><span class="check-price"> - от <b>{$response.postamat.cost} </b>руб. <span class="notice">от {$response.postamat.minDeliveryTerm} до {$response.postamat.maxDeliveryTerm} дней </span></span>
                    <div style="padding-top: 5px;display: none;">
                        {foreach from=$response.postamat.addresses item="adress" key="key"}
                            {obj->utf8Convert convert=$adress assign="adress_str"}
                            <label><input type="radio" onchange="
                                    $('#delivery_cost').val('{$response.postamat.costs.$key}');
                                    $('#delivery_minTerm').val('{$response.postamat.minTerms.$key}');
                                    $('#delivery_maxTerm').val('{$response.postamat.maxTerms.$key}');
                                    $('#delivery_addressPvz').val('{$adress_str}');
                                    $('#delivery_type').val('postamat');" {if $response.postamat.deliveries.$key  == $smarty.post.delivery_id} checked="checked"{/if} name="delivery_id" value="{$response.postamat.deliveries.$key}">{$adress_str} - <b>{$response.postamat.costs.$key} руб.</b> 
                                <span class="notice">от {$response.postamat.minTerms.$key} до {$response.postamat.maxTerms.$key} дней</span></label>
                            {/foreach}
                    </div>
                </div>
            {/if}

            {if $response.pvz.addresses|@count} {* Постоматы *}

                    <div style="padding: 4px 0">
                        <a href="javascript:void(0)" onclick="if ($(this).next().next().css('display') != 'block') {
                                    $(this).next().next().fadeIn();
                                } else {
                                    $(this).next().next().fadeOut();
                                }" class="h3">Доставка в ПВЗ</a><span class="check-price"> - от <b>{$response.pvz.cost} </b>руб. <span class="notice">от {$response.pvz.minDeliveryTerm} до {$response.pvz.maxDeliveryTerm} дней </span></span>
                        <div style="padding-top: 5px;display: none;">
                            {foreach from=$response.pvz.addresses item="adress" key="key"}
                                {obj->utf8Convert convert=$adress assign="adress_str"}
                                <label><input type="radio" onchange="
                                        $('#delivery_cost').val('{$response.pvz.costs.$key}');
                                        $('#delivery_minTerm').val('{$response.pvz.minTerms.$key}');
                                        $('#delivery_maxTerm').val('{$response.pvz.maxTerms.$key}');
                                        $('#delivery_addressPvz').val('{$adress_str}');
                                        $('#delivery_type').val('pvz');" {if $response.pvz.deliveries.$key  == $smarty.post.delivery_id} checked="checked"{/if} name="delivery_id" value="{$response.pvz.deliveries.$key}">{obj->utf8Convert convert=$adress} - <b>{$response.pvz.costs.$key} руб.</b> 
                                    <span class="notice">от {$response.pvz.minTerms.$key} до {$response.pvz.maxTerms.$key} дней</span></label>
                                {/foreach}
                        </div>
                    </div>
                {/if}



            {/if}