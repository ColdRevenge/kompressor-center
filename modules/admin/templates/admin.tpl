{if $smarty.get.not_html != 1 && $is_ajax != 1}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <title>Система управления сайтом lfw Shop 0.0.4.5</title>
            <link rel="shortcut icon" href="{$url}favicon.ico" />
            <link rel="stylesheet" type="text/css" href="{$url}admin_style.css" />
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="robots" content="noindex,nofollow" />
            <script type="text/javascript" src="{$url}js/jquery-1.7.2.min.js"></script>


            {*  <link rel="stylesheet" href="{$url}js/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
            <script src="{$url}js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>*}
            <script type="text/javascript" src="/lib/rinit.js"></script>
            <link rel="stylesheet" href="{$url}js/prettyPopinAdmin.css" type="text/css" media="screen" charset="utf-8" />

            {*            <script src="{$url}js/jquery.prettyPopin.js" type="text/javascript" charset="utf-8"></script>*}

            <script src="{$url}js/jquery.validate.min.js" type="text/javascript" charset="utf-8"></script>
            <script type="text/javascript" src="{$url}js/srcollTo.js"></script>
            <script type="text/javascript" src="{$url}lib/jquery.autocomplete.js"></script>
            <!--Замена PrettyPopin-->
            <script type="text/javascript" src="{$url}js/fancybox/jquery.fancybox.js"></script>
            <script type="text/javascript" src="{$url}js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>
            <link rel="stylesheet" href="{$url}js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
            <link href="{$url}js/uploader/fileuploader.css" rel="stylesheet" type="text/css" />	
            <script type='text/javascript' src='{$lib_url}top_admin.js'></script>
            <script type="text/javascript">
                var base_url = '{$shop_url}';
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("a[rel^='related']").fancybox({
                        width: 1180,
                        height: 680,
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
                });
                $(document).ready(function () {
                    $("a[rel^='add_banners_menu']").fancybox({
                        width: 850,
                        height: 580,
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
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("a[rel^='fancy']").fancybox({
                        width: 817,
                        height: 600,
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
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".fancy").fancybox({
                        maxWidth: 800,
                        maxHeight: 1600,
                        modal: false,
                        type: 'iframe',
                        cyclic: false,
                        fitToView: false,
                        autoSize: true,
                        closeClick: true,
                        openEffect: 'none',
                        closeEffect: 'none',
                        hideOnOverlayClick: true,
                        hideOnContentClick: true,
                        enableEscapeButton: true,
                        showCloseButton: true
                    });
                });
            </script>
            {* <script type="text/javascript" src="{$lib_url}lib.js"></script>*}
            <script type="text/javascript" src="{$lib_url}admin.js"></script>
            {*   <script type="text/javascript">{literal}$(document).ready(function() {
            $("a[rel^='related_add']").prettyPopin({
            width: 832,
            height: 30000,
            followScroll: false
            });
            });{/literal}
            </script>*}
            {if $smarty.get.not_menu == 1}
                <style  type="text/css">
                    body {
                        background: none;
                    }
                </style>
            {/if}
        </head>


        {if  $smarty.get.is_modal == 1}
            <body style="width: auto; min-width: 0; background: none;">
                {$content}
            </body>
        {else}
            <body{if $smarty.get.not_menu == 1} style='min-width:0px;'{else}{if $is_auth < 1}style="background-color: #111111;"{/if} {if $is_auth == 0}id="auth_bg"{/if}{/if}>
                {if $is_ajax != 1 && $is_auth >= 1 && $smarty.get.not_menu != 1}

                    <div id="header">
                        <div id="logo">
                            <div class="logo"><a href="{$url}" target="_blank" title="Перейти на сайт">{$shop_name}</a></div>
                            <div class="rigth-block">
                                Здравствуйте, <b>{$get_user->name|default:$get_user->login}</b>
                                <br/><a href="{$url}auth/exit/">Выход</a>&nbsp;
                            </div>
                        </div>
                        <div class="clear">&nbsp;</div>

                        <div id="menu">
                            {foreach from=$menu item="item" key="order"}{if $order != 'accesses'}{foreach from=$item key="key_2" item="item_2"}<div>

                                            <a href="{$url}{$item_2.menu_link}">
                                                <span class="{if $key_2 == 'category'}category-icon{elseif $key_2 == 'catalog'}products-icon{elseif $key_2 == 'page'}page-icon{elseif $key_2 == 'news'}news-icon{elseif $key_2 == 'order'}order-icon{elseif $key_2 == 'discount'}marketing-icon{elseif $key_2 == 'setting'}setting-icon{/if}">{$item_2.title}</span>

                                            </a>
                                            {if $item_2.access|@count}
                                                <ul>
                                                    {foreach from=$item_2.access item="access_item"}
                                                        {if $access_item.is_menu == 1}
                                                            <li><a href="{$url}{$access_item.menu_link}">{$access_item.title}</a></li>
                                                            {/if}
                                                        {/foreach}
                                                </ul>
                                            {/if}
                                        </div>{/foreach}{/if}{/foreach}

                                    </div>
                                    <div class="clear">&nbsp;</div>
                                </div>
                                <div id="content">
                                    {/if}
                                        {if $smarty.server.REQUEST_URI}
                                            {include file="admiin_main.tpl"}
                                        {/if}
                                        {include file=$template_message message=$message error=$error}
                                        {$content}
                                        {if $is_ajax != 1 && $is_auth >= 1 && $smarty.get.not_menu != 1}</div><div id="footer">{if $is_auth != 0}<div class="line"></div>{/if}</div>{/if}
                                </body>
                                {/if}
                                </html>
                                {elseif $smarty.get.not_html == 1}
                                    {$content}
                                    {/if}
