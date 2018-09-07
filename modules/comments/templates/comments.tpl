<div id="comments_{$parent_id}">
    <h1>Комментарии{if $comments|@count} <span style="font-size: 14px;">(<a href="javascript:void(0)" onclick="jQuery.scrollTo('#add_comment', 1200);">Написать комментарий</a>)</span>{/if}</h1>
    <div style="padding:5px 10px 0px 5px;">
        {if $comments}
            {foreach from=$comments item="comment"}
                <span style="color: #78a723"><b style="font-size: 16px;">{if $comment->name|trim != ""}{$comment->name}{else}Гость{/if}</b>
                    &nbsp;<span style="color: gray;font-size: 13px;">[{$comment->created|date_format:"d.m.Y"}]</span></span> 
    {if $comment->defect|trim != ""}<p style="font-size: 13px;"><strong>Недостатки</strong>:<br/>{$comment->defect|stripslashes|nl2br}</p>{/if}
{if $comment->recommend|trim != ""}<p style="font-size: 13px;"><strong>Достоинства</strong>:<br/>{$comment->recommend|stripslashes|nl2br}</p>{/if}
    {if $comment->comment|trim != ""}<p style="font-size: 13px;"><strong>Комментарий</strong>:<br/>{$comment->comment|stripslashes|nl2br}</p>{/if}

<div style="margin: auto; width: 93%; height: 1px; border-top: 1px solid #e5e5e5; margin: 10px auto 10px auto"></div>
{/foreach}
{else}
    Нет комментариев
{/if}

{if $is_message == 1} 
    <h2 style="color: #ff6600;padding-bottom: 0;margin-bottom: 0">Комментарий успешно добавлен!</h2>
    <h3 style="margin-top: 0; padding-top: 0;font-size: 17px; ">После прохождения модерации, он будет опубликован на сайте</h3>
{elseif $is_error == 1}   
    <h2 style="color: #eb0f33;">Заполните все поля</h2>
{elseif $is_error == 5}   
    <h2 style="color: #eb0f33;margin-bottom: 20px;">Код с картинки введен не правильно</h2>
{elseif $is_error == 3}   
    <h2 style="color: #eb0f33;font-size: 17px;">
        Ваш комментарий попал под фильтр. Исправьте текст комментария, и отправьте его еще раз. <br/><br/>
        1. В комментариях должны присутствовать русские буквы. 
        <br/><br/>
        Приносим свои извинения за неудобства.
    </h2>
{/if}  

<h2 id="add_comment">Написать комментарий </h2>
<form method="post" action="" id="form_{$parent_id}">
    <table cellpadding="0" cellspacing="1" border="0">
        <tr>
            <td valign="top" align="left">
                <p><strong>Ваше имя</strong><br/>
                    <input type="text" value="{$smarty.post.name|default:$smarty.session.comment_name}" name="name" onfocus="this.className='selInput'" onblur = "this.className = 'text'" style="width: 400px;margin-top: 3px;" />
            </td>
        </tr>
   {*     <tr>
            <td valign="top" align="left">
                <p><strong>Достоинства</strong><br/>
                    <textarea rows="7" cols="4"  onfocus="this.className='selInput'" onblur = "this.className = ''" style="width: 400px;height: 70px;margin-top: 3px;" name="recommend">{$smarty.post.recommend|stripslashes}</textarea></p>
            </td>
        </tr>
        <tr>
            <td valign="top" align="left">
                <p><strong>Недостатки</strong><br/>
                    <textarea rows="7" cols="4"  onfocus="this.className='selInput'" onblur = "this.className = ''" style="width: 400px;height: 70px;margin-top: 3px;" name="defect">{$smarty.post.defect|stripslashes}</textarea></p>
            </td>
        </tr>*}
        <tr>
            <td valign="top" align="left">
                <p><strong>Комментарий</strong><br/>
                    <textarea rows="7" cols="4"  onfocus="this.className='selInput'" onblur = "this.className = ''" style="width: 400px;height: 120px;margin-top: 3px;" name="comment">{$smarty.post.comment|stripslashes}</textarea></p>
            </td>
        </tr>
        <tr>
            <td valign="top" align="right" colspan="2" style="text-align: right">
                <button class="send"  onclick="AjaxFormQuery('comments_{$parent_id}', 'form_{$parent_id}', '{$url}/comments/list/{$type_id}/{$parent_id}/'); return false;" ></button>
            </td>
        </tr>
    </table>
</form>
</div>
</div>