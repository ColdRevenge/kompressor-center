<script type="text/javascript" src="{$visual_editor}"></script>
{literal}
<script type="text/javascript">
    tinyMCE.init({
        mode:"textareas",
        theme:"advanced",
        plugins : "pagebreak,style,layer,table,advhr,advimage,advlink,emotions,iespell,inlinepopups,media,searchreplace,contextmenu,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist",
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect,|,sub,sup,|,charmap,iespell,media,emotions,image,advhr,|,ltr,rtl",
        theme_advanced_buttons2 : "tablecontrols,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,code,|,forecolor,backcolor",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "center",
        theme_advanced_resizing : false,
        language:"ru",
        content_css : '{/literal}{$url}{literal}style_ve.css',
        convert_urls : false
    });
</script>
{/literal}
<div class="add" style="width: 400px;margin: auto; float: none;text-align: right;">
    <img src="{$sys_images_url}setting_general.png" alt="" /><a href="{$MyURL}general/"><b>Общие настройки</b></a>
    <img src="{$sys_images_url}setting_password.png" alt="" /><a href="{$MyURL}password/"><b>Изменить пароль</b></a>
</div>
<h1>Настройки изображений</h1>
<div style="width: 910px;">
    <form method="POST" enctype="multipart/form-data" action="{$MyURL}products/">
        <h2>Изображение 1:</h2>
        <table cellpadding="5" cellspacing="1" border="0" class="table_list" width="100%">
            <tbody class="table_header_list">
                <tr>
                    <td valign="middle" align="center" width="320"><b>Размер изображения: </b></td>
                    <td valign="middle" align="center"><b>Водяной знак</b></td>
                </tr>
            </tbody>
            <tr>
                <td valign="middle" align="center">
                    <b>Автоматически изменять размер изображения:</b><br/>
                    <input type="text" name="width_1" value="{$smarty.post.width_1}" maxlength="4" style="width: 35px"/>x<input type="text" name="height_1" value="{$smarty.post.height_1}" maxlength="4" style="width: 35px"/><br/>
                </td>
                <td valign="top" align="left">
                    <div style="float: left; width: 160px;min-height: 40px;">
                        {if $water_file_1}
                        <a href="{$gallery_url}{$water_file_1}" target="__blank"><img src="{$gallery_url}{$water_file_1}" style="max-width: 140px;" alt="" /></a>
                        {if $water_file_1}<a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить водяной знак')){ldelim}location.href='{$MyURL}products/3/1/';{rdelim}" style="margin-top: 10px;display: inline-block;margin-left: 10px;vertical-align: middle;">Удалить</a><img src="{$sys_images_url}admin/del.png" alt="" style="vertical-align: middle;margin-top: 10px; margin-left: 10px;" />{/if}
                        {/if}
                    </div>
                    <div style="float: left;margin-left: 30px;">
                        <b>{if $water_file_1}Заменить водяной знак{else}Водяной знак{/if}:</b><br/>
                        <input type="file" name="water_file_1" value="" /><br/>
                        <b>Отступы водяного знака: </b><br/>
                        <table cellpadding="2" cellspacing="0" border="0">
                            <tr>
                                <td valign="middle" align="right">С верху:</td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_bottom_1').value = 0;" id="pos_top_1" name="pos_top_1" value="{$smarty.post.pos_top_1}" /> </td>
                                <td valign="middle" align="right">С низу: </td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_top_1').value = 0;" id="pos_bottom_1" name="pos_bottom_1" value="{$smarty.post.pos_bottom_1}" /> </td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">С лева:</td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_right_1').value = 0;" id="pos_left_1" name="pos_left_1" value="{$smarty.post.pos_left_1}" /> </td>
                                <td valign="middle" align="right">С права: </td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_left_1').value = 0;" id="pos_right_1" name="pos_right_1" value="{$smarty.post.pos_right_1}" /> </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2">
                    <input type="submit" name="submit" value="Сохранить"/>
                </td>
            </tr>
        </table>

        <h2>Изображение 2:</h2>
        <table cellpadding="5" cellspacing="1" border="0" class="table_list" width="100%">
            <tbody class="table_header_list">
                <tr>
                    <td valign="middle" align="center" width="320"><b>Размер изображения: </b></td>
                    <td valign="middle" align="center"><b>Водяной знак</b></td>
                </tr>
            </tbody>
            <tr>
                <td valign="middle" align="center">
                    <b>Автоматически изменять размер изображения:</b><br/>
                    <input type="text" name="width_2" value="{$smarty.post.width_2}" maxlength="4" style="width: 35px"/>x<input type="text" name="height_2" value="{$smarty.post.height_2}" maxlength="4" style="width: 35px"/><br/>
                </td>
                <td valign="top" align="left">
                    <div style="float: left; width: 160px;min-height: 40px;">
                        {if $water_file_2}
                        <a href="{$gallery_url}{$water_file_2}" target="__blank"><img src="{$gallery_url}{$water_file_2}" style="max-width: 140px;" alt="" /></a>
                        {if $water_file_2}<a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить водяной знак')){ldelim}location.href='{$MyURL}products/3/2/';{rdelim}" style="margin-top: 10px;display: inline-block;margin-left: 10px;vertical-align: middle;">Удалить</a><img src="{$sys_images_url}admin/del.png" alt="" style="vertical-align: middle;margin-top: 10px; margin-left: 10px;" />{/if}
                        {/if}
                    </div>
                    <div style="float: left;margin-left: 30px;">
                        <b>{if $water_file_2}Заменить водяной знак{else}Водяной знак{/if}:</b><br/>
                        <input type="file" name="water_file_2" value="" /><br/>
                        <b>Отступы водяного знака: </b><br/>
                        <table cellpadding="2" cellspacing="0" border="0">
                            <tr>
                                <td valign="middle" align="right">С верху:</td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_bottom_2').value = 0;" id="pos_top_2" name="pos_top_2" value="{$smarty.post.pos_top_2}" /> </td>
                                <td valign="middle" align="right">С низу: </td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_top_2').value = 0;" id="pos_bottom_2" name="pos_bottom_2" value="{$smarty.post.pos_bottom_2}" /> </td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">С лева:</td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_right_2').value = 0;" id="pos_left_2" name="pos_left_2" value="{$smarty.post.pos_left_2}" /> </td>
                                <td valign="middle" align="right">С права: </td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_left_2').value = 0;" id="pos_right_2" name="pos_right_2" value="{$smarty.post.pos_right_2}" /> </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2">
                    <input type="submit" name="submit" value="Сохранить"/>
                </td>
            </tr>
        </table>
{*}
        <h2>Изображение 3:</h2>
        <table cellpadding="5" cellspacing="1" border="0" class="table_list" width="100%">
            <tbody class="table_header_list">
                <tr>
                    <td valign="middle" align="center" width="320"><b>Размер изображения: </b></td>
                    <td valign="middle" align="center"><b>Водяной знак</b></td>
                </tr>
            </tbody>
            <tr>
                <td valign="middle" align="center">
                    <b>Автоматически изменять размер изображения:</b><br/>
                    <input type="text" name="width_3" value="{$smarty.post.width_3}" maxlength="4" style="width: 35px"/>x<input type="text" name="height_3" value="{$smarty.post.height_3}" maxlength="4" style="width: 35px"/><br/>
                </td>
                <td valign="top" align="left">
                    <div style="float: left; width: 160px;min-height: 40px;">
                        {if $water_file_3}
                        <a href="{$gallery_url}{$water_file_3}" target="__blank"><img src="{$gallery_url}{$water_file_3}" style="max-width: 140px;" alt="" /></a>
                        {if $water_file_3}<a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить водяной знак')){ldelim}location.href='{$MyURL}products/3/3/';{rdelim}" style="margin-top: 10px;display: inline-block;margin-left: 10px;vertical-align: middle;">Удалить</a><img src="{$sys_images_url}admin/del.png" alt="" style="vertical-align: middle;margin-top: 10px; margin-left: 10px;" />{/if}
                        {/if}
                    </div>
                    <div style="float: left;margin-left: 30px;">
                        <b>{if $water_file_3}Заменить водяной знак{else}Водяной знак{/if}:</b><br/>
                        <input type="file" name="water_file_3" value="" /><br/>
                        <b>Отступы водяного знака: </b><br/>
                        <table cellpadding="2" cellspacing="0" border="0">
                            <tr>
                                <td valign="middle" align="right">С верху:</td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_bottom_3').value = 0;" id="pos_top_3" name="pos_top_3" value="{$smarty.post.pos_top_3}" /> </td>
                                <td valign="middle" align="right">С низу: </td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_top_3').value = 0;" id="pos_bottom_3" name="pos_bottom_3" value="{$smarty.post.pos_bottom_3}" /> </td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">С лева:</td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_right_3').value = 0;" id="pos_left_3" name="pos_left_3" value="{$smarty.post.pos_left_3}" /> </td>
                                <td valign="middle" align="right">С права: </td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_left_3').value = 0;" id="pos_right_3" name="pos_right_3" value="{$smarty.post.pos_right_3}" /> </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2">
                    <input type="submit" name="submit" value="Сохранить"/>
                </td>
            </tr>
        </table>


        <h2>Изображение 4:</h2>
        <table cellpadding="5" cellspacing="1" border="0" class="table_list" width="100%">
            <tbody class="table_header_list">
                <tr>
                    <td valign="middle" align="center" width="320"><b>Размер изображения: </b></td>
                    <td valign="middle" align="center"><b>Водяной знак</b></td>
                </tr>
            </tbody>
            <tr>
                <td valign="middle" align="center">
                    <b>Автоматически изменять размер изображения:</b><br/>
                    <input type="text" name="width_4" value="{$smarty.post.width_4}" maxlength="4" style="width: 35px"/>x<input type="text" name="height_4" value="{$smarty.post.height_4}" maxlength="4" style="width: 35px"/><br/>
                </td>
                <td valign="top" align="left">
                    <div style="float: left; width: 160px;min-height: 40px;">
                        {if $water_file_4}
                        <a href="{$gallery_url}{$water_file_4}" target="__blank"><img src="{$gallery_url}{$water_file_4}" style="max-width: 140px;" alt="" /></a>
                        {if $water_file_4}<a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить водяной знак')){ldelim}location.href='{$MyURL}products/3/4/';{rdelim}" style="margin-top: 10px;display: inline-block;margin-left: 10px;vertical-align: middle;">Удалить</a><img src="{$sys_images_url}admin/del.png" alt="" style="vertical-align: middle;margin-top: 10px; margin-left: 10px;" />{/if}
                        {/if}
                    </div>
                    <div style="float: left;margin-left: 30px;">
                        <b>{if $water_file_4}Заменить водяной знак{else}Водяной знак{/if}:</b><br/>
                        <input type="file" name="water_file_4" value="" /><br/>
                        <b>Отступы водяного знака: </b><br/>
                        <table cellpadding="2" cellspacing="0" border="0">
                            <tr>
                                <td valign="middle" align="right">С верху:</td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_bottom_4').value = 0;" id="pos_top_4" name="pos_top_4" value="{$smarty.post.pos_top_4}" /> </td>
                                <td valign="middle" align="right">С низу: </td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_top_4').value = 0;" id="pos_bottom_4" name="pos_bottom_4" value="{$smarty.post.pos_bottom_4}" /> </td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">С лева:</td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_right_4').value = 0;" id="pos_left_4" name="pos_left_4" value="{$smarty.post.pos_left_4}" /> </td>
                                <td valign="middle" align="right">С права: </td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_left_4').value = 0;" id="pos_right_4" name="pos_right_4" value="{$smarty.post.pos_right_4}" /> </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2">
                    <input type="submit" name="submit" value="Сохранить"/>
                </td>
            </tr>
        </table>


        <h2>Изображение 5:</h2>
        <table cellpadding="5" cellspacing="1" border="0" class="table_list" width="100%">
            <tbody class="table_header_list">
                <tr>
                    <td valign="middle" align="center" width="320"><b>Размер изображения: </b></td>
                    <td valign="middle" align="center"><b>Водяной знак</b></td>
                </tr>
            </tbody>
            <tr>
                <td valign="middle" align="center">
                    <b>Автоматически изменять размер изображения:</b><br/>
                    <input type="text" name="width_5" value="{$smarty.post.width_5}" maxlength="4" style="width: 35px"/>x<input type="text" name="height_5" value="{$smarty.post.height_5}" maxlength="4" style="width: 35px"/><br/>
                </td>
                <td valign="top" align="left">
                    <div style="float: left; width: 160px;min-height: 40px;">
                        {if $water_file_5}
                        <a href="{$gallery_url}{$water_file_5}" target="__blank"><img src="{$gallery_url}{$water_file_5}" style="max-width: 140px;" alt="" /></a>
                        {if $water_file_5}<a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить водяной знак')){ldelim}location.href='{$MyURL}products/3/5/';{rdelim}" style="margin-top: 10px;display: inline-block;margin-left: 10px;vertical-align: middle;">Удалить</a><img src="{$sys_images_url}admin/del.png" alt="" style="vertical-align: middle;margin-top: 10px; margin-left: 10px;" />{/if}
                        {/if}
                    </div>
                    <div style="float: left;margin-left: 30px;">
                        <b>{if $water_file_5}Заменить водяной знак{else}Водяной знак{/if}:</b><br/>
                        <input type="file" name="water_file_5" value="" /><br/>
                        <b>Отступы водяного знака: </b><br/>
                        <table cellpadding="2" cellspacing="0" border="0">
                            <tr>
                                <td valign="middle" align="right">С верху:</td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_bottom_5').value = 0;" id="pos_top_5" name="pos_top_5" value="{$smarty.post.pos_top_5}" /> </td>
                                <td valign="middle" align="right">С низу: </td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_top_5').value = 0;" id="pos_bottom_5" name="pos_bottom_5" value="{$smarty.post.pos_bottom_5}" /> </td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">С лева:</td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_right_5').value = 0;" id="pos_left_5" name="pos_left_5" value="{$smarty.post.pos_left_5}" /> </td>
                                <td valign="middle" align="right">С права: </td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_left_5').value = 0;" id="pos_right_5" name="pos_right_5" value="{$smarty.post.pos_right_5}" /> </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2">
                    <input type="submit" name="submit" value="Сохранить"/>
                </td>
            </tr>
        </table>


        <h2>Изображение 6:</h2>
        <table cellpadding="5" cellspacing="1" border="0" class="table_list" width="100%">
            <tbody class="table_header_list">
                <tr>
                    <td valign="middle" align="center" width="320"><b>Размер изображения: </b></td>
                    <td valign="middle" align="center"><b>Водяной знак</b></td>
                </tr>
            </tbody>
            <tr>
                <td valign="middle" align="center">
                    <b>Автоматически изменять размер изображения:</b><br/>
                    <input type="text" name="width_6" value="{$smarty.post.width_6}" maxlength="4" style="width: 35px"/>x<input type="text" name="height_6" value="{$smarty.post.height_6}" maxlength="4" style="width: 35px"/><br/>
                </td>
                <td valign="top" align="left">
                    <div style="float: left; width: 160px;min-height: 40px;">
                        {if $water_file_6}
                        <a href="{$gallery_url}{$water_file_6}" target="__blank"><img src="{$gallery_url}{$water_file_6}" style="max-width: 140px;" alt="" /></a>
                        {if $water_file_6}<a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить водяной знак')){ldelim}location.href='{$MyURL}products/3/6/';{rdelim}" style="margin-top: 10px;display: inline-block;margin-left: 10px;vertical-align: middle;">Удалить</a><img src="{$sys_images_url}admin/del.png" alt="" style="vertical-align: middle;margin-top: 10px; margin-left: 10px;" />{/if}
                        {/if}
                    </div>
                    <div style="float: left;margin-left: 30px;">
                        <b>{if $water_file_6}Заменить водяной знак{else}Водяной знак{/if}:</b><br/>
                        <input type="file" name="water_file_6" value="" /><br/>
                        <b>Отступы водяного знака: </b><br/>
                        <table cellpadding="2" cellspacing="0" border="0">
                            <tr>
                                <td valign="middle" align="right">С верху:</td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_bottom_6').value = 0;" id="pos_top_6" name="pos_top_6" value="{$smarty.post.pos_top_6}" /> </td>
                                <td valign="middle" align="right">С низу: </td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_top_6').value = 0;" id="pos_bottom_6" name="pos_bottom_6" value="{$smarty.post.pos_bottom_6}" /> </td>
                            </tr>
                            <tr>
                                <td valign="middle" align="right">С лева:</td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_right_6').value = 0;" id="pos_left_6" name="pos_left_6" value="{$smarty.post.pos_left_6}" /> </td>
                                <td valign="middle" align="right">С права: </td>
                                <td valign="middle" align="right"><input type="text" style="width: 40px;" onchange="$('pos_left_6').value = 0;" id="pos_right_6" name="pos_right_6" value="{$smarty.post.pos_right_6}" /> </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle" align="right" colspan="2">
                    <input type="submit" name="submit" value="Сохранить"/>
                </td>
            </tr>
        </table>{*}
        
       
                <p class="notice"><span class="asterix">*</span>При добавлении продукта автоматически создаются превьюшки</p>
                <p class="notice"><span class="asterix">**</span>Если указать ширину, а не указывать высоту (и наоборот), высота подгониться автоматически, в замисимости от пропорций. Если не указать размеры, то картинка сжиматься не будет</p>
          
    </form>
</div>