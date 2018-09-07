{if !$smarty.post.send}

    <div id="opinion">
        {foreach from = $opinions item = 'opinion' name="opinion"}
            <div class="op_name"><span>{$opinion->name|stripslashes}</span>{if $opinion->profession|stripslashes}, {$opinion->profession|stripslashes}{/if}</div>
            <div class="op_date">{$opinion->date|date_format:"%d.%m.%Y"}</div>
            <div class="clear">&nbsp;</div>
            <div class="op_text"><div class="op_text_block">{$opinion->text|stripslashes|nl2br}</div></div>
		
        {/foreach}
    </div>
{/if}

{if $message}

    <p style="text-align: center; font-size: 21px;color: #0AA8DC;">Спасибо{if $smarty.post.name}, {$smarty.post.name}{/if}!</p>
    <p style="text-align: center; font-size: 17px;color: #0AA8DC;" class="h2">Ваш отзыв успешно добавлен</p>
    <p style="text-align: center; font-size: 15px;line-height: 1.6;">Важно: Публикации отзывов осуществляются в режиме пост-модерации, т.е. отзыв публикуется только после соответствующей поверки. Напоминаем вам, что отзывы, не относящиеся к предмету обсуждения, содержащие не нормативную лексику, а также любое, запрещенное российским законодательством содержание - не публикуются.</p>
{/if}
{if $error}
    <h2 style="color: #F958B0">{$error}</h2>
{/if}
{if !$message}
    <div style="margin: auto; margin-top: 40px; width: 580px;" id="result" >
        <form method="post" id="form_question" action="">
            <h3 style="margin-bottom: 7px;">Отзывы клиентов: </h3>
            <table cellpadding="0" cellspacing="0" border="0" class="table_fields">
                <tbody>
                    <tr>
                        <td valign="middle" align="right" style="padding: 2px;text-align: right">Ваше имя: <span class="asterix">*</span></td>
                        <td valign="middle" align="left" style="padding: 2px;"><input type="text" name="name"  onfocus="this.className='selInput'" onblur = "this.className = 'text'"  style="width: 440px;" maxlength="255" value="{$smarty.post.name}" /></td>
                    </tr>
            {*        <tr style="background-color: white">
                        <td valign="middle" align="right" style="background-color: white;padding: 2px;;text-align: right">Должность:</td>
                        <td valign="middle" align="left" style="background-color: white;padding: 2px;"><input type="text" name="profession" style="width: 440px;"  onfocus="this.className='selInput'" onblur = "this.className = 'text'"  maxlength="255" value="{$smarty.post.profession}" /></td>
                    </tr>*}
                    <tr>
                        <td valign="top" align="right" style="vertical-align: top;padding: 2px;;text-align: right">Ваш отзыв: <span class="asterix">*</span></td>
                        <td valign="middle" align="left" style="padding: 2px;">
                            <textarea rows="8" cols="12" name="text"  onfocus="this.className='selInput'" onblur = "this.className = 'text'"   style="width: 440px;height: 150px;">{$smarty.post.text}</textarea>
                        </td>
                    </tr>
                    <tr style="background-color: white">
                        <td valign="middle" align="right" colspan="2" style="background-color: white; text-align: right">
                            <input type="hidden" name="send" value="1" />
                            <button class="send"  onclick="AjaxFormQuery('result', 'form_question', '{$url}opinion/add/'); return false;"></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
{/if}

