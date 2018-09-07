<form method="post" class="order-form" id="form_order" action="" style=" margin-bottom: 20px;margin-top: 10px;">
    <input type="hidden" name="coupon_code" value="" id="coupon_code" />
    <div class="l-layout">
        <div class="l-layout__sidebar">
            <h2 class="headline -small">Контактная информация</h2>
            <div class="form-group">
                <label for="order-form-fio" class="form-label">ФИО: <span class="asterix">*</span></label>
                <input type="text" id="order-form-fio" class="form-control" value="{$smarty.post.fio}" name="fio" id="fio" maxlength="255" />
            </div>
            <div class="form-group">
                <label for="order-form-fio" class="form-label">Телефон: <span class="asterix">*</span></label>
                <input type="text" class="form-control" value="{$smarty.post.phone}" name="phone" maxlength="255" id="phone_mask" />
            </div>
            <div class="form-group">
                <label for="order-form-fio" class="form-label">E-mail: <span class="asterix">*</span></label>
                <input type="text" id="email_check" class="form-control" value="{$smarty.post.email}" name="email" maxlength="255" />
            </div>
            <div class="form-group">
                <label for="order-form-fio" class="form-label">Комментарий: <span class="asterix">*</span></label>
                <textarea class="form-control" placeholder="Комментарий" name="comment">{$smarty.post.comment}</textarea>
            </div>
        </div>
        <div class="l-layout__content">
            <h2 class="headline -small">Информация о доставке</h2>
            <div class="delivery">
                <div class="delivery__item">
                    {foreach from=$delivery.0 item="item" name="delivery"}
                        {assign var="delivery_id" value=$item->id}
                        <label class="delivery__label">
                            <span class="delivery__radio"><input type="radio" class="js-delivery-radio" name="delivery_id" value="{$item->id}" rel="{$item->service}" /><span>&nbsp;</span></span>
                            <span class="delivery__icon">{if $item->icon}<img src="{$icons_url}{$item->icon}" alt="" />{/if}</span>
                            <span class="delivery__desc">
                                {$item->name|stripslashes}
                                {if $item->free_sum-$sum_basket <= 0}
                                    - <b style="color: red">Бесплатно!</b>
                                {elseif $item->price != 0}
                                    - <b>{$item->price} руб.</b>
                                {/if}
                                <div class="delivery__desc-info">{$item->info|stripslashes}</div>
                            </span>
                        </label>
                        {if $item->service} {* Если у службы доставки есть сервис *}
                            <div class="delivery-service" id="delivery-service-{$delivery_id}"></div>
                        {/if}
                        {foreach from=$delivery.$delivery_id item="delivery_child" name="delivery_child" key="ikey"}
                            <div class="delivery-child" id="delivery-child-{$delivery_id}">
                                <label class="check-style">
                                    <span class="delivery_radio_child">
                                    <input type="radio" name="delivery_child_id" class="delivery_child_id" rel="{$item->service}" value="{$delivery_child->id}" {if $ikey == 0}checked{/if} />
                                    <span>&nbsp;</span></span>
                                    <span class="delivery-child__desc">
                                        {$delivery_child->name|stripslashes} {if $delivery_child->price != 0} - <b>{$delivery_child->price} руб.</b>{/if}
                                        <div class="delivery-child__info">{$delivery_child->info|stripslashes}</div>
                                    </span>
                                </label>
                            </div>
                        {/foreach}
                    {/foreach}
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn -rounded5 -broader" value="Оформить" />
            </div>
        </div>
    </div>
</form>