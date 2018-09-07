<div class="block">
    <div class="menu">
        {include file="_menu_journal.tpl"}
    </div>
    <div class="page">
        {include file="_editor.tpl"}

        {include file=$template_message message=$message error=$error}
        <h1>{if $data->id}Редактировать{else}Добавить{/if} журнал</h1>

        <form method="POST" enctype="multipart/form-data" action="">
            <div id="language_1">
                <table cellpadding="3" cellspacing="0" border="0">
                    <tr>
                        <td valign="middle" align="right">Дата публикации<span class="asterix">*</span>:</td>
                        <td valign="top" align="left">
                            <input type="text" name="published_at" value='{$smarty.post.published_at|stripslashes}' class="datetime" style="width: 230px;" />
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Название<span class="asterix">*</span>:</td>
                        <td valign="top" align="left">
                            <input type="text" name="title" value='{$smarty.post.title|stripslashes}' style="width: 730px;" />
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="right">Описание:</td>
                        <td valign="top" align="left">
                            <textarea name="description" rows="5" style="width: 730px;height:80px;">{$smarty.post.description|stripslashes}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" align="right">Текст:<span class="asterix">*</span>:</td>
                        <td valign="top" align="left">
                            <textarea name="text" class="editor"  style="width: 730px;height:250px;">{$smarty.post.text|stripslashes}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Изображение:</td>
                        <td valign="middle" align="left">
                            {if $data->image}
                                <a href="{$news_image_url}{$data->image}"><img src="{$news_image_url}small_{$data->image}" alt="" style="max-width: 100px;vertical-align: middle; border: 1px solid #CCCCCC" /></a>
                                <input type="hidden" value="{$data->image}" name="uploaded_image" />
                            {/if}
                            {if $data->image}Заменить: {/if}<input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><br /><b>SEO</b></td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Заголовок (meta):</td>
                        <td valign="top" align="left">
                            <input type="text" name="meta_title" value='{$smarty.post.meta_title|stripslashes}' style="width: 730px;" />
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Описание (meta):</td>
                        <td valign="top" align="left">
                            <input type="text" name="meta_description" value='{$smarty.post.meta_description|stripslashes}' style="width: 730px;" />
                        </td>
                    </tr>
                    <tr>
                        <td valign="middle" align="right">Ключевые слова (meta):</td>
                        <td valign="top" align="left">
                            <input type="text" name="meta_keywords" value='{$smarty.post.meta_keywords|stripslashes}' style="width: 730px;" />
                        </td>
                    </tr>
                </table>
                <br />
                {if $data->id}<button>Сохранить</button>{else}<button>Добавить</button>{/if}
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="/js/datetimepicker/jquery.datetimepicker.full.min.js"></script>
<link rel="stylesheet" type="text/css" href="/js/datetimepicker/jquery.datetimepicker.min.css"/>
<script>
    {literal}
        $.datetimepicker.setLocale('ru');
        $(document).ready(function() {
            $('.datetime').datetimepicker({
                format:'d.m.Y H:i'
            })
        })
    {/literal}
</script>