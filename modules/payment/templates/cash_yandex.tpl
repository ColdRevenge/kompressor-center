{assign var="sum_yandex" value=($get_order->sum_total*0.97)|number_format:0:"":" "}
{if $smarty.get.is_success == 1 && $get_order->payment_sum > 0 && $get_order->is_payment == 1}
    <div style="text-align: center; padding-bottom: 20px;width: 700px;" class="navigation-detailed">
        <h2 style="text-align: center;color: #f94208;">Оплата прошла успешно!</h2>
        <h3>В ближайшее время с Вами свяжется менеджер!</h3>
        <p style="margin-top: 8px;">Сумма оплаты: <b>{$get_order->payment_sum|number_format:0:"":" "} руб.</b></p>
    </div>
{else}
    <h2>Выберите способ оплаты (Visa/MasterCard) или Яндекс.Деньги</h2>
    <p>Стоимость заказа: <b style="color: red;">{$sum_yandex} руб.</b> <span class="notice">(с учетом скидки 3%)</span></p>
    <p style="text-align: center; margin-top: 10px;margin-bottom: 3px;">
        <iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/embed/shop.xml?account=41001225546164&quickpay=shop&payment-type-choice=on&writer=seller&targets=%D0%9E%D0%BF%D0%BB%D0%B0%D1%82%D0%B0+%D0%B7%D0%B0%D0%BA%D0%B0%D0%B7%D0%B0+%E2%84%96{$get_order->id}&targets-hint=&default-sum={($get_order->sum_total*0.97)|number_format:0:"":""}&button-text=01&label={$get_order->id}&successURL={$url}order/{$get_order->id}/?is_success=1" width="450" height="198"></iframe>
    </p>
    <div class="notice"><span class="asterix">*</span> При оплате Яндекс.Деньгами или картой Visa/MasterCard действует <b style="color: red;">скидка 3%</b> от общей стоимости заказа</div>
{/if}