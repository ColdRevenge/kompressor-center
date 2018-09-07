<div id="breadcrumbs"> 
    <a href="{$url}">Главная</a>  &raquo; <span>Для поставщиков</span>
</div>

{if $error_auth != 1}
    <h1 style="float: left; vertical-align: middle">Для поставщиков</h1>
    <div style="text-align: right">
        <form method="post" action="" id="myform">
            <input type="hidden" name="is_send_email" value="1" />
            <input type="checkbox" value="1"{if $user->is_email_tender == 1} checked="checked"{/if} name="is_email" id="is_tender_email" style="vertical-align: middle;" onchange="document.getElementById('myform').submit(); return false;" /> 
            <label for="is_tender_email" style="font-style: italic">Получать E-mail уведомления о новых тендерах на поставку</label>
        </form>
    </div>
    <div class="clear">&nbsp;</div>
    {if !$tender_active}
        <h2>Нет активных тендеров на поставку</h2>
    {else}
        <h2>{$tender_active->name|stripslashes}</h2>
            {if $status_id == 1}
                <br/><h3 style="text-align: center">Заявка успешно отправленна. В ближайшее время вы получите ответ</h3><br/>
            {elseif $status_id == 2}
                <br/><h3 style="text-align: center">Отказ от участия в тендере <strong>&laquo;{$tender_active->name|stripslashes}&raquo;</strong> успешно принят</h3><br/>    
            {/if}    
        <br/>
        <form method="post" action="">
            <input type="hidden" value="{$tender_active->id}" name="tender_id" />
            <table cellpadding="3" cellspacing="1" border="0" class="table_list" width="1000">
                <tbody class="table_header_list">
                    <tr>
                        <td valign="middle" align="center">Название: </td>
                        <td valign="middle" align="center">Кол-во: </td>
                        {*<td valign="middle" align="center">Цена мгновенной победы: </td>*}
                        <td valign="middle" align="center">Цена предл.: </td>
                        <td valign="middle" align="center">Кол-во предл.: </td>
                        <td valign="middle" align="center">Комментарий: </td>
                    </tr>
                </tbody>
                {foreach from = $tender_products item = 'product' name="product"}
                    {assign var="product_id"  value=$product->product_id}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="left">{$product->name|stripslashes}</td>
                            <td valign="middle" align="center">
                                {$product->count|default:0}
                            </td>
                            {* <td valign="middle" align="center">
                            {if $product->price_finish_product == 0}-{else}{$product->price_finish_product|default:0}{/if}
                            </td> *}

                            <td valign="middle" align="center">
                                {if $status_id == 0}
                                    <input type="text" value="{$user_offer_product.$product_id->count|default:0}" name="count[{$product->product_id}]" maxlength="11"  onfocus="this.className='selInput'" onblur = "this.className = 'text'" style="width: 50px;" />
                                {else}
                                    {$user_offer_product.$product_id->count|default:0}
                                    <input type="hidden" value="{$user_offer_product.$product_id->count|default:0}" name="count[{$product->product_id}]" maxlength="11" />
                                {/if}    
                            </td>
                            <td valign="middle" align="center">
                                {if $status_id == 0}
                                    <input type="text" value="{$user_offer_product.$product_id->price|default:0}" name="price[{$product->product_id}]" maxlength="11" onfocus="this.className='selInput'" onblur = "this.className = 'text'" style="width: 50px;"/>
                                {else}
                                    {$user_offer_product.$product_id->price|default:0}
                                    <input type="hidden" value="{$user_offer_product.$product_id->price|default:0}" name="price[{$product->product_id}]" maxlength="11" />
                                {/if}   

                            </td>
                            <td valign="middle" align="right" style="width: 240px; height: 50px;">
                                {if $status_id == 0}
                                <textarea style="width: 240px; height: 60px;" name="comment[{$product->product_id}]" onfocus="this.className='selInput'" onblur = "this.className = 'text'">{$user_offer_product.$product_id->comment}</textarea>
                                {else}
                                    {$user_offer_product.$product_id->comment}
                                    <textarea style="width: 240px; height: 60px;display: none;" name="comment[{$product->product_id}]" onfocus="this.className='selInput'" onblur = "this.className = 'text'">{$user_offer_product.$product_id->comment}</textarea>
                                {/if}    
                            </td>
                        </tr>
                    </tbody>
                {/foreach}
                <tbody style="background: none;">
                    <tr>
                        <td valign="middle" align="right" style="background: none;padding-top: 10px;" colspan="7" >

                        {if $status_id == 1}<input type="image" src="{$fronted_images_url}cancel_tender.png" name="cancel" style="margin-left: 30px;"  onclick="if (!confirm('Вы действительно хотите отменить заявку на участие в тендере?')) return false;"/>{/if}
                    {if $status_id == 0}<input type="image" src="{$fronted_images_url}save_tender.png" name="save"  style="margin-left: 30px;"/>{/if}
                {if $status_id == 0}<input type="image" src="{$fronted_images_url}send_tender.png" name="send" onclick="if (!confirm('После отправки заявки на участие в тендере, дальнейшее его изменение будет невозможно. Отправить тендер?')) return false;" style="margin-left: 30px;" />{/if}
            </td>
        </tr>
    </tbody>
</table>
</form>
{/if}
{else}
    <h1>Для поставщиков</h1>
    {$page->text|stripslashes}
    <br/>
    Раздел доступен только зарегистрированным пользователям. <a href="{$url}auth/register/">Зарегистрируйтесь</a> на сайте для входа в раздел.
    <br/>
    Если вы уже зарегистрированы, то <a href="{$url}auth/auth/">авторизуйтесь на сайте</a>.
{/if}
