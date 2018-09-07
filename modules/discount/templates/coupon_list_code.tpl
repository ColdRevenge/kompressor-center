<div class="block">

    {include file="_menu_discount.tpl"}
    <div class="page">

        <div id="breadcrumbs">
            <a href="{$admin_url}discount/coupons/">Купоны</a> &raquo; Купон - &laquo;{$get_coupone->name|stripslashes}&raquo;
        </div>
        {include file=$template_message message=$message error=$error}
        <div class="quick_actions">
            <img src="{$sys_images_url}added.png" alt="Редактировать" /><a href="{$admin_url}discount/coupons/add/6/?is_modal=1" rel="fancy" >Редактировать купон </a>
        </div>
        <h1>Купон - &laquo;{$get_coupone->name|stripslashes}&raquo;</h1>

        <form method="post" enctype="multipart/form-data" action="{$MyURL}">
            <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%" >
                <thead>
                    <tr>
                        <td valign="middle" align="center">Код: </td>
                        <td valign="middle" align="center">Привязан к пользователям: </td>
                        <td valign="middle" align="center">Сумма: </td>
                    </tr>
                </thead>



                {foreach from = $code_list item = 'coupon'}
                    {assign var="coupon_code_id" value=$coupon->id}
                    <tbody class="tbody">
                        <tr>
                            <td valign="middle" align="center">{$coupon->code|stripslashes|number_format:0:"":" "}</td>
                            <td valign="middle" align="center">{foreach from=$user_code.$coupon_code_id item="user_code_item"}

                                <a href="{$url}xadmin/users/admin/0/edit/{$user_code_item->id}/?is_modal=1" rel="admin_fancy">{$user_code_item->login|stripslashes}</a>&nbsp;
                            {/foreach}
                        </td>
                        <td valign="middle" align="center">{$coupon->sum} руб.</td>

                    </tr>
                </tbody>
                {/foreach}
                </table>

            </form>
            <script type="text/javascript">

                $("a[rel^='admin_fancy']").fancybox({
                    width: 855,
                    height: 655,
                    modal: true,
                    type: 'iframe',
                    cyclic: false,
                    fitToView: false,
                    autoSize: false,
                    closeClick: true,
                    openEffect: 'none',
                    closeEffect: 'none',
                    hideOnOverlayClick: true,
                    hideOnContentClick: true,
                    enableEscapeButton: true,
                    showCloseButton: true
                });
            </script>

            <br/>
            <p style="text-align: center">
                <a href="{$admin_url}discount/coupons/">Вернуться</a>
            </p>
        </div>
    </div>