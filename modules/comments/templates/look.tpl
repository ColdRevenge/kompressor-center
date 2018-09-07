<div class="block">

    <div id="breadcrumbs">
        <a href="{$admin_url}comments/list/">Модерирование комментариев</a>  &raquo; Редактирование комментария</span>
    </div>
    <div class="comment">
        {include file=$template_message message=$message error=$error}
        <h1>Редактирование комментария</h1>
        <div class="clear">&nbsp;</div>
        <form method="post" action="">
            <table cellpadding="0" cellspacing="1" border="0">
                <tr>
                    <td valign="top" align="left">
                        <p><strong>Ваше имя</strong><br/>
                            <input type="text" value="{$comment->name|stripslashes}" name="name" onfocus="this.className='selInput'" onblur = "this.className = 'text'" style="width: 600px;margin-top: 3px;" />
                    </td>
                </tr>
     {*           <tr>
                    <td valign="top" align="left">
                        <p><strong>Достоинства</strong><br/>
                            <textarea rows="7" cols="4"  onfocus="this.className='selInput'" onblur = "this.className = 'text'" style="width: 400px;height: 70px;margin-top: 3px;" name="recommend">{$comment->recommend|stripslashes}</textarea></p>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="left">
                        <p><strong>Недостатки</strong><br/>
                            <textarea rows="7" cols="4"  onfocus="this.className='selInput'" onblur = "this.className = 'text'" style="width: 400px;height: 70px;margin-top: 3px;" name="defect">{$comment->defect|stripslashes}</textarea></p>
                    </td>
                </tr>*}
                <tr>
                    <td valign="top" align="left">
                        <p><strong>Комментарий</strong><br/>
                            <textarea rows="7" cols="4"  onfocus="this.className='selInput'" onblur = "this.className = 'text'" style="width: 600px;height: 320px;margin-top: 3px;" name="comment">{$comment->comment|stripslashes}</textarea></p>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="right" colspan="2" style="text-align: right">
                        <input type="hidden" src="{$sys_images_url}save.png" name="save" title="Сохранить" />
                        <button>Сохранить</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>