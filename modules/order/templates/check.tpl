<h1>Проверка состояния заказа</h1>

{if $order->id}
    <p>Номер заказа: <b>{$order->id}</b></p>
    {if $order->payment_method_id != '0'}
        {if $order->is_payment != 0}
            <p>Статус: <b>{$order->status_name}</b></p>
        {else}
            <p>Статус: <b>Ожидает оплаты</b></p>

            <p>
                Сумма к оплате: <b>{$order->sum} руб.</b><br/>
                Метод оплаты: <b>{$method_name}</b><br/>

                {$payment_form}

            </p>
        {/if}
    {else}
        <p>Статус: <b>{$order->status_name}</b></p>
    {/if}

{else}
    Заказ не найден. 
{/if}