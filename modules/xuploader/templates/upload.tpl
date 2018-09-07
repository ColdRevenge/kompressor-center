<div class="block">
    <script type="text/javascript">
    function setImage(src) {literal}{
        var img = document.createElement("IMG");
        img.setAttribute("src", src);
        img.setAttribute("alt", 'индикатор');
        $('load_file').appendChild(img);
    }{/literal}
    </script>
    <h1>Обновление прайс листа</h1>
    <div  style="text-align: center;">
        <form action="{$MyURL}upload/" method="post" onsubmit="setImage('{$sys_images_url}indicator.gif')" target="hiddenframe" enctype="multipart/form-data">
            <div class="quick_add" style="width: 370px;padding: 20px;">
                <div style="float: right;vertical-align: middle; ">
                    <input type="file" id="userfile" name="userfile" style="width: auto;"/>
                    <button>Загрузить</button>
                </div>
                <div id="load_file" style="float: right; margin-top: 20px;vertical-align: middle;padding-top: 5px;margin-right: 5px;"></div>
            </div>
        </form>
        <div id="file_list">
        {include file=$template}
        </div>
    </div>
    <iframe id="hiddenframe" name="hiddenframe" style="width:0px; height:0px; border:0px"></iframe>
</div>