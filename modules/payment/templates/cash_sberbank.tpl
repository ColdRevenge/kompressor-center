{*<p><button class="payment" onclick="$(this).fadeOut('fast'); $('#sberbank_form').fadeIn('slow')">&nbsp;</button></p>*}

{assign var="sum_sber" value=($get_order->sum_total*0.95)|number_format:0:"":" "}
{if $is_mobile == 1}
    <div style="padding-bottom: 20px;width: 100%;text-align: center;" class="navigation-detailed" id="sberbank_form">
        <h2 style="text-align: center;">Оплата с помощью банковской карты Сбербанка</h2>
        <p style="margin-top: 8px;">Сумма оплаты: <b>{$sum_sber} руб.</b> <span class="notice">(сумма с учетом <b style="color: red">скидки 5%</b>)</span></p>
        <p style="text-align: center; margin-top: 3px;color: gray">
            В ближайшее время с Вами свяжется  менеджер для уточнения деталей заказа, после чего Вы сможете оплатить заказ при помощи сервиса Сбербанк Онлайн или ближайшего банкомата.

            {*       Для оплаты заказа Вам нужно внести сумму <b>{$sum_sber} руб.</b> на счет <b>4276 3800 1379 3646</b>. <br/>
            Внести можно через Банк.Онлайн, или через ближайший банкомат*}

        </p>
    </div>
{else}
    <div style="padding-bottom: 20px;width: 700px;text-align: center;" class="navigation-detailed" id="sberbank_form">
        <h2 style="text-align: center;">Оплата с помощью банковской карты Сбербанка</h2>
        <p style="margin-top: 8px;">Сумма оплаты: <b>{$sum_sber} руб.</b> <span class="notice">(сумма с учетом <b style="color: red">скидки 5%</b>)</span></p>
        <p style="text-align: center; margin-top: 3px;color: gray">
            В ближайшее время с Вами свяжется  менеджер для уточнения деталей заказа, после чего Вы сможете оплатить заказ при помощи сервиса Сбербанк Онлайн или ближайшего банкомата.

            {*       Для оплаты заказа Вам нужно внести сумму <b>{$sum_sber} руб.</b> на счет <b>4276 3800 1379 3646</b>. <br/>
            Внести можно через Банк.Онлайн, или через ближайший банкомат*}

        </p>
    </div>
{/if}