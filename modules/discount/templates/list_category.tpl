<h1>Выберите категорию</h1>
<script type="text/javascript">
    checkMenu = {
        checkAll: function (obj) {
            if ($(obj).attr('checked') === 'checked') {
                $(obj).parent().parent().parent().parent().parent().find('tbody input[type=checkbox]').attr('checked', 'checked');
            }
            else {
                $(obj).parent().parent().parent().parent().parent().find('tbody input[type=checkbox]').removeAttr('checked')
            }
        },
        checkClass: function (obj, className) {
            if ($(obj).attr('checked') === 'checked') {
                $('.' + className + ' input[type="checkbox"]').attr('checked', 'checked').change();
            }
            else {
                $('.' + className + ' input[type="checkbox"]').removeAttr('checked').change();
            }
        }
    }
</script>
<form method="post" action="">
    {include file="list_category_tree.tpl" id="0" level="0" offset="24"}
    <br/>
    <button name="is_send" value="1">Сохранить</button>
</form>