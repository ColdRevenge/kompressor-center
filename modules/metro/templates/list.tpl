<div class="block">
    {if $metro}
        <h1>Станции метро</h1>
        <script>
            setTimeout(function () {
                $("#message").hide("slow");
            }, 3000);
        </script>
        <div id="er01">{include file=$template_message message=$message error=$error}</div>


        {if $list_edit == 1}
            <h1>Добавление станции </h1>
            <form method="post">
                <div class="quick_add">
                    <table cellpadding="2" cellspacing="0" border="0" >
                        <tr>
                            <td valign="middle" align="right">Название <span class="asterix">*</span>:</td>
                            <td valign="middle" align="left"><input type="text" name="name" value="{$smarty.post.name}" style="width: 246px"/></td>
                        </tr>
                        <tr>
                            <td valign="middle" align="right" colspan="2">
                                {if $param_tpl.edit_stantion_id}<button>Сохранить</button>{else}<button>Добавить</button>{/if}
                        </tr>
                    </table>
                </div>
            </form>
        {else}
            <div class="quick_actions">
                <img src="{$sys_images_url}added.png" alt="Добавить"><a href="{$MyURL}add/add/" style="font-size: 17px;">Добавить станцию</a>
            </div>
        {/if}


        <table cellpadding="5" cellspacing="1" border="0" class="table" width="100%">
            <thead>
                <tr>
                    <td valign="top" align="center" width="90">#</td>
                    <td valign="top" align="center">Название:</td>
                    <td valign="top" align="left" width="50">&nbsp;</td>
                </tr>
            </thead>
            {foreach from=$metro item="item_metro"}
                <tbody class="tbody">
                    <tr>
                        <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '{$MyURL}add/add/{$item_metro->id}/'">{$item_metro->id}</td>
                        <td valign="middle" align="center" style="cursor: pointer;" title="Редактировать" onclick="location.href = '{$MyURL}add/add/{$item_metro->id}/'">{$item_metro->name|stripslashes}</td>
                        <td valign="middle" align="center">
                            <a href="{$MyURL}add/add/{$item_metro->id}/" title="Редактировать станцию"><img src="{$sys_images_url}admin/edit.png" alt="" /></a>
                            <a href="javascript:void(0)" onclick="if (confirm('Вы действительно хотите удалить станцию ?')) {ldelim}
                                            location.href = '{$MyURL}del/{$item_metro->id}/';{rdelim}"><img src="{$sys_images_url}admin/del.png" alt="Удалить станцию" /></a>
                        </td>
                    </tr>
                </tbody>
            {/foreach}
        </table>
    {else}
        <h1>Нет станций метро</h1>
        <div class="quick_actions">
            <img src="{$sys_images_url}added.png" alt="Добавить"><a href="{$MyURL}add/add/" style="font-size: 17px;">Добавить станцию</a>
        </div>

    {/if}
</div>