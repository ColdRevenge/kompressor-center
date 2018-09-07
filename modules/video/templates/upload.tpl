<script type="text/javascript">
function setImage(src) {literal}{
    var img = document.createElement("IMG");
    img.setAttribute("src", src);
    img.setAttribute("alt", 'индикатор');
    $('load_file').appendChild(img);
}{/literal}
</script>
<div style="width: 98%; margin: auto;">
    <div style="margin: auto; text-align: right; margin-bottom: 5px;clear: both;">
        <h1>Загрузка файлов</h1>

        <form action="{$MyURL}upload/" method="post" onsubmit="setImage('{$sys_images_url}indicator.gif')" target="hiddenframe" enctype="multipart/form-data">
            <div style="float: right;vertical-align: middle; margin-top: 20px;">
                Название: <input type="text" value="{$smarty.post.name}" name="name" style="width: 300px; margin-right: 20px;"/> Файл:
                <input type="file" id="userfile" name="userfile" style="width: auto;"/>
                <input type="hidden" value="{$category_id|default:0}" name="category_id"/>
                <input type="submit" value="Загрузить"style="width: 100px;" />
            </div>
            <div id="load_file" style="float: right; margin-top: 20px;vertical-align: middle;padding-top: 5px;margin-right: 5px;"></div>
        </form>
        <iframe id="hiddenframe" name="hiddenframe" style="width:0px; height:0px; border:0px solid red;"></iframe>
    </div>
    <div id="file_list" style="clear: both;padding-top: 10px;">
        {include file='video.tpl'}
    </div>
</div>