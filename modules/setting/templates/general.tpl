<script type="text/javascript" src="{$visual_editor}"></script>
{literal}
    <script type="text/javascript">
        tinyMCE.init({
            mode: "exact",
            elements: "footer_left",
            plugins: "images, pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,media,searchreplace,contextmenu,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist",
            theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect,|,sub,sup,|,charmap,iespell,media,emotions,images,image,advhr,|,ltr,rtl",
            theme_advanced_buttons2: "gallery,|tablecontrols,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,code,|,forecolor,backcolor",
            theme_advanced_buttons3: "",
            theme_advanced_toolbar_location: "top",
            theme_advanced_toolbar_align: "center",
            extended_valid_elements: "script|iframe[name|src|framespacing|border|frameborder|scrolling|title|height|width]",
            extended_valid_elements : "div[*],p[*],object[declare|classid|codebase|data|type|codetype|archive|standby|height|width|usemap|name|tabindex|align|border|hspace|vspace]",
                    theme_advanced_resizing: false,
            theme_advanced_blockformats: "p,h1, h2",
            language: "ru",
            content_css: '{/literal}{$url}{literal}style_ve.css',
            convert_urls: false,
            setup: function (ed) {
                // Add a custom button
                ed.addButton('gallery', {
                    title: 'Вставить контейнер',
                    image: '/images/sys/header_page.png',
                    onclick: function () {
                        ed.selection.setContent('<div class="header_page"><h6>Заголовок</h6></div>');
                    }
                });
            }
        });


    </script>
{/literal}

<div class="block">
    {include file="_menu_setting.tpl"}
    <div class="page">
        {include file=$template_message message=$message error=$error}
        <h1>Общие настройки</h1>

        <form method="post" action="">
            <table cellpadding="4" cellspacing="0" border="0" width="510">
                <tr>
                    <td valign="middle" align="right" width="250">Название: </td>
                    <td valign="middle" align="left">
                        <input type="text" value="{$smarty.post.name|default:$setting->name}" name="name"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">E-mail адрес уведомлений: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="email" value="{$smarty.post.email|default:$setting->email}"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">E-mail адрес уведомлений 2: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="email_2" value="{$smarty.post.email_2|default:$setting->email_2}"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">E-mail адрес уведомлений 3: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="email_3" value="{$smarty.post.email_3|default:$setting->email_3}"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Телефон 1: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="phone_1" value="{$smarty.post.phone_1|default:$setting->phone_1}"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Телефон 2: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="phone_2" value="{$smarty.post.phone_2|default:$setting->phone_2}"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Телефон 3: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="phone_3" value="{$smarty.post.phone_3|default:$setting->phone_3}"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Телефон 4: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="phone_4" value="{$smarty.post.phone_4|default:$setting->phone_4}"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Заголовок (по-умолчанию): </td>
                    <td valign="middle" align="left">
                        <input type="text" name="title" value="{$smarty.post.title|default:$setting->title}"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="right">Meta-описание (по-умолчанию): </td>
                    <td valign="middle" align="left">
                        <textarea style="width: 250px;" rows="8" name="meta_desc">{$smarty.post.meta_desc|default:$setting->meta_desc}</textarea>
                    </td>
                </tr><tr>
                    <td valign="top" align="right">Meta-ключ. слова (по-умолчанию): </td>
                    <td valign="middle" align="left">
                        <textarea style="width: 250px;" rows="5" name="meta_key">{$smarty.post.meta_key|default:$setting->meta_key}</textarea>
                    </td>
                </tr>
                <tr style="display: none">
                    <td valign="top" align="right">Наценка: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="mark_up" maxlength="11" value="{$smarty.post.mark_up|default:$setting->mark_up}"  style="width: 50px;"/>
                        <div class="notice">(Например, <b>1.15</b>, цена будет увеличена на 15%, или <b>0.70</b> - снижена на 30%)</div>
                    </td>
                </tr>
                {*   <tr>
                <td valign="top" align="right">Дни поставок: </td>
                <td valign="middle" align="left">
                <textarea style="width: 450px;height: 250px;" rows="4" name="footer_left">{$smarty.post.footer_left|default:$setting->footer_left}</textarea>
                </td>
                </tr>*}{*<tr>
                <td valign="top" align="right">Подвал (правая часть): </td>
                <td valign="middle" align="left">
                <textarea style="width: 250px;height: 50px;" rows="4" name="footer_right">{$smarty.post.footer_right|default:$setting->footer_right}</textarea>
                </td>
                </tr>*}
                {*<tr>
                <td colspan="2" valign="middle" align="center"><h2>Божья коровка</h2></td>
                </tr>
                <tr>
                <td valign="middle" align="right">Название: </td>
                <td valign="middle" align="left">
                <input type="text" name="name_mu" value="{$name_mu}"  style="width: 250px;"/>
                </td>
                </tr>
                <tr>
                <td valign="middle" align="right">Описание: </td>
                <td valign="middle" align="left">
                <input type="text" name="desc_mu" value="{$desc_mu}"  style="width: 250px;"/>
                </td>
                </tr>*}


                <tr>
                    <td valign="middle" align="right">Минимальная сумма заказа: </td>
                    <td valign="middle" align="left">
                        <input type="text" name="min_price" maxlength="11" value="{$smarty.post.min_price|default:$setting->min_price}"  style="width: 50px;"/> руб.
                    </td>
                </tr>


                <tr>
                    <td valign="middle" align="right">Скрыть цены: </td>
                    <td valign="middle" align="left">
                        <input type="checkbox" value="1" name="hide_prices" {if $smarty.post.hide_prices|default:$setting->hide_prices == 1} checked="checked"{/if} />
                    </td>
                </tr>

         {*       <tr>

                    <td valign="middle" align="right" colspan="2">
                        <label class="p-check"><input type="checkbox" value="1" name="is_expense" {if $smarty.post.is_expense|default:$setting->is_expense == 1} checked="checked"{/if} /><em>&nbsp;</em><span>Поле "Расход на заказ" обязательное для заполнения</span></label>
                    </td> 
                </tr>*}
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <input type="hidden" name="submit" value="1" />
                        <button>Сохранить</button>
                    </td>
                </tr>
            </table>
        </form>
        <form method="post" action="">
            <table cellpadding="4" cellspacing="0" border="0" width="510">
                <tr>
                    <td valign="middle" align="left" colspan="2"><h1>Изменить пароль</h1></td>
                </tr>

                <tr>
                    <td valign="middle" align="right" width="250">Страый пароль: </td>
                    <td valign="middle" align="left">
                        <input type="password" value="" name="old_password"  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Новый пароль: </td>
                    <td valign="middle" align="left">
                        <input type="password" name="password" value=""  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">Подтверждение нового пароля: </td>
                    <td valign="middle" align="left">
                        <input type="password" name="confirm_password"  value=""  style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <input type="hidden" name="submit_pass" value="1" />
                        <button>Сохранить</button>
                    </td>
                </tr>

            </table>
        </form>

        <form method="post" action="">
            <table cellpadding="4" cellspacing="0" border="0" width="510">
                <tr>
                    <td valign="middle" align="left" colspan="2"><h1>Валютный курс</h1></td>
                </tr>
                <tr>
                    <td valign="middle" align="right" width="250">USD:</td>
                    <td valign="middle" align="left">
                        <input type="text" value="{$smarty.post.usd|default:$setting->usd}" name="usd"
                               style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right">EUR:</td>
                    <td valign="middle" align="left">
                        <input type="text" name="eur" value="{$smarty.post.eur|default:$setting->eur}"
                               style="width: 250px;"/>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" align="right" colspan="2">
                        <input type="hidden" name="submit_currency" value="1" />
                        <button>Сохранить</button>
                    </td>
                </tr>

            </table>
        </form>

        {if $is_b2b}
            <form method="post" action="">
                <table cellpadding="4" cellspacing="0" border="0" width="710">
                    <tr>
                        <td valign="middle" align="left" colspan="2"><h1>Авто-переключение колонок цен (B2B)</h1></td>
                    </tr>

                    <tr>
                        <td valign="middle" align="right" width="250">Цена 2: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="{$b2b_setting.1->price}" name="b2b[1]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[1]" {if $b2b_setting.1->is_active == 1} checked="checked"{/if} id="b2b_1" /><label for="b2b_1">Активный</label>
                        </td> 
                    </tr>

                    <tr>
                        <td valign="middle" align="right" width="250">Цена 3: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="{$b2b_setting.2->price}" name="b2b[2]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[2]" {if $b2b_setting.2->is_active == 1} checked="checked"{/if} id="b2b_2" /><label for="b2b_2">Активный</label>
                        </td>
                    </tr>

                    <tr>
                        <td valign="middle" align="right" width="250">Цена 4: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="{$b2b_setting.3->price}" name="b2b[3]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[3]" {if $b2b_setting.3->is_active == 1} checked="checked"{/if} id="b2b_3" /><label for="b2b_3">Активный</label>
                        </td>
                    </tr>

                    <tr>
                        <td valign="middle" align="right" width="250">Цена 5: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="{$b2b_setting.4->price}" name="b2b[4]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[4]" {if $b2b_setting.4->is_active == 1} checked="checked"{/if} id="b2b_4" /><label for="b2b_4">Активный</label>
                        </td>
                    </tr>


                    <tr>
                        <td valign="middle" align="right" width="250">Цена 6: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="{$b2b_setting.5->price}" name="b2b[5]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[5]" {if $b2b_setting.5->is_active == 1} checked="checked"{/if} id="b2b_5" /><label for="b2b_5">Активный</label>
                        </td>
                    </tr>


                    <tr>
                        <td valign="middle" align="right" width="250">Цена 7: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="{$b2b_setting.6->price}" name="b2b[6]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[6]" {if $b2b_setting.6->is_active == 1} checked="checked"{/if} id="b2b_6" /><label for="b2b_6">Активный</label>
                        </td>
                    </tr>


                    <tr>
                        <td valign="middle" align="right" width="250">Цена 8: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="{$b2b_setting.7->price}" name="b2b[7]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[7]" {if $b2b_setting.7->is_active == 1} checked="checked"{/if} id="b2b_7" /><label for="b2b_7">Активный</label>
                        </td>
                    </tr>


                    <tr>
                        <td valign="middle" align="right" width="250">Цена 9: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="{$b2b_setting.8->price}" name="b2b[8]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[8]" {if $b2b_setting.8->is_active == 1} checked="checked"{/if} id="b2b_8" /><label for="b2b_8">Активный</label>
                        </td>
                    </tr>

                    <tr>
                        <td valign="middle" align="right" width="250">Цена 10: </td>
                        <td valign="middle" align="left">
                            Сумма от: <input type="text" value="{$b2b_setting.9->price}" name="b2b[9]"  style="width: 80px;"/>
                            <input type="checkbox" value="1" name="is_active[9]" {if $b2b_setting.9->is_active == 1} checked="checked"{/if} id="b2b_9" /><label for="b2b_9">Активный</label>
                        </td>
                    </tr>

                    {*       
                    <tr>
                    <td valign="middle" align="right" width="250">Цена 10: </td>
                    <td valign="middle" align="left">
                    Сумма от: <input type="text" value="{$b2b_setting.10->price}" name="b2b[10]"  style="width: 80px;"/>
                    <input type="checkbox" value="1" name="is_active[10]" {if $b2b_setting.10->is_active == 1} checked="checked"{/if} id="b2b_10" /><label for="b2b_10">Активный</label>
                    </td>
                    </tr>*}
                    <tr>
                        <td valign="middle" align="right" colspan="2">
                            <input type="hidden" name="submit_b2b" value="1" />
                            <button>Сохранить</button>
                        </td>
                    </tr>

                </table>
            </form>
        {/if}
    </div>
</div>